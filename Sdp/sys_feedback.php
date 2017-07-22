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
$goal_type = $_GET["type"];
if($goal_type==='Specific') 
{
	$goal_type='Specific';
}
elseif($goal_type==='Measurable')
{
	$goal_type='Measurable';
}
elseif($goal_type==='Timebased')
{
	$goal_type='Timebased';
}
elseif($goal_type==='Ambitious')
{
	$goal_type='Ambitious';
}
elseif($goal_type==='Realistic')
{
	$goal_type='Realistic';
}
else 
{
	$goal_type='Other';
}
$email=$_SESSION['user'][0];
$sql1="select * from goals_completed where email='$email' and goal_id='$Id'";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
$count=mysqli_num_rows($res1);
// Run the Query
//echo $Id;echo $count;
 $data2 = mysqli_fetch_array($res1);
 
if($goal_type === 'Specific')
{
	$sql3 = "select * from goal_specific where goal_id='$Id'";
	$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
	$data3 = mysqli_fetch_array($res3);
}
elseif($goal_type === 'Measurable')
{
	$sql3 = "select * from goal_measurable where goal_id='$Id'";
	$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
	$data3 = mysqli_fetch_array($res3);
}
elseif($goal_type === 'Ambitious')
{
	$sql3 = "select * from goal_ambitious where goal_id='$Id'";
	$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
	$data3 = mysqli_fetch_array($res3);
}
elseif($goal_type === 'Realistic')
{
	$sql3 = "select * from goal_realistic where goal_id='$Id'";
	$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
	$data3 = mysqli_fetch_array($res3);
}
elseif($goal_type === 'Timebased')
{
	$sql3 = "select * from goal_timebased where goal_id='$Id'";
	$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
	$data3 = mysqli_fetch_array($res3);
}
else
{
	$sql3 = "select * from  goal_other where goal_id='$Id'";
	$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
	$data3 = mysqli_fetch_array($res3);
}
?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><center><?php $user_name = $_SESSION['user'][1]; echo "$user_name";echo "'s Goal" ?></center></h4>
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
      <!--<strong>Goal Type:</strong> <?php echo $data2[goal_type]?><br>
      <strong>Date Created:</strong> <?php echo $data2[date_created]?><br>
      <strong>Deadline:</strong> <?php echo $data2[deadline]?><br>
      <strong>Date Completed:</strong> <?php echo $data2[date_completed]?><br>
	   <strong>Action Plan:</strong> <?php echo $data2[action_plan]?> <br>
	   <strong>Revived Status:</strong> <?php echo $data2[revive_stat]?> <br>
	   <strong>Revived On:</strong> <?php echo $data2[revive_date]?> <br>
	   <strong>No of Weekly Updates:</strong> <?php echo $data2[no_weekly_updates]?> <br>
	   <strong>Evidence Status:</strong> <?php echo $data2[evidence_stat]?> <br>
	   <strong>Whether Self Evaluated:</strong> <?php echo $data2[self_eval]?> <br>
	   <strong>Whether Mentor Evaluated:</strong> <?php echo $data2[mentor_eval]?> <br>-->
		<?php 
		if($data2[self_eval]==='Yes')
		{
			echo '<strong>Goal ID:</strong>'.$data3[goal_id].'<br>
	   <strong>Self Eval Score:</strong>'; if($goal_type==='Specific' or $goal_type==='Measurable' or $goal_type==='Timebased'){echo $data3[user_score].'/10';}elseif($goal_type==='Ambitious' or $goal_type==='Realistic'){echo $data3[user_score].'/15';}else{echo $data3[user_score].'/10';}
	   echo '<br>
	   <strong>System Score:</strong>'; if($goal_type==='Specific' or $goal_type==='Measurable' or $goal_type==='Timebased'){echo $data3[sys_score].'/10';}elseif($goal_type==='Ambitious' or $goal_type==='Realistic'){echo $data3[sys_score].'/15';}else{echo $data3[sys_score].'/10';}
	    echo '<br>
	   <strong>Note:</strong>The above system score has been calculated by system based on parameters like:<br> Whether Goal has been updated (Minus points if updated)<br> Time of Completion <br> Goal Revive Status (Minus Points if Revived)<br>
	   Self Score is according to Student given input<br>
	   <strong>Comment:</strong>'.$data3[system_comment].'<br>
	   <strong>Evaluation Date Time:</strong>'.$data3[date_eval].'<br>';
		}
		else {
			echo 'Self Evaluate the Goal to Get System Feedback';
		}
		?>
	   
	  </div>
    </div>
   
</div>
<div class="modal-footer">
   <!-- <button type="button" class="btn btn-default">Submit</button>-->
    <button type="button" onclick="location.href='eval_view.php'" class="btn btn-danger" data-dismiss="modal">Close</button>
	
</div>
</body>
</html>