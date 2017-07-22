<?php
  /*  session_start();
	if(!isset($_SESSION['s_username']))
	{
		header('location:../index.php');
		exit();
	}*/
	include '../styles/theme-master.php';
	?>
<!DOCTYPE html>
<html><head><title>Skill Assessment Home</title>
<link rel="icon" href="../images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="../styles/theme-style-staff.css">
<link rel="stylesheet" type="text/css" href="../styles/theme-master.css">
<!-- Modal -->
<!-- Contact Form CSS files -->
<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />
<!-- Load jQuery, SimpleModal and Basic JS files -->
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/basic.js'></script>
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


<!-- Graph plot 2 -->
<!-- <script type="text/javascript" src="../plugins/jquery.min.js"></script> -->
<script type="text/javascript" src="../plugins/jquery.min.js"></script>
<script type="text/javascript" src="../plugins/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="../plugins/jqplot.barRenderer.min.js"></script>
<script type="text/javascript" src="../plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script type="text/javascript" src="../plugins/jqplot.pointLabels.min.js"></script>
<link rel="stylesheet" type="text/css" href="../plugins/jquery.jqplot.min.css" />
<!-- Graph plot 2 ends here -->

<style>
table
{
 margin-left:auto;
 margin-right:auto;
}
td 
{
  text-align: center;
  vertical-align:top;
}
</style>
</head>
<body>
<div class="bg">
<div class="container">
<?php
header_admin_fn();
?>
<div class="content">
<br>
<div class="title">
<h3>&nbsp; Welcome 
<?php 
echo $_SESSION['s_username'][1];
?>
</h3>
</div>


<br><br>
<br><br>
<div class="outer_block clearfix">
<div class="option_block" style="text-align:center;">
<div class="block_title" > <b>Staff Module</b> </div>
<br>
Check Test status for users :

<br>
<?php
// Script to save previous dropdown selection , so that user is not required to select again.
if(isset($_POST['class']))
{ 
 //Set dropdown to previously selected value
 $type_set=$_POST['type'];
 $class_set=$_POST['class'];
 $branch_set=$_POST['branch'];
}
else
{
 // Use Default values
 $type_set='student';
 $class_set='F.E';
 $branch_set='Computers';
}

echo "<form action='home.php' method='POST'>
<table><tr>";
echo "<td><label><strong>Type:</strong></label></td><td>
<select name='type'>"; 
echo "<option value='student' ";
if($type_set=="student") echo "selected";
echo ">Student</option><option value='staff' ";
if($type_set=="staff") echo "selected";
echo ">Staff</option><option value='alumni' ";
if($type_set=="alumni") echo "selected";
echo ">Alumni</option><option value='parent' ";
if($type_set=="parent") echo "selected";
echo ">Parent</option><option value='other' ";
if($type_set=="other") echo "selected";
echo ">Other</option></select>";

echo "</td></tr><tr>
<td><label><strong>Class:</strong></label></td><td>
<select name='class'>";   

echo "<option value='F.E' ";
if($class_set=="F.E") echo "selected";
echo ">First Year</option><option value='S.E' ";
if($class_set=="S.E") echo "selected";
echo ">Second Year</option><option value='T.E' ";
if($class_set=="T.E") echo "selected";
echo ">Third Year</option><option value='B.E' ";
if($class_set=="B.E") echo "selected";
echo ">Final Year</option><option value='other' ";
if($class_set=="other") echo "selected";
echo ">Other</option></select>";

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
echo ">MECH</option><option value='other' ";
if($branch_set=="other") echo "selected";
echo ">Other</option></select>";

echo "</td></tr></table>";
?>

<br>
<br>
<input type="submit" name="students_p" value="Show test participants" style="border:1px solid #09F; background:#09F; padding:2%; color:#FFF;  border-radius:5px;" align="center"><br><br>
<input type="submit" name="score" value="Show students score" style="border:1px solid #09F; background:#09F; padding:2%; color:#FFF;  border-radius:5px;" >

</form>                              
<br>
<br>
</div>

<div class="data_block">




