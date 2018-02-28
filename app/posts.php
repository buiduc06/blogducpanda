<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $table='posts';
    public function tag(){
    	return $this->hasMany('App\tag','id_product','id');
    }
    public function gallery(){
    	return $this->hasMany('App\galleries','id_post','id');
    }
    public function user(){
        return $this->belongsTo('App\users','create_by','id');
    }
    public function subcategory(){
    	return $this->belongsTo('App\subcategory','id','cate_id');
    }
    public function shownamesubcate(){
    	return $namecate=subcategories::where('id',$this->cate_id)->first();
    }

    public function getPostRelated(){
        return $getPostRelated=posts::where('cate_id',$this->cate_id)->where('id','!=',$this->id)->inRandomOrder()->take(3)->get();
    }
    public function getUser(){
        return $getUser=User::find($this->create_by);
    }

     // public function UploadImage($rq,$title)
     // {
     //        $file = $rq;
     //        $photoname=str_slug($title);
     //        $file->move('images',$filename);
     //        return $photoname;
     // }



    
}
