<?php
session_start();

if($_SESSION['role']=="student")
{
echo"
<html>
<head>
<title>Placements</title>
<link rel='stylesheet' type='text/css' href='../css/stephen.css'>
<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
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
<h3>&nbsp; Student Menu</h3>
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
	  
	  <li><a href='review.php'>Give Company Feedback</a></li>
	  <li><a href='dreview.php'>Company Reviews</a></li>
	  <li><a href='sinfo.php'>CREATE YOUR PROFILE</a></li>
	</ul>
  </li>
 
  <li><h2><a href='logout.php' style='background-color: #0066FF; border:0px; color: #fff;'>Logout</a></h2></li>
</ul>
</div>
<div class='register1' >

<table align='center'>



<tr>
<td colspan='2'><a href='view.php'>View Company List</a></td>

</tr>

<tr class='even'>
<td colspan='2'><a href='appeared.php'>Submit job request</a></td>
</tr>

<tr>
<td colspan='2'><a href='listedjob.php'>Recommended jobs</a></td>
</tr>



<tr class='even'>
<td colspan='2'><a href='review.php'>Give Company Feedback</a></td>
</tr>

<tr>
<td colspan='2'><a href='dreview.php'>Company Reviews</a></td>

</tr>

<tr class='even'>
<td colspan='2'><a href='sinfo.php'>CREATE YOUR PROFILE</a></td>
</tr>


<tr>
<td colspan='2'><a href='logout.php'>LOGOUT</a></td>

</tr>

</table>


</div>

</div>
<div class='footer'>
Privacy Policy | Terms of use | FAQ's
</div>
</div>
</div>
</body>
</html>
";
}
else
{
echo "You do not have permission to access this page.Redirecting to Home.<meta http-equiv='refresh' content='2;url=../index.php'>";
}
?>