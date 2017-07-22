<?php
session_start();
include '../logic/theme-master.php';
if(isset($_SESSION['user']))
{
include '../connection1.php';
$name=$_SESSION['user'][1];
$email=$_SESSION['user'][0];
$sql="select * from sinfo where email='$email'";
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
<script src="../js/jquery.min.js"></script>
<script type='text/javascript' src="../js/validation.js"></script>
<script src="../js/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/uploadify.css">
<script src='../js/jquery.autosize.js'></script>
		<script>
			$(function(){
				
				$('.animated').autosize();
			});
		</script>
<link rel="stylesheet" type="text/css" href="../css/news.css">
<script type="text/javascript" src="../js/jquery.totemticker.js"></script>
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
	<script type="text/javascript">
$(function(){
			$('#vertical-ticker').totemticker({
				row_height	:	'50px',
				next		:	'#ticker-next',
				previous	:	'#ticker-previous',
				stop		:	'#stop',
				start		:	'#start',
				mousestop	:	true,
				interval    :   3000
			});
		});
</script>
<!-- Auto size scripts end here -->	
<style>
#palign
{
text-align:left;
height:5px;
}
#container_internal
{
width:30%;
}

#container_internal
{
margin-left:5%;
margin-right:0px;
float:left;
display:block;

}
.container
{
height:100%;
}
.content
{
height:138% !important;
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
<h3>&nbsp; Student Menu</h3>
</div>
<div style="float:right;">
<img src="../images/home.png" height="30px" width="30px"><a href="../back.php" style="text-decoration:none;margin-right:10px;color:black;"><strong>HOME</strong></a>
</div>
<br>
<br>
<br>
<br>
<div id='menu'>
<ul>

  <li><h2>Student Related Functions</h2>
    <ul>
      <li><a href='view.php'>View Company List</a></li>
	  <li><a href='appeared.php'>Submit job request</a></li>
	  <li><a href='interview.php'>Interview Preparation</a></li>
	  <li><a href='review.php'>Give Company Feedback</a></li>
	  <li><a href='dreview.php'>Company Reviews</a></li>
	  <li><a href='sinfo.php'>CREATE YOUR PROFILE</a></li>
	</ul>
  </li>
</ul>
</div>
<!-- Content here -->
<div id='container_internal'>
	<?php
	/*
		$sql=mysql_query("select * from sinfo where email='$email'");
		
while($row=mysql_fetch_array($sql))
{

if($row['semester']>6)
{*/
	?>
  <form name="contactForm" id='contact_form' method="post" action='email.php' enctype="multipart/form-data">
  <input type="hidden" name="username" value="<?php echo $name; ?>">
    <p id='palign'> <span style="color:red;">*</span>Select a Branch:
    <div id='branch_error' class='error'><img src='../images/error.png'>Please select a Branch.</div>
    <div>
    <select name='branch' id='branch'>
	<option>SELECT</option>
	<option>IT</option>
	<option>COMPS</option>
	<option>EXTC</option>
	<option>MECH</option>
	</select>
    </div>
    </p>
	
    <p id='palign'><span style="color:red;">*</span>Select Semester:
    <div id='sem_error' class='error'><img src='../images/error.png'>Please select a Semester.</div>
    <div>
    
    <select name='sem' id='sem'>
	<option>SELECT</option>
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	<option>5</option>
	<option>6</option>
	<option>7</option>
	<option>8</option>
	</select>
    </div>
    </p>
	
	<p id='palign'><span style="color:red;">*</span>Live Kt's <b>(Max. 5)</b>:
    <div id='kt_error' class='error'><img src='../images/error.png'>Please enter valid no. of kt's .</div>
    <div>
    <input type='text' name='kt' id='kt' style='width:14%;' >
    </div>
    </p>
	
	<p id='palign'><span style="color:red;">*</span>Dead Kt's <b>(Max. 10)</b>:
    <div id='kt1_error' class='error'><img src='../images/error.png'>Please enter valid no. of kt's .</div>
    <div>
    <input type='text' name='kt1' id='kt1' style='width:14%;' >
    </div>
    </p>
	
	<p id='palign'><span style="color:red;">*</span>Gender:
    <div id='gender_error' class='error'><img src='../images/error.png'>Please enter gender.</div>
    <div>
   
	<select name='gender' id='gender' >
	<option>SELECT</option>
	<option>MALE</option>
	<option>FEMALE</option>
	</select>
    </div>
    </p>
	
    <p id='palign'><span style="color:red;">*</span>Aggregate%:
    <div id='agg_error' class='error'><img src='../images/error.png'>Please enter valid(less than 80%) aggregate percentage.</div>
    <div>
      <input type='text' name='aggregate' id='aggregate'>
    </div>
    </p>
	
    <p id='palign'><span style="color:red;">*</span>Preferred Location:
    <div id='loc_error' class='error'><img src='../images/error.png'>Please fill in your valid desired location.</div>
    <div>
      <textarea  name='loc' id='loc' class='animated' style='min-width:15%;'></textarea>
    </div>
    </p>
	
	<p id='palign'><span style="color:red;">*</span>Programming Languages:
    <div id='skill_error' class='error'><img src='../images/error.png'>Please fill in known Languages.</div>
    <div>
      <textarea  name='skills' id='skills' class='animated' style='min-width:15%;'></textarea>
    </div>
    </p>
	
	<p id='palign'><span style="color:red;">*</span>UPLOAD RESUME:
    <div id='image_error' class='error'><img src='../images/error.png'>Upload Your Resume.</div>
    <div>
      <input type='file' name='file' id='file' style='padding:2px;border:0px;'><br>(supported formats are .pdf,.doc & .docx)
	  
    </div>
	
    </p>
    <div id='mail_success' class='success'><img src='../images/success.png'>Your Form is now ready for Submission.</div>
    <div id='mail_fail' class='error'><img src='../images/error.png'> Sorry, error occured this time sending your message.</div>
    <p>
      <input type='submit' name='submit' id='submit' value='Check Form'>
    </p>
  </form>

<p><span style="color:red;">*</span> indicates mandatory field</p>
<?php
/*
}
else
{
	echo "<h3 style='color:red'><center><b>You are not allowed to submit your profile!!</b></center></h3>";
}
}*/
?>
</div>
<!-- Content ends here -->
<?php
include '../connect1.php';
include '../logic/functions.php';

echo "<div id='wrapper'>
	
		<h2>Newsfeed</h2>";
	 news();
echo  "<p><a href='#' id='ticker-previous'><img src='../images/backward.png' height='30' width='30'></a> / <a href='#' id='ticker-next'><img src='../images/forward.png' height='30' width='30'></a> / <a id='stop' href='#'><img src='../images/stop.png' height='30' width='30'></a> / <a id='start' href='#'><img src='../images/start.png' height='30' width='30'></a></p>
		</div>";
?>

</div>
<?php
footer_fn();
?>
</div>

</body>
</html>
