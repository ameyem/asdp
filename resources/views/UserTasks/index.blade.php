@extends('layouts.app')
@section('content')

   
        <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>hello, welcome to user tasks</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ url('/') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">



                <table class="table table-bordered">
                    <tr>
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
                    
                    <tr>
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

              


@endsection





<!-- <table style="width:100%;background-color:#00FFFF;">
                <tbody>
                    <tr> 
                        <td style="width:33%">Max Credits:  </td> 
                        <td  style="width:33%">Earned:  </td>
                        <td style="width:33%">Status: </td> 
                    </tr>
                </tbody>
            </table>
            <table style="width:100%;background-color:yellow" class="table table-bordered">
                <tr>
                    <th style="width:50%">Set On:</th>
                    <th style="width:50%">Targeted ON:</th>
                </tr>
                
            </table>
            <table style="width:100%;background-color:#F0FAFA">
                <tbody>
                    <tr><td><h3>Title:    </h3></td></tr> 
                    <tr><td>Decscription:   </td></tr> 
                    <tr><td><b>For: </b></td></tr>
                    
                </tbody>
            </table>
            <table style="width:100%;background-color:#AFFAFF">
                <tbody>
                    <tr> 
                        <td>Set For:  </td> 
                        <td>Set By: </td>
                    </tr>
                </tbody>
            </table> -->
