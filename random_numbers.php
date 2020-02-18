<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Random Numbers</title>
	
</head>

<body>

<?php

echo(rand(1, 100)."<br><br>");


$n1 = rand();
$n2 = rand(1, 10);
$n3 = rand(1, 100);


print "<h1>Let's generate some numbers!</h1><h2>Big Number: $n1</h2><h2>Small Number: $n2</h2><h2>Between 1 - 100: $n3</h2>"



?>
</body>
</html>