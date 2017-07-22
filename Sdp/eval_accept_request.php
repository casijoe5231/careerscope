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

$request_id = $_GET["req_id"];
$user=$_SESSION['user'][1];
$email=$_SESSION['user'][0];

$sql00="update goal_mentor_request SET status='Accepted' where request_id='$request_id'";
$res00=mysqli_query($GLOBALS["___mysqli_ston"], $sql00);
$sql01="Update goals_completed SET under_mentor='Yes' where request_id='$request_id'";
$res01=mysqli_query($GLOBALS["___mysqli_ston"], $sql01);

if($res00 and $res01)
{
	echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('Request has been Accepted');
    window.location.href='mentor_request.php';</SCRIPT>";
}
else
{
	echo "Requets has not been Accepted";
}
?>