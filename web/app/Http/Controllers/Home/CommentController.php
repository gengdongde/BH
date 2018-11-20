<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class CommentController extends Controller
{
    /**
     * ajax评论.
     *
     * @return \Illuminate\Http\Response
     */
    public function tcom(Request $request)
    {   //获取评论内容
        $data = $request->except('_token');
        $data['created_at'] = date('Y-m-d H:i:s',time());
        $data['uid'] = session('uid');
        $res = Comment::insert($data);
        //查询用户详情
        $user = DB::table('user_details')->where('uid',session('uid'))->first();
        if($res){
            echo '<div class="row"><div class="col-xs-12 col-md-12 plnr"><div class=""style="margin-top: 6px;"><img style="width:24px;height:24px;border-radius: 5px;" class="f-fl"src="'.$user->face.'" alt="">'.$user->uname.'</div><div style="margin:10px 0px;">'.$data['content'].'</div><div class="" style="color:#999;"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>123</div></div></div>';
        }else{
            echo '1';
        }
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
