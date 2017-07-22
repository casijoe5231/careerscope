<?php
    session_start();
	if(!isset($_SESSION['lecturer']))
	{
		header('location:../login.php');
		exit();
	}
	include 'styles/theme-master.php';
	
	include '../connection1.php';
	
	$emaill=$_SESSION['lecturer'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Lecturer/Testmgr Observer Assessment','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
	?>
<!DOCTYPE html>
<html><head><title>Observer Assessment Test</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
<!-- Modal Scripts -->

<!-- Contact Form CSS files -->
<link type='text/css' href='plugins/modal/css/basic.css' rel='stylesheet' media='screen' />

<!-- IE6 "fix" for the close png image -->
<!--[if lt IE 7]>
<link type='text/css' href='plugins/modal/css/basic_ie.css' rel='stylesheet' media='screen' />
<![endif]-->
<script type='text/javascript' src='plugins/modal/js/jquery.js'></script>
<script type='text/javascript' src='plugins/modal/js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='plugins/modal/js/basic.js'></script>

<script type="text/javascript" src="plugins/jquery.min.js"></script>
 <script language="JavaScript">
   setInterval("updateContent();", <?php include 'settings.php'; echo $ajax_delay; ?> );
   function updateContent()
    {
         $('#refreshData').empty();
         $('#refreshData').load("ajax_data.php").fadeIn("slow");
    }
</script>
</head>
<body>

<div class="bg">
<div class="container">
<?php
header_fn();
?>
<div class="content">
<br>
<div class="title">
<h3>&nbsp;Welcome 
<?php 
echo $_SESSION['lecturer'][1];
?>
</h3>
</div>

<br>
<br>
<div align="center">
<br>
<b>Observer Assessment</b><br><br>
<div class="box">
<br>
The following participants have requested you for a feedback of their skills.<br><br>

<div class="rate_user clearfix">
<?php
//AJAX data 
/*if($ajax_enable==1)
{
echo "<div id='refreshData'></div>";
}
else
{*/
include 'connection1.php';
$email=$_SESSION['lecturer'][0];

		 $sql="SELECT requestor, val FROM mod2_requests WHERE reviewer='$email'";	
	     $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	     while($row = mysqli_fetch_array($res))
		 {		 
             if($row['val']<>null) //Feedback submitted
			 {		

				echo "<div class='profile_display_submitted'>";
				echo "<img src='images/im-user_profile.png' width='60px'>";
				//Get first name, second name of user
				$sub_query="SELECT name FROM masteruser WHERE email = '$row[requestor]'";
				$result=mysqli_query($GLOBALS["___mysqli_ston"], $sub_query);
				while($row = mysqli_fetch_array($result))
				{
					echo $row['name'];
				}
		  
				echo "</div>";
				//echo "</a>"; 
			 }
		 
			 else
			 {

				echo "<a href='test_mod6_rate.php?userss=".$row['requestor']."'>";
				echo "<div class='profile_display'>";
				echo "<img src='images/im-user_profile.png' width='60px'>";
				//Get first name, second name of user
				$sub_query="SELECT name,email FROM masteruser WHERE email = '$row[requestor]'";
				$result=mysqli_query($GLOBALS["___mysqli_ston"], $sub_query);
				while($row = mysqli_fetch_array($result))
				{
					echo $row['name'];
				}
		  
				echo "</div> </a>";
			 }	
         }	

?>
 
<br><br>
</div>
</div>

<!--
<a href="test_mod2_results.php" target="_blank" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px;">Show my Report</a>
-->
<br><br>
<!-- Modal Section -->
<div id='basic-modal'>
			<a href='#' class='basic' style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; text-decoration:none;">About 360-Assessment</a>
		</div>
		
		<!-- modal content -->
		<div id="basic-modal-content">
			<h3>360 Observer Assessment Test</h3>		
		    <img src="plugins/modal/img/360assessment.gif" width="680px" >
			<p>360-degree feedback is a method of systematically collecting opinions about your performance from your colleagues, friends or teachers. 360-degree feedback is also known as multi-rater feedback, multi source feedback, or a multi source assessment. You can select upto 5 users to provide a feedback for you. This will help us to understand you skills, strengths & your weaknesss.</p>
			
		</div>

		<!-- preload the images -->
		<div style='display:none'>
			<img src='modal/img/basic/x.png' alt='' />
		</div>

<!-- Modal Section ends here --> 
<br>
<br>

<a href="logout.php" class="button bright">LOGOUT</a>
<a href="home.php" class="button bright">< Back</a>
</div>

<br>
<br><br>
</div>




<?php
footer_fn();
?>
</div>
</div>

</body>
</html>