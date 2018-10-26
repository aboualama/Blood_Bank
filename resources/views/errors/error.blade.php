 
@if($errors->any()) 
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
    </div> 
@endif


@if (session()->has('success'))
 <div class="alert alert-success">
   <li> {{ session('success') }} </li> 
 </div>
@endif

@if (session()->has('error')) 
    <div class="alert alert-danger"> 
            <li> {{ session('error') }} </li> 
    </div> 
@endif


@if (session()->has('message')) 
    <div class="alert alert-info"> 
            <li> {{ session('message') }} </li> 
    </div> 
@endif

