
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
    
        <a href="{{route('admin_dashboard')}}" class="nav-link"><b>Nicks Resto Bar </b></a>

      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    -->
    </ul>

    <!-- SEARCH FORM -->
   <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">  
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  -->
  
     

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">    
     {{--  <div class="dropdown">
          Hi<b> Admin </b> </span>
        <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="margin-right: 50px;">
          <i class="fas fa-user"></i>
        </button>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="{{route('admin_profile')}}">Profile</a></li>
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

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"></i> Administrator
         {{--  <span class="badge badge-warning navbar-badge">15</span> --}}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         {{--  <span class="dropdown-item dropdown-header text-center">Hi <b>{{Auth::user()->name}}</b></span>
          <div class="dropdown-divider"></div> --}}
          <a href="{{route('admin_profile')}}" class="dropdown-item" style="font-size: 16px;" >
            <i class="fas fa-user mr-3"></i> Profile
           {{--  <span class="float-right text-muted text-sm">3 mins</span> --}}
          </a>

          <div class="dropdown-divider"></div> 
          <a href="{{ route('change_password') }}" class="dropdown-item" style="font-size: 16px;" >
            <i class="fas fa-cog mr-3"></i>Change Password
           {{--  <span class="float-right text-muted text-sm">3 mins</span> --}}
          </a>


      
          <div class="dropdown-divider"></div>

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

    </ul>
  </nav>


 