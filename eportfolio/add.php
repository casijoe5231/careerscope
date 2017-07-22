<?php
include '../connection1.php';
session_start();

$category=$_POST['category'];

if($category=='Project')
{
$topicname2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['topicname2']);
$year3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['year3']);
$members3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['members3']);
$description2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['description2']);

$allowedExts = array("pdf","doc","docx");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
{
	  mkdir("Upload/$_POST[email]-$topicname2");
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $img="Upload/$_POST[email]-$topicname2/" . $_FILES["file"]["name"]);
}

$sql="insert into seminar_wp(id,email,username,category,topic,member,year,description,file) values('','$_POST[email]','$_POST[uname]','$category','$topicname2','$members3','$year3','$description2','$img')";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

	if($res)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Added successfully', function (e) {
		window.location.href='newindex.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured.', function (e) {
		window.location.href='newindex.php';
		});</SCRIPT>";
	}
}

if($category=='Work Shop')
{
$topicname1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['topicname1']);
$year2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['year2']);
$members2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['members2']);
$description1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['description1']);

$allowedExts = array("pdf","doc","docx");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
{
	  mkdir("Upload/$_POST[email]-$topicname1");
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $img="Upload/$_POST[email]-$topicname1/" . $_FILES["file"]["name"]);
}

$sql="insert into seminar_wp(id,email,username,category,topic,member,year,description,file) values('','$_POST[email]','$_POST[uname]','$category','$topicname1','$members2','$year2','$description1','$img')";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

	if($res)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Added successfully', function (e) {
		window.location.href='newindex.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured.', function (e) {
		window.location.href='newindex.php';
		});</SCRIPT>";
	}
}

if($category=='Seminar')
{
$topicname = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['topicname']);
$year1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['year1']);
$members1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['members1']);
$description = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['description']);

$allowedExts = array("pdf","doc","docx");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
{
	  mkdir("Upload/$_POST[email]-$topicname");
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $img="Upload/$_POST[email]-$topicname/" . $_FILES["file"]["name"]);
}

$sql="insert into seminar_wp(id,email,username,category,topic,member,year,description,file) values('','$_POST[email]','$_POST[uname]','$category','$topicname','$members1','$year1','$description','$img')";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

	if($res)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Added successfully', function (e) {
		window.location.href='newindex.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured.', function (e) {
		window.location.href='newindex.php';
		});</SCRIPT>";
	}
}

if($category=='Sports')
{
$sportname = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['sportname']);
$year = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['year']);
$members = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['members']);
$position = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['position']);
$playedas = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['playedas']);

$allowedExts = array("pdf","doc","docx");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
{
	  mkdir("Upload/$_POST[email]-$sportname");
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $img="Upload/$_POST[email]-$sportname/" . $_FILES["file"]["name"]);
}

$sql="insert into sports(id,email,username,category,sportsname,playedas,member,position,year,file) values('','$_POST[email]','$_POST[uname]','$category','$sportname','$playedas','$members','$position','$year','$img')";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

	if($res)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Added successfully', function (e) {
		window.location.href='newindex.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured.', function (e) {
		window.location.href='newindex.php';
		});</SCRIPT>";
	}
}

if($category=='Technical Paper/Publication')
{
$papername = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['papername']);
$year4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['year4']);
$description3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['description3']);

$allowedExts = array("pdf","doc","docx");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
{
	  mkdir("Upload/$_POST[email]-$papername");
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $img="Upload/$_POST[email]-$papername/" . $_FILES["file"]["name"]);
}

$sql="insert into technical_paper(id,email,username,category,papername,year,description,file) values('','$_POST[email]','$_POST[uname]','$category','$papername','$year4','$description3','$img')";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

	if($res)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Added successfully', function (e) {
		window.location.href='newindex.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured.', function (e) {
		window.location.href='newindex.php';
		});</SCRIPT>";
	}
}

if($category=='Technical Fest')
{
$eventname = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['eventname']);
$year5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['year5']);
$members4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['members4']);
$description4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['description4']);
$position1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['position1']);

$allowedExts = array("pdf","doc","docx");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
{
	  mkdir("Upload/$_POST[email]-$eventname");
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $img="Upload/$_POST[email]-$eventname/" . $_FILES["file"]["name"]);
}

$sql="insert into technical_ds(id,email,username,category,ename,award,year,member,description,file) values('','$_POST[email]','$_POST[uname]','$category','$eventname','$position1','$year5','$members4','$description4','$img')";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

	if($res)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Added successfully', function (e) {
		window.location.href='newindex.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured.', function (e) {
		window.location.href='newindex.php';
		});</SCRIPT>";
	}
}

if($category=='Work Experience')
{
$orgname = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['orgname']);
$experience = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['experience']);
$designation = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['designation']);

$allowedExts = array("pdf","doc","docx");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
{
	  mkdir("Upload/$_POST[email]-$orgname");
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $img="Upload/$_POST[email]-$orgname/" . $_FILES["file"]["name"]);
}

$sql="insert into work_exp(id,email,username,category,co_name,exp,designation,file) values('','$_POST[email]','$_POST[uname]','$category','$orgname','$experience','$designation','$img')";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

	if($res)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Added successfully', function (e) {
		window.location.href='newindex.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured.', function (e) {
		window.location.href='newindex.php';
		});</SCRIPT>";
	}
}

if($category=='Certification Course')
{
$coursename = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['coursename']);
$module = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['module']);
$score = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['score']);
$year6 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['year6']);
$description5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['description5']);

$allowedExts = array("pdf","doc","docx");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
{
	  mkdir("Upload/$_POST[email]-$coursename");
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $img="Upload/$_POST[email]-$coursename/" . $_FILES["file"]["name"]);
}

$sql="insert into certification(id,email,username,category,cname,module,year,description,score,file) values('','$_POST[email]','$_POST[uname]','$category','$coursename','$module','$year6','$description5','$score','$img')";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

	if($res)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Added successfully', function (e) {
		window.location.href='newindex.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured.', function (e) {
		window.location.href='newindex.php';
		});</SCRIPT>";
	}
}
?>
