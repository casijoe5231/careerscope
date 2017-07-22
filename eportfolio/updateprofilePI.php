<?php
include("database.php");

$fname=$_POST['FirstName'];
$mname=$_POST['MiddleName'];
$lname=$_POST['LastName'];
$mnumber=$_POST['mobilenumber'];
$pAdd=$_POST['permAddress1'];
$pC=$_POST['permCity'];
$pS=$_POST['permState'];
$pZC=$_POST['permZipCode'];
$pe=$_POST['pEmail'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$theDate=$_POST['date1'];

define ("MAX_SIZE","100000");
$target="Upload/".$_SESSION['username'];

if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
  
$sql = mysqli_query($db, "UPDATE registration SET pFirstName = '$fname' , pMiddleName = '$mname', pLastName = '$lname', pEmail = '$pe', pMobilenumber = '$mnumber', ppermAddress1 = '$pAdd', ppermCity = '$pC', ppermState = '$pS', ppermZipCode = '$pZC', dob= '$theDate', gender= '$gender' WHERE pUserName='{$_SESSION['username']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
}

$result = mysqli_query($db, "SELECT pRoleId, pUserName FROM registration WHERE pUserName='{$_SESSION['login']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		
			
			$result1= mysqli_fetch_assoc($result);
			$pRoleId =	$result1['pRoleId'];
			$username =	$result1['pUserName'];
		if($pRoleId =="Student"){
		?>
			<script type="text/javascript">
				alert("Successfully Updated.......");
				window.location="MyprofilePI.php";
				
            </script>
<?php
			
}else{?>
	<script type="text/javascript">
			alert("Successfully Updated.......");
			window.location="iMyprofilePI.php";
			
	</script>
<?php
}?>

