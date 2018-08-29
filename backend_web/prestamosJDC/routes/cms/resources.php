<?php

use Illuminate\Http\Request;

Route::resource('resources', 'ResourceController', ['except' => ['show']]);
Route::get('resources/{id}/destroy', 'ResourceController@destroy')->name('resources.destroy');
Route::post('resources/destroy', 'ResourceController@destroyMulti')->name('resources.multi_destroy');