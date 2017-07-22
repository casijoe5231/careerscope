<?php
	include '../connection1.php';
session_start();
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
$discipline2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_SESSION['discipline2']);
$institute2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_SESSION['institute2']);
$type = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_SESSION['type']);

$sql="insert into masteruser(email,password,name,year,mobile,role,discipline,institute,status) values('$email','$password','$name','".date('Y')."','$phone','$type','$discipline2','$institute2',0)";
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
		window.location.href='staffregister.php';
		});</SCRIPT>";
	}

}
?>