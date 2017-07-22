<?php
include '../connection1.php';
	
	echo '<option value="Select">'.Select.'</option>';
	$sql="SELECT * from expertise_master WHERE id ='$_GET[skill_id]'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	while($row=mysqli_fetch_array($res))
{
	$sql1="SELECT * from approve_expertise WHERE expertise ='$row[name]' and status=1";
	$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
	while($row1=mysqli_fetch_array($res1))
{

	echo '<option value="' . $row1['sname'] . '">' . $row1['sname'] . '</option>';
}
}
?>