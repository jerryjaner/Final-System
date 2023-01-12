@extends('User.master')
@section('title')

	Nick's Menu

@endsection

@section('content')
<!-- banner -->	 
	<div class="container">	
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="#"><i class="fa fa-home"></i> Home</a></li> 
			<li class="active">Dishes</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!-- products -->
	<div class="products">	 
		<div class="container">
			<div class="col-md-12 product-w3ls-right"> 
				<div class="product-top">
					<h4>Food Collection</h4>
					
					<div class="clearfix"> </div>
				</div>
				<div class="products-row">
				@foreach($categoryDish as $dish)

				
					<div class="col-xs-6 col-sm-4 product-grids">
						<div class="flip-container">
							<div class="flipper agile-products">
								<div class="front"> 

									<img src="{{asset('BackEndSourceFile/dish_image/'.$dish->dish_image)}}" 
									style="height: 200px; width:400px; border: none;" class="img-responsive" alt="img">

									<div class="agile-product-text">  
										<h5>{{$dish -> dish_name}}</h5>	
									</div> 
								</div>
								
								<div class="back">
								   <!--  <h4>{{$dish -> dish_name}}</h4><br> -->				
									<h6 style="margin-top: 50px;">₱{{$dish -> full_price}}</h6>

									
									<form action="{{route('add_to_cart')}}" method="post">
										<input type="hidden" name="id" value="$dish -> id">		
										<!-- dapat dire mag add to cart an user kapag hindi pa nakakalogin -->									 
										<a href="#" data-toggle="modal" data-target="#myModal2{{$dish -> id}}" style="text-decoration: none;">
											<i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart
										</a>	
									</form>
								</div>
							</div>
						</div> 
					</div> 

			    <!--- Modal 2 -->
			    	<div class="modal video-modal fade" id="myModal2{{$dish -> id}}" tabindex="-1" role="dialog" aria-labelledby="myModal2">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>						
								</div>
								<section>
									<div class="modal-body">
										
								    @if(Auth::check())
										<div class="col-md-12">	
											<img src="{{asset('BackEndSourceFile/dish_image/'.$dish->dish_image)}}" style="height: 300px; width:500px;"  alt="Nick's Menu" class="img-responsive">
										</div>

										<div class="col-md-12"> 
											<h3 style="text-align: center; margin-top: 8px; color: orange;">
												{{$dish -> dish_name}}        
												
											</h3>
										    <h3 style="margin-top: 5px; margin-bottom: 10px;">
										    	₱{{$dish -> full_price}}
										    </h3>


											<form action="{{route('add_to_cart')}}" method="post" onsubmit="btn.disabled = true; return true;">
												@csrf
												<input type="hidden" name="id" value="{{$dish->id}}">

												 <label for="Quantity" style="margin-bottom: 5px;"> Quantity: </label> 

												{{--  <input type="number"
												 		class="form-control" 
													    min="1" max="10" step="1" 
													    name="qty" 
												 		required><br> --}}
												
												 <div class="input-group-text mb-3" style="130px; align-items: center;">
												 	<button class="btn btn-danger btn-sm decrement-btn">-</button>
												 	<input type="number" readonly name="qty" value="1" class="form-group qty-input text-center" style="outline: none; padding: 3px; border: 1px solid black;">
												 	<button class="btn btn-primary btn-sm increment-btn">+</button>
												 </div>

												 {{--  <h5  style="margin-top: 15px; margin-bottom: 20px; ">						
												  								
												  	{{$dish -> dish_detail}}
												  	
												  </h5>  --}}

												<button type="submit" name="btn" class="btn btn-primary" id="oneclick" style=" float: right; outline: none;">
											       <i class="fa fa-cart-plus" aria-hidden="true"></i> 
											       Add to cart
											   </button>

											 
											   {{-- <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: right; outline: none; margin-right: 5px;">
											   		Cancel
											   	</button>  --}} 

									 		</form>
										</div>
										@else
										  <!--	if user are not registered -->
										  <div class="col-md-12">
												<div class="card">
													<center>
														<img src="{{asset('/BackEndSourceFile')}}/Nicks_logo/nickslogo.jpg" style="width: 200px; border-radius: 50%; " alt="Nicks_logo"> 
													</center>
													

													<div class="text-center" style="margin-top:20px;">
														<h3 style="font-family: arial ;">Are you a New member ?</h3>
														<center>
															<a href="{{route('register')}}" class="btn-block btn-success" style="
																										margin-top: 25px;
																										padding:10px 15px;
																										width: 300px; 
																										font-size: 25px;
																										font-family: times new roman;
																										margin-bottom: 25px;">
															<span  class="mt-5">Register</span>
															</a>
													    </center>


														<h3 style="font-family: arial ;">Or</h3>

														<h3 style="margin-top: 25px; font-family: arial ;">Already have an Account ?</h3>

														<center><a href="{{route('login')}}" class="btn-block btn-primary" style="
																										margin-top: 25px;
																										padding:10px 15px;
																										width:300px; 
																										font-size: 25px;
																										font-family: times new roman;
																										margin-bottom: 25px;">
															<span class="mt-5">Login</span>
														</a></center>
													</div>
												</div>
										  </div>	
										@endif

										<div class="clearfix"> </div>
									</div>
								</section>
							</div>
						</div>
					</div> 

			    <!-- End of modal 2 -->
				@endforeach
					
					<div class="clearfix"> </div>
				</div>
			</div>

		{{-- <div class="col-md-3 rsidebar">
				<div class="rsidebar-top">
					<div class="slider-left">
						<h4>Categories</h4>            
						<div class="row row1 scroll-pane">

							
							@foreach($categories as $category)	
								
								<label class="checkbox">
									<a  href="{{route('category_dish',['category_id'=>$category->category_id])}}">

										{{$category->category_name}}

									</a>
								</label>

							@endforeach
						
						</div> 
					</div>
					
			  </div>
			<div class="clearfix"> </div>   --}}
		</div>
	</div>
</div>
<!-- //products --> 

<!--<div class="container">  -->
<div>
	<div class="w3agile-deals prds-w3text"> 
		<h5></h5>
	</div>
</div>
<!-- deals 
	<div class="w3agile-deals">
		<div class="container">
			<h3 class="w3ls-title"></h3>
			
		</div>
	</div>
//deals --> 

<script>
	$(document).ready(function() {

		$('.increment-btn').click(function (e) {

			e.preventDefault();

			var inc_value = $('.qty-input').val();
			var value = parseInt(inc_value,10);
			value = isNaN(value)? 0 : value;

			if(value < 20 ){
				value++;
				$('.qty-input').val(value);

			}
		});

		$('.decrement-btn').click(function (e) {

			e.preventDefault();

			var dec_value = $('.qty-input').val();
			var value = parseInt(dec_value,10);
			value = isNaN(value)? 0 : value;

			if(value > 1){
				value--;
				$('.qty-input').val(value);

			}
		});

		
	});	
</script>
@endsection