<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic_details extends Model
{
    protected $table = 'topic_details';
    protected $primaryKey = 'id';

    
    /**
     *定义相对的关联 topic 一对一
     *
     * @return 关联对象
     */
    public function topic()
    {
        return $this->belongsTo('App\Models\Topic','tid');
    }
}
