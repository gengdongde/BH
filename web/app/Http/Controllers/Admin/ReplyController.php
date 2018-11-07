<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\Reply_content;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('login');
    }
    /**
     * 问题回答列表
     *
     * @return admin.reply.index 视图
     */
    public function index()
    {
        $rey = Reply::paginate(8);
        
        return view('admin.reply.index',['title'=>'问题回答列表','rey'=>$rey]);
    }

    /**
     * 举报管理.
     *
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
        $rey = Reply::where('report','!=','0')->paginate(8);
        return view('admin.reply.report',['title'=>'回答举报管理','rey'=>$rey]);
    }    
    /**
     * 举报管理.
     *
     * @return \Illuminate\Http\Response
     */
    public function hf($id)
    {
        $res = Reply::where('id',$id)->update(['report'=>'0']);
        if($res){
            return redirect('/admin/reply/report')->with('sccess','已恢复');
        }else{
            return back()->with('error','恢复失败');
        }
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
     * 问题回答内容
     *
     * @param  reply  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $re_con = Reply_content::where('rid',$id)->first();
        return view('admin.reply.show',['title'=>'问题回答内容','re_con'=>$re_con]);
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
     * 永久删除被举报回答.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
         //开启事务
            DB::beginTransaction();
        //删除数据
        $res = Reply::destroy($id);
        $red = Reply_content::where('rid',$id)->delete();
        //判断跳转
        if($res && $red){
            //提交事务
                    DB::commit();
            return redirect('/admin/reply/report')->with('success','删除成功!!!');
        }else{
            //回滚事务
                    DB::rollBack();
            return back()->with('error','删除失败!!!');
        }
    }
}
