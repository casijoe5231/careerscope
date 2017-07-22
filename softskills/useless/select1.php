 <?php
    session_start();
	include 'styles/theme-master.php';
	
	include '../includes/connection1.php';

	$emaill=$_SESSION['user'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Aptitude Test','$timesql')";
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
	if(isset($_SESSION['user']))
	{
      echo "<div class='title'>";
	  echo "<h3>&nbsp; Welcome "; 
	  echo $_SESSION['user'][1];
	  echo "</h3>";
	  echo "</div>";
	  echo "<a href='../logout.php' style=\"border:1px solid #09F; background:#09F; padding:4px; color:#FFF;  border-radius:5px; float:right; font-size:16px; margin-right:5%;\">Logout</a>";
    }
	elseif(isset($_SESSION['user1']))
	{
	  echo "<div class='title'>";
	  echo "<h3>&nbsp; Welcome "; 
	  echo $_SESSION['user1'][1];
	  echo "</h3>";
	  echo "</div>";
	  echo "<a href='../logout.php' style=\"border:1px solid #09F; background:#09F; padding:4px; color:#FFF;  border-radius:5px; float:right; font-size:16px; margin-right:5%;\">Logout</a>";
	}
	elseif(isset($_SESSION['user2']))
	{
	  echo "<div class='title'>";
	  echo "<h3>&nbsp; Welcome "; 
	  echo $_SESSION['user2'][1];
	  echo "</h3>";
	  echo "</div>";
	  echo "<a href='../logout.php' style=\"border:1px solid #09F; background:#09F; padding:4px; color:#FFF;  border-radius:5px; float:right; font-size:16px; margin-right:5%;\">Logout</a>";
	}
	else
	 echo "<a href='../login.php' style=\"border:1px solid #09F; background:#09F; padding:8px; color:#FFF;  border-radius:5px; font-size:16px; float:right; margin-right:5%;\">Login</a>";
?>


<div class="test_display">
<b>Tests Available</b><br><br>
<?php
include '../includes/connection1.php';
// Show test based on domain, If domain not selected, show all tests available.
if(isset($_GET['type']))
{
	$_SESSION['type']=$_GET['type'];
            if($_GET['type']=="tech")
			{
				echo "<div class='test_box'>";
				echo "<img src='images/tech.png' width='50px' style=\"float:left; margin-right:5px;\">";
				echo "<a href='select.php?type=compit'><img src='images/go-next-b.png' width='50px' style=\"float:right;\"></a>";
				echo "<h3> Computers/I.T </h3>";
				echo "</div>";

				echo "<div class='test_box'>";
				echo "<img src='images/tech.png' width='50px' style=\"float:left; margin-right:5px;\">";
				echo "<a href='select.php?type=extc'><img src='images/go-next-b.png' width='50px' style=\"float:right;\"></a>";
				echo "<h3> E.X.T.C </h3>";
				echo "</div>";

				echo "<div class='test_box'>";
				echo "<img src='images/tech.png' width='50px' style=\"float:left; margin-right:5px;\">";
				echo "<a href='select.php?type=mech'><img src='images/go-next-b.png' width='50px' style=\"float:right;\"></a>";
				echo "<h3> Mechanical </h3>";
				echo "</div>";

			}
			$sql="SELECT DISTINCT(subject) FROM test WHERE domain='$_GET[type]'";   // Select Subject
			$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
				while($row2 = mysqli_fetch_array($res2))
				{
					echo "&nbsp;&nbsp;&nbsp;&nbsp;";
					echo "<u>".$row2['subject']."</u></br>";
					if($row2['subject']=='Directional Tests')
					{
					$sql1="SELECT t_name, id, t_time FROM test WHERE subject='$row2[subject]'";  // Select Test
					$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
						while($row1 = mysqli_fetch_array($res1))
						{
							echo "<div class='test_box'>";
							echo "<img src='images/test.png' width='50px' style=\"float:left; margin-right:5px;\">";
							echo "<a href='start_test.php?id=".$row1['id']."'><img src='images/go-next.png' width='50px' style=\"float:right;\"></a>";
							echo $row1['t_name'];
							echo "<br>Time: ".$row1['t_time']." mins</br><br>";
							
							echo "</div>";
						}
					}
					elseif($row2['subject']=='Relationship Tests')
					{
						$sql4="SELECT t_name, id, t_time FROM test WHERE subject='$row2[subject]'";  // Select Test
					$res4=mysqli_query($GLOBALS["___mysqli_ston"], $sql4);
						while($row4 = mysqli_fetch_array($res4))
						{
							echo "<div class='test_box'>";
							echo "<img src='images/test.png' width='50px' style=\"float:left; margin-right:5px;\">";
							echo "<a href='start_test1.php?id=".$row4['id']."'><img src='images/go-next.png' width='50px' style=\"float:right;\"></a>";
							echo $row4['t_name'];
							echo "<br>Time: ".$row4['t_time']." mins</br><br>";
							
							echo "</div>";
						}
					}
					elseif($row2['subject']=='Arrange Letters / Numbers')
					{
						$sql6="SELECT t_name, id, t_time FROM test WHERE subject='$row2[subject]'";  // Select Test
					$res6=mysqli_query($GLOBALS["___mysqli_ston"], $sql6);
						while($row6 = mysqli_fetch_array($res6))
						{
							echo "<div class='test_box'>";
							echo "<img src='images/test.png' width='50px' style=\"float:left; margin-right:5px;\">";
							echo "<a href='start_test1.php?id=".$row6['id']."'><img src='images/go-next.png' width='50px' style=\"float:right;\"></a>";
							echo $row6['t_name'];
							echo "<br>Time: ".$row6['t_time']." mins</br><br>";
							
							echo "</div>";
						}
					}
					elseif($row2['subject']=='Judgement Tests')
					{
						$sql7="SELECT t_name, id, t_time FROM test WHERE subject='$row2[subject]'";  // Select Test
					$res7=mysqli_query($GLOBALS["___mysqli_ston"], $sql7);
						while($row7 = mysqli_fetch_array($res7))
						{
							echo "<div class='test_box'>";
							echo "<img src='images/test.png' width='50px' style=\"float:left; margin-right:5px;\">";
							echo "<a href='start_test1.php?id=".$row7['id']."'><img src='images/go-next.png' width='50px' style=\"float:right;\"></a>";
							echo $row7['t_name'];
							echo "<br>Time: ".$row7['t_time']." mins</br><br>";
							
							echo "</div>";
						}
					}
					elseif($row2['subject']=='Data Interpretation')
					{
						$sql8="SELECT t_name, id, t_time FROM test WHERE subject='$row2[subject]'";  // Select Test
					$res8=mysqli_query($GLOBALS["___mysqli_ston"], $sql8);
						while($row8 = mysqli_fetch_array($res8))
						{
							echo "<div class='test_box'>";
							echo "<img src='images/test.png' width='50px' style=\"float:left; margin-right:5px;\">";
							echo "<a href='start_test2.php?id=".$row8['id']."'><img src='images/go-next.png' width='50px' style=\"float:right;\"></a>";
							echo $row8['t_name'];
							echo "<br>Time: ".$row8['t_time']." mins</br><br>";
							
							echo "</div>";
						}
					}
					elseif($row2['subject']=='Coding Decoding')
					{
						$sql9="SELECT t_name, id, t_time FROM test WHERE subject='$row2[subject]'";  // Select Test
					$res9=mysqli_query($GLOBALS["___mysqli_ston"], $sql9);
						while($row9 = mysqli_fetch_array($res9))
						{
							echo "<div class='test_box'>";
							echo "<img src='images/test.png' width='50px' style=\"float:left; margin-right:5px;\">";
							echo "<a href='start_test1.php?id=".$row9['id']."'><img src='images/go-next.png' width='50px' style=\"float:right;\"></a>";
							echo $row9['t_name'];
							echo "<br>Time: ".$row9['t_time']." mins</br><br>";
							
							echo "</div>";
						}
					}
					elseif($row2['subject']=='Intelligence Tests')
					{
						$sql9="SELECT t_name, id, t_time FROM test WHERE subject='$row2[subject]'";  // Select Test
					$res9=mysqli_query($GLOBALS["___mysqli_ston"], $sql9);
						while($row9 = mysqli_fetch_array($res9))
						{
							echo "<div class='test_box'>";
							echo "<img src='images/test.png' width='50px' style=\"float:left; margin-right:5px;\">";
							echo "<a href='start_test3.php?id=".$row9['id']."'><img src='images/go-next.png' width='50px' style=\"float:right;\"></a>";
							echo $row9['t_name'];
							echo "<br>Time: ".$row9['t_time']." mins</br><br>";
							
							echo "</div>";
						}
					}
					else
					{
						$sql5="SELECT t_name, id, t_time FROM test WHERE subject='$row2[subject]'";  // Select Test
					$res5=mysqli_query($GLOBALS["___mysqli_ston"], $sql5);
						while($row5 = mysqli_fetch_array($res5))
						{
							echo "<div class='test_box'>";
							echo "<img src='images/test.png' width='50px' style=\"float:left; margin-right:5px;\">";
							echo "<a href='start_test.php?id=".$row5['id']."'><img src='images/go-next.png' width='50px' style=\"float:right;\"></a>";
							echo $row5['t_name'];
							echo "<br>Time: ".$row5['t_time']." mins</br><br>";
							
							echo "</div>";
						}
					}
				}
			
}
else
{
	include '../includes/connection1.php';
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
