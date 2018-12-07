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