<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Manipulate Strings</title>
</head>
<body>
<?php 

	$example = 'My favorite Rolling Stones song is Honky Tonk Women';
	
	// creates substring starting with the specified word 'song'.
	echo strchr("$example", "song");
		
	echo "<br>";
	// counts words in string
	echo str_word_count("$example");
	
	echo "<br>";
	
	//find and replace words in string
	echo str_ireplace("Honky Tonk Women","Miss You","$example");
	
	
	
	
?>

</body>
</html>