<?php
include '../connection1.php';
	
	echo '<option value="Select">'.Select.'</option>';
	$sql="SELECT * from branch_master WHERE d_id =".$_POST['branch'];
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	while($row=mysqli_fetch_array($res))
{
	echo '<option value="' . $row['bm_id'] . '">' . $row['branch_name'] . '</option>';
}
?>