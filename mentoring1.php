<?php

	echo "string";
    session_start();
	if(!isset($_SESSION['user']))
	{
		header("location:login.php?error=1");
	}

	if(!($_SESSION['usertype']==6 || $_SESSION['usertype']==8 || $_SESSION['usertype']==11 || $_SESSION['usertype']==13 ||
	 $_SESSION['usertype']==14 || $_SESSION['usertype']==16 || $_SESSION['usertype']==18 || $_SESSION['usertype']==19)){
		header("location:login.php?error=1");
	}
	echo "string";
	include 'includes/connection1.php';
	$emails=$_SESSION['user'][0];
	$name=$_SESSION['user'][1];
	$_SESSION['email']=$emails;
	$sql7="select * from masteruser where email='$_SESSION[email]'";
		$res7=mysqli_query($GLOBALS["___mysqli_ston"], $sql7);
		while($row7=mysqli_fetch_array($res7))
		{
		$discipline=$row7['discipline'];
		$_SESSION['discipline']=$discipline;
		}
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emails','Mentoring Requests','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");		
?>
<html>
<head>
<title>Mentor</title>
<script src="jquery.js"></script>
  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css">
		<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<script>
$(document).ready(function()
{
$('#loginbutton').click(function(){
$('#loginarea').slideToggle();
})
})
</script>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
function go()
{
	document.getElementById("div1").style.display = 'block';
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
    oxmlHttp.open("GET","chat_recv_ajax1.php?receiver_id="+receiver_id,true);
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
document.getElementById('inputmsg').value='';
			$.ajax(
			{
				type:"GET",
				url:"insertmessage1.php",
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
</script>
<link rel="stylesheet" type="text/css" href="css/stephen1.css">  

</head>
<body>

<div class='container'>
<div class="header"><img src="images/byb.jpg" width="160" height="80" alt="CareerScope logo" align="left"/>
  <img src="images/dbit.png"  width="6%" alt="DBIT"  align="right"/>
  </div>
<div class="header-shadow"></div>
<div class='content'>
<br>


<table border="0" style="align:center;">
	<tbody><tr><td>
    <table id="navigation" style="align:center;width:1290px;">
    
        <tbody><tr>
          <td><div align="center"><a href="mentoring.php">Main Menu</a></div></td>
          <td><div align="center"><a href="mentorevents.php">Events</a></div></td>
        </tr>
    </tbody></table>
    </td></tr>
</tbody></table>

<br />

<br />
	

<div class='title' style="clear:both;">
<h3>&nbsp; Mentor menu</h3>
</div>
<br>
<br>
<div style="float:left;clear:both;margin-top:30px;">
<ul id="sidenavigation" class="MenuBarVertical">
	
	<li><a href="mentoring.php">Student Requests</a></li>
	<li><a href="reports.php">Test reports</a></li>
	<li><a href="branding.php">Student Activity Report</a></li>
	<!--li><a href="#">Student Activity Report</a></li-->
	<li><a href="hodindex.php">Back to home</a></li>
	</ul>
</div>
<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">
<fieldset>
        <legend><img src="images/im-user_profile.png" width="25" alt="profile" />MENTORING REQUESTS</legend>
        <center>
        <table border="1"  style="margin-top:20px;margin-bottom:20px;">
        			
        <tr>
		<td><b>Student Name</b></td>
		<td><b>Branch</b></td>
		<td><b>Send Request</b></td>
		</tr>
		<?php
		include 'connection1.php';
		$sql="select * from approve_mentor where mname='$name'";
		$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row=mysqli_fetch_array($res))
		{
		$sql2="select * from masteruser where email='$row[email]'";
		$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
		while($row2=mysqli_fetch_array($res2))
		{
		?>
		<tr>
		<td><?php echo $row['name'] ?></td>
		<td><?php echo $row2['branch'] ?></td>
		<td>
		<?php
		$sql1="select * from approve_mentor where name='$row[name]' and mname='$name'";
		$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
		$num=mysqli_num_rows($res1);
		while($row1=mysqli_fetch_array($res1))
		{
		if($row1['status']==0)
		{
		?>
		<form name="trial" method="GET">
		<input type="hidden" name="stuname" value="<?php echo $row['name']; ?>">
		<input type='submit' name='submit' id='submit' value='Accept' style='cursor:pointer;'>
		<input type='submit' name='submit1' id='submit' value='Reject' style='cursor:pointer;'>
		</form>
		<?php
		}
		elseif($row1['status']==1)
		{
		echo "<h3 style='color:red;'><b>Accepted</b></h3>";
		echo "<input type='submit' name='submit1' id='submit' value='Reject' style='cursor:pointer;'>";
		}
		else
		{
		echo "<h3 style='color:red;'><b>Rejected</b></h3>";
		echo "<input type='submit' name='submit' id='submit' value='Accept' style='cursor:pointer;'>";
		}
		}
		?>
		</td>
		</tr>
		<?php
		}
		}
		?>
		
		</table>
		</center>
    	</fieldset>
		<?php
		if(isset($_GET['submit']))
{
include 'connection1.php';
echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
$name1=$_SESSION['user'][1];
$stuname=$_GET['stuname'];
$sql="update approve_mentor set status=1 where name='$stuname' and mname='$name1'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Request Accepted!!', function (e) {
    window.location.href='mentoring.php';
});</SCRIPT>";
}


		if(isset($_GET['submit1']))
{
include 'connection1.php';
echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
$name1=$_SESSION['user'][1];
$stuname=$_GET['stuname'];
$sql="update approve_mentor set status=2 where name='$stuname' and mname='$name1'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Request Rejected!!', function (e) {
    window.location.href='mentoring.php';
});</SCRIPT>";
}
		?>
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