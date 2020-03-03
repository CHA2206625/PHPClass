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
<?php //Script 6.4 - handle_reg3.php
	/* recieves values from register.html form: email, password,confirm,year,terms,color,submit */	
	//  error handling
	ini_set('display_errors', 1);
	//Flag variable to track success:
	$okay = true;	
	if (empty($_POST['email'])) {
		print '<p class="error">Please enter your email address.</p>';
		$okay = false;
	}
		if (empty($_POST['password'])) {
		print '<p class="error">Please enter your password.</p>';
		$okay = false;
	}	
	//validate birth year
	if (is_numeric($_POST['year'])) {
		$age = 2020 - $_POST['year']; // Calculate age this year
	} else {
		print '<p class="error">Please enter the year you were born as four digits.</p>';
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