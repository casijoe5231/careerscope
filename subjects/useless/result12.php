 <?php
    
    session_start();
	if(isset($_SESSION['user']))
	{
	include '../includes/connection1.php';
	include 'styles/theme-master.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Test Management</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
<!-- Jquery UI -->
  <link rel="stylesheet" href="plugins/jqueryui/jquery-ui.css" />
  <script src="plugins/jqueryui/jquery-1.9.1.js"></script>
  <script src="plugins/jqueryui/jquery-ui.js"></script>
  <script>
	$(function() {
		$( ".radio" ).buttonset();
  });
  </script>
<!-- Jquery UI ends here --> 
  <style> 
    .top
	{
	 width: 65%;
	 margin-left:auto;
	 margin-right:auto;
	 margin-bottom:5px;
	 border-radius:5px;
     -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
      border-width:1px;
	padding-left:10px;
	padding-top:6px;
	padding-bottom:4px;
	}
    .question
	{
	 width: 65%;
	 background: url('images/img_title.jpg') repeat-x;
	 background-color:#CCFFFF;
	 margin-left:auto;
	 margin-right:auto;
	 margin-bottom:5px;
	 border-radius:5px;
     -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
      border-width:1px;
	padding-left:10px;
	padding-top:6px;
	padding-bottom:4px;
	}
    .option
	{
	width: 80%;	
	background-color:#CCFF99;
	border-radius:5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-width:1px;
    margin-top:6px;
	}
	
	.choice
	{
	background-color:#CFCFCF;
	float:left;
	border-radius:5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-width:1px;
	margin-right:10px;
	padding-left:4px;
	}
	
	.score
	{
	 width:300px;
	 height:300px;
	margin-left:auto;
	margin-right:auto;
	font-size:36px;
	text-align:center;
	background: url('images/logo/logo_bg2.png');
	padding-top:10px;
	}
	
	.option_green
	{
	background-color:#33CC33;
	float:left;
	 border-radius:5px;
     -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
      border-width:1px;
	  margin-right:10px;
	  padding-left:4px;
	}
	.option_red
	{
	background-color:#CFCFCF;
	float:left;
	 border-radius:5px;
     -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
      border-width:1px;
	  margin-right:10px;
	  padding-left:4px;
	}

	
</style>
</head>

<body>
<div class="bg">
<div class="container">
<?php
header_fn();
?>
<div class="content clearfix">
<h3>Test</h3>

<br><br>
           
			
<div class="panel">
<h3><a href='index.php'><img src="images/go-home.png" width="40px;"></a>
<a href="../logout.php" style="border:1px solid #09F; background:#09F; padding:8px; color:#FFF;  border-radius:5px; font-size:16px; float:right; margin-right:5%;">Logout</a>
</h3>



<?php


    if(isset($_POST['t_id']))
	{
		// Show Test Result 
		$t_id= $_POST['t_id'];
		$neg=0;
		$score=0;
		$correct_ans=0;
		//Check negative marking
		$sql2="SELECT correct, incorrect, negative FROM test WHERE id='$t_id'";
		$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
		while($row2 = mysqli_fetch_array($res2))
		{
			$neg=$row2['negative'];
			$correct=$row2['correct'];      // Marks for correct choice
			$incorrect=$row2['incorrect'];  // Marks for incorrect choice
		}
		
		$sql1="SELECT * FROM relation_mainquestion WHERE t_id='$t_id'";
		$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
		while($row1 = mysqli_fetch_array($res1))
		{
		$sql="SELECT q_id,ans FROM questions WHERE t_id='$row1[id]'";
		$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		$q_total=mysqli_num_rows($res);
		$max_score= $q_total * $correct;
		while($row = mysqli_fetch_array($res))
		{
			//echo "For Question id#".$row['q_id']." ---- Answer: Option ".$row['ans']."<br>"; 
			if(isset($_POST['radio'.$row['q_id']]))
			{
				if($_POST['radio'.$row['q_id']] == $row['ans'])   // Check if Radio button value equals the answer
				{
					$score = $score + $correct;
					$correct_ans++;
				}
				else // Enable negative marking
				{
					if($neg==1)
					{
							$score = $score - $incorrect;
					}	
				}
			}
		}
		}
		

		echo "<p style=\"text-align:center; font-size:40px;\">Your test score is :</p>";
		echo "<div class='score'>";
		//echo "<img src='images/logo/logo_bg.png' width='300px;' style=\"position:absolute; z-index:1;\">";
		echo "<br><h1>".$correct_ans."</h1>";
		echo "</div><br><br>";
		
		// Save Result
		$username=$_SESSION['user'][1];
		date_default_timezone_set('Asia/Calcutta');
		$datetime = date("F j, Y, g:i a");
		$timesql = date("Y-m-d H:i:s");  //2013-10-06 00:00:00
		// Check if Test result has been saved previously
		$attempt=0;
        $sql="SELECT * FROM `score` WHERE username='$username' and t_id='$t_id'";
		$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row = mysqli_fetch_array($res))
			$attempt=$row['attempt'];
		$attempt++;
		$user_scores=mysqli_num_rows($res);
		if($user_scores!=0)          // Previous result exists
		{
			$sql="UPDATE `score` SET `score`='$score', `correct`='$correct_ans',`total`='$q_total', `max_score`='$max_score', `attempt`='$attempt' ,`timesql`='$timesql' WHERE username='$username' and t_id='$t_id'";
			$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
			if($res)
			echo "<p id='center'>Test result updated successfully</p>";
			else
				echo "<p id='center'>Result could not be updated</p>";
			
		}
		else                        // Previous result does not exist
		{
			$sql="INSERT INTO `score`(`username`, `t_id`, `score`, `correct`, `total`, `max_score`, `attempt`, `timesql`) VALUES ('$username','$t_id','$score', '$correct', '$q_total', '$max_score', '1', '$timesql')";
			$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
			if($res)
				echo "<p id='center'>Test result saved successfully</p>";
			else
				echo "<p id='center'>Result could not be saved</p>";
        }
    
	
	
	


    }

