<?php // script 13.2 - functions.php
/* this page defines custom function */

// this function checks if user is administrator
// this function takes two optional values
// this function returns a boolean values
function is_administrator($name = 'Samuel', $value = 'Clemens') {
	//check for cookie and its value
	if (isset($_COOKIE[$name]) && ($_COOKIE[$name] == $value)) {
		return true;
	} else {
		return false;
	}
	
} // end of admin function