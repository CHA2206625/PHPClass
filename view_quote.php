<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>View A Quotation</title>
</head>
<body>
<h1>Random Quotation</h1>
<?php // Script 11.3 - view_quote.php
	/* displays and handles  html form. reads in a file and prints a random line from that file */
	
	// read the file's contents into an array:
$data = file('../quotes.txt');

// count number of items in that array(how many lines of quotes)
$n = count($data);

// pick a random  items
$rand = rand(0, ($n - 1));

// print quote
print '<p>' . trim($data[$rand]) . '</p>';
	
?>
</body>
</html>


