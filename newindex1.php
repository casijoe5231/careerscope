<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include 'connection1.php';
	$email=$_SESSION['user'][0];
	$uname=$_SESSION['user'][1];
	
	
	// Tracking the user
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$email','Student Home Page','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="styles/style.css">
		<link rel="stylesheet" type="text/css" href="styles/default.css" />
		<link rel="stylesheet" type="text/css" href="styles/component.css" />
		<script src="js/modernizr.custom.js"></script>
		<script src="jquery.js"></script>
<script>
$(document).ready(function()
{
$('#loginbutton').click(function(){
$('#loginarea').slideToggle();
})
})
</script>
<script language="Javascript">
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
    oxmlHttp.open("GET","chat_recv_ajax2.php?receiver_id="+receiver_id,true);
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
				url:"insertmessage2.php",
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
<title>CareerScope</title>
</head>
<body>
<div class="container">
<div class="header"><img src="images/byb.jpg" width="160" height="80" alt="CareerScope logo" align="left"/>
  <img src="images/dbit.png"  width="6%" alt="DBIT"  align="right"/>

</div>
<div class="header-shadow"></div>
  
<div class="content">
 
 
  <div class="main-content">
  <!-- Main content to display -->
 <div id="container1">
    <div id="one" style="border:2px solid #E9E9E9;border-radius:25px;">
	<center><div style="background:#5c5c5c;height:50px;border:2px solid #E9E9E9;border-radius:25px;">
	
	<font size="5" style="color:#ffffff;text-shadow: 2px 2px #ff0000;">Create your brand</font>
	
	</div></center>
	
	<div>
		<ul style="list-style:none;color:#8A2500;">
		<li>
		<img src="images/eportfolio.jpg" alt="img03" height="50px" align="middle" width="50px">
		<font size="4"><a href="eportfolio/register.php" style="text-decoration:none;">E Branding</a></font>
		</li>
		<br>
		<li>
		<img src="images/assessment.jpg" alt="img03" align="middle" height="50px" width="50px">
		<font size="4"><a href="skill/home.php" style="text-decoration:none;">Personality Profiling</a></font>
		</li>
		<br>
		<li>
		<img src="images/aptitudes.jpg" alt="img03" align="middle" height="50px" width="50px">
		<font size="4"><a href="aptitude/index.php" style="text-decoration:none;">Aptitude Test</a></font>
		</li>
		</ul>
	</div>
	</div>
	
    <!--div id="two" style="border:2px solid #E9E9E9;border-radius:25px;">
	<center><div style="background:#5c5c5c;height:50px;border:2px solid #E9E9E9;border-radius:25px;">
	
	<font size="5" style="color:#ffffff;text-shadow: 2px 2px #ff0000;">Share your brand</font>
	
	</div></center>
	<div>
		<ul style="list-style:none;color:#8A2500;">
		<li>
		<img src="images/development.jpg" alt="img03" align="middle" height="50px" width="50px">
		<font size="4"><a href="#" style="text-decoration:none;">Self development plan</a></font>
		</li>
		<br>
		<li>
		<img src="images/placements.jpg" alt="img03" align="middle" height="50px" width="50px">
		<font size="4"><a href="reynold1/student/view.php" style="text-decoration:none;">Placements</a></font>
		</li>
		<br>
		</ul>
	</div>
	
	</div>
	
    <div id="three" style="border:2px solid #E9E9E9;border-radius:25px;">
	<center><div style="background:#5c5c5c;height:50px;border:2px solid #E9E9E9;border-radius:25px;">
	
	<font size="5" style="color:#ffffff;text-shadow: 2px 2px #ff0000;">Improve your brand</font>
	<div>
		<ul style="list-style:none;color:#8A2500;">
		<li>
		<font size="4"><a href="#" style="text-decoration:none;"></a></font>
		</li>
		<br>
		</ul>
	</div>
	</div></center>
	
	<div>
		<ul style="list-style:none;color:#8A2500;">
		<li>
		<img src="images/certify.jpg" alt="img03" align="middle" height="50px" width="50px">
		<font size="4"><a href="courses/index.php" style="text-decoration:none;">Training&Certifications </a></font>
		</li>
		<br>
		</ul>
	</div>
	</div-->
<!-- Chat box start -->	
<input type="button" style="float:right;margin-top:7px;background:#5c5c5c;height:50px;border:2px solid #E9E9E9;border-radius:25px;color:#ffffff;text-shadow: 2px 2px #ff0000;" id="loginbutton" value="Chat with mentors"  ><br><br>
<div id="loginarea" style="display:none;float:right;">	
	<div id="chat" style="float:right;height:auto;width:250px;border:2px solid #DBDBFF;border-radius:25px;margin-top:7px;margin-bottom:7px;">
<?php
  $sql1="select distinct mname as mname,email from approve_mentor where email='$email' and status=1";
  $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
  while($row1=mysqli_fetch_array($res1))
{	
$sql2="select * from masteruser where name='$row1[mname]'";
$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
while($row2=mysqli_fetch_array($res2))
{	
?>
<table style="color:#336699;">
<tr>
<td><span style="cursor:pointer"><img style="height:35px;width:35px;border-radius:25px;" src="images/mentor1.gif"></span></td>
<td style="font-size:20px;"><span style="cursor:pointer" class="chat"><?php echo $row1['mname'] ?></span><span style="display:none" class="chatterid"><?php echo $row2['email'] ?></span></td>
</tr>
</table>
<?php
}
}
?>
</div>
				
<div class="chatbox" style="float:right" >
			<div id="wrapper" style="margin-top:10px;margin-bottom:10px;padding-bottom:25px;background:#EBF4FB;width:230px;height:269px;border:1px solid #ACD8F0;border-radius:25px; ">  
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
<!-- Chat box end -->
</div>
  
  
  </div>
  
  <div class="sidebar">
  <?php
  if(isset($_SESSION['user']))
	{
		echo "<h3> Welcome, <br><img src='images/im-user_profile.png' alt='Login' height='30px' style=\"padding-top:6px;\">";
		echo $_SESSION['user'][1]." ";
		echo "<a href='logout.php' class='button'>Logout</a></h3><br>";
	}
	?>	

  	<!--div class="sidebar-title">
    <h3>News Feed</h3>
    </div>
  <ul>
  <li>Infosys Campus placement drive on 30th August 2013. <a>More..</a></li>
  <li>New Tests on Logic & Mathematics available. <a>View</a></li>
  <li>Find your career goal. Career Path. <a>View</a></li>
  <li>Pre-placement drive organized by Training & Placement on 25th August 2013.<a>More..</a></li>
  <br /><br />
  </ul-->

  </div>



</div>
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
else
{
	header("location:login.php?login=0");
}
?>