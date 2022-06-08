<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function comingsoon()
    {
        
        return view('welcome');
    }
    public function index()
    {
        $categories = Categories::all()->where('parent_id', 0)->where('status', 1);
        
        return view('index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('aboutus');
    }

    public function contact()
    {
        return view('contactus');
    }
    public function findparts(Request $request, $id=null)
    {
        $selectedcategory = '';
        if($id != null){
            $forcategory = Categories::where('slug', $id)->firstOrFail();
            $selectedcategory = $forcategory->id;
        }
        $categories = Categories::all();
        return view('findparts',compact('categories', 'selectedcategory'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function category($id)
    {
        $maincategory = Categories::where('slug', $id)->where('status', 1)->firstOrFail();
        $childcategory = Categories::all()->where('parent_id', $maincategory->id)->where('status', 1);
        if(count($childcategory) === 0){
            $selectedcategory = $maincategory->id;
            $categories = Categories::all();
            return view('findparts',compact('categories', 'selectedcategory'));
        }
        
        return view('category',compact('childcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
