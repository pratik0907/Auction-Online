<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{$listing->auction_name}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="text/javascript">
  	 function show(val)
  	 {
  	 	 $('#listingid').val(val);
  	 }
  </script>
</head>
<body>

<div class="container">
    <h2>{{$listing->auction_name}}</h2>
	 <b>Status: </b>
	{{$listing->status}} <br>
	 <b>Current Price:</b>
	{{$listing->last_bid_price}}<br>
	<b>Minimum Bid: </b>
	 {{$listing->min_bid}}<br>
	 <br>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" onclick="show({{$listing->id}})" data-toggle="modal" data-target="#myModal">Place Bid</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Place Bid</h4>
        </div>
        <div class="modal-body">
          <p>Current Price: 
          {{$listing->last_bid_price}}</p>
          <p>Minimum Bid: 
          {{$listing->min_bid}}</p>

          {{Form::open(array('url'=>'auction/bid/placed','method'=>'POST'))}}
          <input name="Listing_id" id="listingid" type="hidden" value="">
          {{Form::label('your_price','Your Price')}}
          {{Form::Input('float','your_price')}}
          {{Form::submit("Go",array('class'=>'btn btn-default','id'=>'bidpl'))}}
          {{Form::close()}}
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>
