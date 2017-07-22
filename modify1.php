<?php
    session_start();
	if(isset($_SESSION['admin']))
	{
	include 'includes/connection1.php';
	$emails=$_SESSION['admin'][0];
	$sql5="select * from masteruser where email='$emails'";
	$res5=mysqli_query($GLOBALS["___mysqli_ston"], $sql5);
	while($row5=mysqli_fetch_array($res5))
	{
	  $_SESSION['institute']=$row5['institute'];
	}
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emails','Admin Modify Existing Staff','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<html>
<head>
<title>Administrator</title>
<script type="text/javascript" charset="utf-8" src="js/ColumnFilterWidgets.js"></script>
<link rel="stylesheet" type="text/css" href="css/ColumnFilterWidgets.css">
<script type="text/javascript" charset="utf-8" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="js/ColVis.js"></script>
<link rel="stylesheet" type="text/css" href="css/ColVis.css">
<link rel="stylesheet" type="text/css" href="css/demo_table.css">

  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css">
		<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<script  type="text/javascript" src="validator2.js" ></script>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
<script>
$(document).ready( function () {
	$('#details').dataTable( {
		 bAutoWidth:false ,
		"sDom": 'W<"clear">lfrtip',
		 oColumnFilterWidgets: {
        aiExclude: [7,8]
       }
	} );
} );


/*$(document).ready( function () {
	$("#details").dataTable().columnFilter();
} );*/
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
<h3>&nbsp; Administrator menu</h3>
</div>
<br>
<br>
<div style="float:left;clear:both;margin-top:30px;">
<ul id="sidenavigation" class="MenuBarVertical">
	<li><a href="adminindex.php">Add staff</a></li>
	<li><a href="sdetails.php">Existing Staff Details</a></li>
	<li><a href="modify.php">Modify staff</a></li>
	<li><a href="logout.php">Logout</a></li>
	</ul>
</div>
<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">
<fieldset>
        <legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>MODIFY EXISTING STAFF<b></legend>
		<center>
		
        <table border="1" id="details"  style="margin-top:20px;margin-bottom:20px;">
		
		<tr>
		<th><b>Staff Name</b></th>
		<th><b>Existing role</b></th>
		<th><b>Current status</b></th>
		<th><b>Change role</b></th>
		<th><b>Change status</b></th>
		<th><b>Email</b></th>
		</tr>
		<?php
		$sql="select * from masteruser where role='Staff' and institute='$_SESSION[institute]'";
		$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row=mysqli_fetch_array($res))
		{
		$sql1="select * from istaff where email='$row[email]' and is_admin!=1";
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
		<td>
		<?php
		if($row1['active_yn']==1)
		{
		echo "Active";
		}
		if($row1['active_yn']==0)
		{
		echo "Inactive";
		}
		?>
		</td>
		<form name="trial" method="GET">
		<td><input type="checkbox" name="Director" value="Director">Director
		<input type="hidden" name="director2" value="Director">
		<input type="checkbox" name="Principal" value="Principal">Principal
		<input type="hidden" name="principal2" value="Principal">
		<input type="checkbox" name="HOD" value="HOD">HOD
		<input type="hidden" name="hod2" value="HOD">
		<input type="checkbox" name="TPO" value="TPO">TPO
		<input type="hidden" name="tpo2" value="TPO">
		<input type="checkbox" name="Mentor" value="Mentor">Mentor
		<input type="hidden" name="mentor2" value="Mentor">
		<input type="checkbox" name="TestManager" value="TestManager">Test Manager
		<input type="hidden" name="testmgr2" value="TestManager">
		<input type="checkbox" name="Lecturer" value="Lecturer">Lecturer
		<input type="hidden" name="lecturer2" value="Lecturer">
		<input type="checkbox" name="SubjectTeacher" value="SubjectTeacher">Subject Teacher
		<input type="hidden" name="subjteacher2" value="SubjectTeacher"><br>
		<label><span id="role" style="color:#C00;"></span></label>
		</td>
		<td>
		<input type="checkbox" name="active" value="active">
		<input type="hidden" name="active2" value="active">
		</td>
		<td>
		<input type="hidden" name="email1" value="<?php echo $row['email']; ?>">
		<input type='submit' name='submit' id='submit' value='Send email' style='cursor:pointer;'>
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
		<?php
		if(isset($_GET['submit']))
{
	echo "hi";
include 'includes/connection1.php';
/*echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";*/
$email=$_GET['email1'];

					if(isset($_GET['active']))
					{
					if(isset($_GET['active2']))
					{
					$active=$_GET['active'];
					$sql="select * from istaff where email='$email'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
					while($row=mysqli_fetch_array($res))
					{
					if($row['active_yn']==1)
					{
					$sql="update istaff set active_yn='0' where email='$email'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					else
					{
					$sql="update istaff set active_yn='1' where email='$email'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					}
					}
					}
else
{
$sql="update istaff set is_director=0, is_principal=0, is_hod=0, is_tpo=0, is_lecturer=0, is_mentor=0, is_testmgr=0, is_subjteacher=0 where email='$email'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

					if(isset($_GET['Lecturer']))
					{
					if(isset($_GET['lecturer2']))
					{
					$lecturer=$_GET['Lecturer'];
					$sql="update istaff set is_lecturer='1' where email='$email'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					}
					
					if(isset($_GET['Mentor']))
					{
					if(isset($_GET['mentor2']))
					{
					$mentor=$_GET['Mentor'];
					$sql="update istaff set is_mentor='1' where email='$email'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					}
					
					if(isset($_GET['Director']))
					{
					if(isset($_GET['director2']))
					{
					$director=$_GET['Director'];
					$sql="update istaff set is_director='1' where email='$email'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					}
					
					if(isset($_GET['Principal']))
					{
					if(isset($_GET['principal2']))
					{
					$principal=$_GET['Principal'];
					$sql="update istaff set is_principal='1' where email='$email'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					}
					
					if(isset($_GET['HOD']))
					{
					if(isset($_GET['hod2']))
					{
					
					$sql="update istaff set is_hod='1' where email='$email'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					}
					
					if(isset($_GET['TPO']))
					{
					if(isset($_GET['tpo2']))
					{
					$tpo=$_GET['TPO'];
					$sql="update istaff set is_tpo='1' where email='$email'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					}
					
					if(isset($_GET['TestManager']))
					{
					if(isset($_GET['testmgr2']))
					{
					$test=$_GET['TestManager'];
					$sql="update istaff set is_testmgr='1' where email='$email'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					}
					
					if(isset($_GET['SubjectTeacher']))
					{
					if(isset($_GET['subjteacher2']))
					{
					$subj=$_GET['SubjectTeacher'];
					$sql="update istaff set is_subjteacher='1' where email='$email'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					}
}					
					
/*$To = $email; 
$Subject = 'Send Email'; 
$Message = 'Your role is modified as:'.if(isset($_GET['Director'])){echo $_GET['Director'];}.','.if(isset($_GET['Principal'])){echo $_GET['Principal'];}.','.if(isset($_GET['HOD'])){echo $_GET['HOD'];}.','.if(isset($_GET['TPO'])){echo $_GET['TPO'];}.','.if(isset($_GET['Mentor'])){echo $_GET['Mentor'];}.','.if(isset($_GET['SubjectTeacher'])){echo $_GET['SubjectTeacher'];}.','.if(isset($_GET['TestManager'])){echo $_GET['TestManager'];}.','.if(isset($_GET['Lecturer'])){echo $_GET['Lecturer'];};
$Headers = "From: priyankamalekar9@gmail.com \r\n" . 
"Reply-To: priyankamalekar9@gmail.com \r\n" . 
"Content-type: text/html; charset=UTF-8 \r\n"; 
  
mail($To, $Subject, $Message, $Headers); 				
*/
echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('Modification done successfully!');
    window.location.href='modify.php';
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