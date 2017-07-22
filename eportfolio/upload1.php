<?php

include("database.php");


define ("MAX_SIZE","100000");
$target="Upload/".$_SESSION['username'];

if ($_FILES["file"]["error"] > 0){
    echo "Error: " . $_FILES["file"]["error"] . "<br />";
}
else{
    move_uploaded_file($_FILES["file"]["tmp_name"],
    "upload/".$_SESSION['username']."/".$_FILES["file"]["name"]);
}

$result = mysqli_query($db, "SELECT pRoleId, pUserName FROM registration WHERE pUserName='{$_SESSION['login']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		
			
			$result1= mysqli_fetch_assoc($result);
			$pRoleId =	$result1['pRoleId'];
			$username =	$result1['pUserName'];
			if($pRoleId =="Student"){
?>
<script type="text/javascript">
		    alert("File Upload");
			window.location="upload.php";
			
</script>
<?php
			
}else{?>
	<script type="text/javascript">
			alert("File Upload");
			window.location="iupload.php";
			
	</script>
<?php
}?>
