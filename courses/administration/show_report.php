 <?php
    session_start();
	if(!isset($_SESSION['administration']))
	{
		header('location:index.php');
		exit();
	}
	include '../connection.php';
	include '../styles/theme-master.php';
	?>
<!DOCTYPE html>
<html>
<head>
<title>Aptitude</title>
<link rel="icon" href="../images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="../styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="../styles/theme-master.css">
<!-- Modal -->
<!-- Modal Form CSS files -->
<link type='text/css' href='../plugins/modal/css/basic_report.css' rel='stylesheet' media='screen' />
<!-- Load jQuery, SimpleModal and Basic JS files -->
<script type='text/javascript' src='../plugins/modal/js/jquery.js'></script>
<script type='text/javascript' src='../plugins/modal/js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='../plugins/modal/js/view_report.js'></script>
<script>
function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
}
</script> 
<!-- Modal ends here -->
<style>
.options_left
{
 width:30%;
 float:left;
}
.display_right
{
 width:60%;
 float:right;
}
table
{
 text-align:center;
}
</style>
</head>

<body>
<div class="bg">
<div class="container">
<?php
header_admin_fn();
?>
<div class="content clearfix">
<h3>User Test Reports
<a href="logout.php" style="border:1px solid #09F; background:#09F; padding:8px; color:#FFF;  border-radius:5px; font-size:16px; float:right; margin-right:5%;">Logout</a>
</h3>
<div class="nav">
<a href="home.php">Home</a>
 >
<a href="show_report.php">Show Reports</a>
</div>
<br><br>

<div class="panel">
<br>
<div class="options_left">

<?php
// Script to save previous dropdown selection , so that user is not required to select again.
if(isset($_POST['class']))
{ 
 //Set dropdown to previously selected value
 $class_set=$_POST['class'];
 $branch_set=$_POST['branch'];
}
else
{
 // Use Default values
 $class_set='F.E';
 $branch_set='Computers';
}

echo "<b>Show Report for Class</b><br>
<img src='../images/report.png' height='68px' align='left'>
<br>";
echo "<form action='show_report.php' method='POST'>
<table><tr><td>
<label><strong>Class:</strong></label></td><td>
<select name='class'>";   

	echo "<option value='F.E' ";
	if($class_set=="F.E") echo "selected";
	echo ">First Year</option><option value='S.E' ";
	if($class_set=="S.E") echo "selected";
	echo ">Second Year</option><option value='T.E' ";
	if($class_set=="T.E") echo "selected";
	echo ">Third Year</option><option value='B.E' ";
	if($class_set=="B.E") echo "selected";
	echo ">Final Year</option></select>";

	echo "</td></tr><tr><td>				
	<label><strong>Department:</strong></label></td><td>
	<select name='branch'>";

	echo "<option value='Computer' ";
	if($branch_set=="Computer") echo "selected";
	echo ">Computers</option><option value='I.T.' ";
	if($branch_set=="I.T.") echo "selected";
	echo ">I.T.</option><option value='EXTC' ";
	if($branch_set=="EXTC") echo "selected";
	echo ">EXTC</option><option value='MECH' ";
	if($branch_set=="MECH") echo "selected";
	echo ">Mechanical</option></select>";

echo "</td></tr></table>";

echo "<input type='submit' name='score' value='Show Reports' class='button' >";
echo "<input type='submit' name='show_users' value='Show Users' class='button' >";
echo "</form>";  
echo "<br><br>";


// Show report option for subject
echo "<b>Show Report for Test</b><br>
<img src='../images/test.png' height='68px' align='left'>
<br>";
echo "<form action='show_report.php' method='POST'>";
echo "<table><tr><td>
	<label><strong>Subject:</strong></label></td><td>
	<select name='test_select'>";
// Find tests from database	
$sql="SELECT * FROM test";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
while($row=mysqli_fetch_array($res))	
{
echo "<option value='".$row['id']."'>".$row['t_name']."</option>";
}
echo "</select></td>";
echo "</tr></table>";   
echo "<br><input type='submit' name='subject_report' value='Show Report' class='button' >";
echo "</form>";  


?>
<br><br>
</div>

<div class="display_right">
<?php

