<?php
    session_start();
	if(isset($_SESSION['user']))
	{
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
	
	.radio
	{
	font-size:14px;
	font-family:Tahoma;
	}
	
	#fixed-div 
	{
    position: fixed;
    top: 1em;
    right: 1em;
	width:350px;
	background-color:#CFCFCF;
	border-radius:5px;
	border-style:solid;
	border-width:4px;
	border-color:#3399FF #99CCFF; /*  tb rl */
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
	margin-right:10px;
	padding: 10px 0px 10px 4px;  /*  trbl */
    }
</style>
</head>

<body>
<!-- Check if Javascript is disabled -->
<noscript>
	<br>
	
	<h3 style="text-align:center;">
	<img src="images/warning.png" height="80px"><br>
	JavaScript is disabled!<br>
	This test requires JavaScript to be enabled.<br> 
	Please enable JavaScript in your web browser!</h3>
 
	<style type="text/css">
		.container { display:none; }
	</style>
</noscript>
<div class="bg">
<div class="container">
<?php
header_fn();
?>
<div class="content clearfix">
<h3>Test</h3>
<div class="nav">
<a href="index.php">Home</a>
 > 
<a href="test.php">Test</a>
</div>
<br><br>
           
			
<div class="panel">
<h3>Tests
<a href="../logout.php" style="border:1px solid #09F; background:#09F; padding:8px; color:#FFF;  border-radius:5px; font-size:16px; float:right; margin-right:5%;">Logout</a>
</h3>


<?php
include 'connection1.php';

$q_id=0;
$q_index=1;  
$i=1;

if(isset($_GET['id']))
{

    echo "<h3 style=\"text-align:center;\">Test Questions</h3>";
	// Show Test time
	$id=$_GET['id'];
	$sql="SELECT t_time FROM test WHERE id='$id'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    $q_total=mysqli_num_rows($res); 
    
	echo "<div id='fixed-div'>";
     echo "<img src='images/test-time.png' style=\"float:left; margin-right:5px; \">";	
		while($row = mysqli_fetch_array($res))
		{
          echo "<b>Test Time: </b>".$row['t_time']." minutes";
		  $time=$row['t_time'];
		  echo " <br><br><b>Time Left: </b>";
		  
		  echo "<script type=\"text/javaScript\">";
		  echo "setTimeout('document.forms[\"TestForm\"].submit();alert(\"You have reached the Test time limit!\");', ".$time." * 60 * 1000);";
          echo "</script>";
		  
		  echo "<script language=\"JavaScript\">";
		  echo "var myDate=new Date();";
          echo "myDate.setDate(myDate.getDate()+1);";
		  echo "var currentDate = new Date();";
	      echo "var newDate = currentDate.getTime() + (".$time." * 60 * 1000);";		  
        }			
?>

TargetDate = newDate;
	

BackColor = "";
ForeColor = "navy";
CountActive = true;
CountStepper = -1;
LeadingZero = true;
//DisplayFormat = "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
DisplayFormat = "%%M%% Minutes, %%S%% Seconds.";
FinishMessage = "Test Time completed!";



function Save()
{
 if(confirm('Do you want to Submit?'))
document.forms[0].submit();
else alert('You can continue to make changes')
}

</script>
<script language="JavaScript" src="plugins/countdown.js"></script>
</div>

<?php
	

    // Start Test Form
	echo "<form name='TestForm' action='result1.php' method='POST'>";
		
		$sql1="SELECT * FROM relation_mainquestion WHERE t_id='$_GET[id]'";
	    $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
		while($row1= mysqli_fetch_array($res1))
		{
		$_SESSION['quest_id']=$row1['id'];
		echo "<div class='question'><b style=\" color:white;\">Main Question</b>";
			echo "<br><br>".$row1['question'];
		
		echo "</div>";
		
	$sql="SELECT * FROM questions WHERE t_id='$row1[id]'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    $q_total=mysqli_num_rows($res);
    echo "<input type='hidden' name='t_id' value='".$_GET['id']."'>";
      $q_index=1;
		while($row = mysqli_fetch_array($res))
		{
			
			echo "<div class='question'><b style=\" color:white;\">Question ".$q_index."</b>";
			if($row['q_id']==$q_id)
			{
			echo "<b style=\" color:white;\"> - Edited</b>";
			}
			
			echo "<br><br>".$row['question']."</div>";
			
			echo "<div class='cover' style=\" width:65%; margin-left:auto; margin-right:auto;\">";
			echo "<div class='option'>";
			echo"<div class='choice'>";
			echo "Option 1: &nbsp;";
			echo "</div>".$row['opt1']."</div>";
			
			echo "<div class='option'>";
			echo"<div class='choice'>";
			echo "Option 2: &nbsp;";
			echo "</div>".$row['opt2']."</div>";
			
			echo "<div class='option'>";
			echo"<div class='choice'>";
			echo "Option 3: &nbsp;";
			echo "</div>".$row['opt3']."</div>";

			echo "<div class='option'>";
			echo"<div class='choice'>";
			echo "Option 4: &nbsp;";
			echo "</div>".$row['opt4']."</div>";
			

			//Show Options
            echo "<br><div class='radio'><b style=\" font-size:16px;\">Answer: &nbsp;</b>";
			echo "<input type='radio' id='radio".$i."' name='radio".$row['q_id']."' value='1' /><label for='radio".$i++."'><b>Option 1</b></label>";
			echo "<input type='radio' id='radio".$i."' name='radio".$row['q_id']."' value='2' /><label for='radio".$i++."'><b>Option 2</b></label>";
			echo "<input type='radio' id='radio".$i."' name='radio".$row['q_id']."' value='3' /><label for='radio".$i++."'><b>Option 3</b></label>";
			echo "<input type='radio' id='radio".$i."' name='radio".$row['q_id']."' value='4' /><label for='radio".$i++."'><b>Option 4</b></label>";
			echo "</div>";
            
			echo "</div>";
			
			echo "<br><br>";
			$q_index++;
		}
		}
    
	echo "<br><input type='submit' class='button center' value='Submit Test' name='test_submit' ><br><br>";
    echo "</form>";
	
}
else
{
	echo "<h3 style=\"text-align:center;\"><br>Processing<br>";
	echo "<img src='images/preload.gif' width='50px'></h3>";
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
	
	.radio
	{
	font-size:14px;
	font-family:Tahoma;
	}
	
	#fixed-div 
	{
    position: fixed;
    top: 1em;
    right: 1em;
	width:350px;
	background-color:#CFCFCF;
	border-radius:5px;
	border-style:solid;
	border-width:4px;
	border-color:#3399FF #99CCFF; /*  tb rl */
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
	margin-right:10px;
	padding: 10px 0px 10px 4px;  /*  trbl */
    }
</style>
</head>

<body>
<!-- Check if Javascript is disabled -->
<noscript>
	<br>
	
	<h3 style="text-align:center;">
	<img src="images/warning.png" height="80px"><br>
	JavaScript is disabled!<br>
	This test requires JavaScript to be enabled.<br> 
	Please enable JavaScript in your web browser!</h3>
 
	<style type="text/css">
		.container { display:none; }
	</style>
</noscript>
<div class="bg">
<div class="container">
<?php
header_fn();
?>
<div class="content clearfix">
<h3>Test</h3>
<div class="nav">
<a href="index.php">Home</a>
 > 
<a href="test.php">Test</a>
</div>
<br><br>
           
			
<div class="panel">
<h3>Tests
<a href="../logout.php" style="border:1px solid #09F; background:#09F; padding:8px; color:#FFF;  border-radius:5px; font-size:16px; float:right; margin-right:5%;">Logout</a>
</h3>


<?php
include 'connection1.php';

$q_id=0;
$q_index=1;  
$i=1;

if(isset($_GET['id']))
{
    echo "<h3 style=\"text-align:center;\">Test Questions</h3>";
	// Show Test time
	$id=$_GET['id'];
	$sql="SELECT t_time FROM test WHERE id=$id";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    $q_total=mysqli_num_rows($res); 
    
	echo "<div id='fixed-div'>";
     echo "<img src='images/test-time.png' style=\"float:left; margin-right:5px; \">";	
		while($row = mysqli_fetch_array($res))
		{
          echo "<b>Test Time: </b>".$row['t_time']." minutes";
		  $time=$row['t_time'];
		  echo " <br><br><b>Time Left: </b>";
		  
		  echo "<script type=\"text/javaScript\">";
		  echo "setTimeout('document.forms[\"TestForm\"].submit();alert(\"You have reached the Test time limit!\");', ".$time." * 60 * 1000);";
          echo "</script>";
		  
		  echo "<script language=\"JavaScript\">";
		  echo "var myDate=new Date();";
          echo "myDate.setDate(myDate.getDate()+1);";
		  echo "var currentDate = new Date();";
	      echo "var newDate = currentDate.getTime() + (".$time." * 60 * 1000);";		  
        }			
?>

TargetDate = newDate;
	

BackColor = "";
ForeColor = "navy";
CountActive = true;
CountStepper = -1;
LeadingZero = true;
//DisplayFormat = "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
DisplayFormat = "%%M%% Minutes, %%S%% Seconds.";
FinishMessage = "Test Time completed!";



function Save()
{
 if(confirm('Do you want to Submit?'))
document.forms[0].submit();
else alert('You can continue to make changes')
}

</script>
<script language="JavaScript" src="plugins/countdown.js"></script>
</div>

<?php

    // Start Test Form
	echo "<form name='TestForm' action='result.php' method='POST'>";
	$sql="SELECT * FROM questions WHERE t_id='$_GET[id]'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    $q_total=mysqli_num_rows($res);
    echo "<input type='hidden' name='t_id' value='".$_GET['id']."'>";
      
		while($row = mysqli_fetch_array($res))
		{
			
			echo "<div class='question'><b style=\" color:white;\">Question ".$q_index."</b>";
			if($row['q_id']==$q_id)
			{
			echo "<b style=\" color:white;\"> - Edited</b>";
			}
			
			echo "<br><br>".$row['question']."</div>";
			
			echo "<div class='cover' style=\" width:65%; margin-left:auto; margin-right:auto;\">";
			echo "<div class='option'>";
			echo"<div class='choice'>";
			echo "Option 1: &nbsp;";
			echo "</div>".$row['opt1']."</div>";
			
			echo "<div class='option'>";
			echo"<div class='choice'>";
			echo "Option 2: &nbsp;";
			echo "</div>".$row['opt2']."</div>";
			
			echo "<div class='option'>";
			echo"<div class='choice'>";
			echo "Option 3: &nbsp;";
			echo "</div>".$row['opt3']."</div>";

			echo "<div class='option'>";
			echo"<div class='choice'>";
			echo "Option 4: &nbsp;";
			echo "</div>".$row['opt4']."</div>";
			

			//Show Options
            echo "<br><div class='radio'><b style=\" font-size:16px;\">Answer: &nbsp;</b>";
			echo "<input type='radio' id='radio".$i."' name='radio".$row['q_id']."' value='1' /><label for='radio".$i++."'><b>Option 1</b></label>";
			echo "<input type='radio' id='radio".$i."' name='radio".$row['q_id']."' value='2' /><label for='radio".$i++."'><b>Option 2</b></label>";
			echo "<input type='radio' id='radio".$i."' name='radio".$row['q_id']."' value='3' /><label for='radio".$i++."'><b>Option 3</b></label>";
			echo "<input type='radio' id='radio".$i."' name='radio".$row['q_id']."' value='4' /><label for='radio".$i++."'><b>Option 4</b></label>";
			echo "</div>";
            
			echo "</div>";
			
			echo "<br><br>";
			$q_index++;
		}
    
	echo "<br><input type='submit' class='button center' value='Submit Test' name='test_submit' ><br><br>";
    echo "</form>";
}
else
{
	echo "<h3 style=\"text-align:center;\"><br>Processing<br>";
	echo "<img src='images/preload.gif' width='50px'></h3>";
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