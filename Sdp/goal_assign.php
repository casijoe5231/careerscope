<?php
session_start();

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }
$mysqlserver="localhost";
$mysqlusername="root";
$mysqlpassword="oracle";
$dbname = "careerscope";
$conn=new mysqli($mysqlserver, $mysqlusername, $mysqlpassword,$dbname) or die ("Error connecting to mysql server: ".mysqli_error($GLOBALS["___mysqli_ston"]));

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
echo '<br>';

$title=@$_POST['goal_name'];	

$teacher=@$_POST['teacher'];

$time_added = date('Y-m-d H:i:s');
//Code to get the teachers email address;
$query1 = "Select email from istaff where staff_name like '$teacher'";
$result=$conn->query($query1);
$row = $result->fetch_assoc();
$email1 = $row["email"];

//code to get the teachers email address ends here


$sql1 = "INSERT INTO Goal_Assigned VALUES('','$email1','$teacher','$title',0,'$time_added')"; 

if ($conn->query($sql1) === TRUE) {

   //echo "Goal_Type Added Successfully";
   // echo "<br> New table A created & Updated successfully.";
} else {

   echo "Error: " . $sql1. "<br>" . $conn->error;
}
	
echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('Goal Assigned Successfully to $teacher');
    window.location.href='../demo2.php';</SCRIPT>";
$conn->close();
?>

