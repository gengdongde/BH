<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Hash;
use App\Http\Requests\StoreUserRequest;
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
        // dump($ids);
        // dump($user);
        // 获取数据
        $users = User::whereIn('id',$ids)->paginate(5);
       
        //加载用户列表模板
        return view('admin.user.index',['title'=>'用户列表','users'=>$users,'request'=>$request->input('name')]);

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
            return redirect('/admin/user')->with('seccess','添加成功');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
