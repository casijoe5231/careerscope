<?php include("database.php");
	
if(isset($_SESSION['login']))
{
?>

<html>
<head>
<title>Home Page of Student e-Portfolio</title>
<link href="Image/icon1.ico" rel="shortcut icon"/>
<?php include("theme_set.php"); ?>
</head>

<body>

<table align="center">
<tr><td>
<table border="0">
	<tr>  <td colspan="2"><?php include("header.php"); ?></td>  </tr>
    <tr>  <td colspan="2"><?php include("stopmenu.php"); ?></td></tr>
	<tr>
    	<td width="200"><?php include("smenu.php"); ?></td>

    
        <td><fieldset style="width:600">
        <legend class="student">UPLOAD</legend>
<table border="0"  align="center" cellpadding="4" cellspacing="4">
<form action="upload1.php" method="post" enctype="multipart/form-data">
<tr>
	<td><label for="file">Filename:</label></td>
	<td><input type="file" name="file" id="file" /> </td>
</tr>
<tr>
	<td align="center" colspan="2"><input type="submit" name="submit" value="Submit" /></td>
    
</tr>
</form>
</table>
    </fieldset></td>
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