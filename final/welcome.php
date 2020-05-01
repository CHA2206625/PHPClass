<?php //script 8.14 welcome.php
	/*welcome page. user is directed here after login */
	
	//set page title and include header file:
	define('TITLE', 'Welcome to the Original Prey Fan Club!');
	include('templates/header.html');
	
	print '<div class="welcome"><div class="seethru2 height"><hr/><div style="margin-left:1%;"><br>
<H2>Original Prey Fan Club</h2>
<p>You\'ve successfully logged in and can now take advantage of everything the site has to offer.</p>
	<p>This site is for fans of the original Xbox 360 first person shooter PREY. Early in the Xbox 360\'s run for that particular generation of consoles, this game was missed by many. </p>
	<p><a href="view_members.php">View Members</a></p>'
?>
</div></div></div>
<?php 
include('templates/footer.html');
//includes the footer.


?>