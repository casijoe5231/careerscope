<?php
    session_start();
	if(isset($_SESSION['username']))
	{
		header('location:index.php');
		exit();
	}
		include '../connection1.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../styles/style-main.css">

<link rel="stylesheet" href="../styles/datePicker.css" />
  <script src="../js/jquery.min.js"></script>
  <script src="../js/date.js"></script>
  <script src="../js/jquery.datePicker.js"></script>
  <script>
  $(function()
{
	$('#datepicker').datePicker({startDate: '01/01/1970',
			endDate: (new Date()).asString()})
	
});

  </script>
  <script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
<script  type="text/javascript" src="validator1.js" ></script>
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
<form action="register2.php" onsubmit="return validateAll()" method="post">

			
			<fieldset id="fieldset"style="border-radius:5px;">
				<legend><img src="../images/im-user_profile.png" width="25" alt="profile" />Personal Details</legend><br>
                <table cellpadding="12" border="0" width="auto">
				<tr>
				<td><label><span style='color:red;'>*</span><strong>Name:</strong></label></td>
				<td><input  type="text" class="text2" name="name" id="input-name" autofocus temp="Please enter the name." onblur="validate(this);" /><br>
				<label><span id="name" style="color:#C00;"></span></label>
				</td>
				
				<td><label><span style="color:red;">*</span><strong>Mobile number:</strong></label></td>
				<td><input type="text" class="text2" name="phone" id="input-number" placeholder="Should be 10 digits" temp="Enter valid phone number"  onblur="numberValidator(this)"/><br>
				<label><span id="phone" style="color:#C00;"></span></label>
				</td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Email:</strong></label></td>
				<td><input type="text" class="text2" name="email" id="input-email" placeholder="user@example.com" temp="Enter valid email ID" onblur="emailValidator(this)"/><br>
				<label><span id="email" style="color:#C00;"></span></label>
                </td>
				
				<td><label><span style='color:red;'>*</span><strong>Nationality:</strong></label></td>
				<td><select name="nationality" id="input-nationality" temp="Please select the nationality" onblur="validator2(this)">
				<option value="Select">Select</option>
                <option value="Indian">Indian</option>
                <option value="American">American</option>
                <option value="British">British</option>
                </select><br>
				<label><span id="nationality" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style="color:red;">*</span><strong>Date of birth:</strong></label></td>
				<td><input type="text" name="date" id="datepicker" class="date" style='width:50%;' temp="Please enter date." onblur="validate1(this)">
				<label><span id="date" style="color:#C00;"></span></label>
				</td>
				
				<td><label><span style='color:red;'>*</span><strong>Country:</strong></label></td>
				<td><select name="country" id="input-country" temp="Please select the country" onblur="validator1(this)">
				<option value="Select">Select</option>
                <option value="India">India</option>
                <option value="Australia">Australia</option>
                <option value="Singapore">Singapore</option>
                <option value="Nepal">Nepal</option>
                </select><br>
				<label><span id="country" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Gender:</strong></label></td>
				<td><select name="gender" id="input-gender" temp="Please select the gender" onblur="validator(this)">
				<option value="Select">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                </select><br>
				<label><span id="gender" style="color:#C00;"></span></label>
                </td>
				
				<td><label><span style='color:red;'>*</span><strong>Address:</strong></label></td>
				<td><textarea name='address' id='input-address'  class='text2' temp="Please enter address." onblur="validate2(this)"></textarea><br>
				<label><span id="address" style="color:#C00;"></span></label>
				</td></tr>
				
				<tr><td><label><span style="color:red;">*</span><strong>Year of enrollment:</strong></label></td>
				<td><?php echo date("Y") ?>
				</td>
                
				<td><label><span style='color:red;'>*</span><strong>Candidature Type:</strong></label></td>
				<td><select name="type" id="input-type" temp="Please select the type of account" onblur="validator3(this)">
				<option value="Select">Select</option>
				<option value="Affiliated to institute">Affiliated to institute</option>
				<option value="Guest User">Guest User</option>
                </select><br>
				<label><span id="type" style="color:#C00;"></span></label>
                </td></tr>
                
                </table>
			</fieldset>
			
			<br>
			
			<fieldset  id="fieldset"style="border-radius:5px;" >
				<legend>Account Details:</legend>
                <table cellpadding="12" border="0" width="auto">

				<tr><td><label><span style='color:red;'>*</span><strong>Enter Password:</strong></label></td>
				<td><input type="password" class="text2" name="password" id="pass-one" temp="Enter password" onblur="lengthValidate(this,'Password',8,16)"/>
				<label><span id="password" style="color:#C00;"></span></label></td></tr>

				<tr><td><label><span style='color:red;'>*</span><strong>Confirm Password:</strong></label></td>
				<td><input type="password" class="text2" name="repassword" id="input-repassword" onblur="passValidate(this)"/>
				<label><span id="repassword" style="color:#C00;"></span></label></td></tr>
				
			  </table>
		</fieldset>
		
		
		
<br>

<p>Fields Marked with <span style='color:red'>*</span> are compulsory</p>

<input type="submit" alt="SUBMIT" value="Continue" class="button" align="center"/>
<br>

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
