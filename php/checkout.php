<!DOCTYPE html>
<html>
<head>
	<title>Terrance Replicas</title>
	<link rel="stylesheet" href="../css/project.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#btn1").click(function(){
        $("#test1").text("Thanks for your business");
    });
});
</script>
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

		</ul>
	</nav>
</center>	
</header>
<center><h1>Checkout</h1></center>



<?php

 include('connection.php');
  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

 if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $firstName = mysqli_real_escape_string($dbc, trim($_POST['firstName']));
    $lastName = mysqli_real_escape_string($dbc, trim($_POST['lastName']));
    $address = mysqli_real_escape_string($dbc, trim($_POST['address']));	
	$address2 = mysqli_real_escape_string($dbc, trim($_POST['address2']));
    $homePhone = mysqli_real_escape_string($dbc, trim($_POST['homePhone']));
    $mobilePhone = mysqli_real_escape_string($dbc, trim($_POST['mobilePhone']));
	$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
	
	if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO Profile (firstName, lastName, address, address2, homePhone, mobilePhone, email) VALUES ('$firstName', '$lastName', '$address', '$address2', '$homePhone', '$mobilePhone', '$email')";
        mysqli_query($dbc, $query);
		
		// Confirm success with the user
        echo '<p>You have successfully checkedout a receipt will be emailed to you.</p>';

        mysqli_close($dbc);
        exit();
      }
	  $query = "UPDATE Profile SET lastName='$lastName'";
	  
	  if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
      
    }
    
 
  mysqli_close($dbc);
?>
   

  <p>Please enter your Name, shipping and contact information.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <legend>Checkout Info</legend>
      <label for="firstname">First name:</label>
      <input type="text" id="firstName" name="firstName" /><br />
      <label for="lastname">Last name:</label>
      <input type="text" id="lastName" name="lastName" /><br />
      <label for="address">Address:</label>
      <input type="text" id="address" name="address" /><br /> 
	  <label for="address2">Address2:</label>
      <input type="text" id="address2" name="address2" /><br />
      <label for="homePhone">Home Phone:</label>
      <input type="text" id="homePhone" name="homePhone" /><br />
      <label for="mobilePhone">Mobile Phone:</label>
      <input type="text" id="mobilePhone" name="mobilePhone" /><br /> 
	  <label for="email">Email:</label>
      <input type="text" id="email" name="email" /><br /> 	  
    </fieldset>
    <input type="submit" value="Checkout" name="submit" />
	
  </form>
  
 
  
 <?php
	session_start();
	include 'navCart.php';	
	$chkItem = $_GET['chkItem'];
	if (!empty($_GET['chkItem'])) {

		$num = count($chkItem);
		//echo "You have selected ",$num," items. <br>";
		for ($i = 0; $i < $num; $i++) {
			//echo $chkItem[$i];
			array_push($_SESSION['cart'],$chkItem[$i]);
		}
	}

?>


	
		
	
	
<?php
	echo "<h1> Your Shopping Cart </h1>";

	echo "<h3> Number of Items  = ".sizeof($_SESSION['cart'])." </h3>";
	
	if (sizeof($_SESSION['cart']) < 1) {
		echo"You have nothing in your cart";
	} else {
		while (list ($key, $val) = each ($_SESSION['cart'])) { 
			echo "$key - $val <br>"; 
		 }
	}
?>
<p id="test1">Hope you enjoy your items.</p>
<button id="btn1">Press button</button>
<script>
//multiply to get price
function Multiply (Items, price){
var price = 500;
	return(Items * price);
}
</script>
<script>
function getTotal(){
	// getting totalPrice
	var totalPrice = 500 * Items();
	
	//display the result
document.getElementById('totalPrice').innerHTML=
"Total"+totalPrice;
}
</script>


</body> 
</html>					

