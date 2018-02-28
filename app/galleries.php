<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galleries extends Model
{
   protected $table='galleries';
   public function post(){
   		return $this->belongsTo('App\posts','id','id_post');
   }
}
