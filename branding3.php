<?php
    session_start();
	session_start();
	if(!isset($_SESSION['user']))
	{
		header("location:login.php?error=1");
	}

	if(!($_SESSION['usertype']==6 || $_SESSION['usertype']==8 || $_SESSION['usertype']==11 || $_SESSION['usertype']==13 ||
	 $_SESSION['usertype']==14 || $_SESSION['usertype']==16 || $_SESSION['usertype']==18 || $_SESSION['usertype']==19)){
		header("location:login.php?error=1");
	}
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
	$sql="insert into activity(email,menu_accessed,timesql) values('$emails','Mentor Artifacts Report','$timesql')";
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
<center>
<?php
if($_SESSION['discipline']=='Engineering')
{
	include 'connection1.php';

?>
<form action="ebrand.php"  method="get">
<table border="1"  style="margin-top:20px;margin-bottom:20px;">
<!--<tr>
<td colspan="2"><label><span style='color:red;'>*</span><strong>Year:</strong></label></td>
				<td><select name="year" id="year" temp="Please select the year" onblur="validator(this)">
								<option value="Select">Select</option>
				<option value="F.E.">F.E.</option>
				<option value="S.E.">S.E.</option>
				<option value="T.E.">T.E.</option>
				<option value="B.E.">B.E.</option>
				</select><br>
				<label><span id="year" style="color:#C00;"></span></label>
                </td>
</tr>
<tr>
<td colspan="2"><label><span style='color:red;'>*</span><strong>Branch:</strong></label></td>
				<td><select name="branch" id="branch" temp="Please select the branch"  onchange="get_student();"  onblur="validator1(this)">
								<option value="Select">Select</option>
<?php/*
  $sql="select * from branch_master";
  $res=mysql_query($sql);
  while($row=mysql_fetch_array($res))
{*/
?>
<option value="<?php/* echo $row['branch_name'] */?>"><?php/* echo $row['branch_name'] */?></option>
<?php/*
}*/
?>
				</select><br>
				<label><span id="branch" style="color:#C00;"></span></label>
                </td>
</tr>-->
<tr>
<td colspan="2"><label><span style='color:red;'>*</span><strong>Student name:</strong></label></td>
				<td><select name="studnt" id="studnt" temp="Please select the student" onclick="go()" onblur="validator(this)">
				<option value="Select">Select</option>
                
<?php
  $sql="select distinct name, email from approve_mentor where mname='$name' and status=1";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  while($row=mysqli_fetch_array($res))
{
?>
<option value="<?php echo $row['email'] ?>"><?php echo $row['name'] ?></option>

<?php
}
?>
</select>
<br>

				<label><span id="studnt" style="color:#C00;"></span></label>
                </td>
</tr>
</table>

<br>
<div id="div1" name="div1" style="display:none;">
<input type="submit" id="submit" name="submit" style="cursor:pointer;" value="Submit">
</div>
</form>
<?php
}
?>
</center>

<input type="button" style="float:right;margin-top:220px;background:#14285F;height:50px;border:2px solid black;border-radius:25px;color:#ffffff;text-shadow: 2px 2px #ff0000;" id="loginbutton" value="Chat with students"  ><br><br>
<div id="loginarea" style="display:none;float:right;">
<div id="chat" style="float:right;height:auto;width:250px;border:2px solid #369;margin-top:250px;">
<?php
  $sql1="select distinct name as name,email from approve_mentor where mname='$name'";
  $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
  while($row1=mysqli_fetch_array($res1))
{	
?>
<table style="color:#336699;">
<tr>
<td><span style="cursor:pointer"><img style="height:35px;width:35px;" src="images/mentor1.gif"></span></td>
<td style="font-size:20px;"><span style="cursor:pointer" class="chat"><?php echo $row1['name'] ?></span><span style="display:none" class="chatterid"><?php echo $row1['email'] ?></span></td>
</tr>
</table>
<?php
}
?>
</div>
				
<div class="chatbox" style="float:right" >
			<div id="wrapper" style="margin-top:249px;padding-bottom:25px;background:#EBF4FB;width:230px;height:269px;border:1px solid #ACD8F0;border-radius:25px; ">  
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
			</div>
			</div>
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