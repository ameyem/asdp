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
            //Total Assigned Tasks of all Users
            $assign_tasks = DB::table('assign_tasks')
            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
            ->orderBy('assign_tasks.created_at','desc')->get();

            $assign_chart = Charts::database($assign_tasks, 'line', 'highcharts')
            ->title('Assigned Tasks')
            ->elementLabel("Tasks")
            ->dimensions(350, 300)
            ->responsive(false)
            ->lastByMonth(10, true);
            
            
            // Total Completed Tasks of all Users
            $completedtasks = DB::table('assign_tasks')
            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
            ->where('assign_tasks.status','approved')
            ->orderBy('assign_tasks.created_at','desc')->get();

            $completed_chart = Charts::database($completedtasks, 'line', 'highcharts')
            ->title('Completed Tasks')
            ->elementLabel("Tasks")
            ->dimensions(350, 300)
            ->responsive(false)
            ->lastByMonth(10, true);



            // Pregress Line graph all tasks

            $progress = DB::table('assign_tasks')
            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
            ->where('assign_tasks.status','approved')
            ->orderBy('assign_tasks.created_at','desc')->select('assign_tasks.created_at','assign_tasks.obtained_marks')->get()->toArray();
             
            $datearray=array_column($progress,'created_at');
            $marksarray=array_column($progress,'obtained_marks');

            $progress_chart = Charts::create('line', 'highcharts')
            ->title('My nice chart')
            ->elementLabel('My nice label')
            ->labels($datearray)
            ->values($marksarray)
            ->dimensions(1000,500)
            ->responsive(false);

            


                //for count the total droped tasks

            $droptasks = DB::table('assign_tasks')
            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
            ->where('assign_tasks.status','drop')
            ->orderBy('assign_tasks.created_at','desc')->get();

            $totaltasks = AdminTasks::count();
            $totalassigntasks = AssignTasks::count();
            $totalusers = User::count();
            $totalcomments = UserTasks::count();

            $totalcredits = $completedtasks->sum('obtained_marks');
            $completedtasks = $completedtasks->count();
            $droptasks = $droptasks->count();

            $fdate = Auth::user()->created_at;
            $tdate = date('Y-m-d H:s:i');
            $datetime1 = new \DateTime($fdate);
            $datetime2 = new \DateTime($tdate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');//now do whatever you like with $days
        
            


          
           
        }
        else
        {      
             //Total Assigned Tasks of all Users
           
                        $assign_tasks = DB::table('assign_tasks')
                        ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
                        ->where('assign_tasks.user_id',Auth::user()->id)
                        ->orderBy('assign_tasks.created_at','desc')->get();

                        $assign_chart = Charts::database($assign_tasks, 'line', 'highcharts')
                        ->title('Assigned Tasks')
                        ->elementLabel("Tasks")
                        ->dimensions(350, 300)
                        ->responsive(false)
                        ->lastByMonth(10, true);

             // Total Completed Tasks of all Users

                        $completedtasks = DB::table('assign_tasks')
                        ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
                        ->where('assign_tasks.user_id',Auth::user()->id)
                        ->where('assign_tasks.status','approved')
                        ->orderBy('assign_tasks.created_at','desc')->get();
                        
                        $completed_chart = Charts::database($completedtasks, 'line', 'highcharts')
                        ->title('Completed Tasks')
                        ->elementLabel("Tasks")
                        ->dimensions(350, 300)
                        ->responsive(false)
                        ->lastByMonth(10, true);


            // Pregress Line graph all tasks

                        $progress = DB::table('assign_tasks')
                        ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
                        ->where('assign_tasks.user_id',Auth::user()->id)
                        ->where('assign_tasks.status','approved')
                        ->orderBy('assign_tasks.created_at','desc')->select('assign_tasks.created_at','assign_tasks.obtained_marks')->get()->toArray();
                        
                        $datearray = array_column($progress,'created_at');
                        for($i=0;$i<count($datearray);$i++)
                        {
                            $date = new \DateTime($datearray[$i]);
                            $dt[$i] = $date->format('d-m-Y');
                        }
                       

                        $marksarray = array_column($progress,'obtained_marks');

                        $count_array[0] = $marksarray[0];
                        for($i=1;$i<count($marksarray);$i++)
                        {
                            $count_array[$i] = $count_array[$i-1] + $marksarray[$i];
                        }
                       
                        $progress_chart = Charts::create('line', 'highcharts')
                        ->title('Progress Chart')
                        ->elementLabel('My nice label')
                        ->labels(array_reverse($dt))
                        ->values($count_array)
                        ->dimensions(500,300)
                        ->responsive(false);

            //for count the total droped tasks
            $droptasks = DB::table('assign_tasks')
            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
            ->where('assign_tasks.user_id',Auth::user()->id)
            ->where('assign_tasks.status','drop')
            ->orderBy('assign_tasks.created_at','desc')->get();

           
            $totaltasks = $assign_tasks->count();
            $totalcredits = $completedtasks->sum('obtained_marks');
            $completedtasks = $completedtasks->count();
            $droptasks = $droptasks->count();

            $fdate = Auth::user()->created_at;
            $tdate = date('Y-m-d H:s:i');
            $datetime1 = new \DateTime($fdate);
            $datetime2 = new \DateTime($tdate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');//now do whatever you like with $days
        
          
             
        }
        
        return view('home', ['assign_chart' => $assign_chart,'completed_chart' => $completed_chart,'progress_chart' => $progress_chart])->with(compact('totaltasks','totalassigntasks','totalusers','totalcomments','totalcredits','days','completedtasks','droptasks'));
        // return view('home');

    }


}
