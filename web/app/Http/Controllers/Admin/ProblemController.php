<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Problem;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取查询用户名
        $uname = $request->input('uname','');
        // 查询用户信息
        $users = UserDetail::where('uname','like','%'.$uname.'%')->get();
        // 定义一个空数组,存放用户uid
        $ids = [];
        // 遍历
        foreach($users as $k=>$v){
            $ids[] = $v->uid;
        }

        // 获取查询问题名
        $pname = $request->input('pname','');
         $data = Problem::whereIn('uid',$ids)
                        ->where('pname','like','%'.$pname.'%')
                        ->where('report','=','0')
                        ->paginate(5);
        
        //加载模板
        return view('admin.problem.index',['title'=>'问题列表','data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request)
    {
        // 获取查询用户名
        $uname = $request->input('uname','');
        // 查询用户信息
        $users = UserDetail::where('uname','like','%'.$uname.'%')->get();
        // 定义一个空数组,存放用户uid
        $ids = [];
        // 遍历
        foreach($users as $k=>$v){
            $ids[] = $v->uid;
        }

        // 获取查询问题名
        $pname = $request->input('pname','');
         $data = Problem::whereIn('uid',$ids)
                        ->where('pname','like','%'.$pname.'%')
                        ->where('report','>','0')
                        ->paginate(5);
        // 加载模板
        return view('admin.problem.report',['title'=>'被举报列表','data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // 获取数据
        $data = Problem::where('uid',$id)->get();
       
        // 加载模板
        return view('admin/user/problem',['title'=>'提问问题','data'=>$data]);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // 删除信息
        $res = Problem::destroy($id);
        // 判断
        if($res){
            echo 'success';
        }else{
            echo 'error';
        }
        exit;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // 删除信息
        $res = Problem::destroy($id);
        // 判断
        if($res){
            return redirect('/admin/user')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
