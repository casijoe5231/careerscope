<?php
include("database.php");
$pw = $_POST['Password'];
$npw = $_POST['NPassword'];

$sql = "SELECT pPassword FROM registration WHERE pUserName='{$_SESSION['username']}'"; 
$row = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $sql));  

$result = mysqli_query($db, "SELECT pRoleId, pUserName FROM registration WHERE pUserName='{$_SESSION['login']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		
			
			$result1= mysqli_fetch_assoc($result);
			$pRoleId =	$result1['pRoleId'];
			$username =	$result1['pUserName'];
			if($pRoleId =="Student"){
			
			if( $row['pPassword'] == $pw){
			
$sql = mysqli_query($db, "UPDATE registration SET pPassword='$npw' WHERE pUserName='{$_SESSION['username']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
?>
<script type="text/javascript">
			alert("Password Changed.......");
			window.location="Accountsetting.php";
</script>
<?php
}
else{
?>
<script type="text/javascript">
			alert("Sorry!  Password Not Changed?");
			window.location="Accountsetting.php";
</script>
<?php
}
			
}else{
	if( $row['pPassword'] == $pw){
			
$sql = mysqli_query($db, "UPDATE registration SET pPassword='$npw' WHERE pUserName='{$_SESSION['username']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
?>
<script type="text/javascript">
			alert("Password Changed.......");
			window.location="iAccountsetting.php";
</script>
<?php
}
else{
?>
<script type="text/javascript">
			alert("Sorry!  Password Not Changed?");
			window.location="iAccountsetting.php";
</script>
<?php
}
}
?>


