<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Problem;
use App\Models\ProblemReport;
use DB;

class ProblemController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('login');
    // }
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
        // 遍历
        foreach($data as $k=>$v){
             $v->rep = $v->reply($v->id)->select(DB::raw('count(*) as rep',$v->id))->first()->rep;
        }
        //加载模板
        return view('admin.problem.index',['title'=>'问题列表','data'=>$data,'request'=>$request->all()]);
    }

    /**
     * 显示被举报问题
     *
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request)
    {
        // 获取查询用户名
        // $uname = $request->input('uname','');
        // 查询用户信息
        // $users = UserDetail::where('uname','like','%'.$uname.'%')->get();
        // 定义一个空数组,存放用户uid
        // $ids = [];
        // 遍历
        // foreach($users as $k=>$v){
        //     $ids[] = $v->uid;
        // }

        // 获取查询问题名
        // $pname = $request->input('pname','');
        // $data = Problem::whereIn('uid',$ids)
        //                 ->where('pname','like','%'.$pname.'%')
        //                 ->where('report','>','0')
        //                 ->paginate(5);
        // 被举报问题
        $report = ProblemReport::all();
        // dd($report);
        // 遍历
        foreach($report as $k=>$v){
            $v->pro = $v->problem()->first();
            $v->rep_user = UserDetail::where('uid',$v->uid)->first();
        }
        // foreach($report as $k=>$v){
            // dd($v->pro->id);
        // }
        // 加载模板
        // return view('admin.problem.report',['title'=>'被举报列表','data'=>$data,'request'=>$request->all()]);
        return view('admin.problem.report',['title'=>'被举报列表','report'=>$report]);
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
     * 删除问题
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
     * 删除被举报问题
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


     /**
     * 举报管理 恢复
     *
     * @return \Illuminate\Http\Response
     */
    public function hf($id,$pid)
    {

        $res1 = ProblemReport::where('id',$id)->delete();
        $data = ProblemReport::where('pid',$pid)->first();
        if(!$data){
            Problem::where('id',$pid)->update(['report'=>0]);
        }

        if($res1){
            return redirect('/admin/problem/report')->with('sccess','已恢复');
        }else{
            return back()->with('error','恢复失败');
        }
    }
}
