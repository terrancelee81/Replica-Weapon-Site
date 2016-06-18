
<!DOCTYPE html>
<html>
<head>
	<title>Fallout Replicas</title>
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
			<li><a href="logout.php">Logout</a></li>
			<li><a href="help.php">Help</a></li>
		</ul>
	</nav>
</center>	
</header>
<center><h1>Fallout</h1></center>

<p>Please select the Replica you would like</p>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <legend>Fallout Info</legend>
<h2>Fatman </h2>
<img src="../Images/fallout/Fat_Man.png" alt="Fatman" style="width:304px;height:228px;"><br/>

<h2>Tesla_cannon </h2>
<img src="../Images/fallout/Tesla_cannon.png" alt="Tesla_cannon" style="width:304px;height:228px;"><br/>

<h2>Tribeam </h2>
<img src="../Images/fallout/tribeam.jpg" alt="Tribeam" style="width:304px;height:228px;"><br/>
</fieldset>
   
  </form>
  
<?php
	session_start();
	$_SESSION['cart']=array();
	
	
	$items = array();
	array_push($items, 'Fatman', 'Tesla_Cannon', 'Tribeam');
?>

	
	
<?php
	echo "<p>";
	while (list ($key, $val) = each ($_SESSION['cart'])) { 
		echo "$key - $val <br>"; 
	}
	echo"<h1> Select Items to Add</h1>";
	echo "<form method='get' action='checkout.php'>";
	while (list ($key, $val) = each ($items)) { 
		echo " <input type=checkbox name='chkItem[]' value='$val'>", $val ,"<br>"; 
	}
	echo "<input type=submit value='Add Items'></form>";
?>

	
						
</body>
</html>