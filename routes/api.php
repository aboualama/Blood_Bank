<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::pattern('id', '[0-9]+');
 
 
Route::group(['prefix' => 'v1.1' , 'namespace' => 'Api'] , function(){    	
  
	Route::post('register' , 'AuthController@register');
	Route::post('login' , 'AuthController@login')->name('login');



	Route::group(['middleware' => 'auth:api'] , function(){  

		Route::get('profile' , 'AuthController@profile'); 
		Route::put('profile/update' , 'AuthController@update'); 

		Route::get('posts' , 'PostController@index');
		Route::get('post/{id}' , 'PostController@show'); 

		Route::get('donation' , 'DonationController@index');
		Route::get('donation/{id}' , 'DonationController@show');
		Route::post('donation' , 'DonationController@create');   

		Route::post('notification/{id}/edit' , 'NotificationController@edit'); 
		Route::put('notification' , 'NotificationController@update'); 

		Route::post('favorite/{post}' , 'FavoriteController@addfavorite');
		Route::get('favorite' , 'FavoriteController@favoritepost'); 

		Route::get('setting' , 'SettingController@show'); 
		Route::get('about' , 'SettingController@about');
		Route::post('report' , 'SettingController@report'); 

		Route::post('contact' , 'ContactController@contact');
 
	});

});





