<?php

session_start();

	//boot the user if they are not logged in
	if(!isset($_SESSION['userID'])){

		require ('includes/login_functions.inc.php');
		redirect_user();
	} else { //cancel the session
		$_SESSION = array();
		session_destroy();
		// PHPSESSID is the default value of a session
		setcookie('PHPSESSID', '', time()-3600, '/', '', o, o);//COOKIE DESTROYED
	}

	$page_title = 'Logged Out!';
	include('includes/header.php');

	echo "<h1>Logged Out!</h1>
	<p>You are now logged out!</p>";

	include ('includes/footer.html');
?>