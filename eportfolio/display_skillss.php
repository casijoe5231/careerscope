<?php
include '../connection1.php';
	
	echo '<option value="Select">'.Select.'</option>';
	$sql="SELECT * from skill_master WHERE jm_id =".$_GET['job_id'];
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	while($row=mysqli_fetch_array($res))
{
	echo '<option value="' . $row['e_id'] . '">' . $row['skill_name'] . '</option>';
}
?>