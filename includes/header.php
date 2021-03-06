<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title; ?></title>

	<!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	
	<link href="css/home.css" rel="stylesheet">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Sigmar+One" rel="stylesheet">
<!-- 
	<script>
      $(document).ready(function() {
      	$('body').on('click', 'input.deleteBtn', function(){
      		var deleteQuery="DELETE FROM posts WHERE postID="+this.id+";";
	        var item={
	          vName : deleteQuery,
	        };
	        console.log(item);
	        $.post("http://127.0.0.1/forumpost.php",item,function(data){
	          console.log(data);
	        });

      		alert("The page will be deleted");
      	});
    
      });</script> -->
<!-- 
      var deleteQuery="DELETE FROM party WHERE partyID="+this.id+";";
        var item={
          vName : deleteQuery,
        };
        console.log(item);
        $.post("http://127.0.0.1/forumpost.php",item,function(data){
          console.log(data);
        });
        //document.getElementById(""+this.id+"").style.visibility='hidden';
        document.getElementById(""+this.id+"").remove(); -->

</head>
	<body>
		<nav class="nav navbar navbar-expand-lg navbar-light bg-light" role="navigation">
			<a class="navbar-brand" href="index.php"><img src="images/monarch.png" class="img-rounded" style="float: left;"></a>
			<div class="collapse navbar-collapse" id="mainNavBar">
				
                <ul class="nav navbar-nav mr-auto">

					<li><a class="nav-item nav-link" href="index.php">Home</a></li>
					<li><a class="nav-item nav-link" href="blog.php">Blog</a></li>
					<li><a class="nav-item nav-link" href="forum.php">Forum</a></li>
                </ul>

                <ul class="nav navbar-nav">
                	<li><a class="nav-item nav-link" href="view_users.php">See All Users</a></li>
                	<?php 

		            	if(isset($_SESSION['userID'])){
							echo'<li><a class="nav-item nav-link" href="logout.php">Logout</a></li>';
						} else {
							echo'<li><a class="nav-item nav-link" href="login.php">Login</a></li>';
			                echo'<li><a class="nav-item nav-link" href="register.php">Register</a></li>';
						}
		            ?>
                </ul>
            </div>
			</button>
        </nav> <!--  class="container" -->
			
	</body>
</html>