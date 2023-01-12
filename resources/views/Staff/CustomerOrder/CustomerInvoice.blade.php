@extends('Staff.master')
@section('title')

  Customer Invoice

@endsection
@section('content')

<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<style>
			@import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

					body {
					  /*  background-color: blue; */
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
							<a target="_blank" class="btn btn-info btn-sm" style="float: right;" href="{{route('download_receipt',['id'=>$order->id])}}">
       						     <b>Download Invoice </b>
      			   			 </a>
      			   			 
							<div class="pull-right">
							<!--  <a class="btn btn-sm btn-info" href="#" data-abc="true"><i class="fa fa-print mr-1"></i> Print</a>
							  <a class="btn btn-sm btn-info" href="#" data-abc="true"><i class="fa fa-file-text-o mr-1"></i> Save</a> -->
							</div>
						</div>
						<div class="card-body">
							<div class="row mb-4">
								<div class="col-sm-4">
									<h5 class="mb-3"> <strong>From:</strong> </h5>
									<div>Name: <strong>Nicks Resto Bar & Cafe Restaurant</strong></div>
									<div>Address: Gadgaron Matnog Sorsogon</div>
								<!--	<div>NYC, NY 12394</div> -->
									<div>Email: Nicks@gmail.com</div>
									<div>Phone: 09706677438</div>
								</div>

								<div class="col-sm-4">
									<h5 class="mb-3"><strong>To:</strong></h5>

									@if($customer -> google_id == null)

										<div>Customer:<strong> {{$customer -> name}} {{$customer -> lastname}}</strong></div>

									@else

									    <div>Customer:<strong> {{$customer -> google_name}}</strong></div>

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
							 <!--		<div>Amount: </div>
									<div>Account Name: BANK OF AMERICA</div>
									<div><strong>SWIFT code: 985798579487</strong></div>	-->
								</div>
						</div>

						<div class="table-responsive-sm">
							<table class="table table-striped">
								<thead>
									<tr>
									<th class="center">#</th>
									<th>Item</th>
									<th class="center">Quantity</th>
									<th class="right">Price</th>
									<th class="right">Total</th>
									</tr>
								</thead>
								<tbody>
									@php($i = 1)
									@php($sum = 0)
								
									@foreach($OrderD as $orderdetail)
									<tr>
										<td class="center">{{$i++}}</td>
										<td class="left">{{$orderdetail -> dish_name}}</td>
										<td class="center">{{$orderdetail -> dish_qty}}</td>
										<td class="right">{{$orderdetail -> dish_price}}</td>
										<td class="right">{{$total = $orderdetail -> dish_price * $orderdetail -> dish_qty}}</td>
									</tr>
									@php($sum = $sum + $total)
									@endforeach

								</tbody>
							</table>
						</div>
						<div class="row">
						 <div class="col-lg-4 col-sm-5"><br><br><br><h3>Thank You For Your Order :)</h3></div> 
						<div class="col-lg-3 col-sm-4 ml-auto " style="margin-left: 1000px;">
							<table class="table table-clear">
								<tbody>
									
									@if($payment -> payment_type == 'Cash_on_Delivery')
										<tr>	
											  <td>Shipping Fee: {{$order -> order_shippingfee}}</td>
											
										</tr>
										@if(count($Shipping_Fees) == 0)
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

						<!--	<div class="pull-right">
							  <a class="btn btn-sm btn-success" href="#" data-abc="true"><i class="fa fa-paper-plane mr-1"></i> Proceed to payment
							  </a>
							</div> -->

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

