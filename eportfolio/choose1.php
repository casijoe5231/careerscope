<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include '../connection1.php';
	$name=$_SESSION['user'][1];
	$emaill=$_SESSION['user'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	// Tracking the user
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Academic Brand Choose Mentor','$timesql')";
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
	<li><a href="register.php">Register</a></li>
	<!--li><a href="profile.php">Job profile</a></li>
	<li><a href="goal.php">Job profiling test</a></li>
	<li><a href="know.php">Know your subjects</a></li-->
	<li><a href="choose.php">Choose your mentor</a></li>
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
<fieldset>
        <legend><img src="../images/im-user_profile.png" width="25" alt="profile" />CHOOSE YOUR MENTOR</legend>
        <center>
        <table border="1"  style="margin-top:20px;margin-bottom:20px;">
        			
        <tr>
		<td><b>Mentor Name</b></td>
		<td><b>Designation</b></td>
		<td><b>Department</b></td>
		<td><b>Send Request</b></td>
		</tr>
		<?php
		include '../connection1.php';
		$sql="select * from istaff where is_mentor=1 and is_admin!=1 and is_tpo!=1";
		$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row=mysqli_fetch_array($res))
		{
		?>
		<tr>
		<td><?php echo $row['staff_name'] ?></td>
		<td>
		<?php
		if($row['is_director']==1)
		{
		echo "Director<br>";
		}
		if($row['is_hod']==1)
		{
		echo "Head of Department<br>";
		}
		if($row['is_principal']==1)
		{
		echo "Principal<br>";
		}
		if($row['is_lecturer']==1)
		{
		echo "Lecturer<br>";
		}
		if($row['is_tpo']==1)
		{
		echo "TPO<br>";
		}
		if($row['is_subjteacher']==1)
		{
		echo "Subject Teacher<br>";
		}
		if($row['is_testmgr']==1)
		{
		echo "Test Manager<br>";
		}
		?>
		</td>
		<td><?php echo $row['department'] ?></td>
		<td>
		<?php
		$sql1="select * from approve_mentor where name='$name' and mname='$row[staff_name]'";
		$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
		$num=mysqli_num_rows($res1);
		if($num==0)
		{
		?>
		<form name="trial" method="GET">
		<input type="hidden" name="mname" value="<?php echo $row['staff_name']; ?>">
		<input type='submit' name='submit' id='submit' value='Send request' style='cursor:pointer;'>
		</form>
		<?php
		}
		while($row1=mysqli_fetch_array($res1))
		{
		if($row1['status']==0)
		{
		echo "<h3 style='color:red;'><b>Request Sent</b></h3>";
		}
		elseif($row1['status']==1)
		{
		echo "<h3 style='color:red;'><b>Request Accepted</b></h3>";
		}
		else
		{
		echo "<h3 style='color:red;'><b>Request Rejected</b></h3>";
		}
		}
		?>
		</td>
		</tr>
		<?php
		}
		?>
		
		</table>
		</center>
    	</fieldset>
		<?php
		if(isset($_GET['submit']))
{
include 'connection1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$name1=$_SESSION['user'][1];
$email2=$_SESSION['user'][0];
$mname=$_GET['mname'];
$sql="insert into approve_mentor(id,email,name,mname,status)values('','$email2','$name1','$mname',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Request Sent!!', function (e) {
    window.location.href='choose.php';
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