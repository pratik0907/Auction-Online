<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online Auction</title>
</head>

<body>


	<h2>Welcome to the Auction Page!!!</h2>

    <h3>To Proceed, Login or SignUP.</h3>
    
	<ul>
	<li>
    	{{  link_to("/users/create","SignUP")  }}
    </li>

	<li>
    	{{  link_to("/login","LogIN")            }}
    </li>
	</ul>

</body>
</html>