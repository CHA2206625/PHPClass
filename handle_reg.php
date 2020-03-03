<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration</title>
</head>
<body>
<h1>Registration Results</h1>
<?php //Script 6.2 - handle_reg.php
	/* recieves values from register.html form: email, password,confirm,year,terms,color,submit */
	
	
	//  error handling
	ini_set('display_errors', 1);
	
	//Flag variable to track success:
	$okay = true;
	
	// if no errors print confirm message
	
	if ($okay) {
		print '<p>You have been successfully regisered (but not really).</p>';
	}
	
?>
</body>
</html>