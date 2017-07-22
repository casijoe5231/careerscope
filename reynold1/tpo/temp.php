
<html>
<head>
<title>Placements</title>
<link rel="stylesheet" type="text/css" href="../css/stephen.css">
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
<script src="../js/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="../css/uploadify.css">
<script src='../js/jquery.autosize.js'></script>
		<script>
			$(function(){
				
				$('.animated').autosize({append: "\n"});
			});
		</script>
		
<!-- Auto size scripts end here -->	
</head>
<body>
<?php
echo "<div class='bg'>
<div class='container'>
<div class='header'>
<img src='../images/logo.png' height='80px' align='left'>
<h1>TRAINING & PLACEMENT PORTAL</h1>
</div>
<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; Student Menu</h3>
</div>
<br>
<br>
<br>
<!-- Content here -->
<div id='container_internal'>
  <form name='contactForm' id='contact_form' method='post' action='read.php'>
  <p> Company Name:
    <div>
     <input type='text' name='cname' size='50' value='".$q."'/>
    </div>
    </p>
    <p>Company Details:
    <div>
    </br><textarea name='details' rows='2' cols='60' class='animated'>".$row['details']."</textarea>
    </div>
    </p>
	<p>Profile Offered:
    
    <div>
    <input type='text' name='profile' size='60' value='".$row['profile']."'/> 
    </div>
    </p>
	<p>Job Title:
    
    <div>
    <textarea name='title' rows='2' cols='60' class='animated'>".$row['title']."</textarea>
    </div>
    </p>
    
	<p>Skills Required:
    
    <div>
      <textarea name='skills' rows='2' class='animated' cols='60'>".$row['skills']."</textarea>
    </div>
    </p>
    
	<p>Others Skills:
    
    <div>
      <input type='text' name='other' size='80'  value='".$row['other']."'/>
    </div>
    </p>
	
	
	<p>Package:
    
    <div>
      <textarea name='package' rows='2' cols='60' class='animated'>".$row['package']."</textarea>
    </div>
    </p>
	<p>Eligibility:
    
    <div>
      <textarea name='eligibility' rows='2' cols='60' class='animated'></textarea>
    </div>
    </p>
	<p>Recruitment Process :
    
    <div>
      <textarea name='eligibility' rows='2' cols='60' class='animated' >".$row['eligibility']."</textarea>
    </div>
    </p>
	<p>Company Website:
    
    <div>
      <textarea name='website' rows='2' cols='60' class='animated'>".$row['website']."</textarea>
    </div>
    </p>
	<p>Responsibility scope:
    
    <div>
      <textarea name='scope' rows='2' cols='60' class='animated'>".$row['scope']."</textarea>
    </div>
    </p>
	<p>Next Position:
    
    <div>
      <textarea name='nposition' rows='2' cols='60' class='animated'>".$row['nposition']."</textarea>
    </div>
    </p>
	
    
    <p id='submit'>
      <input type='submit' id='send_message' value='Submit Form'>
    </p>
  </form>
<p><a href='tpo.php'>RETURN TO PREVIOUS PAGE</a></p>

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
</html>";
?>