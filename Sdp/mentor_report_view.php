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
$report_id=$_GET["r_id"];
$goal_id=$_SESSION["goal_id"];
//$_SESSION["gol_id"] = $goal_id;
$email=$_SESSION['user'][0];
$sql1="select * from goal_report where report_id='$report_id'";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
$count=mysqli_num_rows($res1);
// Run the Query
//echo $Id;echo $count;
$data2 = mysqli_fetch_array($res1);
//echo$time; echo $goal_id;
?>
<!-- ----------------->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><center><?php echo " Report for $data2[title]";?></center></h4>
</div>
<div class="modal-body">
   
<div class="panel panel-primary">
      <div class="panel-heading"><?php echo $data2[sub_task]?></div>
      <div class="panel-body">
	  <strong>Report:</strong> <?php echo $data2[report]?> <br>
	  
	  </div>
    </div>
   
</div>
<div class="modal-footer">
   <!-- <button type="button" class="btn btn-default">Submit</button>-->
    <button type="button" onclick="location.href='mentor_view_report.php'" class="btn btn-danger" data-dismiss="modal">Close</button>
	
</div>
<!-------------->

</body>
</html>