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

		<div class="jumbotron">
			<h1>Post Title</h1>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tincidunt commodo sodales. Sed lobortis tortor ut nunc ornare, in vehicula augue volutpat. Vestibulum viverra justo eget turpis molestie ornare. Donec at finibus ligula, vitae viverra urna. Aenean id nulla est. Suspendisse dictum, ligula sit amet ultricies ullamcorper, lacus magna scelerisque tortor, in feugiat dolor massa sit amet lacus. Donec nisl nunc, aliquam in quam nec, malesuada efficitur nulla. Cras et lorem a quam tempus sodales. Phasellus porta tortor sit amet metus posuere dapibus. Proin varius arcu at quam dapibus, nec scelerisque arcu accumsan.
			</p>
			<h4>Post Created by: Username</h4>

		</div>

		<!-- If username == username post was posted under -->

		<div class="row marketing">
        <div class="col-lg-6">
          <h4>Edit Post</h4>
          
        	<div class="input-group">
			  <textarea class="form-control" aria-label="content" placeholder="Post Title preloads"></textarea>
			</div>
        	<div class="input-group">
			  <textarea class="form-control" aria-label="content" placeholder="Post Content preloads"></textarea>
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
			<button type="delete" class="btn btn-danger">Delete</button>
        </div>
	</div>
	</div>


<?php
include('includes/footer.html');
?>