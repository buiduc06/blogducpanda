<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sub_modules extends Model
{
    public $table='sub_modules';

    public function modules()
    {
    	return $this->belongsTo('App\modules','id','module_id');
    }
}
