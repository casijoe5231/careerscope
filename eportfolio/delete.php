<?php
include("database.php");
$num = $_GET['strUser'];

//SPECIFY THE DIRECTORY
$dir = "upload"."/".$_SESSION['login']; 

// OPEN THE DIRECTORY
$dirHandle = opendir($dir); 

if(@unlink($num )){ 
	?><html>
		<head>
	<script type="text/javascript">
			alert("Image Deleted");
			window.location="simagedelete.php";
			</script></head>
		</html>
	<?php
}
else{ echo "not deleted";}
?>