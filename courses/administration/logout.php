<!DOCTYPE html>
<html>
<head>
<title>Logout</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
</head>
<body>
<?php
session_start();
if(isset($_SESSION['administration']))
  //session_destroy();
  unset($_SESSION['administration']);
  echo "<meta http-equiv='refresh' content='0;url=./index.php'>";
?>
</body>