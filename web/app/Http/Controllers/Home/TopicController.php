<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TopicController extends Controller
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
     * 话题页
     *
     * @return \Illuminate\Http\Response
     */
    public function topic()
    {

        return view('home.topic.topic');
    }    
    /**
     * 话题广场页
     *
     * @return home.topic.topics 视图 topicy 一级话题 topice 对应的二级话题
     */
    public function topics($id='1')
    {
        //所有话题
        $topics = Topic::get(); 
        //获取所有一级话题
        $topicy = $this::tops($topics);
        //获取对应的二级话题
        $topice = $this::tops($topics,$id);
        //获取热门话题

        return view('home.topic.topics',['topicy'=>$topicy,'topice'=>$topice]);
    }

    /**
     * 寻找话题
     * @param $obj 话题对象
     * @param $pid 层级
     * @return  $topicy array 话题
     */
    public static function tops($obj,$pid = '0')
    {
        $topicy = [];
        foreach($obj as $k => $v){
            if($v->pid == $pid){
                $topicy[] = $v;
            }
        }
        return $topicy;
    }
    /**
     * 话题详情页.
     * @param topic id $id
     * @param type 判断是简介或问答 hot=问答 
     * @return \Illuminate\Http\Response
     */
    public function hot($id,$type)
    {

        //获取话题详情

        //获取讨论(问题-回答)

        return view('home.topic.hot');
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
