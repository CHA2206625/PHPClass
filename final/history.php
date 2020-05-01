
<?php // Script history of prey - history.php
	/* this page lists Salingers bibliography */
	
	// set title and include header file
	define('TITLE', 'History of Prey');
	include('templates/header.html');
	
	
					
					$filler = '<div class="welcome"><div class="seethru2 height"><hr/><br>
					<h2>Something about Prey</h2><br>
					<p>Prey is a first-person shooter survival horror video game developed by Human Head Studios, under contract for 3D Realms, and published by 2K Games, while the Xbox 360 version was ported by Venom Games. The game was initially released in North America and Europe on July 11, 2006. Prey uses a heavily modified version of id Tech 4 to use portals and variable gravity to create the environments the player explores.
					<br>
					The game\'s story is focused on Cherokee Domasi "Tommy" Tawodi as he, his girlfriend, and grandfather are abducted aboard an alien spaceship known as The Sphere as it consumes material, both inanimate and living, from Earth in order to sustain itself. Tommy\'s Cherokee heritage allows him to let his spirit roam freely at times and come back to life after dying, which gives Tommy an edge in his battle against the Sphere.
					<br>
					Prey had been in development in one form or another since 1995, and has had several major revisions. While the general approach to gameplay, including the use of portals, remained in the game, the story and setting changed several times. The game received generally positive reviews and was a commercial success, selling more than one million copies in the first two months of its release and leading to the abortive development of a sequel.
					<br>
					Since then, the rights to Prey passed on to Bethesda Softworks, an American video game company known for their Elder Scrolls series. They released a reboot of the game in 2017. Arkane Studios, developers of the Dishonored video game franchise, and subsidiary of Bethesda, developed the reboot. </p><br>
					<h3>-Source Wikipedia</h3>';
						$content = strlen($filler);
						$lower = strtolower($filler);
						print $lower;
						/* String concatnation */
						print '<p class="green">The above string is ' . $content . ' characters long AND is now lowercase!</p>';
						/* SUBSTRINGS! */
						$subs = substr($filler, 70, 15);
						print "<p class='green'>The first two words of the h2 tags are: $subs!</p>";
						

?>

	
	
	</div></div>
<?php include('templates/footer.html');
?>
