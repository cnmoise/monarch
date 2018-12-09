<?php 
require('mysqli_connect.php');

$pID = $_POST['postID'];

// echo 'pID in removePost '.$pID;
// '$pID'
$q = "SELECT * FROM posts WHERE postID ='$pID'";
$deletequery = "DELETE FROM posts WHERE postID ='$pID'";

if($pID > 0){

  // Check record exists
  $checkRecord = @mysqli_query($dbc, $q);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    // Delete record
    mysqli_query($dbc, $deletequery);
    echo 'SUCCEEDED to delete post '.$pID;
    exit;
  }
} else {
  echo 'FAILED to delete post '.$pID;
  exit;
}

