<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\Reply_content;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
