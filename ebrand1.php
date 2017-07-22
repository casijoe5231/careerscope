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
	include 'includes/connection1.php';
	$_SESSION['email']=$_GET['studnt'];
	
	include("reextratable1.php");
	include("javascript_enable.php");

?>
<html>
<head>
<title>Mentor</title>

  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css">
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
<h3>&nbsp; Mentor menu</h3>
</div>
<br>
<br>
<div style="float:left;clear:both;margin-top:30px;">
<ul id="sidenavigation" class="MenuBarVertical">
	
	<li><a href="mentoring.php">Student Requests</a></li>
	<li><a href="reports.php">Test reports</a></li>
	<li><a href="branding.php">Student Activity Report</a></li>
	<!--li><a href="#">Student Activity Report</a></li-->
	<li><a href="hodindex.php">Back to home</a></li>
	</ul>
</div>
<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">
<table>
<tr>
    	<td width="200" valign="top"><?php include("smenu.php"); ?></td>
		<td align="center"><h1>E-BRANDING ARTIFACTS : Activity Reports</h1>
		<?php echo '<br>'.$dyn_table.'<br>'; echo $dyn_table2.'<br>'; echo $dyn_table4.'<br>'; echo $dyn_table5.'<br>'; echo $dyn_table3.'<br>'; echo $dyn_table1;
			        
			?>
        </td>
	</tr>
	
</table>

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