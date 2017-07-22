<?php 	
include("stvconnection.php");
if(isset($_SESSION['login']))
{
?>

<html>

<head>
<title>Home Page of Student e-Portfolio</title>
<?php include("theme_set.php"); ?>
<link href="Image/icon1.ico" rel="shortcut icon"/>
</head>

<body>

<table border="1" align="center">
<tr><td>
<table border="0">
	<tr>  <td colspan="2"><?php include("header.php"); ?></td>  </tr>
    <tr>  <td colspan="2"><?php include("stopmenu.php"); ?></td></tr>
	<tr>
    	<td><?php include("smenu.php"); ?></td>
		<td><fieldset>
        		<legend class="student">ACHIVEMENTS</legend>
   					<table border="0"  align="center" cellpadding="4" cellspacing="4"><tr><td>&nbsp;</td></tr>
        				<form action="" method="post">			
             
						  <tr><td><?php echo $dyn_table; ?></td></tr>

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
?>
		
	<script type="text/javascript">
	window.location="index.php";
	</script></head>
	
<?php
}
?>