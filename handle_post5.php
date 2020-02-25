<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Forum Posting</title>
</head>
<body>
<?php //Script 5.2 - handle_post.php
	/* this script recieves five values from posting.html: first,last,email,posting,submit */
	
	//get values from $_POST array
	
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$posting = nl2br($_POST['posting'],false);
	
	// put name together in variable
	$name = $first_name .' '. $last_name;
	
	// get word count
	$words = str_word_count($posting);
	
	// get snippet of posting:
	$posting = substr($posting, 0, 50);
	

	
	
	//print message
	print"<div>Thank you, $name, for your posting:
	<p>$posting...</p>
	<p>($words words)</p></div>" ;
	
	
	
	
	
	/*
		// take care of html tags that might be in textarea
	$html_post = htmlentities($_POST['posting']);
	$strip_post = strip_tags($_POST['posting']);
	
	
	// make link to a different page
	$name = urlencode($name);
	$email = urlencode($_POST['email']);
	print "<p>Click <a href=\"thanks.php?name=$name&$email=$email\">here</a> to continue.</p>";
	*/
?>

</body>
</html>