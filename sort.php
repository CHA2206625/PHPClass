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
	
	//print original array:
	print '<p>Originally the array lookie like this: <br>';
	foreach ($grades as $student => $grade)
	{
		print "$student: $grade<br>\n";
	}
	print '</p>';
	
	// sort by value in reverse order then print again!
	arsort($grades);
	print '<p>After sorting the array by value using arsort(), the array looks like this: <br>';
	foreach ($grades as $student => $grade)
	{
		print"$student: $grade<br>\n";
	}
	print '</p>';
	
	//sort by key then print yet again
	ksort($grades);
	print '<p>After sorting the array by key using ksort(), the array looks like this: <br>';
	foreach ($grades as $student => $grade)
	{
		print"$student: $grade<br>\n";
	}
	print '</p>';
	
?>
</body>
</html>