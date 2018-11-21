<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\UserShield;

class ShieldController extends Controller
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
        
        $user = new UserShield;
        // 接收数据
        // 判断
        $user->uid = session('uid');
        $user->sid = $request->input('sid');
        $res = $user->save();
        if($res){
            echo 'success';exit;
        }else{
            echo 'error';exit;
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
     * 删除屏蔽用户
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $uid = session('uid');
        $res = UserShield::where('uid',$uid)->where('sid',$id)->delete();

        if($res){
            return redirect('/home/user/set')->with('success','取消屏蔽成功');
        }else{
            return back()->with('error','取消屏蔽失败');
        }
    }
}
