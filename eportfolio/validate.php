<?php
$db=($GLOBALS["___mysqli_ston"] = mysqli_connect('localhost', 'root', '')) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
mysqli_select_db($db, maindb);

$user = $_GET['username'];
 
// Query database to check if the username is available
$query = "Select pUserName from registration where pUserName = '$user' ";
$row = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $query)); 

if( $row['pUserName']==$user){
  echo "Sorry but username is already taken.";
  
}
else
{
  echo "Success,username is available";
}
?>