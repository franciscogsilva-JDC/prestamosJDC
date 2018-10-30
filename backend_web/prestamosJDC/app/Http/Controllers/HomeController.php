<?php

namespace App\Http\Controllers;

use App\Town;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $menu_item = 0;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.index')
            ->with('menu_item', $this->menu_item);
    }

    public function getCities(){
        $departament_id = request()->input('departament_id');
        $towns = Town::where('departament_id', $departament_id)->pluck('name', 'id');
        return $towns;
    }
}
