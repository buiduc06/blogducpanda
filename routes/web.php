<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function() {
	$allcate1=App\categories::where('status','>',0)->get();

  return view('client.page.home',compact('allcate1','TimelinePost','LatestPost','getTag'));
})->name('homepage');
Route::get('/home', function() {
    return redirect(route('homepage'));
});
Route::pattern('category', '[a-z\-]+');
Route::get('category/{category}/{post?}', function ($category,$post=null) {
	// check sự tồn tại của danh mục
	$getDataCategory=App\subcategories::where('slug',$category)->first();
  if ($getDataCategory != null) {
    	if ($post==null) { // nếu không tồn tại post thì cho vào danh mục
       $getDataPost=App\posts::where('cate_id',$getDataCategory->id)->paginate(8);
       return view('client.page.category',compact('getDataCategory','getDataPost'));
     }else{
      $getPost=App\posts::where('slug',$post)->first();
      if ($getPost !=null) {
       return view('client.page.post',compact('getDataCategory','getPost'));
     }else{
       return abort(404);
     }

   }
 }
 return abort(404);
})->name('category');


Route::get('/tag/{tag}', function($tag) {
  echo "$tag";
  return view('client.page.tag');
});

Route::get('/search', function() {
	$q=$_GET['q'];
	$resultSearch=App\posts::where('title','like',"%$q%")->paginate(10);
	$resultSearch->withPath("search?q=$q");
  return view('client.page.search',compact('resultSearch','q'));
});



// login/logout/register

Auth::routes();

Route::get('admin/home', 'HomeController@index')->name('home')->middleware('author.roles');

Route::get('/logout', function() {
  Auth::logout(); 
  return redirect(route('homepage'))->with('msg','Đăng Xuất Thành Công');
})->name('logout');


// test
Route::get('ducpanda', function() {
    return view('test');
});


//error view
Route::get('error404', function() {
    return view('error.404');
})->name('error404');

Route::get('error500', function() {
    return view('error.500');
})->name('error500');
?>

