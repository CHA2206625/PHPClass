<?php // script 13.6  - logout.php
// this is logout page. this page destroys the cookie

// cookie destroyer! - but only if there is one.
if (isset($_COOKIE['Tommy'])) {
	setcookie('Tommy', FALSE, time()-300);
	$refreshbrowser = 0.1;
	header('Refresh: ' . $refreshbrowser);
}
// define a page title and include the header:
define('TITLE', 'Logout');
include('templates/header.html');

// print a message
print '<div class="edit"><div class=" height"><hr/><br><p>You are now logged out.</p><h3><a href="welcome.php">Back to Main Page</a></h3>';
// include footer
?> </div></div>
<?php
include('templates/footer.html');
?>

