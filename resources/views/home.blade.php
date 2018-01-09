@extends('layouts.app')

@section('content')
<!--<h1>{{Auth::user()->name }}</h1>
 <h1>{{Auth::user()->id }}</h1>
<h2>{{Auth::user()->email }}</h2>  -->







    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to Work Environment</div>

                <div class="panel-body">
                    
                    <!--quick info section -->
                    
                    
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                    <div class="alert alert-success">                                     
                                        <i class="fa fa-pencil-square-o fa-3x"></i>
                                        <h3><a style="text-decoration:none;" href="{{ route('AdminTasks.index') }}">Admin Tasks</a> </h3>
                                    </div>
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">Total Tasks:
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                    <div class="alert alert-info">
                                        <i class="fa fa-cogs fa-3x"></i>
                                       
                                        <h3><a style="text-decoration:none;" href="{{ route('AssignTasks.index') }}">Assign Tasks</a></h3>
                                    </div>
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">Total Users:
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                    <div class="alert alert-success">
                                        <i class="fa fa fa-floppy-o fa-3x"></i>
                                        <h3><a style="text-decoration:none;" href="{{ route('Profile.index') }}">Profile</a></h3>
                                    </div>
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">New Data Uploaded
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                    <div class="alert alert-info">
                                        <i class="fa fa-users fa-3x"></i>
                                        <h3><a style="text-decoration:none;" href=/usertasks>Admin Conversations</a></h3>
                                    </div>
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">New Data Uploaded
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!--end quick info section -->
                    

                    <!-- Users Tasks info sectiopn -->



                    <div class="row">
                            <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                    <div class="alert alert-info">                                     
                                        <i class="fa fa-pencil-square-o fa-3x"></i>
                                        <h3><a style="text-decoration:none;" href="{{ route('UserTasks.index') }}">User Tasks</a> </h3>
                                    </div>
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">Total Tasks:
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                    <div class="alert alert-success">
                                        <i class="fa fa-cogs fa-3x"></i>
                                       
                                        <h3><a style="text-decoration:none;" href="{{ route('AssignTasks.index') }}">Assign Tasks</a></h3>
                                    </div>
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">Total Users:
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                    <div class="alert alert-info">
                                        <i class="fa fa fa-floppy-o fa-3x"></i>
                                        <h3><a style="text-decoration:none;" href="{{ route('Profile.index') }}">Profile</a></h3>
                                    </div>
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">New Data Uploaded
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                    <div class="alert alert-success">
                                        <i class="fa fa-users fa-3x"></i>
                                        <h3><a style="text-decoration:none;" href=/usertasks>User Tasks</a></h3>
                                    </div>
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">New Data Uploaded
                                        </span>
                                    </div>
                                </div>
                            </div>-->
                        </div> 




                     <!-- end of Users Tasks info sectiopn -->
                </div>
            </div>
        </div>
    </div>
@endsection
