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
<center><h1>Create Account</h1></center>
<?php

 include('connection.php');
  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

 if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $userName = mysqli_real_escape_string($dbc, trim($_POST['userName']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $firstName = mysqli_real_escape_string($dbc, trim($_POST['firstName']));	
	$lastName = mysqli_real_escape_string($dbc, trim($_POST['lastName']));
    $favoriteColor = mysqli_real_escape_string($dbc, trim($_POST['favoriteColor']));	

    if (!empty($userName) && !empty($password1)) {
      // Make sure someone isn't already registered using this username
      $query = "SELECT * FROM Project_User WHERE userName = '$userName'";
      $data = mysqli_query($dbc, $query);
      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO Project_User (userName, password, firstName, lastName, favoriteColor) VALUES ('$userName', '$password1', '$firstName', '$lastName', '$favoriteColor')";
        mysqli_query($dbc, $query);

        // Confirm success with the user
        echo '<p>Your new account has been successfully created. You\'re now ready to log in.</p>';

        mysqli_close($dbc);
        exit();
      }
      else {
        // An account already exists for this username, so display an error message
        echo '<p class="error">An account already exists for this username. Please use a different address.</p>';
        $username = "";
      }
    }
    else {
      echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
    }
	
 }
  mysqli_close($dbc);
?>

  <p>Please enter your username and desired password to sign up for an account.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <legend>Registration Info</legend>
      <label for="username">Username:</label>
      <input type="text" id="userName" name="userName" value="<?php if (!empty($userName)) echo $userName; ?>" /><br />
      <label for="password1">Password:</label>
      <input type="password" id="password1" name="password1" /><br />
      <label for="firstname">First name:</label>
      <input type="text" id="firstName" name="firstName" /><br /> 
		<label for="lastname">Last name:</label>
      <input type="text" id="lastName" name="lastName" /><br />
		<label for="favoriteColor">Favorite Color:</label>
      <input type="text" id="favoriteColor" name="favoriteColor" /><br />   
    </fieldset>
    <input type="submit" value="Sign Up" name="submit" />
  </form>
</body> 
</html>					
