<?php

use Illuminate\Http\Request;

Route::get('/', 'HomeController@index')->name('admin.index');

Route::resource('programs', 'ProgramController');
Route::get('programs/{program}/destroy', [
	'uses'	=>	'ProgramController@destroy',
	'as'	=>	'programs.destroy'
]);
Route::post('programs/destroy', [
	'uses'	=>	'ProgramController@destroy_multi',
	'as'	=>	'programs.multi_destroy'
]);
