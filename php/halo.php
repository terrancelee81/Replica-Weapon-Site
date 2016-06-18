<!DOCTYPE html>
<html>
<head>
	<title>Halo Replicas</title>
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
<center><h1>Halo Replicas</h1></center>

 
 <p>Please select the Replica you would like</p>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <legend>Halo Info</legend>
<h2>Battlerifle </h2>
<img src="../Images/halo/battlerifle.png" alt="Battlerifle" style="width:304px;height:228px;"><br/>

<h2>Saw </h2>
<img src="../Images/halo/saw.jpg" alt="Saw" style="width:304px;height:228px;"><br/>


<h2>Energy Sword </h2>
<img src="../Images/halo/energy_sword.png" alt="Energy Sword" style="width:304px;height:228px;"><br/>

</fieldset>
    
  </form>
		<?php
	session_start();
	$_SESSION['cart']=array();
	
	
	$items = array();
	array_push($items, 'Battlerifle', 'Saw', 'Energy Sword');
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