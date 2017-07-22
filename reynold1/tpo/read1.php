<?php
include '../connect1.php';
// Connect to server and select databse.
session_start();
if($_POST['cname']!="")
{
if($_POST['title']!="")
{
$username=$_SESSION['username'];
$cname=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['cname']);
$caddress=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['caddress']);
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

$sql="INSERT INTO internship
(
username,
cname,
caddr,
details,
title,
period,
location,
payment,
website,
language,
other,
eligibility,
kt,
date,
venue,
status
)
VALUES
(
'$username',
'$cname',
'$caddress',
'$details',
'$title',
'$period',
'$location',
'$payment',
'$website',
'$language',
'$other',
'$eligibility',
'$kt',
'$date',
'$venue',
'0')";
$send=mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die("query not executed");

if($send)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";


echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Company Information Entered Succcessfully!!', function (e) {
    window.location.href='./tpo.php';
});
	
    </SCRIPT>";
	}
	else
	{
		echo"<h2>An Error has occured.</h2>";
		
	}
}
else
{
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";


echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('You have not Specified a Job Title!!', function (e) {
    window.location.href='./tpo.php';
});
	
    </SCRIPT>";
}	
	
}
else
{
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";


echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('You have not Specified a Company name!!', function (e) {
    window.location.href='./tpo.php';
});
	
    </SCRIPT>";
}
?>