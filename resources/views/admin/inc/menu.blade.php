 
<div class="navbar-custom-menu">
        <ul class="nav navbar-nav" style="margin-right: 20px;">
   
          <!-- User Account: style can be found in dropdown.less -->
          <li class=" user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">  
              <img src="{{asset('/cpanel')}}/dist/img/avatar.png" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a> 
          </li>
          <li class="user-footer"> 
            <div class="pull-right">
              <a href="{{ url('dashboard/user/logout') }}" class="btn btn-danger" style="margin-top: 8px;">Sign out</a>
            </div>
          </li> 
 
        </ul>
      </div>