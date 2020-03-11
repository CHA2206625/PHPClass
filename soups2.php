<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>No Soup for You!</title>
</head>
<body>
	<h1>Mmm...soups</h1>
	<?php //Script 7.1 - soups2.php
	/* This script makes and prints arrays */
	
	// Space for error management
	
	// create array
	$soups = [
	'Monday' => 'Clam Chowder',
	'Tuesday' => 'White Chicken Chili',
	'Wednesday' => 'Vegetarian',
	'Thursday' => 'Wedding Ball',
	];
		// count and print
	$count1 = count($soups);
	print "<p>The soups array originally had $count1 elements.</p>";
	
	// add next days
	$soups['Friday'] = 'Chef Boyardee';
	$soups['Saturday'] = 'Minestrone';
	$soups['Sunday'] = 'Tomato';
	
	// count and print again
	$count2 = count($soups);
	print "<p>After adding 3 more soups, the array now has $count2 elements.</p>";
	
	// print contents of array
	print_r($soups);
	
?>

</body>
</html>