<?php

namespace App\Http\Controllers;

use App\Chart;
use Illuminate\Http\Request;
use Charts;
use App\AdminTasks;
use App\AssignTasks;
use DB;
use Auth;
use App\User;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            
        if(Auth::user()->id <= 3)
        {
            $assign_tasks = DB::table('assign_tasks')
            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
            ->where('assign_tasks.status','approved')
            // ->select('assign_tasks.*','admin_tasks.worktitle','admin_tasks.workdescription','admin_tasks.whatinitforme','admin_tasks.usercredits','admin_tasks.uploads')
            ->orderBy('assign_tasks.created_at','desc')->get();

            $chart = Charts::database($assign_tasks, 'line', 'highcharts')->dateColumn('created_at')
            ->title('Completed Tasks')
            ->elementLabel("Total")
            ->dimensions(500, 300)
            ->responsive(false)
            ->lastByMonth(12, true);
           
        }
        else
        {      
            $assign_tasks = DB::table('assign_tasks')
            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
            ->where('assign_tasks.user_id',Auth::user()->id)
            ->where('assign_tasks.status','approved')
            
            // ->select('assign_tasks.*','admin_tasks.worktitle','admin_tasks.workdescription','admin_tasks.whatinitforme','admin_tasks.usercredits','admin_tasks.uploads')
            ->orderBy('assign_tasks.created_at','desc')->get();


            $chart = Charts::database($assign_tasks, 'line', 'highcharts')->dateColumn('created_at')
            ->title('Completed Tasks')
            ->elementLabel("Total")
            ->dimensions(500, 300)
            ->responsive(false)
            ->lastByMonth(12, true);
             
        }
        
        return view('Charts.index', ['chart' => $chart]);
        
        // return view('TaskMigrate.index',compact('assign_tasks'));
    
        
        
        // $chart = Charts::database(AssignTasks::all(), 'line', 'highcharts')->dateColumn('created_at')
            // ->elementLabel("Total")
            // ->dimensions(500, 300)
            // ->responsive(false)
            // ->lastByMonth();

            // $chart1 = Charts::math('sin(x)', [0, 10], 0.2, 'line', 'highcharts');
    
        

     

        //     $chart1 =  Charts::multiDatabase('bar', 'material')
        //     ->dataset('Users', User::all())
        //     ->dataset('Assign Tasks', AssignTasks::all())
        //     ->lastByMonth();


        // return view('Charts.index', ['chart' => $chart],['chart1'=>$chart1]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function show(Chart $chart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function edit(Chart $chart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chart $chart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chart $chart)
    {
        //
    }
}
