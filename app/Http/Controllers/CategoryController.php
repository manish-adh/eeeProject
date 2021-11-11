<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();

        return view('User.category.index',compact('data'));
    }


    public function create()
    {

        return view('User.category.add_category');
    }


    public function store(Request $request)
    {
        $validation = $request->validate([

            'category_id'=>'required',
            'np_name'=>'required',
            'slug'=>'required',
        ]);

        $data =  new Category();
        $data->category_id = $request->category_id;
        $data->np_name = $request->np_name;
        $data->slug = $request->slug;
        $data->status = $request->status;
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/CategoryImages'), $imageName);
        $data->image = $imageName;
        $data->save();
        return Redirect::to('category')->withSuccess('sucessfully posted ');
    }


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
       $category= Category::find($id);
       return view('User/category/edit_category',compact('category'));
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
        $category=Category::find($request->id);
        $category->category_id=request('category_id');
        $category->np_name=request('np_name');
        $category->slug=request('slug');
        $category->status=request('status');
        

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/CategoryImages'), $imageName);
        $category->image = $imageName;

        $category->save();
        return Redirect::to('category')->withSuccess('sucessfully posted ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category= Category::find($id);
        $category->forcedelete();
        return Redirect::to('category')->withSuccess('sucessfully deleted ');
    }
}
