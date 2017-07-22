<?php 
include("database.php");

if(isset($_SESSION['login']))
{
?>

<head>

<title>PROFILE PIC</title>
<?php include("theme_set.php"); ?>
<link href="Image/icon1.ico" rel="shortcut icon"/>

</head>

<body>


<table border="1" align="center">
<tr><td> 
<table border="0" align="center">

	<tr><td colspan="2"><?php include("header.php"); ?></td></tr>
	<tr><td colspan="2"><?php include("stopmenu.php"); ?></td></tr>
    <tr> 
    	 <td width="200"><?php include("smenu.php"); ?></td>
		 <td> 
  			<form name="form" method="post" action="student_profilepic_Connect.php" enctype="multipart/form-data">
  			<fieldset style="width:600"><legend><b>Profile Pic</b></legend>
   			<table border="0" cellspacing="4" cellpadding="4" width="600" class="register" align="center">
				<tr> 
       				<td>  <label>Display Pic</label></td>
       				<td><input type="file" name="file" id="file"/></td>
    			 </tr> 
    		 <tr> 
       			<td align="right"><input name="submit" type="submit" value="SUBMIT"  /></td>
            </tr>
           </table>
  		 </fieldset></form>
   		</td>
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


    
	 


