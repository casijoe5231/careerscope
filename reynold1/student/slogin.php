<?php
include '../logic/theme-master.php';
/*if(isset($_POST["uname"]))
{
include '../connect1.php';

// username and password sent from form 
$myusername=$_POST['uname']; 
$mypassword=$_POST['password']; 

// To protect mysql injection (more detail about mysql injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);



$sql="select * from users where username='".$_POST['uname']."'and password='".$_POST['password']."' and role='student' and status!=2";
$res=mysql_query($sql);
$no=mysql_num_rows($res);
if($no==1){
session_start();
// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION['username'] = $myusername;
$_SESSION['mypassword'] = $mypassword;
$_SESSION['role']="student";
//mysql_query("INSERT INTO active(uname)
//VALUES
//('".$myusername."')"); 
header("location:view.php");
}
else
{
$sql="select * from users where username='".$myusername."'and password='".$mypassword."' and role='student' and status=2";
$res=mysql_query($sql);
$no=mysql_num_rows($res);
if($no==1)
{
header("location:debar.php");
}
else
{
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('INVALID LOGIN!!', function (e) {
    window.location.href='./slogin.php';
});
</SCRIPT>";
}
}
}*/
session_start();
if(isset($_SESSION['user']))
{
/*echo "You're are already logged in.<meta http-equiv='refresh' content='1;url=./view.php'>";
*/
header("location:view.php");
}
elseif(isset($_SESSION['user4']) || isset($_SESSION['user3']))
{
					echo "<html><head><script src='../js/alertify.min.js'></script>
					<link rel='stylesheet' href='../css/alertify.core.css' />
					<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
					echo "<SCRIPT LANGUAGE='JavaScript'>
					alertify.alert('Access Restriction!!!', function (e) {
					window.location.href='../index.php';
					});
					</SCRIPT>";
}
else
{
header("location:../login.php");
/*echo "<html>
<head>
<title>Placements</title>
<link rel='stylesheet' type='text/css' href='../css/stephen.css'>
<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<style>
.register1
{
margin-top:10%;
margin-left:25%;
}
</style>
</head>
<body>

<div class='container'>";
header_fn1();
echo "<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; Student Login</h3>
</div>
<br>
<br>
<br>
<div class='register1' >
<form name='student' method='post'>
<table align='center' style='text-align:center;'>



<tr>
<td colspan='2'>USERNAME:&nbsp;<input type='text' name='uname'></td>

</tr>

<tr class='even'>
<td colspan='2'>PASSWORD:<input type='password' name='password'></td>
</tr>

<tr class='none'>
<td colspan='2'><input type='submit' id='submit' name='submit' value='submit'></td>
</tr>


</table>
</form>

</div>
<br>
<div style=' color:blue;text-align:center;margin-right:40%;margin-left:30%;'><a href='../index.php' style='color:blue;text-transform:none'>&lt;&lt;&nbsp;Previous</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href='sreg.php' style='color:blue;text-transform:none'>Register&nbsp;?</a></div>
</div>";
footer_fn();
echo "
</div>

</body>
</html>";
*/
}
?>
