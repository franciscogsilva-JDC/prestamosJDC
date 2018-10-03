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
})->name('welcome');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/register/verify/{confirmation_code}', 'Auth\AuthController@verify');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cities', 'HomeController@getCities')->name('cities');
Route::get('/spaces/resources', 'Cms\RequestController@getSpaceResources')->name('spaces.resources');
Route::get('/dependencies/resources', 'Cms\RequestController@getDependenciesResources')->name('dependencies.resources');
Route::get('/complements', 'Cms\RequestController@getComplements')->name('complements');
Route::get('validate/resources', 'Cms\RequestController@validateResource')->name('validate.resources');

Route::group(['prefix'=>'admin', 'middleware' => ['web','auth','admin']], function () {
	
	Route::namespace('Cms')->group(function(){
		Route::get('/calendar', 'CalendarController@index')->name('calendar.index');
		Route::get('/', 'HomeController@index')->name('admin.index');
		include_once 'cms/dependencies.php';
		include_once 'cms/headquarters.php';
		include_once 'cms/programs.php';
		include_once 'cms/requests.php';
		include_once 'cms/resources.php';
		include_once 'cms/spaces.php';
		include_once 'cms/users.php';
    });

});

