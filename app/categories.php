<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table='categories';
    public function subcategory(){
    	return $this->hasMany('App\subcategories','id_cate','id');
    }
   
   public function showallsubcate(){
    return $showallsubcate=subcategories::where('cate_id',$this->id);
   }
    // public function showfisrtpost(){
    // 	return $fisrtpost=posts::where('cate_id',$this->id)->first();
    // }
}
