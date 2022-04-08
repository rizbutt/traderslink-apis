<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Categories;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::latest()->paginate(5);
    
        return view('admin.category.index',compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'parent_id' => ['required', 'string', 'max:8'],
            'image' => ['required', 'string', 'max:20'],
            'status' => ['required'],
        ]);
        if ($data->fails()) {
            $errors = $data->errors();
            return response()->json([
                'err' => $errors,
            ]);
        } else {

        //dd($data->safe()->collect());
        $data = $data->safe()->collect();
        Categories::create([
            'name' => $data['name'],
            'slug' => $data['slug'],
            'parent_id' => $data['parent_id'],
            'image' => $data['image'],
            'status' => $data['status'],
        ]);
        return redirect()->route('admin.category.index')
        ->with('success','Category Created successfully');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Categories::find($id);

        return view('admin.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::find($id);
        //dd($Categories);
        $cat_list = Categories::all();
        //dd($cat_list);
        return view('admin.category.edit',compact('category', 'cat_list'));
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
        //dd($request->all());
        $data = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'parent_id' => ['required', 'string', 'max:8'],
            'image' => ['required', 'string', 'max:20'],
            'status' => ['required'],
        ]);
        if ($data->fails()) {
            $errors = $data->errors();
            return response()->json([
                'err' => $errors,
            ]);
        } else {
            $forupdate = $data->safe()->collect();
            $category = Categories::find($id);
            $category->update([
                'name' => $forupdate['name'],
                'slug' => $forupdate['slug'],
                'parent_id' => $forupdate['parent_id'],
                'image' => $forupdate['image'],
                'status' => $forupdate['status'],
            ]);
            return redirect()->route('admin.category.index')
            ->with('success','Category Created successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $category)
    {
        $category->delete();
     
        return redirect()->route('admin.category.index')
                        ->with('success','Product deleted successfully');
    }
}
