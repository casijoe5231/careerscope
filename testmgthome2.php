 <?php
    session_start();
	if(!isset($_SESSION['hod']))
	{
		header('location:login.php');
		exit();
	}
	include 'styles/theme-master.php';
	
	include 'connection1.php';
	
	$emaill=$_SESSION['hod'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Test Management Home Page','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
	?>
<!DOCTYPE html>
<html>
<head>
<title>Test Management</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="aptitude/styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="aptitude/styles/theme-master.css">
<style>
div.panel_grid:hover {
    border-color:#66CCFF;
	border-style:solid;
	background-color:#E0F5FF;
	border-radius:5px;
   -webkit-border-radius: 5px;
   -moz-border-radius: 5px;
    border-width:1px;
}
a
{
 color:#0099FF;
}
</style>
</head>

<body>
<div class="bg">
<div class="container">
<?php
header_admin_fn();
?>
<div class="content clearfix">
<p>
<h3>Dashboard
<a href="hodindex.php" style="border:1px solid #09F; background:#09F; padding:4px; color:#FFF;  border-radius:5px; font-size:16px; margin-right:5%; float:right;">Back</a>
</h3>
</p>
<br>

<div class="panel-main">

<a href="testmgt1.php">
<div class="panel_grid">
<img src="images/new_test.png" width="65px">
<br>Add New Test
</div>
</a>

<br><br><br><br>
<br><br>
</div>

<br>

<br><br><br>
</div>

<?php
footer_admin_fn();
?>
</div>
</div>

</body>
</html>