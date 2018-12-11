<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// This file creates an insert into statement and is the main way we get new data into the database
// An alternative would be to create json data files

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	//errors array, every time user forgets something
	$errors = array();

	require('mysqli_connect.php');

	if (empty($_SESSION['userID'])) {
		$errors[] = 'You are not logged in and should not have been able to make this request.';
	} else {
		$u = mysqli_real_escape_string($dbc, trim($_SESSION['userID']));
	}
	if (empty($_POST['blogPostTitle'])) {
		$errors[] = 'You forgot to enter the title of your post.';
	} else {
		$bpt = mysqli_real_escape_string($dbc, trim($_POST['blogPostTitle']));
	}
	if (empty($_POST['blogPostContent'])) {
		$errors[] = 'You forgot to enter the body of your post.';
	} else {
		$bpc = mysqli_real_escape_string($dbc, trim($_POST['blogPostContent']));
	}

	//abreviated data collected from the above fields
	$q = "INSERT INTO blogposts (userID, blogPostTitle, blogPostContent, dateTimePosted) VALUES ('$u', '$bpt', '$bpc', NOW())";
	$res = @mysqli_query($dbc, $q);

	if($res){

			echo '<div class="container"><div class="jumbotron"><div class="center"><h1>You have just created a new post!</h1></div></div></div>';
		} else {
			echo '<h1>System Error</h1>;
			<p class="error">Your post could not be made due to a system error. We apologize for any inconvenience.</p>';
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
		}
}



?>