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
$task=$_POST['task'];
$email=$_SESSION['user'][0];
$goal_id = $_SESSION['ID'];
$title = $_SESSION['title'];
$describe=$_POST['work_done'];
$percentage=$_POST['pert'];
//$goal_type=$_GET['goal_type'];
//$frequency=$_GET['remind'];

$time_added = date('Y-m-d H:i:s');

$sql1="insert into goal_report values('','$goal_id','$email','$title','$task','$describe','$percentage','$time_added')";
$res1=mysqli_query($conn, $sql1);


$sql2="Update goal_list set goal_com = '$percentage' where goal_id IN('$goal_id')";
$res2=mysqli_query($conn, $sql2);

$sql3="select * from goal_hist where goal_id IN('$goal_id')";
$res3=mysqli_query($conn, $sql3);
$row3=mysqli_fetch_array($res3);
$no_weekly_updates=$row3['no_weekly_updates'] + 1;

$sql4="update goal_hist SET goal_com='$percentage', last_weekly_date='$time_added', no_weekly_updates='$no_weekly_updates' where goal_id IN('$goal_id')";
$res4=mysqli_query($conn, $sql4);

//$sql1="Update goal_list SET title='$title', action_plan='$actp', deadline='$deadline', goal_type='$goal_type', frequency='$frequency', time_edited='$time_edited' where goal_id IN('$goal_id')";
//$res1=mysql_query($sql1,$conn);
//$count=mysql_num_rows($res1);
//echo $res1;
if($res1 && $res2 && $res3 && $res4)
{
	echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('Weekly Report Added Successfully');
    window.location.href='sdp_weeklyupdate.php';</SCRIPT>";
}
else
{
	echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('Report has not been saved');
    window.location.href='sdp_weeklyupdate.php';</SCRIPT>";
}

//
?>