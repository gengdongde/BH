<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetail extends Model
{
	// 软删除
	use SoftDeletes;
	protected $dates = ['deleted_at'];
    // 数据表和主键
    public $table = 'user_details';
    public $primaryKey = 'id';

    // 建立用户详情表与用户表的属于关系
    public function detail()
    {
    	return $this->belongsTo('App\Models\User','uid');
    }

    /**
     *问题回答表关联 一对多
     *
     * @return 关联对象
     */
    public function reply()
    {
        return $this->hasMany('App\Models\Reply','uid','uid');
    }


    






















    /**
     * 建立用户详情表与问题体温表一对多关联
     */
    public function problemuser()
    {
        return $this->hasMany('App\Models\Problem','uid');
    }
   
    
}
