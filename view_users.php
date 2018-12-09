<?php
$page_title = 'View the Current Users';
include('includes/header.php');

echo '<h1>Registered Users</h1>';
require('mysqli_connect.php'); // Connect to the db.

//make the query
//AS nicknames column
//date format makes a date
$q = "SELECT CONCAT(lastName, ',', firstName) AS name, DATE_FORMAT(registration_date, '%M %d %Y') AS dr FROM users ORDER BY registration_date ASC";

$r = @mysqli_query($dbc, $q);

// Count the number of returned rows:
$num = mysqli_num_rows($r);

echo '<div class= "container">';

//query returns true if it ran succesfully
if($num > 0){
	// Print how many users there are:

	echo "<p>There are currently $num registered users.</p>\n";

	//Create a stupid header
	echo '<table class = "table table-bordered posts">
	<thead>
	<tr>
		<th align="left">Name</th>
		<th align="left">Date Registered</th>
	</tr>
	</thead>
	<tbody>
	';

				


	//creates a table based on the data
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr><td align="left">' . $row['name'] . '</td><td align="left">' . $row['dr'] . '</td></tr>
		';
	}
	echo '</tbody></table>'; // Close the table.
	mysqli_free_result ($r); // Free up the resources.
} else { // If no records were returned.
	echo '<p class="error">There are currently no registered users.</p>';
}
echo '</div>';//container

				
mysqli_close($dbc); // Close the database connection.
include('includes/footer.html');
?>
