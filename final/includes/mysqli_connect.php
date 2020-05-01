<?php // 13.1 - mysqli_connect.php
/* this script connects to the database and establishes character set for communications */

//connect:
$dbc = mysqli_connect('localhost', 'root', 'password', 'members');

// set the character set:
mysqli_set_charset($dbc, 'utf8');