<?php 
$page_title = 'Monarch Search Flights';
include('includes/header.php');

require('mysqli_connect.php'); // Connect to the db.

$q = "SELECT flightID, airline, cost, departureCity, arrivalCity, departureDate, arrivalDate, arrivalTime, departureTime FROM flights ORDER BY flightID ASC";

$r = @mysqli_query($dbc, $q);
if (!$r) {
	echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
}

$num = mysqli_num_rows($r);
$isAdmin = false;
?>
	<div class="container">
		<?php
		if(isset($_SESSION['isAdmin'])){
			if($_SESSION['isAdmin'] == 1){
				echo'<h1>WELCOME ADMIN</h1>';
				$isAdmin = true;
			}
		}

		if($num > 0){
		//Create a stupid header
		echo '<table class = "table table-bordered posts">
		<thead>
		<tr>
			<th scope="col">Flight ID</th>
	    	<th scope="col">Airline</th>
	    	<th scope="col">Cost</th>
	    	<th scope="col">Departure City</th>
	    	<th scope="col">Arrival City</th>
	    	<th scope="col">Departure Date</th>
	    	<th scope="col">Departure Time</th>
	    	<th scope="col">Arrival Date</th>
	    	<th scope="col">Arrival Time</th>
	    	<th scope="col">Book</th>';
		if($isAdmin){
			echo'<th scope="col">Delete</th>';
		}

		echo'</tr>
		</thead>
		<tbody>
		';
		

			//creates a table based on the data
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			echo
			'<tr>
				<td>' . $row['flightID'] . '</td>
				<td>' . $row['airline'] . '</td>
				<td> $' . $row['cost']. '</td>
				<td>' . $row['departureCity'] . '</td>
				<td>' . $row['arrivalCity'] . '</td>
				<td>' . $row['departureDate'] . '</td>
				<td>' . $row['departureTime'] . '</td>
				<td>' . $row['arrivalDate']. '</td>
				<td>' . $row['arrivalTime'] . '</td>
				<td><form method="post" action="flightentry.php"><input name="flightID" value="'. $row['flightID'] .'" type="hidden"><input type="submit" name="submit" value="Book" class="button"></form>
				</td>';
				if($isAdmin){
					echo'<td align="center">
				 	<input type="submit" id="del_'.$row['flightID'].'"; class="btn btn-danger deleteBtn" value="Delete">
				 	</td>';
				}

		echo'</tr>';

		// if($_SESSION['isAdmin'] == 1){
			// 	echo'
			// 	<td align="left">
			// 	<input type="submit" id="del_'.$pID.'"; class="btn btn-danger deleteBtn" value="Delete">
			// 	</td>';
			// }
	}
		echo '</tbody></table>'; // Close the table.
		mysqli_free_result ($r); // Free up the resources.
	} else { // If no records were returned.
		echo '<p class="error">There are currently no posts to display.</p>';
	}

	//If logged in, allow user to make a post
	if($isAdmin){
		?>
			<style type="text/css">#newFlightEntryForm{
				display:block;
			}</style>
		<?php
	} else{
	?>
		<style type="text/css">#newFlightEntryForm{
				display:none;
			}</style>
	<?php
	}		

	?>
	<!-- If logged in -->

	<div class="row marketing">
        <div class="col-lg-6" id="newFlightEntryForm">
          <h4>Create New Flight Entry</h4>
	      <form action="add_new_flight_entry.php" method="post">
			<div class="input-group">
				<input type="text" aria-label="airline" class="form-control" placeholder="Airline" name="airline" value="<?php if (isset($_POST['airline'])) echo $_POST['airline']; ?>">
				<input type="text" aria-label="cost" class="form-control" placeholder="Cost" name="cost" value="<?php if (isset($_POST['cost'])) echo $_POST['cost']; ?>">
			</div>

			<div class="input-group">
				<input type="text" aria-label="departure_city" class="form-control" placeholder="Departure City" name="departureCity" value="<?php if (isset($_POST['departureCity'])) echo $_POST['departureCity']; ?>">
				<input type="text" aria-label="arrival_city" class="form-control" placeholder="Arrival City" name="arrivalCity" value="<?php if (isset($_POST['arrivalCity'])) echo $_POST['arrivalCity']; ?>">
			</div>

        	<div class="input-group">
				<div class="input-group-prepend">
				    <span class="input-group-text">Departure/Arrival Date</span>
				</div>
				<input type="text" aria-label="departure_date" class="form-control" placeholder="mm-dd-yyyy" name="departureDate" value="<?php if (isset($_POST['departureDate'])) echo $_POST['departureDate']; ?>">
				<input type="text" aria-label="arrival_date" class="form-control" placeholder="mm-dd-yyyy" name="arrivalDate" value="<?php if (isset($_POST['arrivalDate'])) echo $_POST['arrivalDate']; ?>">
			</div>
          
        	<div class="input-group">
				<div class="input-group-prepend">
				    <span class="input-group-text">Departure/Arrival Time</span>
				</div>
				<input type="text" aria-label="departure_time" class="form-control" placeholder="hh:mm:ss" name="departureTime" value="<?php if (isset($_POST['departureTime'])) echo $_POST['departureTime']; ?>">
				<input type="text" aria-label="arrival_time" class="form-control" placeholder="hh:mm:ss" name="arrivalTime" value="<?php if (isset($_POST['arrivalTime'])) echo $_POST['arrivalTime']; ?>">
			</div>

			<input type="submit" name="submit" class="button primary-btn" value="Create New Entry">
		</form>



        </div>
	</div>

	</div>

	
	<script type="text/javascript">
		//Jquery function
		$(document).ready(function(){
			$('input.deleteBtn').click(function(){
				var el = this;
				var flightID = this.id;
				var splitid = flightID.split("_");

				// Delete id
				var deleteid = splitid[1];

				//AJAX request
				console.log("deleteid"+deleteid);

				$.ajax({
					url: 'removeflight.php',
					type: 'POST',
					data: { flightID:deleteid },
					success: function(response){
						alert(response);
						// $(el).closest('tr').css('background','tomato');
						// $(el).closest('tr').fadeOut(800,function(){
						// 	$(this).remove();
						// }
					}//success
				});
			});
		});
	</script>

<?php
include('includes/footer.html');
?>