<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Image;


use App\Chart;
use Charts;
use App\AdminTasks;
use App\AssignTasks;
use DB;
use Auth;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            
        if(Auth::user()->id <= 3)
        {
            
            $assign_tasks = DB::table('assign_tasks')
            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
            ->orderBy('assign_tasks.created_at','desc')->get();

            $chart = Charts::database($assign_tasks, 'line', 'highcharts')
            ->title('Assigned Tasks')
            ->elementLabel("Tasks")
            ->dimensions(500, 300)
            ->responsive(false)
            ->lastByMonth(12, true);
            
            
            
            $assign_tasks1 = DB::table('assign_tasks')
            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
            ->where('assign_tasks.status','approved')
            ->orderBy('assign_tasks.created_at','desc')->get();

            $chart1 = Charts::database($assign_tasks1, 'line', 'highcharts')
            ->title('Completed Tasks')
            ->elementLabel("Tasks")
            ->dimensions(500, 300)
            ->responsive(false)
            ->lastByMonth(12, true);
           
        }
        else
        {      
            
            $assign_tasks = DB::table('assign_tasks')
            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
            ->where('assign_tasks.user_id',Auth::user()->id)
            ->orderBy('assign_tasks.created_at','desc')->get();


            $chart = Charts::database($assign_tasks, 'line', 'highcharts')
            ->title('Assigned Tasks')
            ->elementLabel("Tasks")
            ->dimensions(500, 300)
            ->responsive(false)
            ->lastByMonth(12, true);
            
            $assign_tasks1 = DB::table('assign_tasks')
            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
            ->where('assign_tasks.user_id',Auth::user()->id)
            ->where('assign_tasks.status','approved')
            ->orderBy('assign_tasks.created_at','desc')->get();


            $chart1 = Charts::database($assign_tasks1, 'line', 'highcharts')
            ->title('Completed Tasks')
            ->elementLabel("Tasks")
            ->dimensions(500, 300)
            ->responsive(false)
            ->lastByMonth(12, true);
             
        }
        
        return view('home', ['chart' => $chart],['chart1' => $chart1]);
        // return view('home');

    }


}
