<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_roles extends Model
{
    public $table='user_roles';
    public function user()
    {
    	return $this->hasMany('App\User','id_user','id');
    }
    public function roles()
    {
    	return $this->belongsTo('App\roles','id_roles','id');

    }
}
