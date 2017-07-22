<?php
include '../logic/theme-master.php';
if(isset($_POST["uname"]))
{
include '../connect1.php';


// username and password sent from form 
$myusername=$_POST['uname']; 
$mypassword=$_POST['password']; 

// To protect mysql injection (more detail about mysql injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $myusername);
$mypassword = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $mypassword);



$sql="select * from users where username='".$_POST['uname']."'and password='".$_POST['password']."' and role='recruiter' and status!=2";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$no=mysqli_num_rows($res);
if($no==1){
session_start();
// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION['username'] = $myusername;
$_SESSION['mypassword'] = $mypassword;
$_SESSION['role']="recruiter";
//mysql_query("INSERT INTO active(uname)
//VALUES
//('".$myusername."')"); 
header("location:details.php");
}
else
{
$sql="select * from users where username='".$myusername."'and password='".$mypassword."' and role='recruiter' and status=2";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$no=mysqli_num_rows($res);
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
    window.location.href='./rlogin.php';
});
	
    </SCRIPT>";
}
}
}
session_start();
if(isset($_SESSION['user3']))
{
/*echo "You're are already logged in.<meta http-equiv='refresh' content='1;url=./spanel.php'>";
*/
header("location:details.php");
}
elseif(isset($_SESSION['user']) || isset($_SESSION['user4']))
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
<div class='bg'>
<div class='container'>";
header_fn1();
echo "<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; Recruiter Login</h3>
</div>
<br>
<br>
<br>
<div class='register1' >
<form name='recruiter' method='post'>
<table align='center' >



<tr>
<td colspan='2'>USERNAME:&nbsp;<input type='text' name='uname'></td>

</tr>

<tr class='even'>
<td colspan='2'>PASSWORD:<input type='password' name='password'></td>
</tr>


<tr class='none' style='text-align:center;'>
<td colspan='2'><input type='submit' name='submit' id='submit' value='submit'></td>
</tr>


</table>
</form>

</div>
<br>
<div style=' color:blue;text-align:center;margin-right:40%;margin-left:30%;'><a href='../index.php' style='color:blue;text-transform:none'>&lt;&lt;&nbsp;Previous</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='reg.php' style='color:blue;text-transform:none'>Register&nbsp;?</a>
</div>
</div><br>";
footer_fn();
echo "</div>
</div>
</body>
</html>";
*/
}

?>
