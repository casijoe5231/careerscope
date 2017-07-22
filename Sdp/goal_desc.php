<?php
//php code to enter the description into the database for each goal created by the teacher
session_start();

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }

//Db connection code
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

$comment=@$_POST['desc'];
$goal = $_SESSION['goal_type'];
$email=$_SESSION['user'][0];
$user = $_SESSION['user'][1];
$sql1 = "Update Goal_Assigned set notify = 1 where email like '$email'";
$sql2 = "Insert into goal_type values('$goal','$comment')";

$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);

if($res1 && $res2)
{
	echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('Goal Type $goal was Successfully Added by $user');
    window.location.href='../lecturerindex.php';</SCRIPT>";
	/*include "../lecturerindex.php";
	echo '<div class="alert alert-success"><strong>Success!</strong>The goal'.$goal.' was added by'.$user.'</div>';*/
}
else
{
	echo "Error";
}
?>