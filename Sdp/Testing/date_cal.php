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

$goal_id= 14;

$sql1="select * from goals_completed where goal_id IN($goal_id)";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
$row1=mysqli_fetch_array($res1);

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
	$comment = "You Just made it inthe Time, The goals you achieve just ont time are nott bad, but its always wise to Complete work well before time. Try Harder next time.";
	
}
else 
{
	$ahead = $no_of_days - $completed_in_days;
	if($ahead >= 14)
	{
		$comment = "Well Done! Your Time Management Skills are Top Notch, The goal has been achieved 2 weeks prior to the stated deadline. Continue working hard inthe the same manner for each goal. All the Best!";
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
?>