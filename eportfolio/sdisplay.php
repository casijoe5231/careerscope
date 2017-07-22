<?php 
 include("connection1.php");
 include("reextratable.php");
 include("javascript_enable.php");
if(isset($_SESSION['login']))
{
?>

<html>
<head>
<title>Home Page of Student e-Portfolio</title>
<link href="Image/icon1.ico" rel="shortcut icon"/>
<script type="text/javascript">
function convert(){
	window.location="ePortfolio_pdfconvertor.php";
}
</script>

<?php include("theme_set.php"); ?>
</head>

<div id="main-content">

<body>
<table border="1" align="center"><tr><td>
<table border="0" align="center"> 

	<tr>  <td colspan="2"><?php include("header.php"); ?></td>  </tr>
	<tr>  <td colspan="2"><?php include("menu.php"); ?>
    <tr>  <td colspan="2"><?php include("stopmenu.php"); ?></td></tr>
	<tr>
    	<td width="200" valign="top"><?php include("smenu.php"); ?></td>
        <form action="eportfolio_printpreview.php">
		<td align="center"><h1>e-PORTFOLIO</h1>
		<?php echo '<br>'.$dyn_table.'<br>'; echo $dyn_table2.'<br>'; echo $dyn_table4.'<br>'; echo $dyn_table5.'<br>'; echo $dyn_table3.'<br>'; echo $dyn_table1;
			if($pInstitutionId== "Guest"){
				echo '<br/><input type="submit" name="printpreview" value="Print Preview" disabled/>&nbsp;<input type="submit" name="btn" value="Convert to PDF" disabled />';   
			} else{
				echo '<br/><input type="submit" name="printpreview" value="Print Preview"/>&nbsp;<input type="button" name="btn" value="Convert to PDF" onClick="convert()">';          
			}?>
        </td>
        </form>
	</tr>
    <tr>  <td colspan="2"><?php include("footer.php"); ?></td></tr>
    
</table> 
</td></tr></table>
</body> 

</div> 
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