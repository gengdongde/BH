<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    //数据表名称和主键
    public $table = 'problem';
    public $primaryKey = 'id';

























    /**
     * 获取拥有此问题的话题分类
     */
    public function problemtopic()
    {
        return $this->belongsTo('App\ModelsTopic','tid');
    }

    /**
     * 获取此问题的用户信息
     */
    public function problemuser()
    {
    	
    }

}
