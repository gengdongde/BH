<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;

class LoginController extends Controller
{

    /**
     * 显示注册页面
     *
     * @return \Illuminate\Http\Response
     */
    public function logo()
    {
        // 加载注册模板
        return view('home.user.logo');
    }

    /**
     * 检测手机号是否存在
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        $tel = $request->input('tel');
        $user = User::where('tel',$tel)->get();
        if($user){
            echo 'success';
        }else{
            echo 'error';
        }
    }


     /**
     * 保存注册信息
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        // 验证
        $this->validate($request, [
            'tel' => 'required|unique:user|regex:/^[1]{1}[35789]{1}[0-9]{9}$/',
            'upwd' => 'required|regex:/^[a-z0-9_]{6,18}$/',
        ],[
            'tel.required'=>'手机号不能为空',
            'tel.unique'=>'手机号已存在',
            'tel.regex'=>'手机号格式错误',
            'upwd.required'=>'密码不能为空',
            'upwd.regex'=>'密码格式错误'
        ]);

        // 获取数据
        $user = new User;
        $user->tel = $request->input('tel');
        $user->upwd = Hash::make($request->input('upwd'));
        $res = $user->save();
        if($res){
            return redirect('/home/login');
        }else{
            return back()->with('error','注册失败');
        }
    }


    /**
     * 验证登录信息
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dologin(Request $request)
    {
        // 验证
        $this->validate($request, [
            'name' => 'required',
            'upwd' => 'required',
        ],[
            'name.required'=>'手机号不能为空',
            'upwd.required'=>'密码不能为空',
        ]);


        // 获取数据
        $name = $request->input('name');
        
        if(substr_count($name, '@')==0){
            $user = User::where('tel',$name)->get();
            if($user){
                return back()->with('error','账号或密码错误');
            } 
        }
        dump($user);
        if(substr_count($name, '@')>0){
            $user = User::where('email',$name)->get();
            if(empty($user)){
                return back()->with('error','账号或密码错误');
            }
        }

        foreach($user as $k=>$v){
            $upwd = $v->upwd;
        }
        
        if(!Hash::check($request->input('upwd'), $upwd)){
            return back()->with('error','账号或密码错误');
        }
        return redirect('/home/index');
    
    }


     /**
     * 显示登录页面
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        //加载登录页面
        return view('home.user.login');
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
