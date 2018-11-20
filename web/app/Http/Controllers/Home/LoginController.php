<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
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
        return view('home.login.register');
    }

    /**
     * 检测手机号是否存在
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        $tel = $request->input('tel');
        $user = User::where('tel',$tel)->first();
        if(!$user){
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
            
        ],[
            'tel.required'=>'手机号不能为空',
            'tel.unique'=>'手机号已存在',
            'tel.regex'=>'手机号格式错误',
            
        ]);


        // 获取数据
         // 获取表单提交数据
        $code = $request->input('code');
        // 获取session中验证码
        $phone_code = session('phone_code');
      
        if($code != $phone_code){
            return back()->with('error','验证码错误');
        }
        
        $user = new User;
        $user->tel = $request->input('tel');
        $res1 = $user->save();

        $userinfo = new UserDetail;
        $userinfo->uid = $user->id;
        $res2 = $userinfo->save();
       
        
        if($res1 && $res2){
            session(['uid'=>$user->id]);
            return redirect('/home/index');
        }else{
            return back()->with('error','注册失败');
        }
    }


    /**
     * 验证登录信息 密码登录
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

            if(!$user->first()){
                return redirect('/home/login')->with('error','账号或密码错误');
            } 
        }
       
        if(substr_count($name, '@')>0){
            $user = User::where('email',$name)->get();
            if(!$user->first()){
                return redirect('/home/login')->with('error','账号或密码错误');
            }
        }
        
        foreach($user as $k=>$v){
            $upwd = $v->upwd;
            if(!Hash::check($request->input('upwd'), $upwd)){
                return redirect('/home/login')->with('error','账号或密码错误');
            }else{

                // 用户信息保存到session
                
                session(['uid'=>$v->id]);
                
                return redirect('/home/index');
            }
        }      
    }


    /**
     * 验证码登录
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dologin_code(Request $request)
    {
        // 获取表单提交数据
        $tel = $request->input('tel');
        $code = $request->input('code');
        
        // 获取session中验证码
        $phone_code = session('phone_code');
        if($code != $phone_code){
            return back()->with('error','验证码错误');
        }
        $user = User::where('tel',$tel)->first();
        if($user){
            session(['uid'=>$user->id]);
            return redirect('/home/index');
        }else{
            return back()->with('error','手机号未注册'); 
        }
       
    }


    /**
     * 发送验证码
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendcode(Request $request)
    {
        
        // 获取手机号
        $mobile = $request->input('phone');
        
        // 获取随机数
        $str_code = rand(1000,9999);
        // 压入到session中
        session(['phone_code'=>$str_code]);
        // 验证码
        $mobile_code = $str_code;
        //短信接口地址
       $target = "http://106.ihuyi.com/webservice/sms.php?method=Submit";
       $target .= "&format=json&account=C03771182&password=96e543932285367549b62f24542585ca&mobile=".$mobile."&content=".rawurlencode("您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。");
       //初始化
        $curl = curl_init();
        //设置抓取的url
        curl_setopt($curl, CURLOPT_URL,$target);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //执行命令
        $data = curl_exec($curl);

        //关闭URL请求
        curl_close($curl);
        echo $data;exit;
        // return response()->json($data);
    }

     /**
     * 显示登录页面
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        //加载登录页面
        return view('home.login.login');
    }

    /**
     * 退出登录
     * 
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        // 删除session中的uid
       session(['uid'=>null]);
       if(!session('uid')){
            return redirect('/home/login');
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
