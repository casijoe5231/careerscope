<?php
header('Access-Control-Allow-Origin: *');
include '../connect1.php';
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM users WHERE username ='$_POST[username]'");
if(mysqli_num_rows($result) > 0)
{
	echo "<font color=#E9314E>Username already taken.Please specify different Username.</font><br/>";
	return;
}
else
	echo "<font color=#2B6600;>Available</font><br/>";
 ((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>