<?php

use Illuminate\Http\Request;

Route::resource('requests', 'RequestController');
Route::get('requests/{id}/destroy', 'RequestController@destroy')->name('requests.destroy');
Route::post('requests/destroy', 'RequestController@destroyMulti')->name('requests.multi_destroy');