<?php
    session_start();
	if(isset($_SESSION['user1']))
	{
		header('location:index.php');
		exit();
	}
	$discipline2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_GET['discipline2']);
	$institute2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_GET['institute2']);
	$type = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_GET['type']);
	$_SESSION['discipline2']=$discipline2;
	$_SESSION['institute2']=$institute2;
	$_SESSION['type']=$type;
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
<?php
if($_SESSION['type']=='Lecturer' || $_SESSION['type']=='Test Manager' || $_SESSION['type']=='HOD')
{
?>
<form action="staffreg.php" method="post" onsubmit="return validateAll()" enctype="multipart/form-data">

			
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

				<td><label><span style="color:red;">*</span><strong>Year of enrollment:</strong></label></td>
				<td><?php echo date("Y") ?>
				</td>
                </tr>
                
                </table>
			</fieldset>
			
			<br>
		
			<fieldset  id="fieldset"style="border-radius:5px;" >
				<table cellpadding="12" border="0" width="auto">
				<legend>Other Details</legend>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Department:</strong></label></td>
				<td><select name="department" id="input-department" temp="Please select the department" onblur="validator(this)">
				<option value="Select">Select</option>
                <option value="Computer">Computer</option>
                <option value="IT">IT</option>
				<option value="Mechanical">Mechanical</option>
				<option value="EXTC">EXTC</option>
				<option value="Management">Management</option>
				<option value="Pharmacy">Pharmacy</option>
				<option value="None">None</option>
                </select><br>
				<label><span id="department" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Attach ID proof :</strong></label><br>(submit institute ID for verification)</td>
				<td><input type="file" name="file" id="input-file" style='padding:2px;border:0px;width:auto;' temp="Please select a file." onblur="validFile(this)" /><br>(only .pdf,.doc,.docx format supported)<br>
				<label><span id="file" style="color:#C00;"></span></label></td></tr>
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

<input type="submit" alt="SUBMIT" value="Save Details" class="button" align="center"/>

<br />Already Registered ? <a href="../login.php">Click here</a>

</form>
<?php
}
else
{
?>
<form action="staffreg1.php" method="post" onsubmit="return validateAll1()" enctype="multipart/form-data">

			
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

				<td><label><span style="color:red;">*</span><strong>Year of enrollment:</strong></label></td>
				<td><?php echo date("Y") ?>
				</td>
                </tr>
                
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

<input type="submit" alt="SUBMIT" value="Save Details" class="button" align="center"/>

<br />Already Registered ? <a href="../login.php">Click here</a>

</form>
<?php
}
?>
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
