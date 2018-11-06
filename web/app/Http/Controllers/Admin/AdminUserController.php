<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Hash;
use Validator;
use Crypt;
use App\Models\Role;
use DB;
use Illuminate\Contracts\Encryption\DecryptException;
class AdminUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('login');
    }
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
        $role = Role::where('status','2')->get();
        return view('admin.admin_user.admin_user',['title'=>'添加管理员','role'=>$role]);
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
            //开启事务
            DB::beginTransaction();
            $req = $request->except('_token','upwd_confirmation','role_id');
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
            $uid = AdminUser::insertGetId($req);
            //判断跳转
            if(!$uid){
                //回滚事务
                 DB::rollBack();
                return back()->with('error','添加失败!!!');
            }
            //处理adminuser_role数据
            $da = true;
            if($request->has('role_id')){
                $role_id = $request->input('role_id');
                foreach ($role_id as $k => $v) {
                    $da = DB::table('adminuser_role')->insert(['uid'=>$uid,'role_id'=>$v]);
                }
            }

            if(!$da){
                //回滚事务
                 DB::rollBack();
                return back()->with('error','添加失败!!!');
            }else{
                //提交事务
                DB::commit();
                return redirect('/admin/adminuser')->with('success','添加成功!!!');
            }
        }else{
            return back()->with('error','请正常访问!!!');
        }
        
        
    }

    /**
     * 点击修改状态status
     *
     * @param  int需要修改的管理员id  $id
     * @return true 跳管理员列表  false 跳管理员列表
     */
    public function is_status($id)
    {

        //查询记录
        $is_st = AdminUser::where('id',$id)->value('status');
       $is_st = ($is_st == 1) ? 2 : 1;
        $res = AdminUser::where('id',$id)->update(['status'=>$is_st]);
        if($res){
            return back()->with('success','修改成功!!!');
        }else{
            return back()->with('error','修改失败!!!');
        }
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
        //获取access_id
        $role_id = DB::table('adminuser_role')->where('uid',$id)->get();
        //获取所有角色
        $role = Role::where('status','2')->get();
        return view('admin.admin_user.edit',['title'=>'修改管理员信息','data'=>$data,'role_id'=>$role_id,'role'=>$role]);
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
                     //开启事务
            DB::beginTransaction();
            $req = $request->except('_token','_method','role_id');
            //处理adminuser_role数据
                //先删除 再重新添加
            $role_id = $request->input('role_id');
            @$resd = DB::table('adminuser_role')->where('uid',$id)->delete();
            $da = true;
            if($role_id != null)
            {
                foreach ($role_id as $k => $v) {
                    $da = DB::table('adminuser_role')->insert(['uid'=>$id,'role_id'=>$v]);
                }
            }

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
                    //提交事务
                    DB::commit();
                    return redirect('/admin/adminuser')->with('success','修改成功!!!');
                }else{
                    //回滚事务
                    DB::rollBack();
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
                    //提交事务
                    DB::commit();
                    return redirect('/admin/adminuser')->with('success','修改成功!!!');
                }else{
                    //回滚事务
                    DB::rollBack();
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
