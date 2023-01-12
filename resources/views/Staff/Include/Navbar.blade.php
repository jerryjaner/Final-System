
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
         <a href="{{route('staff_dashboard')}}" class="nav-link"><b>Nicks Resto Bar </b></a>
      </li>
     
    </ul>

   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
      <!-- Notifications Dropdown Menu 
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>  -->

        <li class="nav-item dropdown">
           
           <a class="nav-link" data-toggle="dropdown" href="#">
             <i class="fas fa-user"></i> {{Auth::user()->name}}
         {{--  <span class="badge badge-warning navbar-badge">15</span> --}}
          </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        
            {{--   <a href="{{route('admin_profile')}}" class="dropdown-item" style="text-align: center; font-size: 16px;">
             
              </a> --}}
          
            {{--   <div class="dropdown-divider"></div>
 --}}
            
              <a class="dropdown-item " style="font-size: 16px;"  href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();" >

                  <i class="fas fa-sign-out-alt mr-3"></i>Logout

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

              </a>
            </div>
        </li>

{{--        <div class="dropdown">
           
            Hi Staff!
            <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="margin-right: 20px;">
              <i class="fas fa-user" >  </i>
            </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Edit Profile</a></li>
            <li><a class="dropdown-item"href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">Logout

                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </li>
          </ul>
        </div> --}}

    </ul>
  </nav>
     
   