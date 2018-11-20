<?php

namespace App\Console\Commands;
use Redis;
use App\Models\Reply;
use Illuminate\Console\Command;

class RedisReplyConsole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redisreplyconsole';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '每一个小时,插入数据一次';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 读取redis数据 插入数据库.
     *
     * @return mixed
     */
    public function handle()
    {
                $reply = Reply::all();
        foreach ($reply as $k => $v) {
            if(Redis::exists('replyagree'.$v->id)){
             $res = Redis::get('replyagree'.$v->id); //获取数据
                $data = unserialize($res); //转数组;
                Reply::where('id',$v->id)->update(['agree'=>count($data)]);
                Redis::setex('replyagree'.$v->id,3600,serialize($data));
            }
        } 
    }
}
