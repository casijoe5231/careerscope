<html>

<body>
<?php
//Include database connection here
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
$_SESSION["goal_id"] = $Id;
$email=$_SESSION['user'][0];
$sql1="select * from goal_list where email='$email'and goal_id='$Id'";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
$count=mysqli_num_rows($res1);
// Run the Query
//echo $Id;echo $count;
 $data2 = mysqli_fetch_array($res1);
?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><center>Actually Delete the Goal?</center></h4>
</div>
<div class="modal-body">
   
   
<!--<form>
  Goal Title: <input type="text" value="<?php echo $data2[title]?>"/> </br>
  Action Plan: <input type="text" value="<?php echo $data2[action_plan]?>"/> </br>
  Deadline: <input type="text" value="<?php echo $data2[deadline]?>"/>
   Frequency of Reminders: <input type="text" value="<?php echo $data2[frequency]?>"/> </br>
 Goal Type: <input type="text" value="<?php echo $data2[goal_type]?>"/> </br>
  
</form>   -->
<div class="panel panel-primary">
      <div class="panel-heading"><?php echo $data2[title]?></div>
      <div class="panel-body">
	  <strong>Action Plan:</strong> <?php echo $data2[action_plan]?> <br>
	  <strong>Goal Type:</strong> <?php echo $data2[goal_type]?><br>
	  <strong>Frequency of Reminders:</strong> <?php echo $data2[frequency]?> <br>
	  <strong>Deadline:</strong> <?php echo $data2[deadline]?> 
	  
	  </div>
    </div>
   
</div>
<div class="modal-footer">
   <!-- <button type="button" class="btn btn-default">Submit</button>-->
   <button type="button" onclick="location.href='delete.php'" class="btn btn-danger" data-dismiss="modal">Yes</button>
    <button type="button" onclick="location.href='sdp_delete.php'" class="btn btn-primary" data-dismiss="modal">Close</button>
	
</div>
</body>
</html>