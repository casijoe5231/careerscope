<?php
include("database.php");

$table = $_GET['table'];
$id = $_GET['id'];

 mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM $table WHERE id='$id'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

header("location:sdisplay1.php");

?>