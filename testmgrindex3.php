<?php
    session_start();
	if(isset($_SESSION['testmgr']))
	{
	include 'connection1.php';
	
	$emaill=$_SESSION['testmgr'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Testmgr Home Page','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="styles/style.css">
		<link rel="stylesheet" type="text/css" href="styles/default.css" />
		<link rel="stylesheet" type="text/css" href="styles/component.css" />
		<script src="js/modernizr.custom.js"></script>
<title>CareerScope</title>
</head>
<body>
<div class="container">
<div class="header"><img src="images/byb.jpg" width="160" height="80" alt="CareerScope logo" align="left"/>
  <img src="images/dbit.png"  width="6%" alt="DBIT"  align="right"/>

</div>
<div class="header-shadow"></div>
  
<div class="content">
 
 
  <div class="main-content">
  <!-- Main content to display -->
 
  
  <ul class="grid cs-style-3">
				<li>
					<figure>
						<img src="images/manage.jpg" alt="img02">
						<figcaption>
							<h3>Test Management</h3>
							<a href="testmgthome.php">View</a>
						</figcaption>
					</figure>
				</li>
				<li>
					<figure>
					<img src="images/Expertise.jpg" alt="img02">
						<figcaption>
							<h3>Set area of expertise</h3>
							<a href="expertise2.php">View</a>
						</figcaption>
					</figure>
				</li>
			</ul>
  </div>
  
  <div class="sidebar">
  <?php
  if(isset($_SESSION['testmgr']))
	{
		echo "<h3> Welcome, <br><img src='images/im-user_profile.png' alt='Login' height='30px' style=\"padding-top:6px;\">";
		echo $_SESSION['testmgr'][1]." ";
		echo "<a href='logout.php' class='button'>Logout</a></h3><br>";
	}
	?>	



  </div>



</div>
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
else
{
header("location:login.php");
}
?>