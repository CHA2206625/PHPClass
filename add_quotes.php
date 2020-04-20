<?php // script 13.7 - add_quote.php
// this one adds a quote 
// define page title and add header
define('TITLE', 'Add a Quote');
include('templates/headerquote.html');

print '<h2>Add a Quotation</h2>';

// Restrict access to administrators only:
if (!is_administrator()) {
	print '<h2>Access Denied!</h2><p class="error">You do not have permission to access this page!</p>';
	include('templates/footerquote.html');
	exit();
}
// check form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') { //handle form
	if ( !empty($_POST['quote']) && !empty($_POST['source']) ) {
		// database connection 
		include('includes/mysqli_connect.php');
		// prepare values for storage in database
		$quote = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['quote'])));
		$source = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['source'])));
		// create the 'favorite' value:
		if (isset($_POST['favorite'])) {
			$favorite = 1;
		} else { 
			$favorite = 0;
		}
		
		$query = "INSERT INTO quotes (quote, source, favorite) VALUES ('$quote','$source',$favorite)";
		mysqli_query($dbc, $query);
		
		if (mysqli_affected_rows($dbc) == 1) {
			// print confirmation
			print '<p>Your quotation has been stored.</p>';
		} else {
			print '<p class="error">Could not store the quote because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
		}
	// close connection to database
	mysqli_close($dbc);
	}else { //failed to enter quote
		print '<p class="error">Please enter a quotation and a source!</p>';
	}
} // end of submitted IF
// leave PHP and display form
?>
<form action="add_quotes.php" method="post">
	<p><label>Quote <textarea name="quote" rows="5" cols="30"></textarea></label></p>
	<p><label>Source <input type="text" name="source"></label></p>
	<p><label>Is this a favorite? <input type="checkbox" name="favorite" value="yes"></label></p>
	<p><input type="submit" name="submit" value="Add This Quote!"></p>
</form>

<?php include('templates/footerquote.html'); ?>
	
	
	
	
	
	
