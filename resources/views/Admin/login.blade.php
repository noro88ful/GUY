<!DOCTYPE html>
<html lang="en">
<head>
	<title>GUY GHAZANCHYAN | Ադմին</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/login.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/Auth.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="/sendlogin" method="post" class="login100-form">
				@csrf
				<span class="login100-form-title p-b-34">
					GUY GHAZANCHYAN | Ադմին
				</span>
					@if($errors->has('username'))
						<p class="Authmessage Autherror">{{$errors->first('username')}}</p>
					@endif
					@if($errors->has('password'))
						<p class="Authmessage Autherror">{{$errors->first('password')}}</p>
					@endif
					@if(Session::has('error'))
						<p class="Authmessage Autherror">{{Session::get('error')}}</p>
					@endif
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100" value="{{old('email')}}" type="text" name="email" placeholder="Մուտքանուն">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" value="{{old('password')}}" name="password" placeholder="Գաղտնաբառ">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Մուտք
						</button>
					</div>
					<div class="w-full text-center p-t-27 p-b-239"></div>
				</form>
				<div class="login100-more" style="background-image: url('../assets/images/bg/loginBG.jpeg');"></div>
			</div>
		</div>
	</div>

</body>
</html>