
@extends('User.master')
@section('title')

 	Customer Profile

@endsection

@section('content')
	
	
<!-- login-page -->

	<div class="login-page about">

	{{-- 	<img class="login-w3img" src="{{asset('FrontEndSourceFile')}}/images/img3.jpg" alt=""> --}}
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Customer Profile</h3>  
			
				@error('phone_number')
				
	                <span class="invalid-feedback " role="alert">
	                	<center>
	                	   	
	                	   		<h5> <strong style="color:red;">Error in updating profile <br>{{ $message }}</strong> </h5>
	                	   	
	                    </center>
	                </span>
	           
	            @enderror
	            @error('email')
				
	                <span class="invalid-feedback " role="alert">
	                	<center>
	                	   	
	                	   		<strong style="color:red;">Error in updating profile <br>{{ $message }}</strong>
	                	   	
	                    </center>
	                </span>
	           
	            @enderror
			
		
			<div class="login-agileinfo"> 
 				<div class="wthreelogin-text">
						<center>
		                  <img class="profile-user-img img-fluid img-circle"
		                      src="{{asset('BackEndSourceFile/Profile_Picture/'.$CustomerProfile->avatar)}}"
		                       alt="User profile picture" style="width:150px; height: 150px;"> 
		                 </center><br>


		                
		      			
		      			@if($CustomerProfile -> google_id == null)
		           		   <h3 class="profile-username text-center">{{$CustomerProfile -> name}} {{ $CustomerProfile -> lastname }}</h3>
			               <p class="text-muted text-center"></b></p> <br> <br>
		           		   <h4><b>Name:</b> {{$CustomerProfile -> name}} {{$CustomerProfile -> lastname}}  </h4><hr>

		           		@else
		           			<h3 class="profile-username text-center">{{$CustomerProfile -> google_name}} </h3>
			                <p class="text-muted text-center"></b></p> <br> <br>
		           			<h4><b>Name:</b> {{$CustomerProfile -> google_name}}  </h4><hr>

		           		@endif
			              	<h4><b>Email:</b> {{$CustomerProfile -> email}}  </h4><hr> 
			           	   	<h4><b>Purok:</b> {{$CustomerProfile -> purok}} </h4><hr>
				          	<h4><b>Address:</b> {{$CustomerProfile -> address}} </h4><hr>
				          	<h4><b>Phone Number:</b> {{$CustomerProfile -> phone_number}} </h4><hr>
			        
			         
			          {{--   <button class="btn btn-info" style="float:right;" data-bs-toggle="modal" data-bs-target="#edit{{$CustomerProfile->id}}" data-bs-whatever="@fat">
			                    Edit Profile
			            </button> --}}



			          	<button class="btn btn-primary" data-toggle="modal" data-target="#profile{{$CustomerProfile -> id }}" style="outline: none; float: right;">
								Edit Profile
						</button>

						@if($CustomerProfile -> google_id == '')

							<a href="{{ route('view_of_changepassword') }}" type="button" class="btn btn-success">Change Password</a>
							
						@endif
						


						<br>

					    <!-- modal --> 
						<div class="modal video-modal fade" id="profile{{$CustomerProfile -> id }}" tabindex="-1" role="dialog" aria-labelledby="myModal1">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header text-center">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button><br>
										<h3 class="modal-title w-100" style="margin-top: 5px;">Edit Customer Profile</h3>						
									</div>
							
										<div class="modal-body">
										    <form action="{{ route('customer_update') }}" enctype="multipart/form-data" method="POST" onsubmit="btn.disabled = true; return true;">

										    	@csrf

										    	<input type="hidden" class="form-control"  name="id" value="{{$CustomerProfile -> id}}">
										      	

										      	@if($CustomerProfile -> google_id == null)

										        	<input class="form-control" type="text" name="name" value="{{$CustomerProfile -> name}}" placeholder="Firstname" onkeydown="return /[a-z ]/i.test(event.key)" required>
	   	
										          	<input class="form-control" type="text" name="lastname" value="{{$CustomerProfile -> lastname}}" placeholder="Lastname" onkeydown="return /[a-z ]/i.test(event.key)" required>
										      	@else

										      	    <input class="form-control" type="text" name="google_name" value="{{$CustomerProfile -> google_name}}" placeholder="Fullname" required>

										      	@endif

											      	<input class="form-control" type="text" name="purok" value="{{$CustomerProfile -> purok}}" placeholder="Purok" required>

											      	<input class="form-control" type="text" name="address" value="{{$CustomerProfile -> address}}" placeholder="Address" required>



											      	<input class="form-control" pattern="[0-9]{11}"  name="phone_number" 
										      			   placeholder="Phone Number Ex: 098966*****" value="{{$CustomerProfile -> phone_number}}" required style="margin-top: 8%; border-color: #999999"
										      			   min="11"
	                                					   max="11"
										      			   oninvalid="this.setCustomValidity('Make sure to follow the pattern EX: 097055*****')"
										      			   oninput="this.setCustomValidity('')">

											      	<input class="form-control" id="email" type="email" name="email" placeholder="Email" value="{{ $CustomerProfile -> email }}">
											      	
										             <input type="file" class="form-control " id="exampleInputFile"  name="avatar" accept="image/*" style="margin-top: 8%; border-color: #999999" >
										             <label>New Profile Picture</label>
										             
											      	
											      
											      	<div class="modal-footer" style="margin-top: 5%;">
												        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												        <button type="submit" name="btn" class="btn btn-primary">Save changes</button>
												    </div>
				  							    
										      </div>
											  
											</form>
										</div>
								
								</div>
							</div>
						</div> 
					   <!-- //modal -->


						</div>
		

		         </div>
			</div>	 
		</div>
	</div>

@endsection