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
<?php //Script 6.3 - handle_reg2.php
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
	
	
	// if no errors print confirm message
	
	if ($okay) {
		print '<p>You have been successfully regisered (but not really).</p>';
	}
	
?>
</body>
</html>