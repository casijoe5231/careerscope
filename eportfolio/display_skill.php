<?php
include '../connection1.php';
	
	echo '<option value="Select">'.Select.'</option>';
	$sql="SELECT * from sub_skill_sem_branch WHERE sub_id ='$_GET[subject_id]' and sem_id='$_GET[semester_id]'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	while($row=mysqli_fetch_array($res))
{
	$sql1="SELECT * from skill_master WHERE sm_id ='$row[skill_id]'";
	$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
	while($row1=mysqli_fetch_array($res1))
	{
	echo '<option value="' . $row1['sm_id'] . '">' . $row1['skill_name'] . '</option>';
	
	}
}
?>

	