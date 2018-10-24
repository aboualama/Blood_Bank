@extends('admin.inc.layouts')

@section('title')
 Edit User

@endsection


 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit User

    <small>Cpanel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li> 
    <li><a href="#">User</a></li> 
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Edit User - {{ $user->first_name  }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover"> 


            @include('errors.error')

           <form class="form-horizontal" method="POST" action="{{ url('admin/user/update')}}/{{$user->id }}">
                        {{ csrf_field() }} {{ method_field('PUT') }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="form-contro control-label">First name</label>

                            <div class="form-contro">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $user->first_name  }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="name" class="form-contro control-label">Last Name</label>

                            <div class="form-contro">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="form-contro control-label">E-Mail Address</label>

                            <div class="form-contro">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email  }}"  required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="form-contro control-label">Password</label>

                            <div class="form-contro">
                                <input id="password" type="password" class="form-control" name="password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="form-contro control-label">Confirm Password</label>

                            <div class="form-contro">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="form-contro control-label">Gender</label>

                            <div class="form-contro">  
                                    <select id="gender" name="gender" class="form-control" placeholder="gender" > 
                                        <optgroup label="Gender">
                                            <option value="male" {{ $user->gender == 'male'?'selected':''}} >Male</option>
                                            <option value="female" {{ $user->gender == 'female'?'selected':''}} >Female</option> 
                                        </optgroup>
                                    </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" class="form-contro control-label">Date of Birth </label>

                            <div class="form-contro">
                                <input id="date" type="date" class="form-control" name="date" value="{{ $user->date }}" >

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                            <label for="bio" class="form-contro control-label">Bio</label>

                            <div class="form-contro">
                                <textarea id="bio" type="text" class="form-control" name="bio" required autofocus>{{ $user->bio }}</textarea>

                                @if ($errors->has('bio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
            <label for="status" class="form-contro control-label">Status</label>

            <div class="form-contro">  
                    <select id="status" name="status" class="form-control" placeholder="status" > 
                        <optgroup label="Status">
                            <option value="active" {{ $user->status == 'active'?'selected':''}} >active</option>
                            <option value="inactive" {{ $user->status == 'inactive'?'selected':''}} >inactive</option> 
                        </optgroup>
                    </select>

                @if ($errors->has('status'))
                    <span class="help-block">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
                @endif
            </div>
        </div>
 
                        <div class="form-group">
                            <div class="form-contro ">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </form>
   
       </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
 

@endsection
