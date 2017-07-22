<?php

$ins=($GLOBALS["___mysqli_ston"] = mysqli_connect('localhost', 'root', '')) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
mysqli_select_db($ins, maindb);

session_start();
$username=$_SESSION['username'];
$pRoleId =$_SESSION['pRoleId'];	
?>