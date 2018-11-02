<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Access;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
    /**
     * 权限列表
     *
     * @return admin.access.index 视图
     */
    public function index(Request $request)
    {
        //搜索条件
        $title = $request->input('title','');

        $acs = Access::where('title','like','%'.$title.'%')->paginate(5);
        return view('admin.access.index',['title'=>'权限列表','acs'=>$acs,'request'=>$title]);
    }

    /**
     * 权限添加表单
     *
     * @return admin.access.create 视图
     */
    public function create()
    {
        return view('admin.access.create',['title'=>'添加权限']);
    }

    /**
     * 权限添加
     *
     * @param  表单数据  $request
     * @return true 权限列表  false 跳回添加权限表单
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        //表单验证
             $this->validate($request, [
                'title' => 'required|unique:access,title',
                'urls' => 'required',
                ],[
                    'title.required'=>'请填写权限名',
                    'title.unique'=>'权限名已存在',
                    'urls.required'=>'请填写路由',
                ]);
                     //保持数据
                $request->flashExcept('status');
                //添加时间
                $data['created_at'] = date('Y-m-d H:i:s',time());
                $res = Access::insert($data);
                //判断跳转
                if($res){
                    return redirect('/admin/access')->with('success','添加成功!!!');
                }else{
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
     * 修改权限表单
     *
     * @param  int  $id
     * @return admin.access.edit 视图
     */
    public function edit($id)
    {
        $acs = Access::find($id);
        return view('admin.access.edit',['title'=>'权限修改','acs'=>$acs]);
    }

    /**
     * 修改权限
     *
     * @param  修改表单提交的数据 $request
     * @param   表单数据 request  int  $id
     * @return true 权限列表  false 跳回修改权限表单
     */
    public function update(Request $request, $id)
    {
        $req = $request->except('_token','_method');
            //表单验证
         $this->validate($request, [
            'title' => 'required|unique:access,title',
            'urls' => 'required',
            ],[
                'title.required'=>'请填写权限名',
                'title.unique'=>'权限名已存在',
                'urls.required'=>'请填写路由',
            ]);
        $req['created_at'] = date('Y-m-d H:i:s',time());
        $res = Access::where('id',$id)->update($req);
        if($res){
            return redirect('/admin/access')->with('success','修改成功!!!');
        }else{
            return back()->with('error','修改失败!!!');
        }

    }

    /**
     * 删除权限
     *
     * @param  int  $id
     * @return true 权限列表  false 跳回权限列表
     */
    public function destroy($id)
    {
        //删除数据
        $res = Access::destroy($id);
        //判断跳转
        if($res){
            return redirect('/admin/access')->with('success','删除成功!!!');
        }else{
            return back()->with('error','删除失败!!!');
        }
    }
}
