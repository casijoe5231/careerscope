<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include 'theme-master.php';
	include '../connection1.php';
	$skill=$_GET['skill'];
	$_SESSION['skill']=$skill;
	
	$emaill=$_SESSION['user'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	// Tracking the user
	$sql1="insert into activity(email,menu_accessed,timesql) values('$emaill','Academic Brand Job Profiling Retake Test','$timesql')";
	$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1)or die("query not executed");
?>
<!DOCTYPE html>
<html><head><title>Technical Tests</title>
<link rel="icon" href="../images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="../styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="../styles/theme-master.css">
<script  type="text/javascript" src="validator1.js" ></script>
<style>
.test_display
{
 width:45%;
 margin-left:auto;
 margin-right:auto;
 background-color:#FFFFFF;
 border-style:solid;
 border-radius:5px;
 -webkit-border-radius: 5px;
 -moz-border-radius: 5px;
 border-width:1px;
 padding-left:15px;
 text-align:center;
 padding-top:25px;
}
.desc
{ 
 width:60%;
 margin-left:auto;
 margin-right:auto;
 padding-top:25px;
}
</style>
</head>
<body>
<div class="bg">
<div class="container">
<?php
header_fn();
?>
<div class="content">
<br>
<?php 
// Show Logged in information
echo "<div class='title'>";
echo "<h3>&nbsp; Welcome "; 
echo $_SESSION['user'][1];
echo "</h3>";
echo "</div>";
echo "<a href='goal.php' style=\"border:1px solid #09F; background:#09F; padding:4px; color:#FFF;  border-radius:5px; float:right; font-size:16px; margin-right:5%;\">Back</a>";
?>


<div class="test_display">
<b>Tests Taken:</b>
<br><br><br><b>
<img src="../images/test.png" width="25" alt="test" /><a href="level.php" style="text-decoration:none;color:black;">
<?php
  $sql="select * from skill_master where sm_id='$_SESSION[skill]'"; // Display the tests taken
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  while($row=mysqli_fetch_array($res))
{
$skillname=$row['skill_name'];
echo $skillname;
}
?>
</a>
</b><br><br>
</div>
<br>
</div>

<?php
footer_fn();
?>
</div>
</div>

</body>
</html>
<?php
}
?>