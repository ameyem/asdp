<?php

namespace App\Http\Controllers;

use App\UserTasks;
use App\AdminTasks;
use App\AssignTasks;
use DB;
use Auth;
use App\User;
use Illuminate\Http\Request;



use Illuminate\Http\UploadedFile;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class UserTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $assign_tasks = DB::table('assign_tasks')
                            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
                            ->select('assign_tasks.*','admin_tasks.worktitle','admin_tasks.workdescription','admin_tasks.whatinitforme','admin_tasks.usercredits','admin_tasks.uploads')
                            ->where('assign_tasks.user_id',Auth::user()->id)->get();
                                
                            return view('UserTasks.index',compact('assign_tasks'));
                                
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
            'assigntask_id' => 'required',
            'request_for' => 'required',
            'message' => 'required',
            'uploads' => 'required',
        ]);

        $product = new UserTasks($request->file());
     
        if($file = $request->hasFile('uploads')) {
           
           $file = $request->file('uploads');           
           $fileName = $file->getClientOriginalName();
           $destinationPath = public_path().'/uploads/';
           $file->move($destinationPath,$fileName);

           $file = public_path().'/uploads/'.$fileName;

            $requestData = $request->all();
            $requestData['uploads'] = $file;
            // $product->uploads = $file;
      
         
        }
     
        UserTasks::create($requestData);
        return redirect()->route('UserTasks.index')
                        ->with('success','AdminTasks created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserTasks  $userTasks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_tasks = DB::table('user_tasks')
        ->join('assign_tasks','user_tasks.assigntask_id', '=', 'assign_tasks.id')
        ->where( 'assign_tasks.id',$id)
        ->select('user_tasks.*')->get();
        $assign_tasks = AssignTasks::find($id);
        // echo($id);
        return view('UserTasks.create',compact('user_tasks','assign_tasks',$id));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserTasks  $userTasks
     * @return \Illuminate\Http\Response
     */
    public function edit(UserTasks $userTasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserTasks  $userTasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserTasks $userTasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserTasks  $userTasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTasks $userTasks)
    {
        //
    }
}
