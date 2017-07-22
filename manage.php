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
		
		$sql7="select * from masteruser where email='$emails'";
		$res7=mysqli_query($GLOBALS["___mysqli_ston"], $sql7);
		while($row7=mysqli_fetch_array($res7))
		{
		$institute=$row7['institute'];
		$_SESSION['institute']=$institute;
		}
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emails','HOD Test Authorisation','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
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


function goto()
{
if (document.getElementById("expertise").checked == false)	    
    {
        alert ('You did not choose any of the checkboxes yet.');
        return false;
    } else {
        return true;
    }
}

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
	<!--li><a href="manage.php">Area of expertise</a></li>
	<li><a href="addexp.php">Add expertise</a></li-->
	<li><a href="testmgthome2.php">Add test</a></li>
	<li><a href="hodindex.php">Back to home</a></li>
	</ul>
</div>
<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">
<fieldset>
        <legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>ADD AREA OF EXPERTISE<b></legend>
		<center>
		
        <table border="1">

		<tr>
		<th><b>Staff Name</b></th>
		<th><b>Current role</b></th>
		<th><b>Years of experience</b></th>
		<th><b>No. of projects guided</b></th>
		<th><b>No. of papers guided</b></th>
		<th><b>Test Authorisation</b></th>
		<th></th>
		<th><b>Authorised Tests</b></th>
		</tr>
		<?php
		$sql="select * from masteruser where role='Staff' and estatus=1 and institute='$_SESSION[institute]'";
		$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row=mysqli_fetch_array($res))
		{
		$sql1="select * from istaff where email='$row[email]' and department='$_SESSION[dept]' and is_admin!=1 and is_hod!=1";
		$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
		while($row1=mysqli_fetch_array($res1))
		{

		?>
		<tr><td><?php echo $row['name'] ?></td>
		<td>
		<?php
		if($row1['is_director']==1)
		{
		echo "Director<br>";
		}
		if($row1['is_principal']==1)
		{
		echo "Principal<br>";
		}
		if($row1['is_hod']==1)
		{
		echo "HOD<br>";
		}
		if($row1['is_tpo']==1)
		{
		echo "TPO<br>";
		}
		if($row1['is_mentor']==1)
		{
		echo "Mentor<br>";
		}
		if($row1['is_testmgr']==1)
		{
		echo "Test Manager<br>";
		}
		if($row1['is_lecturer']==1)
		{
		echo "Lecturer<br>";
		}
		if($row1['is_subjteacher']==1)
		{
		echo "Subject Teacher<br>";
		}
		?>
		</td>
		<?php
		$index=0;
		echo "<form name='trial' method='GET'>";
		$sql2="select * from areaofexpertise where email='$row1[email]'";
		$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
		while($row2=mysqli_fetch_array($res2))
		{
		?>
		<td><?php echo $row2['experience'] ?></td>
		<td><?php echo $row2['project'] ?></td>
		<td><?php echo $row2['paper'] ?></td>
		<td>
		<?php
			$data=$row2['expertise'];
			$splittedstring=explode(",",$data);
			foreach ($splittedstring as $key => $value) {
			?>
			<input type='checkbox' name='expertise[]' id='expertise[]' value='<?php echo $value; ?>'><?php echo $value; ?><br>
			<?php
			}

?>
		</td>
		
		<?php
		echo "<td>";
		echo "<input type='hidden' name='email1' value='$row[email]'>";
		echo "<input type='hidden' name='name1' value='$row[name]'>";
		
		echo "<input type='submit' name='submit' id='submit' value='Approve' onsubmit='return goto()' style='cursor:pointer;'>";
		echo "<input type='submit' name='submit1' id='submit' value='Disapprove' style='cursor:pointer;'>";	
		/*if($row2['status']==1)
		{
			echo "<h3 style='color:red'><center><b>Approved</b></center></h3>";
			echo "<input type='submit' name='submit1' id='submit' value='Disapprove' style='cursor:pointer;'>";	
		}
		if($row2['status']==0)
		{
		echo "<input type='submit' name='submit' id='submit' value='Approve' style='cursor:pointer;'>";
		echo "<input type='submit' name='submit1' id='submit' value='Disapprove' style='cursor:pointer;'>";	
		}
		if($row2['status']==2)
		{
		echo "<h3 style='color:red'><center><b>Disapproved</b></center></h3>";	
		echo "<input type='submit' name='submit' id='submit' value='Approve' style='cursor:pointer;'>";		
		}*/
		
		
		echo "</td>";

		?>
		<td>
		<?php
		$sql3="select * from approve_expertise where email='$row[email]' and status=1";
		$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
		$num=mysqli_num_rows($res3);
		if($num!=0)
		{
		while($row3=mysqli_fetch_array($res3))
		{		
			if($row3['status']==1)
			{
			echo $row3['expertise']."<br>";
			}	 
		}
		}
		else
		{
		echo "None";
		}
		
		?>
		</td>
		<?php
		echo "</form>";
		echo "</tr>";
				
		}
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
$email=$_GET['email1'];

$name=$_GET['name1'];
$expertise=$_GET['expertise'];

for($i=0;$i<sizeof($expertise);$i++)
{
$sql="insert into approve_expertise(id,email,sname,expertise,status) values('','$email','$name','".$expertise[$i]."','1')";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="update areaofexpertise set status=1 where email='$email'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
}

/*$sql="update areaofexpertise set status=1 where email='$email'";
$res=mysql_query($sql)or die("query not executed");*/

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Approved!!', function (e) {
    window.location.href='manage.php';
});</SCRIPT>";
}

