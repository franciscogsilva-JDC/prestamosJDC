<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalendarController extends Controller{

    private $menu_item = 3;
    private $title_page = 'Calendario';

	public function index(){
		return view('admin.calendar.index')
            ->with('title_page', $this->title_page)
            ->with('menu_item', $this->menu_item);
	}
}
