<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include '../connection1.php';
	$email=$_SESSION['user'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	
	// Tracking the user
	$sql="insert into activity(email,menu_accessed,timesql) values('$email','Academic Brand Job Profiling','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<html>
<head>
<title>CareerScope</title>
<script src="jquery.js"></script>
  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
		<link href="Image/icon1.ico" rel="shortcut icon"/>


<script language="Javascript">	
function validateForm(){
if(document.getElementById('category').value=='')
{
alert("Please select an Item.");
return false;
}
return true;
}

function go()
{
document.getElementById("div1").style.display = 'block';
}

function goto()
{
var skill=document.getElementById("skill").value;
window.location="retaketest.php?skill="+skill;
}
</script>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
 <!--<script>
$(document).ready(function()
{
$("#goal").click(function()
{
var job = $(this).val();//get select value
$.ajax(
{
url:"display_job.php",
type:"post",
data:{job:$(this).val()},
success:function(response)
{
$("#job").html(response);
}
});
});

$("#job").click(function()
{
var skill = $(this).val();//get select value
$.ajax(
{
url:"display_skillss.php",
type:"post",
data:{skill:$(this).val()},
success:function(response)
{
$("#skill").html(response);
}
});
});
});

$("#skill").click(function()
{
var mentor = $(this).val();//get select value
$.ajax(
{
url:"display_mentorss.php",
type:"post",
data:{mentor:$(this).val()},
success:function(response)
{
$("#mentor").html(response);
}
});
});
});
</script>
-->
<script type="text/javascript">
function get_job()
	{
		var goal_id = document.getElementById('goal').value;
					if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					  }
					else
					  {// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					xmlhttp.onreadystatechange=function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						document.getElementById('job').innerHTML=xmlhttp.responseText;
						}
					  }
					xmlhttp.open("GET","display_job.php?goal_id="+goal_id,true);
					xmlhttp.send();
	}
	
</script>



<link rel="stylesheet" type="text/css" href="../css/stephen1.css">  

</head>
<body>

<div class='container'>
<div class="header"><img src="../images/byb.jpg" width="160" height="80" alt="CareerScope logo" align="left"/>
  <img src="../images/dbit.png"  width="6%" alt="DBIT"  align="right"/>
  </div>
<div class="header-shadow"></div>
<div class='content'>
<br>
<div style="float:left;"><?php include("menu.php"); ?></div>
<br>
<br>
<br>
<div class='title' style="clear:both;">
<h3>&nbsp; Academic Brand menu</h3>
</div>
<br>
<br>
<br>
<div style="float:left;clear:both;margin-top:30px;">
<ul id="sidenavigation" class="MenuBarVertical">
	<li><a href="register.php">Register</a></li>
	<li><a href="profile.php">Job profile</a></li>
	<li><a href="goal.php">Job profiling test</a></li>
	<li><a href="know.php">Know your subjects</a></li>
	<?php include("smenu.php"); ?>
  <li><a href="newindex.php">
	<?php
	if($first==1)
	echo "Create";
	else
	echo "Add";
	?></a></li>
  <li><a href="sdisplay1.php">Display</a></li>
    <li><a href="presresume.php">Resume</a></li>
	<li><a href="../newindex.php">Back to home</a></li>
	</ul>
</div>
<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">
<center>
<form action="subjdetails.php" method="get">
<table border="1"  style="margin-top:20px;margin-bottom:20px;">
<tr>
<td colspan="2"><label><span style='color:red;'>*</span><strong>Choose job profile:</strong></label></td>
				<td><select name="goal" id="goal" temp="Please select the goal" onchange="get_job();" onblur="validator(this)">
				<option value="Select">Select</option>
                
<?php
  $sql="select * from goal_master";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  while($row=mysqli_fetch_array($res))
{
?>
<option value="<?php echo $row['g_id'] ?>"><?php echo $row['goal_desc'] ?></option>
<?php
}
?>
</select>
<br>

				<label><span id="goal" style="color:#C00;"></span></label>
                </td>
</tr>
<tr>
<td colspan="2"><label><span style='color:red;'>*</span><strong>Job:</strong></label></td>
				<td><select name="job" id="job" temp="Please select the job" onchange="get_skill();" onclick="go()" onblur="validator1(this)">
				<option value="Select">Select</option>
				</select><br>
				<label><span id="job" style="color:#C00;"></span></label>
                </td>
</tr>
</table>
<div id="div1" name="div1" style="display:none;">


<input type="submit" id="submit" name="submit" style="cursor:pointer;" value="Submit">
</form>

</div>


</center>
</div>
<!-- Content ends here -->
</div><br>
<div class="footer">
  <div class="footer-link">
  <br>Home | Privacy Policy | Terms of use | About
  <br /> www.dbit.in
  </div>
</div>
</div>

</body>
</html>
<?php
}
?>