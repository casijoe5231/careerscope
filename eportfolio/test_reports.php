<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include '../connection1.php';
	$email=$_SESSION['user'][0];
	$name=$_SESSION['user'][1];
		
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$email','My Brand Test Reports','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<html>
<head>
<title>CareerScope</title>
<script src="jquery.js"></script>
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
<script>

$(document).ready(function()
{
$('#loginbutton').click(function(){
$('#loginarea').slideToggle();
})

$('#loginbutton1').click(function(){
$('#loginarea1').slideToggle();
})
})
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
	<li><a href="invitation.php">Invitation</a></li>
	<li><a href="../newindex.php">Back to home</a></li>
	</ul>
</div>
<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">
<fieldset>
<legend><img src="../images/im-user_profile.png" width="25" alt="profile" /><b>Test Performance Report<b></legend>
<table border=0 style="width:100%">
<tr>
<td><img src="../images/test.png" width="25" alt="profile" />
<input type="button" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; width:auto; height:50px;margin-left:2px;" id="loginbutton" value="Aptitude Test Report"  ><br><br>
<div id="loginarea" style="display:none;">
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
if($row2['domain']=='analytics')
{
	echo "Analytical reasoning";
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
<a href="pdf.php?email=<?php echo $email ?>&name=<?php echo $name ?>" target="_blank" style="text-decoration:none;border:1px solid #09F; background:#369; padding:5px; color:#FFF;  border-radius:5px; width:auto; height:50px;margin-right:10px;">Save as PDF</a>

</div>
<br>
</td>
</tr>
<tr>
<td><img src="../images/test.png" width="25" alt="profile" />
<input type="button" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; width:auto; height:50px;margin-left:2px;" id="loginbutton1" value="Technical Test Report"  ><br><br>
<div id="loginarea1" style="display:none;">
<table border=1 style="width:100%;background-color:#FFF5EE;">
<tr>
<td><b>Test Name</b></td>
<td><b>Level</b></td>
<td><b>Total no. of attempts</b></td>
<td><b>Max. Score</b></td>
<td><b>First attempt date</b></td>
<td><b>Last attempt date</b></td>
<td><b>Feedback</b></td>
</tr>
<?php
$sql1="select distinct t_id from test_score where email='$email'";
		$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
		while($row1=mysqli_fetch_array($res1))
		{

		$sql2="select distinct testname,level,tm_id,correct from techtest_master where tm_id='$row1[t_id]'";
		$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
		while($row2=mysqli_fetch_array($res2))
		{
			$correct=$row2['correct'];
?>
<tr>
<td><?php echo $row2['testname']; ?></td>
<td><?php
 if($row2['level']==1)
 {
	echo "Beginner";
 }
 if($row2['level']==2)
 {
	echo "Intermediate";
 }
 if($row2['level']==3)
 {
	echo "Expert";
 }
 ?>
</td>
<td>
<?php
$sql3="select count(t_id) as t_id from test_score where email='$email' and t_id='$row2[tm_id]'";
		$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
		while($row3=mysqli_fetch_array($res3))
		{
		echo $row3['t_id'];
		}
?>
</td>
<td>
<?php
 $sql5="select q_id from techtest_questions where id='$row2[tm_id]'";
		$res5=mysqli_query($GLOBALS["___mysqli_ston"], $sql5);
        $q_total=mysqli_num_rows($res5);
		$max_score= $q_total * $correct;

$sql4="select max(score) as score from test_score where email='$email' and t_id='$row2[tm_id]'";
		$res4=mysqli_query($GLOBALS["___mysqli_ston"], $sql4);
		while($row4=mysqli_fetch_array($res4))
		{
			echo $row4['score']."/".$max_score;
		}
?>
</td>
<td>
<?php
$sql6="select MIN(DATE_FORMAT(DATE(timesql), '%d-%m-%Y')) as date from test_score where t_id='$row2[tm_id]' and email='$email'";
		$res6=mysqli_query($GLOBALS["___mysqli_ston"], $sql6);
		while($row6=mysqli_fetch_array($res6))
		{
			echo $row6['date'];
		}
?>
</td>
<td>
<?php
$sql7="select MAX(DATE_FORMAT(DATE(timesql), '%d-%m-%Y')) as date from test_score where t_id='$row2[tm_id]' and email='$email'";
		$res7=mysqli_query($GLOBALS["___mysqli_ston"], $sql7);
		while($row7=mysqli_fetch_array($res7))
		{
			echo $row7['date'];
		}
?>
</td>
<td>
<?php
$sql8="select * from feedback where test='$row2[testname]' and level='$row2[level]' and s_email='$email'";
		$res8=mysqli_query($GLOBALS["___mysqli_ston"], $sql8);
		while($row8=mysqli_fetch_array($res8))
		{
		 echo "<b>Mentor Name:</b>".$row8['m_name']."<br>";
		 echo "<b style='color:red'>".$row8['feedback']."</b><br><br>";
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
<a href="pdf1.php?email=<?php echo $email ?>&name=<?php echo $name ?>" target="_blank" style="text-decoration:none;border:1px solid #09F; background:#369; padding:5px; color:#FFF;  border-radius:5px; width:auto; height:50px;margin-right:10px;">Save as PDF</a>
<br><br>
<fieldset>
<legend><img src="../images/im-user_profile.png" width="25" alt="profile" /><b>Best Performance Report<b></legend>
<table border=1 style="width:100%;background-color:#FFF5EE;">
<tr>
<td><b>Test Taken</b></td>
<td><b>Level</b></td>
<td><b>Score</b></td>
<td><b>Time taken</b></td>
</tr>
<?php
$sql22="select distinct t_id from test_score";
		$res22=mysqli_query($GLOBALS["___mysqli_ston"], $sql22);
		while($row22=mysqli_fetch_array($res22))
		{
		$sql24="select distinct testname,level,tm_id,correct from techtest_master where tm_id='$row22[t_id]'";
		$res24=mysqli_query($GLOBALS["___mysqli_ston"], $sql24);
		while($row24=mysqli_fetch_array($res24))
		{
		 $correct=$row24['correct'];
?>
<tr>
<td><?php echo $row24['testname']; ?></td>
<td>
<?php
$sql26="select distinct level from techtest_questions where id='$row24[tm_id]'";
		$res26=mysqli_query($GLOBALS["___mysqli_ston"], $sql26);
		while($row26=mysqli_fetch_array($res26))
		{
 if($row26['level']==1)
 {
	echo "Beginner";
 }
 if($row26['level']==2)
 {
	echo "Intermediate";
 }
 if($row26['level']==3)
 {
	echo "Expert";
 }
 }
 ?>
</td>
<td>
<?php
 $sql25="select q_id from techtest_questions where id='$row22[t_id]'";
		$res25=mysqli_query($GLOBALS["___mysqli_ston"], $sql25);
        $q_total=mysqli_num_rows($res25);
		$max_score= $q_total * $correct;
		
$sql23="select max(score) as score from test_score where t_id='$row22[t_id]'";
		$res23=mysqli_query($GLOBALS["___mysqli_ston"], $sql23);
		while($row23=mysqli_fetch_array($res23))
		{
			echo $row23['score']."/".$max_score;
		}
?>
</td>
<td>
<?php
$sql29="select max(score) as score from test_score where t_id='$row22[t_id]'";
		$res29=mysqli_query($GLOBALS["___mysqli_ston"], $sql29);
		while($row29=mysqli_fetch_array($res29))
		{
		$sql30="select start_time,timesql from test_score where score='$row29[score]'";
		$res30=mysqli_query($GLOBALS["___mysqli_ston"], $sql30);
		while($row30=mysqli_fetch_array($res30))
		{
			$to_time = strtotime($row30['timesql']);
			$from_time = strtotime($row30['start_time']);

			$minutes = round(abs($to_time - $from_time) / 60);
			$seconds = abs($to_time - $from_time) % 60;

			echo "$minutes minute, $seconds seconds";

		}
		}
?>
</td>
</tr>
<?php
}
}
?>
</table>
</fieldset>
</div>
<br>
</td>
</tr>
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