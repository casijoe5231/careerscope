<?php 
include("database.php");
			
if(isset($_SESSION['login']))
{
?>

<html>
<head>
<title>Admin</title>

<link href="Image/icon1.ico" rel="shortcut icon"/>
<link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css" />

</head>

<body>
<table border="1" align="center" >  
<tr><td>
  <table border="0" > 
	<tr>  <td colspan="2"><?php include("header.php"); ?></td>  </tr>
    <tr>  <td colspan="2"><?php include("admenu.php"); ?></td></tr>
	<tr>
    	<td  width="200" valign="top"><?php include("amenu.php"); ?></td>

        <td> <form action="acc_act_connect.php" method="post">
        <fieldset style="width:600"> <legend><b>Convert Account</b></legend>
        	<table border="0" cellspacing="4" cellpadding="4" align="center">
          			<tr><td>User Name of Guest:</td>
                    	<td><?php
							
							$selectbox='<select name=\'UserName\'>';  
							$q1=mysqli_query($db, "SELECT pUserName FROM registration where pInstitutionId='Guest'")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
								while($row = mysqli_fetch_array($q1)){ 
									$selectbox.='<option value=' . $row['pUserName'] . '>' . $row['pUserName'] . '</option>';
								}
							 $selectbox.='</select>';   
							 echo  $selectbox;
						?></td>
                    </tr>
     				<tr><td><label>Convert into Registered User:</label></td>
                    	<td><select name="active">
                        		<option value="Individual">Individual User</option>
                            </select>
                    	</td>
                    </tr>
                    <tr><td><label></label></td><td><input name="convert" type="submit" value="Convert"></td></tr>
                    
            </table>
         </fieldset>
        </form></td>
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