<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include 'styles/theme-master.php';
	include '../connection1.php';

	$emaill=$_SESSION['user'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Self Assessment','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

	$stmt = "SELECT * FROM riasec_qus;";
	$result = mysqli_query($con,$stmt);
?>
<!DOCTYPE html>
<html>
<head>
<title>Skill Assessment</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
<!-- JqueryUI Radio script -->
<link rel="stylesheet" href="plugins/jqueryui/jquery-ui.css" />  
<script src="plugins/jqueryui/jquery-1.9.1.js"></script>  
<script src="plugins/jqueryui/jquery-ui.js"></script>  
<!-- JqueryUI Radio script ends here -->
<style type="text/css">
.ex_table{font-family:Verdana, Geneva, sans-serif;font-size:15px;}
.normal_p{
color:#000000;
}
.error_p{
color:#F00;
}

table {
	font: 16px/24px Verdana, Arial, Helvetica, sans-serif;
	border-collapse: collapse;
	width: 90%;
	
	}


td.left {
	border-bottom: 1px solid #CCC;
	border-top: 1px solid #CCC;
	border-left: 1px solid #CCC;
	padding: 0 1em;
	padding-bottom:8px;
	}
td.right {
	border-bottom: 1px solid #CCC;
	border-top: 1px solid #CCC;
	border-right: 1px solid #CCC;
	padding: 0 1em;
	padding-bottom:8px;
	}
	
th {
	border-bottom: 1px solid #CCC;
	border-top: 1px solid #CCC;
	border-left: 1px solid #CCC;
	border-right: 1px solid #CCC;
	padding: 0 1em;
	padding-bottom:8px;
	}

td+td {
	text-align: center;
	}
tr:hover { background: #E9E9E3; }

.ui-tooltip
{
  font-size:16px;
  font-family:Calibri;
}
.radio
{
font-size:14px;
font-family:Tahoma;
}
</style>
 
 <!-- Jquery UI-->
 <script>
$(function () {
      $(document).tooltip({
          content: function () {
              return $(this).prop('title');
          }
      });
  });
  </script>
  <script>
	$(function() {
		$( ".radio" ).buttonset();
  });
  </script>

<!-- Validation Checks -->
<script type="text/JavaScript"> 
function select_radio_button(group_p)
{
document.getElementById(group_p).className='normal_p'; 
}

function is_selected(rb_group,lbl_info)
{
var radio_group =document.getElementsByName(rb_group); 
 for(var x=0;x<radio_group.length;x++)
 {
   if(radio_group[x].checked)
   {
    document.getElementById(lbl_info).className='normal_p';
    return 0; 
   }
 }
document.getElementById(lbl_info).className='error_p';
return 1;
}

function validate_radiobutton_group(){
var error=0;

error+=is_selected("option1","change_info1");
error+=is_selected("option2","change_info2");
error+=is_selected("option3","change_info3");
error+=is_selected("option4","change_info4");
error+=is_selected("option5","change_info5");
error+=is_selected("option6","change_info6");
error+=is_selected("option7","change_info7");
error+=is_selected("option8","change_info8");
error+=is_selected("option9","change_info9");
error+=is_selected("option10","change_info10");
error+=is_selected("option11","change_info11");
error+=is_selected("option12","change_info12");
error+=is_selected("option13","change_info13");
error+=is_selected("option14","change_info14");
error+=is_selected("option15","change_info15");
error+=is_selected("option16","change_info16");
error+=is_selected("option17","change_info17");
error+=is_selected("option18","change_info18");
error+=is_selected("option19","change_info19");
error+=is_selected("option20","change_info20");
error+=is_selected("option21","change_info21");
error+=is_selected("option22","change_info22");
error+=is_selected("option23","change_info23");
error+=is_selected("option24","change_info24");
error+=is_selected("option25","change_info25");
error+=is_selected("option26","change_info26");
error+=is_selected("option27","change_info27");
error+=is_selected("option28","change_info28");
error+=is_selected("option29","change_info29");
error+=is_selected("option30","change_info30");
error+=is_selected("option31","change_info31");
error+=is_selected("option32","change_info32");
error+=is_selected("option33","change_info33");
error+=is_selected("option34","change_info34");
error+=is_selected("option35","change_info35");
error+=is_selected("option36","change_info36");
error+=is_selected("option37","change_info37");
error+=is_selected("option38","change_info38");
error+=is_selected("option39","change_info39");
error+=is_selected("option40","change_info40");
error+=is_selected("option41","change_info41");
error+=is_selected("option42","change_info42");
error+=is_selected("option43","change_info43");
error+=is_selected("option44","change_info44");
error+=is_selected("option45","change_info45");
error+=is_selected("option46","change_info46");
error+=is_selected("option47","change_info47");
error+=is_selected("option48","change_info48");
error+=is_selected("option49","change_info49");
error+=is_selected("option50","change_info50");

if(error>0){
alert("It seems you missed something. Unanswered questions are highlightd in red");
return false; 
}else{
return true; 
}
}
</script>
</head>
<body>
<div class="bg">
<div class="container">
<?php
header_fn();
?>
<div class="content">
<br>
<div class="title">
<h3>&nbsp; Welcome 
<?php 
echo $_SESSION['user'][1];
?>
</h3>
</div>

<br>
<p align="center">
<b>Test Module 1</b><br>
<br> Note: This test analyzes your personality. Please answers the questions considering  
<br> the way you are & not what you want to be.
<br>
<b>1-Highly Disagree  &nbsp; 2-Disagree &nbsp;  3-Neither disagree nor agree &nbsp;  4-Agree  &nbsp; 5-Highly Agree</b>
<br>
</p>
<form action="test_mod1_results.php" name="Test_Form" method="POST" onsubmit="JavaScript:return validate_radiobutton_group();">

<?php
include 'connection1.php';
$sql="SELECT * FROM skillquestions";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
       
		echo "<table   align='center'  class='ex_table'>";
		while($row = mysqli_fetch_array($res))
        {
		   echo "<tr><td class='left'><h4>";
		   //Show Tooltip (if available)
           echo "<p title=\"".$row['desc']."\"> ";
           echo " ".$row['id'].". ";
		   echo " ".$row['selfquestions'];
		   echo "</h4></td><td class='right'><div class='radio'>";
		   echo "<p id='change_info".$row['id']."'>Highly Disagree ";
           echo "<input type='radio' onChange='JavaScript:select_radio_button(\"change_info".$row['id']."\");' name='option".$row['id']."' value='1' id='option".$row['id']."_0' ><label for='option".$row['id']."_0'><span></span>1 </label>";
		   echo "<input type='radio' onChange='JavaScript:select_radio_button(\"change_info".$row['id']."\");' name='option".$row['id']."' value='2' id='option".$row['id']."_1' ><label for='option".$row['id']."_1'><span></span>2 </label>";
		   echo "<input type='radio' onChange='JavaScript:select_radio_button(\"change_info".$row['id']."\");' name='option".$row['id']."' value='3' id='option".$row['id']."_2' ><label for='option".$row['id']."_2'><span></span>3 </label>";
		   echo "<input type='radio' onChange='JavaScript:select_radio_button(\"change_info".$row['id']."\");' name='option".$row['id']."' value='4' id='option".$row['id']."_3' ><label for='option".$row['id']."_3'><span></span>4 </label>";
		   echo "<input type='radio' onChange='JavaScript:select_radio_button(\"change_info".$row['id']."\");' name='option".$row['id']."' value='5' id='option".$row['id']."_4' ><label for='option".$row['id']."_4'><span></span>5 </label>";
		   
   		   echo "  Highly Agree</p>";
		   echo "</div></td></tr>";
              
        }
        echo "</table>"

?>


<p align="center">
<input type="submit" value='Submit' style="width: 200px; height: 60px" >
</p>
</form>
<br>
<a href="logout.php" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; float:right; margin-right:25px;">LOGOUT</a>
<a href="home.php" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; float:right; margin-right:25px;">< Back</a>


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
elseif(isset($_SESSION['hod']))
{
					echo "<html><head><script src='../js/alertify.min.js'></script>
					<link rel='stylesheet' href='../css/alertify.core.css' />
					<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
					echo "<SCRIPT LANGUAGE='JavaScript'>
					alertify.alert('Access Restriction!!!', function (e) {
					window.location.href='home.php';
					});
					</SCRIPT>";
}
elseif(isset($_SESSION['lecturer']))
{
					echo "<html><head><script src='../js/alertify.min.js'></script>
					<link rel='stylesheet' href='../css/alertify.core.css' />
					<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
					echo "<SCRIPT LANGUAGE='JavaScript'>
					alertify.alert('Access Restriction!!!', function (e) {
					window.location.href='home.php';
					});
					</SCRIPT>";
}
else
{
		header('location:../login.php');
		exit();
}

?>