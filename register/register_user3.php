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
if($_POST['enroll1']=="Yes")
{
if(isset($_POST['role']))
{
	$institute1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['institute1']);
	$role = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['role']);
	$enroll1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['enroll1']);
	$_SESSION['institute1']=$institute1;
	$_SESSION['role']=$role;
	$email_from="priyankamalekar9@gmail.com";
	
$sql1="update masteruser set enroll='$enroll1' where email='$_SESSION[email]'";
mysqli_query($GLOBALS["___mysqli_ston"], $sql1)or die("query not executed");
$sql1="update masteruser set role='$_SESSION[role]' where email='$_SESSION[email]'";
mysqli_query($GLOBALS["___mysqli_ston"], $sql1)or die("query not executed");

$allowedExts = array("pdf","doc","docx");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
{
	  mkdir("../uploads/$_SESSION[email]");
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../uploads/$_SESSION[email]/" . $_FILES["file"]["name"]);
}

 /* // create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    //Create a new PHPMailer instance
    $mail = new PHPMailer();
    //Tell PHPMailer to use SMTP
    $mail->IsSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug  = 2;
    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';
    //Set the hostname of the mail server
    $mail->Host       = "hostname";
    //Set the SMTP port number - likely to be 25, 465 or 587
    $mail->Port       = 465;
    //Whether to use SMTP authentication
    $mail->SMTPAuth   = true;
    //Username to use for SMTP authentication
    $mail->Username   = "email";
    //Password to use for SMTP authentication
    $mail->Password   = "password";
    //Set who the message is to be sent from
    $mail->SetFrom($email_from);
    //Set an alternative reply-to address
    //$mail->AddReplyTo('replyto@example.com','First Last');
    //Set who the message is to be sent to
    $mail->AddAddress($email_from);
    //Set the subject line
    $mail->Subject = 'Request for Profile Check up';
    //Read an HTML message body from an external file, convert referenced images to embedded, convert HTML into a basic plain-text alternative body
    $mail->MsgHTML($email_message);
    //Replace the plain text body with one created manually
    $mail->AltBody = 'This is a plain-text message body';
    //Attach an image file
    $mail->AddAttachment($file);
    
    //Send the message, check for errors
    if(!$mail->Send()) {
      echo "<script>alert('Mailer Error: " . $mail->ErrorInfo."')</script>";
    } else {
      echo "<script>alert('Your request has been submitted. We will contact you soon.')</script>";
    }
*/

