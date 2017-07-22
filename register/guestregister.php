<?php
    session_start();
	if(isset($_SESSION['user5']))
	{
		header('location:index.php');
		exit();
	}
	$discipline5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_GET['discipline5']);
	$_SESSION['discipline5']=$discipline5;
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
<script  type="text/javascript" src="validator6.js" ></script>
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
<div class="header"><img src="../images/byb.jpg" width="160" height="80" alt="CareerScope logo" align="leftt"/>
  <img src="../images/dbit.png"  width="6%" alt="DBIT"  align="right"/> </div>
<div class="header-shadow"></div>
  
<div class="content">
 
 <div class="register">

<div id="controlBoard">
<br />
<form action="guestreg.php" onsubmit="return validateAll()" method="post" >

			
			<fieldset id="fieldset"style="border-radius:5px;">
				<legend><img src="../images/im-user_profile.png" width="25" alt="profile" />Personal Details</legend><br>
                <table cellpadding="12" border="0" width="auto">
				<tr>
				<td><label><span style='color:red;'>*</span><strong>Name:</strong></label></td>
				<td><input  type="text" class="text2" name="name" id="input-name" autofocus temp="Please enter the name." onblur="validate(this)" /><br>
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
				
				<td><label><span style='color:red;'>*</span><strong>Branch:</strong></label></td>
				<td><select name="branch" id="input-branch" temp="Please select current year of branch" onblur="validator3(this)">
				<option value="Select">Select</option>
                <option value="Computer">Computer</option>
                <option value="EXTC">EXTC</option>
				<option value="Mechanical">Mechanical</option>
				<option value="IT">IT</option>
				<option value="None">None</option>
                </select><br>
				<label><span id="branch" style="color:#C00;"></span></label>
                </td>
				
				<tr>
				<td><label><span style="color:red;">*</span><strong>Date of enrollment:</strong></label></td>
				<td><?php echo date("d/m/Y") ?>
				</td>
                </tr>
                
                </table>
			</fieldset>
				<br>
				
			<fieldset  id="fieldset"style="border-radius:5px;" >
			<table cellpadding="12" border="0" width="auto">
				<legend>Details:</legend>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Institute name/Company name/none:</strong></label></td>
				<td><input  type="text" class="text2" name="iname" id="input-iname" temp="Please enter institute or company name." onblur="validate1(this)" /><br>
				<label><span id="iname" style="color:#C00;"></span></label>
				</td>
		
				<td><label><span style='color:red;'>*</span><strong>Professional Experience:</strong></label></td>
				<td><select name="experience" id="input-experience" temp="Please select experience" onblur="validator(this)">
				<option value="Select">Select</option>
				<option value="Student">Student</option>
				<option value="Fresher">Fresher</option>
                <option value="less than 1yr">less than 1yr</option>
                <option value="1-2yrs">1-2yrs</option>
                <option value="2-3yrs">2-3yrs</option>
				<option value="3-4yrs">3-4yrs</option>
				<option value="4-5yrs">4-5yrs</option>
				<option value=">5yrs">>5yrs</option>
                </select><br>
				<label ><span id="experience" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Type of experience:</strong></label></td>
				<td><select name="expertype" id="input-expertype" temp="Please select type of experience" onblur="validator1(this)">
				<option value="Select">Select</option>
				<option value="None">None</option>
                <option value="Full time">Full time</option>
                <option value="Part time">Part time</option>
                <option value="Internship">Internship/Consultancy projects</option>
                </select><br>
				<label ><span id="expertype" style="color:#C00;"></span></label>
                </td>
				
				<td><label><span style='color:red;'>*</span><strong>Select payment options:</strong></label></td>
				<td><select name="payment" id="input-payment" temp="Please select payment options" onblur="validator2(this)">
				<option value="Select">Select</option>
				<option value="Credit Card">Credit Card</option>
                <option value="Debit Card">Debit Card</option>
                <option value="Internet Banking">Internet Banking</option>
                </select><br>
				<label ><span id="payment" style="color:#C00;"></span></label>
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
		
		<fieldset  id="fieldset"style="border-radius:5px;" >
				<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br>
				<label for='message'>Enter the code above here :</label><br>
				<input type="text" id="6_letters_code" name="6_letters_code"><br>
				<small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
		</fieldset>
<br>

<p>Fields Marked with <span style='color:red'>*</span> are compulsory</p>
<br>

<input type="submit" alt="SUBMIT" value="Payment" class="button" align="center"/>

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
