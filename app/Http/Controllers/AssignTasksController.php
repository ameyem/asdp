<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\AdminTasks;
use App\AssignTasks;
use Illuminate\Http\Request;

class AssignTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $assign_tasks = AssignTasks::orderBy('id','DESC')
        ->where('assign_tasks.assign_user_id',Auth::user()->id)
        
        ->paginate(15);
        return view('AssignTasks.index',compact('assign_tasks'))
            ->with('i', ($request->input('page', 1) - 1) * 15);
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
            'task_id' => 'required',
            'assign_user_id' => 'required',
            'user_id' => 'required',
            'guide_id' => 'required',
            'reviewer_id' => 'required',
            'institutes_id' => '',
          
        ]);

        AssignTasks::create($request->all());
        return redirect()->route('AssignTasks.index')
            ->with('success','Task Assigned Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AssignTasks  $assignTasks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = DB::table('users')
                ->where('users.institutes_id',Auth::User()->institutes_id)
                ->where('users.role_id','<>',5)
                ->select('users.*')
                ->get();
        $teachers = DB::table('users')
                ->where('users.institutes_id',Auth::User()->institutes_id)        
                ->where('users.role_id',Auth::User()->role_id)
                ->select('users.*')
                ->get();
      
        $works = AdminTasks::find($id);
        return view('AssignTasks.create',compact('users','works','teachers',$id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AssignTasks  $assignTasks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $assign_tasks = AssignTasks::find($id);
        // $users = User::all();
        // $works = AdminTasks::all();
        // return view('AssignTasks.edit',compact('assign_tasks','users','works'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AssignTasks  $assignTasks
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
        AssignTasks::find($id)->delete();
        return redirect()->route('AssignTasks.index')
                        ->with('success','AssignTasks deleted successfully');
    }
}
