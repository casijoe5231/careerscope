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

//values coming from Form
//$teacher = $_GET["teacher"];
$request_id = $_GET["req_id"];

$sql00="delete from goal_mentor_request where request_id IN('$request_id')";
$res00=mysqli_query($GLOBALS["___mysqli_ston"], $sql00);

if($res00)
{
	echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('Request Sent to Teacher is Cancelled');
    window.location.href='eval_mentor.php';</SCRIPT>";
}
else
{
	echo "Report has not been Saved";
}
?>