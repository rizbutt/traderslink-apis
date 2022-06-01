<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Vendor_Details;
use App\Models\Queries;
use App\Models\Categories;

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
            $queries = Queries::all();
            $users = Auth::user()->where('status', '=', '1')->get();
            $vendorsusers = Auth::user()->where('type', '=', '1')->where('status', '=', '1')->get();
            $dealincategories = Categories::where('status', '=', '1');
            $categoriesCount = $dealincategories->count();
            $usersCount = $users->count();
            $queriesCount = $queries->count();
            $vendorsusersCount = $vendorsusers->count();
            //dd($queries);
            return view('admin.adminhome',compact('queries', 'usersCount', 'queriesCount', 'vendorsusersCount', 'categoriesCount'));

        }elseif(Auth::user() &&  Auth::user()->type == 1){
            $vendor_details = Vendor_Details::where('user_id', Auth::user()->id)->firstOrFail();
            $vendor_queries = Queries::where('type', $vendor_details->dealin)->get();
            $devicekey = 'no';
            if((Auth::user()->device_key) != ''){
                $devicekey = 'yes';
            }
            return view('vendor.home', compact('vendor_queries'))->with('notify', $devicekey);
        }else {
            $categories = Categories::all()->where('parent_id', 0)->where('status', 1);

            return view('index',compact('categories'));   
        }
    }

    
}
