@extends('User.master')
@section('title')

   Contact Us

@endsection
@section('content')

<!-- contact -->
	<div id="contact" class="contact cd-section">
		<div class="container">
			<h3 class="w3ls-title">Contact us</h3><br>
			{{-- <p class="w3lsorder-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit sheets containing sed </p>  --}}
			<div class="contact-row agileits-w3layouts">  
				<div class="col-xs-6 col-sm-6 contact-w3lsleft">
					<div class="contact-grid agileits">
						<h4 style="text-align: center;">Customer Feedback </h4>

						<form action="{{ route('customer_feedback') }}" method="post" onsubmit="btn.disabled = true; return true;">
							@csrf 
							<input type="text" name="name" placeholder="FullName" required="" onkeydown="return /[a-z ]/i.test(event.key)">
							<input type="email" name="email" placeholder="Email" required=""> 
							{{-- <input type="tel" name="contact" placeholder="Phone Number" required=""> --}}
							<textarea name="message" placeholder="Your Feedback ..." required=""></textarea>
							<input type="submit" value="Submit" name="btn">
							
						</form> 

					</div>
				</div>
				<div class="col-xs-6 col-sm-6 contact-w3lsright">
					<h6 style="text-align: center;"><span> Contact Information </span></h6>
					<div class="address-row">
						<div class="col-xs-2 address-left">
							<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
						</div>
						<div class="col-xs-10 address-right">
							<h5>Visit Us</h5>
							<p>Nick's Restobar & Cafe <br> Oro compound, Sorsogon Diversion Rd, Matnog, 4708 Sorsogon </p>
									
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="address-row w3-agileits">
						<div class="col-xs-2 address-left">
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						</div>
						<div class="col-xs-10 address-right">
							<h5>Mail Us</h5>
							<p><a href="">NicksRestoBar@gmail.com</a></p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="address-row">
						<div class="col-xs-2 address-left">
							<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
						</div>
						<div class="col-xs-10 address-right">
							<h5>Call Us</h5>
							<p>09706677438</p>
						</div>
						<div class="clearfix"> </div>
					</div>  
				</div>
				<div class="clearfix"> </div>
			</div>	
		</div>	
		<!-- map -->
		<div class="map agileits">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1946.9768220302774!2d124.08289603034835!3d12.585306863549649!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a0cbdd54a0cc6f%3A0x2c54083452649c6c!2sNick&#39;s%20Restobar%20%26%20Cafe!5e0!3m2!1sen!2sph!4v1667757469654!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
		<!-- //map --> 
	</div>
	<!-- //contact -->
@endsection
