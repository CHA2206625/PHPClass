<?php // script 13.9 - edit_entry.php
// this one lists all the quotes

// include header
define('TITLE', 'Edit a Quote');
include('templates/headerquote.html');

print '<h2>Edit a Quotation</h2>';
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
	print '<form action="edit_entry.php" method="post">
	<p><label>Quote <textarea name="quote" rows="5" cols="30">' . htmlentities($row['quote']) . '</textarea></label></p>
	<p><label>Source <input type="text" name="source" value="' . htmlentities($row['source']) . '"></label></p>
	<p><label>Is this a favorite? <input type="checkbox" name="favorite" value="yes"';
	
	// check box if it is favorite
	if ($row['favorite'] == 1) {
		print ' checked="checked"';
	}
	
	// complete form
	print '></label></p>
	<input type="hidden" name="id" value="' . $_GET['id'] . '">
	<p><input type="submit" name="submit" value="Update This Quote!"></p></form>';
	} else { // couldn't get info
		print '<p class="error">Could not retrieve the quotation because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}
} elseif (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0)) {
	// handle the form
	//validate, secure form data 
	$problem = FALSE;
	if ( !empty($_POST['quote']) && !empty($_POST['source'])) {
		
		//prepare values for storing
		$quote = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['quote'])));
		$source = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['source'])));
		
		//create the favorite value
		if (isset($_POST['favorite'])) {
			$favorite = 1;
		} else {
			$favorite = 0;
		}
	}else {
		print '<p class="error">Please submit both a quotation and a source.</p>';
		$problem = TRUE;
	}
	if (!$problem) {
		//define query
		$query = "UPDATE quotes SET quote='$quote', source='$source', favorite=$favorite WHERE id={$_POST['id']}";
		if ($result = mysqli_query($dbc, $query)) {
			print '<p>The quotation has been updated.</p>';
		}else {
			print '<p class="error">Could not update the quotation because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
		}
	} // no problem!
} else { // no id was set..
	print '<p class="error">This page has been accessed in error.</p>';
} // end of main IF
mysqli_close($dbc); // close connection
include('templates/footerquote.html');
?>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		




