<?php
session_start();
$email=$_POST['email'];
$sql="select * from istaff where email='$email'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
while($row=mysqli_fetch_array($res))
{	
					if($row['is_director']==1)
					{
					$sql="update istaff set is_director='0'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					elseif($row['is_principal']==1)
					{
					$sql="update istaff set is_principal='0'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					elseif($row['is_hod']==1)
					{
					$sql="update istaff set is_hod='0'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					elseif($row['is_tpo']==1)
					{
					$sql="update istaff set is_tpo='0'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					elseif($row['is_mentor']==1)
					{
					$sql="update istaff set is_mentor='0'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					elseif($row['is_testmgr']==1)
					{
					$sql="update istaff set is_testmgr='0'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					elseif($row['is_lecturer']==1)
					{
					$sql="update istaff set is_lecturer='0'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					else
					{
					$sql="update istaff set is_subjteacher='0'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
}
		
					if(isset($_POST['Director']))
					{
					if(isset($_POST['director2']))
					{
					$sql="select * from istaff";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
					while($row=mysqli_fetch_array($res))
					{
					$sql="update istaff set is_director='1' where email='$email'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					}
					}
					
					if(isset($_POST['Principal']))
					{
					if(isset($_POST['principal2']))
					{
					$sql="update istaff set is_principal='1' where email='$email'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					}
					
					if(isset($_POST['HOD']))
					{
					if(isset($_POST['hod2']))
					{
					$sql="update istaff set is_hod='1' where email='$email'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					}
					
					if(isset($_POST['TPO']))
					{
					if(isset($_POST['tpo2']))
					{
					$sql="update istaff set is_tpo='1' where email='$email'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					}
					
					if(isset($_POST['Mentor']))
					{
					if(isset($_POST['mentor2']))
					{
					$sql="update istaff set is_mentor='1' where email='$email'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					}
					
					if(isset($_POST['TestManager']))
					{
					if(isset($_POST['testmgr2']))
					{
					$sql="update istaff set is_testmgr='1' where email='$email'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					}
					
					if(isset($_POST['Lecturer']))
					{
					if(isset($_POST['lecturer2']))
					{
					$sql="update istaff set is_lecturer='1' where email='$email'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					}
					
					if(isset($_POST['SubjectTeacher']))
					{
					if(isset($_POST['subjteacher2']))
					{
					$sql="update istaff set is_subjteacher='1' where email='$email'";
					$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
					}
					}
			
		
	if($res)
	{
		echo "<html><head><script src='js/alertify.min.js'></script>
		<link rel='stylesheet' href='css/alertify.core.css' />
		<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Modification done successfully', function (e) {
		window.location.href='modify.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='js/alertify.min.js'></script>
		<link rel='stylesheet' href='css/alertify.core.css' />
		<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured. Being redirected to form.', function (e) {
		window.location.href='modify.php';
		});</SCRIPT>";
	}
?>