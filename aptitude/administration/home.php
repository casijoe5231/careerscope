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
<title>Aptitude</title>
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
<a href="logout.php" style="border:1px solid #09F; background:#09F; padding:4px; color:#FFF;  border-radius:5px; font-size:16px; margin-right:5%; float:right;">Logout</a>
<a href="../index.php" target="_blank" style="border:1px solid #09F; background:red; padding:4px; color:#FFF;  border-color:red; border-radius:5px; font-size:16px; margin-right:2%; float:right;">View Site</a>
</h3>
</p>
<br>

<div class="panel-main">

<a href="test_editor.php">
<div class="panel_grid">
<img src="../images/new_test.png" width="65px">
<br>Add New Test
</div>
</a>

<a href="test_management.php">
<div class="panel_grid">
<img src="../images/test_manager.png" width="65px">
<br>Test Manager
</div>
</a>

<a href="show_report.php">
<div class="panel_grid">
<img src="../images/report.png" width="65px">
<br>Reports
</div>
</a>

<a href="upload_test.php">
<div class="panel_grid">
<img src="../images/upload.png" width="65px">
<br>Upload
</div>
</a>

<!--
<a href="download.php">
<div class="panel_grid">
<img src="../images/download.png" width="65px">
<br>Download
</div>
</a>
-->

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
 echo "<br><b>Access type:</b>".$_SESSION['administration'][2]."<br><br>";


 include '../connection.php';
 $sql="SELECT * FROM test";
 $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
 $count=mysqli_num_rows($res);
 echo "Tests Available: ".$count;
 
 $sql="SELECT * FROM questions";
 $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
 $count=mysqli_num_rows($res);
 echo "<br>Total Questions added: ".$count;
?>
<br>
<br>
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