<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>increment</title>
	<style type="text/css"> 
		.number {font-weight:bold;}
	</style>
</head>

<body>

<?php

// increment to 2
$test = 1;
$test++;
$result1 = $test;

// decrement to 0
$test--;
$test--;
$result2 = $test;

// print results

print "<p>Result of first increment: '$result1'<br>Result of first decrecrement: '$result2'</p>";

?>
</body>
</html>