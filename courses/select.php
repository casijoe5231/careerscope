 <?php
    session_start();
	include 'connection.php';
	include 'styles/theme-master.php';
	
	include '../connection1.php';

	$emaill=$_SESSION['user'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Training and Certifications Available','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<!DOCTYPE html>
<html><head><title>Skill Assessment Home</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
<!-- Jquery UI -->
  <link rel="stylesheet" href="plugins/jqueryui/jquery-ui.css" />
  <script src="plugins/jqueryui/jquery-1.9.1.js"></script>
  <script src="plugins/jqueryui/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#accordion" ).accordion();
  });
 </script>
<!-- Jquery UI ends here --> 

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
 padding-top:15px;
 font-size:18px;
 font-family:Calibri;
}
.login
{
 float:right;
 margin-right:2%;
}
.test_box
{
 width:80%;
 margin-left:20px;
 margin-bottom:5px;
 border-style:solid;
 border-radius:5px;
 -webkit-border-radius: 5px;
 -moz-border-radius: 5px;
 border-width:1px;
 padding-left:15px;
 padding-top:15px;
}
#accordion
{
 font-size:13px;
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
	if(isset($_SESSION['username']))
	{
      echo "<div class='title'>";
	  echo "<h3>&nbsp; Welcome "; 
	  echo $_SESSION['username'][1];
	  echo "</h3>";
	  echo "</div>";
	  echo "<a href='logout.php' style=\"border:1px solid #09F; background:#09F; padding:4px; color:#FFF;  border-radius:5px; float:right; font-size:16px; margin-right:5%;\">Logout</a>";
    }
	else
	 echo "<a href='./login.php' style=\"border:1px solid #09F; background:#09F; padding:8px; color:#FFF;  border-radius:5px; font-size:16px; float:right; margin-right:5%;\">Login</a>";
?>


<div class="test_display">
<b>Courses Available</b><br><br>
<?php
// Show test based on domain, If domain not selected, show all tests available.
if(isset($_GET['type']))
{
			$sql="SELECT * FROM course WHERE domain='$_GET[type]'";   // Select Subject
			$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
				while($row2 = mysqli_fetch_array($res2))
				{
					echo "&nbsp;&nbsp;&nbsp;&nbsp;";
					echo "<u>".$row2['name']."</u></br>";
					
							echo "<div class='test_box'>";
							//echo "<img src='images/test.png' width='50px' style=\"float:left; margin-right:5px;\">";
							echo $row2['desc'];
							echo "<a href='start_test.php?id=".$row2['name']."' class='button'>View</a><br><br>";
							echo "</div>";
				echo "<br>";		
				}
			
}
else
{
 // Show all available tests
	$sql="SELECT * FROM domain"; 													// Select Domain
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	echo "<div id='accordion'>";                                                   // JqueryUI Accordion
		while($row = mysqli_fetch_array($res))
		{
			echo "<h3><img src='images/logo.png' width='20px'><b>".$row['Name']."</b></h3>";
			$sql="SELECT DISTINCT(subject) FROM test WHERE domain='$row[value]'";   // Select Subject
			$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
			echo "  <div><p>";
				while($row2 = mysqli_fetch_array($res2))
				{
					
					echo "<u>".$row2['subject']."</u></br>";
					$sql="SELECT t_name, id, t_time FROM test WHERE subject='$row2[subject]'";  // Select Test
					$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
						while($row3 = mysqli_fetch_array($res3))
						{
							echo "<div class='test_box'>";
							echo "<img src='images/test.png' width='45px' style=\"float:left; margin-right:5px;\">";
							echo "<a href='start_test.php?id=".$row3['id']."'><img src='images/go-next.png' width='50px' style=\"float:right;\"></a>";
							echo $row3['t_name'];
							echo "<br>Time: ".$row3['t_time']." mins</br><br>";
							
							echo "</div>";
						}
						
				}
			echo "</p></div>";
		}
    echo "</div>";
}
?>


<br><br>
</div>



<a href="index.php" ><img src='images/go-back-b.png' width='40px'><br>Back</a>



<br><br>
</div>

<?php
footer_fn();
?>
</div>
</div>

</body>
</html>
