<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Vendor_Details;
use App\Models\Queries;

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
            $vendor_details = Vendor_Details::where('user_id', Auth::user()->id)->firstOrFail();
            $vendor_queries = Queries::where('type', $vendor_details->dealin)->get();
            //dd($vendor_queries);
            return view('vendor.home', compact('vendor_queries'));
        }
    }

    
}
