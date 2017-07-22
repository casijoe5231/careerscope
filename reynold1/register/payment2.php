<?php
include '../connection1.php';
session_start();

if (isset($_SESSION['payment']))
{
	$sql="insert into payment(paymentid,email,modeofpay,paymentstatus) values('','$_SESSION[email]','$_SESSION[payment]',1)";
    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
	$sql="update guest set paymentstatus=1 where email='$_SESSION[email]'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
	
	echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Payment is done successfully.You may now login.', function (e) {
		window.location.href='../login.php';
		});</SCRIPT>";

}
	?>