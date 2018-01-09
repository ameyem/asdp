@extends('layouts.app')
 

@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Admin Tasks</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('AdminTasks.create') }}"> Create New Task</a>
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
            <th>Work Nature</th>
            <th>On Skills or Language</th>
            <th>Work Title</th>
            <th>Work Description</th>
            <th>What In IT For Me</th>
            <th>User</th>
            <th>Guide</th>
            <th>Reviewer</th>           
            <th>Updated_At</th>
            <th>Created_At</th>
            
            <th width="280px">Action</th>
            <th>Uploads<th>
        </tr>
    @foreach ($admin_tasks as $key => $task)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $task->worknature }}</td>
        <td>{{ $task->onskills }}</td>
        <td>{{ $task->worktitle }}</td>
        <td>{{ $task->workdescription}}</td>
        <td>{{ $task->whatinitforme}}</td>
        <td>{{ $task->usercredits}}</td>
        <td>{{ $task->guidecredits}}</td>
        <td>{{ $task->reviewercredits}}</td>        
        <td>{{ $task->updated_at}}</td>
        <td>{{ $task->created_at}}</td>

        
        <td>
            <a class="btn btn-info" href="{{ route('AdminTasks.show',$task->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('AdminTasks.edit',$task->id) }}">Edit</a>

            
            {!! Form::open(['method' => 'DELETE','route' => ['AdminTasks.destroy', $task->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} 
            {!! Form::close() !!}
        </td>
        <td><a href='{{ asset("uploads/$task->uploads") }}'>{{ $task->uploads}}</a></td>
    </tr>
    @endforeach
    </table>


    {!! $admin_tasks->render() !!}


@endsection