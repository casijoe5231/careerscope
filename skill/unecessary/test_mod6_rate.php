<?php
    session_start();
	if(!isset($_SESSION['lecturer']))
	{
		header('location:../login.php');
		exit();
	}
	include 'connection1.php';
	include 'styles/theme-master.php';
	?>
<!DOCTYPE html>
<html><head><title>Observer Assessment Test</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
<!-- JqueryUI Radio script -->
<link rel="stylesheet" href="plugins/jqueryui/jquery-ui.css" />  
<script src="plugins/jqueryui/jquery-1.9.1.js"></script>  
<script src="plugins/jqueryui/jquery-ui.js"></script>  
<!-- JqueryUI Radio script ends here -->
<style>
table {
	font: 16px/24px Verdana, Arial, Helvetica, sans-serif;
	border-collapse: collapse;
	width: 95%;
	
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

.normal_p{
color:#000000;
}
.error_p{
color:#F00;
}

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
<h3>&nbsp;Welcome 
<?php 
echo $_SESSION['lecturer'][1];
?>
</h3>
</div>

<br>
<br>
<div align="center">
<br><br><br>
<b>Observer Assessment</b><br>
<?php
	if (strpos($_SERVER['HTTP_REFERER'],'test_mod6.php') == true) // Check for valid referrer
	{
    // echo "<br><p style='color:green;'>Referrer Valid</p>";
    }
	else
	{
	 header("Location: test_mod6.php"); //If referrer is invalid redirect to test 2 main page.
     die();
	}
	if(!isset($_SESSION['lecturer']))
	{
		header('location:../login.php');
		exit();
	}
?>

	   
	  

<div class="test-box" style="border-style:solid; border-radius:5px; width:90%; min-width:700px;">
<?php

  if(isset($_GET['userss']))
  {
   $user=$_GET['userss'];
   echo "<br> You are providing feedback for :<br>";
   $username=$_SESSION['lecturer'][1];
	     $sql="   SELECT name,email FROM masteruser WHERE email = '$user'";		
	     $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	     while($row = mysqli_fetch_array($res))
		 {
		 echo "<h3><b>".$row['name']."</b></h3>";
         $feed_requestor=$row['name'];
		 $fname=$row['name'];
		 }


  }
  
echo "Please review the list of qualities below and check those that you think best describe ".$feed_requestor.".";




echo "<br><br>";
echo "<form action='test_mod6_review.php?userss=".$user."' method='POST' onsubmit=\"JavaScript:return validate_radiobutton_group();\">";

include 'connection1.php';

function showSkill()
{
	
  global $fname;
  $i=0;
  $sql="SELECT * FROM skillquestions";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
       
		echo "<table  cellpadding='15' align='center' >";
		echo "<tr><th>Statement</th><th>Your Rating</th></tr>";
		while($row = mysqli_fetch_array($res))
        {
		    echo "<tr><td class='left'>";
		    //Show Tooltip (if available)
            echo "<p title=\"".$row['desc']."\"> ";
            echo " ".$row['id'].". ";
		    echo " ".$fname." ".$row['obsquestions'];
		    echo "</h3></td><td class='right'>";
           
           
		    echo "<div class='radio'>";
			echo "<p id='change_info".$row['id']."'>";
		    echo "Highly Disagree &nbsp;";
			echo "<input type='radio' onChange='JavaScript:select_radio_button(\"change_info".$row['id']."\");' name='option".$row['id']."' value='1' id='option".$row['id']."_0' ><label for='option".$row['id']."_0'><span></span>1 </label>";
		    echo "<input type='radio' onChange='JavaScript:select_radio_button(\"change_info".$row['id']."\");' name='option".$row['id']."' value='2' id='option".$row['id']."_1' ><label for='option".$row['id']."_1'><span></span>2 </label>";
		    echo "<input type='radio' onChange='JavaScript:select_radio_button(\"change_info".$row['id']."\");' name='option".$row['id']."' value='3' id='option".$row['id']."_2' ><label for='option".$row['id']."_2'><span></span>3 </label>";
		    echo "<input type='radio' onChange='JavaScript:select_radio_button(\"change_info".$row['id']."\");' name='option".$row['id']."' value='4' id='option".$row['id']."_3' ><label for='option".$row['id']."_3'><span></span>4 </label>";
		    echo "<input type='radio' onChange='JavaScript:select_radio_button(\"change_info".$row['id']."\");' name='option".$row['id']."' value='5' id='option".$row['id']."_4' ><label for='option".$row['id']."_4'><span></span>5 </label>";
			echo "&nbsp; Highly Agree</p>";
			echo "</div>";
				 
        }
		echo "</td></tr>";
        echo "</table>";
}
// Call Function to show skill rating list
echo "<br><b><h3>Review</h3></b>";
showSkill();


?>
<br>

<input type="submit" value="Submit assessment" name="submit_feed" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; ">
</form>


<br><br><br>
</div>
<br><br><br>
<br>
<a href="logout.php" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; float:right; margin-right:25px;">LOGOUT</a>
<a href="test_mod6.php" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; float:right; margin-right:25px;">< Back</a>
</div>

<br>
<br><br>
</div>

<br><br>


<?php
footer_fn();
?>
</div>
</div>

</body>
</html>