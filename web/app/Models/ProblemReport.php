<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProblemReport extends Model
{
    // 表名和主键
    public $table = 'problem_report';
    public $primaryKey = 'id';


      /**
     *定义相对的关联 problem 一对多
     *
     * @return 关联对象
     */
    public function problem()
    {
    	return $this->belongsTo('App\Models\Problem','pid','id');
    }
}
