<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Problem;
use App\Models\ProblemReport;
use DB;

class ProblemReportController extends Controller
{



    /**
     * 验证是否登录
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('home');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        // 开启事务
        DB::beginTransaction();
        // 接收上传数据
        // 接收举报问题id
        $id = $request->input('pid');
        
        

        // 判断
        $data = ProblemReport::where('pid',$id)->where('uid',session('uid'))->first();
        if($data){
            return back()->with('error','已举报过该问题,审核中......');
        }
        $report = new ProblemReport;
        $report->pid = $id;
        $report->uid = session('uid');
        $report->report = $request->input('report');
        $res1 = $report->save();

        $res2 = Problem::where('id',$id)->update(['report'=>1]);
         

        if($res1 && $res2){
            DB::commit();
            return back()->with('success','举报成功');
        }else{
            DB::rollback();
            return back()->with('error','操作失败');
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
