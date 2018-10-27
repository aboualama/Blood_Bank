@extends('admin.inc.layouts')

@section('title')
 Create New  {{ $title }}  

@endsection


 
 
  
@section('content')

 

<div class="box-body">   
    <div class="box-body">   






        <table id="example2" class="table table-bordered table-hover"> 


            @include('errors.error')



            {!! Form::open(['url' => 'dashboard/Post', 'class' => 'form-group' , 'files' => true ]) !!}

                <div class="form-group">
                    <label lass=" control-label">Post title</label>
                    <div class=" ">
                        <input type="text" class="form-control" name="title"  required autofocus> 
                    </div>
                </div> 

                <div class="form-group">
                    <label class=" control-label">Post content</label>
                    <div class=" ">
                        <textarea type="text" class="form-control ckeditor" name="content"  required autofocus>
                            
                        </textarea>
                    </div>
                </div> 
                        
                <div class="form-group">
                    {!! Form::label('Category') !!}
                      <select  class="form-control" name="category_id"> 
                        <option selected>Choose...</option>

                            @foreach($categories as $category)    
                                <option value="{{ $category->id }}">{{ $category->name }}</option>  
                            @endforeach 

                      </select> 
                </div> 

                <div class="form-group">
                    {!! Form::label('Post thumbnail') !!}
                    {!! Form::file('thumbnail', ['class' => 'form-control']) !!}
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
