@extends('admin.inc.layouts')

@section('title')
 {{ $title }}

@endsection
 
  
@section('content')

 

        <div class="box-body">   
            <div class="box-body">   

            @include('errors.error')
                
               {!! $dataTable->table([ 'class' => 'datatable table table-bordered table-hover'  ]) !!}  
	        </div>  
        </div>
        	<!-- /.box-body -->

        	
       <div class="box-footer">
            Edit By ...
        </div>
        <!-- /.box-footer--> 
 
@endsection



@push('js')

{!! $dataTable->scripts() !!} 

@endpush


