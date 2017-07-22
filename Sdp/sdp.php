<?php
    session_start();

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }

//Connection Code
$db="careerscope";
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);  // Make Connection
	mysqli_select_db($conn, $db);                      // Select Database

// Check connection
if (!$conn) {
    die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}
//echo "Connected successfully";

//Connection Code ends

//php code to shift goals whose deadline has passed to the goals dead table
$time = date('Y-m-d');

$email=$_SESSION['user'][0];
$sql1="Select * from goal_list where email like '$email' and deadline < '$time'";
$res1=mysqli_query($conn, $sql1);
$count=mysqli_num_rows($res1);
//echo $count;
//$time = date('Y-m-d H:i:s');
$success_count = 0;
if($count)
{
	while($row1=mysqli_fetch_array($res1))
	{
				//if($row1['goal_com']===100)
		//{
			//echo $row1['goal_com'];
			//echo 'hi';
			
			$sql2="Insert into goal_dead(title,email,goal_id,action_plan,deadline,frequency,goal_type,time_added,goal_com) values('$row1[0]','$row1[1]','$row1[2]','$row1[3]','$row1[4]','$row1[5]','$row1[6]','$row1[7]','$row1[11]')";
			$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
			
			$sql3="Delete from goal_list where goal_id ='$row1[2]'";
			$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
			$title = $row1['title'];
			if($res2 && $res3)
			{
				$success_count = $success_count + 1;
				//echo "<SCRIPT LANGUAGE='JavaScript'>alert('Goal $title has been Completed Successfully');window.location.href='sdp_evidence.php';</SCRIPT>";
			}
			
		//}
	}
	if($success_count < 2 && $success_count!=0)
	{
		echo "<SCRIPT LANGUAGE='JavaScript'>alert('Goal $title Has Crossed its Deadline');window.location.href='sdp_dead.php';</SCRIPT>";

	}
	else
	{
		echo "<SCRIPT LANGUAGE='JavaScript'>alert('More than One Goal Has Crossed its Deadline');window.location.href='sdp_dead.php';</SCRIPT>";
	}
}

//code to shift goals whose deadline has passed to the  goal dead table ends here

?>
<html>
<head>
<!-- Favicon -->
    <link href="images/favicon.ico" rel="shortcut icon"/>
	
    <title>EYB | SDP</title>
      
<!--  CSS  -->
<link rel="stylesheet" type="text/css" href="css/logo.css">
    
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link rel='stylesheet' id='camera-css'  href='../css/camera.css' type='text/css' media='all'>
    <link rel="stylesheet" type="text/css" href="../css/carousel.css">
    <link rel="stylesheet" type="text/css" href="../css/slicknav.css">
    <link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main
    stylesheet"charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet'             type='text/css'>
     <link rel="stylesheet" href="For_tab/bootstrap.min.css">
     <script src="For_tab/jquery.min.js"></script>
     <script src="For_tab/bootstrap.min.js"></script>
    <!--css ends-->
