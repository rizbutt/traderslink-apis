<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vendor_Details;
use App\Models\Categories;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        //dd($users);
        return view('admin.users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        if($users->type == 1){
            $details = Vendor_Details::where('user_id', $id)->firstOrFail();
            //$vendor_category = Categories::find($details->dealin);
            $vendor = (object)[
                'id' => $users->id,
                'name' => $users->name,
                'phone' => $users->phone,
                'type' => 'vendor',
                'status' => $users->status,
                'city' => $details->city,
                'address' => $details->address,
                'shop_number' => $details->shop_number,
                'shop_images' => $details->shop_images,
                'dealin' => $details->dealin,
            ];

            $users = $vendor;

        }else {
            $users = $users;

        }
        //dd($details);
        $cat_list = Categories::all();
        //dd($cat_list);
        return view('admin.users.edit',compact('users', 'cat_list'));
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
