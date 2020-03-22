<?php //Script 9.7 - welcome.php #2
/* this is welcome page. users are sent here after login */

//get the session info
session_start();

//set the page title and include header file
	define('TITLE', 'Welcome to the J.D. Salinger Fan Club!');
	include('templates/header.html');
	
// print greeting
	print '<h2>Welcome to the J.D. Salinger Fan Club!</h2>';
	print '<p>Hello, ' . $_SESSION['email'] . '!</p>';
	
// print how long they've been logged in_array
	date_default_timezone_set('America/Phoenix');
	print '<p>You have been logged in since: ' . date('g:i a', $_SESSION['loggedin']) . '.</p>';
	
// make a logout link:
	print '<p><a href="logout.php">Logout</a></p>';
	
	include('templates/footer.html'); //need the footer
?>