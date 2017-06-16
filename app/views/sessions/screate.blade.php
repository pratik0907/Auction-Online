<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<h1>User Login</h1>

	{{Form::open(['route' => 'sessions.store'])}}
	<ul>
		<li>
			{{Form::label('email','Email: ')}}
			{{Form::text('email')}}
			{{$errors->first('email')}}
		</li>
		<li>
			{{Form::label('password','Password: ')}}
			{{Form::password('password')}}
			{{$errors->first('password')}}
		</li>
			{{Form::submit('Login')}}
		</li>
		
	</ul>

	@if(Session::has('message'))
	<p class="{{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
	@endif

	{{Form::close()}}
