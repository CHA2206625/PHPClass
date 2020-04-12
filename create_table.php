<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Create a Table</title>
</head>
<body>
<?php // Script 12.3 - create_table.php
	/* connect to mysql server, selects database, creates a table. */
	
	// connect and select:
	if ($dbc = mysqli_connect('localhost', 'root','password','myblog')) {
		
		// define query - create query to store in a variable 
		$query = 'CREATE TABLE entries (
		id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
		title VARCHAR(100) NOT NULL, 
		entry TEXT NOT NULL, 
		date_entered DATETIME NOT NULL
		) CHARACTER SET utf8 ';
		
		// execute query
		if (@mysqli_query($dbc, $query)) {
			print '<p>The table has been created!</p>';
		} else {
			print '<p style="color: red;">Could not create the table because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
		}
		
		mysqli_close($dbc); //close connection 
	} else  { // connection failure
	print ' <p style="color:red;">Could not connect to the database:<br>' . mysqli_connect_error() . '.</p>';
	}
?>
	


</body>
</html>