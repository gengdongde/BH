<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Problem;
use App\Models\UserDetail;
use App\Models\UserConcern;
use App\Models\User;
use App\Models\Link;
use DB;

class IndexController extends Controller
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
     * 首页
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 问题
        $problem = Problem::orderBy('created_at','desc')->get();
        
        foreach($problem as $k=>$v){
            $v->rep = $v->reply($v->id)->orderBy('created_at','desc')->first();
            $v->rep_num = $v->reply($v->id)->select(DB::raw('count(*) as rep',$v->id))->first()->rep;
            $v->user = UserDetail::where('uid',$v->uid)->first();
            
        }
        // 登录用户关注用户
        $uid = session('uid');
        
        // 关注用户
        $con_user = UserConcern::where('uid',$uid)->select(DB::raw('cid'))->get();
        if($con_user->first()){
            foreach($con_user as $k=>$v){
                $con_ids[] = User::find($v->cid)->userinfo($v->cid)->first()->uid; 
            }
            $con_pro = Problem::whereIn('uid',$con_ids)->get();
            foreach($con_pro as $k=>$v){
                $v->rep_num = $v->reply($v->id)->select(DB::raw('count(*) as rep',$v->id))->first()->rep;
                $v->user = UserDetail::where('uid',$v->uid)->first();
                
            }
        }else{
            $con_pro = [];
        }

        

        // 热榜
        $hot_pro = Problem::orderBy('clicks','desc')->orderBy('created_at','desc')->get();
        foreach($hot_pro as $k=>$v){
            $v->rep_num = $v->reply($v->id)->select(DB::raw('count(*) as rep',$v->id))->first()->rep;
            $v->user = UserDetail::where('uid',$v->uid)->first();
            
        }

        // 友情链接
        $links = Link::where('status','2')->get();
        // dd($links);
       
        //加载模板
        return view('home.index.index',['problem'=>$problem,'con_pro'=>$con_pro,'hot_pro'=>$hot_pro,'links'=>$links]);
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
