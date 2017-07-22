<?php
    session_start();
	if(isset($_SESSION['lecturer']))
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
?>
<html>
<head>
<title>Lecturer</title>

  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css">
		<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<script  type="text/javascript" src="validator5.js" ></script>
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
<h3>&nbsp; Lecturer menu</h3>
</div>
<br>
<br>
<div style="float:left;clear:both;margin-top:30px;">
<ul id="sidenavigation" class="MenuBarVertical">
	<li><a href="expertise.php">Add area of expertise</a></li>
	<li><a href="modifyexpert.php">Modify area of expertise</a></li>
	<li><a href="lecturerindex.php">Back to home</a></li>
	</ul>
</div>
<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">
<?php
$sql9="select * from masteruser where email='$emails'";
		$res9=mysqli_query($GLOBALS["___mysqli_ston"], $sql9);
		while($row9=mysqli_fetch_array($res9))
		{
		if($row9['estatus']==1)
		{
?>
		<fieldset>
        <legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>AREA OF EXPERTISE</b></legend>
		<center>
		<table>
		<tr>
		<td>
		<b>Current area of expertise:</b>
		</td>
		<td>
		<?php
		$sql7="select * from areaofexpertise where email='$emails'";
		$res7=mysqli_query($GLOBALS["___mysqli_ston"], $sql7);
		while($row7=mysqli_fetch_array($res7))
		{
		echo "$row7[expertise]";
		}
		?>
		</td>
		</tr>
		<tr>
		<td>
		<b>Status:</b>
		</td>
		<td style="color:red;">
		<?php
		$sql8="select * from areaofexpertise where email='$emails'";
		$res8=mysqli_query($GLOBALS["___mysqli_ston"], $sql8);
		while($row8=mysqli_fetch_array($res8))
		{
		if($row8['status']==0 || $row8['status']==3)
		{
		echo "Not approved";
		}
		if($row8['status']==1)
		{
		echo "Approved";
		}
		if($row8['status']==2)
		{
		echo "Rejected";
		}
		}
		?>
		</td>
		</tr>
		</table>
		</center>
		</fieldset>
		<br><br>
		<fieldset>
        <legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>MODIFY AREA OF EXPERTISE</b></legend>
		<form name="trial" onsubmit="return validateAll1()" method="GET">
		<center>
		<table>
		<tr>
		<td><label><span style='color:red;'>*</span><strong>Choose area of expertise:</strong></label></td>
				<td><select name="expertise[]" id="input-expertise" multiple="multiple" temp="Please select area of expertise." onblur="validator(this)">
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
		$sql="select * from masteruser where role='Staff' and email='$emails'";
		$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row=mysqli_fetch_array($res))
		{
		?>
		<input type="hidden" name="email1" value="<?php echo $row['email']; ?>">
		<input type='submit' name='submit' id='submit' value='Change' style='cursor:pointer;'>
		</form>
		<?php
		}
		?>
		</center>
    	</fieldset>
</form>
		<br><br>
<?php
if(isset($_GET['submit']))
{
include 'connection1.php';
echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
$email=$_GET['email1'];
$expertise = implode(",",$_GET['expertise']);

$sql="update areaofexpertise set expertise='$expertise', status=0 where email='$email'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Area of expertise changed successfully!!', function (e) {
    window.location.href='modifyexpert.php';
});</SCRIPT>";
}
?>
<?php
}
else
{
	echo "<center><h3 style='color:red;'><b>Please add the area of expertise first</b></h3></center>";
}
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