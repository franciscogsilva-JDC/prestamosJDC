<?php

use Illuminate\Http\Request;

Route::get('users', 'UserController@edit')->name('users-front.edit');
Route::put('users', 'UserController@update')->name('users-front.update');
Route::get('users/requests', 'UserController@getRequests')->name('users-front.requests');