<?php
session_start();
include '../logic/theme-master.php';
if(isset($_SESSION['user3']))
{
include '../connection1.php';
$email=$_SESSION['user3'][0];
$role=$_SESSION['user3'][2];
$sql="select * from masteruser where email='$email' and role='$role'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
if($count==0)
{
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('You have already Submited your profile!!', function (e) {
    window.location.href='./details.php';
});
	
    </SCRIPT>";
/*header('location:/reynold/spanel.php');*/
}

}

?>
<html>
<head>
<title>Placements</title>

  <link rel="stylesheet" href="../css/datePicker.css" />
  <script src="../js/jquery.min.js"></script>
  <script src="../js/date.js"></script>
  <script src="../js/jquery.datePicker.js"></script>
  <script>
  $(function()
{
	$('#datepicker').datePicker({clickInput:true})
	$('#datepicker').dpSetOffset(30, 0);
});

  </script>

<link rel="stylesheet" type="text/css" href="../css/stephen1.css">  
<!-- Autosize Scripts -->
<link rel="stylesheet" type="text/css" href="../css/style2.css">
<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<style>

			.animated {
				-webkit-transition: height 0.2s;
				-moz-transition: height 0.2s;
				transition: height 0.2s;
			}

		</style>


<script src="validator3.js"></script>

<link rel="stylesheet" type="text/css" href="../css/uploadify.css">
<script src='../js/jquery.autosize.js'></script>
		<script>
			$(function(){
				
				$('.animated').autosize();
			});
		</script>
		
<!-- Auto size scripts end here -->	

<style>

#container_internal
{
margin-left:20%;
margin-right:25%;
width:30%;
}
#palign
{
text-align:left;
height:5px;
}
#container_internal textarea 
{
width:90%;
}
#container_internal input 
{
width:10%;
}
#submit
{
width:auto;
}
</style>

</head>
<body>

<div class='container'>
<?php
header_fn1();
?>
<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; Recruiter Menu</h3>
</div>
<div style="float:right;">
<img src="../images/home.png" height="30px" width="30px"><a href="../recindex.php" style="text-decoration:none;margin-right:10px;color:black;"><strong>HOME</strong></a>
</div>
<br>
<br>
<br>
<br>
<div id='menu'>
<ul>

  <li><h2>Available Functions</h2>
    <ul>
      <li><a href='details.php'>Post a Job</a></li>
	  <li><a href='edit.php'>Edit a Job POST</a></li>
	  <li><a href='status.php'>Check Post Status</a></li>
	</ul>
  </li>
