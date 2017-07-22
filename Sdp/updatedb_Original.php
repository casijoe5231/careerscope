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

//Code to updates values
$title=$_GET['goal_title'];
$email=$_SESSION['user'][0];
$goal_id = $_SESSION['ID'];
$actp=$_GET['action_plan'];
$deadline=$_GET['deadline'];
$goal_type=$_GET['goal_type'];
$frequency=$_GET['remind'];

$time_edited = date('Y-m-d H:i:s');

$sql1="Update goal_list SET title='$title', action_plan='$actp', deadline='$deadline', goal_type='$goal_type', frequency='$frequency', time_edited='$time_edited' where goal_id IN('$goal_id')";
$res1=mysqli_query($conn, $sql1);
//$count=mysql_num_rows($res1);
//echo $res1;
if($res1)
{
	echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('Goal $title Updated Successfully');
    window.location.href='sdp_edit.php';</SCRIPT>";
}
else
{
	echo "Goal Not Updated";
}

//
?>