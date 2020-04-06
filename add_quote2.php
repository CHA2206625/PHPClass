<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add A Quotation</title>
</head>
<body>
<?php // Script 11.2 - add_quote2.php
	/* displays and handles  html form. takes text input and stores it in text file */
	
	// Identify  the file to use:
$file = '../quotes.txt';

	// Check for a form submission:
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// handle the form
		
		if ( !empty($_POST['quote']) && ($_POST['quote'] != 'Enter your quotation here.') ) { // need something to writeable
		
			if (is_writeable($file)) {
				// confirm that the file is writeable
				
				file_put_contents($file, $_POST['quote'] . PHP_EOL, FILE_APPEND | LOCK_EX); // WRITE THE DATA
				//print message
				print '<p>Your quotation has been stored.</p>';
				
			} else { //could not open file
				print '<p style="color: red;">Your quotation could not be stored due to a system error.</p>';
			}
		}else {// failed to enter a quotation
			print '<p style="color: red;">Please enter a quotation!</p>';
		}
	} // end of submitted if statement
	
?>

<form action+"add_quote.php" method="post">
	<textarea name="quote" rows="5" cols="30">Enter your quotation here.</textarea><br><input type="submit" name="submit" value="Add This Quote!">
	</form>
</body>
</html>


