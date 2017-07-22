<?php include("database.php");
	
if(isset($_SESSION['login']))
{
?>

<html>
<head>
<title>Files</title>

<?php include("theme_set.php"); ?>
<link href="Image/icon1.ico" rel="shortcut icon"/>

</head>
<body>
<table border="1" align="center"  width="500" > 
<tr><td>
<table border="0"> 
	<tr>  <td colspan="2"><?php include("header.php"); ?></td>  </tr>
    <tr>  <td colspan="2"><?php include("stopmenu.php"); ?></td></tr>
	<tr>
    	<td valign="top"><?php include("smenu.php"); ?></td>
         <td align="center"><?php include("svfconnection.php");?></td>
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
	</script>
	</head>
</html>
<?php
}
?>