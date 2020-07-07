<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign Up</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="{{url('assets/login/images/icons/favicon.ico')}}"/>
  <link rel="stylesheet" href="{{url('assets/login/vendor/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/login/fonts/iconic/css/material-design-iconic-font.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/login/vendor/animate/animate.css')}}">
  <link rel="stylesheet" href="{{url('assets/login/vendor/css-hamburgers/hamburgers.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/login/vendor/animsition/css/animsition.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/login/vendor/select2/select2.min.css')}}">	
  <link rel="stylesheet" href="{{url('assets/login/vendor/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{url('assets/login/css/util.css')}}">
  <link rel="stylesheet" href="{{url('assets/login/css/main.css')}}">
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>
	@if($errors->any())
		<!-- <div class="alert alert-success">success</div> -->
		<div class="alert alert-danger">
			<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach  
			</ul>  
		</div> 
	@endif

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="{{route('registerPasienPost')}}" method="POST">
					@csrf
					<span class="login100-form-title p-b-26">
						Sign Up
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
          			</div>
          
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="nama_pasien">
						<span class="focus-input100" data-placeholder="Nama Lengkap"></span>
					</div>

					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="jk" value="laki-laki"> 
						<label class="form-check-label" for="inlineCheckbox1">Laki-laki</label> 
					</div>
    
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="jk" value="perempuan"> 
						<label class="form-check-label" for="inlineCheckbox1">Perempuan</label> 
					</div>

          			<div style="margin-top:30px;"></div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="number" min="1" max="70" name="umur">
						<span class="focus-input100" data-placeholder="Umur"></span>
					</div>

          			<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="no_telp">
						<span class="focus-input100" data-placeholder="Nomer Telpon"></span>
          			</div>
          
         			<div class="wrap-input100 validate-input">
						<input type="text" class="input100" name="alamat">
						<span class="focus-input100" data-placeholder="Alamat"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
                				Sign Up							
              				</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Already have an account?
						</span>
            			<a class="txt2" href="{{route('loginPasien')}}">
							Login
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div id="dropDownSelect1"></div>

	<script src="{{url('assets/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{url('assets/login/vendor/animsition/js/animsition.min.js')}}"></script>
	<script src="{{url('assets/login/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{url('assets/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{url('assets/login/vendor/select2/select2.min.js')}}"></script>
	<script src="{{url('assets/login/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{url('assets/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{url('assets/login/vendor/countdowntime/countdowntime.js')}}"></script>
	<script src="{{url('assets/login/js/main.js')}}"></script>
  <script src="{{asset('js/app.js')}}"></script>
</body>
</html>