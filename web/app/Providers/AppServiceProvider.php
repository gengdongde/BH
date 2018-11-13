<?php

namespace App\Providers;
use Validator;
use Illuminate\Support\ServiceProvider;
use DB;
use App\Models\Topic;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
                //热门话题 的数据获取
            $utc = DB::table('user_topic')->groupBy('tid')->select('*',DB::raw('count(tid) as taid'))->orderBy('taid','desc')->limit(5)->get();
            $tc = Topic::get();
            $topic = [];
            foreach($tc as $k => $v){
                foreach ($utc as $kk => $vv) {
                    if($v->id == $vv->tid){
                        $v['taid'] = $vv->taid;
                        $topic[] = $v;
                    }
                }
                
            }
        //共享所有数据
        view()->share('topicr',$topic);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