<style>
.col-md-2 {
    margin:20px;
}
</style>
</head>
<body>
<!--header-->
<style>
.headerLine{
    position: relative;
    width: 102%;
    
    height:25%;
    background: url(../images/bgTop.jpg) center center no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
</style>

<!--header starts-->
<div style="margin-bottom:10px;" id="home">
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
                                            <li><a href="../newindex.php">Home</a></li>
                                            <li><a href="sdp.php" target="_blank">Self Development Plan</a></li>
                                            <li><a href="#" target="_blank">Link</a></li>
                                            <li><a href="#" target="_blank">Link</a></li>
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
                    <a class="btn btn-default btn-block" href="../newindex.php">Home</a>
		</div>
        <div class="col-sm-1">
            <span><a class="btn btn-default" href="../logout.php">Logout</a></span>
        </div>
        
    </div>
</div>
</div>
<!-- Name of user ends-->
<!-- body starts here-->
<div class="container-fluid">
<div class="row">
  <div class="col-md-2">
  	<div class="panel panel-default">
  <!--<div class="panel-heading">
    <h3 class="panel-title"><a href="sdp_view.php" data-toggle="tooltip" title="View all the Existing Schedules created till date">View Schedule</a></h3>
  </div>-->
  <div class="panel-heading">
    <h3 class="panel-title"><a href="sdp_edit.php" target=''data-toggle="tooltip" title="Edit Existing Schedules">View/ Edit Schedule</a></h3>
  </div>
  <div class="panel-heading">
    <h3 class="panel-title"><a href="sdp_delete.php" data-toggle="tooltip" title="Delete Unwanted Tasks">Delete Schedule</a></h3>
  </div>
  <div class="panel-heading">
    <h3 class="panel-title"><a href="sdp_evidence.php" data-toggle="tooltip" title="Submit Certificates for Tasks Achieved">Submit Evidence</a></h3>
  </div>
  <div class="panel-heading">
    <h3 class="panel-title"><a href="sdp_history.php" data-toggle="tooltip" title="View history of Changes made">History Log</a></h3>
  </div>
  <div class="panel-heading">
    <h3 class="panel-title"><a href="sdp_weeklyupdate.php" data-toggle="tooltip" title="Update your Goal tasks">Weekly Status Update</a></h3>
  </div>
  <div class="panel-heading">
    <h3 class="panel-title"><a href="sdp_progressreport.php" data-toggle="tooltip" title="View the Goal Progress">Progress Bar</a></h3>
  </div>
  <div class="panel-heading">
    <h3 class="panel-title"><a href="sdp_dead.php" data-toggle="tooltip" title="Revive Goals that have Crossed Deadline">Revive Goal</a></h3>
  </div>
  <div class="panel-heading">
    <h3 class="panel-title"><a href="eval.php" data-toggle="tooltip" title="Rate Achieved Goals by Self or Mentor">Goal Evaluation</a></h3>
  </div>
  <div class="panel-heading">
    <h3 class="panel-title"><a href="analysis.php" data-toggle="tooltip" title="View Goal completion Statistics">Goal Analysis</a></h3>
  </div>
</div>
  </div>
 <style>
 .panel-heading:hover {
  background-color: #0c81f6 !important;
  color:white;
}
}
 </style>
 <style type='text/css'>
.fieldset{
padding:10px;

line-height:1.8;
border: 2px solid #7692e4;
 border-radius: 5px;
}
</style>
  <div class="fieldset col-md-8">
 				<!-- Data presentation in body starts here-->
  <ul class="nav nav-tabs">
    <li><a data-toggle="tab" href="#home"></a></li>
    <li class="active"><a data-toggle="tab" href="#menu1">SDP</a></li>
    <li><a data-toggle="tab" href="#menu2">Specific</a></li>
    <li><a data-toggle="tab" href="#menu3">Measurable</a></li>
    <li><a data-toggle="tab" href="#menu4">Ambitious</a></li>
    <li><a data-toggle="tab" href="#menu5">Realistic</a></li>
    <li><a data-toggle="tab" href="#menu6">Timebased</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade">
     <!-- Empty-->
    </div>
    <div id="menu1" class="tab-pane fade in active">
       <h1>Self-Development Plan</h1>
      <h3>Set your own Targets!</h3><br>
  		<p><a class="btn btn-primary btn-lg" href="sdp_add_goal.php" role="button">Add a Goal</a></p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Specific</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Measurable</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
    <div id="menu4" class="tab-pane fade">
      <h3>Ambitious</h3>
      <p>menu 4.</p>
    </div>
    <div id="menu5" class="tab-pane fade">
      <h3>Realistic</h3>
      <p>Menu 5.</p>
    </div>
     <div id="menu6" class="tab-pane fade">
      <h3>Timebased</h3>
      <p>Menu 6.</p>
    </div>
  </div>

<!-- Data presentation in body ends here-->
     
<style>
.btn-primary:hover{
	background-color:#241e92;
}
}
</style>
<!-- Generated markup by the plugin -->
<div class="tooltip top" role="tooltip">
  <div class="tooltip-arrow"></div>
  <div class="tooltip-inner">
    Some tooltip text!
  </div>
</div>
</div>
<div class="col-md-2">
</div>
</div>
</div>
<br>
<br>
<br>
<!-- body ends here-->
<!--  Footer  -->
<div class="row">
<div  class="lineBlack">
    <div class="container">
        <div class="row downLine">
            <div class="col-md-11 text-right">
            </div>
            <div class="col-md-5 text-left copy">
                <p>Copyright &copy; 2014 Build Your Brand. All Rights Reserved.</p>
            </div>
            <div class="col-md-5 text-right dm">
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
</body>
</html>
