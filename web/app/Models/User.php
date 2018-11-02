<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
	// 软删除
	use SoftDeletes;
	protected $dates = ['deleted_at'];
    //数据表名和主键
    public $table = 'user';
    public $primaryKey = 'id';

    // 建立用户表与用户详情一对一关系
    public function userinfo()
    {
    	return $this->hasOne('App\Models\UserDetail','uid');
    }
    

}
