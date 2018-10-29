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
                            <th>Patient Name</th>
                            <th>Patient Age</th>
                            <th>Blood Type</th>
                            <th>Bags Num</th>
                            <th>Hospital Name</th>
                            <th>City</th> 
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $index=>$record)
                        <tr>                      
                            @include('errors.error')   
                    
                            <td>{{$index + 1}}</td>
                            <td>{{$record->client->name}}</td>
                            <td>{{$record->name}}</td>
                            <td>{{$record->age}}</td>
                            <td>{{$record->blood_type}}</td>
                            <td>{{$record->bags_num}}</td>
                            <td>{{$record->hospital_name}}</td> 
                            <td>{{$record->city->name}}</td> 

                            <td class="text-center">  
                                {!! Form::open(['method' => 'DELETE', 'url' => ['dashboard/Donation', $record->id]]) !!} 
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


