<?php
include 'connection1.php';
session_start();
$email=$_SESSION['hod'][0];
$name=$_SESSION['hod'][1];
$receiverid=$_GET['receiver_id'];

 $sql="select * from chat_msg where sender_id='$receiverid' and receiver_id='$email' order by id";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  $num=mysqli_num_rows($res);
  
  while($row=mysqli_fetch_array($res))
{
	echo "<b>".$row['sender_name'].":</b>".$row['msg']."<br>";
}
?>	