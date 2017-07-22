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
if($_POST['enroll2']=='Yes')
{
	$enroll2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['enroll2']);
	
$sql1="update masteruser set enroll='$enroll2' where email='$_SESSION[email]'";
mysqli_query($GLOBALS["___mysqli_ston"], $sql1)or die("query not executed");
$sql1="update masteruser set role='$_SESSION[type]' where email='$_SESSION[email]'";
mysqli_query($GLOBALS["___mysqli_ston"], $sql1)or die("query not executed");

?>
<form action="register_user2.php" method="post" enctype="multipart/form-data">
			<fieldset  id="fieldset"style="border-radius:5px;" >
			<table cellpadding="12" border="0" width="auto">
				<legend>Details:</legend>
<?php
if($_SESSION['type']=="Guest User")
	{
?>
	<tr><td><label><span style='color:red;'>*</span><strong>Institute name/Company name/none:</strong></label></td>
				<td><input  type="text" class="text2" name="iname" id="input-iname" autofocus temp="Please enter institute or company name." onblur="validate3(this);" />
				<label><span id="iname" style="color:#C00;"></span></label>
				</td></tr>
		
				<tr><td><label><span style='color:red;'>*</span><strong>Professional Experience:</strong></label></td>
				<td><select name="experience4" id="input-experience" temp="Please select experience" onblur="validator3(this)">
				<option value="Select">Select</option>
				<option value="Fresher">Fresher</option>
                <option value="less than 1yr">less than 1yr</option>
                <option value="1-2yrs">1-2yrs</option>
                <option value="2-3yrs">2-3yrs</option>
				<option value="3-4yrs">3-4yrs</option>
				<option value="4-5yrs">4-5yrs</option>
				<option value=">5yrs">>5yrs</option>
                </select>
				<label ><span id="experience4" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Type of experience:</strong></label></td>
				<td><select name="expertype4" id="input-expertype" temp="Please select type of experience" onblur="validator4(this)">
				<option value="Select">Select</option>
				<option value="None">None</option>
                <option value="Full time">Full time</option>
                <option value="Part time">Part time</option>
                <option value="Internship">Internship/Consultancy projects</option>
                </select>
				<label ><span id="expertype4" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Select payment options:</strong></label></td>
				<td><select name="payment" id="input-payment" temp="Please select payment options" onblur="validator4(this)">
				<option value="Select">Select</option>
				<option value="Credit Card">Credit Card</option>
                <option value="Debit Card">Debit Card</option>
                <option value="Internet Banking">Internet Banking</option>
                </select>
				<label ><span id="payment" style="color:#C00;"></span></label>
                </td></tr>
<?php
}
?>
</table>   
		</fieldset>
		<p>Fields Marked with <span style='color:red'>*</span> are compulsory</p>

<br>

<input type="submit" alt="SUBMIT" value="Payment" class="button" align="center"/>

<br />
</form>
<br />	
<?php
}
else
{
	echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		$sql="update masteruser set role='$_SESSION[type]' where email='$_SESSION[email]'";
		mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('You have registered successfully.Please login', function (e) {
		window.location.href='../login.php';
		});</SCRIPT>";
}
?>
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