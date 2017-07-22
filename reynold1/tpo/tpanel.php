<?php
session_start();

if(isset($_SESSION['username']))
{ 
include '../connect1.php';
$sql="select * from users where username='".$_SESSION['username']."' and role='tpo'";
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
<h3>&nbsp; TPO Menu</h3>
</div>


<div id='menu'>
                <ul>
                    <li><a class='current' href='tpo.php'>Home</a></li>
                    <li><a href='about.html' >About Us</a></li>
                    <li><a href='services.html'>Services</a></li>
					
                    
                    <li><a href='forms.html'>Utilities</a></li>
                    <li><a href='contact.html'>Contact</a></li>
                </ul>
			
</div>
<br>
<br>

<div class='register' >

<table align='center'>


<tr class='even'>
<td colspan='2'><a href='tpo.php'>Post a Job</a></td>
</tr>

<tr>
<td colspan='2'><a href='post.php'>Edit a Job POST</a></td>
</tr>

<tr class='even'>
<td colspan='2'><a href='dreview.php'>Delete/approve reviews</a></td>
</tr>

<tr>
<td colspan='2'><a href='status.php'>View Company Posts</a></td>
</tr>

<tr>
<td colspan='2'><a href='verify.php'>Verify Company Details</a></td>
</tr>

<tr>
<td colspan='2'><a href='details.php'>View Student Details</a></td>
</tr>

<tr>
<td colspan='2'><a href='stats.php'>View companies statistics</a></td>
</tr>

<tr>
<td colspan='2'><a href='set.php'>Confirm Students</a></td>
</tr>

<tr>
<td colspan='2'><a href='appeared.php'>Set Student Status</a></td>
</tr>

<tr>
<td colspan='2'><a href='joboffer.php'>Confirm Student proposals</a></td>
</tr>

<tr>
<td colspan='2'><a href='logout.php'>Logout</a></td>
</tr>

</table>
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
echo "You do not have permission to access this page.Redirecting to Index Page.<meta http-equiv='refresh' content='2;url=../index.php'>";
}

}
else
{
echo "You do not have permission to access this page.Redirecting to index Page.<meta http-equiv='refresh' content='2;url=../index.php'>";
}
?>