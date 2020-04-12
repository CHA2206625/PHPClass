<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Connect to MySQL</title>
</head>
<body>
<?php //Script 12.2 - mysqli_connect2.php
	/* connects to mysql database */
	
	//try to connect and print messages
	
	if ($dbc = mysqli_connect('localhost', 'root','password','myblog')) {
		print '<p>Successfully connected to the database!</p>';
		
		mysqli_close($dbc); //close connection 
		
	} else {
		print '<p style="color:red;">
		Could not connect to the database.<br>' . mysqli_connect_error() . '.</p>';
	}

?>
</body>
</html>
