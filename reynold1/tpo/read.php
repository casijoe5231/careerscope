<?php
include '../connection1.php';
// Connect to server and select databse.
session_start();

$username=$_SESSION['user4'][1];
$cname=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['cname']);
$caddr=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['caddr']);
$details=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['details']);
$profile=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['profile']);
$scope=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['scope']);
$title=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['title']);
$language=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['language']);
$other=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['other']);
$package=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['package']);
$aggregate=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['aggregate']);
$kt=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['kt']);
$kt1=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['kt1']);
$venue=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['venue']);
$process=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['process']);
$date=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['date']);
$website=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['website']);
$nposition=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['nposition']);
$location=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['location']);
$sql="INSERT INTO company
(
username,
cname,
caddr,
details,
profile,
title,
date,
venue,
language,
other,
package,
aggregate,
kt,
deadkt,
process,
location,
website,
scope,
nposition,
status
)
VALUES
(
'$username',
'$cname',
'$caddr',
'$details',
'$profile',
'$title',
'$date',
'$venue',
'$language',
'$other',
'$package',
'$aggregate',
'$kt',
'$kt1',
'$process',
'$location',
'$website',
'$scope',
'$nposition',
'1')";
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

?>



