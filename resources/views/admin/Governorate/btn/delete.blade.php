 {!! Form::open(['method' => 'DELETE', 'url' => ['dashboard/Governorate', $id]]) !!}

 
    <div class="form-group">
        <div class=" ">
            <button type="submit" class="btn  btn-danger">
                <i class="fa fa-trash"></i>  
            </button>
        </div>
    </div>
{!! Form::close() !!}