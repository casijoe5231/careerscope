<?php include("database.php");
	$username = mysqli_query($db, "SELECT pUserName  FROM registration WHERE pUserName='{$_SESSION['username']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		
			
			$username1= mysqli_fetch_assoc($username);
			$username =	$username1['pUserName'];
	
			
?>

<html>

<head>

<title>Menu</title>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/iMenuBarHorizontal.css" rel="stylesheet" type="text/css">

</head>

<body>
<?php
  
if(isset($_SESSION['login']))
{
?>
<table align="right">
<tr><td>
<ul id="MenuBar1" class="MenuBarHorizontal">
  <li><a href="logout.php">Sign Out</a></li>
</ul>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"./SpryMenuBarDownHover.gif", imgRight:"./SpryMenuBarRightHover.gif"});
//-->
</script>

</td></tr>
</table>
 
</body>
</html>

<?php 
}
?>