<?php

use Illuminate\Http\Request;

Route::resource('programs', 'ProgramController', ['except' => ['show']]);
Route::get('programs/{program}/destroy', 'ProgramController@destroy')->name('programs.destroy');
Route::post('programs/destroy', 'ProgramController@destroyMulti')->name('programs.multi_destroy');