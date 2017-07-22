<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include '../connection1.php';
	 include("reextratable1.php");
 	include("javascript_enable.php");
 
 	$emaill=$_SESSION['user'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	// Tracking the user
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Academic Brand Display Artifacts','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<html>
<head>
<title>CareerScope</title>

  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
		<link href="Image/icon1.ico" rel="shortcut icon"/>

<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->


function convert(){
	window.location="ePortfolio_pdfconvertor.php";
}
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
<h3>&nbsp; Academic portfolio menu</h3>
</div>
<br>
<br>
<br>
<div style="float:left;clear:both;margin-top:30px;">
<ul id="sidenavigation" class="MenuBarVertical">
	<li><a href="register.php">Register</a></li>
	<li><a href="choose.php">Choose your mentor</a></li>
	<!--li><a href="profile.php">Job profile</a></li>
	<li><a href="goal.php">Job profiling test</a></li>
	<li><a href="know.php">Know your subjects</a></li-->
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
<table >
<tr>
    	<td width="200" valign="top"><?php include("smenu.php"); ?></td>
        <form action="eportfolio_printpreview.php" target="_blank">
		<td align="center"><h1>e-BRANDING ARTIFACTS</h1>
		<?php echo '<br>'.$dyn_table.'<br>'; echo $dyn_table2.'<br>'; echo $dyn_table4.'<br>'; echo $dyn_table5.'<br>'; echo $dyn_table3.'<br>'; echo $dyn_table1;
			
				echo '<br/><input type="submit" name="printpreview" value="Print Preview"/>';          
			?>
        </td>
        </form>
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
<?php
}
?>