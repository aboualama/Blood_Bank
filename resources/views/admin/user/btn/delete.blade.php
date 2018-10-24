{{-- <a href="user/delete/{{ $id }}" class="btn btn-danger"><i class="fa fa-edit"></i></a> --}}

{!! Form::open(['method' => 'DELETE', 'url' => ['admin/user/delete', $id]]) !!}

 
    <div class="form-group">
        <div class=" ">
            <button type="submit" class="btn  btn-danger">
                <i class="fa fa-trash"></i>  
            </button>
        </div>
    </div>
{!! Form::close() !!}