<?php
include "connect.php";
$sql="insert into info values ('$_POST[username]','$_POST[name]','$_POST[email]','$_POST[details]','$_POST[loc]','$_POST[aggregate]','$_POST[skills]')";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo 'sent';
?>