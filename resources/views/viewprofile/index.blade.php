@extends('layouts.app')
@section('content')


<div class="container" style="padding-top: 60px;">
        <h1 class="page-header">profile</h1>
        <div class="row">
          <!-- left column -->
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="text-center">
              <img src="http://www.skills.ameyem.com/images/logo.png" class="avatar img-circle img-thumbnail" alt="avatar">
              <h6>Upload a different photo...</h6>
              <input type="file" class="text-center center-block well well-sm">
            </div>
          </div>
          <!-- edit form column -->
          <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
            
            <h3>Personal info</h3>
            <form class="form-horizontal" role="form" method="GET">

              <div class="form-group">
                <label class="col-lg-3 control-label">Name:</label>
                <div class="col-lg-8">
                  <input class="form-control" value='{{ $profiles->name }}' placeholder="name" type="text">
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                  <input class="form-control" value='{{ $profiles->email }}' placeholder="email" type="text">
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-3 control-label">Mobile Number:</label>
                <div class="col-lg-8">
                  <input class="form-control" value='{{ $profiles->number }}' placeholder="number" type="text">
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-3 control-label">Date Of Birth:</label>
                <div class="col-lg-8">

                  <input class="form-control" value="{{ $profiles->dob }}" placeholder="dob" type="text">

                </div>
              </div>
              
              <div class="form-group">
                <label class="col-md-3 control-label">Qualification:</label>
                <div class="col-md-8">
                  <input class="form-control" value='{{$profiles->qualification}}' placeholder="qualification" type="text">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label">Specialization:</label>
                <div class="col-md-8">
                  <input class="form-control" value='{{$profiles->specialization}}' placeholder="specialization" type="text">
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-md-3 control-label">Marks:</label>
                <div class="col-md-8">
                  <input class="form-control" value='{{$profiles->marks}}' placeholder="marks" type="text">
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-3 control-label">Passed Out:</label>
                <div class="col-lg-8">
                  <input class="form-control" value='{{$profiles->passout}}' placeholder="passout" type="text">
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-3 control-label">College Address:</label>
                <div class="col-lg-8">
                  <input class="form-control" value='{{$profiles->collegeaddress}}' placeholder="collegeaddress" type="text">
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-3 control-label">Home Address:</label>
                <div class="col-lg-8">
                  <input class="form-control" value='{{$profiles->homeaddress}}' placeholder="homeaddress" type="text">
                </div>
              </div>

               <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('viewprofile.edit',$profiles->id) }}"> Edit profile</a>
              </div>
              
            </form>
          </div>
        </div>
      </div>



@endsection