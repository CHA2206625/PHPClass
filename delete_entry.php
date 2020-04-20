<?php // script 13.10 - delete_entry.php
// this one lists all the quotes

// include header
define('TITLE', 'Delete a Quote');
include('templates/headerquote.html');

print '<h2>Delete a Quotation</h2>';
// restrict access to admin only:
if (!is_administrator()) {
	print '<h2>Access Denied!</h2><p class="error">You do not have permission to access this page!</p>';
	include('templates/footerquote.html');
	exit();
}
// database connection 
include('includes/mysqli_connect.php');

if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0) ) { 
// display entry in a form

	// define query
	$query = "SELECT quote, source, favorite FROM quotes WHERE id={$_GET['id']}";
	
	if ($result = mysqli_query($dbc, $query)) { // run query
		$row = mysqli_fetch_array($result); // retrieve info
		
		// makin form
		print '<form action="delete_entry.php" method="post">
		<p>Are you sure you want to delete this quote?</p>
		<div><blockquote>' . $row['quote'] . '</blockquote>- ' . $row['source'];
		
		// check box if it is favorite
		if ($row['favorite'] == 1) {
			print ' <strong>Favorite!</strong>';
		}
		
		// complete form
		print '></div><br>
		<input type="hidden" name="id" value="' . $_GET['id'] . '">
		<p><input type="submit" name="submit" value="Delete This Quote!"></p></form>';
	} else { // couldn't get info
			print '<p class="error">Could not retrieve the quotation because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}
} elseif (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0)) {
		// handle the form
		$query = "DELETE FROM quotes WHERE id={$_POST['id']} LIMIT 1";
		$result = mysqli_query($dbc, $query); // execute the query
		
		// report on the result
		if (mysqli_affected_rows($dbc) == 1) {
			print '<p>The quote entry has been deleted.</p>';
		} else {
			print '<p class="error">Could not delete the blog entry because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
		}
} else { // no id recieved
		print '<p class="error">This page has been accessed in error.</p>';
}// end of main IF
mysqli_close($dbc); // close connection
include('templates/footerquote.html');
?>
		
	
	
	
	
	
	
	
	
	
	
	
	
	