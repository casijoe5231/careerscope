<?php
include '../connection1.php';
	
	echo '<option value="Select">'.Select.'</option>';
	$sql="SELECT * from branch_master WHERE bm_id =".$_GET['branch_id'];
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	while($row=mysqli_fetch_array($res))
{
if ($row['bm_id']==3)
{
	echo '<option value="1">1</option>';
	echo '<option value="2">2</option>';
}
else
{
$sql1="SELECT * from semester_master WHERE d_id = '$row[d_id]'";
	$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
	while($row1=mysqli_fetch_array($res1))
{
	echo '<option value="' . $row1['sem_id'] . '">' . $row1['semester'] . '</option>';
}
}
}
?>