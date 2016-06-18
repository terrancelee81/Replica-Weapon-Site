<?php
	session_start();
	include'../php/connectvars.php';
	
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$dbc) {
		die('Could not connect: ');
	}
	
	mysql_close($dbc);
	$old_user = $_SESSION['valid_user'];
	unset($_SESSION['valid_user']);
	session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Terrance Replicas</title>
	<link rel="stylesheet" href="../css/project.css" />
</head>
<body>
<header>
<center>
	<nav>
		<ul>
			<li><a href="mainMenu.php">Main Menu</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="createAccount.php">Create Account</a></li>
			<li><a href="gameMenu.php">Game Menu</a></li>
			<li><a href="checkout.php">Checkout</a></li>
			<li><a href="help.php">Help</a></li>
			
		</ul>
	</nav>
</center>	
</header>
	<article>
	<section>
	<center><h1>Main Menu</h1></center>
	
	<p><center>If you are in the hunt for Replica weapons for top games than you are at the right site.
	Look at games and their replicas!!!</center></p><br/>
		<center><p><li><a href="login.php">Login</a></li></P></center>
		<center><p><li><a href="createAccount.php">Create Account</a></li></P></center>
		<center><p><li><a href="gameMenu.php">Game Menu</a></li></P></center>
		


	<?php
		if (!empty($old_user)) {
			echo 'User: '.$old_user.' is logged out';
		} else {
			echo 'You were not logged in!';
		}
	?>

</body>
</html>

