@extends('layouts.app')
@section('content')

   
        <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color:#2471A3">Hello, Welcome to User Tasks</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ url('/') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="pull-left">
        <h1>
        <a class="btn btn btn-lg" value='' href="{{ route('UserTasks.index')}}">All Tasks</a>
        <a class="btn btn-primary btn-lg" href="{{ route('TaskMigrate.index') }}">Work to get Started</a>
        <a class="btn btn-info btn-lg" value='review' href="{{ route('TaskMigrate.show','review') }}">Work For Reviewed</a>
        <a class="btn btn-warning btn-lg" value='redo' href="{{ route('TaskMigrate.show','redo') }}">Work to be Refined</a>
        <a class="btn btn-success btn-lg" value='approved' href="{{ route('TaskMigrate.show','approved') }}">Work Completed</a>
        <a class="btn btn-danger btn-lg" value='drop' href="{{ route('TaskMigrate.show','drop') }}">Work Dropped</a>
        </h1>
    </div>



     <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <tr style="color:#2471A3">
                        <th>User ID</th>
                        <th>Assign Task Id</th> 
                        <th>Work Title</th>
                        <th>Work Description</th>
                        <th>What In IT For Me</th>
                        <th>User Credits</th>
                        <th>Set By</th>
                        <th>Review By</th>
                        <th>Assigned Date</th>
                        <th>Target Date</th>
                        <th>File Link</th>                    
                        <th width="280px">Action</th>
                        
   
                    </tr>
                    @foreach ($assign_tasks as $task)
                    
                    <tr style="color:454545">
                        <td>{{ $task->user_id}}</td>
                        <td>{{ $task->id }}</td> 
                        <td>{{ $task->worktitle }}</td>
                        <td>{{ $task->workdescription }}</td>
                        <td>{{ $task->whatinitforme }}</td>
                        <td>{{ $task->usercredits}}</td>
                        <td>{{ $task->guide_id }}</td>
                        <td>{{ $task->reviewer_id}}</td>
                        <td>{{ $task->assigned_date}}</td>
                        <td>{{ $task->completion_date}}</td>
                        @if ($task->uploads)
                        <td><a class="btn btn-default btn-xs" href="{{ $task->uploads }}" download="{{ $task->uploads }}">Download</a></td>
                        @else
                        <td>Nill</td>
                        @endif
                        <td>
                            <!-- <a class="btn btn-info" href="{{ route('AdminTasks.show',$task->id) }}">Show</a> -->
                            <!-- <a class="btn btn-primary" href="{{ route('UserTasks.create',9) }}">View Work</a> -->
                             <a class="btn btn-info btn-xs" href="{{ route('UserTasks.show',$task->id) }}">View Work</a>
                        </td>
                        
                       

                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
                 






<!-- @foreach ($assign_tasks as $task)

<div class="container">
<div class="row">  
<div class="col-sm-6">

            <table style="width:100%;background-color:#00FFFF;">
                <tbody>
                    <tr> 
                        <td style="width:33%">User ID: {{ $task->user_id}}  </td> 
                        <td  style="width:33%">Assign Task Id:{{ $task->id }}  </td>
                        <td style="width:33%">Status: </td> 
                    </tr>
                </tbody>
            </table>
            <table style="width:100%;background-color:yellow">
                <tr>
                    <td style="width:50%">Assigned Date:{{ $task->assigned_date}}</td>
                    <td style="width:50%">Targeted Date:{{ $task->completion_date}}</td>
                </tr>   
            </table>
            <table style="width:100%;background-color:#F0FAFA">
                <tbody>
                    <tr><td><h3>Title:{{ $task->worktitle }}    </h3></td></tr> 
                    <tr><td>Decscription: {{ $task->workdescription }}  </td></tr> 
                    <tr><td><b>For: {{ $task->whatinitforme }}</b></td></tr>
                    <tr><td><b>File Link:
                     @if ($task->uploads)
                    <td><a class="btn btn-default btn-xs" href="{{ $task->uploads }}" download="{{ $task->uploads }}">Download</a></td>
                    @else
                    <td>Nill</td>
                    @endif</b></td></tr>
                    
                </tbody>
            </table>
            <table style="width:100%;background-color:#AFFAFF">
                <tbody>
                    <tr>
                        <td>Set By:{{ $task->guide_id }} </td>
                        <td><a class="btn btn-info btn-xs" href="{{ route('UserTasks.show',$task->id) }}">View Work</a></td>
                    </tr>
                </tbody>
            </table> 
            
            </div>
            </div>  
            </div><br><br>
            @endforeach  -->

            @endsection