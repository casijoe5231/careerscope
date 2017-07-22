<?php
include '../connection1.php';
	
	echo '<option value="Select">'.Select.'</option>';
	$sql="SELECT * from subject_master WHERE bm_id='$_GET[branch_id]' and sem_id='$_GET[semester_id]'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	while($row=mysqli_fetch_array($res))
{
	echo '<option value="' . $row['sub_id'] . '">' . $row['name'] . '</option>';
}
?>