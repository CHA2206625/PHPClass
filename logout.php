<?php // script 9.8 - logout.php
/* logout page - destroys session */

//need session
session_start();

//reset session array
$_SESSION = [];

//destroy  the session data on server
session_destroy();

// define a page title and include the header
define('TITLE', 'Logout');
include('templates/header.html');

?>

<h2>Welcome to the J.D. Salinger Fan Club!</h2>
<p>You are now logged out.</p>
<p>Thank you for using this site. We hope that you like it.<br>
Blah, Blah, Blah, Blah, Blah, Blah, Blah, ...</p>
<p>Check the session on the <a href="welcome.php">Welcome</a> page.</p>
<?php include('templates/footer.html');
?>