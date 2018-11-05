<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $table = 'access';
    protected $primaryKey = 'id';

    /**
     * 关联 access 多对多
     *
     * @return 关联对象
     */
    public function role()
    {
    	return $this->belongsToMany('App\Models\Role')->withTimestamps();
    }
}
