<!-- @inject('request', 'Illuminate\Http\Request') -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@extends('layouts.app')
@section('content')
<!--<h1>{{Auth::user()->name }}</h1>
<h1>{{Auth::user()->id }}</h1>
<h2>{{Auth::user()->email }}</h2>  -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-primary">
                <div style="color:white" class="panel-heading"><center>Welcome to Ameyem Skill Development Portal</center></div>

                <div style="color:#003366"class="panel-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <h3>ASDP Start date : {{ Auth::user()->created_at }}</h3>               
                            <h3>Association with ASDP : {{ $days }} days </h3> 
                            <h3>Completed tasks : {{ $completedtasks}}</h3>
                            <h3>Total Credits : {{ $totalcredits}}</h3>
                            <h3>Dropped Tasks : {{ $droptasks }}</h3>
                        </div>
                        <div class="col-lg-6">
                                {!! $progress_chart->html() !!}
                                
                        </div>

                
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-primary">
                <div style="color:white" class="panel-heading"><center>Welcome to Work Environment</center></div>

                <div class="panel-body">
                   
                @if(Auth::check())
                @if(Auth::user()->id <= 3) 
                  {{csrf_field()}} 
                   
                    <!--quick info section -->
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                <a style="text-decoration:none;" href="{{ route('AdminTasks.index') }}">
                                    <div class="alert alert-success">                                     
                                        <i class="fa fa-pencil-square-o fa-3x"></i>
                                        <h3>Admin Tasks</h3>
                                    </div></a> 
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">Total Tasks : {{ $totaltasks }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                <a style="text-decoration:none;" href="{{ route('AssignTasks.index') }}">
                                    <div class="alert alert-info">
                                        <i class="fa fa-cogs fa-3x"></i>
                                       
                                        <h3>Assign Tasks</h3>
                                    </div></a>
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">Total Assigned Tasks : {{ $totalassigntasks }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                <a style="text-decoration:none;" href="{{ route('Profile.index') }}">
                                    <div class="alert alert-warning">
                                        <i class="fa fa fa-floppy-o fa-3x"></i>
                                        <h3>Profiles</h3>
                                    </div></a>
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">Total Users : {{ $totalusers }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                <a style="text-decoration:none;" href="{{ route('TaskMigrate.index') }}">
                                    <div class="alert alert-danger">
                                        <i class="fa fa-users fa-3x"></i>
                                        <h3>Users Tasks</h3>
                                    </div></a>
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">Total Comments : {{ $totalcomments }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <!--end quick info section -->
                    

                    <!-- Users Tasks info sectiopn -->
                    @else


                 
                    <div class="row">
                            <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                <a style="text-decoration:none;" href="{{ route('TaskMigrate.index') }}">
                                    <div class="alert alert-info">                                     
                                        <i class="fa fa-pencil-square-o fa-3x"></i>
                                        <h3>User Tasks </h3>
                                    </div></a>
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">Total Tasks : {{ $totaltasks }}
                                        </span>
                                    </div>
                                </div>
                              </div>
                            
                        </div> 
                        @endif
                @endif 
                     <!-- end of Users Tasks info sectiopn -->
                </div>
            </div>
        </div>
    </div>
</div>



{!! Charts::assets() !!}
<div class="app">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-primary">
                    <div style="color:white" class="panel-heading"><center>Welcome to Progress Chats</center></div>
                        <div class="panel-body">
                           
                            <div class="col-md-3">
                                {!! $assign_chart->html() !!}
                            </div>
                            <div class="col-md-3">
                                {!! $completed_chart->html() !!}
                            </div> 
                            <!-- <div class="col-md-3">
                                {!! $progress_chart->html() !!}
                            </div>  -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Of Main Application -->
{!! Charts::scripts() !!}
{!! $assign_chart->script() !!}
{!! $completed_chart->script() !!}
{!! $progress_chart->script() !!}

<br>


@endsection
