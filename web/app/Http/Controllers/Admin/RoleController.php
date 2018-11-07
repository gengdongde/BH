<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Access;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('login');
    }
    /**
     * 角色列表
     *
     * @return admin.role.index视图
     */
    public function index(Request $request)
    {
                //搜索条件
        $roname = $request->input('roname','');

        $role = Role::where('roname','like','%'.$roname.'%')->paginate(5);
        return view('admin.role.index',['title'=>'角色列表','role'=>$role,'request'=>$roname]);
    }

    /**
     * 添加角色表单
     *
     * @return admin.role.create 视图
     */
    public function create()
    {
        $access = Access::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        return view('admin.role.create',['title'=>'添加角色','access'=>$access]);
    }    
    /**
     * 角色状态
     * @param  role  $id
     * @return true 跳回角色列表 false 跳回角色列表
     */
    public function stus($id)
    {
            //查询记录
            $is_st = Role::where('id',$id)->value('status');
            $is_st = ($is_st == 1) ? 2 : 1;
            $res = Role::where('id',$id)->update(['status'=>$is_st]);
         if($res){
            return back()->with('success','修改成功!!!');
        }else{
            return back()->with('error','修改失败!!!');
        }
    }

    /**
     * 添加角色
     *
     * @param  表单数据  $request
     * @return true 跳回角色列表 false 跳回角色添加表单
     */
    public function store(Request $request)
    {
        //开启事务
        DB::beginTransaction();
        $access_id = $request->input('access_id');
        $data = $request->except('_token','access_id');
       
        //表单验证
         $this->validate($request, [
            'roname' => 'required|unique:role,roname',
            ],[
                'roname.required'=>'请填角色名',
                'roname.unique'=>'角色名已存在',
            ]);
                 //保持数据
            $request->flashExcept('status');
            //添加时间
            $data['created_at'] = date('Y-m-d H:i:s',time());
            //添加角色 
            $role_id = Role::insertGetId($data);
            //判断跳转
            if(!$role_id){
                //回滚事务
                 DB::rollBack();
                return back()->with('error','添加失败!!!');
            }
            $da = true;
            // 判断
            if(!empty($access_id)){
                 //处理role_access数据
                foreach ($access_id as $k => $v) {
                    $da = DB::table('role_access')->insert(['role_id'=>$role_id,'access_id'=>$v]);
                }
            }
            
            if($da){
                //提交事务
                DB::commit();
                return redirect('/admin/role')->with('success','添加成功!!!');
            }else{
                //回滚事务
                DB::rollBack();
                return back()->with('error','添加失败!!!');
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
     * 角色权限修改表单
     *
     * @param  role  $id
     * @return admin.role.edit 视图
     */
    public function edit($id)
    {   
        //获取角色数据
        $role = Role::find($id);
        //获取access_id
        $access_id = DB::table('role_access')->where('role_id',$id)->get();
        //获取所有权限
        $access = Access::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        return view('admin.role.edit',['title'=>'角色权限修改','access_id'=>$access_id,'access'=>$access,'role'=>$role]);
    }

    /**
     * 修改角色
     *
     * @param  角色修改表单的数据 
     * @param  role  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //开启事务
        DB::beginTransaction();
        //获取表单数据
        $access_id = $request->input('access_id');
        $data = $request->except('_token','access_id','_method');
       
        //表单验证
         $this->validate($request, [
            'roname' => 'required|unique:role,roname,'.$id,
            ],[
                'roname.required'=>'请填角色名',
                'roname.unique'=>'角色名已存在',
            ]);
                 //保持数据
            $request->flashExcept('status');
            $data['status']= $request->has('status') ? $data['status'] : '1';
            //修改角色 
            $role = Role::where('id',$id)->update($data);
            //判断跳转
            if(!$role){
                //回滚事务
                 DB::rollBack();
                return back()->with('error','添加失败!!!');
            }
            //处理role_access数据
                    //先删除 再重新添加
            $resd = DB::table('role_access')->where('role_id',$id)->delete();
            $da = true;
            if($access_id != null)
            {
                foreach ($access_id as $k => $v) {
                    $da = DB::table('role_access')->insert(['role_id'=>$id,'access_id'=>$v]);
                }
            }

            if($da){
                //提交事务
                DB::commit();
                return redirect('/admin/role')->with('success','添加成功!!!');
            }else{
                //回滚事务
                DB::rollBack();
                return back()->with('error','添加失败!!!');
            }
    }

    /**
     * 删除角色
     *
     * @param  int  $id
     * @return true 跳角色列表  false 跳回角色列表
     */
    public function destroy($id)
    {
        //开启事务
        DB::beginTransaction();
        //删除数据
        $res = Role::destroy($id);
        //删除中间表数据
        $resd = DB::table('role_access')->where('role_id',$id)->delete();
        //判断跳转
        if(!$res && !$resd){
             //回滚事务
            DB::rollBack();
            return back()->with('error','删除失败!!!');
        }else{
            //提交事务
                DB::commit();
                return redirect('/admin/role')->with('success','添加成功!!!');
        }
    }
}
