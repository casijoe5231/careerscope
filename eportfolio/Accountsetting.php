<?php include("database.php");
include("myprofileconnect.php");

if(isset($_SESSION['login']))
{
?>

<head>

<title>ACCOUNT SETTING</title>

<?php include("theme_set.php"); ?>
<link href="Image/icon1.ico" rel="shortcut icon"/>
<script type="text/javascript" src="validation/validatioAS.js"></script>
</head>

<body>

<table align="center">
<tr><td> 
<table border="0" align="center">

	<tr><td colspan="2"><?php include("header.php"); ?></td></tr>
	<tr><td colspan="2"><?php include("stopmenu.php"); ?></td></tr>
    <tr> 
    	 <td width="200"><?php include("smenu.php"); ?></td>
    	 <div id="account">
    	 <td><form name="create" method="post" action="accountsettingconnection.php" onSubmit="return validateFormOnSubmit();">
				<fieldset style="width:600"><legend><b>Account Information</b></legend>
					<table border="0" cellspacing="4" cellpadding="4" width="300" align="center">
          			
     <tr> 
       <td><label for="password">Old Password:</label></td>
       <td><input name="Password" type="password" id="Password"></td>
     </tr>

     <tr> 
       <td><label for="password">New Password:</label></td>
       <td><input name="NPassword" type="password" id="NPassword"></td>
     </tr>

     <tr> 
       <td><label for="Verifypassword">Verify Password:</label></td>
       <td><input name="VerifyPassword" type="password" id="VerifyPassword"  /></td>
     </tr>
     
     <tr> 
       <td></td>
       <td align="center"><input name="update" type="submit" value="Update"  /></td>
     </tr>
     
	 </table>
     </fieldset>
     </form></td> </div>    
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