?>

</div>
<br><br>


<br>



<br><br><br>
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
include '../includes/connection1.php';
include 'styles/theme-master.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Test Management</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
<!-- Jquery UI -->
  <link rel="stylesheet" href="plugins/jqueryui/jquery-ui.css" />
  <script src="plugins/jqueryui/jquery-1.9.1.js"></script>
  <script src="plugins/jqueryui/jquery-ui.js"></script>
  <script>
	$(function() {
		$( ".radio" ).buttonset();
  });
  </script>
<!-- Jquery UI ends here --> 
  <style> 
    .top
	{
	 width: 65%;
	 margin-left:auto;
	 margin-right:auto;
	 margin-bottom:5px;
	 border-radius:5px;
     -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
      border-width:1px;
	padding-left:10px;
	padding-top:6px;
	padding-bottom:4px;
	}
    .question
	{
	 width: 65%;
	 background: url('images/img_title.jpg') repeat-x;
	 background-color:#CCFFFF;
	 margin-left:auto;
	 margin-right:auto;
	 margin-bottom:5px;
	 border-radius:5px;
     -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
      border-width:1px;
	padding-left:10px;
	padding-top:6px;
	padding-bottom:4px;
	}
    .option
	{
	width: 80%;	
	background-color:#CCFF99;
	border-radius:5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-width:1px;
    margin-top:6px;
	}
	
	.choice
	{
	background-color:#CFCFCF;
	float:left;
	border-radius:5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-width:1px;
	margin-right:10px;
	padding-left:4px;
	}
	
	.score
	{
	 width:300px;
	 height:300px;
	margin-left:auto;
	margin-right:auto;
	font-size:36px;
	text-align:center;
	background: url('images/logo/logo_bg2.png');
	padding-top:10px;
	}
	
	.option_green
	{
	background-color:#33CC33;
	float:left;
	 border-radius:5px;
     -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
      border-width:1px;
	  margin-right:10px;
	  padding-left:4px;
	}
	.option_red
	{
	background-color:#CFCFCF;
	float:left;
	 border-radius:5px;
     -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
      border-width:1px;
	  margin-right:10px;
	  padding-left:4px;
	}

	
</style>
</head>

<body>
<div class="bg">
<div class="container">
<?php
header_fn();
?>
<div class="content clearfix">
<h3>Test</h3>

<br><br>
           
			
<div class="panel">
<h3><a href='index.php'><img src="images/go-home.png" width="40px;"></a>
<a href="../logout.php" style="border:1px solid #09F; background:#09F; padding:8px; color:#FFF;  border-radius:5px; font-size:16px; float:right; margin-right:5%;">Logout</a>
</h3>



