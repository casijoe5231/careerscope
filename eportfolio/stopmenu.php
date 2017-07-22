<?php include("database.php");

	$username = mysqli_query($db, "SELECT ldap_username  FROM student_details WHERE ldap_username='{$_SESSION['username']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		
			
			$username1= mysqli_fetch_assoc($username);
			
			$username =	$username1['ldap_username'];
		
	
			
?>

<html>

<head>

<title>menu</title>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<?php include("theme_set.php"); ?>
</head>

<body>
<?php
  
if(isset($_SESSION['login']))
{
?>
<table align="right">
<tr><td>
<ul id="MenuBar1" class="MenuBarHorizontal">
  <li><?php echo "Hello" ;?>&nbsp;<?php echo $username;?></li>
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