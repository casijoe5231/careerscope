<?php
include '../connect1.php';
// Connect to server and select databse.
session_start();
if(empty($_SESSION['6_letters_code'] ) ||
	  strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
{
	echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Please enter correct code!!', function (e) {
    window.location.href='./sreg.php';
});
	
    </SCRIPT>";
}
else
{
$username=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['username']);
$password=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
$phone=$_POST['phone'];
$sem=$_POST['sem'];
$email=$_POST['email'];
$fname=$_POST['fname'];
$sql="select * from users where username='$username' and password='$password'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
if($count==0)
{
$sql="INSERT INTO users
(
username,
password,
name,
email,
phone,
semester,
role,
status
)
VALUES
(
'$username',
'$password',
'$fname',
'$email',
'$phone',
'$sem',
'student'
,0)";
$send=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
if($send)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
	echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Your have been registered successfully.Please login.', function (e) {
    window.location.href='./slogin.php';
});
	
    </SCRIPT>";
	}
	else
	{
		echo"<h2>An Error has occured.</h2>";
		echo "<meta http-equiv='refresh' content='2;url=./slogin.php'>";
	}
}
else
{
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('You are Already Registered!!', function (e) {
    window.location.href='./slogin.php';
});
	
    </SCRIPT>";
}
}
?>