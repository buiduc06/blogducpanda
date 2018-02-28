<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $table='tag';

    public function post(){
    	return $this->belongsTo('App\posts','id','id_product');
    }
}
