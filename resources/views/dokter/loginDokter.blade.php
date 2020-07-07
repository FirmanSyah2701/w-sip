<!DOCTYPE html>
<html>
	<head>
  		<title>Login</title>
		<link rel="icon" href="{{ url('assets/z/img/logopus4.png') }}">
		<link rel="stylesheet" href="{{ url('assets/z/style.css') }}">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
	</head>
	<body>
		<div id="card">
			<div id="card-content">
				<div id="card-title">
					<img src="{{ url('assets/z/img/logopus4.png') }}" alt="logo">
					<h2>LOGIN DOKTER</h2>
					<div class="underline-title"></div>
				</div>
			</div>
			
			@if(session()->has('alert'))
				<div class="alert alert-danger">
					<div>{{ session()->has('alert') }}</div>
				</div>
			@elseif(session()->has('alert-success'))
				<div class="alert alert-success">
					<div>{{session()->has('alert-success')}}</div>
				</div>
			@endif
			<form action="{{ url('/loginDokterPost') }}" method="post" class="form"> 
				{{ csrf_field() }}
				<label for="text" style="padding-top:13px">&nbsp;email</label>
				<input id="text" class="form-content" type="text" 
					name="username" required />
				<div class="form-border"></div>
				<label for="user-password" style="padding-top:22px">&nbsp;Password</label>
				<input id="user-password" class="form-content" type="password"
					name="password" required />
				<div class="form-border"></div>
				<input id="submit-btn" type="submit" name="submit" value="LOGIN" />
				<br>
			</form>
		</div>
		@include('sweet::alert')
	</body>
</html>