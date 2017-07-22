<?php
    session_start();
	if(!isset($_SESSION['user']))
	{
		header("location:login.php?error=1");
	}

	if(!($_SESSION['usertype']==6 || $_SESSION['usertype']==8 || $_SESSION['usertype']==11 || $_SESSION['usertype']==13 ||
	 $_SESSION['usertype']==14 || $_SESSION['usertype']==16 || $_SESSION['usertype']==18 || $_SESSION['usertype']==19)){
		header("location:login.php?error=1");
	}
	include 'connection1.php';
	$emails=$_SESSION['user'][0];
	$name=$_SESSION['user'][1];
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
<a href="reports.php" style="text-decoration:none;border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; width:auto; height:50px;margin-right:10px;">Back</a>
</div>
<br>
<br>

<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">

<?php
if($_GET['studnt']=="All")
{
?>
<fieldset>
<legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>Test Performance Report<b></legend>
<table border=1 style="width:100%;background-color:#FFF5EE;">
<tr>
<td><b>Student Name</b></td>
<td><b>Test Taken</b></td>
<td><b>Level</b></td>
<td><b>Total no. of attempts</b></td>
<td><b>Max. Score</b></td>
<td><b>First attempt date</b></td>
<td><b>Last attempt date</b></td>
</tr>
<?php
$attempt=1;

$sql10="select distinct email,name from approve_mentor where mname='$name' and status=1";
		$res10=mysqli_query($GLOBALS["___mysqli_ston"], $sql10);
		while($row10=mysqli_fetch_array($res10))
		{
$sql1="select distinct t_id from test_score where email='$row10[email]'";
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
<td><b><a href="student_report1.php?studnt=<?php echo $row10['email'] ?>&test=<?php echo $row2['tm_id'] ?>"><?php echo $row10['name'] ?></b></td>
<td><?php echo $row2['testname']; ?></td>
<td><?php
$sql20="select distinct level from techtest_questions where id='$row2[tm_id]'";
		$res20=mysqli_query($GLOBALS["___mysqli_ston"], $sql20);
		while($row20=mysqli_fetch_array($res20))
		{
 if($row20['level']==1)
 {
	echo "Beginner";
 }
 if($row20['level']==2)
 {
	echo "Intermediate";
 }
 if($row20['level']==3)
 {
	echo "Expert";
 }
 }
 ?></td>
<td>
<?php
$sql3="select count(t_id) as t_id from test_score where email='$row10[email]' and t_id='$row2[tm_id]'";
		$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
		while($row3=mysqli_fetch_array($res3))
		{
		echo $row3['t_id'];
		}
?>
</td>
 <td>
 <?php
 $sql3="select q_id from techtest_questions where id='$row1[t_id]'";
		$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
        $q_total=mysqli_num_rows($res3);
		$max_score= $q_total * $correct;
		
		$sql4="select max(score) as score from test_score where email='$row10[email]' and t_id='$row2[tm_id]'";
		$res4=mysqli_query($GLOBALS["___mysqli_ston"], $sql4);
		while($row4=mysqli_fetch_array($res4))
		{
			echo $row4['score']."/".$max_score;
		}
		
		?>
 </td>
 <td>
<?php
	$sql6="select MIN(DATE_FORMAT(DATE(timesql), '%d-%m-%Y')) as date from test_score where t_id='$row2[tm_id]' and email='$row10[email]'";
		$res6=mysqli_query($GLOBALS["___mysqli_ston"], $sql6);
		while($row6=mysqli_fetch_array($res6))
		{
			echo $row6['date'];
		}	 	
?>
 </td>
 <td>
<?php
$sql7="select MAX(DATE_FORMAT(DATE(timesql), '%d-%m-%Y')) as date from test_score where t_id='$row2[tm_id]' and email='$row10[email]'";
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
}
?>
</table>
</fieldset>
<br>
<fieldset>
<legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>Best Performance Report<b></legend>
<table border=1 style="width:100%;background-color:#FFF5EE;">
<tr>
<td><b>Test Taken</b></td>
<td><b>Level</b></td>
<td><b>Score</b></td>
<td><b>Student Name</b></td>
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
$sql27="select max(score) as score from test_score where t_id='$row22[t_id]'";
		$res27=mysqli_query($GLOBALS["___mysqli_ston"], $sql27);
		while($row27=mysqli_fetch_array($res27))
		{
		$sql28="select user from test_score where score='$row27[score]'";
		$res28=mysqli_query($GLOBALS["___mysqli_ston"], $sql28);
		while($row28=mysqli_fetch_array($res28))
		{
			echo $row28['user'];
		}
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
<?php
}
else
{
?>
<b><i><h3>Student Name:
<?php
$_SESSION['studnt']=$_GET['studnt'];
$sql="select * from masteruser where email='$_SESSION[studnt]'";
		$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row=mysqli_fetch_array($res))
		{
		 echo $row['name'];
		}
		?>
</h3></i></b>
<br> 
<fieldset>
<legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>Test Performance Report<b></legend>
<table border=1 style="width:100%;background-color:#FFF5EE;">
<tr>
<td><b>Test Taken</b></td>
<td><b>Level</b></td>
<td><b>Attempt</b></td>
<td><b>Score</b></td>
<td><b>Date</b></td>
<td><b>Time Taken</b></td>
</tr>

<?php
$attempt=1;
$sql1="select * from test_score where email='$_SESSION[studnt]'";
		$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
		while($row1=mysqli_fetch_array($res1))
		{
			$timesql=$row1['timesql'];
		$sql2="select * from techtest_master where tm_id='$row1[t_id]'";
		$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
		while($row2=mysqli_fetch_array($res2))
		{
		 $correct=$row2['correct'];
		 
		$sql4="select DATE_FORMAT(DATE(timesql), '%d-%m-%Y') as date from test_score where t_id='$row2[tm_id]' and email='$_SESSION[studnt]' and test_score_id='$row1[test_score_id]'";
		$res4=mysqli_query($GLOBALS["___mysqli_ston"], $sql4);
		while($row4=mysqli_fetch_array($res4))
		{ 
			$timesql=$row4['date'];
			

?>
<tr>
<td><b><a href="test_desc.php?studnt=<?php echo $_SESSION['studnt']; ?>&test=<?php echo $row2['testname'] ?>&id=<?php echo $row2['tm_id'] ?>&test_score_id=<?php echo $row1['test_score_id']  ?>&level=<?php echo $row2['level'] ?>" style="text-decoration:none;"><?php echo $row2['testname']; ?></a></b></td>
<td><?php
$sql20="select distinct level from techtest_questions where id='$row2[tm_id]'";
		$res20=mysqli_query($GLOBALS["___mysqli_ston"], $sql20);
		while($row20=mysqli_fetch_array($res20))
		{
 if($row20['level']==1)
 {
	echo "Beginner";
 }
 if($row20['level']==2)
 {
	echo "Intermediate";
 }
 if($row20['level']==3)
 {
	echo "Expert";
 }
 }
 ?></td>
<td>
<?php
echo $attempt++;
?>
</td>
 <td>
 <?php
 $sql3="select q_id from techtest_questions where id='$row1[t_id]'";
		$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
        $q_total=mysqli_num_rows($res3);
		$max_score= $q_total * $correct;
		echo $row1['score']."/".$max_score;
		
		?>
 </td>
 <td>
<?php

			echo $timesql;
		 
}		
?>
 </td>
 <td>
 <?php
 $sql6="select * from test_score where email='$_SESSION[studnt]' and t_id='$row2[tm_id]'";
		$res6=mysqli_query($GLOBALS["___mysqli_ston"], $sql6);
		while($row6=mysqli_fetch_array($res6))
		{
			$to_time = strtotime($row6['timesql']);
			$from_time = strtotime($row6['start_time']);

			$minutes = round(abs($to_time - $from_time) / 60);
			$seconds = abs($to_time - $from_time) % 60;

			echo "$minutes minute, $seconds seconds";
		}
 ?>
 </td>
</tr>
<?php
}
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