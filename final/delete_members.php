<?php // script final - delete_members.php
// Get rid of members with push of a button.

// include header
define('TITLE', 'Remove Member');
include('templates/header.html');

// build body content
print '<div class="delete"><div class="seethru height"><hr/><br><h2>Remove Member</h2>';
include('includes/functions.php');
	// restrict access to admin only:
	if (!is_administrator()) {
		print '<h2>Access Denied!</h2><p class="error">You do not have permission to access this page!</p>';
		include('templates/footer.html');
		exit();
	}
// database connection 
include('includes/mysqli_connect.php');

	if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0) ) { 

		// define query
		$query = "SELECT id, first_name, last_name, address, city, state, phone, email, date_entered FROM contacts WHERE id={$_GET['id']}";
		
		if ($result = mysqli_query($dbc, $query)) { // run query
		
			$row = mysqli_fetch_array($result); // get query info in $row variable
			
			$date = $row['date_entered'];
			// display member info in a form
			print "<form action='delete_members.php' method='post'>
				<div><p>{$row['first_name']}&nbsp;{$row['last_name']}\n<br>{$row['address']}\n<br>{$row['city']}\n<br>{$row['state']}\n<br>{$row['phone']}\n<br>{$row['email']}\n<br>Member since: " . $date . "\n</p></div>
				
				<input type='hidden' name='id' value='". $_GET['id'] . "'>
				<p><input type='submit' name='submit' value='Get rid of this dirtbag!'></p></form>";

		} else { // couldn't get info
				print '<p class="error">Could not find member because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
		}
	} elseif (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0)) {
			// handle the form
			$query = "DELETE FROM contacts WHERE id={$_POST['id']} LIMIT 1";
			$result = mysqli_query($dbc, $query); // execute the query
			
			// report on the result
			if (mysqli_affected_rows($dbc) == 1) {
				print '<p>The member has been removed.</p>
				<p>Back to <a href="view_members.php"><strong>Members List</strong></a></p>';
			} else {
				print '<p class="error">Could not delete member because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
			}
	} else { // no id recieved
			print '<p class="error">This page has been accessed in error.</p>';
	}// end of main IF
	?></div></div>
<?php
mysqli_close($dbc); // close connection
include('templates/footer.html');
?>
		
	
	
	
	
	
	
	
	
	
	
	
	
	