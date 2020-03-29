<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sticky Text Inputs</title>
</head>
<body>
<?php // Script10.3 - sticky2.php
/*defines and calls a function that creates sticky text input */

// This function allows 2 arguments to be passed
// add third arguement that is optional b/c it has a default value
function make_text_input($name, $label,$size = 20) {
	// begin paragraph and label
	print '<p><label>' .$label.' : ';
	
	//begin the input:
	print'<input type="text" name="' . $name . '" size="'.$size.'" ';
	
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
make_text_input('last_name','Last Name', 30);
make_text_input('email','Email Address', 50);

print '<input type="submit" name="submit" value="Register!"></form>';

?>
</body>
</html>
