<?php
 if(isset($_POST['submit2']))
 {
  include 'connection1.php';
 session_start();
//$mail=$_SESSION['user'][0];
$type = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['t_id']);
$question = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['question']);
$opt1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['opt1']);
$opt2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['opt2']);

$ans = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['ans']);
$qid="select q_id from questions where t_id='$type'";
$result=mysqli_query($GLOBALS["___mysqli_ston"], $qid);
		
//$qid = mysql_real_escape_string($_POST['sql1']);
//echo $qid;
//$qid++;
//echo $qid;
echo $count=mysqli_num_rows($result);
  if($count==0)
  {
	  $count=1;
  }
else
{
	echo $count++;
}
$sql="INSERT INTO questionstf(t_id,q_id,question,opt1,opt2,ans)
VALUES (".$type.", ".$count.", '".$question."', '".$opt1."','".$opt2."','".$ans."')";
echo $result = mysqli_query($GLOBALS["___mysqli_ston"],  $sql );


 
if($result)
	{
		echo "<html><head><script src='js/alertify.min.js'></script>
		<link rel='stylesheet' href='css/alertify.core.css' />
		<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('New staff added successfully', function (e) {
		window.location.href='aptitudequestion.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='js/alertify.min.js'></script>
		<link rel='stylesheet' href='css/alertify.core.css' />
		<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured. Being redirected to form.', function (e) {
		window.location.href='aptitudequestion.php';
		});</SCRIPT>";
	}
 }
?>		
	   
 