<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Hash;
use Validator;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
class AdminUserController extends Controller
{
    /**
     * 管理员列表 展示管理员信息
     *
     * @return admin.admin_user.index 视图
     */
    public function index(Request $request)
    {
        //搜索条件
        $name = $request->input('name','');
        // dd($name);
        //查询管理员信息数据
        $date = AdminUser::where('name','like','%'.$name.'%')->paginate(5);

        return view('admin.admin_user.index',['title'=>'管理员列表','data'=>$date,'request'=>$name]);
    }

    /**
     * 添加管理员表单.
     *
     * @return admin.admin_user.admin_user 视图
     */
    public function create()
    {
        

        return view('admin.admin_user.admin_user',['title'=>'添加管理员']);
    }

    /**
     * 添加管理员.
     *
     * @param  array表单提交过来的数据  $request
     * @return true 跳管理员列表  false 跳回表单
     */
    public function store(Request $request)
    {    //判断是否为表单提交
        if($request->isMethod('post'))
        {
            $req = $request->except('_token','upwd_confirmation');
            //表单验证
             $this->validate($request, [
                'name' => 'required|unique:admin_user,name',
                'upwd' => 'required|confirmed|regex:/^[\w]{6,12}$/',
                'upwd_confirmation' => 'required',
                ],[
                    'name.required'=>'请填写管理员用户名',
                    'name.unique'=>'用户名已存在',
                    'upwd.required'=>'请填写密码',
                    'upwd.regex'=>'密码格式不正确',
                    'upwd.confirmed'=>'两次密码不一致',
                    'upwd_confirmation.required'=>'请填写确认密码',
                ]
            );
             //保持数据
                $request->flashExcept('pwd','pwd_confirmation');
            //添加时间
                $req['created_at'] = date('Y-m-d H:i:s',time());
            // 哈希加密
            $req['upwd'] = Hash::make($req['upwd']);
            
            //入库
            $res = AdminUser::insert($req);
            if($res){
                return redirect('/admin/adminuser')->with('success','添加成功!!!');
            }else{
                return back()->with('error','添加失败!!!');
            }
        }else{
            return back()->with('error','请正常访问!!!');
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($id)
    {
        //
    }

    /**
     * 显示修改表单
     *
     * @param  int  $id
     * @return admin.admin_user.edit 视图
     */
    public function edit($id)
    {
        //获取数据
        $data =  AdminUser::find($id);
        // dd($data);
        return view('admin.admin_user.edit',['title'=>'修改管理员信息','data'=>$data]);
    }

    /**
     *  接收表单信息 修改管理员信息
     *
     * @param  表单数据  $request
     * @param  int  $id
     * @return true 跳管理员列表  false 跳回表单
     */
    public function update(Request $request, $id)
    {
        //判断是否正常访问
        if($request->isMethod('PUT'))
        {
             $req = $request->except('_token','_method');
             //判断是否需要修改密码
             if($req['upwd1'] != null)
             {  //判断密码，确认密码是否有填写
                if($req['upwd'] == null && $req['upwd_confirmation'] == null){
                    //只是需要一个提示信息
                    $this->validate($request,[
                        'upwd' => 'required',
                    ],[
                        'upwd.required' => '如需修改密码必须填写以下数据',
                    ]);
                }else{
                    //需要修改密码
                      //验证密码 //查询密码
                    $data =  AdminUser::find($id);
                    if(Hash::check($req['upwd'],$data['upwd'])){
                        $this->validate($request,[
                            'upwds' => 'required',],[
                            'upwds.required' => '忘记密码了?',
                        ]);
                    }
                    //验证密码
                    $this->validate($request, [
                        'upwd1' => 'required',
                        'upwd' => 'required|confirmed|regex:/^[\w]{6,12}$/',
                        'upwd_confirmation' => 'required',
                    ],[
                        'upwd1.required'=>'请填写密码',
                        'upwd.required'=>'请填写密码',
                        'upwd.regex'=>'密码格式不正确',
                        'upwd.confirmed'=>'两次密码不一致',
                        'upwd_confirmation.required'=>'请填写确认密码',
                    ]);

                    //修改密码
                    $res = AdminUser::where('id',$id)->update([
                    'name'=>$req['name'],
                    'upwd'=>Hash::make($req['upwd']),
                    'status'=>$request->has('status') ? $req['status'] : '1',
                    'updated_at'=>date('Y-m-d H:i:s',time())
                ]);
                    //判断跳转
                if($res){
                    return redirect('/admin/adminuser')->with('success','修改成功!!!');
                }else{
                    return back()->with('error','修改失败!!!');
                }
                }
                
             }else{
                    //验证用户名
                $this->validate($request, [
                        'name' => 'required|unique:admin_user,name,'.$id,
                    ],[
                        'name.required'=>'请填写管理员用户名',
                        'name.unique'=>'用户名已存在',
                    ]);
                //不需要修改密码
                $res = AdminUser::where('id',$id)->update([
                    'name'=>$req['name'],
                    'status'=>$request->has('status') ? $req['status'] : '1',
                    'updated_at'=>date('Y-m-d H:i:s',time())
                ]);
                //判断跳转
                if($res){
                    return redirect('/admin/adminuser')->with('success','修改成功!!!');
                }else{
                    return back()->with('error','修改失败!!!');
                }
             }
        }else{
            return back()->with('error','请正常访问!!!');
        }
    }

    /**
     * 管理员删除
     *
     * @param  int  $id
     * @return true 跳管理员列表  false 跳回管理员列表
     */
    public function destroy($id)
    {   //删除数据
        $res = AdminUser::destroy($id);
        //判断跳转
        if($res){
            return redirect('/admin/adminuser')->with('success','删除成功!!!');
        }else{
            return back()->with('error','删除失败!!!');
        }
    }
}
