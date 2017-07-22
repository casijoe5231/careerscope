<?php
include 'styles/theme-master.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
<style>
.register
{
 width:60%;
 margin-left:auto;
 margin-right:auto;
 border-style:solid;
 border-radius:15px;
 text-align:center;
}


</style>
<script  type="text/javascript" src="validator.js" ></script>
</head>
<body>
<div class="container">
<?php
header_fn();
?>
<div class="content">
<br>
<div class="title">
<h3>&nbsp; Register</h3>
</div>
<br>
<br>
<br>
<div class="register">

<div id="controlBoard">
<form action="register_user.php" onsubmit="return validateAll()" method="post">

<table cellpadding="10" border="0" width="100%">
	<tr>
		<td align="left">
			
			<fieldset id="fieldset"style="border-radius:5px;">
				<legend>Personal Details</legend><br>
				<label><strong>First Name:</strong></label><br />
				<input  type="text" class="text2" name="fname" id="input-fname" autofocus temp="Plese enter the First name." onblur="validate(this)" /><br />
				<label ><span id="fname" style="color:#C00;"></span></label>
				<br />

                <label><strong>Last Name:</strong></label><br />
				<input  type="text" class="text2" name="lname" id="input-lname" temp="Plese enter the Last name." onblur="validate(this)" /><br />
				<label ><span id="lname" style="color:#C00;"></span></label>
				<br />
				
				<label><strong>Email:</strong></label><br />
				<input type="text" class="text2" name="email" id="input-email" placeholder="user@example.com" temp="Enter valid email ID" onblur="emailValidator(this)"/><br />
				<label ><span id="email" style="color:#C00;"></span></label><br />

				<label><strong>Class:</strong></label><br />
				<select name="class">
                <option value="F.E">First Year</option>
                <option value="S.E">Second Year</option>
                <option value="T.E">Third Year</option>
                <option value="B.E">Final Year</option>
				<option value="Other">Other</option>
                </select><br />
				<label ><span id="class" style="color:#C00;"></span></label><br />
				
				<label><strong>Department:</strong></label><br />
				<select name="branch">
                <option value="Computer">Computers</option>
                <option value="I.T.">I.T</option>
                <option value="EXTC">EXTC</option>
                <option value="MECH">Mechanical</option>
                </select><br />
				<label ><span id="department" style="color:#C00;"></span></label><br />
				
				
				


			</fieldset>
			
			<br>
			
			<fieldset  id="fieldset"style="border-radius:5px;" >
				<legend>Account Details:</legend>
				<label><strong>Enter Username:</strong></label><br />
				<input type="text" class="text2" name="username" id="input-username" temp="Enter the username" onblur="callme(this);"/><br />
				<label ><span id="username" style="color:#C00;"></span></label>
				<br />

				<label><strong>Enter Password:</strong></label><br />
				<input type="password" class="text2" name="password" id="pass-one" temp="Enter password" onblur="lengthValidate(this,'Password',8,16)"/><br />
				<label ><span id="password" style="color:#C00;"></span></label>
				<br />
				
				<label><strong>Confirm Password:</strong></label><br />
				<input type="password" class="text2" name="repassword" id="input-repassword" onblur="passValidate(this)"/><br />
				<label ><span id="repassword" style="color:#C00;"></span></label>
				<br />
		</fieldset>
<br>

<input type="submit" alt="SUBMIT" value="Submit" style="border:1px solid #09F; background:#09F; padding:2%; color:#FFF;  border-radius:5px;" align="center"/>

</td>
<td></td>
</tr>
   
</table>
Already Registered ? <a href="login.php">Click here</a>
</form>
</div>

</div>
<br><br>
</div>

<?php
footer_fn();
?>
</div>
</body></html>