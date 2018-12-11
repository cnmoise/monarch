<?php 
require('mysqli_connect.php');

$fID = $_POST['flightID'];

// echo 'pID in removePost '.$pID;
// '$pID'
$q = "SELECT * FROM flights WHERE flightID ='$fID'";
$deletequery = "DELETE FROM flights WHERE flightID ='$fID'";

if($fID > 0){

  // Check record exists
  $checkRecord = @mysqli_query($dbc, $q);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    // Delete record
    mysqli_query($dbc, $deletequery);
    echo 'SUCCEEDED to delete post '.$fID;
    exit;
  }
} else {
  echo 'FAILED to delete post '.$fID;
  exit;
}

