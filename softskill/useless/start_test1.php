<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include 'styles/theme-master.php';
?>
<!DOCTYPE html>
<html><head><title>Skill Assessment Home</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
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
echo "<a href='../logout.php' style=\"border:1px solid #09F; background:#09F; padding:4px; color:#FFF;  border-radius:5px; float:right; font-size:16px; margin-right:5%;\">Logout</a>";
?>


<div class="test_display">
<?php
include 'connection1.php';
// Show test based on domain, If domain not selected, show all tests available.
if(isset($_GET['id']))
{
	$_SESSION['test_id']=$_GET['id'];
					$sql="SELECT t_name, id, t_time, t_desc, negative FROM test WHERE id='$_GET[id]'";  // Select Test
					$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
						while($row3 = mysqli_fetch_array($res3))
						{
							$_SESSION['id1']=$row3['id'];
							echo "<h3><img src='images/test.png' width='20px'><b>".$row3['t_name']."</h3></b>";
							echo "<br><div class='desc'><b>Test Time: </b>".$row3['t_time']." mins";
							echo "<br><br><b>Test Description: </b>".$row3['t_desc'];
							
							if($row3['negative']==1)
								echo "<br><br><b>Note:</b> This test has negative marking enabled.<br>";
						}
						
                     $sql2="SELECT t_id FROM relation_mainquestion WHERE t_id='$_GET[id]'";  // Select Test
					 $res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
					 $questions2=mysqli_num_rows($res2);
					 
					 
						
						
					 if($questions2==0)
					    echo "</div><br><br>You cannot attempt this Test as questions are yet to be added to it<br>";
					 else	
						echo "</div><br><br><a href='test1.php?id=".$_GET['id']."'>Start Test</a><br>";
					
}
?>
<br>
</div>

<!-- Show Back button using referer check -->
<?php
	if(isset($_SERVER['HTTP_REFERER']))
		$referer=$_SERVER['HTTP_REFERER'];
	else
		$referer="index.php";
	echo "<a href='".$referer."'><img src='images/go-back-b.png' width='40px'><br>Back</a>";
?>




<br><br>
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
elseif(isset($_SESSION['user2']))
{
include 'styles/theme-master.php';
?>
<!DOCTYPE html>
<html><head><title>Skill Assessment Home</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
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
echo $_SESSION['user2'][1];
echo "</h3>";
echo "</div>";
echo "<a href='../logout.php' style=\"border:1px solid #09F; background:#09F; padding:4px; color:#FFF;  border-radius:5px; float:right; font-size:16px; margin-right:5%;\">Logout</a>";
?>


<div class="test_display">
<?php
include 'connection1.php';
// Show test based on domain, If domain not selected, show all tests available.
if(isset($_GET['id']))
{
					$sql="SELECT t_name, id, t_time, t_desc, negative FROM test WHERE id='$_GET[id]'";  // Select Test
					$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
						while($row3 = mysqli_fetch_array($res3))
						{
							echo "<h3><img src='images/test.png' width='20px'><b>".$row3['t_name']."</h3></b>";
							echo "<br><div class='desc'><b>Test Time: </b>".$row3['t_time']." mins";
							echo "<br><br><b>Test Description: </b>".$row3['t_desc'];
							
							if($row3['negative']==1)
								echo "<br><br><b>Note:</b> This test has negative marking enabled.<br>";
						}
                     $sql="SELECT t_id FROM questions WHERE t_id='$_GET[id]'";  // Select Test
					 $res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
					 $questions=mysqli_num_rows($res3);
					 echo "<br><br><b>Test Questions:</b>".$questions;
					 
						
						
					 if($questions==0)
					    echo "</div><br><br>You cannot attempt this Test as questions are yet to be added to it<br>";
					 else	
						echo "</div><br><br><a href='test.php?id=".$_GET['id']."'>Start Test</a><br>";
}
?>
<br>
</div>

<!-- Show Back button using referer check -->
<?php
	if(isset($_SERVER['HTTP_REFERER']))
		$referer=$_SERVER['HTTP_REFERER'];
	else
		$referer="index.php";
	echo "<a href='".$referer."'><img src='images/go-back-b.png' width='40px'><br>Back</a>";
?>




<br><br>
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
elseif(isset($_SESSION['user1']))
{
	echo "<html><head><script src='../js/alertify.min.js'></script>
	<link rel='stylesheet' href='../css/alertify.core.css' />
	<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
	echo "<SCRIPT LANGUAGE='JavaScript'>
	alertify.alert('Access Restriction!!!', function (e) {
	window.location.href='index.php';
	});
	</SCRIPT>";
}
else
{
	header('location:../login.php');
	exit();
}
?>