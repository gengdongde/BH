<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply_content extends Model
{
    protected $table = 'reply_content';
    protected $primaryKey = 'id';

    /**
     *定义相对的关联 reply 一对一
     *
     * @return 关联对象
     */
    public function reply()
    {
        return $this->belongsTo('App\Models\Reply','rid','id');
    }
}
