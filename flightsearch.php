<?php # Script 3.7 - index.php #2
// This function outputs theoretical HTML
// for adding ads to a Web page.
function create_ad() {
  echo '<div class="alert alert-info" role="alert"><p>This is an annoying ad! This is an annoying ad! This is an annoying ad! This is an annoying ad!</p></div>';
} // End of the function definition.
$page_title = 'Monarch Homepage';
include('includes/header.html');
?>
	<div class="container">
		<table class="table table-bordered posts">
		  <thead>
		    <tr>
		    	<th scope="col">Flight ID</th>
		    	<th scope="col">Company</th>
		    	<th scope="col">Departure City</th>
		    	<th scope="col">Arrival City</th>
		    	<th scope="col">Cost</th>
		    	<th scope="col">Departure Date</th>
		    	<th scope="col">Departure Time</th>
		    	<th scope="col">Arrival Date</th>
		    	<th scope="col">Arrival Time</th>
		    	<th scope="col">Book</th>
		    	<th scope="col">Delete</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		    	<td>1</td>
		    	<td>Delta</td>
		    	<td>Chicago</td>
		    	<td>Toronto</td>
		    	<td>$200</td>
		    	<td>11/11/2011</td>
		    	<td>6:11am</td>
		    	<td>11/11/2011</td>
		    	<td>6:11am</td>
		    	<td><form method='get' action='flightentry.php'><input type='submit' value='Book' class='postRedirForm button'></form></td>
		    	<td>BUTTON</td>
		    </tr>
		    <tr>
		    	<td>1</td>
		    	<td>Delta</td>
		    	<td>Chicago</td>
		    	<td>Toronto</td>
		    	<td>$200</td>
		    	<td>11/11/2011</td>
		    	<td>6:11am</td>
		    	<td>11/11/2011</td>
		    	<td>6:11am</td>
		    	<td><form method='get' action='flightentry.php'><input type='submit' value='Book' class='postRedirForm button'></form></td>
		    	<td>BUTTON</td>
		    </tr>
		    <tr>
		    	<td>1</td>
		    	<td>Delta</td>
		    	<td>Chicago</td>
		    	<td>Toronto</td>
		    	<td>$200</td>
		    	<td>11/11/2011</td>
		    	<td>6:11am</td>
		    	<td>11/11/2011</td>
		    	<td>6:11am</td>
		    	<td><form method='get' action='flightentry.php'><input type='submit' value='Book' class='postRedirForm button'></form></td>
		    	<td>BUTTON</td>
		    </tr>
		  </tbody>
		</table>


	<!-- If logged in -->

	<div class="row marketing">
        <div class="col-lg-6">
          <h4>Create New Post</h4>
          
        	<div class="input-group">
			  <textarea class="form-control" aria-label="content" placeholder="Please title your post..."></textarea>
			</div>
        	<div class="input-group">
			  <textarea class="form-control" aria-label="content" placeholder="Write a funny or insighrful story from your travels..."></textarea>
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</div>

	</div>

	

<?php
include('includes/footer.html');
?>