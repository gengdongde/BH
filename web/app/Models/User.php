<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    //
    public $table = 'user';
    public $primaryKey = 'id';

    // 建立用户表与用户详情一对一关系
    public function userinfo()
    {
    	return $this->hasOne('App\Models\UserDetail','uid');
    }
   
}
