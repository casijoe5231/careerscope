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
<a href="student_report.php?studnt=All" style="text-decoration:none;border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; width:auto; height:50px;margin-right:10px;">Back</a>
</div>
<br>
<br>

<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">

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

$sql1="select * from test_score where email='$_SESSION[studnt]' and t_id='$_GET[test]'";
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
<td><b><a href="test_desc1.php?studnt=<?php echo $_SESSION['studnt']; ?>&test=<?php echo $row2['testname'] ?>&id=<?php echo $row2['tm_id'] ?>&test_score_id=<?php echo $row1['test_score_id']  ?>&level=<?php echo $row2['level'] ?>" style="text-decoration:none;"><?php echo $row2['testname']; ?></a></b></td>
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
 $to_time = strtotime($row1['timesql']);
 $from_time = strtotime($row1['start_time']);

			$minutes = round(abs($to_time - $from_time) / 60);
			$seconds = abs($to_time - $from_time) % 60;

			echo "$minutes minute, $seconds seconds";
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