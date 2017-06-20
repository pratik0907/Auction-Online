<!DOCTYPE html>
<html>
<head>
	<title>{{$listing->auction_name}}</title>
	<style>
	body{
		background-color: #C0C0C0;
	}

	</style>

</head>

<body>

	<h1>{{$listing->auction_name}}</h1> 
	 <b>Minimum Bid: </b>
	 {{$listing->min_bid}}<br>
	 <b>Start Time: </b>
	{{$listing->start_date}} {{$listing->start_time}} <br>
	 <b>End Time: </b>
	{{$listing->end_date}} {{$listing->end_time}} <br>
	 <b>Status: </b>
	{{$listing->status}} <br>
	 <b>Current Price:</b>
	{{$listing->last_bid_price}}<br>
	 <br>
	 <a href="auction/{{$listing->id}}/edit">Place Bid</a>
</body>
</html>