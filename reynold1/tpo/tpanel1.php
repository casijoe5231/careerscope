<?php
session_start();
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

<link rel='stylesheet' type='text/css' href='../css/stephen.css'>
<link rel='stylesheet' type='text/css' href='../css/organictab.css'>
<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<script src="../js/jquery.min.js"></script>

<script src="../js/organictabs.jquery.js"></script>
<script>
        $(function() {
		$("#example-one").organicTabs({
                "speed": 300
            });
    
        });
</script>

</head>
<body>

<div class='container'>
<div class='header'>
<img src='../images/logo.png' height='80px' align='left'>
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
<br>

<div id="menu">
<ul>
  <li><h2>Job Related Functions</h2>
    <ul>
      <li><a href='tpo.php'>Post a Job</a></li>
	  <li><a href='post.php'>Edit a Job POST</a></li>
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
  <li><h2><a href="logout.php" style='background-color: #0066FF; border:0px; color: #fff;'>Logout</a></h2></li>
</ul>
</div>

<div class='register' >



<p>No Function selected.</p>


	  <!--<div id="example-one">
        			
        	<ul class="nav">
                <li class="nav-one"><a href="#featured" class="current">Job Postings</a></li>
                <li class="nav-two"><a href="#core">Students Functions</a></li>
                <li class="nav-three last"><a href="#jquerytuts">Company Functions</a></li>
                
            </ul>
        	
        	<div class="list-wrap">
        	
        		<ul id="featured">
        			<li><a href='tpo.php'>Post a Job</a></li>
					<li><a href='post.php'>Edit a Job POST</a></li>
					<li><a href='logout.php'>Logout</a></li>
        		</ul>
        		 
        		 <ul id="core" class="hide">
                    <li><a href='dreview.php'>Delete/approve reviews</a></li>
					<li><a href='details.php'>View Student Details</a></li>
					<li><a href='set.php'>Confirm Students</a></li>
					<li><a href='appeared.php'>Set Student Status</a></li>
					<li><a href='joboffer.php'>Confirm Student proposals</a></li>
        		 </ul>
        		 
        		 <ul id="jquerytuts" class="hide">
        		    <li><a href='status.php'>View Company Posts</a></li>
					<li><a href='verify.php'>Verify Company Details</a></li>
					<li><a href='stats.php'>View companies statistics</a></li>
        		 </ul>
        		 
        		 
        		 
        	 </div> 
         
         </div>-->


</div>


</div>
<div class='footer'>
Privacy Policy | Terms of use | FAQ's
</div>
</div>

</body>
</html>