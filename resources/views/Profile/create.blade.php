@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <div class="pull-left">
                <h2 style="color:#2471A3">Create New Profile</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('Profile.index') }}"> Back</a>
            </div>
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

    {!! Form::open(array('route' => 'Profile.store','method'=>'POST')) !!}
    <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <input type='text', name='name', value='{{ Auth::user()->name }}'>
            <!-- {!! Form::text('name', null, array('placeholder' => 'Enter Your Name','class' => 'form-control')) !!} -->
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            <input type='text', name='email', value='{{ Auth::user()->email }}'>
            <!-- {!! Form::text('email', null, array('placeholder' => 'Enter Your Email Address','class' => 'form-control')) !!} -->
        </div>
    </div>

   
    

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Mobile Number:</strong>
            {!! Form::text('phone_number', null, array('placeholder' => 'Mobile Number','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date Of Birth:</strong>
            {!! Form::date('dob', null, array('placeholder' => 'yyyy-mm-dd','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Qualification:</strong>
            {!! Form::text('qualification', null, array('placeholder' => 'Qualification','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Specialization:</strong>
            {!! Form::text('specialization', null, array('placeholder' => 'Specialization','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Marks  :</strong>
            {!! Form::text('marks', null, array('placeholder' => 'Marks in %','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Passed Out:</strong>
            {!! Form::date('passout', null, array('placeholder' => 'Select Passed Out Date','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>College Address:</strong>
            {!! Form::text('collegeaddress', null, array('placeholder' => 'Enter College Name and Address','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Home Address:</strong>
            {!! Form::text('homeaddress', null, array('placeholder' => 'Home Address','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>


    </div>
    {!! Form::close() !!}


@endsection

