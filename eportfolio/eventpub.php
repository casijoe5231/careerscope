<?php
include '../connection1.php';

$act_id=$_POST['act_id'];
$stmt="UPDATE mentoractivity SET publish=if(publish=1,0,1) WHERE activityid='$act_id'";
$result=mysqli_query($GLOBALS["___mysqli_ston"], $stmt) or die("query not executed");



?>