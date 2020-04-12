<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>View my Blog</title>
</head>
<body>
<h1>View my Blog</h1>
<?php // Script 12.6 - view_entries.php
	/* looks like this time we are getting the blog entries from db to display */
	
	//connect and select:
	$dbc = mysqli_connect('localhost', 'root','password','myblog');
		
	$query = 'SELECT * 
			  FROM entries 
			  ORDER BY date_entered DESC';
			  
	if ($r = mysqli_query($dbc, $query)) { // run query
		
		// retrieve and print every record
		while ($row = mysqli_fetch_array($r)) {
			print "<p><h3>{$row['title']}</h3>
				{$row['entry']}<br>
				<a href=\"edit_entry.php?id={$row['id']}\">Edit</a>
				<a href=\"delete_entry.php?id={$row['id']}\">Delete</a>
				</p><hr>\n";
		}
	} else { // query didn't run
	print '<p style="color:red;">Could not retrieve the data because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	} // end of query IF
	
	mysqli_close($dbc); // close connection_aborted
	
?>

</body>
</html>