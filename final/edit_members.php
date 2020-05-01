<?php // final - edit_members.php
// update member info

// include header
define('TITLE', 'Manage Member');
include('templates/header.html');

print '<div class="delete"><div class="seethru height"><hr/><br><h2>Manage Member</h2>';
// restrict access to admin only:
	include('includes/functions.php');
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
		$row = mysqli_fetch_array($result); // retrieve info
		
		// display entry in a form
		print '<form action="edit_members.php" method="post">
		
		<p><label>First Name: <input type="text" name="first_name" value="' . htmlentities($row['first_name']) . '"> </label></p>
		<p><label>Last Name: <input type="text" name="last_name" value="' . htmlentities($row['last_name']) . '"></label></p>
		<p><label>Address: <input type="text" name="address" value="' . htmlentities($row['address']) . '"></label></p>
		<p><label>City: <input type="text" name="city" value="' . htmlentities($row['city']) . '"></label></p>
		<p><label>State: <input type="text" name="state" value="' . htmlentities($row['state']) . '"></label></p>
		<p><label>Phone: <input type="text" name="phone" value="' . htmlentities($row['phone']) . '"></label></p>
		<p><label>Email: <input type="text" name="email" value="' . htmlentities($row['email']) . '"></label></p>
		
		
		
		<input type="hidden" name="id" value="' . $_GET['id'] . '">
		<p><input type="submit" name="submit" value="Update Member Info"></p></form>';
	} else { // couldn't get info
			print '<p class="error">Could not access member data because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}
} elseif (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0)) {
	// handle the form
	//validate, secure form data 
	$problem = FALSE;
	if ( !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['phone']) && !empty($_POST['email'])) {
		
		//prepare values for storing
		$first = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['first_name'])));
		$last = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['last_name'])));
		$address = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['address'])));
		$city = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['city'])));
		$state = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['state'])));
		$phone = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['phone'])));
		$email = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['email'])));
		
	}else {
		$i = ($_POST['id']); //PROVIDES LINK BACK TO MEMBER INFO
		print '<p class="error">Please check info.</p><h3><a href="edit_members.php?id=' . $i . '">Back to member info</a></h3>';
		$problem = TRUE;
	}
	if (!$problem) {
		//define query
		$query = "UPDATE contacts SET first_name='$first', last_name='$last', address='$address', city='$city', state='$state', phone='$phone', email='$email' WHERE id={$_POST['id']}";
		if ($result = mysqli_query($dbc, $query)) {
			print '<p>The member has been updated.</p>
			<p>Back to <a href="view_members.php"><strong>Members List</strong></a></p>';
		}else {
			print '<p class="error">Could not update Member because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
		}
	} // no problem!
} else { // no id was set..
	print '<p class="error">This page has been accessed in error.</p>';
} // end of main IF
?></div></div>
<?php
mysqli_close($dbc); // close connection
include('templates/footer.html');
?>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		




