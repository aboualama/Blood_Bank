@include('admin.inc.head')
@include('admin.inc.header')
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


  <!-- Content Header (Page header) -->
  @if (isset($title)) 
    <section class="content-header">
      <h1> 
          {{$title}} Dashbord 
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url ('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> {{$title}}</a></li> 
      </ol>
    </section>     

    <!-- Main content -->
    <section class="content"> 
      <!-- Default box -->
      <div class="box"> 
        <div class="box-header with-border">
          <h3 class="box-title">{{ $title }}</h3> 
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div> 
        <!-- /.box-header -->
  @endif
    

             @yield('content')
        
        
        
  
      </div>
      <!-- /.box -->  
    </section>
    <!-- /.content --> 
 
  </div>
  <!-- /.content-wrapper -->

 
  
@include('admin.inc.sidebar')
@include('admin.inc.footer')


 