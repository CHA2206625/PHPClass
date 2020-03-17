<?php //Script8.9 - register.php
/*this page makes people think they are registering.
*/

//set title and header file
define('TITLE', 'Register');
include('templates/header.html');

print '<h2>Registration Form</h2>
	<p>Register so that you cant take advantage of certain features like this, that, and the other thing.</p>';
	
//check to see if form has already been submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$problem = false; //no problems yet
	
	//check each value
	if (empty($_POST['first_name'])) {
		$problem = true;
		print '<p class="text--error">Please enter your first name!<!p>';
	}	
	if (empty($_POST['last_name'])) {
		$problem = true;
		print '<p class="text--error">Please enter your last name!<!p>';
	}
	if (empty($_POST['email'])) {
		$problem = true;
		print '<p class="text--error">Please enter your email address!<!p>';
	}
	if (empty($_POST['password1'])) {
		$problem = true;
		print '<p class="text--error">Please enter a password!<!p>';
	}
	if ($_POST['password1'] != $_POST['password2']) {
		$problem = true;
		print '<p class="text--error">Your password did not match your confirmed password!<!p>';
	}
	
	if (!$problem){//If ther weren't any problems...
		print '<p class="text--success">You are now registered!<br>Okay, you are not really registered but...</p>';	
		//send email
		$body = "Thank You, {$_POST['first_name']}, for registering with the J.D. Salinger fan club!'."; 
		
		mail($_POST['email'], 'Registration Confirmation', $body, 'From: admin@example.com');
		
		//clear POST values
		$_POST = [];	
	} else {//forgot a field.
		print '<p class="ext--error">Please try again!</p>';
	}
}  //end handle for if statement.

//create form:
?>
<form action="register.php" method="post" class="form--inline">
	<p><label>First Name:</label><input type="text" name="first_name" size="20" value="<?php if (isset($_POST['first_name'])) {print htmlspecialchars($_POST['first_name']);} ?>"></p>
	<p><label>Last Name:</label><input type="text" name="last_name" size="20" value="<?php if (isset($_POST['last_name'])) {print htmlspecialchars($_POST['last_name']);} ?>"></p>
	<p><label>Email Address:</label><input type="text" name="email" size="20" value="<?php if (isset($_POST['email'])) {print htmlspecialchars($_POST['email']);} ?>"></p>
	
	<p><label for="password1">Password:</label><input type="password" name="password1" size="20" value="<?php if (isset($_POST['password1'])) {print htmlspecialchars($_POST['password1']);} ?>"></p>
	<p><label for="password2">Password:</label><input type="password" name="password2" size="20" value="<?php if (isset($_POST['password2'])) {print htmlspecialchars($_POST['password2']);} ?>"></p>	
	<p><input type="submit" name="submit" value="Register!" class="button--pill"></p>
	
</form>

<?php include('templates/footer.html'); // need the footer
?>
	
	
	
	
	
