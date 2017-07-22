<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include 'theme-master.php';
	include '../connection1.php';

?>
<!DOCTYPE html>
<html><head><title>Technical Tests</title>
<link rel="icon" href="../images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="../styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="../styles/theme-master.css">
<script  type="text/javascript" src="validator3.js" ></script>
<style>
.test_display
{
 width:45%;
 margin-left:auto;
 margin-right:auto;
 background-color:#FFFFFF;
 border-style:solid;
 border-radius:5px;
 -webkit-border-radius: 5px;
 -moz-border-radius: 5px;
 border-width:1px;
 padding-left:15px;
 text-align:center;
 padding-top:25px;
}
.desc
{ 
 width:60%;
 margin-left:auto;
 margin-right:auto;
 padding-top:25px;
}
</style>
</head>
<body>
<div class="bg">
<div class="container">
<?php
header_fn();
?>
<div class="content">
<br>
<?php 
// Show Logged in information
echo "<div class='title'>";
echo "<h3>&nbsp; Welcome "; 
echo $_SESSION['user'][1];
echo "</h3>";
echo "</div>";
echo "<a href='goal.php' style=\"border:1px solid #09F; background:#09F; padding:4px; color:#FFF;  border-radius:5px; float:right; font-size:16px; margin-right:5%;\">Back</a>";
?>


<div class="test_display">
<form action="test1.php" onsubmit="return validateAll1()" method="get">
<br><br><b>Select Test Level:</b>
							<select name="level" id="input-level" temp="Please select the test level" onblur="validator(this)">
							<option value="Select">Select</option>
							<option value="1">Beginner</option>
							<option value="2">Intermediate</option>
							<option value="3">Expert</option>
							</select><br>
							<label><span id="level" style="color:#C00;"></span></label><br><br>
							<input type="submit" name="submit" style="cursor:pointer;" value="START TEST"><br><br>
							</form>
</div>
<br>
</div>

<?php
footer_fn();
?>
</div>
</div>

</body>
</html>
<?php
}
?>