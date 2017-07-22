<?php

 include '../connection1.php';
$stmt="SELECT * FROM mentoractivity";
$result=mysqli_query($GLOBALS["___mysqli_ston"], $stmt) or die("query not executed");
while($row=mysqli_fetch_array($result , MYSQLI_BOTH))
{
	echo '<tr><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td></tr>';
}

?>