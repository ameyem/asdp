@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><center><h2>Ameyem Skills Registration</h2></center></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label"> Institute Name</label>

                            <div class="col-md-6">
                            
                            <select name="institutes_id" class="form-control">
                            <?php 
                            use App\institute;
                            $institutes = institute::all(); ?>
                                @foreach ($institutes as $institute)
                                    <option value="{{$institute->id}}">{{$institute->name}} </option>                
                                @endforeach
                                 
                            
                            </select>
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label"> Full Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Mobile Number</label>

                            <div class="col-md-6">
                                <input id="password-phone_number" type="text" class="form-control" name="phone_number" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role_name" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">

                            <select name="role_id" class="form-control">
                            <?php 
                            use Spatie\Permission\Models\Role;
                            use Spatie\Permission\Models\Permission;
                            use Illuminate\Http\Request;
                            use Illuminate\Support\Facades\Gate;
                            use App\Http\Controllers\Controller;
                            use App\Http\Requests\Admin\StoreRolesRequest;
                            use App\Http\Requests\Admin\UpdateRolesRequest;
                            $roles = Role::all(); ?>
                                @foreach ($roles as $role)

                                    @if($role->id >= 3)
                                    <option value="{{$role->id}}">{{$role->name}} </option>   
                                    @endif             
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="branch_id" class="col-md-4 control-label">Branch Name</label>

                            <div class="col-md-6">
                            
                            <select name="branch_id" class="form-control">
                            <?php 
                            use App\Branch;
                            $branch = Branch::all(); ?>
                                @foreach ($branch as $branches)
                                    <option value="{{$branches->id}}">{{$branches->name}} </option>                
                                @endforeach
                            </select>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="batch_id" class="col-md-4 control-label">Batch Starting Year</label>

                            <div class="col-md-6">
                            
                            <select name="batch_id" class="form-control">
                            <?php 
                            use App\batch;
                            $batch = batch::all(); ?>
                                @foreach ($batch as $batches)
                                    <option value="{{$batches->id}}">{{$batches->name}} </option>                
                                @endforeach
                            </select>
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
