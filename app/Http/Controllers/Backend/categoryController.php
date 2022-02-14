<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use File;
use Image;


class categoryController extends Controller
{
    public function status( category $status)
    {
        if( $status->status == 1 ){
            $status->update(['status' => 2]);
        }else{
            $status->update(['status' => 1]);
        }
        return redirect()->back()->with('success', 'Category Status Update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = category::orderby('name','asc')->where('is_parent' , 0)->get();
        return view('backend.pages.category.manage',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = category::orderby('name','asc')->where('is_parent' , 0)->get();
        return view('backend.pages.category.create',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorys = new category();
        $categorys->name        = $request->name;
        $categorys->slug        = Str::slug($request->name);
        $categorys->is_parent   = $request->is_parent;
        $categorys->status      = $request->status;

        if( $request->img){
            $catchImg = $request->file('img');
            $imgName = time() . '.' . $catchImg->getClientOriginalExtension();
            $location = public_path('backend/img/category/' . $imgName);
            Image::make($catchImg)->save($location);
            $categorys->image = $imgName;
        }
        $categorys->save();
        return redirect()->route('category.index');

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
        $updateCategorys = category::find($id);
        if( !empty($updateCategorys)){
            $categorys = category::orderby('name','asc')->where('is_parent' , 0)->get();
            return view('backend.pages.category.edit',compact('updateCategorys','categorys'));
        } 
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
        $categorys = category::find($id);
        $categorys->name        = $request->name;
        $categorys->slug        = Str::slug($request->name);
        $categorys->is_parent   = $request->is_parent;
        $categorys->status      = $request->status;

        if( $request->img){

            if(File::existes('backend/img/category/' . $categorys->image)){
                File::delete('backend/img/category/' . $categorys->image);
            }
            
            $catchImg = $request->file('img');
            $imgName = time() . '.' . $catchImg->getClientOriginalExtension();
            $location = public_path('backend/img/category/' . $imgName);
            Image::make($catchImg)->save($location);
            $categorys->image = $imgName;
        }
        $categorys->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = category::find($id);
        if( !empty($delete)){
            if( File::existes('backend/img/category/' . $delete->image)){
                File::delete('backend/img/category/' . $delete->image);
            }

            $delete->delete();
        }
        return redirect()->route('category.index');
    }
}
