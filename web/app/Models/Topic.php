<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
	protected $table = 'topic';
	protected $primaryKey = 'id';

    
    /**
     * 关联 topic_details 一对一
     *
     * @return 关联对象
     */
	public function topic_details()
    {
        return $this->hasOne('App\Models\Topic_details','tid');
    }
}
