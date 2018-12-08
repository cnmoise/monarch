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
		<table class="table table-bordered posts">
		  <thead>
		    <tr>
		    	<th scope="col">Post ID</th>
		    	<th scope="col">Post Title</th>
		    	<th scope="col">Username</th>
		    	<th scope="col">Date Posted</th>
		    	<th scope="col">View Post</th>
		    	<th scope="col">Delete</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		    	<td>1</td>
		      <td>Amsterdam is dope</td>
		      <td>BigGoomba</td>
		      <td>10/10/2018</td>
		      <td><form method='get' action='forumpost.php'><input type='submit' value='Show Post' class='postRedirForm button'></form></td>
		      <!-- <td><? $_SESSION['id']="
            +allParties[i].partyID
            +"; $_GET['partyName']="
            +allParties[i].partyName
            +"?><form method='get' action='characters.php'><input name='id' type='hidden' value='"
            +allParties[i].partyID
            +"'><input type='submit' value='Show Post' class='charRedirForm button'></form>
        		</td> -->
		    </tr>
		    <tr>
		    	<td>2</td>
		      <td>Italy</td>
		      <td>AdamTaurus</td>
		      <td>12/01/2018</td>
		      <td><form method='get' action='forumpost.php'><input type='submit' value='Show Post' class='postRedirForm button'></form></td>
		    </tr>
		    <tr>
		    	<td>3</td>
		      <td>Got pickpocketed in Barcelona!</td>
		      <td>RubyRose</td>
		      <td>12/06/2018</td>
		      <td><form method='get' action='forumpost.php'><input type='submit' value='Show Post' class='postRedirForm button'></form></td>
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