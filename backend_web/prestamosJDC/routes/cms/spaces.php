<?php

use Illuminate\Http\Request;

Route::resource('spaces', 'SpaceController', ['except' => ['show']]);
Route::get('spaces/{id}/destroy', 'SpaceController@destroy')->name('spaces.destroy');
Route::post('spaces/destroy', 'SpaceController@destroyMulti')->name('spaces.multi_destroy');