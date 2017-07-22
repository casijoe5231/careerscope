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

$sql2="select no_time_update from goal_list where goal_id IN('$goal_id')";
$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
$row2=mysqli_fetch_array($res2);
//echo $row2['no_time_update'];
$no_time_update = $row2['no_time_update']+1;
//echo $no_time_update;

if($no_time_update<=3)
{
	//echo "hi";
	$sql1="Update goal_list SET title='$title', action_plan='$actp', deadline='$deadline', goal_type='$goal_type', frequency='$frequency', time_edited='$time_edited', no_time_update='$no_time_update' where goal_id IN('$goal_id')";
	$res1=mysqli_query($conn, $sql1);
	
	
	$sql3 = "Update goal_hist SET title='$title', deadline='$deadline', time_edited='$time_edited', no_time_update='$no_time_update' where goal_id IN('$goal_id')";
	$res3=mysqli_query($conn, $sql3);
	//$count=mysql_num_rows($res1);
	//echo $res1;
	if($res1)
	{
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alert('Goal $title Updated Successfully, no of times Updated is $no_time_update');
		window.location.href='sdp_edit.php';</SCRIPT>";
	}
	
}
elseif($no_time_update >3)
{   
	echo "hi12";
	echo "<SCRIPT LANGUAGE='JavaScript'> alert('Goal $title Cannot be Updated Further'); window.location.href='sdp_edit.php';</SCRIPT>";
}
else{
}

?>