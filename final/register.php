<?php //Script8.9 - register.php


//set title and header file
define('TITLE', 'Register');
include('templates/header.html');

print '<div class="edit"><hr/><h2>Registration Form</h2>
	<p>Register to gain access to exclusive news and content about Prey!</p>';
	

/*-------------------------------------------------------*/
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form
	
	// validate form data 
	$problem = FALSE;
	
			
	if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['phone']) && !empty($_POST['email'])) {
		$first = trim(strip_tags($_POST['first_name']));
		$last = trim(strip_tags($_POST['last_name']));
		$address = trim(strip_tags($_POST['address']));
		$city = trim(strip_tags($_POST['city']));
		$state = trim(strip_tags($_POST['state']));
		$phone = trim(strip_tags($_POST['phone']));
		$email = trim(strip_tags($_POST['email']));
		
		// test email
		

		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  print "<p class='good'>$email is a valid email address</p>";
		} else {
		  print "<p class='error'>$email is not a valid email address</p>";
		  print "<p class='error'><a href='register.php'>Back to Registration</a></p>";
		  include('templates/footer.html');
		  exit();
	  
		}
		
	} else {
		print '<p class="error";>Please complete all fields.</p>';
		$problem = TRUE;
	}
	if (!$problem) {
		//connect and select:
		$dbc = mysqli_connect('localhost', 'root','password','members');
		$date = date('M Y');
		//define the query:
		$query = "INSERT INTO contacts (first_name, last_name, address, city, state, phone, email, date_entered) VALUES ('$first','$last','$address','$city','$state','$phone','$email', NOW())";
		
		//execute query
		if (@mysqli_query($dbc, $query)) {
			print '<p class="green">The member has been added!</p>';
		} else {
			print '<p class="error">Could not add entry because: <br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
		}
		
		mysqli_close($dbc); // close connection 
	} // no problems!
} // end of form submission IF
/*--------------------------------------------------------*/

//create form:
?>

<form action="register.php" method="post" class="form--inline">
	<p><label>First Name:</label><input type="text" name="first_name" size="20" value="<?php if (isset($_POST['first_name'])) {print htmlspecialchars($_POST['first_name']);} ?>"></p>
	<p><label>Last Name:</label><input type="text" name="last_name" size="20" value="<?php if (isset($_POST['last_name'])) {print htmlspecialchars($_POST['last_name']);} ?>"></p>
	<p><label>Address:</label><input type="text" name="address" size="20" value="<?php if (isset($_POST['address'])) {print htmlspecialchars($_POST['address']);} ?>"></p>
	<p><label>City:</label><input type="text" name="city" size="20" value="<?php if (isset($_POST['city'])) {print htmlspecialchars($_POST['city']);} ?>"></p>
	<p><label>State:</label><input type="text" name="state" size="2" value="<?php if (isset($_POST['state'])) {print htmlspecialchars($_POST['state']);} ?>"></p>
	<p><label>Phone:</label><input type="text" name="phone" size="20" value="<?php if (isset($_POST['phone'])) {print htmlspecialchars($_POST['phone']);} ?>"></p>
	<p><label>Email Address:</label><input type="text" name="email" size="20" value="<?php if (isset($_POST['email'])) {print htmlspecialchars($_POST['email']);} ?>"></p>
	
	
	<p><input type="submit" name="submit" value="Register!" class="button--pill"></p>
	
</form>
</div>
<?php include('templates/footer.html'); // need the footer
?>
	
	
	
	
	
