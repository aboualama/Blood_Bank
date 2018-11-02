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
 
Route::get('/', function () { return view('welcome'); });

Auth::routes(); 

Route::group(['middleware' => 'auth'] , function(){
	
	Route::group(['prefix' => 'dashboard' , 'namespace' => 'Admin'] , function(){
 
		Route::get('/', function () { return view('admin.dashboard'); });

		Route::get('/user', 'UserController@index'); 
		Route::get('/user/logout', 'UserController@logout'); 


		Route::resource('/Governorate', 'GovernorateController');
		Route::resource('/City', 'CityController');
		Route::resource('/Category', 'CategoryController');
		Route::resource('/Post', 'PostController');

		Route::get('/Client', 'ClientController@index');
		Route::post('/Client/active/{id}', 'ClientController@active');
		Route::delete('/Client/{id}', 'ClientController@destroy');

		
		Route::get('/Donation', 'DonationRequestController@index');
		Route::delete('/Donation/{id}', 'DonationRequestController@destroy');
			


		Route::get('/Settings', 'SettingsController@edit'); 
		Route::put('/Settings/edit', 'SettingsController@update');  

		Route::get('/Contact', 'ContactController@index');  
		Route::get('/Contact/{id}', 'ContactController@show');  
		Route::delete('/Contact/{id}', 'ContactController@destroy');  

		Route::get('/Report', 'ReportController@index');  
		Route::get('/Report/{id}', 'ReportController@show');  
		Route::delete('/Report/{id}', 'ReportController@destroy');  

	});
});