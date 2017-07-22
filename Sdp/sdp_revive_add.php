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

//echo "Connected successfully";
$goal_id=$_SESSION['goal_id_r'];
$title=$_SESSION['title_r'];
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

$sql00="select * from goal_dead where email ='$email' and goal_id='$goal_id'";
$res00=mysqli_query($conn, $sql00);
$row00=mysqli_fetch_array($res00); 
echo $row00['time_added'];
echo "hi";

$sql6="select * from goal_ID";
$res6=mysqli_query($conn, $sql6);
$row6=mysqli_fetch_array($res6);


$goalid=$row6[goalid]+1;

$sql7="update goal_ID SET goalid='$goalid'";
$res7=mysqli_query($conn, $sql7);

$sql01 = "INSERT INTO goal_list VALUES('$title','$email','$goalid','$action_plan','$mysql_date','$frequency','$goaltype','$row00[7]','','','','','')"; 
$res01=mysqli_query($conn, $sql01);
//$sql01 = "INSERT INTO goal_list(title,email,goal_id,action_plan,deadline,frequency,goal_type,time_added,time_edited,time_deleted,time_completed)VALUES('xzy','xzy@gmail.com',7,'udgdhgg','06/11/2009',3,'Timedays','2009-11-06 07:03:41','','','')";	
	
$sql02 = "Delete from goal_dead where email ='$email' and goal_id='$goal_id'";
$res02 = mysqli_query($conn, $sql02);

$sql022 = "Delete from goal_list where email ='$email' and goal_id='$goal_id'";
$res022 = mysqli_query($conn, $sql022);

$sql2 = "select * from goal_list where title = '$title' and email = '$email'";
$res2=mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($res2);

$sql4 = "insert into goal_hist (email,goal_id,title,deadline,time_added,time_edited,time_deleted,completion_stat,time_completed,goal_com,no_weekly_updates,last_weekly_date,no_time_update,revive_stat,date_revive,evidence_stat,evidence_date,eval_stat,rated_by,eval_score)values('$email','$row2[2]','$title','$row2[4]','$row00[7]','','','Not Completed','','','','','','Revived','$time_added','Not Submitted','','Not Evaluated','None','')";
$res4=mysqli_query($conn, $sql4); 

if ($res01 and $res02 and $res2 and $res4) {
   //echo 'Successfully Goal Added';
   echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('$title Goal has been Successfully Revived ');
    window.location.href='sdp.php';</SCRIPT>";
} 
else 
{
   echo "Error: " . $sql. "<br>" . $conn->error;
}

//$insertdate = date('Y-m-d', strtotime($_POST['age']));

$conn->close();
?> 