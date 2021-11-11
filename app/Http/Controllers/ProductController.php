<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function index()
    {
        $product =Product::all();
        return view('User.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('User.product.add_product');
    }

    public function store(Request $request)
    {

        $validation = $request->validate([

            'name'=>'required',
            'slug'=>'required',
            'status'=>'required',
            'price'=>'required',
            'description'=>'required',
        ]);


        $data = new Product;
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->status = $request->status;
        $data->price = $request->price;
        $data->description = $request->description;
        $image=time().'.'.$request->image->extension();
        $request->image->move(public_path('images/ProductImages'),$image);
        $data->image = $image;
        $data->save();
        return redirect()->route('product')->with('success','Successfully Added Product');

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
      
        $product = Product::find($id);
        
        return view('User/product/edit_product',compact('product'));
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
        $product=Product::find($request->id);

        $product->name=request('name');
        $product->status=request('status');
        $product->slug=request('slug');
        $product->price=request('price');
        $product->description=request('price');

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/ProductImages'), $imageName);
        $product->image = $imageName;

        $product->save();
        return Redirect::to('product')->withSuccess('sucessfully posted ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product= Product::find($id);
        $product->forcedelete();
        return Redirect::to('product')->withSuccess('sucessfully deleted ');
    }
}
