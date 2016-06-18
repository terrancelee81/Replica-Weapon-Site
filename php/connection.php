<?php
	session_start();
	include'../php/connectvars.php';
	
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$dbc) {
		die('Could not connect: ');
	}
	
	mysql_close($dbc);
	
?>