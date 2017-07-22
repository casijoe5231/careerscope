<?php
include_once "connection1.php";

if(!$con)
{
    die('Could not connect: ' . mysqli_error());
}

	$ctid=$_POST['ctid'];
	$stmt="SELECT * FROM mentoractivity WHERE CT_ID='$ctid' LIMIT 1";
	$result=mysqli_query($con,$stmt);

	while($row=mysqli_fetch_array($result)){
		$cname=$row['Name'];
		$designation=$row['Designation'];
	}

	echo json_encode(array('ctid' => $ctid , 'cname' => $cname, 'designation' => $designation ));

?>