<!DOCTYPE html>
<?php
session_start();

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }
	
//Connection Code
$db="careerscope";
$servername = "localhost";
$username = "root";
$password = "oracle";

// Create connection
$conn=($GLOBALS["___mysqli_ston"] = mysqli_connect($servername, $username, $password));  // Make Connection
	mysqli_select_db($GLOBALS["___mysqli_ston"], $db);                      // Select Database

// Check connection
if (!$conn) {
    die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}
//echo "Connected successfully";

$goal_id=$_GET["id"];
$email=$_SESSION['user'][0];
$user=$_SESSION['user'][1];
$date = new DateTime();
$time_added = $date->format('Y-m-d H:i:s');

///values coming from form
$yesno=$_POST['yesno'];
$goal_rate=$_POST['goal_rate'];
$justify=$_POST['justify'];
$time=$_POST['time'];
$interest=$_POST['interest'];
$work=$_POST['work'];
$u_comment=$_POST['comment'];
///values coming from form ends

//////Calculating User Score
$user_score=$yesno+$goal_rate+$time+$interest+$work;///
//////Calculating User Score ends herer

//////Calculating System Score
$sql5="select * from goal_hist where goal_id IN('$goal_id')";
$res5=mysqli_query($GLOBALS["___mysqli_ston"], $sql5);
$row5=mysqli_fetch_array($res5);

$no_edits=$row5[no_time_update];
$edit_value = 6 + (-2) * ($no_edits);

if($row5[time_completed]<=$row5[deadline])
{
	$ontime=2;
}
elseif($row5[time_completed]>$row5[deadline]){
	$ontime=0;
}

if($row5[revive_stat] === 'Revived')
{
	$rev_m = -2;
}else{
	$rev_m = 2;
}

$sys_score=$edit_value + $ontime + $rev_m;
//////Calculating System Score ends here
?>
<html>
<body>
<?php
$sql1="select * from goals_completed where goal_id IN($goal_id)";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
$row1=mysqli_fetch_array($res1);

////Calculating system feedback
$date_created = substr($row1[date_created], 0, 10);
echo $date_created.'<br>';

$date_completed = substr($row1[date_completed], 0, 10);
echo $date_completed.'<br>';
$start = $date_completed;

$deadline = $row1[deadline];
$end = $deadline;

echo $deadline.'<br>';

$date_created = strtotime($date_created);
echo $date_created.'<br>';

$date_completed = strtotime($date_completed);
echo $date_completed.'<br>';

$deadline = strtotime($deadline);
echo $deadline.'<br>';

$difference = $date_completed - $date_created;
$completed_in_days = floor($difference / (60 * 60 * 24));
echo 'Completed in days:'.$completed_in_days.'<br>';


$difference2 = $deadline - $date_created;
$no_of_days = floor($difference2 / (60 * 60 * 24));
echo 'days to work:'.$no_of_days.'<br>';
$ahead = $no_of_days - $completed_in_days;
echo $ahead;


if($date_completed === $deadline)
{
	$comment = "You Just made it in Time, The goals you achieve just on time are not bad, but its always wise to Complete work well before time. Try Harder next time.";
	
}
else 
{
	$ahead = $no_of_days - $completed_in_days;
	if($ahead >= 14)
	{
		$comment = "Well Done! Your Time Management Skills are Top Notch, The goal has been achieved 2 weeks prior to the stated deadline. Continue working hard in the same manner for each goal. All the Best!";
	}
	elseif($ahead >= 6 and $ahead <= 13)
	{
		$comment = "You posses great time management skills, the fact that you completed your goal, one week inthe advance is proof for the same. Continue working with dedication with the same spirit.";
	}
	elseif($ahead >= 0 and $ahead <= 5)
	{
		$comment = "Completed at last, Looks like you made it inthe time before the deadline. Its alright for now, but when you work professionally make sure you are more committed to your time lines.";
	}
}
echo '<br>'.$comment;
///Calculating system feedback ends here

$sql2="update goal_hist SET eval_stat='Evaluated', rated_by='$user', eval_score='$user_score' where goal_id IN('$goal_id')";
$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);

$sql3="update goals_completed SET self_eval='Yes' where goal_id IN('$goal_id')";
$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);

$sql4="insert into goal_other (goal_id,email,title,date_eval,ontime,benefit,justify,time_skill,interest,often,comment,user_score,sys_score,system_comment)values('$goal_id','$email','$row1[title]','$time_added','$yesno','$goal_rate','$justify','$time','$interest','$work','$u_comment','$user_score','$sys_score','$comment')";
$res4=mysqli_query($GLOBALS["___mysqli_ston"], $sql4);

if($res1 and $res2 and $res3 and $res4)
{
	echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('$row1[title] Goal Successfully Evaluated');
    window.location.href='eval_self.php';</SCRIPT>";
}
else
{
	echo "Error: ".$sql1."<br>" . $conn->error;
}
?>
</body>
</html>