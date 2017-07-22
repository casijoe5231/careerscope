<html>
<head>
<title>Placements</title>
<link rel="stylesheet" type="text/css" href="css/stephen.css">
<link rel='stylesheet' type='text/css' href='css/organictab.css'>
<link rel='icon' href='images/favicon.png' type='image/png' sizes='16x16'>
<script src="js/jquery.min.js"></script>

<script src="js/organictabs.jquery.js"></script>
<script>
        $(function() {
		$("#example-one").organicTabs({
                "speed": 400
            });
    
        });
</script>

<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<style>
.register
{
 width:50%;
 min-height:30%;
 margin-left:auto;
 margin-right:auto;
 border-style:solid;
 border-radius:15px;
 padding:0px;
}
#example-one
{
border-radius:10px;
}

</style>
</head>
<body>
<div class="bg">
<div class="container">
<div class="header">
<img src="images/logo.png" height="80px" align="left">
<h1>TRAINING & PLACEMENT PORTAL</h1>
</div>
<div class="content">
<br>
<div class="title">
<h3>&nbsp; Login Menu</h3>
</div>
<br>
<br>
<br>
<div class="register" >
<div id="example-one">
        			
        	<ul class="nav">
                <li class="nav-one"><a href="#featured" class="current">TPO LOGIN</a></li>
                <li class="nav-two"><a href="#core">STUDENT LOGIN</a></li>
                <li class="nav-three last"><a href="#jquerytuts">COMPANY LOGIN</a></li>
                
            </ul>
        	
<div class="list-wrap">
        	
<ul id="featured">
<?php
if(isset($_POST["uname"]))
{
include 'connect1.php';

// username and password sent from form 
$myusername=$_POST['uname']; 
$mypassword=$_POST['password']; 

// To protect mysql injection (more detail about mysql injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $myusername);
$mypassword = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $mypassword);



$sql="select * from users where username='".$myusername."'and password='".$mypassword."' and role='tpo'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$no=mysqli_num_rows($res);
if($no==1){
session_start();
// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION['myusername'] = $myusername;
$_SESSION['mypassword'] = $mypassword;
$_SESSION['role']="tpo";
//mysql_query("INSERT INTO active(uname)
//VALUES
//('".$myusername."')"); 
header("location:tpo/tpanel1.php");
}
else
{
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('INVALID LOGIN!!', function (e) {
    window.location.href='./index.php';
});
	
    </SCRIPT>";
}
}
?>				
<?php
session_start();
if(!isset($_SESSION['myusername']))
{

echo "



<form name='tpo' method='post'>
<table align='center' >



<tr>
<td>USERNAME:&nbsp;<input type='text' name='uname' ></td>

</tr>

<tr class='even'>
<td colspan='2'>PASSWORD:<input type='password' name='password' ></td>
</tr>

<tr class='none' style='text-align:center;'>
<td colspan='2'><input type='submit' name='submit' id='submit' value='submit'></td>
</tr>

</table>
</form>
";
}
else
{
if($_SESSION['role']=="tpo")
{
header("location:tpo/tpanel1.php");
}
else
{
header("location:index.php");
}

}
?>

</ul>
        		 
<ul id="core" class="hide">
<?php
if(isset($_POST["uname1"]))
{
include 'connect1.php';

// username and password sent from form 
$myusername=$_POST['uname1']; 
$mypassword=$_POST['password']; 

// To protect mysql injection (more detail about mysql injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $myusername);
$mypassword = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $mypassword);



$sql="select * from users where username='".$myusername."'and password='".$mypassword."' and role='student'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$no=mysqli_num_rows($res);
if($no==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION['myusername'] = $myusername;
$_SESSION['mypassword'] = $mypassword;
$_SESSION['role']="student";
//mysql_query("INSERT INTO active(uname)
//VALUES
//('".$myusername."')"); 
header("location:student/spanel.php");
}
else
{
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('INVALID LOGIN!!', function (e) {
    window.location.href='./index.php';
});
	
    </SCRIPT>";
}
}

if(!isset($_SESSION['myusername']))
{
echo "
<form name='student' method='post'>
<table align='center' >



<tr>
<td colspan='2'>USERNAME:&nbsp;<input type='text' name='uname1'></td>

</tr>

<tr class='even'>
<td colspan='2'>PASSWORD:<input type='password' name='password'></td>
</tr>

<tr class='none' style='text-align:center;'>
<td colspan='2'><input type='submit' id='submit' name='submit' value='submit'></td>
</tr>


</table>
</form>
<p><a href='reg.php'>CLICK HERE TO REGISTER</a>
";

}
else
{
if($_SESSION['role']=="student")
{
header("location:student/spanel.php");
}
else
{
header("location:index.php");
}

}
?>


                   
</ul>
        		 
<ul id="jquerytuts" class="hide">
     
<?php
if(isset($_POST["uname2"]))
{
include 'connect1.php';

// username and password sent from form 
$myusername=$_POST['uname2']; 
$mypassword=$_POST['password']; 

// To protect mysql injection (more detail about mysql injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $myusername);
$mypassword = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $mypassword);



$sql="select * from users where username='".$myusername."'and password='".$mypassword."' and role='recruiter'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$no=mysqli_num_rows($res);
if($no==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION['myusername'] = $myusername;
$_SESSION['mypassword'] = $mypassword;
$_SESSION['role']="recruiter";
//mysql_query("INSERT INTO active(uname)
//VALUES
//('".$myusername."')"); 
header("location:recruiter/rpanel.php");
}
else
{
echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('INVALID LOGIN!!', function (e) {
    window.location.href='./index.php';
});
	
    </SCRIPT>";
}
}

if(!isset($_SESSION['myusername']))
{
echo "
<form name='recruiter' method='post'>
<table align='center' >



<tr>
<td colspan='2'>USERNAME:&nbsp;<input type='text' name='uname2'></td>

</tr>

<tr class='even'>
<td colspan='2'>PASSWORD:<input type='password' name='password'></td>
</tr>


<tr class='none' style='text-align:center;'>
<td colspan='2'><input type='submit' name='submit' id='submit' value='submit'></td>
</tr>


</table>
</form>

<p><a href='reg.php'>CLICK HERE TO REGISTER</a>

";

}
else
{
if($_SESSION['role']=="recruiter")
{
header("location:recruiter/rpanel.php");
}
else
{
header("location:index.php");
}

}
?>

	 
</ul>
        		 
        		 
        		 
</div>
</div>
</div>


</div>
<div class="footer">
Privacy Policy | Terms of use | FAQ's
</div>
</div>
</div>

</body>
</html>