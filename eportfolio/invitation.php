<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include '../connection1.php';
	$email=$_SESSION['user'][0];
	$name=$_SESSION['user'][1];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$email','My Brand Invitation','$timesql')";
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

</script>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
<script>

$(document).ready(function()
{
$('#loginbutton').click(function(){
$('#loginarea').slideToggle();
})

$('#loginbutton1').click(function(){
$('#loginarea1').slideToggle();
})
})
</script>

<script  type="text/javascript" src="validator5.js" ></script>
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
<h3>&nbsp; My Brand menu</h3>
</div>
<br>
<br>
<br>
<div style="float:left;clear:both;margin-top:30px;">
<ul id="sidenavigation" class="MenuBarVertical">
	<li><a href="test_reports.php">Test Reports</a></li>
	<li><a href="invitation.php">Invitation</a></li>
	<li><a href="../newindex.php">Back to home</a></li>
	</ul>
</div>
<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">
<fieldset style="width:50%">
<legend><img src="../images/im-user_profile.png" width="25" alt="profile" /><b>INVITATION<b></legend>
<form action="save_invite.php" onsubmit="return validateAll()" method="post">
<table>
<tr>
<td><label><span style='color:red;'>*</span><strong>Enter the email-id:</strong></label></td>
<td><input style="width:250%"  type="text" class="text2" name="email" id="input-email" temp="Please enter email id." onblur="validate(this)" /><br>
				<label><span id="email" style="color:#C00;"></span></label>
				</td>
</tr>
<tr>
<td><label><span style='color:red;'>*</span><strong>Enter the name:</strong></label></td>
<td><input style="width:250%"  type="text" class="text2" name="name1" id="input-name1" temp="Please enter name." onblur="validate1(this)" /><br>
				<label><span id="name1" style="color:#C00;"></span></label>
				</td>
</tr>
<tr>
<td><label><span style='color:red;'>*</span><strong>Enter the relation:</strong></label></td>
<td><input style="width:250%"  type="text" class="text2" name="relation" id="input-relation" temp="Please enter relation." onblur="validate2(this)" /><br>
				<label><span id="relation" style="color:#C00;"></span></label>
				</td>
</tr>
</table>
<input type='submit' name='submit' id='submit' value='Send the invitation'>
</form>
</fieldset>
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