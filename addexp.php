<?php
    session_start();
	if(isset($_SESSION['hod']))
	{
	include 'connection1.php';
	$emails=$_SESSION['hod'][0];
		$sql2="select * from istaff where email='$emails'";
		$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
		while($row2=mysqli_fetch_array($res2))
		{
		$dept=$row2['department'];
		$_SESSION['dept']=$dept;
		}
		
		$sql3="select * from masteruser where email='$emails'";
		$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
		while($row3=mysqli_fetch_array($res3))
		{
		$discipline=$row3['discipline'];
		$sql4="select * from discipline_master where name='$discipline'";
		$res4=mysqli_query($GLOBALS["___mysqli_ston"], $sql4);
		while($row4=mysqli_fetch_array($res4))
		{
			$d_id=$row4['d_id'];
			$_SESSION['d_id']=$d_id;
		}
		}
		
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emails','HOD Add Expertise','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<html>
<head>
<title>Head of department</title>
<script src="jquery.js"></script>
  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css">
		<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<script  type="text/javascript" src="validator4.js" ></script>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
function go()
{
document.getElementById("div1").style.display = 'block';
}
</script>
<script>
$(document).ready(function()
{
$("#branch").click(function()
{
var staff = $(this).val();//get select value
$.ajax(
{
url:"display_staff.php",
type:"post",
data:{staff:$(this).val()},
success:function(response)
{
$("#sname").html(response);
}
});
});

</script>
<script>

$(document).ready(function()
{
$('#loginbutton').click(function(){
$('#loginarea').slideToggle();
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
<h3>&nbsp; Menu</h3>
</div>
<br>
<br>
<div style="float:left;clear:both;margin-top:30px;">
<ul id="sidenavigation" class="MenuBarVertical">
	<li><a href="manage.php">Area of expertise</a></li>
	<li><a href="addexp.php">Add expertise</a></li>
	<li><a href="hodindex.php">Back to home</a></li>
	</ul>
</div>
<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">
<?php
 $sql5="select * from approve_expertise where email='$emails'";
  $res5=mysqli_query($GLOBALS["___mysqli_ston"], $sql5);
  $count=mysqli_num_rows($res5);

if($count==0)
{
?>
		<fieldset>
		<legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>DETAILS</b></legend>
		<table border="0"  style="margin-top:20px;margin-bottom:20px;">
		<?php
		 $sql1="select * from masteruser where email='$emails'";
  $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
  while($row1=mysqli_fetch_array($res1))
{
		?>
		<tr colspan="2">
		<td><b>Name:</b></td>
		<td><?php echo $row1['name']; ?></td>
		<td><b>Email:</b></td>
		<td><?php echo $row1['email']; ?></td>
		</tr>
		
		<tr colspan="2">
		<td><b>Institute:</b></td>
		<td><?php echo $row1['institute']; ?></td>
		<td><b>Branch:</b></td>
		<td><?php echo $row1['branch']; ?></td>
		</tr>
		<?php
		}
		?>
		
		<tr colspan="2">
		<td><b>Area of expertise:</b></td>
		<td style="color:red;">
		<?php
		/*if($row2['status']==3 || $row2['status']==0)
		{
		 echo "Not Approved";
		}
		if($row2['status']==1)
		{
		 echo "Approved";
		}
		if($row2['status']==2)
		{
		 echo "Rejected";
		}*/
				 $sql7="select * from approve_expertise where email='$emails' and status=1";
  $res7=mysqli_query($GLOBALS["___mysqli_ston"], $sql7);
  $num=mysqli_num_rows($res7);
  if($num!=0)
  {
  while($row7=mysqli_fetch_array($res7))
{
	echo $row7['expertise']."<br>";
}
}
else
{
	echo "None";
}
		?>
		</td>
		</tr>
		</table>
		</fieldset>
<br><br>
		<fieldset>
        <legend><b>AREA OF EXPERTISE<b></legend>
		<form name="trial" method="GET">
        <table border="0"  style="margin-top:20px;margin-bottom:20px;">
		
		<tr>
		<td><label><span style='color:red;'>*</span><strong>Choose area of expertise:</strong></label></td>
				<td><select name="expertise[]" id="input-expertise" multiple="multiple" temp="Please select area of expertise." onblur="validator3(this)">
				<option value="Select">Select</option>
				<?php
  $sql="select * from expertise_master where dm_id='$_SESSION[d_id]'";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  while($row=mysqli_fetch_array($res))
{
?>
<option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
<?php
}
?>
                </select><br><b><i>Please press ctrl button to<br> select more than 1 choices.</i></b><br>
				<label ><span id="expertise[]" style="color:#C00;"></span></label>
                </td>
		</tr>
		</table>
		<?php
		$sql3="select * from masteruser where role='Staff' and email='$emails'";
		$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
		while($row3=mysqli_fetch_array($res3))
		{
		?>
		<input type="hidden" name="email1" value="<?php echo $row3['email']; ?>">
		<input type="hidden" name="name1" value="<?php echo $row3['name']; ?>">
		<input type='submit' name='submit' id='submit' value='Save' style='cursor:pointer;'>
		<input type='submit' name='submit1' id='submit' value='Discard' style='cursor:pointer;'>
		</form>
		<?php
		}
		?>

    	</fieldset>

<?php
}
else
{
?>
<fieldset>
		<legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>DETAILS</b></legend>
		<table border="0"  style="margin-top:20px;margin-bottom:20px;">
		<?php
		 $sql1="select * from masteruser where email='$emails'";
  $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
  while($row1=mysqli_fetch_array($res1))
{
		?>
		<tr colspan="2">
		<td><b>Name:</b></td>
		<td><?php echo $row1['name']; ?></td>
		<td><b>Email:</b></td>
		<td><?php echo $row1['email']; ?></td>
		</tr>
		
		<tr colspan="2">
		<td><b>Institute:</b></td>
		<td><?php echo $row1['institute']; ?></td>
		<td><b>Branch:</b></td>
		<td><?php echo $row1['branch']; ?></td>
		</tr>
		<?php
		}
		?>
		
		<tr colspan="2">

		<td><b>Area of expertise:</b></td>
		<td style="color:red;">
		<?php
								 $sql7="select * from approve_expertise where email='$emails' and status=1";
  $res7=mysqli_query($GLOBALS["___mysqli_ston"], $sql7);
  $num=mysqli_num_rows($res7);
  if($num!=0)
  {
  while($row7=mysqli_fetch_array($res7))
{
	echo $row7['expertise']."<br>";
}
}
else
{
	echo "None";
}
		?>
		</td>
		</tr>
		</table>
		</fieldset>
<br><br>
<input type="button" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; width:auto; height:50px;margin-left:2px;" id="loginbutton" value="Change Expertise"  ><br><br>
<div id="loginarea" style="display:none;">
		<fieldset>
        <legend><b>AREA OF EXPERTISE<b></legend>
		<form name="trial2" method="GET">
        <table border="0"  style="margin-top:20px;margin-bottom:20px;">
		
		<tr>
		<td><label><span style='color:red;'>*</span><strong>Choose area of expertise:</strong></label></td>
				<td><select name="expertise[]" id="input-expertise" multiple="multiple" temp="Please select area of expertise." onblur="validator3(this)">
				<option value="Select">Select</option>
				<?php
  $sql21="select * from expertise_master where dm_id='$_SESSION[d_id]'";
  $res21=mysqli_query($GLOBALS["___mysqli_ston"], $sql21);
  while($row21=mysqli_fetch_array($res21))
{
?>
<option value="<?php echo $row21['name'] ?>"><?php echo $row21['name'] ?></option>
<?php
}
?>
                </select><br><b><i>Please press ctrl button to<br> select more than 1 choices.</i></b><br>
				<label ><span id="expertise[]" style="color:#C00;"></span></label>
                </td>
		</tr>
		</table>
		<?php
		$sql41="select * from masteruser where role='Staff' and email='$emails'";
		$res41=mysqli_query($GLOBALS["___mysqli_ston"], $sql41);
		while($row41=mysqli_fetch_array($res41))
		{
		?>
		<input type="hidden" name="email3" value="<?php echo $row41['email']; ?>">
		<input type="hidden" name="name3" value="<?php echo $row41['name']; ?>">
		<input type='submit' name='submit4' id='submit' value='Change' style='cursor:pointer;'>
		</form>
		<?php
		}
		?>

    	</fieldset>
		</div>
<?php
}
?>
		<br><br>
<?php
if(isset($_GET['submit']))
{
include 'connection1.php';
echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";

$email=$_GET['email1'];
$name=$_GET['name1'];
$expertise=$_GET['expertise'];

for($i=0;$i<sizeof($expertise);$i++)
{
$sql="insert into approve_expertise(id,email,sname,expertise,status) values('','$email','$name','".$expertise[$i]."','1')";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="update masteruser set estatus=1 where email='$email'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
}

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Area of expertise saved successfully!!', function (e) {
    window.location.href='addexp.php';
});</SCRIPT>";
}

if(isset($_GET['submit1']))
{
include 'connection1.php';
echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Area of expertise discarded!!', function (e) {
    window.location.href='addexp.php';
});</SCRIPT>";
}

if(isset($_GET['submit4']))
{
include 'connection1.php';
echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";

$email=$_GET['email3'];
$name=$_GET['name3'];
$expertise=$_GET['expertise'];

for($i=0;$i<sizeof($expertise);$i++)
{
$sql="update approve_expertise set status=0 where email='$email'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="insert into approve_expertise(id,email,sname,expertise,status) values('','$email','$name','".$expertise[$i]."','1')";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
}

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Area of expertise changed!!', function (e) {
    window.location.href='addexp.php';
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
<?php
}
else if(isset($_SESSION['lecturer']))
	{
	include 'connection1.php';
	$emails=$_SESSION['lecturer'][0];
		$sql2="select * from istaff where email='$emails'";
		$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
		while($row2=mysqli_fetch_array($res2))
		{
		$dept=$row2['department'];
		$_SESSION['dept']=$dept;
		}
		
		$sql3="select * from masteruser where email='$emails'";
		$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
		while($row3=mysqli_fetch_array($res3))
		{
		$discipline=$row3['discipline'];
		$sql4="select * from discipline_master where name='$discipline'";
		$res4=mysqli_query($GLOBALS["___mysqli_ston"], $sql4);
		while($row4=mysqli_fetch_array($res4))
		{
			$d_id=$row4['d_id'];
			$_SESSION['d_id']=$d_id;
		}
		}
		
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emails','HOD Add Expertise','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<html>
<head>
<title>Head of department</title>
<script src="jquery.js"></script>
  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css">
		<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<script  type="text/javascript" src="validator4.js" ></script>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
function go()
{
document.getElementById("div1").style.display = 'block';
}
</script>
<script>
$(document).ready(function()
{
$("#branch").click(function()
{
var staff = $(this).val();//get select value
$.ajax(
{
url:"display_staff.php",
type:"post",
data:{staff:$(this).val()},
success:function(response)
{
$("#sname").html(response);
}
});
});

</script>
<script>

$(document).ready(function()
{
$('#loginbutton').click(function(){
$('#loginarea').slideToggle();
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
<h3>&nbsp; Menu</h3>
</div>
<br>
<br>
<div style="float:left;clear:both;margin-top:30px;">
<ul id="sidenavigation" class="MenuBarVertical">
	<li><a href="manage.php">Area of expertise</a></li>
	<li><a href="addexp.php">Add expertise</a></li>
	<li><a href="hodindex.php">Back to home</a></li>
	</ul>
</div>
<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">
<?php
 $sql5="select * from approve_expertise where email='$emails'";
  $res5=mysqli_query($GLOBALS["___mysqli_ston"], $sql5);
  $count=mysqli_num_rows($res5);

if($count==0)
{
?>
		<fieldset>
		<legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>DETAILS</b></legend>
		<table border="0"  style="margin-top:20px;margin-bottom:20px;">
		<?php
		 $sql1="select * from masteruser where email='$emails'";
  $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
  while($row1=mysqli_fetch_array($res1))
{
		?>
		<tr colspan="2">
		<td><b>Name:</b></td>
		<td><?php echo $row1['name']; ?></td>
		<td><b>Email:</b></td>
		<td><?php echo $row1['email']; ?></td>
		</tr>
		
		<tr colspan="2">
		<td><b>Institute:</b></td>
		<td><?php echo $row1['institute']; ?></td>
		<td><b>Branch:</b></td>
		<td><?php echo $row1['branch']; ?></td>
		</tr>
		<?php
		}
		?>
		
		<tr colspan="2">
		<td><b>Area of expertise:</b></td>
		<td style="color:red;">
		<?php
		/*if($row2['status']==3 || $row2['status']==0)
		{
		 echo "Not Approved";
		}
		if($row2['status']==1)
		{
		 echo "Approved";
		}
		if($row2['status']==2)
		{
		 echo "Rejected";
		}*/
				 $sql7="select * from approve_expertise where email='$emails' and status=1";
  $res7=mysqli_query($GLOBALS["___mysqli_ston"], $sql7);
  $num=mysqli_num_rows($res7);
  if($num!=0)
  {
  while($row7=mysqli_fetch_array($res7))
{
	echo $row7['expertise']."<br>";
}
}
else
{
	echo "None";
}
		?>
		</td>
		</tr>
		</table>
		</fieldset>
<br><br>
		<fieldset>
        <legend><b>AREA OF EXPERTISE<b></legend>
		<form name="trial" method="GET">
        <table border="0"  style="margin-top:20px;margin-bottom:20px;">
		
		<tr>
		<td><label><span style='color:red;'>*</span><strong>Choose area of expertise:</strong></label></td>
				<td><select name="expertise[]" id="input-expertise" multiple="multiple" temp="Please select area of expertise." onblur="validator3(this)">
				<option value="Select">Select</option>
				<?php
  $sql="select * from expertise_master where dm_id='$_SESSION[d_id]'";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  while($row=mysqli_fetch_array($res))
{
?>
<option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
<?php
}
?>
                </select><br><b><i>Please press ctrl button to<br> select more than 1 choices.</i></b><br>
				<label ><span id="expertise[]" style="color:#C00;"></span></label>
                </td>
		</tr>
		</table>
		<?php
		$sql3="select * from masteruser where role='Staff' and email='$emails'";
		$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
		while($row3=mysqli_fetch_array($res3))
		{
		?>
		<input type="hidden" name="email1" value="<?php echo $row3['email']; ?>">
		<input type="hidden" name="name1" value="<?php echo $row3['name']; ?>">
		<input type='submit' name='submit' id='submit' value='Save' style='cursor:pointer;'>
		<input type='submit' name='submit1' id='submit' value='Discard' style='cursor:pointer;'>
		</form>
		<?php
		}
		?>

    	</fieldset>

<?php
}
else
{
?>
<fieldset>
		<legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>DETAILS</b></legend>
		<table border="0"  style="margin-top:20px;margin-bottom:20px;">
		<?php
		 $sql1="select * from masteruser where email='$emails'";
  $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
  while($row1=mysqli_fetch_array($res1))
{
		?>
		<tr colspan="2">
		<td><b>Name:</b></td>
		<td><?php echo $row1['name']; ?></td>
		<td><b>Email:</b></td>
		<td><?php echo $row1['email']; ?></td>
		</tr>
		
		<tr colspan="2">
		<td><b>Institute:</b></td>
		<td><?php echo $row1['institute']; ?></td>
		<td><b>Branch:</b></td>
		<td><?php echo $row1['branch']; ?></td>
		</tr>
		<?php
		}
		?>
		
		<tr colspan="2">

		<td><b>Area of expertise:</b></td>
		<td style="color:red;">
		<?php
								 $sql7="select * from approve_expertise where email='$emails' and status=1";
  $res7=mysqli_query($GLOBALS["___mysqli_ston"], $sql7);
  $num=mysqli_num_rows($res7);
  if($num!=0)
  {
  while($row7=mysqli_fetch_array($res7))
{
	echo $row7['expertise']."<br>";
}
}
else
{
	echo "None";
}
		?>
		</td>
		</tr>
		</table>
		</fieldset>
<br><br>
<input type="button" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; width:auto; height:50px;margin-left:2px;" id="loginbutton" value="Change Expertise"  ><br><br>
<div id="loginarea" style="display:none;">
		<fieldset>
        <legend><b>AREA OF EXPERTISE<b></legend>
		<form name="trial2" method="GET">
        <table border="0"  style="margin-top:20px;margin-bottom:20px;">
		
		<tr>
		<td><label><span style='color:red;'>*</span><strong>Choose area of expertise:</strong></label></td>
				<td><select name="expertise[]" id="input-expertise" multiple="multiple" temp="Please select area of expertise." onblur="validator3(this)">
				<option value="Select">Select</option>
				<?php
  $sql21="select * from expertise_master where dm_id='$_SESSION[d_id]'";
  $res21=mysqli_query($GLOBALS["___mysqli_ston"], $sql21);
  while($row21=mysqli_fetch_array($res21))
{
?>
<option value="<?php echo $row21['name'] ?>"><?php echo $row21['name'] ?></option>
<?php
}
?>
                </select><br><b><i>Please press ctrl button to<br> select more than 1 choices.</i></b><br>
				<label ><span id="expertise[]" style="color:#C00;"></span></label>
                </td>
		</tr>
		</table>
		<?php
		$sql41="select * from masteruser where role='Staff' and email='$emails'";
		$res41=mysqli_query($GLOBALS["___mysqli_ston"], $sql41);
		while($row41=mysqli_fetch_array($res41))
		{
		?>
		<input type="hidden" name="email3" value="<?php echo $row41['email']; ?>">
		<input type="hidden" name="name3" value="<?php echo $row41['name']; ?>">
		<input type='submit' name='submit4' id='submit' value='Change' style='cursor:pointer;'>
		</form>
		<?php
		}
		?>

    	</fieldset>
		</div>
<?php
}
?>
		<br><br>
<?php
if(isset($_GET['submit']))
{
include 'connection1.php';
echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";

$email=$_GET['email1'];
$name=$_GET['name1'];
$expertise=$_GET['expertise'];

for($i=0;$i<sizeof($expertise);$i++)
{
$sql="insert into approve_expertise(id,email,sname,expertise,status) values('','$email','$name','".$expertise[$i]."','1')";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="update masteruser set estatus=1 where email='$email'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
}

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Area of expertise saved successfully!!', function (e) {
    window.location.href='addexp.php';
});</SCRIPT>";
}

if(isset($_GET['submit1']))
{
include 'connection1.php';
echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Area of expertise discarded!!', function (e) {
    window.location.href='addexp.php';
});</SCRIPT>";
}

if(isset($_GET['submit4']))
{
include 'connection1.php';
echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";

$email=$_GET['email3'];
$name=$_GET['name3'];
$expertise=$_GET['expertise'];

for($i=0;$i<sizeof($expertise);$i++)
{
$sql="update approve_expertise set status=0 where email='$email'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="insert into approve_expertise(id,email,sname,expertise,status) values('','$email','$name','".$expertise[$i]."','1')";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
}

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Area of expertise changed!!', function (e) {
    window.location.href='addexp.php';
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
<?php
}
?>