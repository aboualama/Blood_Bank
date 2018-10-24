@extends('admin.inc.layouts')

@section('title')
 Edit brand 

@endsection


 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit brand 

    <small>Cpanel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li> 
    <li><a href="#">brand</a></li> 
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Edit brand - {{ $brand->name  }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover"> 


            @include('errors.error') 

            {!! Form::open(['url' => 'admin/brand/edit/'.$brand->id , 'class' => 'form-group' , 'files' => true]) !!}
                {{ method_field('PUT') }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class=" control-label">brand Name</label>
                            <div class=" ">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $brand->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class=" control-label">brand description</label>
                            <div class=" ">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $brand->description }}" required autofocus>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                        <div class="form-group{{ $errors->has('keywords') ? ' has-error' : '' }}">
                            <label for="keywords" class=" control-label">brand keywords</label>
                            <div class=" ">
                                <input id="keywords" type="text" class="form-control" name="keywords" value="{{ $brand->keywords  }}" required autofocus>

                                @if ($errors->has('keywords'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('keywords') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                        <div class="form-group">
                            {!! Form::label('brand Image') !!}
                            {!! Form::file('img', ['class' => 'form-control']) !!}
                        </div>
 

 

                        <div class="form-group">
                            {!! Form::submit('Add New brand', ['class' => 'form-control btn btn-block btn-success']) !!}
                        </div>
                {!! Form::close() !!}
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
