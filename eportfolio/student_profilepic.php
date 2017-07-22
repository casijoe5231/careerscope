<?php
include("database.php");
$num = $_GET['strUser'];

$q1=mysqli_query($db, "UPDATE student_details SET pic='$num' WHERE ldap_username='{$_SESSION['login']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	

?>
<html>
<head>
	<script type="text/javascript">
		alert("Profile PIc Uploaded");
		window.location="simagedelete.php";
	</script>
</head>
</html>
