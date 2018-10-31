<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    //
    public $table = 'user_details';
    public $primaryKey = 'id';

    // 建立用户详情表与用户表的属于关系
    public function detail()
    {
    	return $this->belongsTo('App\Models\User','uid');
    }
    
}
