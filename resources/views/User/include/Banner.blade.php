@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();

	  if(Auth::check()){
		 $unread_msg = \App\Models\Message::where('customer_email', Auth::user()->email)
	 									  ->where('message_status','unread')->count();
	  }
	
@endphp


<div class="banner">
		<!-- header -->
		<div class="header">
			<div class="navigation agiletop-nav">
				<div class="container">
					<nav class="navbar navbar-default">
						<!-- Brand and toggle get grouped for better mobile display -->
						<img class="nicks_logo" src="{{asset('/BackEndSourceFile')}}/Nicks_logo/nickslogo.jpg" style="width: 80px; border-radius: 50%; float: left;  margin-top: 5px; margin-right: 20px; " alt="Nicks_Logo"> 

						<div class="navbar-header w3l_logo">
							<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
								
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>

							</button>
							
							<h1><a href="#">Nick's<span style="font-size: 16px;">Resto Bar & Cafe-Restaurant</span></a></h1>
						</div> 
						<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
							<ul class="nav navbar-nav navbar-right">

							
								<li><a href="{{route('user_dashboard')}}" class="{{($route == 'user_dashboard')?'active':''}}">Home</a></li>	
								<!-- Mega Menu -->

								<li class="dropdown">
									<a href="#" class="dropdown-toggle {{($route == 'category_dish')?'active':''}}" data-toggle="dropdown">Food <b class="caret"></b></a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="row">
											<div class="col-sm-6">
												<ul class="multi-column-dropdown">
													<h6> Category</h6> 

													@foreach($categories as $category)	

														<li class="head-dpdn">
															<a style="font-size:14px" 
															   href="{{route('category_dish',['category_id'=>$category->category_id])}}">
															   {{$category->category_name}}
															</a>
														</li>	

													@endforeach
												</ul>
											</div>
											{{-- <div class="col-sm-6">
												 <ul class="multi-column-dropdown">
												
													<h6>Food Category</h6> 

													@foreach($categories as $category)	

														<li><a style="font-size:14px"
														 href="{{route('category_dish',['category_id'=>$category->category_id])}}">{{$category->category_name}}</a></li>	

													@endforeach
												
												</ul>
											</div> 
											<div class="col-sm-4">
												<ul class="multi-column-dropdown">
													<h6>Box type</h6> 
													<li><a href="menu.html">Diet</a></li> 
													<li><a href="menu.html">Mini</a></li> 
													<li><a href="menu.html">Regular</a></li> 
													<li><a href="menu.html">Special</a></li> 
												</ul>
											</div>
											 --}}
											<!-- <div class="clearfix"></div> -->
										</div>
									</ul>
								</li>
							
							<!-- <li class="w3pages"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
									<ul class="dropdown-menu ">
										<center><h3>Cuisine</h3></center> <br> <br>
										<li><a href="icons.html">Web Icons</a></li>
										<li><a href="codes.html">Short Codes</a></li>     
									</ul>
								</li> -->

								
								 
								<li><a href="{{ route('Contact_us') }}" class="{{($route == 'Contact_us')?'active':''}}">Contact Us</a></li> 
								<li>
									@if(Auth::check())
										<a href="{{route('cart_show')}}" class="{{($route == 'cart_show')?'active':''}}">
											Cart  <span class="badge badge-primary Cart-Count">  </span>
										</a>
									@endif
								</li> 




								<li class="w3pages"><a href="#" class="dropdown-toggle {{($route == 'customer_profile' || $route == 'notification' || $route == 'customer_order' )?'active':''}}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
									{{-- <i class="fa fa-user"></i> --}}Account <span class="caret"></span></a>
									<ul class="dropdown-menu" >


										  @if(Auth::check())					  

										  	    @if(Auth::user()->google_id == null)
												  <li class="head-dpdn">
													<a href="{{ route('customer_profile') }}" ><i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}</a>
												  </li> 

												@else

												  <li class="head-dpdn">
													<a href="{{ route('customer_profile') }}" ><i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->google_name }}</a>
												  </li> 

												@endif

												   <li class="head-dpdn">
												     <a href="{{ route('notification') }}">
												     	<i class="fa fa-bell" aria-hidden="true"></i> 
												     
												     	Notification 
												     	<span class="badge badge-danger" title="Unread Message">{{ $unread_msg }} </span>

												     </a>
												  </li>  
												  
												  <li class="head-dpdn">
												     <a href="{{route('customer_order')}}"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> View Order</a>
												  </li>  
											
										  @else

											  <li class="head-dpdn">
												<a href="{{route('register')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Signup</a>
											  </li> 

										  @endif


										  @if(Auth::check())

											<li class="head-dpdn">
												<a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>{{ __('Logout') }}               				
												</a>
												  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									                  @csrf
									              </form>
											</li> 

											@else
											
											<li class="head-dpdn">
												<a href="{{route('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
											</li> 

										@endif
										   
									</ul>
								</li> 
							</ul>
						</div>

					  {{--   @if(Auth::check())
						<div class="cart cart box_1 active"> 

						
							 		
							 <form action="#" method="post" class="last"> 
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="display" value="1" />
								<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
							</form>
						

							<a href="{{route('cart_show')}}" type="btn" class="w3view-cart active"><i class="fa fa-cart-arrow-down " aria-hidden="true"> </i>
								 <span class="badge badge-fill Cart-Count" style="background-color: transparent;">  </span>
							</a> 

						</div> 
						@endif --}}


						
						
					</nav>
				</div>
			</div>
			<!-- //navigation --> 
		</div>
		<!-- //header-end --> 
		<!-- banner-text -->
		<div class="banner-text">	
			<div class="container">
			 <h2 style="font-family: Poppins; color: white; letter-spacing: 3px;">"We provide happiness through delicious food and will comfort you"</h2>
			
		
				<!--<h2>We Provide happiness<br> <span> though our  delicous food and will comfort you. </span></h2>-->
				{{-- <div class="agileits_search">
					<form action="#" method="post">
						<input name="Search" type="text" placeholder="Enter Your Area Name" required="">
						<select id="agileinfo_search" name="agileinfo_search" required="">
							<option value="">Popular Cities</option>
							<option value="navs">New York</option>
							<option value="quotes">Los Angeles</option>
							<option value="videos">Chicago</option>
							<option value="news">Phoenix</option>
							<option value="notices">Fort Worth</option>
							<option value="all">Other</option>
						</select>
						<input type="submit" value="Search">
					</form>
				</div>  --}}
			</div>
		</div>
	</div>

<script>


$(document).ready(function() {	
	loadcart();
	function loadcart(){
		$.ajax({
			method: "GET",
			url: "/load-cart-data",
			success: function(response){

				$('.Cart-Count').html('');
				$('.Cart-Count').html(response.count);
				console.log(response.count)
			}
		});
	}
	
});
</script>
