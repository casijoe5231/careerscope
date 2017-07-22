<?php
include '../connection1.php';
session_start();

$creator=$_POST['creator'];
$name=$_POST['actname'];
$date=$_POST['date'];
$members=$_POST['members'];
$desc=$_POST['description1'];


$allowedExts = array("pdf","doc","docx");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
{
	  mkdir("Upload/$_POST[email]-$name");
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $img="Upload/$_POST[email]-$name/".$_FILES["file"]["name"]);
}


$sql="INSERT INTO mentoractivity(createdby, name, description, members, url_file, date)
		VALUES('$creator', '$name', '$desc', '$members', '$img', '$date')";
		
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");


	if($res)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Added successfully', function (e) {
		window.location.href='add_record.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured.', function (e) {
		window.location.href='add_record.php';
		});</SCRIPT>";
	}
?>
