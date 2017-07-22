<?php
	session_start();
	include '../connection1.php';
	if($_SESSION['type']=='Guest User')
	{
	$iname = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['iname']);
	$experience4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['experience4']);
	$expertype4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['expertype4']);
	$email = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_SESSION['email']);
	$payment = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['payment']);
	$_SESSION['payment']=$payment;
	
	$sql="insert into guest(email,institute,experience,experiencetype,enrollstatus,paymentstatus) values('$email','$iname','$experience4','$expertype4',0,0)";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
	
	if($res)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('You have registered successfully.Please do the payment.', function (e) {
		window.location.href='./payment1.php';
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
	?>