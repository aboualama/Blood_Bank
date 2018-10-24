@extends('admin.inc.layouts')

@section('title')
 Create Contact

@endsection


@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    New Contact

    <small>Cpanel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li> 
    <li><a href="#">Contact</a></li> 
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Hover Data Table</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover"> 


            @include('errors.error')

            {!! Form::open(['url' => 'admin/contact', 'class' => 'form-group']) !!}

                <div class="form-group">
                    {!! Form::label('Email') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!} 
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            {!! Form::label('Phone') !!}
                            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="col-lg-6">
                            {!! Form::label('Fax') !!}
                            {!! Form::text('fax', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group"> 
                    <div class="row">
                        <div class="col-lg-6">
                            {!! Form::label('Country') !!}
                            {!! Form::text('country', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="col-lg-6">
                            {!! Form::label('City') !!}
                            {!! Form::text('city', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
 
                <div class="form-group">
                    {!! Form::label('Address') !!}
                    {!! Form::text('address', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group"> 
                    <div class="row">
                        <div class="col-lg-6">
                            {!! Form::label('Lat') !!}
                            {!! Form::text('lat', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="col-lg-6">
                            {!! Form::label('Lan') !!}
                            {!! Form::text('lan', null, ['class' => 'form-control']) !!}
                        </div>
                    </div> 
                </div>

                <div class="form-group">
                    {!! Form::submit('Create New Contact!', ['class' => 'form-control btn btn-block btn-success']) !!}
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