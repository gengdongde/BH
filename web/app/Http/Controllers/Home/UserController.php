<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserShield;
use App\Models\Problem;
use App\Models\Reply;
use App\Models\UserConcern;
use Hash;
use DB;
use Mail;

class UserController extends Controller
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
     * 个人中心
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid = session('uid');

        // 用户信息
        $user = User::find($uid)->userinfo($uid)->first();
        // 用户提问
        $user_pro = Problem::where('uid',$uid)->orderBy('created_at','desc')->get();
        $pro_num = 0;

        foreach($user_pro as $k=>$v){
            $pro_num +=1;
            // 问题回答数量
            $v->reply = $v->reply($v->id)->select(DB::raw('count(*) as rep',$v->id))->first()->rep;
        }
        
        
        // 用户回答
        $user_rep = Reply::where('uid',$uid)->orderBy('created_at','desc')->get();
        $rep_num = 0;
        foreach($user_rep as $k=>$v){
            $rep_num +=1;

        }

        $u = User::find($uid);
        // 用户关注话题
        $tops = $u->usertopic()->orderBy('created_at','desc')->get();
        $top_num = 0;
        foreach($tops as $k=>$v){
            $top_num +=1;

        }

        // 关注用户
        $con_user = UserConcern::where('uid',$uid)->select(DB::raw('cid'))->get();
        $con = [];
        foreach($con_user as $k=>$v){
            $con[] = User::find($v->cid)->userinfo($v->cid)->first();
            
        }
        $con_num = count($con);
      
        // 加载模板
        return view('home.user.userinfo',['user'=>$user,'uid'=>$uid,
            'user_pro'=>$user_pro,'pro_num'=>$pro_num,
            'user_rep'=>$user_rep,'rep_num'=>$rep_num,
            'top_num'=>$top_num,'tops'=>$tops,
            'con_num'=>$con_num ,'con'=>$con,

        ]);
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
        // 用户信息
        $user = User::find($id)->userinfo($id)->first();
        // 用户提问
        $user_pro = Problem::where('uid',$id)->orderBy('created_at','desc')->get();
        $pro_num = 0;

        foreach($user_pro as $k=>$v){
            $pro_num +=1;
            // 问题回答数量
            $v->reply = $v->reply($v->id)->select(DB::raw('count(*) as rep',$v->id))->first()->rep;
        }
        
        
        // 用户回答
        $user_rep = Reply::where('uid',$id)->orderBy('created_at','desc')->get();
        $rep_num = 0;
        foreach($user_rep as $k=>$v){
            $rep_num +=1;

        }

        $u = User::find($id);
        // 用户关注话题
        $tops = $u->usertopic()->orderBy('created_at','desc')->get();
        $top_num = 0;
        foreach($tops as $k=>$v){
            $top_num +=1;

        }

        // 关注用户
        $con_user = UserConcern::where('uid',$id)->select(DB::raw('cid'))->get();
        $con = [];
        foreach($con_user as $k=>$v){
            $con[] = User::find($v->cid)->userinfo($v->cid)->first();
            
        }
        $con_num = count($con);
      
        // 加载模板
        return view('home.user.info',['user'=>$user,'uid'=>$id,
            'user_pro'=>$user_pro,'pro_num'=>$pro_num,
            'user_rep'=>$user_rep,'rep_num'=>$rep_num,
            'top_num'=>$top_num,'tops'=>$tops,
            'con_num'=>$con_num ,'con'=>$con,

        ]);

    }

    /**
     * 修改用户信息
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取用户信息
        $user = DB::table('user_details')->where('uid','=',$id)->first();
        // 加载模板
        return view('home.user.edit',['user'=>$user]);
    }

    /**
     * 保存用户信息到数据库
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $user = UserDetail::where('uid',$id)->first();
        // dd($user);
        // 接收数据
        $user->uname = $request->input('uname');
        $user->sex = $request->input('sex');
        $user->signature = $request->input('signature');
        $user->addr = $request->input('addr');
        $res = $user->save();
        if($res){
            return redirect('/home/user');
        }else{
            return back();
        }

       

    }


    /**
     * 修改封面
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cover_upload(Request $request,$id)
    {
        // 验证封面
        // 验证文件是否上传
        if ($request->hasFile('cover')) {
            
            // 获取上传文件
            $cover = $request->file('cover');

            // 获取上传文件后缀
            $ext = $cover->getClientOriginalExtension();
            // 拼接文件名
            $file_name = date('YmdHis',time()).mt_rand(100000,999999).'.'.$ext;
            $dir_path = 'uploads/'.date('Ymd',time());
            // 移动文件
            $res1 = $cover->move($dir_path,$file_name);
            if ($res1) {
                $cover_path = '/'.$dir_path.'/'.$file_name;

                
            } else {
                $str = [
                    "code"=>'1'
                    ,"msg"=>"封面上传失败"
                    ,"data"=>[
                        "src"=>'/uploads/001.jpg'
                    ]
                        
                    
                ];
                return Response()->json($str);
            }
            
            // 保存至数据库
            $res_cov = UserDetail::where('uid',$id)->update(['cover'=>$cover_path]);
             if($res_cov){
                $str = [
                    "code"=>'0'
                    ,"msg"=>"封面上传成功"
                    ,"data"=>[
                        "src"=>$cover_path
                    ]
                        
                    
                ];
                return Response()->json($str);
            }else{
                $str = [
                    "code"=>'1'
                    ,"msg"=>"封面上传失败"
                    ,"data"=>[
                        "src"=>'/uploads/001.jpg'
                    ]
                        
                    
                ];
                return Response()->json($str);
            }
        }
    }


    /**
     * 修改头像
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function face_upload(Request $request,$id)
    {
        // 验证头像
        // 验证文件是否上传
        if ($request->hasFile('face')) {
            
            // 获取上传文件
            $face = $request->file('face');

            // 获取上传文件后缀
            $ext = $face->getClientOriginalExtension();
            // 拼接文件名
            $file_name = date('YmdHis',time()).mt_rand(100000,999999).'.'.$ext;
            $dir_path = 'uploads/'.date('Ymd',time());
            // 移动文件
            $res2 = $face->move($dir_path,$file_name);
            if ($res2) {
                $face_path = '/'.$dir_path.'/'.$file_name;
                
            } else {
                $str = [
                    "code"=>'1'
                    ,"msg"=>"头像上传失败"
                    ,"data"=>[
                        "src"=>'/uploads/001.jpg'
                    ]
                        
                    
                ];
                return Response()->json($str);
            }
          

            $res_face = UserDetail::where('uid',$id)->update(['face'=>$face_path]);
            if($res_face){
                $str = [
                    "code"=>'0'
                    ,"msg"=>"头像上传成功"
                    ,"data"=>[
                        "src"=>$face_path
                    ]  
                ];
                return Response()->json($str);
            }else{
               $str = [
                    "code"=>'1'
                    ,"msg"=>"头像上传失败"
                    ,"data"=>[
                        "src"=>'/uploads/001.jpg'
                    ]
                        
                    
                ];
                return Response()->json($str);
            }
        }
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


    /**
     * 
     *
     * 
     * @return \Illuminate\Http\Response
     */
    static function upload(Request $request,$name)
    {
        
        // 验证文件是否上传
        if ($request->hasFile($name)) {
            // 验证文件是否有效
            if ($request->file($name)->isValid()) {
                // 获取上传文件
                $file = $request->file($name);

                // 获取上传文件后缀
                $ext = $file->getClientOriginalExtension();
                // 拼接文件名
                $file_name = date('YmdHis',time()).mt_rand(100000,999999).'.'.$ext;
                $dir_path = 'uploads/'.date('Ymd',time());
                // 移动文件
                $res1 = $file->move($dir_path,$file_name);
                if ($res1) {
                    return $file_path = '/'.$dir_path.'/'.$file_name;
                    
                } else {
                   return '封面上传失败';
                }
            }else{
                return '上传文件无效';
            }
        }else{
            return '请选择上传文件';
        }

    }


    /**
     * 显示设置页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function set()
    {
        // 通过传入用户id , 查找屏蔽用户id
        $id = session('uid');
        $UserShield = UserShield::where('uid',$id)->get();
        // 定义一个空数组,保存用户id
        $sids = [];
        // 遍历
        foreach($UserShield as $k=>$v){
            $sids[] = $v->sid;
        }
        // 查找屏蔽用户信息
        $users = User::whereIn('id',$sids)->get();
        // 加载设置页面
        return view('home.user.set',['users'=>$users]);

    }

    /**
     * 显示设置页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setpassword(Request $request)
    {
        // 验证
        $this->validate($request, [
            'upwd' => 'required|regex:/^[a-zA-Z0-9_]{6,16}$/',
            'reupwd'=> 'required|same:upwd'
            
        ],[
            'upwd.required'=>'密码不能为空',
            'upwd.regex'=>'密码格式错误',
            'reupwd.required'=>'确认密码不能为空',
            'reupwd.same' => '两次密码不一致'
            
        ]);
        $id = session('uid');
        $user = User::find($id);
        // dd($user);
        $user->upwd = Hash::make($request->input('upwd'));
        if($user->save()){
            return back()->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }

    }

    /**
     * 发送验证码
     *
     * @param  int  $id
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
     * 发送验证码
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setphone(Request $request)
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
        $id = session('uid');
        $user = User::find($id);
        $user->tel = $request->input('tel');
        $res = $user->save();
        if($res){
            session(['uid'=>$user->id]);
            return back()->with('success','手机号绑定成功');
        }else{
            return back()->with('error','手机号绑定失败');
        }
    }

    /**
     * 绑定邮箱
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setemail(Request $request)
    {
        $id = session('uid');
        $user = User::find($id);
        // 接收上传数据
        $user->email = $request->input('email');
        // dd($user->email);
        // dd($user->save());
        if($user->save()){
            return back()->with('success','邮箱绑定成功');
        }else{
            return back()->with('error','邮箱绑定失败');
        }
        
    }
}
