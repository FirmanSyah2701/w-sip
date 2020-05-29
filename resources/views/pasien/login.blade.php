<!DOCTYPE html>
<html>
 <head>
  <title>Login Pasien</title>
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
 </head>
 <body>
 	<div id="card">
			<div id="card-content">
		<div id="card-title">
			<h2>LOGIN</h2>
			<div class="underline-title"></div>
		</div>
		</div>
		<form  action="{{route('loginPasienPost')}}" class="form" method="POST">
			@csrf 
			<label for="user-email" style="padding-top:13px">&nbsp;Username</label>
			<input id="user-email" class="form-content"
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