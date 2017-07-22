<?php
include("database.php");
$pw = $_POST['Password'];
$npw = $_POST['NPassword'];

$sql = "SELECT password FROM admin WHERE username='{$_SESSION['username']}'"; 
$row = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], $sql));  

			
if( $row['password'] == $pw){
			
$sql = mysqli_query($db, "UPDATE admin SET password='$npw' WHERE username='{$_SESSION['username']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
?>
<script type="text/javascript">
			alert("Password Changed.......");
			window.location="adAccountsetting.php";
</script>
<?php
}
else{
?>
<script type="text/javascript">
			alert("Sorry!  Password Not Changed?");
			window.location="adAccountsetting.php";
</script>
<?php
}
?>


