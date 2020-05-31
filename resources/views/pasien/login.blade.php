<!DOCTYPE html>
<html>
 <head>
  <title>Login Pasien</title>
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="{{url('assets/sufee/css/bootstrap.min.css')}}">
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
 	<div id="card">
			<div id="card-content">
		<div id="card-title">
			<h2>LOGIN</h2>
			<div class="underline-title"></div>
		</div>
		</div>
		<form  action="{{route('loginPasienPost')}}" class="form" method="POST">
			@csrf 
			<label for="username" style="padding-top:13px">&nbsp;Username</label>
			<input class="form-content"
			    type="text" name="username" />
			<div class="form-border"></div>
			<label for="user-password" style="padding-top:22px">&nbsp;Password</label>
			<input id="user-password" class="form-content" type="password"
			    name="password"/>
			<div class="form-border"></div>
			<button type="submit">Login</button>
		</form>
	  </div>
 </body>
</html>