// Alternative
if(isset($_POST['score']))
{

$class=$_POST['class'];
$branch=$_POST['branch'];
$index=1;
$sql="SELECT * FROM score INNER JOIN user ON score.username=user.username AND class='$class' AND branch='$branch'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$returned_rows = mysqli_num_rows($res);
   if($returned_rows==0)
   {
    echo "<b> It seems no student from ".$_POST['class']." ".$_POST['branch']." has performed a test</b>";
   }
   else
   {
    echo "<u>Tests performed by students from ".$_POST['class']." ".$_POST['branch']." .</u><br><br>";
	echo "<table cellpadding='8'>";
	echo "<tr><th> </th><th>Name</th><th>Test Name</th><th>Subject</th><th>Score</th><th>Attempt Time</th></tr>";
	while($row=mysqli_fetch_array($res))
	{
		$sql="SELECT t_name, subject FROM test WHERE id='$row[t_id]' ";
		$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row2=mysqli_fetch_array($res2))
		{
		$time = strtotime($row['timesql']);
		$new_time = date('F j, Y, g:i a', $time);
		echo "<tr><td>".$index.".) </td><td>".$row['fname']." ".$row['lname']."</td><td>".$row2['t_name']."</td><td>".$row2['subject']."</td><td>".$row['score']." / ".$row['max_score']."</td><td>".$new_time."</td></tr>";
	    $index++;
		}
	}
	echo "</table>";
	echo "<form action='save_class_res.php' method='POST' target='blank'>";    // Save as PDF
	echo "<input type='hidden' name='class' value='".$class."'>";
	echo "<input type='hidden' name='branch' value='".$branch."'>";
	echo "<br><input type='submit' name='save_res' value='Save as PDF' class='button right' >";
	echo "</form>";
	
	}
}




if(isset($_POST['show_users']))
{

   $index=1;
   $sql="SELECT username, fname,lname, email FROM user WHERE class = '$_POST[class]' AND branch = '$_POST[branch]'";
   $res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
   $returned_rows = mysqli_num_rows($res3);
   if($returned_rows==0)
   {
    echo "<b> It seems no student from ".$_POST['class']." ".$_POST['branch']." has registered</b>";
   }
   else
   {
    echo "<u>The following students from ".$_POST['class']." ".$_POST['branch']." have registered.</u><br><br>";
    echo "<table cellpadding='3'>";
	echo "<tr><td></td>  <td><b>Name:</b></td>  <td><b>Email:</b></td></tr>";
    while($row = mysqli_fetch_array($res3))
    {
	  echo "<tr><td>".$index." .)</td>";
	  echo "<td>".$row['fname']." ".$row['lname']."</td>";
	  echo "<td><i>".$row['email']."</i></td><td>";
	  $index++;
	  echo "<div id='basic-modal'> <a href='#' class='basic' style=\"border:1px solid #09F; background:#09F; padding:2px; color:#FFF;  border-radius:5px;\" onClick=\"setCookie('apt_username','".$row['username']."',1)\">View Report</a> </div>   </td></tr>";
	  
    }
    echo "</table>";
   }
}


if(isset($_POST['subject_report']))
{
$index=1;
$test_id=$_POST['test_select'];
$sql="SELECT * FROM score INNER JOIN test ON score.t_id=test.id AND t_id='$test_id'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$returned_rows = mysqli_num_rows($res);
   if($returned_rows==0)
   {
    echo "<b> It seems no student has performed a test</b>";
   }
   else
   {
    //Show Test Name and subject
	$sql="SELECT t_name, subject FROM test WHERE id='$test_id'";
	$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	while($row=mysqli_fetch_array($result))
	{
	 $test_name=$row['t_name'];
	 $subject_name=$row['subject'];
	}
	echo "<br><b>Test Name: </b>".$test_name;
	echo "<br><b>Subject Name: </b>".$subject_name;
    echo "<br><p id='center'>Tests Results</p><br><br>";
	echo "<table cellpadding='8'>";
	echo "<tr><th> </th><th>Name</th><th>Score</th><th>Attempts</th><th>Class</th><th>Time</th> </tr>";
	while($row=mysqli_fetch_array($res))
	{
		//$sql="SELECT t_name, subject FROM test WHERE id='$row[t_id]' ";
		$sql="SELECT fname, lname, class, branch FROM user WHERE username='$row[username]' ";
		$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row2=mysqli_fetch_array($res2))
		{
		$time = strtotime($row['timesql']);
		$new_time = date('F j, Y, g:i a', $time);		
		echo "<tr><td>".$index.".) </td><td>".$row2['fname']." ".$row2['lname']."</td><td>".$row['score']." / ".$row['max_score']."</td><td>".$row['attempt']."</td><td>".$row2['class']."  ".$row2['branch']."</td><td>".$new_time."</td></tr>";
	    $index++;
		}
	}
	echo "</table>";
	echo "<form action='save_subject_res.php' method='POST' target='blank'>";    // Save as PDF
	echo "<input type='hidden' name='test_id' value='".$test_id."'>";
	echo "<br><input type='submit' name='save_res' value='Save as PDF' class='button right' >";
	
	}
}

?>

<br><br><br><br>
</div>
<br><br>
</div>
<br>

<br><br><br>
</div>

<?php
footer_admin_fn();
?>
</div>
</div>
</body>
</html>