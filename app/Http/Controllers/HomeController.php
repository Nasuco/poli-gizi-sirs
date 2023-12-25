<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.login');
    }

    public function ahligiziHome()
    {
        return view('ahligizi.index');
    }

    public function pramusajiHome()
    {
        return view('pramusaji.index');
    }

    public function distributorHome()
    {
        return view('distributor.index');
    }
}
