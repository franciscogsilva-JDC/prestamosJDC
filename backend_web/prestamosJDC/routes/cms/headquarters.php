<?php

use Illuminate\Http\Request;

Route::resource('headquarters', 'HeadquarterController', ['except' => ['show']]);
Route::get('headquarters/{id}/destroy', 'HeadquarterController@destroy')->name('headquarters.destroy');
Route::post('headquarters/destroy', 'HeadquarterController@destroyMulti')->name('headquarters.multi_destroy');