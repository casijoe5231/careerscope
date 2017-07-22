<?php
session_start();

if(isset($_SESSION['username']))
{ 
include '../connect1.php';
$sql="select * from recruiters where username='".$_SESSION['username']."' and role='recruiter'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
if($count==1)
{
echo"
<html>
<head>
<title>Placements</title>
<link rel='stylesheet' type='text/css' href='../css/stephen.css'>
<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
</head>
<body>

<div class='container'>
<div class='header'>
<img src='../images/logo.png' height='80px' align='left'>
<h1>TRAINING & PLACEMENT PORTAL</h1>
</div>
<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; Recruiter Menu</h3>
</div>
<br>
<br>
<br>
<br>
<div id='menu'>
<ul>

  <li><h2>Available Functions</h2>
    <ul>
      <li><a href='details.php'>Post a Job</a></li>
	  <li><a href='edit.php'>Edit a Job POST</a></li>
	  <li><a href='status.php'>Check Post Status</a></li>
	</ul>
  </li>
 
  <li><h2><a href='logout.php' style='background-color: #0066FF; border:0px; color: #fff;'>Logout</a></h2></li>
</ul>
</div>
<div class='register' >


</div>


</div>
<div class='footer'>
Privacy Policy | Terms of use | FAQ's
</div>
</div>

</body>
</html>
";
}
else
{
echo "You do not have permission to access this page.Redirecting to index Page.<meta http-equiv='refresh' content='2;url=../index.php'>";
}

}
else
{
echo "You do not have permission to access this page.Redirecting to index Page.<meta http-equiv='refresh' content='2;url=../index.php'>";
}
?>