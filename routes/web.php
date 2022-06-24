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
Route::group(['middleware' => ['forntendmaintainance']], function () { 
	Route::get('/', 'HomeController@index')->name('home');

	Route::get('/{slug}', 'HomeController@otherPages')->name('slug_url');

	Route::get('/blogs/{slug}', 'HomeController@detailBlog')->name('full_blog');
	});

Route::get('under-construction',function(){
	return view('underconstruction');
});




/*Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/upload', 'HomeController@upload');*/
