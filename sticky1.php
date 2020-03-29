<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sticky Text Inputs</title>
</head>
<body>
<?php // Script10.2 - sticky.php
/*defines and calls a function that creates sticky text input */

// This function allows 2 arguments to be passed
function make_text_input($name, $label) {
	// begin paragraph and label
	print '<p><label>' .$label.' : ';
	
	//begin the input:
	print'<input type="text" name="' . $name . '" size="20" ';
	
	//add value
if (isset($_POST[$name])) {
	print ' value="' . htmlspecialchars($_POST[$name]) . '"';
	}
	
	// complete teh input labe and paragraph
	print '></label></p>';
} //end of function

//make form
print '<form action="" method="post">';

// create some inputs
make_text_input('first_name','First Name');
make_text_input('last_name','Last Name');
make_text_input('email','Email Address');

print '<input type="submit" name="submit" value="Register!"></form>';

?>
</body>
</html>
