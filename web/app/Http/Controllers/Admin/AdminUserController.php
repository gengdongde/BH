<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 111;
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
            return back();
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
