<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
</head>

<body>
	@if(Session::has('message'))
	<p class="{{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
	@endif
    
	<ul>
	<li>
    	{{  link_to("/auctions/create","Create New Auction")  }}
    </li>

	<li>
    	{{  link_to("/live_auctions","View Live Auctions")   }}
    </li>

    <li>
    	{{  link_to("/logout","Logout")   }}
    </li>
	</ul>

	

</body>
</html>