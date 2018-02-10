<?php

namespace App\Http\Controllers;

use App\viewprofile;
use App\profile;
use App\User;
use Auth;
use DB;
use App\Http\Controllers\Lava;
use App\Http\Controllers\View;
use App\Http\Controllers\ChartManager;
// use Khill\Lavacharts\Support\JavascriptDate as Date;
use Illuminate\Http\Request;


class ViewprofileController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index(Request $request)
    {  
        
        $users = User::find(Auth::user()->id);
        return view('Viewprofile.index',compact('users'));
              
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
        $this->validate($request, [
            'name' => '',
            'email' => '',
            'phone_number' => '',
            'dob' => '',
            'qualification' => '',
            'specialization' => '',
            'marks' => '',
            'passout' => '',
            'collegeaddress' => '',
            'homeaddress' => '',
        ]);


        User::create($request->all());
        return redirect()->route('viewprofile.index')
                        ->with('success','Profile created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\viewprofile  $viewprofile
     * @return \Illuminate\Http\Response
     */
    public function show(viewprofile $viewprofile)
    {
        $users = User::find($id);
        return view('viewprofile.show',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\viewprofile  $viewprofile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('viewprofile.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\viewprofile  $viewprofile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => '',
            'email' => '',
            'phone_number' => '',
            'dob' => '',
            'qualification' => '',
            'specialization' => '',
            'marks' => '',
            'passout' => '',
            'collegeaddress' => '',
            'homeaddress' => '',
            'profilepic' => '',
        ]);

        $product = new User($request->file());
     
        if($file = $request->hasFile('profilepic') && $request->file('profilepic')->isValid()) {
           
           $file = $request->file('profilepic');           
           $fileName = $file->getClientOriginalName();
           $destinationPath = public_path().'/profilepic/';
           $file->move($destinationPath,$fileName);

           $file = $fileName;

            $requestData = $request->all();
            $requestData['profilepic'] = $file;
            // $product->uploads = $file;        
        }
        else
        {
            $requestData = $request->all();
        }
     
       


        User::find($id)->update($requestData);
        return redirect()->route('viewprofile.index')
                        ->with('success','Profile updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\viewprofile  $viewprofile
     * @return \Illuminate\Http\Response
     */
    public function destroy(viewprofile $viewprofile)
    {
        //
    }
}


