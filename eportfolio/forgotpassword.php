<html>
<head>
<title>Forgot Password</title>
<link rel="stylesheet" href="mm_eportfolio.css" type="text/css">
<link href="Image/icon1.ico" rel="shortcut icon"/>
</head>

<body>
<table border="1" align="center">
	<tr><td>
		<table border="0" align="center">

            <tr><td colspan="3"><?php include("header.php"); ?></td></tr>
            <tr><td colspan="3"><?php include("menu.php"); ?></td></tr>
			<tr>
    			
        		<td colspan="2"><fieldset style="width:600">
        				<legend class="student">Forgot your Password?</legend>
                        <table border="0"  align="center" cellpadding="4" cellspacing="4"><tr><td>&nbsp;</td></tr>
        					<form action="forgotpassword_connect.php" method="post">
       							<tr><td colspan="2">To reset your password type your user name, you used to login.</td></tr>
       							<tr><th>User Name:</th><td><input type="text" name="username" size="18"></td></tr>
      							<tr><td colspan="2" align="center"><input type="submit" value="Submit" class="button"></td></tr>
                                <tr><td colspan="2">If you don't have a e-PORTFOLIO Account, you can &nbsp;<a href="register.php">create one now.</a></td></tr>
	 	 					</form>
       					</table>
    			</fieldset></td>
        		<td><?php include("rightmenu.php"); ?></td>
			</tr>
            <tr>  <td colspan="3"><?php include("footer.php"); ?></td></tr>
		</table>
   </td></tr>
</table>

</body>
</html>
