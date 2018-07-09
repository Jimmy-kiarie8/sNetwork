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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('signup/activate/{token}', 'AuthController@signupActivate');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/social', function () {
	    	// $newrole = Auth::user()->roles;
	    	// foreach ($newrole as $name) {
	    	// 	$rolename = $name->name;
	    	// }
	    	// return view('welcome', compact('rolename'));
			return view('welcome');
	});


	Route::resource('users', 'UserController');
	Route::resource('blog', 'BlogController');



	// Blog	
	Route::post('/getBlog', 'BlogController@getBlog')->name('getBlog');
	Route::post('/blogImage/{id}', 'BlogController@blogImage')->name('blogImage');
	Route::post('/getImgBlog/{id}', 'BlogController@getImgBlog')->name('getImgBlog');
	Route::post('/BlogImage', 'BlogController@BlogImage')->name('BlogImage');
	
	// Blog	Comments
	Route::post('/getPostCom', 'CommentsController@getPostCom')->name('getPostCom');
	Route::post('/getSingleCom/{id}', 'CommentsController@getSingleCom')->name('getSingleCom');
	Route::post('/Postcom/{id}', 'CommentsController@Postcom')->name('Postcom');
	Route::post('/getBlogC/{id}', 'CommentsController@getBlogC')->name('getBlogC');

	
	Route::post('/getUsers', 'UserController@getUsers')->name('getUsers');
	Route::post('/profile/{id}', 'UserController@profile')->name('profile');
	Route::post('/userUpdate', 'UserController@userUpdate')->name('userUpdate');
	// Route::post('/fewUsers', 'UserController@fewUsers')->name('fewUsers');
	// Route::post('/getRoles', 'UserController@getRoles')->name('getRoles');
});