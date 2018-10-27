@extends('admin.inc.layouts')

@section('title')
 {{ $title }}

@endsection
 
  
@section('content')

 

        <div class="box-body">   
	        <div class="box-body">   

                 
 

                <table class="datatable table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $index=>$record)
                                <tr>                      
                                    @include('errors.error')   
                            
                                    <td>{{$index + 1}}</td>
                                    <td>{{$record->name}}</td>
                                    <td>{{$record->email}}</td>
                                    <td>{{$record->phone}}</td>
                                    <td>{{$record->city->name}}</td>
                                    <form method="post" action="{{url('/dashboard/Client/active/'.$record->id)}}">
                                        {{ csrf_field() }}
                                    <td class="text-center">
                                        <input type="checkbox" name="avtive" 
                                            onChange="this.form.submit()" {{($record->is_active ==1) ? 'checked' : ''}}>
                                    </td> 
                                    </form>
                                    <td class="text-center">  
                                    {!! Form::open(['method' => 'DELETE', 'url' => ['dashboard/Client', $record->id]]) !!} 
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


