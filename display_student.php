<?php
include 'connection1.php';
	
		echo '<option value="Select">'.Select.'</option>';
			echo '<option value="All">'.All.'</option>';
	$sql="SELECT * from masteruser WHERE branch ='$_GET[branch_name]'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	while($row=mysqli_fetch_array($res))
{


	echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';

}
?>