@extends('User.master')
@section('title')

 	Show Cart Item

@endsection

@section('content')

	<div class="container">
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="#"><i class="fa fa-home"></i> Home</a></li> 
			<li class="active">Cart</li>
		</ol>
	</div>

	<div class="container" style="margin-top: 5px;">
		@foreach($ShipFees as $ShipFee )
		<h3><b>Note:</b></h3> 
		<ul style="margin-left: 50px;">	
		
		    <li style="color: red; font-size: 14px;">
		    	<b>Cash on Delivery (COD) have Addional {{$ShipFee -> fee}} pesos for the Shipping Fee </b>
		    </li>	   	
		</ul>
		@endforeach
	</div>

<div class="products">
	<div class="container">
		
		<div class="col-md-12 product-w3ls-right">
			<div class="card">
				<h1 class="card-header text-center mt-3" style="background-color: rgba(253, 70, 62, 0.84); height: 70px; width: auto;">
					Cart Items 
				</h1>	
			</div>
			
			<div class="card-body">
				<table class="table table-hover table-bordered">
					<thead>					
						<tr style="width: auto">
						<!--	<th scope="col"><h5 style="color:Black; font-size: 18px;">SL</h5></th> -->
							<th scope="col"><h5 style="color:Black;  font-size: 18px;">Remove</h5></th>
							<th scope="col" class="text-success"> <h5 style="color:Black;  font-size: 18px;">Dish Name</h5></th>
							<th scope="col"><h5 style="color:Black;  font-size: 18px;">Dish image<h5></th>
							<th scope="col"><h5 style="color:Black;  font-size: 18px;">Dish Price<h5></th>
							<th scope="col"><h5 style="color:Black;  font-size: 18px;">Quantity</h5></th>
							<th scope="col"><h5 style="color:Black;  font-size: 18px;">Total Price</h5></th>
					      {{--   <th scope="col"><h5 style="color:Black;  font-size: 18px;">Grand Total Price</h5></th>  --}}
						</tr>
					</thead>
			 		<tbody>
			 			<!-- For the Order of the Customer- -->
			 			@php($i=1)
			 			@php($sum=0)
						@foreach($CartDish as $dish)
						 
			 			<tr>
			 				@php($i++)
			 				<!-- <th scope="row"><p style="color:black; font-size: 17px; "></p></th> -->

			 				<th scope="row">

			 					<a href="{{route('remove_item',['rowId' => $dish -> rowId])}}" type="button" class="btn btn-danger">
			 						<span aria-hidden ="true">X</span>
			 					</a>
			 				</th>
			 				
			 				<td id="display"><p style="color:black; font-size: 14px; ">{{$dish ->name}}</p></td>

			 				<td>
			 					<center>
			 					      <img src="{{asset($dish->options->image)}}" style="max-height:100px; width:100px auto; "  alt="Nick's Resto Menu" class="img-responsive">
			 					</center>
			 				</td>
						    <td> <p style="color:black; font-size: 14px; ">₱{{$dish -> price }}</p></td>
						   
						    <!-- For Updating Cart -->
							<td>
							 	{{-- <form action="{{route('update_cart')}}" method="post" onsubmit="btn.disabled = true; return true;">
							 		@csrf
							 		<input type="hidden" name="rowId" value="{{$dish -> rowId}}">
							    	<input type="number" name="qty" value="{{$dish -> qty}}" style="width: 50px; padding: 5px; margin-top: 1px; height: auto;" min="1" max="10" step="1">
							 	    <input type="submit" name="btn" class="btn btn-success" value="Update" style="margin-top: 5px;">
							 	</form> --}}
							 	<p style="color:black; font-size: 14px;">{{$dish -> qty}} Pieces</p>
							 </td>
							 <!-- For the Price -->	
						    @if($dish -> half_price == null)

							    <td><p style="color:black; font-size: 14px; ">₱{{$subTotal = $dish -> price * $dish -> qty}}</p></td>
							@else
							    <td><p style="color:black; font-size: 14px; ">₱{{$subTotal = $dish -> half_price * $dish -> qty }}</p></td>

							@endif

						 {{--   <td></td> --}}
						  {{$dish -> subTotal}}
						
							  <input type="hidden" value="{{$sum = $sum + $subTotal}}">
			 					
			 			  </tr>
			 			@endforeach

			 				<tr>
			 					<td></td>
			 					<td></td>
			 					<td></td>
			 					<td></td>
			 					<td></td> 
			 				    <td><p style="color:black; font-size: 14px; ">₱{{$sum}}</p></td> 
			 					{{-- <td></td> --}}
			 					
			 					<?php
			 						Session::put('sum', $sum);
			 					?>
			 				</tr>
			 		</tbody>
			   </table>
			</div>
		
		
			
		
		</div>			
 		
 		 @if(count($CartDish) > 0)
	 		 <div class="col-md-12 product-w3ls-right">
	 		 	<a href="{{url('/shipping')}}" class="btn btn-primary" style="float: right;">
	 		 		<i class="fa fa-shopping-bag" ></i>
	 		 		Checkout
	 		 	</a>
	 		 </div>
 		 @else
	 		 <div class="col-md-12 product-w3ls-right">
	 		 	<a href="" class="btn btn-primary" disabled style="float: right;" >
	 		 		<i class="fa fa-shopping-bag" ></i>
	 		 		Checkout
	 		 	</a>
	 		 </div>
	 	 @endif
	</div>
</div>


<!--  Modal       -->
<div class="modal fade" id="login_or_register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  		<div class="modal-dialog">
  			<div class="modal-content">
  				<div class="modal-header">
  					<!--<h5 class="modal-title" id="staticBackdropLabel">Modal title</h5> -->
  					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  						<span aria-hidden="true">×</span>
  					</button>		
  				</div>
  				<div class="modal-body">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body" style="margin-bottom: 10px;">
							   
							   	 <h2 class="text-center" style="margin-bottom: 20px;">
									Nick's Resto Bar & Cafe-Restaurant
								</h2>
							
								
							</div>
							<div class="text-center" style="margin-top:50px;">
								<h3 style="font-family: arial ;">Are you a New member...!</h3>

								<center>
									<a href="{{route('register')}}" class="btn-block btn-success" style="
																				margin-top: 25px;
																				padding:10px 15px;
																				width: 400px; 
																			   
																				font-size: 25px;
																				font-family: times new roman;
																				margin-bottom: 25px;

																				">
									<span  class="mt-5">Register</span>

									</a>
							    </center>

								<h3 style="font-family: arial ;">Or</h3>
								<h3 style="margin-top: 25px; font-family: arial ;">Already have an account...</h3>

								<center><a href="{{route('login')}}" class="btn-block btn-primary" style="
																				margin-top: 25px;
																				padding:10px 15px;
																				width:400px; 
																			
																				font-size: 25px;
																				font-family: times new roman;
																				margin-bottom: 25px;
																				
																				">
									<span class="mt-5">Login</span>
								</a></center>
							</div>
						</div>
					</div>	
				</div>
  			</div>
		</div>
</div> 


@endsection

