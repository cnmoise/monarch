<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	//errors array, every time user forgets something
	$errors = array();

	require('mysqli_connect.php');

	if (empty($_POST['airline'])) {
		$errors[] = 'You forgot to enter the airline.';
	} else {
		$a = mysqli_real_escape_string($dbc, trim($_POST['airline']));
	}
	if (empty($_POST['cost'])) {
		$errors[] = 'You forgot to enter the cost.';
	} else {
		$c = mysqli_real_escape_string($dbc, trim($_POST['cost']));
	}
	if (empty($_POST['departureCity'])) {
		$errors[] = 'You forgot to enter the departure City.';
	} else {
		$dc = mysqli_real_escape_string($dbc, trim($_POST['departureCity']));
	}
	if (empty($_POST['arrivalCity'])) {
		$errors[] = 'You forgot to enter the arrival City.';
	} else {
		$ac = mysqli_real_escape_string($dbc, trim($_POST['arrivalCity']));
	}
	if (empty($_POST['departureDate'])) {
		$errors[] = 'You forgot to enter the departure date.';
	} else {
		$dd = mysqli_real_escape_string($dbc, trim($_POST['departureDate']));
	}
	if (empty($_POST['departureTime'])) {
		$errors[] = 'You forgot to enter the arrival time.';
	} else {
		$dt = mysqli_real_escape_string($dbc, trim($_POST['departureTime']));
	}
	if (empty($_POST['arrivalDate'])) {
		$errors[] = 'You forgot to enter the arrival date.';
	} else {
		$ad = mysqli_real_escape_string($dbc, trim($_POST['arrivalDate']));
	}
	if (empty($_POST['arrivalTime'])) {
		$errors[] = 'You forgot to enter the arrival time.';
	} else {
		$at = mysqli_real_escape_string($dbc, trim($_POST['arrivalTime']));
	}

	//abreviated data collected from the above fields
	$q = "INSERT INTO flights (airline, cost, departureCity, arrivalCity, departureDate, departureTime, arrivalDate, arrivalTime) VALUES ('$a', '$c', '$dc', '$ac', '$dd', '$dt', '$ad', '$at')";
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