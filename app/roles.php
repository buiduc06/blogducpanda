<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    public $table= 'roles';

    public function user_roles()
    {
    	return $this->hasMany('App\roles','id','id_roles');

    }
    public function role_modules()
    {
    	return $this->hasMany('App\role_modules','role_id','id');

    }
}
