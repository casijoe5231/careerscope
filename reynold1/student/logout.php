<!DOCTYPE html>
<html>
<head>
<title>Logout</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
</head>
<body>
<?php
session_start();
if(isset($_SESSION['user']))
{
  //session_destroy();
  unset($_SESSION['user']);
  echo "<meta http-equiv='refresh' content='0;url=../login.php'>";
}

if(isset($_SESSION['hod']))
{
  //session_destroy();
  unset($_SESSION['hod']);
  echo "<meta http-equiv='refresh' content='0;url=../login.php'>";
}

if(isset($_SESSION['tpo']))
{
  //session_destroy();
  unset($_SESSION['tpo']);
  echo "<meta http-equiv='refresh' content='0;url=../login.php'>";
}

if(isset($_SESSION['admin']))
{
  //session_destroy();
  unset($_SESSION['admin']);
  echo "<meta http-equiv='refresh' content='0;url=../login.php'>";
}

if(isset($_SESSION['director']))
{
  //session_destroy();
  unset($_SESSION['director']);
  echo "<meta http-equiv='refresh' content='0;url=../login.php'>";
}

if(isset($_SESSION['principal']))
{
  //session_destroy();
  unset($_SESSION['principal']);
  echo "<meta http-equiv='refresh' content='0;url=../login.php'>";
}

if(isset($_SESSION['mentor']))
{
  //session_destroy();
  unset($_SESSION['mentor']);
  echo "<meta http-equiv='refresh' content='0;url=../login.php'>";
}

if(isset($_SESSION['testmgr']))
{
  //session_destroy();
  unset($_SESSION['testmgr']);
  echo "<meta http-equiv='refresh' content='0;url=../login.php'>";
}


if(isset($_SESSION['user2']))
{
  //session_destroy();
  unset($_SESSION['user2']);
  echo "<meta http-equiv='refresh' content='0;url=../login.php'>";
}

if(isset($_SESSION['user3']))
{
  //session_destroy();
  unset($_SESSION['user3']);
  echo "<meta http-equiv='refresh' content='0;url=../login.php'>";
}

if(isset($_SESSION['user4']))
{
  //session_destroy();
  unset($_SESSION['user3']);
  echo "<meta http-equiv='refresh' content='0;url=../login.php'>";
}

if(isset($_SESSION['user5']))
{
  //session_destroy();
  unset($_SESSION['user5']);
  echo "<meta http-equiv='refresh' content='0;url=../login.php'>";
}

?>
</body>