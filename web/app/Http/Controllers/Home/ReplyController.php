<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Redis;
use App\Models\Reply;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReplyController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cs()
    {

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
