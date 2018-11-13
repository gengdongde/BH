<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

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
        // 验证
         $this->validate($request, [
            'pname' => 'required|regex:/\?$/',
            'content' => 'required|min:4|max:10000',
            'tid'=>'required',
        ],[
            'pname.required'=>'提问不能为空',
            'pname.regex'=>'以?结尾',
            'content.required'=>'问题描述不能为空',
            'content.min'=>'最少4个字',
            'content.max'=>'最多10000个字',
            'tid.required'=>'话题必选',
        ]);
        // 接收数据
        $problem = new Problem;
        $problem->pname = $request->input('pname');
        $problem->describe = rtrim(ltrim($request->input('content'),'<p>'),'</p>'); 
        $problem->tid = $request->input('tid');
        // dump($problem->tid);exit;
        if(empty($request->input('che'))){
            // $problem->uid = session('uid');
            $problem->uid = session('uid');
        }
        // dump($request->session()->all());
        // dump($problem->uid);exit;
        $res = $problem->save();
        if($res){
            return redirect('home/index');
        }else{
            return back()->with('error','提问失败');
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
