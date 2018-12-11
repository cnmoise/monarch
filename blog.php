<?php

$page_title = 'Monarch blog';
include('includes/header.php');
require('mysqli_connect.php');

$q = "SELECT blogID, userID, blogPostTitle, blogPostContent, DATE_FORMAT(dateTimePosted, '%M %d %Y') AS dtp FROM blogposts ORDER BY dateTimePosted ASC";

$r = @mysqli_query($dbc, $q);
$num = mysqli_num_rows($r);

// Hide the post form if the user is not an admin
if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1){
    ?>
      <style type="text/css">#newBlogPost{
        display:block;
      }</style>
    <?php
  } else{
  ?>
    <style type="text/css">#newBlogPost{
        display:none;
      }</style>
  <?php
  }
?>

<style>
<?php include('css/blog.css'); ?>
</style>

	<div class="container">
      <div class="row">
        <div class="col-sm-8 blog-main">
          <div class="blog-post" id="newBlogPost">
            <h2 class="blog-post-title">Create New Post</h2>

            <!-- This inserts data into the query -->
            <form action="add_new_blog_post.php" method="POST">
            <div class="input-group">
              <!-- Name attribute is what gets posted to the server, make sure it lines up with what you need to retrieve -->
              <input type="text" aria-label="title" name="blogPostTitle" placeholder="Please title your post..."
              value="<?php if (isset($_POST['blogPostTitle'])) echo $_POST['blogPostTitle']; ?>">
            </div>
            <div class="input-group">
              <textarea class="form-control" aria-label="content" name="blogPostContent" placeholder="Write a funny or insighrful story from your travels..."
              value="<?php if (isset($_POST['blogPostContent'])) echo $_POST['blogPostContent']; ?>"></textarea>
            </div>

            <p><input type="submit" name="submit" class="button primary-btn" value="Create New Blog Post"></p>
            </form>
          </div><!-- NEW BLOG POST -->
          <?php
            if($num > 0){
              while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                echo'<h2 class="blog-post-title">'. $row['blogPostTitle'] .'</h2>';
                echo'<p class="blog-post-meta" style="color:#CA410A;"> Post #: '. $row['blogID'] .' Date Posted: '. $row['dtp'] .' by userID'.$row['userID'];
                echo'<p>'.$row['blogPostContent'].'</p>';
              }//while
            }
            else { // If no records were returned.
              echo '<p class="error">There are currently no posts to display.</p>';
            }
              mysqli_free_result ($r); // Free up the resources.
          ?>
          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
          </nav>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 offset-sm-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
				<li><a href="#">November 2017</a></li>
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Stay Connected</h4>
            <ol class="list-unstyled">
				<li><a href="#">Send an email to our Club President</a></li>
              <li><a href="https://github.com/cnmoise">GitHub</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

<?php
include('includes/footer.html');
?>