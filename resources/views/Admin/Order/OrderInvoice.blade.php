
@extends('Admin.master')
@section('title')

   Order Invoice

@endsection 
@section('content')
	
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<style>
			@import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

					body {
					 
					    font-family: 'Calibri', sans-serif !important;
					}

					.mt-100{
					  margin-top: 50px;
					}

					.mb-100{
					  margin-bottom: 50px;
					}

					.card{
					    border-radius:1px !important;
					}

					.card-header{
					    
					    background-color:#fff;
					}

					.card-header:first-child {
					    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
					}

					.btn-sm, .btn-group-sm>.btn {
					    padding: .25rem .5rem;
					    font-size: .765625rem;
					    line-height: 1.5;
					    border-radius: .2rem;
					}
					


		</style>
	</head>
	<body>
		<div class="container-fluid mt-100 mb-100">
			<div id="ui-view">
				<div>
					
					<div class="card ">
						<div class="card-header"> 
						<h5 style="float: left;"><strong>Invoice # {{$order->id}}</strong></h5>
						<a target="_blank" class="btn btn-info btn-sm" style="float: right;" href="{{route('download_invoice',['id'=>$order->id])}}" id="invoicefont">
   						     <b>Print / Download Invoice </b>
  			   			 </a>
						
							<div class="pull-right">
							</div>
						</div>
						<div class="card-body">
							<div class="row mb-4">
								<div class="col-sm-4">
									<h5 class="mb-3" id="invoicefont"> <strong>From:</strong> </h5>
									<div>Name: <strong>Nicks Resto Bar & Cafe Restaurant</strong></div>
									<div>Address: Gadgaron Matnog Sorsogon</div>
									<div>Email: Nicks@gmail.com</div>
									<div>Phone: 09706677438</div>
								</div>

								<div class="col-sm-4">
										<h5 class="mb-3"  id="invoicefont"><strong>To:</strong></h5>
									@if($customer -> google_id == null)
										<div>Name: <strong>{{ $customer -> name }} {{$customer -> lastname}}</strong></div>
									@else
										<div>Name: <strong>{{ $customer -> google_name }} </strong></div>
									@endif
										<div>Purok: {{$shipping -> purok}}</div>
									    <div>Address: {{$shipping -> address}}</div>
										<div>Email: {{$customer -> email}}</div>
										<div>Phone: {{$shipping -> phone_no}}</div>
								</div>

								<div class="col-sm-4">
									<h5 class="mb-3"><strong>Details:</strong></h5>
									<div>Payment :
										
										@if($payment -> payment_type == 'Cash_on_Delivery')

										   <strong> Cash On Delivery </strong>

										@elseif($payment -> payment_type == 'Cash_on_Pickup')

										   <strong> Cash On Pickup </strong>
										   
										@endif
										      
									</div>
									<div>Date: {{\Carbon\Carbon::parse($payment -> created_at)->toFormattedDateString() }}</div>
								</div>
						</div>

						<div class="table-responsive-sm">
							<table class="table table-striped">
								<thead>
									<tr>
									<th>#</th>
									<th>Item</th>
									<th>Quantity</th>
									<th>Price</th>
									<th>Total</th>
									</tr>
								</thead>
								<tbody>
									@php($i = 1)
									@php($sum = 0)
									

									@foreach($OrderD as $orderdetail)
									<tr>
										<td>{{$i++}}</td>
										<td>{{$orderdetail -> dish_name}}</td>	
										<td>{{$orderdetail -> dish_qty}}</td>
										<td>{{$orderdetail -> dish_price}}</td>
										<td>{{$total = $orderdetail -> dish_price * $orderdetail -> dish_qty}}</td>
									</tr>
									@php($sum = $sum + $total)
									@endforeach

									
								{{-- 	@php($totalAmount = $sum + $shippingfee) --}}
									
								</tbody>
							</table>
						</div>
						<div class="row">
						 <div class="col-lg-4 col-sm-5"><br><br><br><h5>Thank You For Your Order :)</h5></div> 
						<div class="col-lg-3 col-sm-4 ml-auto " style="margin-left: 1000px;">
							<table class="table table-clear" >
								<tbody>

									@if($payment -> payment_type == 'Cash_on_Delivery')
										<tr>
											
											 <td>Shipping Fee: {{$order -> order_shippingfee}}</td>
										</tr>
										@if(count($Shipping_Fee) == 0)
											<tr>	

												<td><strong>Total Amount: {{$sum}} </strong> </td>
												
											</tr>
										@else
											<tr>
												
												@php($total = $sum + $order -> order_shippingfee)
												    <td>Total Amount: {{$total}}</td>
												
											</tr>
											
										@endif

									@else
										<tr>
											<td><strong>Total Amount: {{$sum}} </strong> </td>
										</tr>

									@endif
								</tbody>
							</table>

						</div>
						</div>
						</div>
						</div>
				  </div>
			 </div>
		</div>
	    <br>
	    <br>
	</body>
	</html>

@endsection

