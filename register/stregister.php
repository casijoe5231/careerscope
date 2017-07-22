<?php
    session_start();
	if(isset($_SESSION['user2']))
	{
		header('location:index.php');
		exit();
	}
	$discipline1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_GET['discipline1']);
	$institute1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_GET['institute1']);
	$_SESSION['discipline1']=$discipline1;
	$_SESSION['institute1']=$institute1;
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
<script  type="text/javascript" src="validator3.js" ></script>
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
<form action="streg.php" method="post" onsubmit="return validateAll()" enctype="multipart/form-data">

			
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
				
				<td><label><span style='color:red;'>*</span><strong>Gender:</strong></label></td>
				<td><select name="gender" id="input-gender" temp="Please select the gender" onblur="validator(this)">
				<option value="Select">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                </select><br>
				<label><span id="gender" style="color:#C00;"></span></label>
                </td></tr>
				
				
				<tr><td><label><span style="color:red;">*</span><strong>Date of birth:</strong></label></td>
				<td><input type="text" name="date" id="datepicker" class="date" style='width:50%;' temp="Please enter date." onblur="validate1(this)">
				<label><span id="date" style="color:#C00;"></span></label>
				</td>
				
				<td><label><span style='color:red;'>*</span><strong>Address:</strong></label></td>
				<td><textarea name='address' id='input-address'  class='text2' temp="Please enter address." onblur="validate2(this)"></textarea><br>
				<label><span id="address" style="color:#C00;"></span></label>
				</td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Year of passing:</strong></label></td>
				<td><select name="year" id="input-year" temp="Please select the year of passing" onblur="validator1(this)">
				<option value="Select">Select</option>
                <option value="2009">2009</option>
                <option value="2011">2011</option>
				<option value="2012">2012</option>
				<option value="2013">2013</option>
				<option value="2014">2014</option>
                </select><br>
				<label><span id="year" style="color:#C00;"></span></label>
                </td>
				
				<td><label><span style='color:red;'>*</span><strong>Branch:</strong></label></td>
				<td><select name="branch" id="input-branch" temp="Please select the branch" onblur="validator2(this)">
				<option value="Select">Select</option>
                <option value="Computer">Computer</option>
                <option value="IT">IT</option>
				<option value="Mechanical">Mechanical</option>
				<option value="Civil">Civil</option>
				<option value="None">None</option>
                </select><br>
				<label><span id="branch" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style="color:red;">*</span><strong>Date of enrollment:</strong></label></td>
				<td><?php echo date("d/m/Y") ?>
				</td>
                </tr>
                
                </table>
			</fieldset>
			
			<br>
		
			<fieldset  id="fieldset"style="border-radius:5px;" >
				<table cellpadding="12" border="0" width="auto">
				<legend>Experience</legend>
				
				<tr>
				<td><label><span style='color:red;'>*</span><strong><strong>Company name:</strong></label></td>
				<td><input  type="text" class="text2" name="company" id="input-company" temp="Please enter company name." onblur="validate3(this)" /><br>
				<label><span id="company" style="color:#C00;"></span></label>
				</td>
				
				<td><label><span style='color:red;'>*</span><strong>Job Title:</strong></label></td>
				<td><input  type="text" class="text2" name="title" id="input-title" temp="Please enter job title." onblur="validate4(this)" /><br>
				<label><span id="title" style="color:#C00;"></span></label>
				</td>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Years of Experience:</strong></label></td>
				<td><select name="experience" id="input-experience" temp="Please select years of experience" onblur="validator3(this)">
				<option value="Select">Select</option>
				<option value="Fresher">Fresher</option>
                <option value="less than 1yr">less than 1yr</option>
                <option value="1-2yrs">1-2yrs</option>
                <option value="2-3yrs">2-3yrs</option>
				<option value="3-4yrs">3-4yrs</option>
				<option value="4-5yrs">4-5yrs</option>
				<option value=">5yrs">>5yrs</option>
                </select><br>
				<label ><span id="experience" style="color:#C00;"></span></label>
                </td>
				
				<td><label><span style='color:red;'>*</span><strong>Type of experience:</strong></label></td>
				<td><select name="expertype" id="input-expertype" temp="Please select type of experience" onblur="validator4(this)">
				<option value="Select">Select</option>
				<option value="None">None</option>
                <option value="Full time">Full time</option>
                <option value="Part time">Part time</option>
                <option value="Internship">Internship/Consultancy projects</option>
                </select><br>
				<label ><span id="expertype" style="color:#C00;"></span></label>
                </td></tr>
			
				<tr><td><label><span style='color:red;'>*</span><strong>Area of expertise:</strong></label></td>
				<td><input  type="text" class="text2" name="area" id="input-area" placeholder="eg:software" temp="Please enter area of expertise." onblur="validate5(this)" /><br>
				<label><span id="area" style="color:#C00;"></span></label>
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
				
				<tr><td><label><span style='color:red;'>*</span><strong>Attach ID proof :</strong></label><br>(submit institute ID for verification)</td>
				<td><input type="file" name="file" id="input-file" style='padding:2px;border:0px;width:auto;' temp="Please select a file." onblur="validFile(this)" /><br>(only .pdf,.doc,.docx format supported)
				<label><span id="file" style="color:#C00;"></span></label></td></tr>
				
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

<input type="submit" alt="SUBMIT" value="Save Details" class="button" align="center"/>

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
