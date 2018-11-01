<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
	protected $table = 'topic';
	protected $primaryKey = 'id';

	public function topic_details()
    {
        return $this->hasOne('App\Models\Topic_details','tid');
    }
}
