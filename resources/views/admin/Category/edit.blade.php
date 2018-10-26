@extends('admin.inc.layouts')

@section('title')
 Edit  {{ $title }}  

@endsection


 
 
  
@section('content')

 

<div class="box-body">   
    <div class="box-body">   



 
        <table id="example2" class="table table-bordered table-hover"> 


            @include('errors.error')



               {!! Form::open(['url' => 'dashboard/Category/'.$record->id , 'class' => 'form-group' , 'files' => true]) !!}
                {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="name" class=" control-label">Category Name</label>
                            <div class=" ">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $record->name }}" required autofocus> 
                            </div>
                        </div>      


                <div class="form-group">
                    {!! Form::submit('Edit ' . $title   , ['class' => 'form-control btn btn-block btn-success']) !!}
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