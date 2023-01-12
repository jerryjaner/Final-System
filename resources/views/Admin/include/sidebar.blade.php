  @php

    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
    $pending_orders = \App\Models\order::where('order_status','pending')->count();
    $customer_feedback = \App\Models\Feedback::count();
    
  @endphp
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
    
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <img src="{{asset('/BackEndSourceFile')}}/Nicks_logo/nickslogo.jpg" class="img-circle elevation-2" style="width: 100px; margin-left: 50px;" alt="User Image"> 
         <!-- <h4 style="color: white; margin-left: 20px;">  Nick's Resto Bar</h4> -->
        </div>
       
           <!-- <div class="info">
              <br>
              <br>
              <br>
              <br>
              <h2>
             <a href="#" id="info" class="d-block" style="text-decoration: none;">Nick's Resto Bar</a> </h2> 
            </div> 
          -->
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->   
          <li class="nav-item has-treeview ">
            <a href="{{route('admin_dashboard')}}" class="nav-link {{($route == 'admin_dashboard')?'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p class="sidebarfont">
                  Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview ">
            <a href="{{route('manage_user')}}" class="nav-link {{($route == 'manage_user')?'active':''}}" >
               <i class="nav-icon fas fa-users"></i>
              <p class="sidebarfont">
                  Users
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview ">
            <a href="{{route('manage_cate')}}" class="nav-link {{($route == 'manage_cate')?'active':''}}">
                <i class="nav-icon fas fa-utensil-spoon"></i>
              <p class="sidebarfont">
                  Category
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview ">
            <a href="{{route('manage_dish_table')}}" class="nav-link {{($route == 'manage_dish_table')?'active':''}} ">
              <i class="nav-icon fas fa-utensils"></i>
              <p class="sidebarfont">
                  Menu
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview ">
            <a href="{{ route('shipping_fee') }}" class="nav-link {{($route == 'shipping_fee')?'active':''}}">
                <i class="nav-icon fas fa-truck"></i>
              <p class="sidebarfont">
                  Shipping Fee
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview ">
            <a href="{{route('show_order')}}" class="nav-link {{($route == 'show_order'|| $route == 'view_invoice')?'active':''}}">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p class="sidebarfont">
                  Orders
              </p>
                @if($pending_orders > 0)
                  <span class="badge badge-info right" title="Pending Orders">{{$pending_orders}}</span>
                @endif
            </a>
          </li>
          <li class="nav-item has-treeview ">
            <a href="{{route('message')}}" class="nav-link {{($route == 'message')?'active':''}}">
              <i class="nav-icon fas fa-envelope"></i>
              <p class="sidebarfont">
                  Message Customer
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview ">
            <a href="{{route('feedback')}}" class="nav-link {{($route == 'feedback')?'active':''}}">
              <i class="nav-icon fas fa-comments"></i>
              <p class="sidebarfont">
                   Customer Feedback
              </p>
            {{--   @if($customer_feedback > 0)
                <span class="badge badge-info right" title="Feedback">{{$customer_feedback}}</span>
              @endif --}}
            </a>
          </li>
          <li class="nav-item has-treeview ">
            <a href="{{route('client_report')}}" class="nav-link {{($route == 'client_report')?'active':''}} ">
              <i class="nav-icon fas fa-file"></i>
              <p class="sidebarfont">
                  Customer Report
              </p>
            </a>
          </li>
         {{--  <li class="nav-item has-treeview ">
            <a href="{{route('monthly')}}" class="nav-link {{($route == 'monthly')?'active':''}}">
              <i class="nav-icon fas fa-folder"></i>
              <p class="sidebarfont">
                  Monthly Order 
              </p>
            </a>
          </li> --}}
           <li class="nav-item has-treeview ">
            <a href="{{route('month')}}" class="nav-link {{($route == 'month')?'active':''}}">
              <i class="nav-icon fas fa-calendar"></i>
              <p class="sidebarfont">
                   Monthly Transactions
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>