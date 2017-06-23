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
	<b>Starting at: </b>

	<p id="demo"></p>                                 
	<script type="text/javascript">

	var x = setInterval(function() {

	var countDownDate = null;
	countDownDate = new Date("{{$listing->start_date}} {{$listing->start_time}}");
  	var now = new Date();
  	var distance = countDownDate - now;
  	var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  	var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  	var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  	var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  	document.getElementById("demo").innerHTML = days + "d " + hours + "h "+ minutes + "m " + seconds + "s ";
  	if (distance < 0) {
    	clearInterval(x);
    	document.getElementById("demo").innerHTML = "EXPIRED";

  	}

	}, 1000);

	</script>

	<b>Ending at: </b>

	<p id="demo1"></p>                                 
	<script type="text/javascript">

	var y = setInterval(function() {

	var countDownDate1 = null;
	countDownDate1 = new Date("{{$listing->end_date}} {{$listing->end_time}}");
  	var now1 = new Date();
  	var distance1 = countDownDate1 - now1;
  	var days = Math.floor(distance1 / (1000 * 60 * 60 * 24));
  	var hours = Math.floor((distance1 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  	var minutes = Math.floor((distance1 % (1000 * 60 * 60)) / (1000 * 60));
  	var seconds = Math.floor((distance1 % (1000 * 60)) / 1000);
  	document.getElementById("demo1").innerHTML = days + "d " + hours + "h "+ minutes + "m " + seconds + "s ";
  	if (distance1 < 0) {
    	clearInterval(y);
    	document.getElementById("demo1").innerHTML = "EXPIRED";
  	}
	}, 1000);

	</script>
	


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
	 <a href="auction/{{$listing->id}}/place">Place Bid</a>
	 <button 
    type="button" 
    class="btn btn-primary btn-lg" 
    data-toggle="modal" 
    data-target="#favoritesModal">
    Place Bid
     </button>
</body>
</html>