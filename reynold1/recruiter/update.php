<?php
session_start();
include '../connection1.php';
// Connect to server and select databse.
$username=$_SESSION['user3'][1];
$cname=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['cname']);
$caddr=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['caddr']);
$details=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['details']);
$profile=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['profile']);
$title=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['title']);
$date=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['date']);
$venue=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['venue']);
$language=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['language']);
$other=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['other']);
$package=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['package']);
$aggregate=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['aggregate']);
$kt=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['kt']);
$kt1=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['kt1']);
$process=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['process']);
$location=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['location']);
$website=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['website']);
$scope=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['scope']);
$nposition=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['nposition']);

$sql="update company set cname='$cname',caddr='$caddr',details='$details',profile='$profile',title='$title',date='$date',venue='$venue',language='$language',other='$other',package='$package',aggregate='$aggregate',kt='$kt',deadkt='$kt1',process='$process',location='$location',website='$website',scope='$scope',nposition='$nposition' where cname='$cname' and title='$title'";

$send=mysqli_query($GLOBALS["___mysqli_ston"], $sql);

if($send)
	{
		echo'<h2>Company Information updated successfully.</h2><br>Being redirected to Previous page';
		echo "<meta http-equiv='refresh' content='2;url=details.php'>";
	}
	else
	{
		echo"<h2>An Error has occured.</h2>";
		
	}

?>