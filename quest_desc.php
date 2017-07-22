<?php
    session_start();
	if(isset($_SESSION['hod']))
	{
	include 'connection1.php';
	$emails=$_SESSION['hod'][0];
	$name=$_SESSION['hod'][1];
	$_SESSION['email']=$emails;
	$sql7="select * from masteruser where email='$_SESSION[email]'";
		$res7=mysqli_query($GLOBALS["___mysqli_ston"], $sql7);
		while($row7=mysqli_fetch_array($res7))
		{
		$discipline=$row7['discipline'];
		$_SESSION['discipline']=$discipline;
		}	
?>
<html>
<head>
<title>Mentor</title>

  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <link rel="stylesheet" href="../eportfolio/SpryAssets/mm_eportfolio.css" type="text/css">
		<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">

<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
function go()
{
	document.getElementById("div1").style.display = 'block';
}
</script>

<link rel="stylesheet" type="text/css" href="css/stephen1.css">  

</head>
<body>

<div class='container'>
<div class="header"><img src="images/byb.jpg" width="160" height="80" alt="CareerScope logo" align="left"/>
  <img src="images/dbit.png"  width="6%" alt="DBIT"  align="right"/>
  </div>
<div class="header-shadow"></div>
<div class='content'>
<br>
<div class='title' style="clear:both;">
<h3>&nbsp; Mentor Report</h3>
</div>
<div style="float:right;">
<a href="student_report.php?studnt=<?php echo $_SESSION['studnt'] ?>" style="text-decoration:none;border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; width:auto; height:50px;margin-right:10px;">Back</a>
</div>
<br>
<br>

<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">
<fieldset>
<legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>Detailed Test Report<b></legend>
Green: Correct answer<br>
Red: Wrong answer<br><br>
<table border=1 style="width:100%;background-color:#FFF5EE;">
<?php
$sql="select * from test_score where test_score_id='$_GET[score_id]'";
		$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row=mysqli_fetch_array($res))
		{
		$sql1="select * from techtest_questions where id='$row[t_id]' and q_id='$_GET[quest_id]'";
		$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
		while($row1=mysqli_fetch_array($res1))
		{

?>
<tr>
<td><b>Question</b></td>
<td><?php echo $row1['question'] ?></td>
</tr>
<tr>
<td><b>Option 1:</b></td>
<?php
if(1==$row1['ans'])
{
	echo "<td style='background-color:#8FB68F'>".$row1['opt1']."</td>";
}
elseif(1==$_GET['given_ans'])
{
	echo "<td style='background-color:#E89696'>".$row1['opt1']."</td>";
}
elseif(1==$row1['ans'] && 1==$_GET['given_ans'])
{
	echo "<td style='background-color:#8FB68F'>".$row1['opt1']."</td>";
}
else
{
	echo "<td>".$row1['opt1']."</td>";
}
?>
</tr>
<tr>
<td><b>Option 2:</b></td>
<?php
if(2==$row1['ans'])
{
	echo "<td style='background-color:#8FB68F'>".$row1['opt2']."</td>";
}
elseif(2==$_GET['given_ans'])
{
	echo "<td style='background-color:#E89696'>".$row1['opt2']."</td>";
}
elseif(2==$row1['ans'] && 2==$_GET['given_ans'])
{
	echo "<td style='background-color:#8FB68F'>".$row1['opt2']."</td>";
}
else
{
	echo "<td>".$row1['opt2']."</td>";
}
?>
</tr>
<tr>
<td><b>Option 3:</b></td>
<?php
if(3==$row1['ans'])
{
	echo "<td style='background-color:#8FB68F'>".$row1['opt3']."</td>";
}
elseif(3==$_GET['given_ans'])
{
	echo "<td style='background-color:#E89696'>".$row1['opt3']."</td>";
}
elseif(3==$row1['ans'] && 3==$_GET['given_ans'])
{
	echo "<td style='background-color:#8FB68F'>".$row1['opt3']."</td>";
}
else
{
	echo "<td>".$row1['opt3']."</td>";
}
?>
</tr>
<tr>
<td><b>Option 4:</b></td>
<?php
if(4==$row1['ans'])
{
	echo "<td style='background-color:#8FB68F'>".$row1['opt4']."</td>";
}
elseif(4==$_GET['given_ans'])
{
	echo "<td style='background-color:#E89696'>".$row1['opt4']."</td>";
}
elseif(4==$row1['ans'] && 4==$_GET['given_ans'])
{
	echo "<td style='background-color:#8FB68F'>".$row1['opt4']."</td>";
}
else
{
	echo "<td>".$row1['opt4']."</td>";
}
?>
</tr>
<?php
}
}
?>
</table>
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