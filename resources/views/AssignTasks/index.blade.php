@extends('layouts.app')
 

@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Assigned Tasks</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('AssignTasks.create') }}"> Assign New Task</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Task ID</th>
            <th>User ID</th>
            <th>Guide Name</th>
            <th>Reviewer Name</th>
            <th>Assigned Date</th>
            <th>Completion Date</th>
            <th width="280px">Action</th> 
        </tr>
    @foreach ($assign_tasks as $key => $task)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $task->task_id }}</td>
        <td>{{ $task->user_id }}</td>
        <td>{{ $task->guide_id }}</td>
        <td>{{ $task->reviewer_id}}</td>
        <td>{{ $task->assigned_date}}</td>
        <td>{{ $task->completion_date}}</td>
        <td>
            <!-- <a class="btn btn-info" href="{{ route('AssignTasks.show',$task->id) }}">Show</a> -->
            <a class="btn btn-primary" href="{{ route('AssignTasks.edit',$task->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['AssignTasks.destroy', $task->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>


    {!! $assign_tasks->render() !!}


@endsection