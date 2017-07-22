<html>
<head>
<title>Placements</title>
<link rel="stylesheet" type="text/css" href="css/stephen1.css">
<link rel="stylesheet" href="css/jquery-ui.css" />
  <script src="js/jquery-1.9.1.js"></script>
 
  <script src="js/jquery-ui.js"></script>
  <script>
  $(function()
{
	$('#datepicker').datepicker();
});
  </script>
  


<!-- Autosize Scripts -->
<link rel="stylesheet" type="text/css" href="css/style2.css">
<link rel='icon' href='images/favicon.png' type='image/png' sizes='16x16'>
<style>

			.animated {
				-webkit-transition: height 0.2s;
				-moz-transition: height 0.2s;
				transition: height 0.2s;
			}

		</style>



<script src='js/jquery.autosize.js'></script>
		<script>
			$(function(){
				
				$('.animated').autosize({append: "\n"});
			});
		</script>
		

<!-- Auto size scripts end here -->	

<!--jquery ui script starts here.-->
 


<!--jquery ui script ends here.-->
</head>
<body>
<div class='bg'>
<div class='container'>
<div class='header'>
<img src='images/logo.png' height='80px' align='left'>
<h1>TRAINING & PLACEMENT PORTAL</h1>
</div>
<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; TPO Menu</h3>
</div>
<br>
<br>
<br>
<!-- Content here -->
<div id='container_internal'>
  <table>
  <form name="contactForm" id='contact_form' method="post" action='read.php'>
  <tr>
<td>Company Name:</td>
    <td>
     <input type='text' name='cname' size='80'/>
    </td>
    </tr>
	
    <tr>
	<td>Company Details:</td>
    <td>
    <textarea name='details' rows='2' cols='60' class='animated'></textarea>
    </td>
    </tr>
	
	<tr>
	<td>Profile Offered:</td>
    <td>
    <textarea  name='profile' rows='2' cols='60' class='animated'></textarea>
    </td>
    </tr>
	
	
	<tr>
	<td>Job Title:</td>
    <td>
    <textarea name='title' rows='2' cols='60' class='animated'></textarea>
    </td>
    </tr>
    
	<tr>
	<td>Date:</td>
    <td>
    <input type="text" name="date" id="datepicker" class="date" />
	</td>
    </tr>
	
	<tr>
	<td>Venue:</td>
    <td>
    <textarea name='venue' rows='2' cols='60' class='animated'></textarea>
    </td>
    </tr>
    
    
	<tr>
	<td>Skills Required:</td>
    <td>
      <textarea name='skills' rows='2' cols='60' class='animated'></textarea>
    </td>
    </tr>
    
	<tr>
	<td>Others Skills:</td>
    <td>
    <textarea name='other' rows='2' cols='60' class='animated'></textarea>
    </td>
    </tr>
	
	
	<tr>
	<td>Package:</td>
    <td>
     <textarea name='package' rows='2' cols='60' class='animated'></textarea>
    </td>
    </tr>
	
	<tr>
	<td>Eligibility:</td>
    <td>
      <textarea name='eligibility' rows='2' cols='60' class='animated'></textarea>
    </td>
    </tr>
	
	<tr><td>Recruitment Process :</td>
    <td>
    <textarea name='process' rows='2' cols='60' class='animated'></textarea>
    </td>
    </tr>
	
	
	<tr>
	<td>Company Website:</td>
    <td>
      <textarea name='website' rows='2' cols='60' class='animated'></textarea>
    </td>
    </tr>
	
	
	
	<tr>
	<td>Responsibility scope:</td>
    <td>
      <textarea name='scope' rows='2' cols='60' class='animated'></textarea>
    </td>
    </tr>
	
	
	<tr>
	<td>Next Position:</td>
    <td>
      <textarea name='nposition' rows='2' cols='60' class='animated'></textarea>
    </td>
    </tr>
	</table>
    
    <p style="padding-left:7em;">
      <input type='submit' id='send_message' value='Submit Form'>
    </p>
  </form>
<p style="padding-left:7em;"><a href='tpanel.php'>RETURN TO PREVIOUS PAGE</a></p>

<br><br><br>
</div>
<!-- Content ends here -->

</div>
<div class='footer'>
Privacy Policy | Terms of use | FAQ's
</div>
</div>
</div>
</body>
</html>