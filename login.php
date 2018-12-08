<?php
	//enables error messages
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		//processing the login
		require('includes/login_functions.inc.php');

		//db connection
		require('mysqli_connect.php');

		list($check, $data) =
		check_login($dbc, $_POST['email'],
			$_POST['password']);

		if ($check){
			session_start();
			//uses session superglobal
			//must be declared before any other data sent to browser
			//we use $_SESSION['userID'] to verify if the user has been logged in
			$_SESSION['userID'] = $data['userID'];
			$_SESSION['firstName'] = $data['firstName'];
			//sends the user to the welcome page
			redirect_user('loggedin.php');
		} else {
			//Assign $data to $errors in login_page.inc.php:
			$errors = $data;
		}

	mysqli_close($dbc);

	}

	include('includes/login_page.inc.php');
?>