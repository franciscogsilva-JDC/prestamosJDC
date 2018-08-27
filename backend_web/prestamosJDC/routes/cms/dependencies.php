<?php

use Illuminate\Http\Request;

Route::resource('dependencies', 'DependencyController', ['except' => ['show']]);
Route::get('dependencies/{id}/destroy', 'DependencyController@destroy')->name('dependencies.destroy');
Route::post('dependencies/destroy', 'DependencyController@destroyMulti')->name('dependencies.multi_destroy');