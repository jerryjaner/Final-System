@extends('Admin.master')
@section('title')

	 Admin Profile

@endsection
@section('content')

@error('email')
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hiddden="true">&times;</span>
        </button>
      </div>
  @enderror

 <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-6">
	            <!-- About Me Box -->
	            <div class="card card-primary">
	              <div class="card-body box-profile">
	                <div class="text-center">
	                 {{--  <img class="profile-user-img img-fluid img-circle"
	                      src="{{asset('/BackEndSourceFile/Profile_Picture'.$admin -> avatar)}}"
	                       alt="User profile picture"> --}}
	                       <img class="profile-user-img img-fluid img-circle"
		                      src="{{asset('BackEndSourceFile/Profile_Picture/'.$admin->avatar)}}"
		                       alt="User profile picture" style="width:150px; height: 150px;"> 
	                </div>

	                
	              {{--   @foreach($users as $admin) --}}

	               {{--  @if($admin -> role == '1') --}}
		             <h3 class="profile-username text-center">{{$admin -> name}} {{$admin->lastname}}</h3>
		             <p class="text-muted text-center">Administator</p>  
	              </div>

	              <!-- /.card-header -->
		              <div class="card-body">
		              	 <i class="fas fa-user mr-3"></i> {{$admin -> name}} {{ $admin -> lastname }} <hr>
		              	 <i class="fas fa-envelope mr-3"></i> {{$admin -> email}} <hr>
		           	     <i class="fas fa-map-marker-alt mr-3"></i> {{$admin -> purok}} <hr>
			          	 <i class="fas fa-map-marker-alt mr-3"></i>{{$admin -> address}} <hr>
			          	 <i class="fas fa-phone mr-3"></i> {{$admin -> phone_number}} <hr>
			        
			             <button class="btn btn-success btn-sm" style="float:right;" data-bs-toggle="modal" data-bs-target="#edit{{$admin->id}}" data-bs-whatever="@fat">Edit Profile</button>
		              </div>
		           {{--   @endif --}}

						<div class="modal fade" id="edit{{$admin -> id}}" tabindex="-1" aria-labelledby="edit{{$admin -> id}}" aria-hidden="true">
				            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				              <div class="modal-content">
				                <div class="modal-header text-center">
				                  <h5 class="modal-title w-100" id="edit{{$admin -> id}}">Update Profile</h5>
				                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				                </div>

				                <div class="modal-body">
	     
				                    <form class="row g-3" action="{{route('profile_update')}}" enctype="multipart/form-data" method="post" onsubmit="btn.disabled = true; return true;">

				                       @csrf
				                      <input type="hidden" class="form-control"  name="id" value="{{$admin -> id}}">

									  <div class="col-md-12">
									    <label for="First Name" class="form-label">First Name</label>
									    <input type="text" class="form-control" 
									           name="name"
									           placeholder="First Name"
									           onkeydown="return /[a-z ]/i.test(event.key)"
									           value="{{ $admin -> name }}" 
									           required>
									  </div>
									  {{--  <div class="col-md-4">
									    <label for="Middle Name" class="form-label">Middle Name</label>
									    <input type="text" class="form-control" name="middlename" placeholder="Middle Name">
									  </div> --}}
									  <div class="col-md-12">
									    <label for="Last Name" class="form-label">Last Name</label>
									    <input type="text" class="form-control"
									    	   name="lastname"
									    	   placeholder="Last Name"
									    	   value="{{ $admin -> lastname }}" 
									    	   onkeydown="return /[a-z ]/i.test(event.key)"
									    	   required>
									  </div>

									  <div class="col-md-12">
									    <label for="purok" class="form-label">Purok No.</label>
									    <input type="text" class="form-control"
									           name="purok"
									           placeholder="Purok No."
									           value="{{ $admin -> purok }}" 
									           required>
									  </div>

									  <div class="col-12">
									    <label for="address" class="form-label">Address</label>
									    <input type="text" class="form-control"
									           placeholder="Address"
									           name="address"
									           value="{{ $admin -> address }}" 
									           required>
									  </div>

									  <div class="col-md-12">
									    <label for="phone_number" class="form-label">Phone Number</label>
									    <input type="tel" class="form-control" name="phone_number" placeholder="Phone Number" 
									           pattern="[0-9]{11}" 
		                                       min="11"
		                                       max="11" 
		                                       value="{{ $admin -> phone_number }}" 
		                                       required>
									  </div>

									  <div class="col-12">
									    <label for="email" class="form-label">Email</label>
									    <input type="text" class="form-control"
									           placeholder="Email"
									           name="email"
									           value="{{ $admin -> email }}" 
									           required>
									  </div>
									  <div class="col-12">
			                             <label> New Profile Picture</label>
			                             <input type="file" class="form-control" name="avatar" accept="image/*">
			                        </div>

									
									{{--    <div class="col-12">
									    <label for="email" class="form-label">Email</label>
									    <input class="form-control" id="email" type="email" name="email" placeholder="New Email" required>
									  </div> --}}
									  
									  <div class="col-12">
				                        <button type="submit" name="btn" class="btn btn-primary float-right">Update Profile</button>
				                        <button id="userfont" type="button" class="btn btn-secondary float-right mr-1" data-bs-dismiss="modal">Close</button> 
									  </div>
									</form>
				                </div>
				             </div>
				          </div>
				        </div>

		            {{--  @endforeach --}}
		           
		           
	              <!-- /.card-body -->
	            </div>
	            <!-- /.card -->
	          </div>
	          <!-- /.col -->
          </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
 </section>





@endsection