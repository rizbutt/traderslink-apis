<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        //$this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user() &&  Auth::user()->type == 0) { 
            return view('admin.adminhome');
        }elseif(Auth::user() &&  Auth::user()->type == 1){
            return view('vendor.home');
        }
    }

    
}