</ul>
</div>
<!-- Content here -->
<div id='container_internal'>
  <?php
  $email=$_SESSION['user3'][0];
  $sql1="select * from masteruser where email='$email' and status=1";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
  $count=mysqli_num_rows($res);
  if($count==1)
 { ?>
	<form name='contactForm' id='contact_form'  method='post' onsubmit="return validateAll()" action='read.php' enctype='multipart/form-data'>
	<fieldset>
	<legend>Company Info</legend>
    <p id='palign'>
	<span style='color:red;'>*</span>Company Name:
    <div>
	<textarea name='cname' id='input-cname' class='animated' autofocus temp="Please enter company name." onblur="validate(this)"></textarea>
    </div>
    <span id="cname" style="color:#C00;"></span>
	</p>
	
	<p id='palign'>
	<span style='color:red;'>*</span>Company Address:
    <div>
	<textarea name='caddr' id='input-caddr' class='animated'  temp="Please enter company address." onblur="validate1(this)"></textarea>
    </div>
    <span id="caddr" style="color:#C00;"></span>
	</p>
	
	
    <p id='palign'>
	Company Details:
    <div>
    <textarea name='details' id='input-details' class='animated' temp="Please enter company details." ></textarea>
    </div>
	<span id="details" style="color:#C00;"></span>
    </p>
	</fieldset><br/>
	
	<fieldset>
	<legend>Offer Details</legend>
	<p id='palign'>
	Profile Offered:
    <div>
    <textarea  name='profile' id='input-profile' class='animated' temp="Please enter profile offered." ></textarea>
    </div>
	<span id="profile" style="color:#C00;"></span>
    </p>
	
	<p id='palign'>
	<span style='color:red;'>*</span>Job Title:
    <div>
    <textarea name='title' id='input-title' class='animated' temp="Please enter job title." onblur="validate2(this)"></textarea>
    </div>
    <span id="title" style="color:#C00;"></span>
    </p>
	
	<p id='palign'>
	<span style='color:red;'>*</span>Location:
    <div>
    <textarea name='location' id='input-location'  class='animated' temp="Please enter location." onblur="validate3(this)"></textarea>
    </div>
	<span id="location" style="color:#C00;"></span>
    </p>
	
	<p id='palign'>
	<span style='color:red;'>*</span>Package:
    <div>
     <input type="text" name="package" id="input-package" style='width:30%;' temp="Please enter package." onblur="validate4(this)"/>
    </div>
	<span id="package" style="color:#C00;"></span>
    </p>
	
	<p id='palign'>
	<span style='color:red;'>*</span>Recruitment Process:
    <div>
    <textarea name='process' id='input-process'  class='animated' temp="Please enter recruitment process." onblur="validate5(this)"></textarea>
    </div>
	<span id="process" style="color:#C00;"></span>
    </p>
	
	<p id='palign'>
	<span style='color:red;'>*</span>Company Website:
    <div>
      <textarea name='website' id='input-website' class='animated' temp="Please enter company website." onblur="validate6(this)"></textarea>
    </div>
	<span id="website" style="color:#C00;"></span>
    </p>
	
	<p id='palign'>
	Responsibility scope:
    <div>
      <textarea name='scope' id='input-scope' class='animated' temp="Please enter responsibility scope."></textarea>
    </div>
	<span id="scope" style="color:#C00;"></span>
    </p>
	</fieldset><br/>
	
	<fieldset>
	<legend>Skills & Eligibility</legend>
	<p id='palign'>
	<span style='color:red;'>*</span>Skills Required:
    <div>
      <textarea name='language' id='input-language'  class='animated' temp="Please enter skills required." onblur="validate7(this)"></textarea>
    </div>
	<span id="language" style="color:#C00;"></span>
    </p>
    
	<p id='palign'>
	Others Skills:
    <div>
    <textarea name='other' id='input-other'  class='animated' temp="Please enter other skills required."></textarea>
    </div>
	<span id="other" style="color:#C00;"></span>
    </p>
	
	<p id='palign'>
	<span style='color:red;'>*</span>Aggregate:
    <div>
      <input type="text" name="aggregate" id="input-aggregate" temp="Please enter valid aggregate." onblur="numberValidator(this)"/>
    </div>
	<span id="aggregate" style="color:#C00;"></span>
    </p>
	
	<p id='palign'>
	<span style='color:red;'>*</span>No. of Live KT's allowed:
    <div>
      <input type="text" name="kt" id="input-kt" temp="Please enter valid number of KT." onblur="numberValidator1(this)"/>
    </div>
	<span id="kt" style="color:#C00;"></span>
    </p>
	
	<p id='palign'>
	<span style='color:red;'>*</span>No. of Dead KT's allowed:
    <div>
      <input type="text" name="kt1" id="input-kt1" temp="Please enter valid number of KT." onblur="numberValidator2(this)"/>
    </div>
	<span id="kt1" style="color:#C00;"></span>
    </p>
	</fieldset><br/>
	
	<fieldset>
	<legend>Interview Date and venue</legend>
	<p id='palign'>
	<span style='color:red;'>*</span>Date:
    <div>
      <input type="text" name="date" id="datepicker" class="date" style='width:20%;' temp="Please enter date." onblur="validate9(this)">
    </div>
	<span id="date" style="color:#C00;"></span>
    </p>
	<br>
	<p id='palign'>
	<span style='color:red;'>*</span>Venue:
    <div>
      <textarea name='venue' id='input-venue'  class='animated' style='width:50%;' temp="Please enter venue." onblur="validate8(this)"></textarea>
    </div>
	<span id="venue" style="color:#C00;"></span>
    </p>
	</fieldset><br/>
	
	<fieldset>
	<legend>Optional</legend>
	<p id='palign'>
	Next Position:
    <div>
      <textarea name='nposition' id='input-nposition' class='animated' temp="Please enter next position."></textarea>
    </div>
	<span id="nposition" style="color:#C00;"></span>
    </p>
	</fieldset>
	
	<p id='palign'>
	<div><span style='color:red;'>*</span>Attachments:<br><input type='file' name='file' id='input-file' style='padding:2px;border:0px;width:auto;' temp="Please select a file." onblur="validFile(this)" /><br>(supported formats are .pdf,.doc & .docx)</div>
	<span id="file" style="color:#C00;"></span>
	</p>

	<p>
      <input type='submit' name='submit' id='submit' value='Submit' style='width:20%'>
    </p>
  </form>
<p>Fields Marked with <span style='color:red'>*</span> are compulsory</p>
<?php
}
else
{
echo "<h3 style='color:red'><b><center>You are not approved by the placement officer. Please contact TPO.</center></b></h3>";
}
?>
</div>
<!-- Content ends here -->
</div><br>
<?php
footer_fn();
?>
</div>

</body>
</html>