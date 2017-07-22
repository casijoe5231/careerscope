<?php
session_start();
if(isset($_SESSION['username']))
{
include '../connect.php';
$sql="select * from info where username='".$_SESSION['username']."'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
if($count==1)
{
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('You have already Submited your profile!!', function (e) {
    window.location.href='./view.php';
});
	
    </SCRIPT>";
/*header('location:/reynold/view.php');*/
}

}
?>
<html>
<head>
<title>Placements</title>
<link rel="stylesheet" type="text/css" href="../css/stephen.css">
<!-- Autosize Scripts -->
<link rel="stylesheet" type="text/css" href="../css/style2.css">
<style>

			.animated {
				-webkit-transition: height 0.2s;
				-moz-transition: height 0.2s;
				transition: height 0.2s;
			}

		</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type='text/javascript' src="../js/validation.js"></script>
<script src="../js/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/uploadify.css">
<script src='../js/jquery.autosize.js'></script>
		<script>
			$(function(){
				
				$('.animated').autosize({append: "\n"});
			});
		</script>
		<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadify({
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
				'multi'    : false,
				
				'queueSizeLimit' : 1,
				'uploadLimit' : 1,
				'swf'      : 'uploadify.swf',
				'uploader' : 'uploadify.php'
			});
		});
	</script>
<!-- Auto size scripts end here -->	
</head>
<body>
<div class='bg'>
<div class='container'>
<div class='header'>
<img src='../images/logo.png' height='80px' align='left'>
<h1>TRAINING & PLACEMENT PORTAL</h1>
</div>
<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; Login Menu</h3>
</div>
<br>
<br>
<br>
<!-- Content here -->
<div id='container_internal'>
  <form name="contactForm" id='contact_form' method="post" action='email.php'>
  <p> Your Name:
    <div id='name_error' class='error'><img src='../images/error.png'>Please enter your name.</div>
    <div>
      <input type='text' name='name' id='name'>
	  <input type="hidden" name="username" value="<?PHP echo $_SESSION['username']; ?>">
    </div>
    </p>
    <p>E-mail ID:
    <div id='email_error' class='error'><img src='../images/error.png'>Please enter your valid E-mail ID.</div>
    <div>
    <input type='text' name='email' id='email' class='animated'>
    </div>
    </p>
	<p>Education Details:
    <div id='edu_error' class='error'><img src='../images/error.png'>Please enter your valid .</div>
    <div>
    <textarea type='text' name='details' id='details' class='animated'></textarea>
    </div>
    </p>
	<p>Preferred Location:
    <div id='loc_error' class='error'><img src='../images/error.png'>Please enter your valid E-mail ID.</div>
    <div>
    <textarea type='text' name='loc' id='loc' class='animated'></textarea>
    </div>
    </p>
    <p>Aggregate%:
    <div id='agg_error' class='error'><img src='../images/error.png'>Please enter aggregate percentage.</div>
    <div>
      <textarea name='aggregate' id='aggregate' class='animated'></textarea>
    </div>
    </p>
    <p>Skills:
    <div id='skill_error' class='error'><img src='../images/error.png'>Please enter your message.</div>
    <div>
      <textarea name='skills' id='skills' class='animated'></textarea>
    </div>
    </p>
	<p>UPLOAD RESUME:
    <div id='image_error' class='error'><img src='../images/error.png'>Upload Your Resume.</div>
    <div>
      <input id="file_upload" name="file_upload" type="file" multiple="false">
    </div>
    </p>
    <div id='mail_success' class='success'><img src='../images/success.png'>Your Profile has been created successfully.<a href="view.php">Click here to return to previous menu.</a></div>
    <div id='mail_fail' class='error'><img src='../images/error.png'> Sorry, error occured this time sending your message.</div>
    <p id='submit'>
      <input type='submit' id='send_message' value='Submit Form'>
    </p>
  </form>


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