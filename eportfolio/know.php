<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include '../connection1.php';
	$name=$_SESSION['user'][1];
	$emaill=$_SESSION['user'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	// Tracking the user
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Academic Brand Know Your Subjects','$timesql')";
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
</script>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
 <!--<script>
$(document).ready(function()
{
$("#branch").click(function()
{
var semester = $(this).val();//get select value
$.ajax(
{
url:"display_semester.php",
type:"post",
data:{semester:$(this).val()},
success:function(response)
{
$("#semester").html(response);
}
});
});

$("#semester").click(function()
{
var subject = $(this).val();
var branch = $("#branch").val();
$.ajax(
{
url:"display_subject.php",
type:"post",
data:{subject: $(this).val()},
success:function(response)
{
$("#subject").html(response);

}

});
});

});


</script>-->
<script type="text/javascript">
	function get_semester()
	{
		var branch_id = document.getElementById('branch').value;
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
						document.getElementById('semester').innerHTML=xmlhttp.responseText;
						}
					  }
					xmlhttp.open("GET","display_semester.php?branch_id="+branch_id,true);
					xmlhttp.send();
	}
	
	function get_subject()
	{
		var branch_id = document.getElementById('branch').value;
		var semester_id = document.getElementById('semester').value;
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
						document.getElementById('subject').innerHTML=xmlhttp.responseText;
						}
					  }
					xmlhttp.open("GET","display_subject.php?branch_id="+branch_id+"&semester_id="+semester_id,true);
					xmlhttp.send();
	}
	
		function get_skill()
	{
		var subject_id = document.getElementById('subject').value;
		var semester_id = document.getElementById('semester').value;
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
						document.getElementById('skill').innerHTML=xmlhttp.responseText;
						}
					  }
					xmlhttp.open("GET","display_skill.php?subject_id="+subject_id+"&semester_id="+semester_id,true);
					xmlhttp.send();
	}
	

function get_mentor()
	{
		var skill_id = document.getElementById('skill').value;
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
						document.getElementById('mentor').innerHTML=xmlhttp.responseText;
						}
					  }
					xmlhttp.open("GET","display_mentor.php?skill_id="+skill_id,true);
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
<form action="skilldetails.php" method="get">
<table border="1"  style="margin-top:20px;margin-bottom:20px;">
<tr>
<td colspan="2"><label><span style='color:red;'>*</span><strong>Select branch:</strong></label></td>
				<td><select name="branch" id="branch" temp="Please select the branch" onchange="get_semester();" onblur="validator(this)">
				<option value="Select">Select</option>
                
<?php
  $sql="select * from branch_master";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  while($row=mysqli_fetch_array($res))
{
?>
<option value="<?php echo $row['bm_id'] ?>"><?php echo $row['branch_name'] ?></option>
<?php
}
?>
</select>
<br>

				<label><span id="branch" style="color:#C00;"></span></label>
                </td>
</tr>
<tr>
<td colspan="2"><label><span style='color:red;'>*</span><strong>Select semester:</strong></label></td>
				<td><select name="semester" id="semester" temp="Please select the semester" onchange="get_subject();" onblur="validator(this)">
				<option value="Select">Select</option>
				</select><br>
				<label><span id="semester" style="color:#C00;"></span></label>
                </td>
</tr>
<tr>
<td colspan="2"><label><span style='color:red;'>*</span><strong>Select subject:</strong></label></td>
				<td><select name="subject" id="subject" temp="Please select the subject" onchange="get_skill();" onblur="validator(this)">
				<option value="Select">Select</option>
				</select><br>
				<label><span id="subject" style="color:#C00;"></span></label>
                </td>
</tr>
<tr>
<td colspan="2"><label><span style='color:red;'>*</span><strong>Select skill:</strong></label></td>
				<td><select name="skill" id="skill" temp="Please select the skill" onclick="go()" onchange="get_mentor();" onblur="validator(this)">
				<option value="Select">Select</option>
				</select><br>
				<label><span id="skill" style="color:#C00;"></span></label>
                </td>
</tr>
</table>

<div id="div1" name="div1" style="display:none;">
<input type="submit" id="submit" name="submit" style="cursor:pointer;" value="Submit">
</form>
<br><br>
<fieldset>
        <legend><img src="../images/im-user_profile.png" width="25" alt="profile" />CHOOSE YOUR MENTOR</legend>
        <center>
        <table border="1"  style="margin-top:20px;margin-bottom:20px;">
        			
        <tr>
		<td><b>Mentor Name</b></td>
		<td><b>Designation</b></td>
		<td><b>Department</b></td>
		<td><b>Send Request</b></td>
		</tr>
		<?php
		include '../connection1.php';
		$sql="select * from istaff where is_mentor=1 and is_admin!=1 and is_tpo!=1";
		$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row=mysqli_fetch_array($res))
		{
		?>
		<tr>
		<td><?php echo $row['staff_name'] ?></td>
		<td>
		<?php
		if($row['is_director']==1)
		{
		echo "Director<br>";
		}
		if($row['is_hod']==1)
		{
		echo "Head of Department<br>";
		}
		if($row['is_principal']==1)
		{
		echo "Principal<br>";
		}
		if($row['is_lecturer']==1)
		{
		echo "Lecturer<br>";
		}
		if($row['is_tpo']==1)
		{
		echo "TPO<br>";
		}
		if($row['is_subjteacher']==1)
		{
		echo "Subject Teacher<br>";
		}
		if($row['is_testmgr']==1)
		{
		echo "Test Manager<br>";
		}
		?>
		</td>
		<td><?php echo $row['department'] ?></td>
		<td>
		<?php
		$sql1="select * from approve_mentor where name='$name' and mname='$row[staff_name]'";
		$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
		$num=mysqli_num_rows($res1);
		if($num==0)
		{
		?>
		<form name="trial" method="GET">
		<input type="hidden" name="mname" value="<?php echo $row['staff_name']; ?>">
		<input type='submit' name='submit1' id='submit' value='Send request' style='cursor:pointer;'>
		</form>
		<?php
		}
		while($row1=mysqli_fetch_array($res1))
		{
		if($row1['status']==0)
		{
		echo "<h3 style='color:red;'><b>Request Sent</b></h3>";
		}
		elseif($row1['status']==1)
		{
		echo "<h3 style='color:red;'><b>Request Accepted</b></h3>";
		}
		else
		{
		echo "<h3 style='color:red;'><b>Request Rejected</b></h3>";
		}
		}
		?>
		</td>
		</tr>
		<?php
		}
		?>
		
		</table>
		</center>
    	</fieldset>
		<?php
		if(isset($_GET['submit1']))
{
include 'connection1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$name1=$_SESSION['user'][1];
$email2=$_SESSION['user'][0];
$mname=$_GET['mname'];
$sql="insert into approve_mentor(id,email,name,mname,status)values('','$email2','$name1','$mname',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Request Sent!!', function (e) {
    window.location.href='know.php';
});</SCRIPT>";
}
		?>
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