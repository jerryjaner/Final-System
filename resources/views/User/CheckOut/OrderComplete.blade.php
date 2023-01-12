@extends('User.master')
@section('title')

 	 Order Complete

@endsection

@section('content')

	@if(Session::get('sms'))

		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong> {{session::get('sms')}}</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hiddden="true">&times;</span>
			</button>
		</div>

 	@endif
	<div class="products">
		
		<div class="col-md-9 product-w3ls-right">
			<div class="card">
				<div class="card-body">
					<h2 class="text-capitalized" style="text-align: center;"> Thanks For Your Order</h2>
					<p style="text-align: center;"> We will contact you soon....</p>
				</div>
			</div>
		</div>

	</div>
@endsection