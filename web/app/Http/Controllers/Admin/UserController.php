<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\EditUserRequest;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取查询数据
        $uname = $request->input('uname','');
        // 获取符合条件的用户详情表信息
        $user = UserDetail::where('uname','like','%'.$uname.'%')->get();
        // 定义一个空数组,保存用户id
        $ids = [];
        // 遍历
        foreach($user as $k=>$v){
            $ids[] = $v->uid;
        }
        
        // 获取数据
        $users = User::whereIn('id',$ids)->paginate(5);
       
        //加载用户列表模板
        return view('admin.user.index',['title'=>'用户列表','users'=>$users,'request'=>$request->input('uname')]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载用户添加模板
        return view('admin.user.create',['title'=>'添加用户']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        

        // 开启事务
        DB::beginTransaction();
        // 获取数据
        $user = new User;
        $user->tel = $request->input('tel');
        $user->email = $request->input('email');
        $user->upwd = Hash::make($request->input('upwd'));
        $res1 = $user->save();
        $id = $user->id;

        $userinfo = new UserDetail;
        $userinfo->uid = $id;
        $userinfo->uname = $request->input('uname');
        $userinfo->sex = $request->input('sex');
        $res2 = $userinfo->save();
        
        if($res1 && $res2){
            DB::commit();
            return redirect('/admin/user')->with('success','添加成功');
        }else{
            DB::rollBack();
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 获取指定用户信息
        $user = User::find($id);
        // dd($user);
        // exit;
        //加载用户详情模板
        return view('admin.user.show',['title'=>'用户详情','user'=>$user,'id'=>$id]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取用户信息
        $user = User::find($id);
        //加载修改模板
        return view('admin.user.edit',['title'=>'修改用户','id'=>$id,'user'=>$user]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 开启事务
        DB::beginTransaction();
        // 获取数据
        $user = User::find($id);

         $this->validate($request, [
            'tel'=>"required|regex:/^[1][356789]{1}[0-9]{9}$/|unique:user,tel,".$user->id,
            'email'=>'required|email|unique:user,email,'.$user->id,
            'uname'=>'required|unique:user_details,uname,'.$user->id.',uid',
            'sex'=>'required'
        ],[
             'tel.required'=>'手机号必填',
            'tel.regex'=>'手机号格式错误',
            'tel.unique'=>'手机号已存在',
            'email.required'=>'邮箱必填',
            'email.email'=>'邮箱格式错误',
            'email.unique'=>'邮箱已存在',
            'uname.required'=>'用户名必填',
            'uname.unique'=>'用户名已存在',
            'sex.required'=>'性别必填',
        ]);

        $user->tel = $request->input('tel');
        $user->email = $request->input('email');
       
        $res1 = $user->save();


        
        $res2 = UserDetail::where('uid',$id)
                ->update(['uname'=>$request->input('uname'),'sex'=>$request->input('sex')]);
        
        if($res1 && $res2){
            DB::commit();
            return redirect('/admin/user')->with('success','修改成功');
        }else{
            DB::rollBack();
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 开启事务
        DB::beginTransaction();
        // 删除用户表信息
        $res1 = User::destroy($id);
        // 删除用户详情表信息
        $res2 = UserDetail::where('uid',$id)->delete();
        if($res1 && $res2){
            DB::commit();
            return redirect('/admin/user')->with('success','加入黑名单成功');
        }else{
            DB::rollBack();
            return back()->with('error','加入黑名单失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function soft()
    {
        //获取软删除数据
        $users = User::onlyTrashed()->get();

        return view('admin/user/soft',['title'=>'黑名单','users'=>$users]);
    }

     /**
     * 恢复
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {


        // 开启事务
        DB::beginTransaction();
        //恢复软删除数据
        $res1 = User::withTrashed()
                ->where('id',$id)
                ->restore();
        $res2 = UserDetail::withTrashed()
                ->where('uid',$id)
                ->restore();
        if($res1 && $res2){
            DB::commit();
            return redirect('/admin/user/soft')->with('success','恢复成功');
        }else{
            DB::rollBack();
            return back()->with('error','恢复失败');
        }

        
    }

    /**
     * 永久删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {

        
        // 开启事务
        // DB::beginTransaction();
        //获取软删除数据
       $user = User::find($id);
       $res1 = $user->forceDelete();
       $res2 = $user->userinfo()->forceDelete();
       
       
        if($res1 && $res2){
            DB::rollBack();
            return back()->with('error','永久删除失败');
        }else{
            DB::commit();
            return redirect('/admin/user')->with('success','永久删除成功'); 
        }
        
    }

}
