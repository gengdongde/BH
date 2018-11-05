<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Topic_details;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class TopicController extends Controller
{

    /**
     * 话题列表
     *
     * @return admin.topic.index 视图
     */
    public function index()
    {
        $data = Topic::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        // dd($data);
         return view('admin.topic.index',['title'=>'话题列表','data'=>$data]);
    }

    /**
     *添加话题
     *
     * @return admin.topic.create 视图
     */
    public function create()
    {
        return view('admin.topic.create',['title'=>'话题添加']);
    }

    /**
     * 验证tname ajax
     *
     * @return error不可用  success可用
     */
    public function is_to(Request $request)
    {   //接收tname字段
        $tname = $request->input('tname');
        $res = Topic::where('tname',$tname)->value('tname');
        if($res){
            echo 'error';
        }else{
            echo 'success';
        }
    }

    /**
     * 添加话题
     *
     * @param  表单数据 $request
     * @return true 跳话题列表  false 跳回表单
     */
    public function store(Request $request)
    {   //开启事务
        DB::beginTransaction();
        $req = $request->except('_token');
        //设置字段数据
        $data['created_at'] = date('Y-m-d H:i:s',time());
        $data['tname'] = $req['tname'];
        if($req['id'] == '0'){
            $data['pid'] = '0';
            $data['path'] = '0';
        }else{
            $pas = Topic::where('id',$req['id'])->first();
            $data['path'] = $pas['path'].','.$pas['id'];
            $data['pid'] = $req['id'];
        }
        // 添加到topic
        $res = Topic::insertGetId($data);
        if(!$res){
            //回滚事务
            DB::rollBack();
            return back()->with('error','添加失败!!!');
        }
        
        // topic_details 数据
        $to_d = $request->except('_token','tname','id');
        $to_d['tid'] = $res;
        $to_d['created_at'] = $data['created_at'];
        //入库
        $res = Topic_details::insert($to_d);
        if($res){
            //提交事务
            DB::commit();
            return redirect('/admin/topic')->with('success','添加成功');
        }else{
            //回滚事务
            DB::rollBack();
            return back()->with('error','添加失败!!!');
        }


    }

    /**
     * 话题详情.
     *
     * @param  topic  $id
     * @return admin.topic.show 视图
     */
    public function show($id)
    {   //获取详情表信息
        $data = Topic_details::where('tid',$id)->first();
        // dd($data);
        return view('admin.topic.show',['title'=>'话题详情','data'=>$data]);
    }

    /**
     * 话题详情修改表单
     *
     * @param  topic_details  $id
     * @return admin.topic.top_edit 视图
     */
    public function top_edit($id)
    {
        //获取详情表信息
        $data = Topic_details::where('id',$id)->first();

                // dd($data);
        return view('admin.topic.top_edit',['title'=>'修改话题详情','data'=>$data]);
    }

    /**
     * 话题详情修改
     *
     * @param  topic_details  $id
     * @return \Illuminate\Http\Response
     */
    public function top_update(Request $request, $id)
    {   //获取表单数据
        $req = $request->except('_token');

        $res = Topic_details::where('id',$id)->update($req);
        if($res){
            return redirect("/admin/topic")->with('success','修改成功');
        }else{
            return back()->with('error','修改失败!!!');
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
}
