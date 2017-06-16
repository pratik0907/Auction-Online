<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
</head>
<body>
	<h1>New User Registration</h1>

	{{Form::open(['route' => 'users.store'])}}
	<ul>
		<li>
			{{Form::label('name','Name: ')}}
			{{Form::text('name')}}
			{{$errors->first('name')}}
		</li>
		<li>
			{{Form::label('password','Password: ')}}
			{{Form::password('password')}}
			{{$errors->first('password')}}
		</li>
		<li>
			{{Form::label('email','Email: ')}}
			{{Form::email('email')}}
			{{$errors->first('email')}}
		</li>
		<li>
			{{Form::label('sex','Gender: ')}}
			{{Form::label('male','Male ')}}
			{{Form::radio('sex','Male')}}
			{{Form::label('female','Female ')}}
			{{Form::radio('sex','Female')}}
			{{$errors->first('sex')}}
		</li>
		<li>
			{{Form::submit('Register')}}
		</li>
		
	</ul>
	{{Form::close()}}