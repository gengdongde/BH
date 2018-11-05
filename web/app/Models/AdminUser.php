<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
   	protected $table = 'admin_user';
   	protected $primaryKey = 'id';

   	    /**
     * 关联 role 多对多
     *
     * @return 关联对象
     */
    public function role()
    {
    	return $this->belongsToMany('App\Models\Role', 'adminuser_role','uid' , 'role_id');
    }

}
