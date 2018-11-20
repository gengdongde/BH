<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\UserConcern;

class UserConcernController extends Controller
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
        $data = UserConcern::where('uid',session('uid'))->where('cid',$request->input('cid'))->first();
        // echo $data;exit;
        if(empty($data->cid)){
            $user_concern = new UserConcern;

            // 接收数据
            $user_concern->cid = $request->input('cid');
            $user_concern->uid = session('uid');
            $res = $user_concern->save();
            if($res){
                echo 'success';
            }else{
                echo 'error';
            }
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
        // 登录用户ID
        $uid = session('uid');
        // 删除登录用户 关注用户
        $res = UserConcern::where('uid',$uid)->where('cid',$id)->delete();
        if($res){
            return redirect('/home/user')->with('success','已取消关注');
        }else{
            return back()->with('error','操作失败');
        }

    }


    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function del_con(Request $request)
    {

        // 登录用户ID
        $uid = session('uid');
        // 接收数据
        $cid = $request->input('cid');
        // 删除登录用户 关注用户
        $res = UserConcern::where('uid',$uid)->where('cid',$cid)->delete();
        if($res){
            echo 'success';
        }else{
            echo 'error';
        }
    }
}
