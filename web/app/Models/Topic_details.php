<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic_details extends Model
{
    protected $table = 'topic_details';
    protected $primaryKey = 'id';

    public function topic()
    {
        return $this->belongsTo('App\Models\Topic','tid');
    }
}
