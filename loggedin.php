<?php
	session_start();

	//boots the user if they try and access this page without being logged in
	if(!isset($_SESSION['userID'])){
		require ('includes/login_functions.inc.php');
		redirect_user();
	}

	//set page title and display to the user they are logged in accross the site?

	$page_title = 'Logged In!';
	include ('includes/header.php');

	echo '<div class= "container">';
	if($_SESSION['isAdmin'] == 1){
		echo'<h1>WELCOME ADMIN</h1>';
	}
	echo "<h1>Logged In!</h1>
	<p>Welcome Back, {$_SESSION['firstName']}</p>";
	echo '</div>';

	include ('includes/footer.html');
?>