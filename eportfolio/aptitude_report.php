<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include '../connection1.php';
		$sql="select * from masteruser where email='$_GET[email]'";
		$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row=mysqli_fetch_array($res))
		{
			$name=$row['name'];
		}
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
<h3>&nbsp; My Brand menu</h3>
</div>
<br>
<br>
<br>
<div style="float:left;clear:both;margin-top:30px;">
<ul id="sidenavigation" class="MenuBarVertical">
	<li><a href="test_reports.php">Test Reports</a></li>
	<li><a href="../newindex.php">Back to home</a></li>
	</ul>
</div>
<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">
<fieldset>
<legend><img src="../images/im-user_profile.png" width="25" alt="profile" /><b>Aptitude Test Report<b></legend>
<table border=1 style="width:100%;background-color:#FFF5EE;">
<tr>
<td><b>Domain</b></td>
<td><b>Test Name</b></td>
<td><b>Total no. of attempts</b></td>
<td><b>Max. Score</b></td>
<td><b>Date of test</b></td>
</tr>
<?php

$sql1="select distinct t_id from score where username='$name'";
		$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
		while($row1=mysqli_fetch_array($res1))
		{

		$sql2="select distinct t_name,id,correct,subject,domain from test where id='$row1[t_id]'";
		$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
		while($row2=mysqli_fetch_array($res2))
		{
			$correct=$row2['correct'];
?>
<tr>
<td><?php 
if($row2['domain']=='compit' || $row2['domain']=='mech' || $row2['domain']=='extc')
{
	echo "General technical aptitude";
}
if($row2['domain']=='quant')
{
	echo "Quantitative aptitude";
}
if($row2['domain']=='logic')
{
	echo "Logical reasoning";
}
if($row2['domain']=='verbal')
{
	echo "Verbal reasoning";
}
?>
</td>
<td><?php echo $row2['t_name']  ?></td>
<td>
<?php
$sql3="select attempt from score where username='$name' and t_id='$row2[id]'";
		$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
		while($row3=mysqli_fetch_array($res3))
		{
			echo $row3['attempt'];
		}
?>
</td>
<td>
<?php
$sql4="select score,total from score where username='$name' and t_id='$row2[id]'";
		$res4=mysqli_query($GLOBALS["___mysqli_ston"], $sql4);
		while($row4=mysqli_fetch_array($res4))
		{
			echo $row4['score']."/".$row4['total'];
		}	
?>
</td>
<td>
<?php
$sql7="select DATE_FORMAT(DATE(timesql), '%d-%m-%Y') as date from score where username='$name' and t_id='$row2[id]'";
		$res7=mysqli_query($GLOBALS["___mysqli_ston"], $sql7);
		while($row7=mysqli_fetch_array($res7))
		{
			echo $row7['date'];
		}
?>
</td>
</tr>
<?php
}
}
?>
</table>
<br>
<a href="test_reports.php" style="text-decoration:none;border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; width:auto; height:50px;margin-right:10px;">Back</a>
<a href="pdf.php?email=<?php echo $_GET['email'] ?>&name=<?php echo $name ?>" target="_blank" style="text-decoration:none;border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; width:auto; height:50px;margin-right:10px;">Save as PDF</a>
</fieldset>
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