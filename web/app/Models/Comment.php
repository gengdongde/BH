<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // 数据表和主键
    public $table = 'comment';
    public $primaryKey = 'id';


    /**
     * 获取此评论的话题回答
     */
    public function reply()
    {
    	return $this->belongsTo('App\Models\Reply','rid','id');
    }

    /**
     * 获取此评论的话题回答
     */
    public function user_detail()
    {
    	return $this->belongsTo('App\Models\UserDetail','uid','uid');
    }
}
