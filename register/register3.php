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
<script  type="text/javascript" src="validator2.php" ></script>
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
if(isset($_POST['type']))
{
if(empty($_SESSION['6_letters_code'] ) ||
	  strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
{
	echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Please enter correct code!!', function (e) {
    window.location.href='./index.php';
});
	
    </SCRIPT>";
}
else
{
$name = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['name']);
$email = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['email']);
$date = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['date']);
$gender = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['gender']);
$phone = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['phone']);
$country = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['country']);
$address = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['address']);
$nationality = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['nationality']);
$year = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['year']);
$type = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['type']);
$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
$_SESSION['type']=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['type']);
$_SESSION['email']=$email;

$sql1="insert into masteruser(email,password,name,enroll,year,gender,mobile,dob,country,address,nationality,candidaturetype) values('$_SESSION[email]','".md5($password)."','$name','0','$year','$gender','$phone','$date','$country','$address','$nationality','$type')";
mysqli_query($GLOBALS["___mysqli_ston"], $sql1)or die("query not executed");
?>
<form action="register_user1.php" method="post" enctype="multipart/form-data">
			<fieldset  id="fieldset"style="border-radius:5px;" >
			<table cellpadding="12" border="0" width="auto">
			<legend>Additional Details:</legend>
<?php
if($_SESSION['type']=="Affiliated to institute")
	{
	?>
		<tr><td><label><span style='color:red;'>*</span><strong>Select Institute:</strong></label></td>
		<td><select name="institute1" id="input-institute1" autofocus temp="Please select the institute" onblur="validator(this)">
		<option value="Select">Select</option>
        <option value="Don Bosco Institute of Technology">Don Bosco Institute of Technology</option>
		<option value="St. Johns institute of tech">St. Johns institute of tech</option>
		<option value="Father Agnel institute of Tech">Father Agnel institute of Tech</option>
        </select>
		<label ><span id="institute1" style="color:#C00;"></span></label>
        </td></tr>
		
		<tr><td><label><span style='color:red;'>*</span><strong>Choose Role:</strong></label></td>
		<td><select name="role" id="input-role" temp="Please select the role" onblur="validator(this)">
		<option value="Select">Select</option>
        <option value="Student">Student</option>
		<option value="Staff">Staff</option>
		<option value="Alumni">Alumni</option>
		<option value="Recruiter">Recruiter</option>
		<option value="Admin">Admin</option>
		<option value="Other">Other</option>
        </select>
		<label ><span id="role" style="color:#C00;"></span></label>
        </td></tr>
		
		<tr><td><label><span style='color:red;'>*</span><strong>Enroll for careerscope?</strong></label></td>
		<td><select name="enroll1" id="input-enroll1" temp="Please select the enrollment" onblur="validator3(this)">
		<option value="Select">Select</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
        </select>
		<label><span id="enroll1" style="color:#C00;"></span></label>
        </td></tr>
		
		<tr><td><label><span style='color:red;'>*</span><strong>Attach ID proof :</strong></label><br>(submit institute ID for verification)</td>
		<td><input type="file" name="file" id="input-file" style='padding:2px;border:0px;width:auto;' temp="Please select a file." onblur="validFile(this)" /><br>(only .pdf,.doc,.docx format supported)
		<label><span id="file" style="color:#C00;"></span></label></td></tr>
		
		<input type="submit" alt="SUBMIT" value="Save details and apply for verification" class="button" align="center"/>
		
	<?php	
	}
if($_SESSION['type']=="Guest User")
{
?>
	<tr><td><label><span style='color:red;'>*</span><strong>Enroll for careerscope?</strong></label></td>
	<td><select name="enroll2" id="input-enroll2" temp="Please select the enrollment" onblur="validator3(this)">
	<option value="Select">Select</option>
    <option value="Yes">Yes</option>
    <option value="No">No</option>
    </select>
	<label><span id="enroll2" style="color:#C00;"></span></label>
    </td></tr>
		
	<input type="submit" alt="SUBMIT" value="Payment" class="button" align="center"/>
	
<?php
}
}
}
?>
<br />
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