<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include '../connection1.php';
	$email=$_SESSION['user'][0];
	$uname=$_SESSION['user'][1];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	
	// Tracking the user
	$sql="insert into activity(email,menu_accessed,timesql) values('$email','Academic Brand Job Profiling Test','$timesql')";
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

function get_chat_msg()
{
var receiver_id=document.getElementById("receiverid").value;
    if(typeof XMLHttpRequest != "undefined")
    {
        oxmlHttp = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
       oxmlHttp = new ActiveXObject("Microsoft.XMLHttp");
    }
    if(oxmlHttp == null)
    {
        alert("Browser does not support XML Http Request");
       return;
    }
    
    oxmlHttp.onreadystatechange = get_chat_msg_result;
    oxmlHttp.open("GET","chat_recv_ajax.php?receiver_id="+receiver_id,true);
    oxmlHttp.send(null);
}

function get_chat_msg_result(t)
{
    if(oxmlHttp.readyState==4 || oxmlHttp.readyState=="complete")
    {
        if (document.getElementById("chatbox1") != null)
        {
            document.getElementById("chatbox1").innerHTML =  oxmlHttp.responseText;
            oxmlHttp = null;
        }
        var scrollDiv = document.getElementById("chatbox1");
        scrollDiv.scrollTop = scrollDiv.scrollHeight;
    }
}
</script>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
<!--<script type="text/javascript">
$(document).ready(function()
{
$(".chatbox").hide();

$(".chat").click(function()
{
var y=$(this).siblings(".chatterid").html();
$(".chatbox").show();
$("#receiverid").val(y);
})

$(".submitmsg").click(function()
{
var value1=$("#receiverid").val();
var value2=$("#inputmsg").val();
			$.ajax(
			{
				type:"GET",
				url:"insertmessage.php",
				data:"data1="+value1+"&data2="+value2,
				success:function(response)
				{
				$('#chatbox1').html(response);
				}
			});

})
var t = setInterval(function(){get_chat_msg()},1000);


$(".logout").click(function()
{
$(".chatbox").hide();
})

})
</script>-->

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
	
	function get_skill()
	{
		var job_id = document.getElementById('job').value;
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
					xmlhttp.open("GET","display_skillss.php?job_id="+job_id,true);
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
						document.getElementById('mentor[]').innerHTML=xmlhttp.responseText;
						}
					  }
					xmlhttp.open("GET","display_mentorss.php?skill_id="+skill_id,true);
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
<form action="techtest.php" method="get">
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
				<td><select name="job" id="job" temp="Please select the job" onchange="get_skill();" onblur="validator1(this)">
				<option value="Select">Select</option>
				</select><br>
				<label><span id="job" style="color:#C00;"></span></label>
                </td>
</tr>
<tr>
<td colspan="2"><label><span style='color:red;'>*</span><strong>Skills:</strong></label></td>
				<td><select name="skill" id="skill" temp="Please select the skill" onclick="go()" onchange="get_mentor();" onblur="validator2(this)">
				<option value="Select">Select</option>
				</select><br>
				<label><span id="skill" style="color:#C00;"></span></label>
                </td>
</tr>
<!--<tr>				
				<td colspan="2"><label><span style='color:red;'>*</span><strong>Mentors:</strong></label></td>
				<td><select name="mentor[]" id="mentor[]" multiple="multiple" temp="Please select the mentor" onblur="validator3(this)">
				<option value="Select">Select</option>
				</select><br><b><i>Please press ctrl button to<br> select more than 1 choices.</i></b><br>
				<label><span id="mentor" style="color:#C00;"></span></label>
                </td>
</tr>-->
</table>
<div id="div1" name="div1" style="display:none;">


<input type="submit" id="submit" name="submit" style="cursor:pointer;" value="NEW TEST">
</form>
<input type="button" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; width:auto; height:50px;margin-left:2px;" onclick="goto()" value="RETAKE TEST">

</div>
</center>

<!--<div id="chat" style="float:right;height:290px;width:250px;border:2px solid black;margin-top:5px;">
<?php
  /*$sql1="select distinct mname as mname,email from approve_mentor where email='$email'";
  $res1=mysql_query($sql1);
  while($row1=mysql_fetch_array($res1))
{	
$sql2="select * from masteruser where name='$row1[mname]'";
$res2=mysql_query($sql2);
while($row2=mysql_fetch_array($res2))
{	*/
?>
<table style="color:#336699;">
<tr>
<td><span style="cursor:pointer"><img style="height:35px;width:35px;" src="../images/mentor1.gif"></span></td>
<td style="font-size:23px;"><span style="cursor:pointer" class="chat"><?php echo $row1['mname'] ?></span><span style="display:none" class="chatterid"><?php echo $row2['email'] ?></span></td>
</tr>
</table>
<?php/*
}
}*/
?>
</div>
				
<div class="chatbox" style="float:right" >
			<div id="wrapper" style="margin:0 auto;padding-bottom:25px;background:#EBF4FB;width:230px;height:269px;border:1px solid #ACD8F0; ">  
			<div class="menu" style="padding:12.5px 25px 12.5px 25px;">
			<p class="logout" style="float:right;cursor:pointer;">Exit Chat</p>			
			<div style="clear:both"></div>  
			</div>  
      
			
		<div id="chatbox1" style="text-align:left;margin:0 auto;margin-bottom:25px;padding:10px;background:#fff;height:130px;width:180px;border:1px solid #ACD8F0;overflow:auto;">
		
		</div>  
			  
			<input style="margin-left:15px" type="text" id="inputmsg">

			<input type="hidden" id="receiverid">
			<input  name="submitmsg" type="button"  class="submitmsg" value="Send"/>  
			</div>  
			</div>-->

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