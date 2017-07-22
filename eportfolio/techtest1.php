<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include 'theme-master.php';
	include '../connection1.php';
	$email=$_SESSION['user'][0];
	$name=$_SESSION['user'][1];
	/*$mentor=$_GET['mentor'];
	// Inserting the name of mentor
	for($i=0;$i<sizeof($mentor);$i++)
{
$sql="insert into approve_mentor(id,email,name,mname,status) values('','$email','$name','".$mentor[$i]."','1')";
$res=mysql_query($sql)or die("query not executed");
}*/
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	// Tracking the user
	$sql="insert into activity(email,menu_accessed,timesql) values('$email','Academic Brand Job Profiling New Test','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
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
<form action="start_test.php" onsubmit="return validateAll1()" method="get">
<?php
include '../connection1.php';
					$_SESSION['skill']=$_GET['skill'];
					$sql="SELECT * FROM techtest_skill_master where sm_id='$_SESSION[skill]'";  // Select Test
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
						while($row = mysqli_fetch_array($res))
						{
						
					$sql1="SELECT * FROM techtest_master where tm_id='$row[tm_id]'";  // Select Test
					$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
					
						while($row1 = mysqli_fetch_array($res1))
						{
						$_SESSION['test_id']=$row1['tm_id'];
							echo "<h3><img src='../images/test.png' width='20px'><b>".$row1['testname']."</h3></b>";
							echo "<br><div class='desc'><b>Test Time: </b>".$row1['test_time']." mins";
							echo "<br><br><b>Test Description: </b>".$row1['test_desc'];
							echo "<br><br><b>Test Questions:</b>".$row1['questions'];
							
							?>
							<br><br><b>Test Level:</b>
							<select name="level" id="input-level" temp="Please select the test level" onblur="validator(this)">
							<option value="Select">Select</option>
							<option value="1">Beginner</option>
							<option value="2">Intermediate</option>
							<option value="3">Expert</option>
							</select><br>
							<label><span id="level" style="color:#C00;"></span></label>
							<?php
							if($row1['questions']==0)
							echo "</div><br><br>You cannot attempt this Test as questions are yet to be added to it<br>";
							else	
							echo "</div><br><br><input type='submit' name='submit' style='cursor:pointer;' value='START TEST'><br>";	
						}
						}
					 
						
						
					 			
?>
</form>
<br>
</div>






<br><br>
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