<?php
session_start();
unset($_SESSION['user3']);
unset($_SESSION['password']);
unset($_SESSION['role']);
session_destroy();
header('location:../login.php');

?>
