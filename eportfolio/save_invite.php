<?php
include '../connection1.php';
session_start();
$email=$_SESSION['user'][0];

date_default_timezone_set('Asia/Calcutta');
$datetime = date("F j, Y, g:i a");
$timesql = date("Y-m-d H:i:s");

$email1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['email']);
$name1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['name1']);
$relation = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['relation']);

$sql2="SELECT * FROM masteruser WHERE email='$email1'";
$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
$num1=mysqli_num_rows($res2);
if($num1==0)
{

function generatepw()
{
	$length = 9;
   $allowed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%&*";
  $password='';
   for($i=0;$i<$length;$i++)
       $password .= substr($allowed,rand(0,strlen($allowed)-1),1);
   return $password;
}


$pswd=generatepw();
$_SESSION['pswd']=$pswd;

$sql3="insert into masteruser(email,password,name,mobile,role,discipline,institute,branch,date,status,estatus) values('$email1','$_SESSION[pswd]','$name1','','Guest','','','','".date('d/m/Y')."',0,0)";
$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3)or die("query not executed");
}

$sql="SELECT * FROM invitation WHERE invitee_email='$email' and invited_email='$email1'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$num=mysqli_num_rows($res);
if($num==0)
{
$sql1="insert into invitation(invitee_email,invited_email,invited_name,relation,timesql) values('$email','$email1','$name1','$relation','$timesql')";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1)or die("query not executed");

echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Invitation sent successfully.', function (e) {
		window.location.href='invitation.php';
		});</SCRIPT>";

}
else
{
	echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Failed to send the invitation. Same email repeated.', function (e) {
		window.location.href='invitation.php';
		});</SCRIPT>";
}
?>