<?php 

$page_title = 'Monarch Forum';
include('includes/header.php');

require('mysqli_connect.php'); // Connect to the db.

$q = "SELECT postID, userID, forumPostTitle, DATE_FORMAT(dateTimePosted, '%M %d %Y') AS dtp FROM posts ORDER BY dateTimePosted ASC";

$r = @mysqli_query($dbc, $q);
$num = mysqli_num_rows($r);
$isAdmin = false;

echo '<div class= "container">';

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
		<th align="left">Post ID</th>
		<th align="left">User ID</th>
		<th align="left">Post Title</th>
		<th align="left">Date Posted</th>
		<th align="left">Show Post</th>';
	if($isAdmin){
		echo'<th align="left">Delete Post</th>';
	}

	echo'</tr>
	</thead>
	<tbody>
	';
	

		//creates a table based on the data
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo
		'<tr>
			<td align="left">' . $row['postID'] . '</td>
			<td align="left">' . $row['userID'] . '</td>
			<td align="left">' . $row['forumPostTitle']. '</td>
			<td align="left">' . $row['dtp'] . '</td>
			<td align="center">
			<form method="post" action="forumpost.php"><input name="postID" value="'. $row['postID'] .'" type="hidden"><input type="submit" name="submit" value="Show Post" class="button"></form>
			</td>';
			if($isAdmin){
				echo'<td align="center">
			 	<input type="submit" id="del_'.$row['postID'].'"; class="btn btn-danger deleteBtn" value="Delete">
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


					
	mysqli_close($dbc); // Close the database connection.

	//If logged in, allow user to make a post
	if(isset($_SESSION['userID'])){
		?>
			<style type="text/css">#newPostForm{
				display:block;
			}</style>
		<?php
	} else{
	?>
		<style type="text/css">#newPostForm{
				display:none;
			}</style>
	<?php
	}			
?>
	<div class="row marketing">
	        <div class="col-lg-6" id="newPostForm">
	          <h4>Create New Post</h4>
	          
	          <!-- pay attention to METHOD, its how we actually send the data accross pages -->
	          <form action="add_new_post.php" method="post">
	        	<div class="input-group">
				  <input type="text" aria-label="title" name="forumPostTitle" placeholder="Please title your post..."
				  value="<?php if (isset($_POST['forumPostTitle'])) echo $_POST['forumPostTitle']; ?>">

				  <!-- value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" -->
				</div>
	        	<div class="input-group">
				  <textarea class="form-control" aria-label="content" name="postContent" placeholder="Write a funny or insighrful story from your travels..."
				  value="<?php if (isset($_POST['postContent'])) echo $_POST['postContent']; ?>"></textarea>
				</div>

				<p><input type="submit" name="submit" class="button primary-btn" value="Create New Post"></p>
				</form>
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
echo '</div>';//container

include('includes/footer.html');
?>