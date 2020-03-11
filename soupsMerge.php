<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>No Soup for You!</title>
</head>
<body>
	<h1>Mmm...soups</h1>
	<?php //Script 7.1 - soupsMerge.php
	/* This script makes and prints arrays */
	
	// Space for error management
	
	// create array
	$list = [
	'0' => 'apples',
	'1' => 'bananas',
	'2' => 'oranges',
	'3' => 'pears',
	];
	
	// REMOVE ITEM
	unset($list['3']);
	print_r($list);

	$orange[] = 'grapes';
	$orange[] = 'tomatoes';
	print_r($orange);
	
	// MERGE ARRAYS
	$apple = array_merge($list, $orange);
	
	// print contents of array
	print_r($apple);
	
?>

</body>
</html>