<?php
    session_start();
	if(isset($_SESSION['admin']))
	{
	include 'connection1.php';
	
	$emails=$_SESSION['admin'][0];
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emails','Admin Existing Staff Details','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<html>
<head>
<title>Administrator</title>

  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css">
		<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<script  type="text/javascript" src="validator2.js" ></script>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
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
<h3>&nbsp; Administrator menu</h3>
</div>
<br>
<br>
<div style="float:left;clear:both;margin-top:30px;">
<ul id="sidenavigation" class="MenuBarVertical">
	<li><a href="adminindex.php">Add staff</a></li>
	<li><a href="sdetails.php">Existing Staff Details</a></li>
	<li><a href="modify.php">Modify staff</a></li>
	<li><a href="logout.php">Logout</a></li>
	</ul>
</div>
<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">
<fieldset>
        <legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>EXISTING STAFF DETAILS<b></legend>
		<center>

        <table border="1"  style="margin-top:20px;margin-bottom:20px;">
		
		<tr>
		<th><b>Staff Name</b></th>
		<th><b>Email</b></th>
		<th><b>Mobile No.</b></th>
		<th><b>Discipline</b></th>
		<th><b>Department</b></th>
		<th><b>Role</b></th>
		</tr>
		<?php
		$sql="select * from masteruser where role='Staff'";
		$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row=mysqli_fetch_array($res))
		{
		$sql1="select * from istaff where email='$row[email]' and is_admin!=1";
		$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
		while($row1=mysqli_fetch_array($res1))
		{
		?>
		<tr><td><?php echo $row['name'] ?></td>
		<td><?php echo $row['email'] ?></td>
		<td><?php echo $row['mobile'] ?></td>
		<td><?php echo $row['discipline'] ?></td>
		<td><?php echo $row1['department'] ?></td>
		<td>
		<?php
		if($row1['is_director']==1)
		{
		echo "Director<br>";
		}
		if($row1['is_principal']==1)
		{
		echo "Principal<br>";
		}
		if($row1['is_hod']==1)
		{
		echo "HOD<br>";
		}
		if($row1['is_tpo']==1)
		{
		echo "TPO<br>";
		}
		if($row1['is_mentor']==1)
		{
		echo "Mentor<br>";
		}
		if($row1['is_testmgr']==1)
		{
		echo "Test Manager<br>";
		}
		if($row1['is_lecturer']==1)
		{
		echo "Lecturer<br>";
		}
		if($row1['is_subjteacher']==1)
		{
		echo "Subject Teacher<br>";
		}
		?>
		</td>
		</tr>
		<?php
		}
		}
		?>
		
        </table>
		
		</center>
    	</fieldset>
		<?php
		if(isset($_POST['submit']))
{
include 'connection1.php';
echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
$email=$_POST['email'];

$sql="update masteruser set status=2 where email='$email'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Email Sent!!', function (e) {
    window.location.href='adminindex.php';
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