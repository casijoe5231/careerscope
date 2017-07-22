<?php
session_start();

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }
$servername = "localhost";
$username = "root";
$password = "oracle";
$db="careerscope";


// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$title=@$_POST['title'];
$email=$_SESSION['user'][0];
$action_plan=@$_POST['a_plan'];
$deadline=@$_POST['dead_l'];
$goal_type=@$_POST['type'];
$frequency=@$_POST['optionsRadios'];
$time_added= time() + (7 * 24 *60 *60);
$goaltype=@$_POST['Goal_name'];

echo "hello +++++++++++++++++++++++++++++++++";
echo $goaltype;


//echo $time_added;
echo '<br>';
//
$date = new DateTime();
$time_added = $date->format('Y-m-d H:i:s');
echo $deadline;
$date->setTimestamp(1171502725);
$myDateTime = DateTime::createFromFormat('m/d/Y', $deadline);
$newDateString = $myDateTime->format('Y-m-d');
echo $newDateString; echo $email;
//$date->setTimestamp(1171502725);
//echo $date->format('U = Y-m-d H:i:s') . "\n";
//
$sql01 = "INSERT INTO goal_list VALUES('$title','$email','','$action_plan','$deadline','$frequency','$goal_type','$time_added','','','')"; 
	
//$sql01 = "INSERT INTO goal_list(title,email,goal_id,action_plan,deadline,frequency,goal_type,time_added,time_edited,time_deleted,time_completed)VALUES('xzy','xzy@gmail.com',7,'udgdhgg','06/11/2009',3,'Timedays','2009-11-06 07:03:41','','','')";	
	
if ($conn->query($sql01) === TRUE) {
   echo 'Successfully Goal Added';
   //echo "<br> New table A created & Updated successfully.";
} 
else 
{
   echo "Error: " . $sql. "<br>" . $conn->error;
}

//$insertdate = date('Y-m-d', strtotime($_POST['age']));

$conn->close();
?> 