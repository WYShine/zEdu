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

Route::get('/', array('uses' => 'WelcomeController@index',
    'as' => 'home'));

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::group(['namespace' => 'User'], function() {
	Route::resource('accounts', 'AccountController');
});


Route::group(['namespace' => 'Teacher', 'prefix' => 'teacher'], function() {
	Route::resource('courses', 'CourseController', [
        'only' => ['create', 'store', 'index', 'show']
    ]);
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Route::resource('courses', 'CourseController', [
        'only' => ['index', 'update']
    ]);
//	Route::resource('users.courses', 'CourseController');
//	Route::resource('users.users', 'UserController');
//	Route::resource('users.accounts', 'AccountController');
});


