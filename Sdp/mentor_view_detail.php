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

//Connection Code ends

$Id = $_GET["id"]; //escape the string if you like
$email=$_SESSION['user'][0];

$sql1="select * from goals_completed where goal_id='$Id'";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
$count=mysqli_num_rows($res1);
// Run the Query
//echo $Id;echo $count;
 $data2 = mysqli_fetch_array($res1);
?>
<!DOCTYPE html>
<html>
<body>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><center><?php $user_name = $_SESSION['user'][1]; echo "Goal Details" ?></center></h4>
</div>
<div class="modal-body">
   
<div class="panel panel-primary">
      <div class="panel-heading"><?php echo $data2[title]?></div>
      <div class="panel-body">
	  <strong>Action Plan:</strong> <?php echo $data2[action_plan]?> <br>
	  <strong>Goal Type:</strong> <?php echo $data2[goal_type]?><br>
	  <strong>Frequency of Reminders:</strong> <?php echo $data2[frequency]?> <br>
	  <strong>Deadline:</strong> <?php echo $data2[deadline]?><br>
	  <strong>Date Created:</strong> <?php echo $data2[date_created]?> <br>
	  <strong>Date Achieved:</strong> <?php echo $data2[date_completed]?> <br>
	  <strong>No of Reports Submitted:</strong> <?php echo $data2[no_weekly_updates]?> <br>
	  <strong>Evidence Status:</strong> <?php echo $data2[evidence_stat]?> 
	  </div>
    </div>
   
</div>
<div class="modal-footer">
   <!-- <button type="button" class="btn btn-default">Submit</button>-->
    <button type="button" onclick="location.href='mentor_request.php'" class="btn btn-danger" data-dismiss="modal">Close</button>
	
</div>
</body>
</html>