<?php
include '../connection1.php';
session_start();
$email=$_SESSION['user'][0];
$name=$_SESSION['user'][1];
$receiverid=$_GET['receiverid'];

 $sql="select * from chat_msg where sender_id='$email' and receiver_id='$receiverid' order by id";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  $num=mysqli_num_rows($res);
  
  while($row=mysqli_fetch_array($res))
{
	echo $row['sender_name'].":".$row['msg']."<br>";
}
?>