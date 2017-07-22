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

//values coming from Form
$Id = $_GET["id"];
$stud_email=$_GET["email"];
$stud_name=$_GET["student"];

$teacher=$_POST['teacher'];
$time_added = date('Y-m-d H:i:s');
/*echo $Id;
echo $stud_email;
echo $stud_name;
echo $teacher;*/

/*
$query1 = "Select * from istaff where staff_name='%+$teacher+%'";
$res=mysql_query($query1);
$row5=mysql_fetch_array($res);
echo $row5[email];*/
echo 'hi Correct the email issue';

$sql00="insert into goal_mentor_request (request_id,goal_id,stud_name,stud_email,mentor_name,mentor_email,time_sent,status)values('','$Id','$stud_name','$stud_email','$teacher','kumkum8655@gmail.com','$time_added','Sent')";
$res00=mysqli_query($GLOBALS["___mysqli_ston"], $sql00);

$sql02="select * from goal_mentor_request where time_sent='$time_added'";
$res02=mysqli_query($GLOBALS["___mysqli_ston"], $sql02);
$row2=mysqli_fetch_array($res02);

$sql01="update goals_completed SET request_id='$row2[request_id]',mentor_email='kumkum8655@gmail.com',mentor_name='$teacher' where goal_id='$row2[goal_id]'";
$res01=mysqli_query($GLOBALS["___mysqli_ston"], $sql01);

if($res00 and $res01 and $res02)
{
	echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('Request Successfully Sent to Teacher $teacher');
    window.location.href='eval_mentor.php';</SCRIPT>";
}
else
{
	echo "Report has not been Saved";
}
?>