<?php
include '../connect1.php';
// Connect to server and select databse.

$cname=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['cname']);
$caddr=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['caddress']);
$details=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['details']);
$title=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['title']);
$period=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['period']);
$location=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['location']);
$payment=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['payment']);
$website=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['website']);
$language=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['language']);
$other=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['other']);
$eligibility=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['eligibility']);
$kt=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['kt']);
$date=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['date']);
$venue=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['venue']);

$sql="update internship set cname='$cname',caddr='$caddr',details='$details',title='$title',period='$period',location='$location',payment='$payment',website='$website',language='$language',other='$other',eligibility='$eligibility',kt='$kt',date='$date',venue='$venue' where cname='$cname' and title='$title'";

$send=mysqli_query($GLOBALS["___mysqli_ston"], $sql);

if($send)
	{
		echo'<h2>Company Information entered successfully.</h2><br>Being redirected to Previous page';
		echo "<meta http-equiv='refresh' content='2;url=./tpo.php'>";
	}
	else
	{
		echo"<h2>An Error has occured.</h2>";
		
	}

?>