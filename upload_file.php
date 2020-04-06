<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Upload a File</title>
</head>
<body>
<h1>Upload a File</h1>
<?php // Script 11.4 - upload_file.php
	/* displays and handles  html form. takes file upload and stores on server */
	
if ($_SERVER['REQUEST_METHOD'] == 'POST') {//handle form
	// try to move uploaded file
	if (move_uploaded_file ($_FILES['the_file']['tmp_name'], "../uploads/{$_FILES['the_file']['name']}")) {	
		//statement for PROBLEM!
		print '<p>Your file has been uploaded.</p>';
	} else {
		print '<p style="color:red;">Your file could not be uploaded because: ';
		//message based on error
		switch ($_FILES['the_file']['error']) {
			case 1:
				print 'The file exceeds the upload_max_filesize setting in php_ini';
				break;
			case 2:
				print 'The file exceeds the MAX_FILE_SIZE setting in HTML form';
				break;
			case 3:
				print 'The file was only partially uploaded';
				break;
			case 4:
				print 'no file was uploaded';
				break;
			case 6:
				print 'The temporary folder does not exist';
				break;
			default:
				print 'Something happened.';
				break;
		}
		print '.</p>'; //completes paragraph tag
	}//end of move_uploaded_file IF statement
}//end of subission if	
?>
<form action="upload_file.php" enctype="multipart/form-data" method="post">
<p>Upload a file using this form:</p>
<input type="hidden" name="MAX_FILE_SIZE" value="300000">
<p><input type="file" name="the_file" style="background-color:#eeffff"></p>
<p><input type="submit" name="submit" value="Upload This File"></p>
</form>
</body>
</html>


