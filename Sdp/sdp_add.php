<?php
session_start();

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }
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

$title=@$_POST['title'];
$email=$_SESSION['user'][0];
$action_plan=@$_POST['a_plan'];
$deadline=@$_POST['dead_l'];
$goal_type=@$_POST['type'];
$frequency=@$_POST['optionsRadios'];
$time_added= time() + (7 * 24 *60 *60);
$goaltype=@$_POST['Goal_name'];


//echo $time_added;$date = DateTime::createFromFormat('d/m/Y', $date);
//$date = $date->format('Y-m-d');
//echo '<br>';
//
$date = new DateTime();

$time_added = $date->format('Y-m-d H:i:s');

//echo $deadline;
//$date->setTimestamp(1171502725);

//$myDateTime = DateTime::createFromFormat('d/m/Y', $deadline);

//$newDateString = $myDateTime->format('Y-m-d');

$mysql_date = date('Y-m-d', strtotime($deadline));
//$date->setTimestamp(1171502725);
//echo $date->format('U = Y-m-d H:i:s') . "\n";
//echo $mysql_date;
$sql6="select * from goal_ID";
$res6=mysqli_query($conn, $sql6);
$row6=mysqli_fetch_array($res6);


$goalid=$row6[goalid]+1;

$sql7="update goal_ID SET goalid='$goalid'";
$res7=mysqli_query($conn, $sql7);

$sql01 = "INSERT INTO goal_list VALUES('$title','$email','$goalid','$action_plan','$mysql_date','$frequency','$goaltype','$time_added','','','','','')"; 
$res1=mysqli_query($conn, $sql01);

//echo "hi";
//$sql01 = "INSERT INTO goal_list(title,email,goal_id,action_plan,deadline,frequency,goal_type,time_added,time_edited,time_deleted,time_completed)VALUES('xzy','xzy@gmail.com',7,'udgdhgg','06/11/2009',3,'Timedays','2009-11-06 07:03:41','','','')";	
	


$sql2 = "select * from goal_list where goal_id = '$goalid' and email = '$email'";
$res2=mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($res2);
//$res2 = $conn->query($sql2);
//echo $res2;
//echo $row2['time_added'];
//$goal_id = $row2[2];
//echo $goal_id;
//echo $row2['title'];


$sql3 = "insert into goal_hist (email,goal_id,title,deadline,time_added,time_edited,time_deleted,completion_stat,time_completed,goal_com,no_weekly_updates,last_weekly_date,no_time_update,revive_stat,date_revive,evidence_stat,evidence_date,eval_stat,rated_by,eval_score)values('$email','$row2[2]','$title','$row2[4]','$row2[7]','','','Not Completed','','','','','','Not Revived','','Not Submitted','','Not Evaluated','None','')";
echo $row2[2];
$res3 = mysqli_query($conn, $sql3);

//echo $res3;
$time_reminded = date('Y-m-d');
$next_date = date('Y-m-d', strtotime($time_reminded. ' - 8 days'));
$sql4="insert into goal_remind (goal_id,email,title,frequency,time_reminded)values('$row2[2]','$email','$title','$frequency','$next_date')";
$res4=mysqli_query($GLOBALS["___mysqli_ston"], $sql4);

if($res2 and $res1 and $res3 and $res4){
echo 'hi';
   //echo 'Successfully Goal Added';
   echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('$title Goal Successfully Created');
    window.location.href='sdp.php';</SCRIPT>";
} 
else 
{
   echo "Error: " . $sql. "<br>" . $conn->error;
}

//$insertdate = date('Y-m-d', strtotime($_POST['age']));

$conn->close();
?> 