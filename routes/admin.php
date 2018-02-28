<?php 
use Illuminate\Http\Request;

Route::get('/', function() {
	return view('admin.page.home');
})->name('admin.index'); 
Route::get('index', function() {
	return view('admin.page.home');
})->name('admin.index');     



Route::group(['prefix' => 'posts' ,'middleware' => 'module.roles'], function() {
	$n='admin.posts';

	Route::get('/','PostsController@index')->name($n);
	Route::get('create','PostsController@create')->name($n.'.create');
	Route::post('store','PostsController@store')->name($n.'.store');
	Route::get('delete/{id}','PostsController@destroy')->name($n.'.delete');
	Route::get('edit/{id}','PostsController@edit')->name($n.'.edit');
	Route::post('update/{id}','PostsController@update')->name($n.'.update');
});



//category route
Route::group(['prefix' => 'categories','middleware' => 'module.roles'], function() {
	$n='admin.categories';

	Route::get('/','CategoryController@index')->name($n);
	Route::get('create','CategoryController@create')->name($n.'.create');
	Route::get('edit/{id}','CategoryController@edit')->name($n.'.edit')->where('id', '[0-9]+');
	Route::post('update/{id}','CategoryController@update')->name($n.'.update')->where('id', '[0-9]+');
	Route::post('store','CategoryController@store')->name($n.'.store');
	Route::get('delete/{id}','CategoryController@destroy')->name($n.'.delete')->where('id', '[0-9]+');

});




// users route
Route::group(['prefix' => 'users','middleware' => 'module.roles'], function() {
	$n='admin.users';

	Route::any('/','UsersController@index')->name($n);
	Route::get('create','UsersController@create')->name($n.'.create');
	Route::post('store','UsersController@store')->name($n.'.store');
	Route::post('update/{id}','UsersController@update')->name($n.'.update');
	Route::get('delete/{id}','UsersController@destroy')->name($n.'.delete');
	Route::get('edit/{id}','UsersController@edit')->name($n.'.edit');
});

Route::group(['prefix' => 'modules','middleware' => 'module.roles'], function() {
	$n='admin.modules';

	Route::any('/','ModulesController@index')->name($n);
	Route::get('create','ModulesController@create')->name($n.'.create');
	Route::post('store','ModulesController@store')->name($n.'.store');
	Route::post('update/{id}','ModulesController@update')->name($n.'.update');
	Route::get('delete/{id}','ModulesController@destroy')->name($n.'.delete');
	Route::get('edit/{id}','ModulesController@edit')->name($n.'.edit');

	Route::group(['prefix' => 'submodules'], function() {
	   $n='admin.modules.submodules';

	Route::any('/','ModulesController@index')->name($n);
	Route::get('create','ModulesController@create')->name($n.'.create');
	Route::post('store','ModulesController@store')->name($n.'.store');
	Route::post('update/{id}','ModulesController@update')->name($n.'.update');
	Route::get('delete/{id}','ModulesController@destroy')->name($n.'.delete');
	Route::get('edit/{id}','ModulesController@edit')->name($n.'.edit');
	});
});


?>