
@extends('User.master')
@section('title')

 	Check Out Field

@endsection

@section('content')

	<div class="product">
		<div class="container">
			<div class="col-md-9 product-w3ls-right">

				<div class="card ">
					<div class="card-header">
						@if(Auth::user()->google_id == null)
							<h3 style="margin-top: 20px;">Dear {{ Auth::user()->name }}  {{ Auth::user()->lastname }}. </h3> <br>
						@else
							<h3 style="margin-top: 20px;">Dear {{ Auth::user()->google_name }}. </h3> <br>
						@endif
							<h4 class="text-center" style="color: red">We've to Know which payment method you want.</h4>
						 
					</div>
					<div class="card mt-4">
						<h5 class="card-header mt-4 text-center">Please select your payment method</h5>
						<div class="card-body">
							<div class="checkout-left">
								<div class="address_form_agile mt-sm-5 mt-4">
									
									<form action="{{route('new_order')}}" method="post" onsubmit="btn.disabled = true; return true;">
										@csrf

										<table class="table table-border">
											
											<tr>
												<th style="color: black;">
													Cash on Delivery (COD)
												</th>
												<td>
													<input  type="radio" name="payment_type" value="Cash_on_Delivery" required>

												</td>
											</tr>

											<tr>
												<th style="color: black;">
													Cash on Pickup (COP)
												</th>
												<td>
													<input type="radio" name="payment_type" value="Cash_on_Pickup" required>
												</td>
											</tr>

											<tr>
											<!--	<td><input style="float: right; margin-right:" type="submit" name="btn" class="btn btn-success" value="Confirm Order"></td> -->

												<td>
													<button type="submit" name="btn" class="btn btn-success"  style="margin-left: 90%; outline: none;">
													   Confirm  Order
													</button>
												</td>
											</tr>
										</table>

										

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	
@endsection