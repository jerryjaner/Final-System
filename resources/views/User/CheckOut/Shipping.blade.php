@extends('User.master')
@section('title')

	Shipping Information

@endsection

@section('content')


{{-- <div class="login-page about">
	<div class="container"> 
		<h3 class="w3ls-title w3ls-title1">Shipping Information</h3>  
	    <div class="login-agileinfo"> 
 		    <div class="wthreelogin-text" >
				
				<form class="row g-3" action="{{ route('store_shipping') }}" method="POST" onsubmit="btn.disabled = true; return true;">
					@csrf

						<input type="hidden" class="form-control" name="user_id" value="{{$customer -> user_id}}">
					    <div class="col-md-12">
					    	
						 	<input type="text" name="name" readonly value="{{$customer -> name}}" class="form-control" placeholder="Name" required>
					    </div>

					    <div class="col-md-12">
						 	<input type="text" name="email" readonly value="{{$customer -> email}}" class="form-control" placeholder="Enail Address" required>
					    </div>

					    <div class="col-md-12" style="margin-top: 30px;">
						
 						<input name="phone_no" class="form-control" type="tel" pattern="[0-9]{11}" placeholder="Phone Number Ex:0912*******" required>

					    </div>

					    <div class="col-md-12">
						  <input type="text" class="form-control" name="address" placeholder="Purok no, Barangay Address">
					    </div>

					    <div class="col-md-12" style="margin-top: 10px;">
					       <button type="submit" name="btn" class="btn btn-primary" style="outline: none;">Save</button>
					    </div>

					
				</form>						
	
		    </div>
	    </div>
	</div>	
</div> --}}


<div class="container">           
    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title" style="text-align: center;"><h1>Shipping Information</h1></div>
                {{-- <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="/accounts/login/">Sign In</a></div> --}}
            </div>  
            <div class="panel-body" >
                 
                    <form  class="form-horizontal" action="{{ route('store_shipping') }}" method="POST" onsubmit="btn.disabled = true; return true;">
                    	@csrf

                    	<input type="hidden" class="form-control" name="user_id" value="{{$customer -> user_id}}">

                        @if($customer -> google_name == '')
                            <div id="div_id_username" class="form-group required">
                                <label for="id_username" class="control-label col-md-4">Firstname<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8 ">
                                    <input class="input-md  textinput textInput form-control"  maxlength="30" name="name" readonly value="{{$customer -> name}}" placeholder="Name" style="margin-bottom: 10px" type="text" required />
                                </div>
                            </div>  

                            <div id="div_id_username" class="form-group required">
                                <label for="id_username" class="control-label col-md-4">Lastname<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8 ">
                                    <input class="input-md  textinput textInput form-control"  maxlength="30"  readonly value="{{$customer -> lastname}}" placeholder="Name" style="margin-bottom: 10px" type="text" required />
                                </div>
                            </div>  

                        @else

                            <div id="div_id_username" class="form-group required">
                                <label for="id_username" class="control-label col-md-4">Name<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8 ">
                                    <input class="input-md  textinput textInput form-control"  maxlength="30" name="google_name" readonly value="{{$customer -> google_name}}" placeholder="Name" style="margin-bottom: 10px" type="text" required />
                                </div>
                            </div>  

                        @endif
                      	
                          	<div id="div_id_email" class="form-group required">
                                <label for="id_email" class="control-label col-md-4  requiredField"> E-mail<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8 ">
                                    <input class="input-md emailinput form-control" id="id_email" name="email" placeholder="Your current email address" style="margin-bottom: 10px" type="email" readonly value="{{$customer -> email}}" required />
                                </div>     
                            </div> 
                          
                            <div id="div_id_number" class="form-group required">
                                 <label for="id_number" class="control-label col-md-4  requiredField"> Contact number<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8 ">
                                     <input class="input-md textinput textInput form-control" id="id_number" name="phone_no" type="tel" pattern="[0-9]{11}" placeholder="Ex: 091286*****"  value="{{ $customer -> phone_number }}" style="margin-bottom: 10px" type="text" required />
                                </div> 
                            </div> 

                             <div id="div_id_location" class="form-group required">
                                <label for="id-purok" class="control-label col-md-4  requiredField"> Purok Zone or Street... <span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8 ">
                                    <input class="input-md textinput textInput form-control" id="id_location" name="purok" placeholder="Enter Your Purok, Zone or" style="margin-bottom: 10px" value="{{ $customer -> purok }}" type="text" required />
                                </div> 
                            </div>

                            <div id="div_id_location" class="form-group required">
                                <label for="id_location" class="control-label col-md-4  requiredField">Address <span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8 ">
                                    <input class="input-md textinput textInput form-control" id="id_location" value="{{ $customer -> address }}" name="address" placeholder="Address" style="margin-bottom: 10px" type="text" required />
                                </div> 
                            </div>
                           {{--  <div class="form-group">
                                <div class="controls col-md-offset-4 col-md-8 ">
                                    <div id="div_id_terms" class="checkbox required">
                                        <label for="id_terms" class=" requiredField">
                                             <input class="input-ms checkboxinput" id="id_terms" name="terms" style="margin-bottom: 10px" type="checkbox" />
                                             Agree with the terms and conditions
                                        </label>
                                    </div>     
                                </div>
                            </div>  --}}
                            <div class="form-group"> 
                                <div class="aab controls col-md-4 "></div>
                                <div class="controls col-md-8">
                                   {{--  <input type="submit" name="Signup" value="Signup" class="btn btn-primary btn btn-info " id="submit-id-signup" /> --}}
                                    <button type="submit" name="btn"  class="btn btn-primary ">Submit</button>                
                                </div>
                            </div> 
                            
                    </form>
            </div>
        </div>
    </div> 
</div>
</div>


@endsection 


