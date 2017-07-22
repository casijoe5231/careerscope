 <?php
    session_start();
	if(!isset($_SESSION['administration']))
	{
		header('location:index.php');
		exit();
	}
	include '../styles/theme-master.php';
	?>
<!DOCTYPE html>
<html>
<head>
<title>Training & Certification</title>
<link rel="icon" href="../images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="../styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="../styles/theme-master.css">
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
<a href="logout.php" class="button right">Logout</a>
<a href="../index.php" target="_blank" style="border:1px solid #09F; background:red; padding:8px; color:#FFF;  border-color:red; border-radius:5px; font-size:16px; margin-right:2%; float:right; text-decoration: none;">View Site</a>
</h3>
</p>
<br>

<div class="panel-main">

<a href="course_editor.php">
<div class="panel_grid">
<img src="../images/new_test.png" width="65px">
<br>Add New Course
</div>
</a>

<a href="test_management.php">
<div class="panel_grid">
<img src="../images/test_manager.png" width="65px">
<br>Course Manager
</div>
</a>

<a href="show_report.php">
<div class="panel_grid">
<img src="../images/report.png" width="65px">
<br>Reports
</div>
</a>


<a href="settings.php">
<div class="panel_grid">
<img src="../images/settings2.png" width="65px">
<br>Settings
</div>
</a>

<a href="users.php">
<div class="panel_grid">
<img src="../images/users.png" width="65px">
<br>Users
</div>
</a>
<br>






<br><br><br><br>
<br><br>
</div>
<div class="panel-right">
<p style="color:white;">System Status<p>
<?php

 echo "<b>User:</b>".$_SESSION['administration'][1];
 echo "<br><b>Access type:</b>".$_SESSION['administration'][2];

?>
<br>
<br>
</div>
<br>

<br>
</div>

<?php
footer_admin_fn();
?>
</div>
</div>

</body>
</html>