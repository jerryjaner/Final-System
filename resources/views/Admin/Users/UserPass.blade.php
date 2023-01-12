@extends('Admin.master')
@section('title')

	  Change Password

@endsection
@section('content')

 <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-6">
	            <!-- About Me Box -->
	            <div class="card card-primary">
	              <div class="card-body box-profile">
	              	<div class="mb-5">
	                  <h4 style="text-align: center;">Change Password</h4>
	                </div>
	                <form class="row g-3" action="{{ route('password_update') }}" method="POST" onsubmit="btn.disabled = true; return true;">
	                	@csrf
					  <div class="col-md-12">
					    <label for="" class="form-label">Current Password</label>
					  

						    <input id="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword"  autocomplete="oldpassword" placeholder="Current Password">

                  @error('oldpassword')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
					  </div>

					  <div class="col-md-12">
					    <label for="" class="form-label">New Password</label>
					 

						  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" placeholder="New Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
					  </div>
					  <div class="col-md-12">
					    <label for="" class="form-label">Confirm Password</label>
					    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Confirm Password">

					      @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
					  </div>
					  <div class="col-12 mt-2">
					    <button type="submit" name="btn" class="btn btn-primary">Save</button>
					  </div>
					</form>  
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

{{--  <script type="text/javascript">
 	
 // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
 </script> --}}
@endsection	