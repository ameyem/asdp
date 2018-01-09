@extends('layouts.app')
@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>New Task Assignment</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('AssignTasks.index') }}"> Back</a>
            </div>
        </div>
    </div>

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


    {!! Form::open(array('route' => 'AssignTasks.store','method'=>'POST')) !!}
    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Task ID:</strong>
                
            {!! Form::text('task_id', null, array('placeholder' => 'Task ID','class' => 'form-control')) !!} 
                
                   
                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>User ID</strong>
                {!! Form::text('user_id', null, array('placeholder' => 'User ID','class' => 'form-control')) !!}
                
                            
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Guide ID</strong>
                {!! Form::text('guide_id', null, array('placeholder' => 'Guide ID','class' => 'form-control')) !!}
                             
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Reviewer ID</strong>
                {!! Form::text('reviewer_id', null, array('placeholder' => 'Reviewer ID','class' => 'form-control')) !!}
                            
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Marks:</strong>
                {!! Form::text('marks', null, array('placeholder' => 'Work Title','class' => 'form-control')) !!}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Assigned Date:</strong>
                {!! Form::text('assigned_date', null, array('placeholder' => 'Work Description','class' => 'form-control')) !!}
             
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Completion Date:</strong>
                {!! Form::text('completion_date', null, array('placeholder' => 'What In IT For Me','class' => 'form-control')) !!}
               
            </div>
        </div>
        


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>


    </div>
    {!! Form::close() !!}




@endsection