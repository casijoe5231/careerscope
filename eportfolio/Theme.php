<?php 
 include("database.php");
if(isset($_SESSION['login']))
{
?>

<html>
<head>
<title>Theme</title>
<link href="Image/icon1.ico" rel="shortcut icon"/>
<?php include("theme_set.php"); ?>
</head>

<body>

<table align="center" border="1"> 
<tr><td>
<table border="0"> 

	<tr>  <td colspan="2"><?php include("iheader.php"); ?></td>  </tr>
    <tr>  <td colspan="2"><?php include("invmenu.php"); ?></td></tr>
	<tr>
    	<td width="200" valign="top"><?php include("imenu.php"); ?></td>
        <form method="post" action="theme_settings.php">
		<td><fieldset style="width:760"> <legend>THEMES</legend>
        	<table cellpadding="6" cellspacing="6" width="750">
			   <tr><td><img src="Image/Wood-Background.jpg" width="100" height="100"/></td>
               		<td><img src="Image/painting.jpg" width="100" height="100"/></td>
                    <td><img src="Image/vector.jpg"  width="100" height="100"/></td>
                    <td><img src="Image/default.jpg" width="100" height="100"/></td>
              </tr>
               <tr><td><input type="submit" name="theme" value="Wooden"/></td>
                	<td><input type="submit" name="theme" value="Waterfall"/></td>
                    <td><input type="submit" name="theme" value="Design" /></td>
                    <td><input type="submit" name="theme" value="Default" /></td>
              </tr>
              <tr>
                    <td><img src="Image/greylook.jpg" width="100" height="100"/></td>
              </tr>
              <tr>
					<td><input type="submit" name="theme" value="Grey Look" /></td>
              </tr>
          </table>      
        </fieldset></td>
        </form>
        
	</tr>
    <tr>  <td colspan="2"><?php include("footer.php"); ?></td></tr>
</table> 

</td></tr>
</table>

</body>  
</html> 
<?php

}
else{
?><html>
		<head>
	<script type="text/javascript">
	
			window.location="index.php";
			</script></head>
		</html>
			<?php
}
?>