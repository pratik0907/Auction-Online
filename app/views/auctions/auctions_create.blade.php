<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create Auction</title>
</head>
<body>
	<h1>Fill the following Details</h1>

	{{Form::open(['route' => 'auctions.store'])}}
	<ul>
		<li>
			{{Form::label('auction_name','Auction Name: ')}}
			{{Form::text('auction_name')}}
			{{$errors->first('auction_name')}}
		</li>
		<li>
			{{Form::label('start_price','Start Price: ')}}
			{{Form::Input('float','start_price')}}
			{{$errors->first('start_price')}}
		</li>
		<li>
			{{Form::label('reserved_price','Reserved Price: ')}}
			{{Form::Input('float','reserved_price')}}
			{{$errors->first('reserved_price')}}
		</li>
		<li>
			{{Form::label('selling_price','Selling Price: ')}}
			{{Form::Input('float','selling_price')}}
			{{$errors->first('selling_price')}}
		</li>
		<li>
			{{Form::label('start_time','Start Time: ')}}
			{{Form::Input('date','start_date')}}
			{{Form::Input('time','start_time')}}
			{{$errors->first('start_time')}}
		</li>
		<li>
			{{Form::label('end_time','End Time: ')}}
			{{Form::Input('date','end_date')}}
			{{Form::Input('time','end_time')}}
			{{$errors->first('end_time')}}
		</li>

		<li>
			{{Form::label('min_bid','Minimum Bid Amount: ')}}
			{{Form::Input('float','min_bid')}}
			{{$errors->first('min_bid')}}
		</li>
		
		<li>
			{{Form::label('status','Status: ')}}
			{{Form::label('active','Active ')}}
			{{Form::radio('status','Active')}}
			{{Form::label('closed','Closed ')}}
			{{Form::radio('status','Closed')}}
			{{$errors->first('status')}}
		</li>
		<li>
			{{Form::submit('Create Auction')}}
		</li>
		
	</ul>
	{{Form::close()}}