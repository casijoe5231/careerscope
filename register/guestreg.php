<?php
	include '../connection1.php';
session_start();
// Check for correct captcha
if(empty($_SESSION['6_letters_code'] ) ||
	  strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
{
	echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Please enter correct code!!', function (e) {
    window.location.href='../login.php';
});
	
    </SCRIPT>";
}
else
{
$name = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['name']);
$email = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['email']);
$phone = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['phone']);
$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
$payment = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['payment']);
$branch = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['branch']);
$discipline5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_SESSION['discipline5']);
$_SESSION['email']=$email;
$_SESSION['payment']=$payment;

$iname = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['iname']);
$experience = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['experience']);
$expertype = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['expertype']);


$sql="insert into masteruser(email,password,name,mobile,role,discipline,institute,branch,date,status) values('$_SESSION[email]','$password','$name','$phone','Guest','$discipline5','none','$branch','".date('d/m/Y')."',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="insert into guest(email,institute,experience,expertype,enrollstatus,paymentstatus) values('$_SESSION[email]','$iname','$experience','$expertype',0,0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

	if($res)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('You have registered successfully.<br>Please do the payment', function (e) {
		window.location.href='payment1.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured. Being redirected to form.', function (e) {
		window.location.href='guestregister.php';
		});</SCRIPT>";
	}

}
?>