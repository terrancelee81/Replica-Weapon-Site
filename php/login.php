<!DOCTYPE html>
<html>
<head>
	<title>Terrance Replicas</title>
	<link rel="stylesheet" href="../css/project.css" />
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
			<li><a href="logout.php">Logout</a></li>
			<li><a href="help.php">Help</a></li>
		</ul>
	</nav>
	</center>
</header>
			<center><h1>Login</h1></center>
			<center><h2>If no Login go to Create Account</h2></center>
		</body>
</html>

<?php
	session_start();
	include 'connectvars.php';
 
	if ((isset($_POST['userName'])) && (isset($_POST['password'])) ){
		$userName = $_POST['userName'];
		$password = $_POST['password'];
	
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$dbc) {
			die('Could not connect: ');
		}
	
		$query = "SELECT * FROM Project_User WHERE userName='$userName' and password='$password'";
		$result = mysqli_query($dbc, $query);
	
		if (mysqli_num_rows($result) == 1) {
	
			// The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
			  $row = mysqli_fetch_array($result);
			  $_SESSION['firstName'] = $row['firstName'];
			  $_SESSION['valid_user'] = $row['userName'];
			}
		else {
          // The username/password are incorrect so set an error message
			echo "Sorry, you must enter a valid username and password to log in.";
		}
		mysqli_free_result($result);
		mysqli_close($dbc);
	}  
?>
<?php

	if (isset($_SESSION['valid_user'])) {
		echo " <h3> You are logged in as </h3><p> User: ".$_SESSION['valid_user']; 
		echo " <p> First Name: ".$_SESSION['firstName']; 
		//echo "<p> <a href='logout.php'>Log out </a><br />";
	}
	else {
		if (isset($userName)) {
			// user tried but can't log in
			echo "<h2> Could not log you in </h2>";
		} else {
			// user has not tried
			echo " <h2> You need to log in </h2> ";
		}
		// Log in form

		echo " <form method='post' action='login.php' > ";
		echo " User name <input type='text' name='userName'> <br /> ";
		echo "  Password <input type='password' name='password' /> <br />";
		echo '<input type="submit" value="Log In" name="submit" />';
		echo "</form>";
	}	
?>