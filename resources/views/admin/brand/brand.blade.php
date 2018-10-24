@extends('admin.inc.layouts')

@section('title')
 {{ $title }}

@endsection


 
@section('content')
  <!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Brand

    <small>Cpanel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li> 
    <li><a href="#">Brand</a></li> 
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">{{ $title }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">  

         {!! $dataTable->table([

            'class' => 'datatable table table-bordered table-hover'

        ]) !!} 

 
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
 


@push('js')

{!! $dataTable->scripts() !!} 

@endpush

@endsection
