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
    window.location.href='./reg.php';
});
	
    </SCRIPT>";
}
else
{
$username=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['username']);
$password=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
$phone=$_POST['phone'];
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
0,
'tpo'
,0)";
$send=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
if($send)
	{
	echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
	echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('You are registered.Please login.', function (e) {
    window.location.href='./tlogin.php';
});
	
    </SCRIPT>";
		/*echo'<h2>Information entered successfully.</h2><br>Being redirected to Previous page';
		echo "<meta http-equiv='refresh' content='2;url=./rlogin.php'>";*/
	}
	else
	{
		echo"<h2>An Error has occured.</h2>";
		echo "<meta http-equiv='refresh' content='2;url=./tlogin.php'>";
	}
}
else
{
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('You are Already Registered!!', function (e) {
    window.location.href='./tlogin.php';
});
	
    </SCRIPT>";
}
}
?>