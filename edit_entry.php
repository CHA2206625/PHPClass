<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit a Blog Entry</title>
</head>
<body>
<h1>Edit an Entry</h1>
<?php // Script 12.8 - edit_entry.php
	/* this script edits a blog entry using UPDATE */
	
	// connect and select
	$dbc = mysqli_connect('localhost', 'root','password','myblog');

	// set the character set
	mysqli_set_charset($dbc, 'utf8');
	
	if (isset($_GET['id']) && is_numeric($_GET['id']) ) { //display entry in a form
		
		// define query
		$query = "SELECT title, entry FROM entries WHERE id={$_GET['id']}";
		if ($r = mysqli_query($dbc, $query)) {// run query
			
			$row = mysqli_fetch_array($r); // retrieve info
			
			//make form
				print '<form action="edit_entry.php" method="post">
					<p>Entry Title: <input type="text" name="title" size="40" maxsize="100" value="' . htmlentities($row['title']) . '"></p>
					<p>Entry Text: <textarea name="entry" cols="40" rows="5">' . htmlentities($row['entry']) . '</textarea></p>
					<input type="hidden" name="id" value="' . $_GET['id'] . '">
					<input type="submit" name="submit" value="Update this Entry">
					</form>';
					
		} else { // couldn't get info
			print '<p style="color:red;">Could not retrieve the blog entry because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
		}
		
	} elseif (isset($_POST['id']) && is_numeric($_POST['id'])) { // handle form
		
		//validate secure form data
		$problem = FALSE;
		if (!empty($_POST['title']) && !empty($_POST['entry'])) {
			$title = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['title'])));
		    $entry = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['entry'])));
		} else {
			print '<p style="color:red;">Please submit both a title and an entry.</p>';
			$problem = TRUE;
		}
		
		if (!$problem) {
			
			// define query
			$query = "UPDATE entries SET title='$title', entry='$entry' WHERE id={$_POST['id']}";
			$r = mysqli_query($dbc, $query); // execute query
			
			// report result
			if (mysqli_affected_rows($dbc) == 1) {
				print '<p>The blog entry has been updated.</p>';
			} else {
				print '<p style="color:red;">Could not update the entry because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
			}
			
		} // no problems
		
	} else { // no id set
		print '<p style="color:red;">This page has been accessed in error.</p>';
	} // end of IF
	
	mysqli_close($dbc); // close connection_aborted


?>
			

</body>
</html>