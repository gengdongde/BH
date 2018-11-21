<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\Problem;
use App\Models\Reply;
use App\Models\Topic;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ExploreController extends Controller
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
     * 发现页面.
     *
     * @return prodate 编辑推荐数据   prof  编辑推荐的第一条  retent 今天最热 mtent 本月最热 pagn 哪个列表
     * topic 热门话题
     */
    public function explore()
    {
        //判断哪个列表在翻页 1=今日最热列表 2=本月最热列表
            //读取静态文件 判断是否需要生成
        if(empty($_GET['page']) && empty($_GET['upagn']) && @$html = file_get_contents('./explores/'.date('Y-m-d',time()).'.html')){
            return $html;
        }elseif(!empty($_GET['page']) && @$html = file_get_contents('./explores/'.date('Y-m-d',time()).'page'.$_GET['page'].'.html')){
            return $html;
        }elseif(!empty($_GET['upagn']) && @$html = file_get_contents('./explores/'.date('Y-m-d',time()).'upagn'.$_GET['upagn'].'.html')){
            // dd('123');
            return $html;
        }else{
        $pagn = 1;
        if(!empty($_GET['page'])){
            $pagn = 2;
        }
        //编辑推荐的数据
        $prodate = Reply::groupBy('pid')->select('*',DB::raw('count(pid) as paid'))->orderBy('paid','desc')->limit(5)->get();
            //单独拿出第一条
            $prof = $prodate[0];
            unset($prodate[0]);

        //获取当天的新数据 通过点赞量降序
            $retent = null;
            $retent = Reply::orderBy('agree','desc')->where('report','0')->where(DB::raw('date_format(created_at,"%Y-%m-%d")'),date('Y-m-d', time()))->paginate(2,$columns = ['*'],'upagn');

        //获取当月的新数据 通过点赞量降序
            $mtent = null;
            $mtent = Reply::orderBy('agree','desc')->where('report','0')->where(DB::raw('date_format(created_at,"%Y-%m")'),date('Y-m', time()))->paginate(2);

            //获取页面html代码生成静态页
         $str = view('home.explore.index',['prodate'=>$prodate,'prof'=>$prof,'retent'=>$retent,'mtent'=>$mtent,'pagn'=>$pagn]);
         $html = response($str)->getContent();
                //生成第一个页面的静态页
             if(empty($_GET['page']) && empty($_GET['upagn'])){
                $ymdate = date("Y-m-d",strtotime("-1 day")).'.html';
                    @unlink('./explores/'.$ymdate);
                    //生成静态文件名
                 $sthtml = date('Y-m-d',time()).'.html';
                    //存放到 /explores
                 $file = file_put_contents('./explores/'.$sthtml,$html);
                 return $html;
            }elseif(!empty($_GET['page'])){
                    $ymdate = date("Y-m-d",strtotime("-1 day")).'page'.$_GET['page'].'.html';
                    @unlink('./explores/'.$ymdate);
                    //生成静态文件名
                 $sthtml = date('Y-m-d',time()).'page'.$_GET['page'].'.html';
                    //存放到 /explores
                 $file = file_put_contents('./explores/'.$sthtml,$html);
                 return $html;
            }elseif(!empty($_GET['upagn'])){
                    $ymdate = date("Y-m-d",strtotime("-1 day")).'upagn'.$_GET['upagn'].'.html';
                    @unlink('./explores/'.$ymdate);
                        //生成静态文件名
                 $sthtml = date('Y-m-d',time()).'upagn'.$_GET['upagn'].'.html';
                    //存放到 /explores
                 $file = file_put_contents('./explores/'.$sthtml,$html);
                 return $html;
            }
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
