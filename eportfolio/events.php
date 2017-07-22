<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include '../connection1.php';
	
	$emaill=$_SESSION['user'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	// Tracking the user
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Academic Brand Add Achievements','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<html>
<head>
<title>CareerScope</title>

  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
		<link href="Image/icon1.ico" rel="shortcut icon"/>
<script language="Javascript">
function validateForm(){
if(document.getElementById('category').value=='')
{
alert("Please select an Item.");
return false;
}
return true;
}
</script>
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
	<li><a href="events.php">Events</a></li>
	<!--li><a href="profile.php">Job profile</a></li>
	<li><a href="goal.php">Job profiling test</a></li>
	<li><a href="know.php">Know your subjects</a></li-->
	<li><a href="#">Add an event</a></li>
	<li><a href="../newindex.php">Back to home</a></li>
	</ul>
</div>
<!-- Content here -->
<br />
<br />
<div style="margin-left:auto;margin-right:auto;">
<table style="margin-left:200px;width:1000px;" border=1>
<tbody>
<tr>
	<th>Activity Name</th>
	<th>Description</th>
	<th>Participants</th>
	<th>Date</th>
	<th>Files</th>
</tr>
<?php

$stmt="SELECT * FROM mentoractivity WHERE state=1";
$result=mysqli_query($GLOBALS["___mysqli_ston"], $stmt) or die("query not executed");
while($row=mysqli_fetch_array($result , MYSQLI_BOTH))
{
	echo '<tr><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[6].'</td><td><a href="mentor/'.$row[5].'" target="_blank">File</a></td></tr>';
}

?>
</tbody>
</table>

<br />
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