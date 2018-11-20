<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
class RedisTopicConsole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redistopic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '定时更新,redis里的topic?';

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
     * 从redis中取出数据存入数据库.把radis中的数据更新
     *
     * @return mixed
     */
    public function handle()
    {
        // $user = User::get();
        // foreach($user as $k => $v){
        //     $uid[] = $v->id;
        // }
        
    }
}
