<?php
$host="localhost"; // Host name 
$username="root"; // mysql username 
//$password="1123581321";
$password="";
$db_name="form1"; // Database name 
$tbl_name="company"; // Table name 
($GLOBALS["___mysqli_ston"] = mysqli_connect($host,  $username,  $password))or die("cannot connect"); 
mysqli_select_db($GLOBALS["___mysqli_ston"], $db_name)or die("cannot select DB");
?>