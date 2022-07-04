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

    Route::get('privacy-policy',function(){
    	//dd($globalSettings);
    	$data = [
           'pagename'=>'Privacy Policy'
    	];
	return view('documents',compact('data'));
       });

	Route::get('/{slug}', 'HomeController@otherPages')->name('slug_url');

	Route::get('/blogs/{slug}', 'HomeController@detailBlog')->name('full_blog');

	Route::post('/contact-us', 'HomeController@sendEmailContact')->name('contact_us_send_email');

	});

Route::get('under-construction',function(){
	return view('underconstruction');
});




/*Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/upload', 'HomeController@upload');*/
