<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Date Menus</title>
</head>
<body>
<?php //Script 10.1 - Menus.php?
	/* This script defines and calls a function */
	
// function makes three pull down menus for months days and years
function make_date_menus(){
	// array to store months
	$months = [1 => 'Janunary','February', 'March','April','May', 'June', 'July', 'August','September', 'October','November', 'December'];
	
	// month pull down menus
	print '<select name="month">';
	foreach ($months as $key => $value) {
		print "\n<option value=\"$key\">$value</option>";
	}
	print '</select>';
	
	// make day pull down menus
	print '<select name="day">';
	for ($day = 1; $day <= 31; $day++) {
		print "\n<option value=\"$day\">$day</option>";
	}
	print '</select>';
	
		// make year pull down menus
	print '<select name="year">';
	$start_year = date('Y');
	for ($y = $start_year; $y <= ($start_year + 10); $y++) {
		print "\n<option value=\"$y\">$y</option>";
	}
	print '</select>';
} // END OF MAKE_DATE FUNCTION

// make form
	print '<form action="" menthod="post">';
	make_date_menus();
	print'</form>'
?>
</body>
</html>
