<?php include("database.php");
	
session_start();

$username = mysqli_query($db, "SELECT  pic FROM registration WHERE pUserName='{$_SESSION['username']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		
			
			$username= mysqli_fetch_assoc($username);
			$pic=$username['pic'];
			?>

<html>

<head>
<title>Menu</title>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/iMenuBarVertical.css" rel="stylesheet" type="text/css">
</head>

<body>
<ul id="MenuBar1" class="MenuBarVertical">
  <li><a href="display_eportfolio.php">Display e-PORTFOLIO</a></li> 
</ul>
<ul id="MenuBar2" class="MenuBarVertical">
  <li><a href="search.php">Search Resume</a></li> 
</ul>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
</html>
