<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Link;
use DB;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取数据
        $links = Link::all();
        // 加载模板
        return view('admin.link.index',['title'=>'友情链接列表','links'=>$links]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加模板
        return view('admin.link.create',['title'=>'添加友情链接']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // 验证提交数据
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required',
            'logo'=>'required'
        ],[
            'name.required'=>'网站名称不能为空',
            'url.required'=>'网址不能为空', 
            'logo.required'=>'请选择网址logo',
        ]);

        // 接收上传数据
        $link = new Link;
        $link->name = $request->input('name');
        $link->url = $request->input('url');
        
        // 接收上传文件
        $file = $request->file('logo');
        
        // 判断文件是否有效
        if ( $file->isValid() ) { 
            // 获取上传文件后缀
            $ext = $file->getClientOriginalExtension();
            // 拼接文件名
            $file_name = date('YmdHis',time()).mt_rand(1000,9999).'.'.$ext;
            $dir_path = 'uploads/'.date('Ymd',time());
            $res1 = $file->move($dir_path,$file_name);
            if ($res1) {
                $link->logo = '/'.$dir_path.'/'.$file_name;
                
            } else {
                return back()->with('error','LOGO上传失败');
            }
            $res2 = $link->save();
            if ( $res2 ){
                return redirect('admin/link')->with('success','添加成功');
            } else {
                return back()->with('error','添加失败');
            }
        } else {
            return back()->with('error','文件无效');
        }
    }

    /**
     * Display the specified resource.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function btn(Request $request)
    {

        //获取提交数据
        $id = $request->input('id');
        $link = Link::find($id);
        
        if($request->input('status') == 1){
            $link->status = 2;
            $res = $link->save();
            if($res){
                echo 'success';
            }else{
                echo 'error';
            }
            exit;
        }else if($request->input('status') == 2){
            echo 'error';
             exit;
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
        
       
        // 删除
        $res = Link::destroy($id);
        
        // 判断
        if($res){
            echo 'success';
        }else{
            echo 'error';
        }
        exit;
    }
}
