<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$page_title = 'Monarch';

include('includes/header.php');
require('mysqli_connect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//errors array, every time user forgets something
	$errors = array();
	


	$pID = $_POST['postID'];

	$q = "SELECT userID, forumPostTitle, postContent, DATE_FORMAT(dateTimePosted, '%M %d %Y') AS dtp FROM posts WHERE postID ='$pID'";

	$r = @mysqli_query($dbc, $q);

if (!$r) {
	echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
}

	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		$posterUserID = $row['userID'];
		$postTitle = $row['forumPostTitle'];
		$postContent = $row['postContent'];
		$dateTimePosted = $row['dtp'];
	}
	mysqli_free_result ($r); // Free up the resources.
}
mysqli_close($dbc); // Close the database connection.

//if the user viewing the post is the same one who originally posted it
if(isset($_SESSION['userID']) && $posterUserID == $_SESSION['userID']){
		?>
			<style type="text/css">#editPost{
				display:block;
			}</style>
		<?php
	} else{
	?>
		<style type="text/css">#editPost{
				display:none;
			}</style>
	<?php
	}

?>
	<div class="container">

		<div class="jumbotron">
			<?php
			echo '<h1>'.$postTitle.'</h1>';
			echo '<p>'.$postContent.'</p>';
			echo '<p>Posted on: '.$dateTimePosted.'</p>';
			// <h4>Post Created by: Username</h4>
			?>

		</div>

		<!-- If username == username post was posted under -->

		<div class="row marketing">
        <div class="col-lg-6" id="editPost">
          <h4>Edit Post</h4>
          
        	<div class="input-group">
			  <textarea class="form-control" aria-label="content" placeholder="Post Title preloads"></textarea>
			</div>
        	<div class="input-group">
			  <textarea class="form-control" aria-label="content" placeholder="Post Content preloads"></textarea>
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
			<?php echo'
			
				<input type="submit" id="del_'.$pID.'"; class="btn btn-danger deleteBtn" value="Delete">';
			?>
			<!-- DELETE FROM posts WHERE postID="+this.id+";" -->
        </div>
	</div>
	</div>

	<script type="text/javascript">
		//Jquery function
		$(document).ready(function(){
			$('input.deleteBtn').click(function(){
				var el = this;
				var postID = this.id;
				var splitid = postID.split("_");

				// Delete id
				var deleteid = splitid[1];

				//AJAX request
				console.log("deleteid"+deleteid);

				$.ajax({
					url: 'removepost.php',
					type: 'POST',
					data: { postID:deleteid },
					success: function(response){
						alert(response);
					}
				});
			});
		});
	</script>

<?php
include('includes/footer.html');
?>