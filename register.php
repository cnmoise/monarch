<?php

//generates page dynamically
$page_title = 'Register';
include ('includes/header.php');

//SUBMISSION CONDITIONAL
if($_SERVER['REQUEST_METHOD'] == 'POST'){

	//errors array, every time user forgets something
	$errors = array();

	require('mysqli_connect.php'); // Connect to the db.
	//defines dbc variable, see respective file

	if (empty($_POST['firstName'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['firstName']));
	}
	// Check for a last name:
	if (empty($_POST['lastName'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['lastName']));
	}
	if (empty($_POST['username'])) {
		$errors[] = 'You forgot to enter your username.';
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['username']));
	}
	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	// Check for a password and match against the confirmed password:
	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$errors[] = 'Your password did not match the confirmed password.';
		} else {
			$p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}


	//no dumb user errors
	if(empty($errors)){
		//register user in DB

		require('mysqli_connect.php');
		//abreviated data collected from the above fields
		$q = "INSERT INTO users (username, firstName, lastName, email, password, registration_date) VALUES ('$u', '$fn', '$ln', '$e', SHA1('$p'), NOW())";
		$res = @mysqli_query($dbc, $q);

		if($res){

			echo '<div class="container"><div class="jumbotron"><div class="center"><h1>You have registered succesfully</h1></div></div></div>';
		} else {
			echo '<h1>System Error</h1>;
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
		}

	//}

	mysqli_close($dbc); // Close the database connection.
	// Include the footer and quit the script:
	include('includes/footer.html');
	exit();
} else { // errors are reported in the body
		// echo '<h1>Error!</h1>
		// <p class="error">The following error(s) occurred:<br>';
		// foreach ($errors as $msg) { // Print each error.
		// 	echo " - $msg<br>\n";
		// }
		// echo '</p><p>Please try again.</p><p><br></p>';
	} // End of if (empty($errors)) IF.
	mysqli_close($dbc); // Close the database connection.
} // End of the main Submit conditional.
?>


<div class="container">
	<div class="row marketing">
        <div class="col-lg-6">
          <h1>Register</h1>
          <!--  
			carries over data from one login attempt to the next (sticky)
			if (isset($_POST['firstName'])) echo $_POST['firstName'];  -->
		<form action="register.php" method="post">
			<input type="text" aria-label="username" name="username" class="form-control" placeholder="Username" maxlength="20" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>">
			<div class="input-group">
				<input type="text" aria-label="firstName" name="firstName" class="form-control" placeholder="First Name" maxlength="20" value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>">
				<input type="text" aria-label="lastName" name="lastName" class="form-control" placeholder="Last Name" maxlength="20" value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>">
			</div>
			<div class="input-group">
				<input type="text" aria-label="email" name="email" class="form-control" placeholder="Email Address" maxlength="20" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
			</div>
			<div class="input-group">
				<input type="password" aria-label="password" name="pass1" class="form-control" placeholder="Password" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>">
				<input type="password" aria-label="password" name="pass2" class="form-control" placeholder="Confirm Password" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
			</div>
			<!-- <p>First Name: <input type="text" name="firstName" size="15" maxlength="20" value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>"></p> -->
			<!-- <p>Last Name: <input type="text" name="lastName" size="15" maxlength="40" value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>"></p> -->
			<!-- <p>Username: <input type="text" name="username" size="15" maxlength="40" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"></p> -->
			<!-- <p>Email Address: <input type="email" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" > </p> -->
			<!-- <p>Password: <input type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" ></p>
			<p>Confirm Password: <input type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" ></p> -->
			<p><input type="submit" name="submit" class="button primary-btn" value="Register"></p>
		</form>
        </div>

        <div class="col-lg-6">
          <?php
          	if(empty($errors) == false){
          		echo '<h1>Error!</h1>
				<p class="error">The following error(s) occurred:<br>';
				foreach ($errors as $msg) { // Print each error.
					echo " - $msg<br>\n";
				}
				echo '</p><p>Please try again.</p><p><br></p>';
          	}
          ?>
        </div>

	</div>
</div>

<?php include('includes/footer.html'); ?>