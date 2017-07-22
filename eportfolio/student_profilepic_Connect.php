<?php
include("database.php");

define ("MAX_SIZE","100000");
$target="Upload/".$_SESSION['login'];

if (!is_dir($target)) {
   mkdir($target);
}

if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
  
  move_uploaded_file($_FILES["file"]["tmp_name"],
      $img="upload/".$_SESSION['username']."/".$_FILES["file"]["name"]);
	  $q1=mysqli_query($db, "UPDATE student_details SET pic='$img' WHERE ldap_username='{$_SESSION['login']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	  }

?>
<html>
<head>
	<script type="text/javascript">
		alert("Profile PIc Uploaded");
		window.location="profilepic.php";
	</script>
</head>
</html>
