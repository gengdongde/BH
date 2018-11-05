<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'reply';
    protected $primaryKey = 'id';


    /**
     * 关联 reply_content 一对一
     *
     * @return 关联对象
     */
	public function reply_content()
    {
        return $this->hasOne('App\Models\Reply_content','rid','id');
    }

    /**
     *定义相对的关联 problem 一对多
     *
     * @return 关联对象
     */
    public function problem()
    {
    	return $this->belongsTo('App\Models\Problem','pid','id');
    }    
    /**
     *定义相对的关联 User 一对多
     *
     * @return 关联对象
     */
    public function user_detail()
    {
    	return $this->belongsTo('App\Models\UserDetail','uid','uid');
    }




    /**
     * 获取回答的所有评论
     */
    public function comment()
    {
        return $this->hasMany('App\Models\Comment','rid','id');
    }
}
