<?php # Script 3.7 - index.php #2
// This function outputs theoretical HTML
// for adding ads to a Web page.
function create_ad() {
  echo '<div class="alert alert-info" role="alert"><p>This is an annoying ad! This is an annoying ad! This is an annoying ad! This is an annoying ad!</p></div>';
} // End of the function definition.
$page_title = 'Monarch Homepage';
include('includes/header.php');
?>
	<div class="container">
		<div class="row marketing">
	        <div class="col-lg-4">
	          <h4>Your Flight Info</h4>
	          <table class="table table-bordered flightinfo">
				  <tbody>
				  	<tr>
					    <td>FlightID</td>
					    <td>XYZ123</td>
				    </tr>
				    <tr>
					    <td>Airline</td>
					    <td>SPOOFAIR</td>
				    </tr>
					<tr>
					    <td>Departure City</td>
					    <td>ATLANTIS</td>
				    </tr>
				    <tr>
					    <td>Arrival City</td>
					    <td>GONDOLIN</td>
				    </tr>
				    <tr>
					    <td>Departure Date</td>
					    <td>11/11/2011</td>
				    </tr>
				    <tr>
					    <td>Departure Time</td>
					    <td>HH:MM:SS</td>
				    </tr>
				    <tr>
					    <td>Arrival Date</td>
					    <td>11/11/2011</td>
				    </tr>
				    <tr>
					    <td>Arrival Time</td>
					    <td>HH:MM:SS</td>
				    </tr>
				  </tbody>
				</table>
		</div>

		<div class="col-lg-8">
	          <h4>Personal Info</h4>

	        	<div class="input-group">
	        		<div class="input-group-prepend">
				    	<span class="input-group-text">Card Holder:</span>
					</div>
					<input type="text" aria-label="card_holder_fname" class="form-control" placeholder="First Name">
					<input type="text" aria-label="card_holder_lname" class="form-control" placeholder="Last Name">
				</div>
				<div class="input-group">
					<input type="text" aria-label="creditcard_number" class="form-control" placeholder="Creditcard Number">
				</div>
				<div class="input-group">
					<div class="input-group-prepend">
				    	<span class="input-group-text">Expiration Month/Year</span>
					</div>
					<input type="text" aria-label="expiration" class="form-control" placeholder="mm/yy">
					<input type="text" aria-label="security_code" class="form-control" placeholder="Security Code">
				</div>
				<div class="input-group">
					<input type="text" aria-label="country" class="form-control" placeholder="Country">
					<input type="text" aria-label="city" class="form-control" placeholder="City">
					<input type="text" aria-label="region" class="form-control" placeholder="State/Region">
					<input type="text" aria-label="region" class="form-control" placeholder="ZIP/Postal Code">
				</div>
	          	<div class="input-group">
	          		<div class="input-group-prepend">
				    	<span class="input-group-text">Phone Number:</span>
					</div>
					<input type="text" aria-label="phone" class="form-control" placeholder="9999999999">
				</div>
	        	

				<button type="submit" class="btn btn-primary">Purchase (Disabled)</button>
	        </div>
	</div>

	

<?php
include('includes/footer.html');
?>