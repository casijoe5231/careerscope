<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="images/favicon.ico" rel="shortcut icon"/>
	
    <title>EYB | SDP -Edit Schedule</title>
      
<!--  CSS  -->
<link rel="stylesheet" type="text/css" href="../css/logo.css">
    <link rel="stylesheet" type="text/css" href="../css/sdp_edit_border.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link rel='stylesheet' id='camera-css'  href='../css/camera.css' type='text/css' media='all'>
    <link rel="stylesheet" type="text/css" href="../css/carousel.css">
    <link rel="stylesheet" type="text/css" href="../css/slicknav.css">
    <link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main
    stylesheet"charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet'             type='text/css'>
<!-- Bootstrap -->
<link rel="stylesheet" href="css_modal/bootstrap.css">
<link rel="stylesheet" href="css_modal/style1.css">
</head>
</html>
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

$time_del = date('Y-m-d H:i:s');
$email=$_SESSION['user'][0];
$goal_id = $_SESSION["goal_id"];
//echo $goal_id;

$sql1="select * from goal_list where email like '$email'and goal_id In ('$goal_id')";
$res1=mysqli_query($conn, $sql1);
$count=mysqli_num_rows($res1);
//echo $count;
$data2 = mysqli_fetch_array($res1);

$sql2="Insert into goals_deleted (goal_id,email,title,action_plan,goal_type,deadline,time_added,time_deleted)values('$goal_id','$email','$data2[0]','$data2[1]','$data2[2]','$data2[3]','$data2[4]','$time_del')";

$res2=mysqli_query($conn, $sql2);

$sql3="Delete from goal_list where email='$email'and goal_id='$goal_id'";
$res3=mysqli_query($conn, $sql3);

$sql4 = "Update goal_hist SET time_deleted='$time_del' where goal_id IN('$goal_id')";
$res4=mysqli_query($conn, $sql4);

if($res2 && $res3 && $res4)
{
	
	//echo '<div class="alert alert-success"><strong>Success!</strong>The goal has been deleted</div>';
	include "sdp_delete.php";
}
else
{
	echo '<div class="alert alert-warning"><strong>Warning!</strong>The goal'.$data2[2].' was not deleted</div>'; 
	//include "sdp_delete.php";
}
?>