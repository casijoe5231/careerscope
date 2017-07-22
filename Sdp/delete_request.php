<?php
session_start();

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }
	
//Connection Code
$db="careerscope";
$servername = "localhost";
$username = "root";
$password = "oracle";

// Create connection
$conn=($GLOBALS["___mysqli_ston"] = mysqli_connect($servername, $username, $password));  // Make Connection
	mysqli_select_db($GLOBALS["___mysqli_ston"], $db);                      // Select Database

// Check connection
if (!$conn) {
    die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}
//echo "Connected successfully";

//Connection Code ends

$request_id=$_SESSION["req_id"];
//echo 'hi';
//echo $request_id;

$sql00="Update goal_mentor_request SET status='Declined' where request_id='$request_id'";
$res00=mysqli_query($GLOBALS["___mysqli_ston"], $sql00);

$sql01="Update goals_completed SET under_mentor='No' where request_id='$request_id'";
$res01=mysqli_query($GLOBALS["___mysqli_ston"], $sql01);

if($res00 and $sql01)
{
	echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('Request has been Deleted');
    window.location.href='mentor_request.php';</SCRIPT>";
}
else
{
	echo "Report has not been Saved";
}
?>