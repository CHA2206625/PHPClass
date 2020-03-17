<?php //script 8.14 welcome.php
	/*welcome page. user is directed here after login */
	
	//set page title and include header file:
	define('TITLE', 'Welcome to the J.D. Salinger Fan Club!');
	include('templates/header.html');
?>
<H2>Welcome to a J.D. Saliger Fan Club</h2>
<p>You've successfully logged in and can now take advantage of everything the site has to offer.</p>
	<p>Integer ut molestie tellus, vel rutrum mauris. Ut et est feugiat, bibendum eros sed, fringilla mauris. Proin posuere urna a dui aliquam blandit. Sed ac ipsum dolor. Donec fermentum hendrerit accumsan. Fusce justo ex, aliquet et fringilla ut, vestibulum et nisi. Morbi ornare nisi sem, sed vulputate nunc venenatis quis. Mauris ut arcu sodales, bibendum orci in, pharetra quam. Proin mi risus, faucibus ac tincidunt ornare, pulvinar sed dui. </p>

<?php 
include('templates/footer.html');
//includes the footer.


?>