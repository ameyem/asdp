@extends('layouts.app')
@section('content')

<h1>hello, welcome to user tasks</h1>



                <table class="table table-bordered">
                    <tr>
                        <!-- <th>No</th>  -->
                        <th>Work Title</th>
                        <th>Work Description</th>
                        <th>What In IT For Me</th>
                        <th>User Credits</th>
                        <th>Set By</th>
                        <th>Review By</th>
                        <th>Assigned Date</th>
                        <th>Target Date</th>
                        <th>Download</th>                    
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($assign_tasks as $task)
                    
                    <tr>
                    <!-- <?php $i = 1; ?>
                        <td> {{ $i++ }}</td> -->
                        <td>{{ $task->worktitle }}</td>
                        <td>{{ $task->workdescription }}</td>
                        <td>{{ $task->whatinitforme }}</td>
                        <td>{{ $task->usercredits}}</td>
                        <td>{{ $task->guide_id }}</td>
                        <td>{{ $task->reviewer_id}}</td>
                        <td>{{ $task->assigned_date}}</td>
                        <td>{{ $task->completion_date}}</td>
                        <td>{{ $task->uploads }}</td>
                        <td></td>

                    </tr>
                    @endforeach
                </table>

              


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
