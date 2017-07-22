<?php
include '../connect1.php';
// Connect to server and select databse.
session_start();
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
$process=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['process']);
$aggregate=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['aggregate']);
$kt=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['kt']);
$kt1=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['kt1']);
$location=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['location']);
$website=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['website']);
$scope=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['scope']);
$nposition=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['nposition']);

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
'$_SESSION[username]',
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
'$nposition'
,'0')";

$send=mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die("query not executed");
$allowedExts = array("pdf","doc","docx");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
{
	  mkdir("../uploads/$_SESSION[username]");
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../uploads/$_SESSION[username]/" . $_FILES["file"]["name"]);
}

if($send)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";


echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Company Information Entered Succcessfully!!', function (e) {
    window.location.href='./details.php';
});
	
    </SCRIPT>";
	}
	else
	{
		echo"<h2>An Error has occured.</h2>";
		
	}

?>