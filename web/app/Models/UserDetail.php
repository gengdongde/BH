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
    
}
