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
$Id = $_GET["id"]; //escape the string if you like
if($Id)
{
	$_SESSION["goal_id"] = $Id;
}
$goal_id=$_SESSION["goal_id"];
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
<title>EYB | Reports</title>
<!--  CSS  -->
<link rel="stylesheet" type="text/css" href="../css/logo.css">
    <link rel="stylesheet" type="text/css" href="../css/sdp_edit_border.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link rel='stylesheet' id='camera-css'  href='../css/camera.css' type='text/css' media='all'>
    <link rel="stylesheet" type="text/css" href="../css/carousel.css">
    <link rel="stylesheet" type="text/css" href="../css/slicknav.css">
    <link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto mainstylesheet"charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet'      type='text/css'>
<!-- Bootstrap -->
<link rel="stylesheet" href="css_modal/bootstrap.css">
<link rel="stylesheet" href="css_modal/style1.css">
</head>
<body>
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
                                            <li><a href="#"></a></li>
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

?>
<div class="container">
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <?php
  //echo $Id;
 // echo $goal_id;
  $sql3="select * from goals_completed where email='$email' and goal_id IN('$Id') or goal_id IN('$goal_id')";
  $res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
  $row3=mysqli_fetch_array($res3);
  
  ?>
  <div class="panel-heading"><center><h4><?php echo "Submitted Weekly Reports for $row3[title]";?></h4></center></div>

  <!-- Table -->
  <table class="table">
    <thead>
    <tr>
      <th>Sub Task</th>
      <th>Goal Completed(%)</th>
	  <th>Date Submitted</th>
	   <th>View Report</th>
    </tr>
  </thead>
  
  <tbody>
  <?php
  //php code to display the goals
   
$sql1="select * from goal_report where email='$email' and goal_id IN('$Id') or goal_id IN('$goal_id')";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
$count=mysqli_num_rows($res1);
	if($count)
	{
		while($row1=mysqli_fetch_array($res1))
		{ ?>
			<tr><th scope="row"><?php echo $row1['sub_task']; ?> </th><td><?php echo $row1['goal_com']; ?> </td><td><?php echo $row1['time_added']; ?></td><td><?php echo '<a href="mentor_report_view.php?r_id='.$row1['report_id'].'" class="btn btn-info" role="button" data-toggle="modal" data-target="#myModal_View" title="View Report for '.$row1['sub_task'].'" role="button">View Report</a></td></tr>';?>
	<?php	}
	}
	else
	{
		echo '<center><h2>No Reports Available</h2></center>';
		
	}
	?>
  </tbody>
  </table>
</div>
</div>
<!--Body ends here -->

<!--Modal for View -->
<div class="modal fade" id="myModal_View" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title View</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>

<!--Modal for view ends here-->

<!-- Modal for Edit-->
<div class="modal fade" id="myModal_Edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title_Edit</h4>
        <?php
      $Id=$row['goal_id'];
      //echo $Id;
      //echo 'hihihi';
      ?>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!--Modal for Edit ends here-->

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