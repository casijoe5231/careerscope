<?php
include '../includes/connection1.php';
	
	echo '<option value="Select">'.Select.'</option>';
	$sql="SELECT * from goal_master WHERE d_id =".$_GET['disc_id'];
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	while($row=mysqli_fetch_array($res))
{
	echo '<option value="' . $row['g_id'] . '">' . $row['goal_desc'] . '</option>';
}
?>