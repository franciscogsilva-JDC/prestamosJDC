<?php

use Illuminate\Http\Request;

Route::resource('buildings', 'BuildingController', ['except' => ['show']]);
Route::get('buildings/{id}/destroy', 'BuildingController@destroy')->name('buildings.destroy');
Route::post('buildings/destroy', 'BuildingController@destroyMulti')->name('buildings.multi_destroy');