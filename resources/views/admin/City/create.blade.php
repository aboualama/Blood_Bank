@extends('admin.inc.layouts')

@section('title')
 Create New  {{ $title }}  

@endsection


 
 
  
@section('content')

 

<div class="box-body">   
    <div class="box-body">   






        <table id="example2" class="table table-bordered table-hover"> 


            @include('errors.error')



            {!! Form::open(['url' => 'dashboard/City', 'class' => 'form-group' ]) !!}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class=" control-label">Cty Name</label>
                    <div class=" ">
                        <input id="name" type="text" class="form-control" name="name"  required autofocus> 
                    </div>
                </div>    
         
                        
                <div class="form-group">
                    {!! Form::label('Governorate') !!}
                      <select  class="form-control" name="governorate_id"> 
                        <option selected>Choose...</option>

                            @foreach($governorates as $governorate)    
                                <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>  
                            @endforeach 

                      </select> 
                </div>


                <div class="form-group">
                    {!! Form::submit('Add New ' . $title   , ['class' => 'form-control btn btn-block btn-success']) !!}
                </div>
            {!! Form::close() !!}
    
       </table> 







    </div>  
</div>
    <!-- /.box-body -->

            
<div class="box-footer">
    Edit By ...
</div>
<!-- /.box-footer--> 
  

@endsection