?>
<form action="register_user1.php" method="post" enctype="multipart/form-data">
			
				
<?php
if($_SESSION['role']=="Staff")
	{
		?>	
				<fieldset  id="fieldset"style="border-radius:5px;" >
				<table cellpadding="12" border="0" width="auto">
				<legend>Details:</legend>
				<tr><td><label><span style='color:red;'>*</span><strong>Staff id:</strong></label></td>
				<td><input  type="text" class="text2" name="sid" id="input-sid" autofocus temp="Please enter your staff id" onblur="validate(this);" />
				<label><span id="sid" style="color:#C00;"></span></label>
				</td></tr>
		
				<tr><td><label><span style='color:red;'>*</span><strong>Department:</strong></label></td>
				<td><select name="department" id="input-department" temp="Please select the department" onblur="validator1(this)">
                <option value="Select">Select</option>
				<option value="Engineering">Engineering</option>
                <option value="Pharmacy">Pharmacy</option>
                </select>
				<label ><span id="department" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Branch:</strong></label></td>
				<td><select name="branch1" id="input-branch1" temp="Please select the branch" onblur="validator2(this)">
                <option value="Select">Select</option>
				<option value="Computer">Computer</option>
                <option value="IT">IT</option>
                <option value="Mechanical">Mechanical</option>
                <option value="EXTC">EXTC</option>
                </select>
				<label ><span id="branch1" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Experience:</strong></label></td>
				<td><select name="experience1" id="input-experience1" temp="Please select experience" onblur="validator3(this)">
                <option value="Select">Select</option>
				<option value="less than 1yr">less than 1yr</option>
                <option value="1-2yrs">1-2yrs</option>
                <option value="2-3yrs">2-3yrs</option>
				<option value="3-4yrs">3-4yrs</option>
				<option value="4-5yrs">4-5yrs</option>
				<option value=">5yrs">>5yrs</option>
                </select>
				<label ><span id="experience1" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Type of experience:</strong></label></td>
				<td><select name="expertype1" id="input-expertype1" temp="Please select type of experience" onblur="validator4(this)">
                <option value="Select">Select</option>
				<option value="Full time">Full time</option>
                <option value="Part time">Part time</option>
                <option value="Internship">Internship</option>
                </select>
				<label ><span id="expertype1" style="color:#C00;"></span></label>
                </td></tr>
				</table>
				</fieldset>
				
				
				    
<?php	
	}
	if($_SESSION['role']=="Alumni")
	{
	?>
	<fieldset  id="fieldset"style="border-radius:5px;" >
	<table cellpadding="12" border="0" width="auto">
	<legend>Details:</legend>
	<tr><td><label><span style='color:red;'>*</span><strong>Qualification:</strong></label></td>
				<td><select name="qualification1" id="input-qualification" temp="Please select qualification" onblur="validator5(this)">
                <option value="Select">Select</option>
				<option value="BE">BE/BTech</option>
                <option value="BPharma">BPharma</option>
				<option value="ME">ME/MTech</option>
				<option value="MPharma">MPharma</option>
				<option value="MS">MS</option>
                </select>
				<label ><span id="qualification1" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Experience:</strong></label></td>
				<td><select name="experience2" id="input-experience" temp="Please select experience" onblur="validator3(this)">
				<option value="Select">Select</option>
				<option value="Fresher">Fresher</option>
                <option value="less than 1yr">less than 1yr</option>
                <option value="1-2yrs">1-2yrs</option>
                <option value="2-3yrs">2-3yrs</option>
				<option value="3-4yrs">3-4yrs</option>
				<option value="4-5yrs">4-5yrs</option>
				<option value=">5yrs">>5yrs</option>
                </select>
				<label ><span id="experience2" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Type of experience:</strong></label></td>
				<td><select name="expertype2" id="input-expertype" temp="Please select type of experience" onblur="validator4(this)">
				<option value="Select">Select</option>
				<option value="None">None</option>
                <option value="Full time">Full time</option>
                <option value="Part time">Part time</option>
                <option value="Internship">Internship/Consultancy projects</option>
                </select>
				<label ><span id="expertype2" style="color:#C00;"></span></label>
                </td></tr>
				</table>
				</fieldset>
				
<?php	
	}
	if($_SESSION['role']=="Student")
	{
	?>
				<fieldset  id="fieldset"style="border-radius:5px;" >
				<table cellpadding="12" border="0" width="auto">
				<legend>Curriculum Vitae/Resume:</legend>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Objective:</strong></label></td>
				<td><textarea name='objective' id='input-objective'  class='text2' temp="Please enter your objective." onblur="validate2(this)"></textarea>
				<label><span id="objective" style="color:#C00;"></span></label>
				</td>
				
				<td><label><span style='color:red;'>*</span><strong>Personal Skills:</strong></label></td>
				<td><input  type="text" class="text2" name="skills" id="input-skills" placeholder="eg:c,c++,java" temp="Please enter your skills." onblur="validate1(this);" />
				<label><span id="skills" style="color:#C00;"></span></label>
				</td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Area of specialisation:</strong></label></td>
				<td><input  type="text" class="text2" name="specialisation" id="input-specialisation" placeholder="eg:Computer" temp="Please enter your area of specialisation." onblur="validate1(this);" />
				<label><span id="specialisation" style="color:#C00;"></span></label>
				</td>
				
				<td><label><span style='color:red;'>*</span><strong>Preferred Location:</strong></label></td>
				<td><input  type="text" class="text2" name="location" id="input-location" temp="Please enter your preferred location." onblur="validate1(this);" />
				<label><span id="location" style="color:#C00;"></span></label>
				</td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Expected Remuneration:</strong></label></td>
				<td><input  type="text" class="text2" name="remuneration" id="input-remuneration" placeholder="eg:1-2 lakhs" temp="Please enter your expected remuneration." onblur="validate1(this);" />
				<label><span id="remuneration" style="color:#C00;"></span></label>
				</td></tr>
				
				</table>
				</fieldset>
				
				<fieldset  id="fieldset"style="border-radius:5px;" >
				<table cellpadding="12" border="0" width="auto">
				<legend>Educational Qualification:</legend>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Course of study</strong></label></td>
				<td><select name="course" id="input-course" temp="Please select course of study" onblur="validator5(this)">
                <option value="Select">Select</option>
				<option value="BE">BE</option>
                <option value="BPharma">BPharma</option>
                </select>
				<label ><span id="course" style="color:#C00;"></span></label>
                </td>
				
				<td><label><span style='color:red;'>*</span><strong>Discipline:</strong></label></td>
				<td><select name="discipline" id="input-discipline" temp="Please select discipline" onblur="validator2(this)">
                <option value="Select">Select</option>
				<option value="Computer">Computer</option>
                <option value="IT">IT</option>
                <option value="Mechanical">Mechanical</option>
                <option value="EXTC">EXTC</option>
                </select>
				<label ><span id="discipline" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Year:</strong></label></td>
				<td><select name="year" id="input-year" temp="Please select the year" onblur="validator6(this)">
                <option value="Select">Select</option>
				<option value="First">First</option>
                <option value="Second">Second</option>
                <option value="Third">Third</option>
                <option value="Fourth">Fourth</option>
				<option value="Fifth">Fifth</option>
                </select>
				<label ><span id="year" style="color:#C00;"></span></label>
                </td>
				
				<td><label><span style='color:red;'>*</span><strong>Class:</strong></label></td>
				<td><select name="class" id="input-class" temp="Please select the class" onblur="validator6(this)">
                <option value="Select">Select</option>
				<option value="Distinction">Distinction</option>
				<option value="First class">First class</option>
                <option value="Second class">Second class</option>
                <option value="Third class">Third class</option>
                <option value="Fourth class">Fourth class</option>
                </select>
				<label ><span id="class" style="color:#C00;"></span></label>
                </td></tr>
				
				<td><label><span style='color:red;'>*</span><strong>Aggregate:</strong></label></td>
				<td><input  type="text" class="text2" name="aggregate" id="input-aggregate" temp="Please enter your aggregate." onblur="validate1(this);" />
				<label><span id="aggregate" style="color:#C00;"></span></label>
				</td></tr>
				
				</table>   
				</fieldset>
				
				<fieldset  id="fieldset"style="border-radius:5px;" >
				<table cellpadding="12" border="0" width="auto">
				<legend>Internship:</legend>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Period:</strong></label></td>
				<td><input  type="text" class="text2" name="period" id="input-period" temp="Please enter your internship period." onblur="validate1(this);" />
				<label><span id="period" style="color:#C00;"></span></label>
				</td>
				
				<td><label><span style='color:red;'>*</span><strong>Company name:</strong></label></td>
				<td><input  type="text" class="text2" name="company" id="input-company" temp="Please enter company name." onblur="validate1(this);" />
				<label><span id="company" style="color:#C00;"></span></label>
				</td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Title:</strong></label></td>
				<td><input  type="text" class="text2" name="title" id="input-title" temp="Please enter title." onblur="validate1(this);" />
				<label><span id="title" style="color:#C00;"></span></label>
				</td>
				
				<td><label><span style='color:red;'>*</span><strong>Area:</strong></label></td>
				<td><input  type="text" class="text2" name="area" id="input-area" placeholder="eg:software" temp="Please enter area." onblur="validate1(this);" />
				<label><span id="area" style="color:#C00;"></span></label>
				</td></tr>
				</table>   
				</fieldset>
				
				<fieldset  id="fieldset"style="border-radius:5px;" >
				<table cellpadding="12" border="0" width="auto">
				<legend>Other Details:</legend>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Career Skills:</strong></label></td>
				<td><select name="cskills" id="input-cskills" temp="Please select career skills." onblur="validator4(this)">
				<option value="Select">Select</option>
				<option value="Analytics">Analytics</option>
                <option value="Business and Systems Integration">Business and Systems Integration</option>
                <option value="Engineering Services">Engineering Services</option>
                <option value="Finance">Finance</option>
				<option value="Human Resources">Human Resources</option>
				<option value="IT Operations">IT Operations</option>
				<option value="Marketing and Communications">Marketing and Communications</option>
                <option value="Performance,risk and quality">Performance,risk and quality</option>
				<option value="Program,project and service mgt">Program,project and service mgt</option>
				<option value="Sales">Sales</option>
				<option value="Software Engineering">Software Engineering</option>
				<option value="Strategy">Strategy</option>
				<option value="Workplace mgt and solutions">Workplace mgt and solutions</option>
				</select>
				<label ><span id="cskills" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Industry:</strong></label></td>
				<td><select name="industry[]" id="input-industry" multiple="multiple" temp="Please select industry." onblur="validator4(this)">
				<option value="Select">Select</option>
				<option value="Aerospace and Defense">Aerospace and Defense</option>
                <option value="Automotive">Automotive</option>
                <option value="Banking">Banking</option>
                <option value="Building Materials">Building Materials</option>
				<option value="Capital Markets">Capital Markets</option>
				<option value="Chemicals">Chemiclas</option>
				<option value="Communication">Communication</option>
				<option value="Consulting">Consulting</option>
				<option value="Consumer goods and services">Consumer goods and services</option>
				<option value="Electronics and high tech.">Electronics and high tech.</option>
				<option value="Energy">Energy</option>
				<option value="IT-Hardware">IT-Hardware</option>
				<option value="IT-Software">IT-Software</option>
				<option value="Travel">Travel</option>
				<option value="Utilities">Utilities</option>
                </select><br><b><i>Please press ctrl button to<br> select more than 1 choices.</i></b>
				<label ><span id="industry[]" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Additional certifications:</strong></label></td>
				<td><input  type="text" class="text2" name="certifications" id="input-certifications" placeholder="eg:android,SAP" temp="Please enter additional certifications." onblur="validate1(this);" />
				<label><span id="certifications" style="color:#C00;"></span></label>
				</td>
				  
				<td><label><span style='color:red;'>*</span><strong>Achievements:</strong></label></td>
				<td><textarea name='achievements' id='input-achievements'  class='text2' temp="Please enter achievements." onblur="validate2(this)"></textarea>
				<label><span id="achievements" style="color:#C00;"></span></label>
				</td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Languages known:</strong></label></td>
				<td><input  type="text" class="text2" name="language" id="input-language" placeholder="eg:english,hindi" temp="Please enter languages known." onblur="validate1(this);" />
				<label><span id="language" style="color:#C00;"></span></label>
				
				<td><label><span style='color:red;'>*</span><strong>Hobbies:</strong></label></td>
				<td><input  type="text" class="text2" name="hobbies" id="input-hobbies" temp="Please enter your hobbies." onblur="validate1(this);" />
				<label><span id="hobbies" style="color:#C00;"></span></label>
				</td></tr>
				</table>
				</fieldset>
				
<?php	
	}
	if($_SESSION['role']=="Recruiter")
	{
	?>
		<fieldset  id="fieldset"style="border-radius:5px;" >
		<table cellpadding="12" border="0" width="auto">
		<legend>Details:</legend>
		<tr><td><label><span style='color:red;'>*</span><strong>Company name/Institute name:</strong></label></td>
		<td><input  type="text" class="text2" name="cname" id="input-cname" autofocus temp="Please enter company or institute name." onblur="validate1(this);" />
		<label><span id="cname" style="color:#C00;"></span></label>
		</td></tr>
		</table>
		</fieldset>
<?php		    	
	}
	if($_SESSION['role']=="Admin")
	{
		header("location:register_user1.php");	
	}
	if($_SESSION['role']=="Other")
	{
		?>
		<fieldset  id="fieldset"style="border-radius:5px;" >
		<table cellpadding="12" border="0" width="auto">
		<legend>Details:</legend>
		<tr><td><label><span style='color:red;'>*</span><strong>Institute name/Company name/None:</strong></label></td>
				<td><input  type="text" class="text2" name="inname" id="input-inname" autofocus temp="Please enter institute or company name." onblur="validate2(this);" />
				<label><span id="inname" style="color:#C00;"></span></label>
				</td></tr>
				</table>
				</fieldset>
<?php	
	}
?>
		
		<p>Fields Marked with <span style='color:red'>*</span> are compulsory</p>

<br>

<input type="submit" alt="SUBMIT" value="Save Details" class="button" align="center"/>

<br />
</form>
<br />	
<?php
}
}
else
{
	echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		$sql="update masteruser set role='$_POST[role]' where email='$_SESSION[email]'";
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