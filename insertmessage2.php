<?php
include 'connection1.php';
session_start();
$email=$_SESSION['user'][0];
$name=$_SESSION['user'][1];

$receiverid=$_GET['data1'];
$msg=$_GET['data2'];
date_default_timezone_set('Asia/Calcutta');
$dt = date("Y-m-d H:i:s");

$sql="insert into chat_msg(id,sender_id,sender_name,receiver_id,msg,timesql) values('','$email','$name','$receiverid','$msg','$dt')";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

  $sql1="select * from chat_msg where sender_id='$email' and receiver_id='$receiverid' order by id";
  $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
  while($row1=mysqli_fetch_array($res1))
{
	echo "<b>".$row1['sender_name'].":</b>".$row1['msg']."<br>";
}
?>