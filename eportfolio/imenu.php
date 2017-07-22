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
<?php include("theme_set.php"); ?>
</head>

<body>
<ul id="MenuBar1" class="MenuBarVertical">
  <a href="investor_profilepic.php"><img src="<?php echo $pic; ?>" width="180" height="200" border="1"></li></a><br><br>
  <li><a href="investorhome.php">Investment e-Portfolio</a></li>  
  <li><a href="iviewfile.php">View Image/Vedio</a></li>
  <li><a href="investor_image_delete.php">Delete/Download Image</a></li>
  <li><a href="investor_graph.php">Graphical View</a> </li> 
  <li><a href="iemail.php">Email</a></li> 
  <li><a href="investor_chat.php">Chat</a></li>
  <li><a href="iupload.php">Upload Files</a></li>
  <li><a href="ireminder_setup.php">Reminder</a></li>
</ul>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
</html>
