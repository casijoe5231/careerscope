<?php
session_start();
include '../logic/theme-master.php';
if($_SESSION['role']!="tpo")
{


echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('You do not belong here!!', function (e) {
    window.location.href='../index.php';
});
	
    </SCRIPT>";
/*header('location:/reynold/spanel.php');*/
}
else
{
include "../connect1.php";
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
<style>

#container_internal
{
margin-right:25%;
margin-left:20%;
width:30%;
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

<script src='../js/jquery.autosize.js'></script>
		<script>
			$(function(){
				
				$('.animated').autosize();
			});
		</script>
		

<!-- Auto size scripts end here -->	


</head>
<body>

<div class='container'>
<?php
header_fn1();
?>
<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; TPO Menu</h3>
</div>
<br/>
<br/>
<br/>
<br/>

<div id='menu'>
<ul>
  <li><h2>Job Related Functions</h2>
    <ul>
      <li><a href='tpo.php'>Post a Job</a></li>
	  <li><a href='internship.php'>Post an Internship</a></li>
	  <li><a href='post.php'>Edit a Job POST</a></li>
	  <li><a href='editinternship.php'>Edit an Internship Post</a></li>
    </ul>
  </li>
  <li><h2>Student Related Functions</h2>
    <ul>
      <li><a href='dreview.php'>Delete/approve reviews</a></li>
	  <li><a href='details.php'>View Student Details</a></li>
	  <li><a href='set.php'>Confirm Students</a></li>
	  <li><a href='appeared.php'>Set Student Status</a></li>
	  <li><a href='joboffer.php'>Confirm Student proposals</a></li>
    </ul>
  </li>
  <li><h2>Recruiter Related Functions</h2>
    <ul>
      <li><a href='status.php'>View Company Posts</a></li>
	  <li><a href='verify.php'>Verify Company Details</a></li>
	  <li><a href='stats.php'>View companies statistics</a></li>
    </ul>
  </li>
  <li><h2><a href='logout.php' style='background-color: #0066FF; border:0px; color: #fff;'>Logout</a></h2></li>
</ul>
</div>
<!-- Content here -->
<div id='container_internal' >
  <link rel="stylesheet" type="text/css" href="../css/modal.css">
  <p>ENTER COMPANY DETAILS</p>
 
  <form name="contactForm" id='contact_form' method="post" action='read1.php'>
<fieldset>
<legend>Company Info</legend>
<div><span style="color:red;">*</span>Company Name:<br><textarea type='text' name='cname' class='animated' style='width:50%;'></textarea><div><br/>
<div>Company Address:<br><textarea name='caddress'  class='animated'></textarea></div><br/>
<div>Company Details:<br><textarea name='details'  class='animated'></textarea></div><br/>
</fieldset>
<br/>	

<fieldset>
<legend>Internship Details</legend>
<div><span style="color:red;">*</span>Job Title:<br><textarea name='title'  class='animated'></textarea></div><br/>
<div><span style="color:red;">*</span>Internship Period:<br><input type="text" name='period' style='width:30%;'/></div><br/>
<div>Location:<br><textarea  name='location'  class='animated'></textarea></div><br/>
<div>Payment:<br><input type="text" name='payment' style='width:30%;'/></div><br/>
<div>Company Website:<br><textarea name='website'  class='animated'></textarea></div><br/>
</fieldset>
<br/>
<fieldset>
<legend>Skills & Eligibility</legend>
<div>Languages Required:<br><textarea name='language'  class='animated'></textarea></div><br/>
<div>Others Skills:<br><textarea name='other'  class='animated'></textarea></div><br/>
<div><span style="color:red;">*</span>Eligibility:<br><textarea name='eligibility'  class='animated'></textarea></div><br/>
<div>Kt's Allowed:<br/><input type="text" name="kt"/></div><br/>
</fieldset>
<br/>

<fieldset>
<legend>Interview Date and venue</legend>
<div>Date:<br/><input type="text" name="date" id="datepicker" class="date"></div><br/><br/>
<div>Venue:<br><textarea name='venue'  class='animated' style='width:50%;'></textarea></div><br/>
</fieldset>  

    
    <p>
      <input type='submit' id='submit' value='Submit'>
    </p>
  </form>



</div>
<!-- Content ends here -->

</div>
<?php
footer_fn();
?>
</div>
</div>
</body>
</html>