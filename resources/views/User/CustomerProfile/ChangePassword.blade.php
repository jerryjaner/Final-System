
@extends('User.master')
@section('title')

 	Change Password

@endsection

@section('content')




<div class="login-page about">
	{{-- <img class="login-w3img" src="{{asset('FrontEndSourceFile')}}/images/img3.jpg" alt=""> --}}
	<div class="container"> 
		<h3 class="w3ls-title w3ls-title1">Change Password</h3>  
	    <div class="login-agileinfo"> 
 		    <div class="wthreelogin-text" >
				
				<form class="row g-3" action="{{ route('update_pass') }}" method="POST" onsubmit="btn.disabled = true; return true;">
					@csrf


					    <div class="col-md-12">
						   <input id="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword"  autocomplete="oldpassword" placeholder="Current Password">

                                @error('oldpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">{{ $message }}</strong>
                                    </span>
                                @enderror
					    </div>

					    <div class="col-md-12">
						   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" placeholder="New Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red;">{{ $message }}</strong>
                                </span>
                            @enderror
					    </div>

					    <div class="col-md-12">
						    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Confirm Password">

						    @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red;">{{ $message }}</strong>
                                </span>
	                         @enderror
					    </div>

					    <div class="col-md-12" style="margin-top: 10px;">
					       <button type="submit" name="btn" class="btn btn-primary" style="outline: none;">Save</button>
					    </div>

					
				</form>						
	
		    </div>
	    </div>
	</div>	
</div>




@endsection