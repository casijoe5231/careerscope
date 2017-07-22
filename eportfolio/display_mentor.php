<?php
include '../connection1.php';
	
	$sql="SELECT * from skill_master WHERE sm_id ='$_GET[skill_id]'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	while($row=mysqli_fetch_array($res))
{
$sql1="SELECT * from approve_expertise WHERE expertise ='$row[skill_name]' and status=1";
	$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
	while($row1=mysqli_fetch_array($res1))
	{
		echo "".$row1['sname']."<br>";
	}
}
?>