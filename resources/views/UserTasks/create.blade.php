@extends('layouts.app')
@section('content')


<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Send Your Task</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('UserTasks.index') }}"> Back</a>
            </div>
        </div>
    </div>
             <table class="table table-bordered">
                    <tr>
                        <th>Assign Task Id</th> 
                        <th>Request</th>
                        <th>Message</th>
                        <th>Files</th>
                        
                    </tr>
                    @foreach ($user_tasks as $task)
                    
                    <tr>
                        <td>{{ $task->assigntask_id }}</td> 
                        <td>{{ $task->request_for }}</td>
                        <td>{{ $task->message }}</td>
                        <td>{{ $task->uploads }}</td>
                    </tr>
                    @endforeach
                </table>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::open(array('route' => 'UserTasks.store','method' => 'POST','files' => true)) !!}


    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Assigned Task Id:</strong>
                {!! Form::text('assigntask_id', $assign_tasks->id) !!}
                <!-- {!! $assign_tasks->id !!} -->
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Request For:</strong>
                {!! Form::select('request_for', [
                '1' => ['Review' => 'Review'],
                '2' => ['Redo' => 'Redo'],
                '3' => ['Drop' => 'Drop']],
                array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Message :</strong>
                {!! Form::text('message', null, array('placeholder' => 'Message ','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Upload:</strong>
                {!! Form::file('uploads') !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>


@endsection
