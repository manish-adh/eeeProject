<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $data = Banner::all();
    
            return view('User.banner.index_banner',compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {

            return view('User.banner.add_banner');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = new Banner();
        $banner->name = $request->name;
        $banner->Image = $request->image;
        $banner->Start_date=$request->Start_date;
        $banner->End_date=$request->End_date;
      
        $banner->url=$request->url;

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/BannerImages'), $imageName);
        $banner->Image = $imageName;
        
        $banner->save();
        return Redirect()->back()->with('success','Banner Added');
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
        $banner= Banner::find($id);
       return view('User/banner/edit_banner',compact('banner'));
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
        $banner=Banner::find($request->id);
        $banner->name=request('name');
        $banner->Start_date=request('Start_date');
        $banner->End_date=request('End_date');
        
        $banner->url=request('url');

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/BannerImages'), $imageName);
        $banner->Image = $imageName;

        $banner->save();
        return Redirect::to('banner')->withSuccess('sucessfully posted ');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner= Banner::find($id);
        $banner->forcedelete();
        return Redirect::to('banner')->withSuccess('sucessfully deleted ');
    }
}
