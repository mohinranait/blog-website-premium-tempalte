<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use File;
use Image;

class userController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.pages.user.manage',compact('users'));
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
        $userUpdate = User::find($id);
        if( !empty($userUpdate)){
            return view('backend.pages.user.edit', compact('userUpdate'));
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
        $users = User::find($id);
        $users->name        = $request->name;
        $users->email       = $request->email;
        $users->phone       = $request->phone;
        $users->address     = $request->address;
        $users->role        = $request->role;
        $users->status      = $request->status;

       

         if( $request->image)
         {
             if( File::exists('backend/img/user/' . $users->profile)){
                 File::delete('backend/img/user/' . $users->profile);
             }
             $cathimg = $request->file('image');
             $imgName = time().".". $cathimg->getClientOriginalExtension();
             $location = public_path('backend/img/user/' . $imgName);
             Image::make($cathimg)->save($location);
             $users->profile = $imgName;
         }
         $users->save();
         return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::find($id);
        if( !empty($delete)){
            if( File::exists('backend/img/user/' . $delete->profile)){
                File::delete('backend/img/user/' . $delete->profile);
            }

            $delete->delete();
        }
        return redirect()->route('user.index');
    }
}
