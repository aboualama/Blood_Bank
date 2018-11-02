@extends('admin.inc.layouts')

@section('title')
 {{ $title }}

@endsection
 
  
@section('content')

 

        <div class="box-body">   
	        <div class="box-body">   

                 
 

                <table class="text-center datatable table table-bordered table-hover">
                    <thead>
                        <tr >
                            <th>#</th>
                            <th>Client Name</th> 
                            <th>Message</th> 
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @include('errors.error') 
                        @foreach ($records as $index=>$record)
                        <tr>                        
                    
                            <td>{{$index + 1}}</td>
                            <td><a href="{{url('dashboard/Report')}}/{{$record->id}}">{{$record->client->name}}</a></td> 
                            <td>{!! str_limit( strip_tags($record->message)   , 10 , $end = '   ..... ') !!}  </td>  

                            <td class="text-center">  
                                {!! Form::open(['method' => 'DELETE', 'url' => ['dashboard/Report', $record->id]]) !!} 
                                    <div class="form-group">
                                        <div class=" ">
                                            <button type="submit" class="btn  btn-danger">
                                                <i class="fa fa-trash"></i>  
                                            </button>
                                        </div>
                                    </div>
                                {!! Form::close() !!}   
                            </td>

                        </tr> 
                        @endforeach
                            {{ $records->links() }}
                    </tbody>
                </table>





	        </div>  
        </div>
        	<!-- /.box-body -->

        	
       <div class="box-footer">
            Edit By ...
        </div>
        <!-- /.box-footer--> 
 
@endsection



@push('js')

{{-- {!! $dataTable->scripts() !!}  --}}

@endpush


