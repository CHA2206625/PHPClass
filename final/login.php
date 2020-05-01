
<?php // 13.5 - login.php
/* this page lets people log in to the site */

// set two variables with default values
$loggedin = false;
$error = false;
 // check if the form has been sbmitted:
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	 // handle form
	 if (!empty($_POST['email']) && !empty($_POST['password'])) {
		 
		 if ( (strtolower($_POST['email']) == 'me@example.com') && ($_POST['password'] == 'testpass') ) { // correct!
		 
		 // create cookie:
		 setcookie('Tommy','Tawodi', time()+3600);
		 
		 // Indicate they are logged in:
		 $loggedin = true;
		 
		 } else { // incorrect!
		 
		 $error = 'The submitted email address and password do not match those on file!';
		 
		 }
	 } else { // forgot a field
	 
	 $error = 'Please make sure you enter both an email address and a password!';
	 }
 }
 // set the page title and include header file
 define('TITLE', 'Login');
 include('templates/header.html');
 
 // print error if one exists
 if ($error) {
	 print '<div class="edit"><p class="error">' . $error . '</p>';
 }
 
 // indicate the user is logged in or show the form:
 if ($loggedin) {
	 header("Location: welcome.php");
	 
 } else {
	 print '<div class="edit"><div class=" height"><hr/><br><h2>Login Form</h2>
	 <form action="login.php" method="post">
	 <p><label>Email Address <input type="email" name="email"></label></p>
	 <p><label>Password <input type="password" name="password"></label></p>
	 <p><input type="submit" name="submit" value="Log In!"></p>
	 </form>';
 }
 ?>
 </div></div>
 <?php
 include('templates/footer.html'); // add footerquote
 ?>
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 