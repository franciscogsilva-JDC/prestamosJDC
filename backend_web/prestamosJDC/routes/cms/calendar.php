<?php

use Illuminate\Http\Request;

Route::get('/calendar', 'CalendarController@index')->name('calendar.index');
Route::get('/calendar-events', 'RequestController@getAvailableEvents')->name('calendar.events');