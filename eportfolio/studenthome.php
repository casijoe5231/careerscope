<?php 
ob_start();
session_start();

include("database.php");	
include("sachive.php");

$sq3=mysqli_query($db, "UPDATE event_rows SET current_row='0'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));	

if(isset($_SESSION['login']))
{
?>

<html>
<head>
<title>Home Page of Student e-Portfolio</title>

<link href="Image/icon1.ico" rel="shortcut icon"/>
<?php include("theme_set.php"); ?>
<script language="Javascript">
function validateForm(){
if(document.getElementById('category').value=='')
{
alert("Please select an Item.");
return false;
}
return true;
}
</script>
</head>

<body>

<table align="center" border="1">
<tr><td>

  <table border="0" align="center"> 
	<tr>  <td colspan="2"><?php include("header1.php"); ?></td>  </tr>
    <tr>  <td colspan="2"><?php include("menu.php"); ?></td></tr>
    <tr>  <td colspan="2"><?php include("stopmenu.php"); ?></td></tr>
	<tr>
    	<td  width="200"><?php include("smenu.php"); ?></td>

        <td><fieldset style="width:600">
        <legend class="student">ENTER ABOUT YOUR ACHIVEMENTS</legend>
        
        <table border="0"  align="center" cellpadding="4" cellspacing="4">
        <form name="doc" method="post" action="sachivenext.php" onsubmit='return validateForm();'>			
                    <tr valign="middle">
    						<th> Student Name:</th>
    						<td colspan="3"><?php echo $fname ;?> </td>
  					</tr>
                    
  				
                    
  					<tr>
    						<th>Category:</th>
    						<td colspan="3"><label><select name="category" id="category">
                                                    <option value="">Select One</option>
                                        			<option value="Seminar">Seminar</option>
        											<option value="Work Shop">Work Shop</option>
        											<option value="Project">Project</option>
        											<option value="Techinal Fest">Techinal Fest</option>
                                                    <option value="Technical Paper/Publication">Technical Paper/Publication</option>
       												<option value="Work Experience">Work Experience</option>
                                                    <option value="Sports">Sports</option>
                                                    <!--<option value="Drawing">Drawing</option>
                                                    <option value="Dancing/Singing">Dancing/Singing</option>-->
                                                    <option value="Certification Course"> Certification Course</option>
      												</select>
    						</label></td>
                     <tr>
        
  					<tr>					
						    <td><input type="submit" name="update" value="UPDATE/DELETE" /></td>
						   	<td><input type="submit" name="next" value="ADD RECORD" /></td>
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
ob_flush();
?>