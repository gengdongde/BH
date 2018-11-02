<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    //数据表名称和主键
    public $table = 'problem';
    public $primaryKey = 'id';

    
    /**
     * 关联 Reply 一对多
     *
     * @return 关联对象
     */
    public function reply()
    {
        return $this->hasMany('App\Models\Reply','pid','id');
    }

}