if(isset($_GET['submit1']))
{
include 'connection1.php';
echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
$email=$_GET['email1'];
$expertise=$_GET['expertise'];

/*$sql="update areaofexpertise set status=2 where email='$email'";
$res=mysql_query($sql)or die("query not executed");*/

for($i=0;$i<sizeof($expertise);$i++)
{
$sql="delete from approve_expertise where email='$email' and expertise='".$expertise[$i]."'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="update areaofexpertise set status=2 where email='$email'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
}

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Disapproved!!', function (e) {
    window.location.href='manage.php';
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
		
		$sql7="select * from masteruser where email='$emails'";
		$res7=mysqli_query($GLOBALS["___mysqli_ston"], $sql7);
		while($row7=mysqli_fetch_array($res7))
		{
		$institute=$row7['institute'];
		$_SESSION['institute']=$institute;
		}
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emails','HOD Test Authorisation','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
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


function goto()
{
if (document.getElementById("expertise").checked == false)	    
    {
        alert ('You did not choose any of the checkboxes yet.');
        return false;
    } else {
        return true;
    }
}

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
	<li><a href="testmgthome2.php">Add test</a></li>
	<li><a href="hodindex.php">Back to home</a></li>
	</ul>
</div>
<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">
<fieldset>
        <legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>ADD AREA OF EXPERTISE<b></legend>
		<center>
		
        <table border="1">

		<tr>
		<th><b>Staff Name</b></th>
		<th><b>Current role</b></th>
		<th><b>Years of experience</b></th>
		<th><b>No. of projects guided</b></th>
		<th><b>No. of papers guided</b></th>
		<th><b>Test Authorisation</b></th>
		<th></th>
		<th><b>Authorised Tests</b></th>
		</tr>
		<?php
		$sql="select * from masteruser where role='Staff' and estatus=1 and institute='$_SESSION[institute]'";
		$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row=mysqli_fetch_array($res))
		{
		$sql1="select * from istaff where email='$row[email]' and department='$_SESSION[dept]' and is_admin!=1 and is_hod!=1";
		$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
		while($row1=mysqli_fetch_array($res1))
		{

		?>
		<tr><td><?php echo $row['name'] ?></td>
		<td>
		<?php
		if($row1['is_director']==1)
		{
		echo "Director<br>";
		}
		if($row1['is_principal']==1)
		{
		echo "Principal<br>";
		}
		if($row1['is_hod']==1)
		{
		echo "HOD<br>";
		}
		if($row1['is_tpo']==1)
		{
		echo "TPO<br>";
		}
		if($row1['is_mentor']==1)
		{
		echo "Mentor<br>";
		}
		if($row1['is_testmgr']==1)
		{
		echo "Test Manager<br>";
		}
		if($row1['is_lecturer']==1)
		{
		echo "Lecturer<br>";
		}
		if($row1['is_subjteacher']==1)
		{
		echo "Subject Teacher<br>";
		}
		?>
		</td>
		<?php
		$index=0;
		echo "<form name='trial' method='GET'>";
		$sql2="select * from areaofexpertise where email='$row1[email]'";
		$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
		while($row2=mysqli_fetch_array($res2))
		{
		?>
		<td><?php echo $row2['experience'] ?></td>
		<td><?php echo $row2['project'] ?></td>
		<td><?php echo $row2['paper'] ?></td>
		<td>
		<?php
			$data=$row2['expertise'];
			$splittedstring=explode(",",$data);
			foreach ($splittedstring as $key => $value) {
			?>
			<input type='checkbox' name='expertise[]' id='expertise[]' value='<?php echo $value; ?>'><?php echo $value; ?><br>
			<?php
			}

?>
		</td>
		
		<?php
		echo "<td>";
		echo "<input type='hidden' name='email1' value='$row[email]'>";
		echo "<input type='hidden' name='name1' value='$row[name]'>";
		
		echo "<input type='submit' name='submit' id='submit' value='Approve' onsubmit='return goto()' style='cursor:pointer;'>";
		echo "<input type='submit' name='submit1' id='submit' value='Disapprove' style='cursor:pointer;'>";	
		/*if($row2['status']==1)
		{
			echo "<h3 style='color:red'><center><b>Approved</b></center></h3>";
			echo "<input type='submit' name='submit1' id='submit' value='Disapprove' style='cursor:pointer;'>";	
		}
		if($row2['status']==0)
		{
		echo "<input type='submit' name='submit' id='submit' value='Approve' style='cursor:pointer;'>";
		echo "<input type='submit' name='submit1' id='submit' value='Disapprove' style='cursor:pointer;'>";	
		}
		if($row2['status']==2)
		{
		echo "<h3 style='color:red'><center><b>Disapproved</b></center></h3>";	
		echo "<input type='submit' name='submit' id='submit' value='Approve' style='cursor:pointer;'>";		
		}*/
		
		
		echo "</td>";

		?>
		<td>
		<?php
		$sql3="select * from approve_expertise where email='$row[email]' and status=1";
		$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
		$num=mysqli_num_rows($res3);
		if($num!=0)
		{
		while($row3=mysqli_fetch_array($res3))
		{		
			if($row3['status']==1)
			{
			echo $row3['expertise']."<br>";
			}	 
		}
		}
		else
		{
		echo "None";
		}
		
		?>
		</td>
		<?php
		echo "</form>";
		echo "</tr>";
				
		}
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
$email=$_GET['email1'];

$name=$_GET['name1'];
$expertise=$_GET['expertise'];

for($i=0;$i<sizeof($expertise);$i++)
{
$sql="insert into approve_expertise(id,email,sname,expertise,status) values('','$email','$name','".$expertise[$i]."','1')";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="update areaofexpertise set status=1 where email='$email'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
}

/*$sql="update areaofexpertise set status=1 where email='$email'";
$res=mysql_query($sql)or die("query not executed");*/

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Approved!!', function (e) {
    window.location.href='manage.php';
});</SCRIPT>";
}

if(isset($_GET['submit1']))
{
include 'connection1.php';
echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
$email=$_GET['email1'];
$expertise=$_GET['expertise'];

/*$sql="update areaofexpertise set status=2 where email='$email'";
$res=mysql_query($sql)or die("query not executed");*/

for($i=0;$i<sizeof($expertise);$i++)
{
$sql="delete from approve_expertise where email='$email' and expertise='".$expertise[$i]."'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="update areaofexpertise set status=2 where email='$email'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
}

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Disapproved!!', function (e) {
    window.location.href='manage.php';
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