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
		<div class="jumbotron" style="padding-right: 0px;padding-left: 0px;">
<!-- 				<img src="gmcimages/place.jpg" id="banner" style="border-radius:20px;border:10px solid #021a40;">
 -->			<div class="center">
					<h1 class="display-3">Search Flight</h1>
					<form>
					  <div class="input-group">
						  <div class="input-group-prepend">
						    <span class="input-group-text">Flight Info</span>
						  </div>
						  <input type="text" aria-label="departure" class="form-control" placeholder="Departure City">
						  <input type="text" aria-label="arrival" class="form-control" placeholder="Arrival City">
						  <input type="text" aria-label="date" class="form-control" placeholder="10/10/2018">
						</div>
					  <button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
		  </div>

      <div class="row marketing">
        <div class="col-lg-6">
          <h4>About Us:</h4>
          <p>
          	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tincidunt commodo sodales. Sed lobortis tortor ut nunc ornare, in vehicula augue volutpat. Vestibulum viverra justo eget turpis molestie ornare. Donec at finibus ligula, vitae viverra urna. Aenean id nulla est. Suspendisse dictum, ligula sit amet ultricies ullamcorper, lacus magna scelerisque tortor, in feugiat dolor massa sit amet lacus. Donec nisl nunc, aliquam in quam nec, malesuada efficitur nulla. Cras et lorem a quam tempus sodales. Phasellus porta tortor sit amet metus posuere dapibus. Proin varius arcu at quam dapibus, nec scelerisque arcu accumsan.
          </p>
        </div>

        <div class="col-lg-6">
          <h4>Feature 1</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>Feature 2</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>Feature 3</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>

	</div>

<?php
include('includes/footer.html');
?>