<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Image;

use DB;
use Auth;
use Charts;
use App\Chart;
use App\User;
use App\UserTasks;
use App\AdminTasks;
use App\AssignTasks;
use App\Http\Controllers\DateTime;


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
            ->dimensions(350, 300)
            ->responsive(false)
            ->lastByMonth(10, true);
            
            
            
            $assign_tasks1 = DB::table('assign_tasks')
            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
            ->where('assign_tasks.status','approved')
            ->orderBy('assign_tasks.created_at','desc')->get();

            $chart1 = Charts::database($assign_tasks1, 'line', 'highcharts')
            ->title('Completed Tasks')
            ->elementLabel("Tasks")
            ->dimensions(350, 300)
            ->responsive(false)
            ->lastByMonth(10, true);

            $assign_tasks2 = DB::table('assign_tasks')
            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
            ->where('assign_tasks.status','drop')
            ->orderBy('assign_tasks.created_at','desc')->get();

            $totaltasks = AdminTasks::count();
            $totalassigntasks = AssignTasks::count();
            $totalusers = User::count();
            $totalcomments = UserTasks::count();

            $totalcredits = $assign_tasks1->sum('obtained_marks');

            $fdate = Auth::user()->created_at;
            $tdate = date('Y-m-d H:s:i');
            $datetime1 = new \DateTime($fdate);
            $datetime2 = new \DateTime($tdate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');//now do whatever you like with $days
        
            $completedtasks = $assign_tasks1->count();
            $droptasks = $assign_tasks2->count();
           
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
            ->dimensions(350, 300)
            ->responsive(false)
            ->lastByMonth(10, true);
            
            $assign_tasks1 = DB::table('assign_tasks')
            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
            ->where('assign_tasks.user_id',Auth::user()->id)
            ->where('assign_tasks.status','approved')
            ->orderBy('assign_tasks.created_at','desc')->get();

            $chart1 = Charts::database($assign_tasks1, 'line', 'highcharts')
            ->title('Completed Tasks')
            ->elementLabel("Tasks")
            ->dimensions(350, 300)
            ->responsive(false)
            ->lastByMonth(10, true);

            $assign_tasks2 = DB::table('assign_tasks')
            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
            ->where('assign_tasks.user_id',Auth::user()->id)
            ->where('assign_tasks.status','drop')
            ->orderBy('assign_tasks.created_at','desc')->get();

           
            $totaltasks = $assign_tasks->count();

            $totalcredits = $assign_tasks1->sum('obtained_marks');

            $fdate = Auth::user()->created_at;
            $tdate = date('Y-m-d H:s:i');
            $datetime1 = new \DateTime($fdate);
            $datetime2 = new \DateTime($tdate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');//now do whatever you like with $days
        
            $completedtasks = $assign_tasks1->count();
            $droptasks = $assign_tasks2->count();
             
        }
        
        return view('home', ['chart' => $chart],['chart1' => $chart1])->with(compact('totaltasks','totalassigntasks','totalusers','totalcomments','totalcredits','days','completedtasks','droptasks'));
        // return view('home');

    }


}
