<?php

namespace App\Http\Controllers\Admin;
use App\Models\AdminUser;
use App\Models\Access;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use App\Models\Role;

class LoginController extends Controller
{
    /**
     * 后台登录界面.
     *
     * @return admin.login.login 视图
     */
    public function login()
    {
        return view('admin.login.login');
    }
 
    /**
     * 后台登录验证
     *
     * @return 登录成功跳后台首页  登录失败跳回登录
     */
    protected function validateLogin(Request $request)
    {    //获取表单值
        $req = $request->except('_token');
        //验证表单
        $this->validate($request,[
            'captcha' => 'required|captcha',
            'name' => 'required|exists:admin_user,name', 
        ],[
            'captcha.required' => '请填写验证码!!!',
            'captcha.captcha' => '验证码错误!!!',
            'name.required' => '请填写管理员名称!!!',
            'name.exists' => '用户名错误!!!',
        ]);

        
       


        $aupwd = AdminUser::where('name',$req['name'])->first();
            

        if($aupwd['status'] == 2){
            if(!Hash::check($req['upwd'],$aupwd['upwd'])){
                $this->validate($request,[
                    'upwds' => 'required',],[
                    'upwds.required' => '忘记密码了，好好想一下吧.',
                ]);
            }
        }else{
            $this->validate($request,[
                'upwda' => 'required',],[
                'upwda.required' => '管理员未启用.',
            ]);
        }
        //验证完成
           //把需要的数据存入session
       

        //角色
        $role = $aupwd->role()->get();
        //所有角色的权限
        $acs = [];
        $id = 2;
        foreach ($role as $k => $v) {
            foreach ($v->access()->get() as $key => $value) {
                 $acs[] = $value->urls;
            }
            if($v->id == '1'){
                $id = '1';
            }else{
                $id = '2';
            }
        }
        //存入session
        session(['login.name'=>$req['name'],'urls'=>$acs,'id'=>$id]);
        return redirect('/admin/');
    }

    /**
     * 后台退出登录.
     *
     * 
     * @return 重定向 /admin/login
     */
    public function del()
    {
        session('login.name',null);
        session('urls',null);
        session('id',null);
        return redirect('/admin/login');
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
