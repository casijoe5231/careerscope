
<?php 
include("database.php");
			
if(isset($_SESSION['login']))
{
?>

<html>
<head>
<title>Admin's Home Page</title>

<link href="Image/icon1.ico" rel="shortcut icon"/>
<link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css" />

</head>

<body>
<table border="1" align="center">  
<tr><td>
  <table border="0"> 
	<tr>  <td colspan="2"><?php include("header.php"); ?></td>  </tr>
    <tr>  <td colspan="2"><?php include("admenu.php"); ?></td></tr>
	<tr>
    	<td  width="200" valign="top"><?php include("amenu.php"); ?></td>

        <td><?php include("admin_userdetail_table.php");?></td>
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