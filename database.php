<?php
$db=($GLOBALS["___mysqli_ston"] = mysqli_connect('localhost', 'root', 'oracle')) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
mysqli_select_db($db, careerscope);
?>
