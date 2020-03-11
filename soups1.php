<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>No Soup for You!</title>
</head>
<body>
	<h1>Mmm...soups</h1>
	<?php //Script 7.1 - soups.php
	/* This script makes and prints arrays */
	
	// Space for error management
	
	// create array
	$soups = [
	'Monday' => 'Clam Chowder',
	'Tuesday' => 'White Chicken Chili',
	'Wednesday' => 'Vegetarian',
	'Thursday' => 'Wedding Ball',
	'Friday' => 'Chef Boyardee',
	'Saturday' => 'Minestrone',
	'Sunday' => 'Tomato'
	];
	
	// try to Print array
	print "<p>$soups</p>";
	
	// print contents of array
	print_r($soups);
	
?>

</body>
</html>