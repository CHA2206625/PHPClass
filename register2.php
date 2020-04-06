<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<style type="text/css" media="screen"> h1, p {font-family:sans-serif;}
	.error {color:red;} </style>
</head>
<body>
<h1>Register</h1>
<?php // script 11.6 - register.php
/* this one registers a user by storing their info in a text file and creating a directory for them */

// identify the directory and file to user
$dir = '../users/';
$file = $dir . 'users.txt';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // HANDLE THE FORM
	$problem = FALSE; // no problems so far.
	
		// check for each value
		if (empty($_POST['username'])) {
			$problem = TRUE;
			print '<p class="error">Please enter a username!</p>';
		}
		if (empty($_POST['password1'])) {
			$problem = TRUE;
			print '<p class="error">Please enter a password!</p>';
		}
		if (empty($_POST['password2'])) {
			$problem = TRUE;
			print '<p class="error">Your password did not match your confirmed password!</p>';
		}	
	if (!$problem) { // for no problems
			if (is_writeable($file)) { // open the file
				 // create the data to be written
				 $subdir = time() . rand(0, 4596);
				 $data = $_POST['username'] . "\t" . sha1(trim($_POST['password1'])) . "\t" . $subdir . PHP_EOL;
				 
				 //write the data
				 file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
				 
				 //create the directory
				 mkdir ($dir . $_POST['username']);
				 
				 // print a message
				 print '<p>You are now registered!</p>';
				 
			} else { // couldn't write to file
				print '<p class="error">Your could not be registered due to a system error.</p>';
			}
	}else { // forgot a field
		print '<p class="error">Please go back and try again!</p>';
	}
} else { // display the form
// leave php and display form
?>
<form action="register.php" method="post">
<p>Username: <input type="text" name="username" size="20"></p>
<p>Password: <input type="text" name="password1" size="20"></p>
<p>Confirm Password: <input type="text" name="password2" size="20"></p>
<p><input type="submit" name="submit" value="Register"></p>
</form>

<?php } // end of the submission if statement ?>


</body>
</html>
