<?php // Script 8.8 - login.php
/* this site lets folks log in to the site */

// header file:
define('TITLE', 'Login');
include('templates/header.html');

//print intro text:
print '<h2>Login Form</h2>
	<p>Users who are logged in can take advantage of certain features like this, that, and the other thing.</p>';
	
// check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	//handle form
	if ( (!empty($_POST['email'])) && (!empty($_POST['password'])) ) {
		
		if ( (strtolower($_POST['email']) == 'me@example.com') && ($_POST['password'] == 'testpass') ) { //Correct!
			
			//Redirect the user to the welcome page.
			ob_end_clean(); //Destroy the buffer!
			header('Location: welcome.php');
			exit();
			
	
		} else { // incorrect!
			print '<p class="text--error">The submitted email address and password do not match those on file!<br>Go back and try again.</p>';
			
		}
	} else {//forgot a field.
		print '<p class="text--error">Please make sure you enter both an email address and a password!<br>Go back and try again.</p>';
	}
} else {//display form
	print '<form action="login.php" method="post" class="form--inline">
	<p><label for="email">Email Address:</label><input type="email" name="email" size="20"></p>
	<p><label for="password">Password:</label><input type="password" name="password" size="20"></p>
	<p><input type="submit" name="submit" value="Log In!" class="button--pill"></p></form>';
}

include('templates/footer.html'); // need the footer

?>