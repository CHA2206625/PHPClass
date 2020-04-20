<?php // script 13.8 - view_quotes.php
// this one lists all the quotes

// include header
define('TITLE', 'View All Quotes');
include('templates/headerquote.html');

print '<h2>All Quotes</h2>';
// restrict access to admin only:
if (!is_administrator()) {
	print '<h2>Access Denied!</h2><p class="error">You do not have permission to access this page!</p>';
	include('templates/footerquote.html');
	exit();
}
// database connection 
include('includes/mysqli_connect.php');

// define the query:
$query = 'SELECT id, quote, source, favorite FROM quotes ORDER BY date_entered DESC';

// run the query:
if ($result = mysqli_query($dbc, $query)) {
	//retrieve the returned records:
	while ($row = mysqli_fetch_array($result)) {
		//print records
		print "<div><blockquote>{$row['quote']}</blockquote>- {$row['source']}\n";
		
		//is this favorite
		if ($row['favorite'] == 1) { print ' <strong>Favorite!</strong>';
		}
		//add administrative links
		print "<p><b>Quote Admin:</b> <a href=\"edit_entry.php?id={$row['id']}\">Edit</a><->
		<a href=\"delete_entry.php?id={$row['id']}\">Delete</a></p></div>\n";
	} // end of while loop
	
} else { // query didn't run
	print '<p class="error">Could not retrieve the data because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
} // end of query IF

mysqli_close($dbc); // close connection
include('templates/footerquote.html');
?>

		
