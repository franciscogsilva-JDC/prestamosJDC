<?php

namespace App\Http\Controllers;

use App\Town;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getCities(){
        $departament_id = request()->input('departament_id');
        $towns = Town::where('departament_id', $departament_id)->pluck('name', 'id');
        return $towns;
    }
}
