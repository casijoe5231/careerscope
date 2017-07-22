<?php
    session_start();
	if(isset($_SESSION['username']))
	{
		header('location:index.php');
		exit();
	}
		include '../connection.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../styles/style-main.css">
<script  type="text/javascript" src="validator.js" ></script>
<style>
#controlBoard
{
	margin-left:5%;
	width:90%;
}
</style>
<title>CareerScope Login</title>
</head>
<body>
<div class="container">
<div class="header"><img src="../images/careerscope_banner.png" width="18%" alt="CareerScope logo" align="leftt"/>
  <img src="../images/dbit.png"  width="6%" alt="DBIT"  align="right"/> </div>
<div class="header-shadow"></div>
  
<div class="content">
 
 <div class="register">

<div id="controlBoard">
<br />
<form action="register_user.php" onsubmit="return validateAll()" method="post">

			
			<fieldset id="fieldset"style="border-radius:5px;">
				<legend><img src="../images/im-user_profile.png" width="25" alt="profile" />Personal Details</legend><br>
                <table cellpadding="12" border="0" width="auto">
				<tr>
				<td><label><strong>First Name:</strong></label></td>
				<td><input  type="text" class="text2" name="fname" id="input-fname" autofocus temp="Plese enter the First name." onblur="validate(this)" />
				<label ><span id="fname" style="color:#C00;"></span></label>
				</td></tr>
	
                <tr><td><label><strong>Last Name:</strong></label></td>
				<td><input  type="text" class="text2" name="lname" id="input-lname" temp="Plese enter the Last name." onblur="validate(this)" />
				<label ><span id="lname" style="color:#C00;"></span></label>
				</td></tr>
				
				<tr><td><label><strong>Email:</strong></label></td>
				<td><input type="text" class="text2" name="email" id="input-email" placeholder="user@example.com" temp="Enter valid email ID" onblur="emailValidator(this)"/>
				<label ><span id="email" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><strong>Account Type:</strong></label></td>
				<td><select name="type">
				<option value="student">Student</option>
				<option value="staff">Staff</option>
				<option value="alumni">Alumni</option>
				<option value="parent">Parent</option>
				<option value="other">Other</option>
                </select>
				<label ><span id="class" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><strong>Class:</strong></label></td>
				<td><select name="class">
                <option value="F.E">First Year</option>
                <option value="S.E">Second Year</option>
                <option value="T.E">Third Year</option>
                <option value="B.E">Final Year</option>
				<option value="Other">None</option>
                </select>
				<label ><span id="class" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><strong>Department:</strong></label></td>
				<td><select name="branch">
                <option value="Computer">Computers</option>
                <option value="I.T.">I.T</option>
                <option value="EXTC">EXTC</option>
                <option value="MECH">Mechanical</option>
				<option value="Other">None</option>
                </select>
				<label ><span id="department" style="color:#C00;"></span></label>
                </td></tr>
                
                </table>
			</fieldset>
			
			<br>
			
			<fieldset  id="fieldset"style="border-radius:5px;" >
				<legend>Account Details:</legend>
                <table cellpadding="12" border="0" width="auto">
				               
				<tr><td><label><strong>Enter Username:</strong></label></td>
				<td><input type="text" class="text2" name="username" id="input-username" temp="Enter the username" onblur="callme(this);"/>
				<label ><span id="username" style="color:#C00;"></span></label></td></tr>
				

				<tr><td><label><strong>Enter Password:</strong></label></td>
				<td><input type="password" class="text2" name="password" id="pass-one" temp="Enter password" onblur="lengthValidate(this,'Password',8,16)"/>
				<label ><span id="password" style="color:#C00;"></span></label></td></tr>

				
				<tr><td><label><strong>Confirm Password:</strong></label></td>
				<td><input type="password" class="text2" name="repassword" id="input-repassword" onblur="passValidate(this)"/>
				<label ><span id="repassword" style="color:#C00;"></span></label></td></tr>
  
			  </table>
		</fieldset>
<br>

<input type="submit" alt="SUBMIT" value="Submit" class="button" align="center"/>


<br />Already Registered ? <a href="../login.php">Click here</a>
</form>
<br />
</div>

</div>

  




</div>
<div class="footer">
  <div class="footer-link">
  <br>Home | Privacy Policy | Terms of use | About
  <br /> www.dbit.in<br /><br />
  </div>
</div>

</div>
</body>
</html>