<?php
include '../connection.php';
if(isset($_POST['students_p']))
{

   $index=1;
   $query="SELECT username, fname,lname, email FROM user WHERE type='$_POST[type]' AND class = '$_POST[class]' AND branch = '$_POST[branch]' AND mod1='1'";
   $result=mysqli_query($GLOBALS["___mysqli_ston"], $query);
   $returned_rows = mysqli_num_rows($result);
   if($returned_rows==0)
   {
    if($_POST['class']<>"other" && $_POST['branch'])
		echo "<b> It seems no student from ".$_POST['class']." ".$_POST['branch']." has performed the test</b>";
	else if($_POST['type']<>"other")
		echo "<b> It seems no ".$_POST['type']." has performed the test</b>";
	else
		echo "<b> It seems no user has performed the test</b>";
   }
   else
   {
    
	if($_POST['class']<>"other" && $_POST['branch'])
		echo "<u>The following students from ".$_POST['class']." ".$_POST['branch']." have conducted the test.</u><br><br>";
	else if($_POST['type']<>"other")
		echo "<u>The following ".$_POST['type']." have conducted the test.</u><br><br>";
	else
		echo "<u>The following users have conducted the test.</u><br><br>";
		
    echo "<table cellpadding='3'>";
	echo "<tr><td></td>  <td><b>Name:</b></td>  <td><b>Email:</b></td></tr>";
    while($row = mysqli_fetch_array($result))
    {
	  echo "<tr><td>".$index." .)</td>";
	  echo "<td>".$row['fname']." ".$row['lname']."</td>";
	  echo "<td><i>".$row['email']."</i></td><td>";
	  $index++;
	  echo "<div id='basic-modal'> <a href='#' class='basic' style=\"border:1px solid #09F; background:#09F; padding:2px; color:#FFF;  border-radius:5px;\" onClick=\"setCookie('skill_username','".$row['username']."',1)\">Detailed Report</a> </div>   </td></tr>";
	  
    }
    echo "</table>";
   }
}

if(isset($_POST['score']))
{
   
   $query="SELECT fname,lname, E,A,C,N,O FROM user WHERE type='$_POST[type]' AND class = '$_POST[class]' AND branch = '$_POST[branch]' AND mod1='1'";
   $result=mysqli_query($GLOBALS["___mysqli_ston"], $query);
   $returned_rows2 = mysqli_num_rows($result);
   $height_val= 32*$returned_rows2;                     // Adjust size of graph based on number of results
   echo "<b> Student score based on sum of the scores of five traits.Score based on a maximum of 200. </b>";
   echo "<div id='chart4' style='height:".$height_val."px; min-height:250px;'></div>";
   echo "<script type='text/javascript'>";
   echo "$(document).ready(function(){";

   echo     "plot5 = $.jqplot('chart4', [[";
   while($row = mysqli_fetch_array($result))
   {
	 
	 $total=$row['E']+$row['A']+$row['C']+$row['N']+$row['O'];
	 echo "[".$total.",'".$row['fname']."'],";
   }
   echo "]], {";


echo         "    captureRightClick: true,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                shadowAngle: 135,
                rendererOptions: {
                    barDirection: 'horizontal',
                    highlightMouseDown: true   
                },
                pointLabels: {show: true, formatString: '%d'}
            },
            legend: {
                show: false,
                location: 'e',
                placement: 'outside'
            },
            axes: {
                yaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer
                }
            }
        });
    }); ";
    echo "</script>";
	}
else if(!isset($_POST['class']))
{
 echo "<h1>Welcome</h1>";
 echo "<h3>Current System status:</h3>";
 $sql ="SELECT mod1 FROM user";
 $result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
 $num_users1 = mysqli_num_rows($result);
 echo "Registered users:  ".$num_users1;
 $sql ="SELECT mod1 FROM user WHERE mod1='1'";
 $result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
 $num_users2 = mysqli_num_rows($result);
 echo "<br>Users completing test 1:  ".$num_users2;
 echo "<br>Users completing test 2:  N.A ";
}
 		
?>		



<br>
<br>
</div>
		
<br><br>
</div>
        
		

<!-- Modal Test Area -->	
		
		<!-- modal content -->
		<div id="basic-modal-content">

		</div>
<!-- Modal test area ends here -->		
<br><br>
<a href="./logout.php" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; float:right; margin-right:25px;">Logout</a>
<br><br>

</div>

<?php
footer_admin_fn();
?>

</div>

</body>
</html>