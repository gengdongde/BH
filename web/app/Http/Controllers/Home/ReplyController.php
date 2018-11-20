<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Redis;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Reply;
use App\Models\Reply_content;
use DB;

class ReplyController extends Controller
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
     * ajax 回答赞功能
     *
     * @return html string
     */
    public function replyagree(Request $request)
    {   //获取用户id
        $uid = session('uid');
        //获取reply 的id
        $rid = $request->input('rid'); 
        //判断radis中是否有数据
        if(Redis::exists('replyagree'.$rid)){
            $res = Redis::get('replyagree'.$rid); //获取数据
            $data = unserialize($res); //转数组
            foreach ($data as $k => $v) {
                //如果已经赞过了就 不存入id了
                if($v == $uid){
                    unset($data[$k]);
                    Redis::setex('replyagree'.$rid,3600,serialize($data));
                    echo 1;
                    die;
                }
            }
            $data[] = $uid;
            Redis::setex('replyagree'.$rid,3600,serialize($data));
            echo 2;
            die;
        }else{
            $data[] = $uid;
            Redis::setex('replyagree'.$rid,3600,serialize($data));
            echo 2;
            die;
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

         // 验证
         $this->validate($request, [
            'content' => 'required|min:4|max:10000'
        ],[
            'content.required'=>'问题描述不能为空',
            'content.min'=>'最少4个字',
            'content.max'=>'最多10000个字',
        ]);
        
       
        $reply = new Reply;
        $reply_content = new Reply_content;
        // 开启事务
        DB::beginTransaction();
        // 接收数据
        $reply->pid = $request->input('pid');
        // 判断是否匿名提交
        if(empty($request->input('che'))){
            $reply->uid = session('uid');
        }
        // 保存到数据库
        $res1 = $reply->save();
        // dd($res1);
        // 接收数据
        $reply_content->content = $request->input('content');
        $reply_content->rid = $reply->id;
        // 保存到数据库
        $res2 = $reply_content->save();

        if($res1 && $res2){
            DB::commit();
            return back()->with('success','回答成功');
        }else{
            DB::rollBack();
            return back()->with('error','回答失败');
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
