<!DOCTYPE html>
<html>
<head>
	<title>Live Auctions</title>
	<style>	
	 table#t01 tr:nth-child(even) {
	    background-color: #eee;
	}
	table#t01 tr:nth-child(odd) {
	   background-color:#faa;
	}
	table#t01 th {
	    background-color: black;
	    color: white;
	} 
	</style>

</head>

<body>
	<h1>Live Auctions</h1>
	<table id="t01" >
	<tr>
		<th>Auction Name</th>
		<th>Status</th>
		<th>Ends At</th>
		<th>Current Price</th>
		<th>View</th>
		<th>Place Bid</th>
	</tr>

	@foreach($listings as $listing)
	@if(Auth::user()->email !== $listing->user_id)
	<tr>
		<td>{{$listing->auction_name}}</td>	
		<td>{{$listing->status}}</td>
		<td>{{$listing->end_time}}</td>
		<td>{{$listing->last_bid_price}}</td>
		<td><a href="auction/{{$listing->id}}">View</a></td>
		<td><a href="auction/{{$listing->id}}/edit">Place Bid</a></td>
	</tr>	
	 @endif
	 @endforeach
	 



	<p>
	 <a href="create_auction">Create new Auction</a> 
	</p>


</body>
</html>