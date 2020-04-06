<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<style type="text/css" media="screen"> h1, p {font-family:sans-serif;}
	.error {color:red;} </style>
</head>
<body>
<h1>new file</h1>
<?php 
$dir = '../newFiles/';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // HANDLE THE FORM
	$problem = FALSE; // no problems so far.
	
		// check for each value
		if (empty($_POST['filename'])) {
			$problem = TRUE;
			print '<p class="error">Please enter a filename!</p>';
		}
	
	if (!$problem) { // for no problems
				 		 
				 //create the directory
				 mkdir ($dir . $_POST['filename']);
	}
}
?>
<form action="make_dir.php" method="post">
<p>Filename: <input type="text" name="filename" size="20"></p>
<p><input type="submit" name="submit" value="Register"></p>
</form>




</body>
</html>
