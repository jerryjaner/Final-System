@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nick's Resto | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/BackEndSourceFile')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('/BackEndSourceFile')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/BackEndSourceFile')}}/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
{{--     <a href="#"><b>Nick's </b>Resto Bar</a>
 --}}  </div>



  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg" style="font-size: 24px;"><b>Nick's Restobar & Cafe Restaurant</b></p>

      <form action="{{ route('register')}}" enctype="multipart/form-data"  method="post" onsubmit="btn.disabled = true; return true;">
         @csrf

        <div class="input-group mb-3">
          <input id="name" type="text" placeholder="Firstname" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus onkeydown="return /[a-z ]/i.test(event.key)" onkeyup="letterOnly(this)">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        {{-- <div class="input-group mb-3">
          <input id="middlename" type="text" placeholder="Middlename" class="form-control @error('middlename') is-invalid @enderror" name="middlename"   onkeyup="letterOnly(this)">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
         @error('middlename')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror --}}

        <div class="input-group mb-3">
          <input id="lastname" type="text" placeholder="Lastname" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus onkeydown="return /[a-z ]/i.test(event.key)" onkeyup="letterOnly(this)" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('lastname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

         <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" class="custom-file-input @error('avatar') is-invalid @enderror" id="exampleInputFile" name="avatar" accept="image/*" required>
              <label class="custom-file-label" for="exampleInputFile" style="color: gray;">Select Profile Picture</label>
            </div>
          </div>
       {{--  <div class="input-group mb-3">
          <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" accept="image/*" id="inputGroupFile02" required>

          <label class="input-group-text" for="inputGroupFile02">Upload Profile</label>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('avatar')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror --}}

        <div class="input-group mb-3">
          <input id="purok" type="text" placeholder="Purok" class="form-control @error('purok') is-invalid @enderror" name="purok" value="{{ old('purok') }}" required autocomplete="purok"  autofocus >  

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map-marker"></span>
            </div>
          </div>
        </div>
        @error('purok')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="input-group mb-3">
          <input id="address" type="text" placeholder="Address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address"  autofocus >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map-marker"></span>
            </div>
          </div>
        </div>
        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror


        <div class="input-group mb-3">
          <input id="phone_number" type="tel" pattern="[0-9]{11}" placeholder="Phone Number Ex: 098966*****" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="address"  autofocus >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        @error('phone_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="input-group mb-3">
          <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
           @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
          <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
            
           </div> 
           @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
          <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text ">
              <span class="fas fa-lock"></span>
            </div>  
          </div>
          @error('password-confirm')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="row">
         <!--  <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <div class="md-3">
            <button type="submit" name="btn" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->

      <a href="{{route('login')}}" class="text-center" style="float: right;">Already have an Account ?</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('/BackEndSourceFile')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/BackEndSourceFile')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/BackEndSourceFile')}}/dist/js/adminlte.min.js"></script>
<script src="{{asset('/BackEndSourceFile')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>

{{-- 
<script>
     function letterOnly(input){

    var regex = /[^a-z]/gi;
    input.value = input.value.replace(regex,"");

  }


</script>  --}}



@endsection
