<?php
//this page defines the login/logout process
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

function redirect_user ($page = 'index.php'){
	$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);

	//removes any ending slasshes
	$url = rtrim($url, '/\\');

	//concat the page
	$url .= '/'.$page;

	header("Location: $url");
	exit();
}

//validate form data and check that its in the DB
function check_login($dbc, $username = '', $password = '', $isAdmin = ''){
	$errors = array();

	//validate username
	if(empty($username)){
		$errors[] = 'You forgot to enter your username';
	} else {
		$u = mysqli_real_escape_string($dbc, trim($username));
	}

	if(empty($password)){
		$errors[] = 'You forgot to enter your password';
	} else {
		$p = mysqli_real_escape_string($dbc, trim($password));
	}

	$isAdmin = 0;

	//no dumb user errors
	if(empty($errors)){
		//get username/password from the server
		$q = "SELECT userID, firstName, isAdmin FROM users WHERE username='$u' AND password=SHA1('$p')";
		$r = @mysqli_query ($dbc, $q); 

		if(mysqli_num_rows($r) == 1){
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			return array(true, $row);
		} else {
			$errors[] = 'The username and passwords entered do not match our records';
		}

	}//end empty($errors)

	return array(false, $errors);
}

//end tag omitted for reasons