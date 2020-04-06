<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<style type="text/css" media="screen"> h1, p {font-family:Comic Sans MS;}
	.error {color:red;} </style>
</head>
<body>
<h1>Login</h1>
<?php //script 11.8 login.php
/* we are going to log users in  by checking stored values in text file */

	// identify file to use
	$file = '../users/users.txt';
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') { // handle the form.
		$loggedin = FALSE; // Not currently logged in.
		
		// Enable auto_detect_line_settings:
		ini_set('auto_detect_line_endings',1);
		
		// open file
		$fp = fopen($file, 'rb');
		
		// loop through the file
		while ( $line = fgetcsv($fp, 200, "\t")) {
			// check file data against the submitted data
			if (($line[0] == $_POST['username']) AND ($line[1] == sha1(trim($_POST['password']))) ) {
				$loggedin = TRUE; // correct username/pass combo
				// stop looping through file
				break;
			} // end of if statement
		} // end of while
		
		fclose($fp); // close file
		
		// print message
		if ($loggedin) {
			print '<p>You are now logged in!</p>';
		} else {
			print '<p class="error">The <strong>username</strong> and <strong>password</strong> you entered do not match those on file.</p>';
		}
	} else { // display form
	// leave php and display form
	?>
	<form action="login.php" method="post">
<p>Username: <input type="text" name="username" size="20"></p>
<p>Password: <input type="text" name="password" size="20"></p>
<p><input type="submit" name="submit" value="Register"></p>
</form>

	<?php } // end of the submission IF statement ?>

</body>
</html>