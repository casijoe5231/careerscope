<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="icon" href="../images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="../css/style3.css">
<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
<style>
.register
{
 width:60%;
 margin-left:auto;
 margin-right:auto;
 border-style:solid;
 border-radius:15px;
}
fieldset
{
width:70%;

margin-left:auto;
 margin-right:auto;
}


</style>
<script  type="text/javascript" src="validator1.js" ></script>
</head>
<body>
<div class="container">
<div class="header">
<img src="../images/logo.png" height="80px" align="left">
<h1>TRAINING & PLACEMENT PORTAL</h1>
</div>
<div class="content">
<br>
<div class="title">
<h3>&nbsp; Register</h3>
</div>
<br>
<br>
<br>
<div class="register">

<div id="controlBoard" >
<form action="tcheck.php" onsubmit="return validateAll()" method="post">




			<fieldset id="fieldset"style="border-radius:5px;">
				<legend><b>Personal Details</b></legend><br>
				<label><span style="color:red;">*</span>Full Name:</label><br />
				<input  type="text" class="text2" name="fname" id="input-fname" autofocus placeholder="Please enter your name" temp="Plese enter your name." onblur="validate(this)" /><br />
				<label ><span id="fname" style="color:#C00;"></span></label>
				<br />
				
				<label><span style="color:red;">*</span>Phone number:</label><br />
				<input type="text" class="text2" name="phone" id="input-number" placeholder="Should be 10 digits" temp="Enter valid phone number" onblur="numberValidator(this)"/><br />
				<label ><span id="phone" style="color:#C00;"></span></label><br />
                
				
				<label><span style="color:red;">*</span>Email:</label><br />
				<input type="text" class="text2" name="email" id="input-email" placeholder="user@example.com" temp="Enter valid email ID" onblur="emailValidator(this)"/><br />
				<label ><span id="email" style="color:#C00;"></span></label><br />

			</fieldset>

			<br/>
			<fieldset  id="fieldset"style="border-radius:5px;" >
				<legend><b>Account Details:</b></legend>
				<label><span style="color:red;">*</span>Enter Username:</label><br />
				<input type="text" class="text2" name="username" id="input-username" temp="Enter the username" onblur="callme(this);"/><br />
				<label ><span id="username" style="color:#C00;"></span></label>
				<br />

				<label><span style="color:red;">*</span>Enter Password:</label><br />
				<input type="password" class="text2" name="password" id="pass-one" temp="Enter password" onblur="lengthValidate(this,'Password',8,16)"/><br />
				<label ><span id="password" style="color:#C00;"></span></label>
				<br />
				
				<label><span style="color:red;">*</span>Confirm Password:</label><br />
				<input type="password" class="text2" name="repassword" id="input-repassword" onblur="passValidate(this)"/><br />
				<label ><span id="repassword" style="color:#C00;"></span></label>
				<br />
				
				<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br>
				<label for='message'>Enter the code above here :</label><br>
				<input type="text" id="6_letters_code" name="6_letters_code"><br>
				<small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
				<br />
		</fieldset>
<br>

<p><input type="submit" alt="SUBMIT" value="Submit" name="submit" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px;" align="center"/></p>


<p><a href='tlogin.php' style='color:blue;text-transform:none;text-decoration:none;'>&lt;&lt;&nbsp;PREVIOUS PAGE</a></p>

<p><span style="color:red;">*</span> indicates mandatory field</p>
</form>
</div>

</div>
<br><br>
</div>

<div class="footer">
Privacy Policy | Terms of use | FAQ's
</div>
</div>
</body></html>