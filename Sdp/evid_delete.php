<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="images/favicon.ico" rel="shortcut icon"/>
	
    <title>EYB | SDP Delete Evidence</title>
      
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
$user=$_SESSION['user'][1];
$goal_id = $_SESSION["goal_id"];
//echo $goal_id;
$evidence_id=$_SESSION["evid"]; 
echo "$evidence_id<br>";
echo $goal_id;

$sql1="select * from goal_evidence where evidence_id IN('$evidence_id')";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
$row1=mysqli_fetch_array($res1);
//echo $user;
//echo $row1[file_name];

$path='/var/www/html/careerscope/Sdp/uploads/'.$user.'/'.$row1['file_name'].'';
$bool=unlink($path);
$sql2="delete from goal_evidence where evidence_id IN('$evidence_id')";
$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
echo "hi";

if($res1 and $res2 and $bool)
{
	echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('$row1[file_name] was Deleted');
    window.location.href='sdp_view_submit.php';</SCRIPT>";
}
else
{
	echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('$row1[file_name] was Not Deleted');
    window.location.href='sdp_view_submit.php';</SCRIPT>";
}
?>