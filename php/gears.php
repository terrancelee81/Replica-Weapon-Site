<!DOCTYPE html>
<html>
<head>
	<title>Gears of War Replicas</title>
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
<center><h1>Gears of War</h1></center>

	
 <p>Please select the Replica you would like</p>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <legend>Gears of War Info</legend>
<h2>Boomshot </h2>
<img src="../Images/gears/boomshot.jpg" alt="Boomshot" style="width:304px;height:228px;"><br/>



<h2>Lancer </h2>
<img src="../Images/gears/lancer.jpg" alt="Lancer" style="width:304px;height:228px;"><br/>


<h2>Longshot </h2>
<img src="../Images/gears/longshot.png" alt="Longshot" style="width:304px;height:228px;"><br/>

</fieldset>
   
  </form>
		<?php
	session_start();
	$_SESSION['cart']=array();
	
	
	$items = array();
	array_push($items, 'Boomshot', 'Lancer', 'Longshot');
?>

<?php
	include 'navCart.php';
?>
<body>
	
	
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