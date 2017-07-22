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
<h3>Download Test
<a href="logout.php" style="border:1px solid #09F; background:#09F; padding:8px; color:#FFF;  border-radius:5px; font-size:16px; float:right; margin-right:5%;">Logout</a>
</h3>
<div class="nav">
<a href="home.php">Home</a>
 >
<a href="download.php">Download</a>
</div>
<br><br>

<div class="panel">
<br>
// Page Download<br>
<img src="../images/download.png" height="128px" align="left">
<br>




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