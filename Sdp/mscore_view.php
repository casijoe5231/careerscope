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
$email=$_SESSION['user'][0];
$sql1="select * from goals_completed where email='$email' and goal_id='$Id'";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
$count=mysqli_num_rows($res1);
// Run the Query
//echo $Id;echo $count;
 $data2 = mysqli_fetch_array($res1);
 
if($goal_type === 'Specific')
{
	$sql3 = "select * from goalm_specific where goal_id='$Id'";
	$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
	$data3 = mysqli_fetch_array($res3);
}
elseif($goal_type === 'Measurable')
{
	$sql3 = "select * from goalm_measure where goal_id='$Id'";
	$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
	$data3 = mysqli_fetch_array($res3);
}
elseif($goal_type === 'Ambitious')
{
	$sql3 = "select * from goalm_ambitious where goal_id='$Id'";
	$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
	$data3 = mysqli_fetch_array($res3);
}
elseif($goal_type === 'Realistic')
{
	$sql3 = "select * from goalm_realistic where goal_id='$Id'";
	$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
	$data3 = mysqli_fetch_array($res3);
}
elseif($goal_type === 'Timebased')
{
	$sql3 = "select * from goalm_timebased where goal_id='$Id'";
	$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
	$data3 = mysqli_fetch_array($res3);
}
else
{
	$sql3 = "select * from goalm_other where goal_id='$Id'";
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
		if($data2[mentor_eval]==='Yes')
		{
			echo '<strong>Goal ID:</strong>'.$data3[goal_id].'<br>
	   <strong>Mentor Score:</strong>'; if($goal_type==='Specific' or $goal_type==='Measurable' or $goal_type==='Timebased'){echo $data3[mscore].'/10';}elseif($goal_type==='Ambitious' or $goal_type==='Realistic'){echo $data3[mscore].'/15';}else{echo $data3[mscore].'/10';}
	    echo '<br>';
	   if($goal_type==='Specific')
	   {
	   	echo '<strong>Note:</strong>The above score was allocated by the Mentor Chosen, Break up for the same is as follows,<br>
	   <strong>Goal Completion on time: </strong>'.$data3[yesno].' Mark <br>
	   <strong>Bridging Gap Between Syllabus: </strong>'.$data3[syll_gap].' Mark <br>
	   <strong>Student was Interested: </strong>'.$data3[interest].' Mark <br>
	   <strong>Goal Objectives are achieved: </strong>'.$data3[achieve].' Mark <br>
	   <strong>Student was Regular: </strong>'.$data3[regular].' Mark <br>
	   <hr>
	   <strong>Mentor Name: </strong>'.$data3[mentor_name].'<br>
	   <strong>Mentor Email: </strong>'.$data3[mentor_email].'<br>
	   <strong>Feedback from Mentor:</strong>'.$data3[feedback].'<br>';
	   }
	 elseif($goal_type==='Measurable')
	 {
	 	echo '<strong>Note:</strong>The above score was allocated by the Mentor Chosen, Break up for the same is as follows,<br>
	   <strong>Goal Completion on time: </strong>'.$data3[yesno].' Mark <br>
	   <strong>Students Learning Curve: </strong>'.$data3[learn].' Mark <br>
	   <strong>Time allocation made it Challenging: </strong>'.$data3[time].' Mark <br>
	   <strong>Students Performance has improved: </strong>'.$data3[marks].' Mark <br>
	   <strong>Student was Regular: </strong>'.$data3[regular].' Mark <br>
	   <hr>
	   <strong>Mentor Name: </strong>'.$data3[mentor_name].'<br>
	   <strong>Mentor Email: </strong>'.$data3[mentor_email].'<br>
	   <strong>Feedback from Mentor:</strong>'.$data3[feedback].'<br>';
	 }
	 elseif($goal_type==='Ambitious')
	 {
	 	echo '<strong>Note:</strong>The above score was allocated by the Mentor Chosen, Break up for the same is as follows,<br>
	   <strong>Goal Completion on time: </strong>'.$data3[yesno].' Mark <br>
	   <strong>Bridging Gap between Syllabus: </strong>'.$data3[gap].' Mark <br>
	   <strong>Skills gained outside Curriculum: </strong>'.$data3[skill].' Mark <br>
	   <strong>Goal was Challenging: </strong>'.$data3[challenge].' Mark <br>
	   <strong>Student can take up Industry Projects: </strong>'.$data3[project].' Mark <br>
	   <strong>Developed Entrepreneurship skills: </strong>'.$data3[enter].' Mark <br>
	   <strong>Prepares Student for Higher Education: </strong>'.$data3[study].' Mark <br>
	   <hr>
	   <strong>Mentor Name: </strong>'.$data3[mentor_name].'<br>
	   <strong>Mentor Email: </strong>'.$data3[mentor_email].'<br>
	   <strong>Feedback from Mentor:</strong>'.$data3[feedback].'<br>';
	 }
	  elseif($goal_type==='Realistic')
	 {
	 	echo '<strong>Note:</strong>The above score was allocated by the Mentor Chosen, Break up for the same is as follows,<br>
	   <strong>Goal Completion on time: </strong>'.$data3[yesno].' Mark <br>
	   <strong>Goal was Challenging: </strong>'.$data3[challenge].' Mark <br>
	   <strong>Made Student Think out of the Box: </strong>'.$data3[box].' Mark <br>
	   <strong>Prepares for Placements: </strong>'.$data3[place].' Mark <br>
	   <strong>Helps with Curriculum: </strong>'.$data3[help].' Mark <br>
	   <strong>Gained Industry Level Skills: </strong>'.$data3[skill].' Mark <br>
	   <strong>Prepares Student for Higher Education: </strong>'.$data3[study].' Mark <br>
	   <hr>
	   <strong>Mentor Name: </strong>'.$data3[mentor_name].'<br>
	   <strong>Mentor Email: </strong>'.$data3[mentor_email].'<br>
	   <strong>Feedback from Mentor:</strong>'.$data3[feedback].'<br>';
	 }
	 elseif($goal_type==='Timebased')
	 {
	 	echo '<strong>Note:</strong>The above score was allocated by the Mentor Chosen, Break up for the same is as follows,<br>
	   <strong>Goal Completion on time: </strong>'.$data3[yesno].' Mark <br>
	   <strong>Goal was Completed well in advance: </strong>'.$data3[exact].' Mark <br>
	   <strong>Time allocated was too much?: </strong>'.$data3[time].' Mark <br>
	   <strong>Student was Regular: </strong>'.$data3[regular].' Mark <br>
	   <strong>Student was able to Manage time well: </strong>'.$data3[manage].' Mark <br>
	   <hr>
	   <strong>Mentor Name: </strong>'.$data3[mentor_name].'<br>
	   <strong>Mentor Email: </strong>'.$data3[mentor_email].'<br>
	   <strong>Feedback from Mentor:</strong>'.$data3[feedback].'<br>';
	 }
	 else
	 {
	 	echo '<strong>Note:</strong>The above score was allocated by the Mentor Chosen, Break up for the same is as follows,<br>
	   <strong>Goal Completion on time: </strong>'.$data3[ontime].' Mark <br>
	   <strong>Student was regular with weekly updates: </strong>'.$data3[regular].' Mark <br>
	   <strong>Bridging Gap in Syllabus: </strong>'.$data3[gap].' Mark <br>
	   <strong>Prepares student for higher education: </strong>'.$data3[education].' Mark <br>
	   <strong>Student\'s Performance has improved after goal completion: </strong>'.$data3[marks].' Mark <br>
	   <strong>Assists student in campus placement: </strong>'.$data3[place].' Mark <br>
	   <hr>
	   <strong>Mentor Name: </strong>'.$data3[mentor_name].'<br>
	   <strong>Mentor Email: </strong>'.$data3[mentor_email].'<br>
	   <strong>Feedback from Mentor:</strong>'.$data3[feedback].'<br>';
	 }
		}
		else {
			echo 'Evaluate the Goal by Mentor to Get Score';
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