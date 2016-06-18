<!DOCTYPE html>
<html>
<head>
	<title>Terrance Replicas</title>
	<link rel="stylesheet" href="../css/project.css" />
</head>
<body>
	
<header>
	<nav>
		<ul>
			<li><a href="mainMenu.php">Main Menu</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="createAccount.php">Create Account</a></li>
			<li><a href="gameMenu.php">Game Menu</a></li>
			<li><a href="checkout.php">Checkout</a></li>
		</ul>
	</nav>
</header>
<center><h1>Receipt</h1></center>
	<button type="button" onClick="addCartHookshot()">Add To Cart</button>
<input id="qntyHookshot" name="qntyHookshot" type="number">
<script>
function addCartHookshot() {
	var quantity = document.getElementById("qntyHookshot").value;
	alert("Hookshot quantity: " + quantity);
	
	/*Create AJAX call to add item to the cart*/
}
</script>
<?php
	session_start();
	$_SESSION['cart']=array();
	
	
	$items = array();
	array_push($items, 'brown shoes', 'white shirt', 'jeans', 'socks', 'blue shirt', 'cargo pants', 'black leggings', 'black skirt');
?>
<!DOCTYPE html>
<html>
<head>
	<title> Session Cart </title>
	<link rel="stylesheet" href="style.css">
</head>
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
	
					
