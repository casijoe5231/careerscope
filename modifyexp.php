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
?>
<html>
<head>
<title>Head of department</title>

  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css">
		<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<script  type="text/javascript" src="validator2.js" ></script>
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
<h3>&nbsp; HOD menu</h3>
</div>
<br>
<br>
<div style="float:left;clear:both;margin-top:30px;">
<ul id="sidenavigation" class="MenuBarVertical">
	<li><a href="manage.php">Add area of expertise</a></li>
	<li><a href="modifyexp.php">Modify area of expertise</a></li>
	<li><a href="hodindex.php">Back to home</a></li>
	</ul>
</div>
<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">
<fieldset>
        <legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>ADD AREA OF EXPERTISE<b></legend>
		<center>
		
        <table border="1"  style="margin-top:20px;margin-bottom:20px;">
		
		<tr>
		<th><b>Staff Name</b></th>
		<th><b>Area of expertise</b></th>
		<th><b>Submit</b></th>
		</tr>
		<?php
		$sql="select * from masteruser where role='Staff'";
		$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row=mysqli_fetch_array($res))
		{
		$sql1="select * from istaff where email='$row[email]' and department='$_SESSION[dept]' and is_admin!=1 and is_hod!=1";
		$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
		while($row1=mysqli_fetch_array($res1))
		{
		?>
		<tr><td><?php echo $row['name'] ?></td>
		
		<form name="trial" method="GET">
		<td><input type="checkbox" name="Database" value="Database">Database
		<input type="hidden" name="database1" value="Database">
		<input type="checkbox" name="C++" value="C++">C++
		<input type="hidden" name="c++1" value="C++">
		<input type="checkbox" name="Java" value="Java">Java
		<input type="hidden" name="java1" value="Java">
		<input type="checkbox" name="Networks" value="Networks">Networks
		<input type="hidden" name="networks1" value="Networks">
		<input type="checkbox" name="PHP" value="PHP">PHP
		<input type="hidden" name="php1" value="PHP">
		<label><span id="expertise" style="color:#C00;"></span></label>
		</td>
		<td>
		<input type="hidden" name="email1" value="<?php echo $row['email']; ?>">
		<input type='submit' name='submit' id='submit' value='Submit' style='cursor:pointer;'>
		</td>
		</form>
		</tr>
		<?php
		}
		}
		?>
		
        </table>
		
		
		</center>
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