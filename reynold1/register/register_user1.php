<?php
	session_start();
	include '../connection1.php';
	if(isset($_SESSION['role']))
	{
	if($_SESSION['role']=='Staff')
	{
	$institute1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_SESSION['institute1']);
	$department = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['department']);
	$branch1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['branch1']);
	$sid = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['sid']);
	$experience1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['experience1']);
	$expertype1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['expertype1']);
	$email = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_SESSION['email']);
	
	$sql="insert into istaff(email,sid,department,branch,institute,experience,experiencetype,enrollstatus,paymentstatus) values('$email','$sid','$department','$branch1','$institute1','$experience1','$expertype1',0,0)";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
	
	if($res)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('You have registered successfully.Please login', function (e) {
		window.location.href='../login.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured. Being redirected to form.', function (e) {
		window.location.href='./index.php';
		});</SCRIPT>";
	}
	}
	if($_SESSION['role']=='Alumni')
	{
	$qualification1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['qualification1']);
	$institute2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_SESSION['institute1']);
	$experience2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['experience2']);
	$expertype2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['expertype2']);
	$email = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_SESSION['email']);
	
	$sql="insert into ialumni(email,qualification,institute,experience,experiencetype,enrollstatus,paymentstatus) values('$email','$qualification1','$institute2','$experience2','$expertype2',0,0)";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
	
	if($res)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('You have registered successfully.Please login', function (e) {
		window.location.href='../login.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured. Being redirected to form.', function (e) {
		window.location.href='./index.php';
		});</SCRIPT>";
	}
	}
	if($_SESSION['role']=='Student')
	{
	$objective = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['objective']);
	$skills = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['skills']);
	$specialisation = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['specialisation']);
	$location = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['location']);
	$remuneration = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['remuneration']);
	$course = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['course']);
	$discipline = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['discipline']);
	$year = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['year']);
	$class = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['class']);
	$aggregate = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['aggregate']);
	$period = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['period']);
	$company = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['company']);
	$title = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['title']);
	$area = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['area']);
	$cskills = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['cskills']);
	$industry = implode(",",$_POST['industry']);
	$certifications = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['certifications']);
	$achievements = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['achievements']);
	$language = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['language']);
	$hobbies = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['hobbies']);
	$email = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_SESSION['email']);
	$institute = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_SESSION['institute1']);
	
	$sql="insert into istudent(email,objective,skills,specialisation,location,remuneration,course,discipline,year,class,aggregate,period,company,title,area,cskills,industry,certifications,achievements,language,hobbies,institute,enrollstatus,paymentstatus) values('$email','$objective','$skills','$specialisation','$location','$remuneration','$course','$discipline','$year','$class','$aggregate','$period','$company','$title','$area','$cskills','$industry','$certifications','$achievements','$language','$hobbies','$institute',0,0)";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
	
	if($res)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('You have registered successfully.Please login', function (e) {
		window.location.href='../login.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured. Being redirected to form.', function (e) {
		window.location.href='./index.php';
		});</SCRIPT>";
	}
	}
	if($_SESSION['role']=='Recruiter')
	{
	$cname = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['cname']);
	$email = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_SESSION['email']);
	
	$sql="insert into irecruiter(email,cname,enrollstatus,paymentstatus) values('$email','$cname',0,0)";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
	
	if($res)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('You have registered successfully.Please login', function (e) {
		window.location.href='../login.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured. Being redirected to form.', function (e) {
		window.location.href='./index.php';
		});</SCRIPT>";
	}
	}
		if($_SESSION['role']=='Admin')
	{
	$institute4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_SESSION['institute1']);
	$email = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_SESSION['email']);
	
	$sql="insert into admin(email,institute) values('$email','$institute4')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
	
	if($res)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('You have registered successfully.Please login', function (e) {
		window.location.href='../login.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured. Being redirected to form.', function (e) {
		window.location.href='./index.php';
		});</SCRIPT>";
	}
	}
	if($_SESSION['role']=='Other')
	{
	$inname = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['inname']);
	$email = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_SESSION['email']);
	
	$sql="insert into other(email,institute,enrollstatus,paymentstatus) values('$email','$inname',0,0)";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
	
	if($res)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('You have registered successfully.Please login', function (e) {
		window.location.href='../login.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured. Being redirected to form.', function (e) {
		window.location.href='./index.php';
		});</SCRIPT>";
	}
	}
	
	}
?>