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
<td><div style="background-color:#FFF5C0"><b><i>Job Name:</i></b></div></td>
</tr>
<tr>
<td>
<?php

	$sql2="SELECT distinct job_desc from job_master WHERE jm_id ='$_GET[job]'";
	$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
	while($row2=mysqli_fetch_array($res2))
	{
		echo "<b>".$row2['job_desc']."</b><br>";
	}
	
?>
<br>
</td>
</tr>
<tr>
<td><div style="background-color:#FFF5C0"><b><i>Engineering knowledge:</i></b></div></td>
</tr>
<tr>
<td>
<?php

	$sql2="SELECT distinct engg_knowledge from job_master WHERE jm_id ='$_GET[job]'";
	$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
	while($row2=mysqli_fetch_array($res2))
	{
		echo $row2['engg_knowledge']."<br>";
	}
?>
<br>
</td>
</tr>
<tr>
<td><div style="background-color:#FFF5C0"><b><i>Problem analysis:</i></b></div></td>
</tr>
<tr>
<td>
<?php

	$sql2="SELECT prob_analysis from job_master WHERE jm_id ='$_GET[job]'";
	$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
	while($row2=mysqli_fetch_array($res2))
	{
		echo $row2['prob_analysis']."<br><br>";
	}

?>
</td>
</tr>
<tr>
<td><div style="background-color:#FFF5C0"><b><i>Design/Development of solutions:</i></b></div></td>
</tr>
<tr>
<td>
<?php

	$sql2="SELECT development from job_master WHERE jm_id ='$_GET[job]'";
	$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
	while($row2=mysqli_fetch_array($res2))
	{
		echo $row2['development']."<br><br>";
	}

?>
</td>
</tr>
<tr>
<td><div style="background-color:#FFF5C0"><b><i>Conduct investigation of complex problems:</i></b></div></td>
</tr>
<tr>
<td>
<?php

	$sql2="SELECT investigation from job_master WHERE jm_id ='$_GET[job]'";
	$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
	while($row2=mysqli_fetch_array($res2))
	{
		echo $row2['investigation']."<br><br>";
	}

?>
</td>
</tr>
<tr>
<td><div style="background-color:#FFF5C0"><b><i>Model tool usage:</i></b></div></td>
</tr>
<tr>
<td>
<?php

	$sql2="SELECT model_tool from job_master WHERE jm_id ='$_GET[job]'";
	$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
	while($row2=mysqli_fetch_array($res2))
	{
		echo $row2['model_tool']."<br><br>";
	}

?>
</td>
</tr>
<tr>
<td><div style="background-color:#FFF5C0"><b><i>Ethics:</i></b></div></td>
</tr>
<tr>
<td>
<?php

	$sql2="SELECT ethics from job_master WHERE jm_id ='$_GET[job]'";
	$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
	while($row2=mysqli_fetch_array($res2))
	{
		echo $row2['ethics']."<br><br>";
	}

?>
</td>
</tr>
<tr>
<td><div style="background-color:#FFF5C0"><b><i>Individual and team work:</i></b></div></td>
</tr>
<tr>
<td>
<?php

	$sql2="SELECT team_work from job_master WHERE jm_id ='$_GET[job]'";
	$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
	while($row2=mysqli_fetch_array($res2))
	{
		echo $row2['team_work']."<br><br>";
	}

?>
</td>
</tr>
<tr>
<td><div style="background-color:#FFF5C0"><b><i>Communication:</i></b></div></td>
</tr>
<tr>
<td>
<?php

	$sql2="SELECT communication from job_master WHERE jm_id ='$_GET[job]'";
	$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
	while($row2=mysqli_fetch_array($res2))
	{
		echo $row2['communication']."<br><br>";
	}

?>
</td>
</tr>
<tr>
<td><div style="background-color:#FFF5C0"><b><i>Project management and finance:</i></b></div></td>
</tr>
<tr>
<td>
<?php

	$sql2="SELECT project_mgt from job_master WHERE jm_id ='$_GET[job]'";
	$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
	while($row2=mysqli_fetch_array($res2))
	{
		echo $row2['project_mgt']."<br><br>";
	}

?>
</td>
</tr>
<tr>
<td><div style="background-color:#FFF5C0"><b><i>Life long learning:</i></b></div></td>
</tr>
<tr>
<td>
<?php

	$sql2="SELECT learning from job_master WHERE jm_id ='$_GET[job]'";
	$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
	while($row2=mysqli_fetch_array($res2))
	{
		echo $row2['learning']."<br><br>";
	}

?>
</td>
</tr>
<tr>
<td><div style="background-color:#FFF5C0"><b><i>Technical responsibilities:</i></b></div></td>
</tr>
<tr>
<td>
<?php

	$sql2="SELECT responsibilities from job_master WHERE jm_id ='$_GET[job]'";
	$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
	while($row2=mysqli_fetch_array($res2))
	{
		echo $row2['responsibilities']."<br><br>";
	}

?>
</td>
</tr>
</table>
</fieldset>

</center>
<a href="profile.php" style="text-decoration:none;color:blue;text-align:left;">&lt;&lt;&nbsp;Back</a>
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