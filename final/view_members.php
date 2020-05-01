
<?php // script 13.8 - view_quotes.php
// this one lists all the quotes

// include header
define('TITLE', 'View All Quotes');
include('templates/header.html');

print '<div class="register"><hr/><div class="seethru"><br><h2>Club Members</h2>';
// restrict access to admin only:
		
		if (!isset($_COOKIE['Tommy'])) {
			print '<h2>Access Denied!</h2><p class="error">You do not have permission to access this page!</p>
			<h3><a href="login.php">Please Log In!</a></h3>';
			include('templates/footer.html');
			exit();
		} else {
				// database connection 
				include('includes/mysqli_connect.php');

				// define the query:
				$query = 'SELECT id, first_name, last_name, address, city, state, phone, email, date_entered FROM contacts ORDER BY date_entered DESC';

				// run the query:
				if ($result = mysqli_query($dbc, $query)) {
					//retrieve the returned records:
					while ($row = mysqli_fetch_array($result)) {
						//print records
						$date = $row['date_entered'];
						print "<div><p>{$row['first_name']}&nbsp;{$row['last_name']}\n<br>{$row['address']}\n<br>{$row['city']}\n<br>{$row['state']}\n<br>{$row['phone']}\n<br>{$row['email']}\n<br>Member since: " . $date . "\n";
					

						//add administrative links
						print "<br><strong>Manage Member:</strong> <a href=\"edit_members.php?id={$row['id']}\" class='green'>Edit</a><->
						<a href=\"delete_members.php?id={$row['id']}\">Delete</a></p></div>\n";
				} // end of while loop
				
				} else { // query didn't run
					print '<p class="error">Could not retrieve the data because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
				} // end of query IF
		}
?>
</div></div>
<?php
mysqli_close($dbc); // close connection
include('templates/footer.html');
?>

		
