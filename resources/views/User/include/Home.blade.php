@extends('User.master')
@section('title')
	
	Nick's Resto Bar

@endsection

@section('content')
	<!-- add-products -->
<!-- 	<div class="add-products">  
		<div class="container">
			<div class="add-products-row">
				<div class="w3ls-add-grids">
					<a href="menu.html"> 
						<h4>Get <span>20%<br>Cashback</span></h4>
						<h5>Ordered in mobile app only </h5>
						<h6>Order Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div>
				<div class="w3ls-add-grids w3ls-add-grids-right">
					<a href="menu.html"> 
						<h4>GET Upto<span><br>40% Offer</span></h4>
						<h5>Sunday special discount</h5>
						<h6>Order Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div> 
				<div class="clearfix"> </div> 
			</div>  	 
		</div>
	</div> -->
	<!-- //add-products --> 
	<!-- order -->   	
	<div class="wthree-order">  
		<img src="{{asset('FrontEndSourceFile')}}/images/i2.jpg" class="w3order-img" alt=""/>

		<div class="container">
			<h3 class="w3ls-title">How To Order Online Food</h3>
			<p class="w3lsorder-text" >Get your favourite food in 4 simple steps.</p>
			<div class="order-agileinfo">  
				<div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids"> 
					<div class="order-w3text"> 
						<i class="fa fa-map" aria-hidden="true"></i> 
						<h3 >Go to Food</h3>
						<!--<span>1</span> -->
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids"> 
					<div class="order-w3text"> 
						<i class="fa fa-cutlery" aria-hidden="true"></i> 
						<h3>Choose Food</h3>
						<!-- <span>2</span> -->
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids"> 
					<div class="order-w3text"> 
						<i class="fa fa-credit-card" aria-hidden="true"></i>
						<h3>Choose Payment </h3>
					<!--	<span>3</span> -->
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids"> 
					<div class="order-w3text"> 
						<i class="fa fa-truck" aria-hidden="true"></i>
						<h3>Enjoy Food</h3>
						<!-- <span>4</span> -->
					</div>
				</div>
				<div class="clearfix"> </div>
				
			</div>
		</div>
	</div>
   
    {{-- most sold --}}
    @if(count($customer_order) > 0)
    <div class="products">	 
		<div class="container">
			<div class="col-md-12 product-w3ls-right"> 
				<div class="product-top">
					<center><h4>Most Selling Food</h4></center>			
					<div class="clearfix"> </div>
				</div>
				<div class="products-row">
					@foreach($top_Products as $top_Product)
					@php
						$top_Product['image'] = explode('|', $top_Product -> dish_image);
						$images = $top_Product -> dish_image[0];	

					@endphp
					
					
					<div class="col-xs-6 col-sm-4 product-grids">
						<div class="flip-container">
							<div class="flipper agile-products">
								<div class="front"> 

									<img src="{{asset('BackEndSourceFile/dish_image/'.$top_Product->dish_image)}}" 
									style="height: 200px; width:400px; border: none;" class="img-responsive" alt="img">

									<div class="agile-product-text">  
										<h5>{{ $top_Product -> dish_name }}</h5>	
									</div> 
								</div>
								<div class="back">	
									<h6 style="margin-top: 50px;">₱{{$top_Product -> full_price}}</h6>
								</div>
							</div>
						</div> 
					</div>
					

					@endforeach
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
	@endif
    {{-- end of most sold --}}

	<!-- //order --> 
	<!-- dishes -->
	<div class="w3agile-spldishes">
		<div class="container">
			<h3 class="w3ls-title" style="font-family: Poppins;">Nick's Resto Foods</h3>
			<div class="spldishes-agileinfo">
				<div class="col-md-3 spldishes-w3left">
					<h5 class="w3ltitle" style="font-family: Poppins;">Nick's Resto </h5>
					<p style="font-family: Poppins;">We provide happiness through delicious food and will comfort you</p>
				</div> 


				<div class="col-md-9 spldishes-grids">
					<!-- Owl-Carousel -->
					<div id="owl-demo" class="owl-carousel text-center agileinfo-gallery-row">
						
						<!-- <a href="products.html" class="item g1">
							<img class="lazyOwl" src="{{asset('FrontEndSourceFile')}}/images/g1.jpg" title="Our latest gallery" alt=""/>
							<div class="agile-dish-caption">
								<h4>Duis congue</h4>
								<span>Neque porro quisquam est qui dolorem </span>
							</div>
						</a> -->

								 @foreach($dishes as $dish)

									<a href="{{route('category_dish',['category_id' => $dish -> category_id]) }}" class="item g1">
										<img class="lazyOwl" src="{{asset('BackEndSourceFile/dish_image/'.$dish->dish_image)}}" style="height: 190px; width:286px; border: 1px solid white;" title="Our latest gallery" alt=""/>
										<div class="agile-dish-caption">
											<h4>{{$dish -> dish_name}}</h4>
											{{-- <span>{{$dish -> dish_detail}}</span> 	 --}}
									    </div>
									</a>


								@endforeach
						
					</div> 
				</div>  
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //dishes -->    
	<!-- deals -->
	<div class="w3agile-deals">
		<div class="container">
			<h3 class="w3ls-title" style="font-family: Poppins;">Delivery Options</h3>
			<div class="dealsrow">
				<div class="col-md-6 col-sm-6 deals-grids">
					<div class="deals-left">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div> 
					<div class="deals-right">
						<h2 style="font-family: Poppins;color:#fff;">Cash on Delivery</h2>
						<h4 style="font-family: Poppins;">Pay with cash upon delivery</h4>
					</div> 
					<div class="clearfix"> </div>
				</div> 
				<div class="col-md-6 col-sm-6 deals-grids">
					<div class="deals-left">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div> 
					<div class="deals-right">
						<h2 style="font-family: Poppins; color:#fff;">Cash on Pickup</h2>
						<h4 style="font-family: Poppins;">Pay with cash upon Pickup</h4>
						
					</div> 
					<div class="clearfix"> </div>
				</div>
				{{-- <div class="col-md-6 col-sm-6 deals-grids">
					<div class="deals-left">
						<i class="fa fa-users" aria-hidden="true"></i>
					</div> 
					<div class="deals-right">
						<h4 style="font-family: Poppins;">Team up Scheme</h4>
						<p style="font-family: Poppins;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
					</div>
					<div class="clearfix"> </div>
				</div> 
				<div class="col-md-6 col-sm-6 deals-grids">
					<div class="deals-left">
						<i class="fa fa-building" aria-hidden="true"></i>
					</div> 
					<div class="deals-right">
						<h4 style="font-family: Poppins;">corporate orders</h4>
						<p style="font-family: Poppins;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
					</div>
					<div class="clearfix"> </div>
				</div>  --}}
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	
@endsection