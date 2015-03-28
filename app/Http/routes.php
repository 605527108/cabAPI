<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'api/v1','middleware'=>'auth.basic'],function(){
    Route::get('taxis/{id}','TaxisController@show');
    Route::post('sendable/store','SendableController@store');
    Route::get('message/','MessageController@index');
    Route::post('message/send','MessageController@store');
});

