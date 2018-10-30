<?php

use Illuminate\Http\Request;

Route::get('requests', 'RequestController@create')->name('requests-front.create');
Route::post('requests', 'RequestController@store')->name('requests-front.store');
Route::get('requests/{id}/destroy', 'RequestController@destroy')->name('requests-front.destroy');