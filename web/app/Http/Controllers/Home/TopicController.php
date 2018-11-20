<?php

namespace App\Http\Controllers\Home;


use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Problem;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\UserDetail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Redis;

class TopicController extends Controller
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
     * 话题页
     *
     * @return \Illuminate\Http\Response
     */
    public function topic($id='0',$type="raid")
    {
        //获取用户id
        $uid = session('uid');
        //获取关注的所有话题id 查话题
        $utop = DB::table('user_topic')->where('uid',$uid)->get();

        $utopic = null;
        $problem = null;
        if($utop){
            foreach ($utop as $k => $v) {
                $tid[]= $v->tid;
            }
            $utopic = Topic::whereIn('id',$tid)->get();
            if($id != '0'){
                $problem = $this->problem($id,$type);
            }else{
                $problem = $this->problem($utopic[0]->id,$type);
                $id = $utopic[0]->id;
            }
        }
        //查询其他话题
        $topicgs = DB::table('user_topic')->where('uid',$uid)->groupBy('tid')->get(); 
        foreach ($topicgs as $k => $v) {
            $tido[] = $v->tid;
        }
        $topicgs = Topic::whereNotIn('id',$tido)->orderBy(DB::raw('RAND()'))->take(5)->get();
        // 
        return view('home.topic.topic',['utopic'=>$utopic,'problem'=>$problem,'topicgs'=>$topicgs,'id'=>$id]);
    }    
    /**
     * 话题广场页
     *
     * @return home.topic.topics 视图 topicy 一级话题 topice 对应的二级话题
     */
    public function topics($id='1')
    {
        //获取用户id
        $uid = session('uid');
        //所有话题
        $topics = Topic::get(); 
        //获取所有一级话题
        $topicy = $this::tops($topics);
        //获取对应的二级和一级话题

        foreach ($topicy as $k => $v) {
            if($v->id == $id){
                $ftopice = $v;
            }
        }
        $rss = DB::table('user_topic')->where('uid',$uid)->where('tid',$ftopice->id)->first();
        if($rss){
            $ftopice->tis = 2;
        }
        $rss = DB::table('user_topic')->where('uid',$uid)->get();
        $topice = $this::tops($topics,$id);
            foreach ($topice as $k => $v) {
                foreach ($rss as $kk => $vv) {
                    if($v->id == $vv->tid){
                        $v->tis = 2;
                    }
                }
            }
        return view('home.topic.topics',['topicy'=>$topicy,'topice'=>$topice,'ftopice'=>$ftopice]);
    }

    /**
     * 寻找话题
     * @param $obj 话题对象
     * @param $pid 层级
     * @return  $topicy array 话题
     */
    public static function tops($obj,$pid = '0')
    {
        $topicy = [];
        foreach($obj as $k => $v){
            if($v->pid == $pid){
                $topicy[] = $v;
            }
        }
        return $topicy;
    }
    /**
     * 话题详情页.
     * @param topic id $id
     * @param type 判断是简介或问答 hot=问答 intro=简介
     * @return \Illuminate\Http\Response
     */
    public function hot($id,$type)
    {
        $iftopc = DB::table('user_topic')->where('uid',session('uid'))->where('tid',$id)->first();

        $topic = topic::find($id);
        $topf = topic::find($topic->pid); //查父话题
        //获取话题详情
        if($type == 'intro'){
            $type = 'intro';
        }
        //获取讨论(问题-回答) 需要 problem:pname user_details:uname,signature reply:agree reply_content:content
        $problem = [];
        // $agree = null; 
        if($type == 'hot'){
            $problem = $this->problem($id);
           
            $type = 'hot';
            }
        
                //获取关注人数
            $topics = DB::table('user_topic')->groupBy('tid')->select('*',DB::raw('count(tid) as taid'))->orderBy('taid','desc')->where('tid',$id)->value('taid');
            if($topics == null){
                $topics = '0';
            }
             //获取话题下问题条数
            $topro = Problem::groupBy('tid')->select('*',DB::raw('count(tid) as taid'))->orderBy('taid','desc')->where('tid',$id)->value('taid');
            if($topro == null){
                $topro = '0';
            }
        return view('home.topic.hot',['topic'=>$topic,'type'=>$type,'problem'=>$problem,'uts'=>$topics,'topro'=>$topro,'topf'=>$topf,'iftopc'=>$iftopc]);
    }

    /**
     * 关注话题操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function utopic(Request $request)
    {
        if(session('uid') == null)
        {
            return redirect('home/login');
        }
        $uid = session('uid');
        if($request->input('typ') == '1'){
           DB::table('user_topic')->insert(['uid'=>$uid,'tid'=>$request->input('tid'),'created_at'=>date('Y-m-d H:i:s',time())]);
            echo '2';
        }elseif($request->input('typ') == '2'){
           DB::table('user_topic')->where('uid',$uid)->where('tid',$request->input('tid'))->delete();
                echo '1';
            }
    }

    /**
     * 获取某话题下的问题和回答等
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function problem($id,$type='raid')
    {   
        if($type == 'created_at'){
            $problem = Problem::where('tid',$id)->where('report','0')->orderBy('created_at','desc')->get(); //pname
        }else{
            $problem = Problem::where('tid',$id)->where('report','0')->get(); 
        }
       
        if(!$problem){
            return $problem;
        }
        
        foreach ($problem as $k => $v) {
            if($v->reply = Reply::orderBy('agree','desc')->where('pid',$v->id)->first()){
                //查看Redis是否有数据
                if(Redis::exists('replyagree'.$v->reply->id))
                {
                     $res = Redis::get('replyagree'.$v->reply->id); //获取数据
                     $data = unserialize($res); //转数组
                     $v->reply->agree = count($data);
                     
                }
                $v->reply->comment = Comment::groupBy('rid')->select('*',DB::raw('count(rid) as raid'))->orderBy('raid','desc')->where('rid',$v->reply->id)->value('raid');
                $v->reply->user = UserDetail::where('uid',$v->reply->uid)->first();
            }else{
                $v->reply = null;
            }
            
            
            
        }
        return $problem;
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
