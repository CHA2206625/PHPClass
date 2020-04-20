<?php // script 13.6  - logout.php
// this is logout page. this page destroys the cookie

// cookie destroyer! - but only if there is one.
if (isset($_COOKIE['Samuel'])) {
	setcookie('Samuel', FALSE, time()-300);
}
// define a page title and include the header:
define('TITLE', 'Logout');
include('templates/headerquote.html');

// print a message
echo '<p>You are now logged out.</p>';
// include footer
include('templates/footerquote.html');
?>

