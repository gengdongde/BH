<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Problem;
use App\Models\Reply;
use App\Models\Topic;
use App\Models\UserDetail;
use App\Models\UserConcern;
use App\Models\User;
use DB;

class ProblemController extends Controller
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
        // 验证
         $this->validate($request, [
            'pname' => 'required|unique:problem',
            'content' => 'required|min:4|max:10000',
            'tid'=>'required',
        ],[
            'pname.required'=>'提问不能为空',
            'pname.unique'=>'该问题已存在',
            'content.required'=>'问题描述不能为空',
            'content.min'=>'最少4个字',
            'content.max'=>'最多10000个字',
            'tid.required'=>'话题必选',
        ]);
        
        // 接收数据
        $problem = new Problem;
        $problem->pname = $request->input('pname');
        $problem->describe =$request->input('content'); 
        $problem->tid = $request->input('tid');
        
        
        if(empty($request->input('che'))){
            
            $problem->uid = session('uid');
        }
       
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
        // 根据问题ID,查找信息
        $problem = Problem::where('id',$id)->first();
        // 问题所属话题
        $topic = Topic::where('id',$problem->tid)->first();
       
        // 问题所有回答
        $rep = Reply::where('pid',$id)->get();
        // 回答数量
        $rep_num = 0;
        foreach($rep as $k=>$v){
             $v->user = UserDetail::where('uid',$v->uid)->first();
            $rep_num ++;
        }
        


        // 关于作者
        $user = UserDetail::where('uid',$problem->uid)->first();
        // 作者回答问题量
        $user_rep = $user->reply($user->uid)->select(DB::raw('count(*) as rep',$user->uid))->first()->rep;
        // 作者的关注者数量
        $user_con = UserConcern::where('cid',$user->uid)->select(DB::raw('count(*) as con',$user->uid))->first()->con;
        // 登录用户
        $user_login = UserDetail::where('id',session('uid'))->first();
        
        // 作者是否被关注
        $cuser = UserConcern::where('uid',session('uid'))->where('cid',$problem->uid)->first();
        
        // 加载模板
        return view('home.problem.show',['problem'=>$problem,'rep'=>$rep,'rep_num'=>$rep_num,'topic'=>$topic,'user'=>$user,'user_rep'=>$user_rep,'user_con'=>$user_con,'user_login'=>$user_login,'cuser'=>$cuser]);
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
