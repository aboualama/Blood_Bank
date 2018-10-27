 
 
    <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel"> 

      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('/cpanel')}}/dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> 

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
         
   
          <li class="treeview ">
            <a href="#">
              <i class="fa fa-server"></i> <span>Setting</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a> 
            <ul class="treeview-menu">
              <li><a href="/admin/settings"><i class="fa fa-circle-o"></i>Setting</a></li>    
            </ul>
          </li> 
  

        <li><a href="{{url('dashboard/user')}}"><i class="fa fa-circle-o text-red"></i> <span>User</span></a></li>
  
        <li><a href="{{url('dashboard/Governorate')}}"><i class="fa fa-circle-o text-red"></i> <span>Governorate</span></a></li>
        <li><a href="{{url('dashboard/City')}}"><i class="fa fa-circle-o text-red"></i> <span>City</span></a></li>
        <li><a href="{{url('dashboard/Category')}}"><i class="fa fa-circle-o text-red"></i> <span>Category</span></a></li>
        <li><a href="{{url('dashboard/Post')}}"><i class="fa fa-circle-o text-red"></i> <span>Post</span></a></li>
        <li><a href="{{url('dashboard/Settings')}}"><i class="fa fa fa-server text-red"></i> <span>Settings</span></a></li>
        <li><a href="{{url('dashboard/Client')}}"><i class="fa fa fa-server text-red"></i> <span>Client</span></a></li>



 
    </section>
    <!-- /.sidebar -->
  </aside> 