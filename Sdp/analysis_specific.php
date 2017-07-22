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
$email=$_SESSION['user'][0];
$user=$_SESSION['user'][1];
?>
<html>
<head>
<?php
//////////////////////PHP code for graph (use $row1[] for goals_completed)
$sql20="select * from goals_completed where self_eval='Yes' and mentor_eval='Yes' and graph='No' and goal_type='Specific'";
$res20=mysqli_query($GLOBALS["___mysqli_ston"], $sql20);
while($row20=mysqli_fetch_array($res20))
{

	$sql21="select * from goal_specific  where goal_id='$row20[goal_id]'";
	$res21=mysqli_query($GLOBALS["___mysqli_ston"], $sql21);
	$data21=mysqli_fetch_array($res21);
	
	$sql22="select * from goalm_specific  where goal_id='$row20[goal_id]'";
	$res22=mysqli_query($GLOBALS["___mysqli_ston"], $sql22);
	$data22=mysqli_fetch_array($res22);
	
	$sql23="Insert into graph (goal_id,stud_email,goal_type,user_score,sys_score,mentor_score)values('$row20[goal_id]','$email','$row20[goal_type]','$data21[user_score]','$data21[sys_score]','$data22[mscore]')";
	$res23=mysqli_query($GLOBALS["___mysqli_ston"], $sql23);
	//echo 'Hi graph';
	
	$sql24="update goals_completed SET graph='Yes' where goal_id='$row20[goal_id]'";
	$res24=mysqli_query($GLOBALS["___mysqli_ston"], $sql24);
}
/////////////////////PHP code for graph ends here

?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="images/favicon.ico" rel="shortcut icon"/>
	
    <title>EYB | Analysis In Depth</title>
      
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
<!-- Links for Dropdown-->
 <link rel="stylesheet" href="for_dropdown/css/bootstrap.min.css">
  <script src="for_dropdown/js/jquery.min.js"></script>
  <script src="for_dropdown/js/bootstrap.min.js"></script>
<!-- Links for dropdwon ends here -->
<style>
.headerLine{
    position: relative;
    width: 101%;
    
    height:24%;
    background: url(../images/bgTop.jpg) center center no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
</style>
</head>
<body>
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
                                            <li><a href="sdp.php" target="">Self Development Plan</a></li>
                                            <li><a href="eval.php" target="">Goal Evaluation</a></li>
                                            <li><a href="analysis.php" target="">Analysis</a></li>
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
        <div class="col-sm-6">
            
        </div>
       
 <div class="container col-md-2">
  
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">In Depth Analysis
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="analysis_specific.php">Specific</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="analysis_measure.php">Measurable</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="analysis_ambitious.php">Ambitious</a></li>
      <!-- <li role="presentation" class="divider"></li>-->
      <li role="presentation"><a role="menuitem" tabindex="-1" href="analysis_realistic.php">Realistic</a></li>   
      <li role="presentation"><a role="menuitem" tabindex="-1" href="analysis_timebased.php">Timebased</a></li>   
      <li role="presentation"><a role="menuitem" tabindex="-1" href="analysis_other.php">Other Goals</a></li>    
    </ul>
  </div>
  <script>
$(document).ready(function(){
    $(".dropdown-toggle").dropdown();
});
</script>
  </div>
        <div class="col-sm-1">
            <span><a class="btn btn-default" href="../logout.php">Logout</a></span>
        </div>
        
    </div>
</div>
</div>
<!-- Name of user ends-->

<!--Body Starts here-->
<?php  
$sql00="select * from graph where stud_email='$email' and goal_type='Specific'";
$res00=mysqli_query($GLOBALS["___mysqli_ston"], $sql00);
$count=mysqli_num_rows($res00);

//echo $count;
//echo 'hi';
if($count)
{
	$user = array();
	$system = array();
	$mentor = array();
	while($row00 = mysqli_fetch_array($res00)) 
	{
    	$user[] = array(label => 'ID '.$row00[goal_id], y => $row00[user_score]);
    	$system[] = array(label => 'ID '.$row00[goal_id], y => $row00[sys_score]);
    	$mentor[] = array(label => 'ID '.$row00[goal_id], y => $row00[mentor_score]);	
	}
}
else 
{
	echo '<h2><center>No Goals Completed Yet</center></h2>';
}

//echo json_encode($system, JSON_NUMERIC_CHECK);
//echo json_encode($user, JSON_NUMERIC_CHECK);
//echo json_encode($mentor, JSON_NUMERIC_CHECK);
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6" id="chartContainer" style="height: 400px; width:98%;">
  		</div>
	</div>
</div>
<!--Body ends here-->
<!--Script for Line Chart -->
 <script type="text/javascript">
  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {
      title:{
        text: "Specific Goal Analysis"             
      }, 
      animationEnabled: true,     
      axisY:{
        titleFontFamily: "arial",
        titleFontSize: 12,
        includeZero: false
      },
      toolTip: {
        shared: true
      },
      data: [
      {        
        type: "spline",  
        name: "System",        
        showInLegend: true,
        dataPoints: <?php echo json_encode($system, JSON_NUMERIC_CHECK); ?>
      }, 
      {        
        type: "spline",  
        name: "Mentor",        
        showInLegend: true,
        dataPoints: <?php echo json_encode($mentor, JSON_NUMERIC_CHECK); ?>
      },
      {        
        type: "spline",  
        name: "Self",        
        showInLegend: true,
        dataPoints: <?php echo json_encode($user, JSON_NUMERIC_CHECK); ?>
      }
     
      ],
      legend:{
        cursor:"pointer",
        itemclick:function(e){
          if(typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
          	e.dataSeries.visible = false;
          }
          else {
          	e.dataSeries.visible = true;            
          }
          chart.render();
        }
      }
    });

chart.render();
}
</script>

<script type="text/javascript" src="js_spline/canvasjs.min.js"></script>
<!--Script for Line Chart Ends now -->
<!--  Footer  -->
<br><br>
<div class="row">
<div  class="lineBlack">
    <div class="container">
        <div class="row downLine" style="widht:100%">
            <div class="col-md-12 text-right">
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
<script src="../js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js_modal/bootstrap.js"></script>
</body>
</html>