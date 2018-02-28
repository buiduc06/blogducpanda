<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subcategories extends Model
{
    protected $table='subcategories';
    public function category(){
    	return $this->belongsTo('App\categories','id','id_cate');
    }
    public function post(){
    	return $this->hasMany('App\posts','cate_id','id');
    }
    public function getFirstPosts(){
    	return $getPosts=posts::where('cate_id',$this->id)->first();
    }
    public function getAllPosts(){
    	return $getAllPosts=posts::orderBy('id','desc')->simplePaginate(1);

    }
    public function getAllPosts2(){
    	return $posts=posts::where('cate_id',$this->id)->where('id','>',0)->orderBy('id','asc')->paginate(5);

    }

    // lấy ra danh mục cha
   public function getCategory(){
        return $getCategory=categories::where('id',$this->id_cate)->first();
    }


    // public function Get8Post(){
    // 	return $geet8posts=posts::where('cate_id',$this->id)->orderBy('id','desc')->get();
    // }
    // public function Get8Postlast(){
    // 	return $Get8Postlast=posts::where('cate_id',$this->id)->orderBy('id','desc')->get();
    // }
    // id laf forgetkey
    // id_cate la local_key
}
