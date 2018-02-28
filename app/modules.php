<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modules extends Model
{
    public $table='module';

      public function role_modules()
    {
    	return $this->belongsTo('App\role_modules','module_id','id');

    }
    public function sub_modules()
    {
    	return $this->hasMany('App\sub_modules','module_id','id');
    }
}
