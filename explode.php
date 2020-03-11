<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>My Largest Ever Gradebook</title>
</head>
<body>

<?php //Script 7.5 - sort.php
		/* This is to practice multi-dimensional arrays */
		
		
		//Create first array
	$grades = [
		'Richard' => 95,
		'Hanz' => 82,
		'Chad' => 98,
		'Franz' => 87,
		'Melissa' => 75,
		'Roddy' => 85,
	];
	
	$strings = implode(',',$grades);
	
	print($strings);
	
	$stringy = explode(',',$strings);
	
	print_r($stringy);
	
	
?>
</body>
</html>