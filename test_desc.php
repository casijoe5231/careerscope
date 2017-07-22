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
<script  type="text/javascript" src="validator7.js" ></script>
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
<b><i><h3>Test Name:
<?php
echo $_GET['test'];
?>
</h3></i></b>
<br>
<fieldset>
<legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>Detailed Test Report<b></legend>
<table border=1 style="width:100%;background-color:#FFF5EE;">
<tr>
<td><b>Level</b></td>
<td><b>Answers given</b></td>
<td><b>Score</b></td>
<td><b>Date</b></td>
<td><b>Time Taken</b></td>
</tr>
<?php

?>
<tr>
<td>
<?php
$sql="select distinct level from techtest_questions where id='$_GET[id]'";
		$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row=mysqli_fetch_array($res))
		{
		
if($row['level']==1)
 {
	echo "Beginner";
 }
 if($row['level']==2)
 {
	echo "Intermediate";
 }
 if($row['level']==3)
 {
	echo "Expert";
 } 
 }
 ?>
</td>
<td>
<?php
$quest=1;
$sql2="select * from test_score_detail where test_score_id='$_GET[test_score_id]'";
		$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
		while($row2=mysqli_fetch_array($res2))
		{
		echo "<a href='quest_desc.php?quest_id=".$row2['q_id']."&score_id=".$row2['test_score_id']."&given_ans=".$row2['given_ans']."' style='text-decoration:none'>Question</a>".$quest++;
			if($row2['given_ans']==1)
			{
				echo ": A";
				if($row2['correct_yn']==0)
				{
					echo "<img src='images/delete2.png' width='15' alt='profile' /><br>";
				}
				if($row2['correct_yn']==1)
				{
					echo "<img src='images/correct.png' width='15' alt='profile' /><br>";
				}
			}
			if($row2['given_ans']==2)
			{
				echo ": B";
				if($row2['correct_yn']==0)
				{
					echo "<img src='images/delete2.png' width='15' alt='profile' /><br>";
				}
				if($row2['correct_yn']==1)
				{
					echo "<img src='images/correct.png' width='15' alt='profile' /><br>";
				}
				
			}
			if($row2['given_ans']==3)
			{
				echo ": C";
				if($row2['correct_yn']==0)
				{
					echo "<img src='images/delete2.png' width='15' alt='profile' /><br>";
				}
				if($row2['correct_yn']==1)
				{
					echo "<img src='images/correct.png' width='15' alt='profile' /><br>";
				}
			}
			if($row2['given_ans']==4)
			{
				echo ": D";
				if($row2['correct_yn']==0)
				{
					echo "<img src='images/delete2.png' width='15' alt='profile' /><br>";
				}
				if($row2['correct_yn']==1)
				{
					echo "<img src='images/correct.png' width='15' alt='profile' /><br>";
				}
			}
		}
?>
</td>
<td>
<?php
$sql1="select * from test_score where email='$_GET[studnt]' and test_score_id='$_GET[test_score_id]'";
		$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
		while($row1=mysqli_fetch_array($res1))
		{
		$sql2="select * from techtest_master where tm_ID='$row1[t_id]'";
		$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
		while($row2=mysqli_fetch_array($res2))
		{
		$correct=$row2['correct'];
		}
		$sql3="select q_id from techtest_questions where id='$row1[t_id]'";
		$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
        $q_total=mysqli_num_rows($res3);
		$max_score= $q_total * $correct;
		echo $row1['score']."/".$max_score;
		}
		
?>
</td>
<td>
<?php
$sql4="select DATE_FORMAT(DATE(timesql), '%d-%m-%Y') as date from test_score where t_id='$_GET[id]' and email='$_GET[studnt]' and test_score_id='$_GET[test_score_id]'";
		$res4=mysqli_query($GLOBALS["___mysqli_ston"], $sql4);
		while($row4=mysqli_fetch_array($res4))
		{
			echo $row4['date'];
		}
?>
</td>
<td>
<?php
$sql5="select * from test_score where t_id='$_GET[id]' and email='$_GET[studnt]' and test_score_id='$_GET[test_score_id]'";
		$res5=mysqli_query($GLOBALS["___mysqli_ston"], $sql5);
		while($row5=mysqli_fetch_array($res5))
		{
			$to_time = strtotime($row5['timesql']);
			$from_time = strtotime($row5['start_time']);

			$minutes = round(abs($to_time - $from_time) / 60);
			$seconds = abs($to_time - $from_time) % 60;

			echo "$minutes minute, $seconds seconds";
		}
?>
</td>
</tr>
<?php

?>
</table>
</fieldset>
<br>
<fieldset>
<legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>Feedback<b></legend>
<?php
$sql11="select * from feedback where s_email='$_GET[studnt]' and test='$_GET[test]'";
		$res11=mysqli_query($GLOBALS["___mysqli_ston"], $sql11);
		$total=mysqli_num_rows($res11);

			if($total==0)
			{
?>
<table border=0 style="width:100%">
<form name="trial" onsubmit="return validateAll()" method="post">
<tr>
<td>Write the feedback below:</td>
</tr>
<tr>
<td><textarea style="width:100%" name='feedback' id='input-feedback'  class='text2' temp="Please enter feedback." onblur="validate(this)"></textarea><br>
<label><span id="feedback" style="color:#C00;"></span></label>
</td>
</tr>
<tr>
<td>
<input type="hidden" name="mname" value="<?php echo $name ?>">
<input type="hidden" name="memail" value="<?php echo $_SESSION['email'] ?>">
<input type="hidden" name="email" value="<?php echo $_GET['studnt'] ?>">
<input type="hidden" name="test" value="<?php echo $_GET['test'] ?>">
<input type="hidden" name="level" value="<?php echo $_GET['level'] ?>">
<input type="submit" name="submit" value="Send" style="text-decoration:none;border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; width:auto; height:50px;margin-right:10px;">
</td>
</tr>
</form>
</table>
<?php
}
else
{
	echo "<center><b style='color:red'>Feedback Sent</b></center>";
}
?>
</fieldset>
<?php
if(isset($_POST['submit']))
{
echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";

$memail=$_POST['memail'];
$mname=$_POST['mname'];
$email=$_POST['email'];
$test=$_POST['test'];
$level=$_POST['level'];
$feedback=$_POST['feedback'];

$sql="insert into feedback(s_email,m_email,m_name,test,level,feedback,status) values('$email','$memail','$mname','$test','$level','$feedback','1')";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Feedback Sent!!', function (e) {
    window.location.href='test_desc.php?studnt=".$_GET['studnt']."&test=".$_GET['test']."&id=".$_GET['id']."&test_score_id=".$_GET['test_score_id']."&level=".$_GET['level']."';
});</SCRIPT>";
}
?>
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