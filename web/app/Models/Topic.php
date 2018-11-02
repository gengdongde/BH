<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
	protected $table = 'topic';
	protected $primaryKey = 'id';




	public function topic_details()
    {
        return $this->hasOne('App\Models\Topic_details','tid');
    }





















    /**
     * 属于该关注类型的用户。
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    
    /**
     * 建立话题分类与提问问题的一对多关系
     */
    public function topicproblem()
    {
        return $this->hasMany('App\Models\Problem','tid');
    }




















}
