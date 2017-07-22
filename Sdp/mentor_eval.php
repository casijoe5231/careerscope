<!DOCTYPE html>
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
$request_id=$_GET["req_id"];
$teacher=$_GET["teacher"];
$email=$_SESSION['user'][0];
$user=$_SESSION['user'][1];
//echo $goal_id;
//Connection Code ends
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="images/favicon.ico" rel="shortcut icon"/>
<title>EYB | Mentor Evaluation</title>
<!--  CSS  -->
<link rel="stylesheet" type="text/css" href="../css/logo.css">
    <link rel="stylesheet" type="text/css" href="../css/sdp_edit_border.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link rel='stylesheet' id='camera-css'  href='../css/camera.css' type='text/css' media='all'>
    <link rel="stylesheet" type="text/css" href="../css/carousel.css">
    <link rel="stylesheet" type="text/css" href="../css/slicknav.css">
    <link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main
    stylesheet"charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet'             type='text/css'>
<!-- Bootstrap -->
<link rel="stylesheet" href="css_modal/bootstrap.css">
<link rel="stylesheet" href="css_modal/style1.css">
</head>
<body>
<script>
$('label').tooltip({
    placement : 'bottom'
});
</script>
<style>
div.polaroid {
  width: 720px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
div.detail{
	width: 620px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>

<!-- Form Style-->
<style type='text/css'>
.fieldset{
padding:10px;

line-height:1.8;
border: 1px solid #781351;
}
</style>
<!-- Form Style ends -->
<!--header Style -->
<style>
.headerLine{
    position: relative;
    width: 102%;
    
    height:22%;
    background: url(../images/bgTop.jpg) center center no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
</style>
<!-- header style ends here-->
<!--header starts-->
		 <div style="margin-bottom:10px;" id="home" >
            <div class="headerLine">
                <div id="menuF" class="default" style="margin-bottom:25px;">
                    <div class="container">
                        <div class="row">
                            <div class="logo col-md-2">
                                <div>
                                    <a href="#">
                                        <img src="../images/byblogo.png" width="120" height="120">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-10">
                                	<div class="navmenu"style="text-align: center;">
						                <ul id="menu">
                                            <li><a href=""></a></li>
                                            <li><a href="#" target=""></a></li>
                                            <li><a href="#" target=""></a></li>
                                            <li><a href="#" target=""></a></li>
                                            <!--<li class="last"><a href="#contact">Contact</a></li>
                                            li><a href="#features">Features</a></li-->
                                        </ul>
					               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--   /Header     -->
<!-- NAme of user-->
<div class="container">

    <div style="padding:10px;" class="panel panel-default">
    <div class="row">
        <div class="col-sm-3">
            <h5>Welcome <?php echo $_SESSION['user'][1]; ?>,</h5>
        </div>
        <div class="col-sm-7">
            
        </div>
		<div class="col-sm-1">
                     <a class="btn btn-default btn-block" href="../lecturerindex.php">Home</a>
		</div>
        <div class="col-sm-1">
            <span><a class="btn btn-default" href="../logout.php">Logout</a></span>
        </div>
        
    </div>
</div>
</div>
<!-- Name of user ends-->
<!-- Body Starts here-->
<?php
$sql00="select * from goal_mentor_request where request_id IN('$request_id')";
$res00=mysqli_query($GLOBALS["___mysqli_ston"], $sql00);
$row00=mysqli_fetch_array($res00);
//echo $row00['goal_id'];

$sql1="select * from goals_completed where goal_id IN('$row00[goal_id]')";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
$row1=mysqli_fetch_array($res1);

$goal_type=$row1[goal_type];

if($goal_type === 'Specific')
{
	echo $row1[goal_type];
	$output = strtotime("$row1[date_created]");
	$duration=$output - $row1[deadline];
	echo '<div class="container-fluid"><div class="row" style="margin-left:62px;"><div class="col-md-7 polaroid" style="padding-bottom:20px;"><center><h2>Rate Goal "'.$row1[title].'"</h2></center>
	<form class="fieldset" method="post" action="meval_specific.php?id='.$row00[goal_id].'&request_id='.$request_id.'">
	<div class="form-group radio row inline">
	<p><strong>Was the Goal Achieved on Time?</strong></p>
	<label title="2 Mark">
    <input title="2 Mark" type="radio" name="yesno" id="optionsRadios1" value="Yes" required>Yes</label>
	<label title="0 Mark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input title="0 Mark" type="radio" name="yesno" id="optionsRadios1" value="No">No</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Is it bridging the Gap between Syllabus?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="gap" id="optionsRadios1" value="Yes" required>Yes, in all aspects</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="gap" id="optionsRadios1" value="Some">Up to some Extent</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="gap" id="optionsRadios1" value="No">No, in no way</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>How Interested was the student throughout the entire goal achieving phase?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="interest" id="optionsRadios1" value="High" required>Highly Interested</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="interest" id="optionsRadios1" value="little">Average</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="interest" id="optionsRadios1" value="Not">Shown Less Interest</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Although the goal was completed on time, has the student achieved the stated title?</strong></p>
	<label title="2 Mark">
    <input title="2 Mark" type="radio" name="title" id="optionsRadios1" value="Yes" required>Yes</label>
	<label title="1 Mark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input title="1 Mark" type="radio" name="title" id="optionsRadios1" value="No">No</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Was the Student regular in providing weekly updates?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="regular" id="optionsRadios1" value="Yes" required>Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="regular" id="optionsRadios1" value="Some">Sometimes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="regular" id="optionsRadios1" value="No">Not Regular</label>
	</div><hr>
	<div class="form-group">
	<label for="exampleTextarea">Feedback: On how '.$row00[stud_name].' can still improve further (Example: Any other Courses to take up)</label>
    <textarea name ="feedback"class="form-control" id="exampleTextarea" rows="3" required=""></textarea>
	</div>
	<center><button type="submit" class="btn btn-primary">Submit</button></center>
	</form>
	</div><div class="col-md-5" style="margin-left:20px;">
	<div class="list-group">
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Details of Goal '.$row1[title].'</h4></center>
    <p class="list-group-item-text">
	<strong>Goal ID</strong>: '.$row1[goal_id].'<br>
	<strong>Student Name</strong>: '.$row00[stud_name].'<br>
	<strong>Student Email</strong>: '.$row1[email].'<br>
	<strong>Goal Title</strong>: '.$row1[title].'<br>
	<strong>Goal Type</strong>: '.$row1[goal_type].'<br>
	<strong>Revive Status</strong>: '.$row1[revive_stat].'<br>
	<strong>Revive Date</strong>: '.$row1[revive_date].'<br>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Action Plan</h4></center>
    <p class="list-group-item-text">
	<strong>Action Plan</strong>: '.$row1[action_plan].'<br>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Timming Details</h4></center>
    <p class="list-group-item-text">
	<strong>Date Created</strong>: '.$row1[date_created].'<br>
	<strong>Deadline</strong>: '.$row1[deadline].'<br>
	<strong>Date Completed</strong>: '.$row1[date_completed].'<br>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Goal Progress Content</h4></center>
    <p class="list-group-item-text">
	<center><a href="mentor_view_report.php?id='.$row1['goal_id'].'" class="btn btn-info" role="button" target="_blank" title="View Weekly Reports Submitted for '.$row1['title'].'" role="button">View Reports Submitted</a>
	<a target="_blank" href="mentor_view_evidence.php?id='.$row1['goal_id'].'&stud_name='.$row00[stud_name].'" class="btn btn-success" role="button">View Submitted Evidence</a></center>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Mentor Details</h4></center>
    <p class="list-group-item-text">
	<strong>Request ID</strong>: '.$row1[request_id].'<br>
	<strong>Mentor Name</strong>: '.$row1[mentor_name].'<br>
	<strong>Mentor Email</strong>: '.$row1[mentor_email].'<br>
	</p>
	</div></div>
	</div></div></div>';
}
elseif($goal_type === 'Measurable')
{
	echo $row1[goal_type];
	echo '<div class="container-fluid"><div class="row" style="margin-left:62px;"><div class="col-md-7 polaroid" style="padding-bottom:20px;"><center><h2>Rate Goal "'.$row1[title].'"</h2></center>
	<form class="fieldset" method="post" action="meval_measure.php?id='.$row00[goal_id].'&request_id='.$request_id.'">
	<div class="form-group radio row inline">
	<p><strong>Was the Goal Achieved on Time?</strong></p>
	<label title="2 Mark">
    <input title="2 Mark" type="radio" name="yesno" id="optionsRadios1" value="Yes" required>Yes</label>
	<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="yesno" id="optionsRadios1" value="No">No</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>How much has the student learned by achieving this goal?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="learn" id="optionsRadios1" value="Lot" required>Tremendous Amount</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="2 Mark" type="radio" name="learn" id="optionsRadios1" value="little">Average</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="2 Mark" type="radio" name="learn" id="optionsRadios1" value="Not">Just a Little</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Could the Goal have been Completed in a much shorter Duration?</strong></p>
	<label title="0 Mark"><input title="0 Mark" type="radio" name="time" id="optionsRadios1" value="Yes" required>Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="time" id="optionsRadios1" value="Ok">No, Duration Alotted was Appropriate</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="2 Mark"><input title="2 Mark" type="radio" name="time" id="optionsRadios1" value="No">Time Duration was Short which made the Task Challenging</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Students Performance is clearly visible through marks obtained?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="marks" id="optionsRadios1" value="Yes" required>Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="marks" id="optionsRadios1" value="Ok">Average Performance</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="marks" id="optionsRadios1" value="No">Just Satisfactory</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Was the Student regular in providing weekly updates?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="regular" id="optionsRadios1" value="Yes" required>Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="regular" id="optionsRadios1" value="Some">Sometimes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="regular" id="optionsRadios1" value="No">Not Regular</label>
	</div><hr>
	<div class="form-group">
	<label for="exampleTextarea">Feedback: On how '.$row00[stud_name].' can still improve further (Example: Any other Courses to take up)</label>
    <textarea name ="feedback"class="form-control" id="exampleTextarea" rows="3" required=""></textarea>
	</div>
	<center><button type="submit" class="btn btn-primary">Submit</button></center>
	</form>
	</div><div class="col-md-5" style="margin-left:20px;">
	<div class="list-group">
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Details of Goal '.$row1[title].'</h4></center>
    <p class="list-group-item-text">
	<strong>Goal ID</strong>: '.$row1[goal_id].'<br>
	<strong>Student Name</strong>: '.$row00[stud_name].'<br>
	<strong>Student Email</strong>: '.$row1[email].'<br>
	<strong>Goal Title</strong>: '.$row1[title].'<br>
	<strong>Goal Type</strong>: '.$row1[goal_type].'<br>
	<strong>Revive Status</strong>: '.$row1[revive_stat].'<br>
	<strong>Revive Date</strong>: '.$row1[revive_date].'<br>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Action Plan</h4></center>
    <p class="list-group-item-text">
	<strong>Action Plan</strong>: '.$row1[action_plan].'<br>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Timming Details</h4></center>
    <p class="list-group-item-text">
	<strong>Date Created</strong>: '.$row1[date_created].'<br>
	<strong>Deadline</strong>: '.$row1[deadline].'<br>
	<strong>Date Completed</strong>: '.$row1[date_completed].'<br>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Goal Progress Content</h4></center>
    <p class="list-group-item-text">
	<center><a href="mentor_view_report.php?id='.$row1['goal_id'].'" class="btn btn-info" role="button" target="_blank" title="View Weekly Reports Submitted for '.$row1['title'].'" role="button">View Reports Submitted</a>
	<a target="_blank" href="mentor_view_evidence.php?id='.$row1['goal_id'].'&stud_name='.$row00[stud_name].'" class="btn btn-success" role="button">View Submitted Evidence</a></center>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Mentor Details</h4></center>
    <p class="list-group-item-text">
	<strong>Request ID</strong>: '.$row1[request_id].'<br>
	<strong>Mentor Name</strong>: '.$row1[mentor_name].'<br>
	<strong>Mentor Email</strong>: '.$row1[mentor_email].'<br>
	</p>
	</div></div>
	</div></div></div>';
}
elseif($goal_type === 'Ambitious')
{
	echo $row1[goal_type];
	echo '<div class="container-fluid"><div class="row" style="margin-left:62px;"><div class="col-md-7 polaroid" style="padding-bottom:20px;"><center><h2>Rate Goal "'.$row1[title].'"</h2></center>
	<form class="fieldset" method="post" action="meval_ambitious.php?id='.$row00[goal_id].'&request_id='.$request_id.'">
	<div class="form-group radio row inline">
	<p><strong>Was the Goal Achieved on Time?</strong></p>
	<label title="2 Mark">
    <input title="2 Mark" type="radio" name="yesno" id="optionsRadios1" value="2" required>Yes</label>
	<label title="0 Mark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input title="0 Mark" type="radio" name="yesno" id="optionsRadios1" value="0">No</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Is it bridging the Gap between Syllabus?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="gap" id="optionsRadios1" value="2" required>Yes, in all aspects</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="gap" id="optionsRadios1" value="1">Up to some Extent</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="gap" id="optionsRadios1" value="0">No, in no way</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Were skills gained outside curriculum?</strong></p>
	<label title="2 Mark">
    <input title="2 Mark" type="radio" name="skill" id="optionsRadios1" value="2" required>Yes</label>
	<label title="0 Mark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input title="0 Mark" type="radio" name="skill" id="optionsRadios1" value="0">No</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Was the Goal Challenging?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="challenge" id="optionsRadios1" value="2" required>Yes, Very much</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="challenge" id="optionsRadios1" value="1">Average Level</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="challenge" id="optionsRadios1" value="0">Not at all</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Student is capable of taking up real time projects by applying the knowledge learned?</strong></p>
	<label title="3 Mark"><input title="3 Mark" type="radio" name="project" id="optionsRadios1" value="3" required>Yes, with ease</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="2 Mark"><input title="2 Mark" type="radio" name="project" id="optionsRadios1" value="2">Quite Capable</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="project" id="optionsRadios1" value="1">Can atleast try</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Is it developing Entrepreneurship skills?</strong></p>
	<label title="2 Mark">
    <input title="2 Mark" type="radio" name="enter" id="optionsRadios1" value="Yes" required>Yes</label>
	<label title="0 Mark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input title="0 Mark" type="radio" name="enter" id="optionsRadios1" value="0">No</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Prepares one for Higher Educations?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="study" id="optionsRadios1" value="2" required>Yes, in all aspects</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark"type="radio" name="study" id="optionsRadios1" value="1">In a Moderate way</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="study" id="optionsRadios1" value="0">Not applicable</label>
	</div><hr>
	<div class="form-group">
	<label for="exampleTextarea">Feedback: On how '.$row00[stud_name].' can still improve further (Example: Any other Courses to take up)</label>
    <textarea name ="feedback"class="form-control" id="exampleTextarea" rows="3" required=""></textarea>
	</div>
	<center><button type="submit" class="btn btn-primary">Submit</button></center>
	</form>
	</div><div class="col-md-5" style="margin-left:20px;">
	<div class="list-group">
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Details of Goal '.$row1[title].'</h4></center>
    <p class="list-group-item-text">
	<strong>Goal ID</strong>: '.$row1[goal_id].'<br>
	<strong>Student Name</strong>: '.$row00[stud_name].'<br>
	<strong>Student Email</strong>: '.$row1[email].'<br>
	<strong>Goal Title</strong>: '.$row1[title].'<br>
	<strong>Goal Type</strong>: '.$row1[goal_type].'<br>
	<strong>Revive Status</strong>: '.$row1[revive_stat].'<br>
	<strong>Revive Date</strong>: '.$row1[revive_date].'<br>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Action Plan</h4></center>
    <p class="list-group-item-text">
	<strong>Action Plan</strong>: '.$row1[action_plan].'<br>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Timming Details</h4></center>
    <p class="list-group-item-text">
	<strong>Date Created</strong>: '.$row1[date_created].'<br>
	<strong>Deadline</strong>: '.$row1[deadline].'<br>
	<strong>Date Completed</strong>: '.$row1[date_completed].'<br>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Goal Progress Content</h4></center>
    <p class="list-group-item-text">
	<center><a href="mentor_view_report.php?id='.$row1['goal_id'].'" class="btn btn-info" role="button" target="_blank" title="View Weekly Reports Submitted for '.$row1['title'].'" role="button">View Reports Submitted</a>
	<a target="_blank" href="mentor_view_evidence.php?id='.$row1['goal_id'].'&stud_name='.$row00[stud_name].'" class="btn btn-success" role="button">View Submitted Evidence</a></center>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Mentor Details</h4></center>
    <p class="list-group-item-text">
	<strong>Request ID</strong>: '.$row1[request_id].'<br>
	<strong>Mentor Name</strong>: '.$row1[mentor_name].'<br>
	<strong>Mentor Email</strong>: '.$row1[mentor_email].'<br>
	</p>
	</div></div>
	</div></div></div>';
}
elseif($goal_type === 'Realistic')
{
	echo $row1[goal_type];
	echo '<div class="container-fluid"><div class="row" style="margin-left:62px;"><div class="col-md-7 polaroid" style="padding-bottom:20px;"><center><h2>Rate Goal "'.$row1[title].'"</h2></center>
	<form class="fieldset" method="post" action="meval_realistic.php?id='.$row00[goal_id].'&request_id='.$request_id.'">
	<div class="form-group radio row inline">
	<p><strong>Was the Goal Achieved on Time?</strong></p>
	<label title="2 Mark">
    <input title="2 Mark" type="radio" name="yesno" id="optionsRadios1" value="2" required>Yes</label>
	<label title="0 Mark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input title="0 Mark" type="radio" name="yesno" id="optionsRadios1" value="0">No</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Chalenges the Students Ability?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="challenge" id="optionsRadios1" value="2" required>Yes, Very much</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="challenge" id="optionsRadios1" value="1">Average Level</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="challenge" id="optionsRadios1" value="0">Just a Little</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Made the Student think out of tha box?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="box" id="optionsRadios1" value="2" required>Yes, in all aspects</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="box" id="optionsRadios1" value="1">In a Moderate way</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="box" id="optionsRadios1" value="0">Not applicable</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Prepares one Campus Placement?</strong></p>
	<label title="3 Mark"><input title="3 Mark" type="radio" name="place" id="optionsRadios1" value="3" required>Yes, in all aspects</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="2 Mark"><input title="2 Mark" type="radio" name="place" id="optionsRadios1" value="2">In a Moderate way</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="place" id="optionsRadios1" value="1">Just a bit</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Assists the Student in coping with curriculumn?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="help" id="optionsRadios1" value="2" required>Yes, very much</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="help" id="optionsRadios1" value="1">Moderately</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="help" id="optionsRadios1" value="0">Up to some extent</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Student gained Skills outside curriculumn?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="skill" id="optionsRadios1" value="2" required>Yes, a whole bunch</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="skill" id="optionsRadios1" value="1">Moderate Level</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="skill" id="optionsRadios1" value="0">Up to some extent</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Prepares one for Higher Educations?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="study" id="optionsRadios1" value="2" required>Yes, in all aspects</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="study" id="optionsRadios1" value="1">In a Moderate way</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="study" id="optionsRadios1" value="0">Not applicable</label>
	</div><hr>
	<div class="form-group">
	<label for="exampleTextarea">Feedback: On how '.$row00[stud_name].' can still improve further (Example: Any other Courses to take up)</label>
    <textarea name ="feedback"class="form-control" id="exampleTextarea" rows="3" required=""></textarea>
	</div>
	<center><button type="submit" class="btn btn-primary">Submit</button></center>
	</form>
	</div><div class="col-md-5" style="margin-left:20px;">
	<div class="list-group">
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Details of Goal '.$row1[title].'</h4></center>
    <p class="list-group-item-text">
	<strong>Goal ID</strong>: '.$row1[goal_id].'<br>
	<strong>Student Name</strong>: '.$row00[stud_name].'<br>
	<strong>Student Email</strong>: '.$row1[email].'<br>
	<strong>Goal Title</strong>: '.$row1[title].'<br>
	<strong>Goal Type</strong>: '.$row1[goal_type].'<br>
	<strong>Revive Status</strong>: '.$row1[revive_stat].'<br>
	<strong>Revive Date</strong>: '.$row1[revive_date].'<br>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Action Plan</h4></center>
    <p class="list-group-item-text">
	<strong>Action Plan</strong>: '.$row1[action_plan].'<br>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Timming Details</h4></center>
    <p class="list-group-item-text">
	<strong>Date Created</strong>: '.$row1[date_created].'<br>
	<strong>Deadline</strong>: '.$row1[deadline].'<br>
	<strong>Date Completed</strong>: '.$row1[date_completed].'<br>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Goal Progress Content</h4></center>
    <p class="list-group-item-text">
	<center><a href="mentor_view_report.php?id='.$row1['goal_id'].'" class="btn btn-info" role="button" target="_blank" title="View Weekly Reports Submitted for '.$row1['title'].'" role="button">View Reports Submitted</a>
	<a target="_blank" href="mentor_view_evidence.php?id='.$row1['goal_id'].'&stud_name='.$row00[stud_name].'" class="btn btn-success" role="button">View Submitted Evidence</a></center>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Mentor Details</h4></center>
    <p class="list-group-item-text">
	<strong>Request ID</strong>: '.$row1[request_id].'<br>
	<strong>Mentor Name</strong>: '.$row1[mentor_name].'<br>
	<strong>Mentor Email</strong>: '.$row1[mentor_email].'<br>
	</p>
	</div></div>
	</div></div></div>';
}
elseif($goal_type === 'Timebased')
{
	echo $row1[goal_type];
	echo '<div class="container-fluid"><div class="row" style="margin-left:62px;"><div class="col-md-7 polaroid" style="padding-bottom:20px;"><center><h2>Rate Goal "'.$row1[title].'"</h2></center>
	<form class="fieldset" method="post" action="meval_timebased.php?id='.$row00[goal_id].'&request_id='.$request_id.'">
	<div class="form-group radio row inline">
	<p><strong>Was the Goal Achieved on Time?</strong></p>
	<label title="2 Mark">
    <input title="2 Mark" type="radio" name="yesno" id="optionsRadios1" value="2" required>Yes</label>
	<label title="0 Mark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input title="0 Mark" type="radio" name="yesno" id="optionsRadios1" value="0">No</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>When Exactly was the goal completed?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="exact" id="optionsRadios1" value="2" required>1+ month in Advance</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="exact" id="optionsRadios1" value="1">1 week Before or On time</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="exact" id="optionsRadios1" value="0">Delayed</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Too much time was alloted?</strong></p>
	<label title="0 Mark"><input title="0 Mark" type="radio" name="time" id="optionsRadios1" value="0" required>Yes way too much</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="time" id="optionsRadios1" value="1">Duration was adequate</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="2 Mark"><input title="2 Mark" type="radio" name="time" id="optionsRadios1" value="2">Time was short, which made it a challenge</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Was the Student regular in providing weekly updates?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="regular" id="optionsRadios1" value="2" required>Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="regular" id="optionsRadios1" value="1">Sometimes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="regular" id="optionsRadios1" value="0">Not Regular</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Task was very Heavy which actually made the Student Manage time?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="manage" id="optionsRadios1" value="2" required>Yes, lots of work in short time</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="manage" id="optionsRadios1" value="1">Student could manage</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="manage" id="optionsRadios1" value="0">No trouble in managing time</label>
	</div><hr>
	<div class="form-group">
	<label for="exampleTextarea">Feedback: On how '.$row00[stud_name].' can still improve further (Example: Any other Courses to take up)</label>
    <textarea name ="feedback"class="form-control" id="exampleTextarea" rows="3" required=""></textarea>
	</div>
	<center><button type="submit" class="btn btn-primary">Submit</button></center>
	</form>
	</div><div class="col-md-5" style="margin-left:20px;">
	<div class="list-group">
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Details of Goal '.$row1[title].'</h4></center>
    <p class="list-group-item-text">
	<strong>Goal ID</strong>: '.$row1[goal_id].'<br>
	<strong>Student Name</strong>: '.$row00[stud_name].'<br>
	<strong>Student Email</strong>: '.$row1[email].'<br>
	<strong>Goal Title</strong>: '.$row1[title].'<br>
	<strong>Goal Type</strong>: '.$row1[goal_type].'<br>
	<strong>Revive Status</strong>: '.$row1[revive_stat].'<br>
	<strong>Revive Date</strong>: '.$row1[revive_date].'<br>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Action Plan</h4></center>
    <p class="list-group-item-text">
	<strong>Action Plan</strong>: '.$row1[action_plan].'<br>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Timming Details</h4></center>
    <p class="list-group-item-text">
	<strong>Date Created</strong>: '.$row1[date_created].'<br>
	<strong>Deadline</strong>: '.$row1[deadline].'<br>
	<strong>Date Completed</strong>: '.$row1[date_completed].'<br>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Goal Progress Content</h4></center>
    <p class="list-group-item-text">
	<center><a href="mentor_view_report.php?id='.$row1['goal_id'].'" class="btn btn-info" role="button" target="_blank" title="View Weekly Reports Submitted for '.$row1['title'].'" role="button">View Reports Submitted</a>
	<a target="_blank" href="mentor_view_evidence.php?id='.$row1['goal_id'].'&stud_name='.$row00[stud_name].'" class="btn btn-success" role="button">View Submitted Evidence</a></center>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Mentor Details</h4></center>
    <p class="list-group-item-text">
	<strong>Request ID</strong>: '.$row1[request_id].'<br>
	<strong>Mentor Name</strong>: '.$row1[mentor_name].'<br>
	<strong>Mentor Email</strong>: '.$row1[mentor_email].'<br>
	</p>
	</div></div>
	</div></div></div>';
}
else
{
	echo $row1[goal_type];
	echo '<div class="container-fluid"><div class="row" style="margin-left:62px;"><div class="col-md-7 polaroid" style="padding-bottom:20px;"><center><h2>Rate Goal "'.$row1[title].'"</h2></center>
	<form class="fieldset" method="post" action="meval_other.php?id='.$row00[goal_id].'&request_id='.$request_id.'">
	<div class="form-group radio row inline">
	<p><strong>Was the Goal Achieved on Time?</strong></p>
	<label title="1 Mark">
    <input title="1 Mark" type="radio" name="yesno" id="optionsRadios1" value="1" required>Yes</label>
	<label title="0 Mark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input title="0 Mark" type="radio" name="yesno" id="optionsRadios1" value="0">No</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Was the Student regular in providing weekly updates?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="regular" id="optionsRadios1" value="2" required>Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="regular" id="optionsRadios1" value="1">Sometimes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="regular" id="optionsRadios1" value="0">Not Regular</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Is it bridging the Gap between Syllabus?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="gap" id="optionsRadios1" value="2" required>Yes, in all aspects</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="gap" id="optionsRadios1" value="1">Up to some Extent</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="gap" id="optionsRadios1" value="0">No, in no way</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Prepares one for Higher Educations?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="study" id="optionsRadios1" value="2" required>Yes, in all aspects</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="study" id="optionsRadios1" value="1">In a Moderate way</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="study" id="optionsRadios1" value="0">Not applicable</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Students Performance is clearly visible through marks obtained?</strong></p>
	<label title="1 Mark"><input title="1 Mark" type="radio" name="marks" id="optionsRadios1" value="1" required>Yes, in all Aspects</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="marks" id="optionsRadios1" value="0">Satisfactory</label>
	</div><hr>
	<div class="form-group radio row inline">
	<p><strong>Prepares one Campus Placement?</strong></p>
	<label title="2 Mark"><input title="2 Mark" type="radio" name="place" id="optionsRadios1" value="2" required>Yes, in all aspects</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="1 Mark"><input title="1 Mark" type="radio" name="place" id="optionsRadios1" value="1">In a Moderate way</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label title="0 Mark"><input title="0 Mark" type="radio" name="place" id="optionsRadios1" value="0">Not Applicable</label>
	</div><hr>
	<div class="form-group">
	<label for="exampleTextarea">Feedback: On how '.$row00[stud_name].' can still improve further (Example: Any other Courses to take up)</label>
    <textarea name ="feedback"class="form-control" id="exampleTextarea" rows="3" required=""></textarea>
	</div>
	<center><button type="submit" class="btn btn-primary">Submit</button></center>
	</form>
	</div><div class="col-md-5" style="margin-left:20px;">
	<div class="list-group">
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Details of Goal '.$row1[title].'</h4></center>
    <p class="list-group-item-text">
	<strong>Goal ID</strong>: '.$row1[goal_id].'<br>
	<strong>Student Name</strong>: '.$row00[stud_name].'<br>
	<strong>Student Email</strong>: '.$row1[email].'<br>
	<strong>Goal Title</strong>: '.$row1[title].'<br>
	<strong>Goal Type</strong>: '.$row1[goal_type].'<br>
	<strong>Revive Status</strong>: '.$row1[revive_stat].'<br>
	<strong>Revive Date</strong>: '.$row1[revive_date].'<br>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Action Plan</h4></center>
    <p class="list-group-item-text">
	<strong>Action Plan</strong>: '.$row1[action_plan].'<br>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Timming Details</h4></center>
    <p class="list-group-item-text">
	<strong>Date Created</strong>: '.$row1[date_created].'<br>
	<strong>Deadline</strong>: '.$row1[deadline].'<br>
	<strong>Date Completed</strong>: '.$row1[date_completed].'<br>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Goal Progress Content</h4></center>
    <p class="list-group-item-text">
	<center><a href="mentor_view_report.php?id='.$row1['goal_id'].'" class="btn btn-info" role="button" target="_blank" title="View Weekly Reports Submitted for '.$row1['title'].'" role="button">View Reports Submitted</a>
	<a target="_blank" href="mentor_view_evidence.php?id='.$row1['goal_id'].'&stud_name='.$row00[stud_name].'" class="btn btn-success" role="button">View Submitted Evidence</a></center>
	</p>
	</div>
	<div class="list-group-item">
    <center><h4 class="list-group-item-heading">Mentor Details</h4></center>
    <p class="list-group-item-text">
	<strong>Request ID</strong>: '.$row1[request_id].'<br>
	<strong>Mentor Name</strong>: '.$row1[mentor_name].'<br>
	<strong>Mentor Email</strong>: '.$row1[mentor_email].'<br>
	</p>
	</div></div>
	</div></div></div>';
}

?>
<!--Body ends here -->
<br><br><br>
<!--  Footer  -->
<div class="row" style="width:103%">
<div  class="lineBlack">
    <div class="container">
        <div class="row downLine">
            <div class="col-lg-12 text-right">
            </div>
            <div class="col-md-6 text-left copy">
                <p>Copyright &copy; 2014 Build Your Brand. All Rights Reserved.</p>
            </div>
            <div class="col-md-6 text-right dm">
               <!-- <ul id="downMenu">
                    <li class="active"><a href="#home">Home</a>
                    </li>
                    <li><a href="#" target="blank">Link 1</a>
                    </li>
                    <li><a href="#" target="blank">Link 2</a>
                    </li>
                    <li><a href="#" target="blank">Link 3</a>
                    </li>
                </ul>-->
            </div>
        </div>
    </div>
</div>
</div>

<!--  End of Footer  -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js_modal/jquery.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js_modal/bootstrap.js"></script>
</body>
</html>