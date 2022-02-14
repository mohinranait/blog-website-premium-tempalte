<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Image;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderby('name','asc')->get();
        return view('backend.pages.blog.manage',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderby('name','asc')->where('role',1)->where('status',1)->get();
        $categorys = category::orderby('name','asc')->where('status',1)->where('is_parent',0)->get();
        return view('backend.pages.blog.create',compact('users','categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posts = new Post();
        $posts->name     = $request->name;
        $posts->slug     = Str::slug($request->name);
        $posts->body     = $request->body;
        $posts->descrip  = $request->description;
        $posts->tag      = $request->tag;
        $posts->cat_id   = $request->category;
        $posts->author   = $request->author;
        $posts->status   = $request->status;

        

        if( $request->fitureimg ){
            $catchImg = $request->file('fitureimg');
            $imgName = time() . "_" . $catchImg->getClientOriginalName();
            $location = public_path('backend/img/blogpost/' . $imgName);
            Image::make($catchImg)->save($location);
            $posts->thumnail = $imgName;
        }
        
        $posts->save();
        return redirect()->route('post.index')->with('massage','Create new post Successful');
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
        $updates = Post::find($id);
        if( !empty($updates)){
            $users = User::orderby('name','asc')->where('role',1)->where('status',1)->get();
            $categorys = category::orderby('name','asc')->where('status',1)->where('is_parent',0)->get();
            return view('backend.pages.blog.edit',compact('users','categorys','updates'));
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
        $posts = Post::find($id);
        $posts->name     = $request->name;
        $posts->slug     = Str::slug($request->name);
        $posts->body     = $request->body;
        $posts->descrip  = $request->description;
        $posts->tag      = $request->tag;
        $posts->cat_id   = $request->category;
        $posts->status   = $request->status;

        

        if( $request->fitureimg ){
            
            $catchImg = $request->file('fitureimg');
            $imgName = time() . "_" . $catchImg->getClientOriginalName();
            $location = public_path('backend/img/blogpost/' . $imgName);
            Image::make($catchImg)->save($location);
            $posts->thumnail = $imgName;
        }
        
        $posts->save();
        return redirect()->route('post.index')->with('massage','Post Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Post::find($id);
        if(!empty($delete)){

            if( File::exists('backend/img/blogpost/' . $delete->thumnail)){
                File::delete('backend/img/blogpost/' . $delete->thumnail);
            }

            $delete->delete();
        }
        return redirect()->route('post.index')->with('massage','Delete Successful');
    }
}
