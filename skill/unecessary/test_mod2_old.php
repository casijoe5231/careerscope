<?php
    session_start();
	if(!isset($_SESSION['user']))
	{
		header('location:../login.php');
		exit();
	}
	include 'styles/theme-master.php';
	include '../connection1.php';

	$emaill=$_SESSION['user'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Observer Assessment','$timesql')";
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
echo $_SESSION['user'][1];
?>
<?php
if(isset($_POST['type']))
{ 
 //Set dropdown to previously selected value
 $type=$_POST['type'];
}
else if(!isset($type))
{
 $type="default";
}
?>
</h3>
</div>

<br>
<br>
<div align="center">
<br>
<b>Observer Assessment</b><br>

This test analyzes your skillset based on a feedback provided by your friends/ colleagues.<br><br>



<div class="box clearfix">
<br>
Please nominate participants to request a feedback for you.<br>

<?php
//Send new Request for a participant
        echo "<form name='request_new_user' method='POST' action='test_mod2.php' onsubmit=\"return validateForm()\" >";
		include 'connection1.php';
	    
		
        echo "<br>Select Type: <select name='type' onchange='this.form.submit()'>";
        echo "<option value='select' ";
		if($type=="select") echo "selected";
		echo ">Select...</option>";
		
		echo "<option value='student' ";
		if($type=="student") echo "selected";
		echo ">Student</option>";
		
		echo "<option value='staff' ";
		if($type=="staff") echo "selected";
		echo ">Staff</option>";
		
		echo "<option value='alumni' ";
		if($type=="alumni") echo "selected";
		echo ">Alumni</option>";		
 
        echo "</select>";		

		
		echo "<br>";
		if(isset($_POST['type']))
		{ 
		showList($_POST['type']);
		}
		echo "</form>";
		
		function showList($type)
		{ 
		  $email=$_SESSION['user'][0];
	  	  $sql="SELECT name,email FROM masteruser WHERE role='$type' AND email<>'$email'";
		  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		  if(mysqli_num_rows($res)!=0)
		  {
		  echo "Select Reviewer:<select name='request_user'>";
			while($row = mysqli_fetch_array($res))
			{
			$name=$row['name'];
			$user_email=$row['email'];
			echo "<option value='".$user_email."'>".$name."</option>";
			}
			echo "</select>";
			echo "<br><input type='submit' value='Request' name='request_feed'>";
		  }
		  else
		    echo "Sorry no one seems to have registered under this category";
		}
?>




<?php
// Add request from POST to database
include 'connection1.php';
$email=$_SESSION['user'][0];

if(isset($_POST['request_feed']))
{
	    
		$email=$_SESSION['user'][0];
		$sql="SELECT `reviewer`, `requestor` FROM `mod2_requests` WHERE reviewer='$_POST[request_user]' AND requestor='$email'";		
	    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	    if(mysqli_num_rows($res)!=0)
		{
		 echo'Error: Request was added previously<br>';		
	    }
		else
		{
			$sql="INSERT INTO `mod2_requests`(`reviewer`, `requestor`) VALUES ('$_POST[request_user]','$email')";		
			$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
			if($res)
			{
				echo'Request was added successfully<br>';		
			}
			else
			{
				echo"<h3>Error occured.</h3><br>Requests could not be added";
			}
	    }
}
// Show current added requests
        echo "<br> You have selected<br>";	
	
		 
		 $email=$_SESSION['user'][0];
	     $sql="SELECT reviewer FROM mod2_requests WHERE requestor='$email'";	
	     $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	     while($row = mysqli_fetch_array($res))
		 {
           $sql2="SELECT name,email FROM masteruser WHERE email='$row[reviewer]'";		 
           $res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
		   while($row2 = mysqli_fetch_array($res2))
		   {
			echo "<div class='display_request'><img src='images/im-user_profile.png' width='16px'>";
			echo $row2['name'];
			echo "<form action='test_mod2.php' method='POST'><input type='hidden' name='del_request' value='".$row2['email']."'><input type='image' src='images/delete2.png' width='25px;'></form>";
			echo "</div>";
		   }		   
         }

		 // Delete selected request
		 if(isset($_POST['del_request']))
		{
		$email=$_SESSION['user'][0];
		$request=$_POST['del_request'];
		// Delete User request
		$sql="DELETE FROM `mod2_requests` WHERE reviewer='$request' AND requestor='$email'";
		$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		echo "<meta http-equiv='refresh' content='0;url=".$_SERVER['HTTP_REFERER']."'>";
		}
?>

</div>




<br><br><br>
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

$email=$_SESSION['user'][0];

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

				echo "<a href='test_mod2_rate.php?users=".$row['requestor']."'>";
				echo "<div class='profile_display'>";
				echo "<img src='images/im-user_profile.png' width='60px'>";
				//Get first name, second name of user
				$sub_query="SELECT name FROM masteruser WHERE email = '$row[requestor]'";
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