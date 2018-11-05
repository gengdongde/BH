<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id';

    /**
     * 关联 Access 多对多
     *
     * @return 关联对象
     */
    public function access(){
    	return $this->belongsToMany('App\Models\Access', 'role_access','role_id' , 'access_id');
    }


    /**
     * 相对关联 adminuser 多对多。
     */
    public function adminuser()
    {
        return $this->belongsToMany('App\Models\AdminUser');
    }
}
