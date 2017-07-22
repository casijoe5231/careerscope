<?php
include '../includes/connection1.php';
	
	echo '<option value="Select">'.Select.'</option>';
	$sql="SELECT * from job_master WHERE gm_id =".$_GET['goal_id'];
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	while($row=mysqli_fetch_array($res))
{
	echo '<option value="' . $row['jm_id'] . '">' . $row['job_desc'] . '</option>';
}
?>