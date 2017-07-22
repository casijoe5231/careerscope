<?php
include("database.php");

$un = $_POST['UserName'];
$act = $_POST['active'];

if($_POST['submit']=="Submit"){

$sql = mysqli_query($db, "UPDATE registration SET active = '$act' WHERE pUserName='{$_POST['UserName']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

?>
<script type="text/javascript">
	window.location="account_deactivate.php";
</script>
<?php }
else if($_POST['convert']=="Convert"){

$sql = mysqli_query($db, "UPDATE registration SET pInstitutionId = '$act' WHERE pUserName='{$_POST['UserName']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

?>
<script type="text/javascript">
	window.location="ad_convert_account.php";
</script>
<?php }
?>
