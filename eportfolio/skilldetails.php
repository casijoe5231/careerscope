<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include '../connection1.php';
?>
<html>
<head>
<title>CareerScope</title>
<script src="jquery.js"></script>
  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
		<link href="Image/icon1.ico" rel="shortcut icon"/>

<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
 



<link rel="stylesheet" type="text/css" href="../css/stephen1.css">  

</head>
<body>

<div class='container'>
<div class="header"><img src="../images/byb.jpg" width="160" height="80" alt="CareerScope logo" align="left"/>
  <img src="../images/dbit.png"  width="6%" alt="DBIT"  align="right"/>
  </div>
<div class="header-shadow"></div>
<div class='content'>
<br>
<div style="float:left;"><?php include("menu.php"); ?></div>
<br>
<br>
<br>
<div class='title' style="clear:both;">
<h3>&nbsp; Academic Brand menu</h3>
</div>
<br>
<br>
<br>
<div style="float:left;clear:both;margin-top:30px;">
<ul id="sidenavigation" class="MenuBarVertical">
	<li><a href="register.php">Register</a></li>
	<li><a href="profile.php">Job profile</a></li>
	<li><a href="goal.php">Job profiling test</a></li>
	<li><a href="know.php">Know your subjects</a></li>
	<?php include("smenu.php"); ?>
  <li><a href="newindex.php">
	<?php
	if($first==1)
	echo "Create";
	else
	echo "Add";
	?></a></li>
  <li><a href="sdisplay1.php">Display</a></li>
    <li><a href="presresume.php">Resume</a></li>
	<li><a href="../newindex.php">Back to home</a></li>
	</ul>
</div>
<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">
<center>

<fieldset>
<legend><img src="../images/job.jpg" width="25" alt="profile" /><b>Job Details</b></legend>
<table border=0 style="margin-top:20px;margin-bottom:20px;">
<tr>
<td><div style="background-color:#FFF5C0"><b><i>Skill Name:</i></b></div></td>
</tr>
<tr>
<td>
<?php

	$sql="SELECT * from skill_master WHERE sm_id ='$_GET[skill]'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	while($row=mysqli_fetch_array($res))
	{
		echo "<b>".$row['skill_name']."</b><br>";
	}
	
	
?>
<br>
</td>
</tr>
<tr>
<td><div style="background-color:#FFF5C0"><b><i>Description:</i></b></div></td>
</tr>
<tr>
<td>
<?php


	$sql="SELECT * from skill_master WHERE sm_id ='$_GET[skill]'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	while($row=mysqli_fetch_array($res))
	{
		echo $row['description']."<br>";
	}

?>
<br>
</td>
</tr>
<tr>
<td><div style="background-color:#FFF5C0"><b><i>Available jobs:</i></b></div></td>
</tr>
<tr>
<td>
<?php


	$sql="SELECT * from skill_job_master WHERE s_id ='$_GET[skill]'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	while($row=mysqli_fetch_array($res))
	{
	$sql1="SELECT * from job_master WHERE jm_id ='$row[j_id]'";
	$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
	while($row1=mysqli_fetch_array($res1))
	{
		echo "<b>".$row1['job_desc']."</b><br>";
	}
	}

?>
<br>
</td>
</tr>
</table>
</fieldset>

</center>
<a href="know.php" style="text-decoration:none;color:blue;text-align:left;">&lt;&lt;&nbsp;Back</a>
</div>
<!-- Content ends here -->
</div><br>
<div class="footer">
  <div class="footer-link">
  <br>Home | Privacy Policy | Terms of use | About
  <br /> www.dbit.in
  </div>
</div>
</div>

</body>
</html>
<?php
}
?>