<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 1);

//generates page dynamically
$page_title = 'Login';
include ('includes/header.php');

	
	if(isset($errors) && !empty($errors)){
		echo '<h1>Error!</h1>
		<p class="error"> The Following errors occurred: <br/>';
		foreach($errors as $msg){
			echo " - $msg<br />\n";
		}
	}
?>


<div class="container">
	<div class="row marketing">
        <div class="col-lg-6">
          <h1>Login</h1>
          <!--  
			carries over data from one login attempt to the next (sticky)
			if (isset($_POST['firstName'])) echo $_POST['firstName'];  -->
		<form action="login.php" method="post">
			<div class="input-group">
				<input type="text" aria-label="username" name="username" class="form-control" placeholder="Username" maxlength="20" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>">
			</div>
			<div class="input-group">
				<input type="password" aria-label="password" name="password" class="form-control" placeholder="Password" maxlength="20" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
			</div>
			<p><input type="submit" name="submit" class="button primary-btn" value="Login"></p>
		</form>
        </div>

        <div class="col-lg-6">
          <!-- <?php
          	if(empty($errors) == false){
          		echo '<h1>Error!</h1>
				<p class="error">The following error(s) occurred:<br>';
				foreach ($errors as $msg) { // Print each error.
					echo " - $msg<br>\n";
				}
				echo '</p><p>Please try again.</p><p><br></p>';
          	}
          ?> -->
        </div>

	</div>
</div>

<?php include('includes/footer.html'); ?>