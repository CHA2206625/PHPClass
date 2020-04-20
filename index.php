<?php // script 13.11 - index.php
// home page for site

// header
include('templates/headerquote.html');
// database
include('includes/mysqli_connect.php');

// define query
// change particulars depending on values passed in url 
if (isset($_GET['random'])) {
	$query = 'SELECT id, quote,source,favorite FROM quotes ORDER BY RAND() DESC LIMIT 1';
} elseif (isset($_GET['favorite'])) {
	$query = 'SELECT id, quote,source,favorite FROM quotes WHERE favorite=1 ORDER BY RAND() DESC LIMIT 1';
} else {
	$query = 'SELECT id, quote,source,favorite FROM quotes ORDER BY date_entered DESC LIMIT 1';
}
// run query
if ($result = mysqli_query($dbc, $query)) {
	// retrieve returned record
	$row = mysqli_fetch_array($result);
	//print record
	print "<div><blockquote>{$row['quote']}</blockquote>- {$row['source']}";
	
	// is this a favorite
	if ($row['favorite'] == 1) {
		print ' <strong>Favorite!</strong>';
	}
// complete the div
	print '</div>';
	
	// ifadmin is logged in, display admin links for this record;
	if (is_administrator()) {
		print "<p><b>Quote Admin:</b> <a href=\"edit_quote.php?id={$row['id']}\">Edit</a> <-> <a 		href=\"delete_quote.php?id={$row['id']}\">Delete</a></p>\n";
	}
}else { // query didn't run
	print '<p class="error">Could not retrieve the data because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}// end of query IF
	
mysqli_close($dbc); // close connection

print '<p><a href="index.php">Latest</a> <-> <a href="index.php?random=true">Random</a> <-> <a href="index.php?favorite=true">Favorite</a></p>';

include('templates/footerquote.html');
?>

