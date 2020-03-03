<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<style type="text/css" media="screen">
		.error {color: red;}
	</style>
</head>
<body>
<h1>Registration Results</h1>
<?php //Script 6.5 - handle_reg5.php
	/* recieves values from register.html form: email, password,confirm,year,terms,color,submit */	
	//  error handling
	ini_set('display_errors', 1);
	//Flag variable to track success:
	$okay = true;	
	if (empty($_POST['email'])) {
		print '<p class="error">Please enter your email address.</p>';
		$okay = false;
	}   // password validation
		if (empty($_POST['password'])) {
		print '<p class="error">Please enter your password.</p>';
		$okay = false;
	}	// check passwords
	if ($_POST['password'] != $_POST['confirm']) {
		print '<p class="error">Your confirmed password does not match the original password.</p>';
		$okay = false;
	}   
	if ( is_numeric($_POST['year']) AND (strlen($_POST['year']) == 4) ) {
			// check if born before 2020
	if ($_POST['year'] < 2020) {
		$age = 2020 - $_POST['year']; // calculate age this year
		} else { 
			print '<p class="error">Either you entered your birth year wrong or you come from the future!</p>';
			$okay = false;
			}
		} else { // else for first contiditonal
			print '<p class="error">Please enter the year your were born as four digits.</p>';
			$okay = false;
		}
		//validate the terms of service
	if (!isset($_POST['terms'])) {
		print '<p class="error">You must accept the terms.</p>';
		$okay = false;
	}
	// if no errors print confirm message
	if ($okay) {
		print '<p>You have been successfully regisered (but not really).</p>';
		print "<p>You will turn $age this year.</p>";
	}
?>
</body>
</html>