<?php


    if(isset($_POST['t_id']))
	{
		// Show Test Result 
		$t_id= $_POST['t_id'];
		$neg=0;
		$score=0;
		$correct_ans=0;
		//Check negative marking
		$sql="SELECT correct, incorrect, negative FROM test WHERE id='$t_id'";
		$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row = mysqli_fetch_array($res))
		{
			$neg=$row['negative'];
			$correct=$row['correct'];      // Marks for correct choice
			$incorrect=$row['incorrect'];  // Marks for incorrect choice
		}
		
		$sql="SELECT q_id,ans FROM questions WHERE t_id='$t_id'";
		$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		$q_total=mysqli_num_rows($res);
		$max_score= $q_total * $correct;
		while($row = mysqli_fetch_array($res))
		{
			//echo "For Question id#".$row['q_id']." ---- Answer: Option ".$row['ans']."<br>"; 
			if(isset($_POST['radio'.$row['q_id']]))
			{
				if($_POST['radio'.$row['q_id']] == $row['ans'])   // Check if Radio button value equals the answer
				{
					$score = $score + $correct;
					$correct_ans++;
				}
				else // Enable negative marking
				{
					if($neg==1)
					{
							$score = $score - $incorrect;
					}	
				}
			}
		}

		echo "<p style=\"text-align:center; font-size:40px;\">Your test score is :</p>";
		echo "<div class='score'>";
		//echo "<img src='images/logo/logo_bg.png' width='300px;' style=\"position:absolute; z-index:1;\">";
		echo "<br><h1>".$score." / ".$max_score."</h1>";
		echo "</div><br><br>";
		
		// Save Result
		$username=$_SESSION['user2'][1];
		date_default_timezone_set('Asia/Calcutta');
		$datetime = date("F j, Y, g:i a");
		$timesql = date("Y-m-d H:i:s");  //2013-10-06 00:00:00
		// Check if Test result has been saved previously
		$attempt=0;
        $sql="SELECT * FROM `score` WHERE username='$username' and t_id='$t_id'";
		$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row = mysqli_fetch_array($res))
			$attempt=$row['attempt'];
		$attempt++;
		$user_scores=mysqli_num_rows($res);
		if($user_scores!=0)          // Previous result exists
		{
			$sql="UPDATE `score` SET `score`='$score', `correct`='$correct_ans',`total`='$q_total', `max_score`='$max_score', `attempt`='$attempt' ,`timesql`='$timesql' WHERE username='$username' and t_id='$t_id'";
			$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
			if($res)
			echo "<p id='center'>Test result updated successfully</p>";
			else
				echo "<p id='center'>Result could not be updated</p>";
			
		}
		else                        // Previous result does not exist
		{
			$sql="INSERT INTO `score`(`username`, `t_id`, `score`, `correct`, `total`, `max_score`, `attempt`, `timesql`) VALUES ('$username','$t_id','$score', '$correct', '$q_total', '$max_score', '1', '$timesql')";
			$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
			if($res)
				echo "<p id='center'>Test result saved successfully</p>";
			else
				echo "<p id='center'>Result could not be saved</p>";
        }
    
	
	
	// Show Questions with answers
	$q_id=0;
	$q_index=1;  
	$i=1;
	$sql="SELECT * FROM questions WHERE t_id='$t_id'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    $q_total=mysqli_num_rows($res);
      
		while($row = mysqli_fetch_array($res))
		{
		    
			if(isset($_POST['radio'.$row['q_id']]))
			{
				$q_ans=$_POST['radio'.$row['q_id']];
				if($q_ans == $row['ans'])   // Check if Radio button value equals the answer
				{
					$correct=1;
				}
				else 
				{
				    $correct=0;
				}
			}
			else
			{
			 //Unanswered question
			 $q_ans=0;
			 $correct=0;
			}
			
			
			echo "<div class='question'><b style=\" color:white;\">Question ".$q_index."</b>   ";
			if($correct==1)
			{
			//echo "<b style=\" color:white;\"> - Correct</b>";
			echo "<img src='images/correct.png' width='20px;'>";
			}
			else
			echo "<img src='images/delete2.png' width='20px;'>";
			
			echo "<br><br>".$row['question']."</div>";
			
			echo "<div class='cover' style=\" width:65%; margin-left:auto; margin-right:auto;\">";
			
			echo "<div class='option'>";
			if($q_ans==1) 
			echo"<div class='option_green'>";
			else
			echo"<div class='option_red'>";
			echo "Option 1: &nbsp;";
			echo "</div>".$row['opt1']."</div>";
			
			echo "<div class='option'>";
			if($q_ans==2) 
			echo"<div class='option_green'>";
			else
			echo"<div class='option_red'>";
			echo "Option 2: &nbsp;";
			echo "</div>".$row['opt2']."</div>";
			
			echo "<div class='option'>";
			if($q_ans==3) 
			echo"<div class='option_green'>";
			else
			echo"<div class='option_red'>";
			echo "Option 3: &nbsp;";
			echo "</div>".$row['opt3']."</div>";

			echo "<div class='option'>";
			if($q_ans==4) 
			echo"<div class='option_green'>";
			else
			echo"<div class='option_red'>";
			echo "Option 4: &nbsp;";
			echo "</div>".$row['opt4']."</div>";
            
			echo "</div>";
			
			echo "<br><br>";
			$q_index++;
		}


    }

?>

</div>
<br><br>


<br>



<br><br><br>
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
else
{
		header('location:../login.php');
		exit();
}
?>