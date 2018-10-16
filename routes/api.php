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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

 
 
Route::group(['prefix' => 'v1.1' , 'namespace' => 'Api'] , function(){    	
  
	Route::post('register' , 'AuthController@register');
	Route::post('login' , 'AuthController@login')->name('login');
	Route::get('profile' , 'AuthController@profile');



	Route::group(['middleware' => 'auth:api'] , function(){  

	Route::post('edit' , 'AuthController@edit'); 

	});


		Route::get('city' , 'CityController@city');
		Route::get('governorate' , 'CityController@governorate');

		Route::get('categories' , 'PostController@categories');
		Route::get('category/{id}' , 'PostController@category');
		
		Route::get('post' , 'PostController@index');
		Route::post('post' , 'PostController@create');
		Route::get('post/{id}' , 'PostController@show');
		Route::put('post/{id}/update' , 'PostController@update');
		Route::delete('post/{id}/delete' , 'PostController@delete');

		Route::post('favorite/{post}' , 'FavoriteController@addfavorite');
		Route::get('favorite' , 'FavoriteController@favoritepost');


		Route::post('donation' , 'DonationController@create');


		Route::get('setting' , 'SettingController@show');
		Route::post('setting' , 'SettingController@create');
		Route::put('setting/update' , 'SettingController@update');
		
		Route::post('report' , 'SettingController@report');
		
		Route::get('test' , 'PostController@test');


 

});