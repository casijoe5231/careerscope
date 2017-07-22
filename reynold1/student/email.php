<?php
session_start();
include "../connection1.php";
$name=$_SESSION['user'][1];
$email=$_SESSION['user'][0];
$branch=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['branch']);
$sem=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['sem']);
$kt=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['kt']);
$kt1=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['kt1']);
$gender=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['gender']);
$aggregate=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['aggregate']);
$loc=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['loc']);
$skills=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['skills']);

$sql="INSERT INTO sinfo
(
email,
username,
branch,
sem,
kt,
deadkt,
gender,
aggregate,
location,
skills,
upload,
appeared,
given,
placed,
status
)
VALUES
(
'$email',
'$name',
'$branch',
'$sem',
'$kt',
'$kt1',
'$gender',
'$aggregate',
'$loc',
'$skills',
'uploads/".$email."',
'',
'',
'unplaced'
,0)";
$send=mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die("query not executed");
//echo 'sent';
$allowedExts = array("pdf","doc","docx");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
{
	  mkdir("../uploads/$email");
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../uploads/$email/" . $_FILES["file"]["name"]);
}

if($send)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";


echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('You Are Registered Succcessfully!!', function (e) {
    window.location.href='view.php';
});
	
    </SCRIPT>";
	}
	else
	{
		echo"<h2>An Error has occured.</h2>";
		
	}




?>