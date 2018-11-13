<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\UserDetail;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid = session('uid');
        $user = UserDetail::find($uid);
        // $user = DB::table('user_details')->where('uid','=',$uid)->first();
       // dd($user);
        // 加载模板
        return view('home.user.userinfo',['user'=>$user]);
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
        // 获取用户信息
        $user = DB::table('user_details')->where('uid','=',$id)->first();
        // 加载模板
        return view('home.user.edit',['user'=>$user]);
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
        
        $user = UserDetail::find($id);
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




}
