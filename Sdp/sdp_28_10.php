<?php
    session_start();

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }
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
    
    height:22%;
    background: url(../images/bgTop.jpg) center center no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
</style>
<!--header starts-->
<div style="margin-bottom:20px;" id="home">
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
                    <a class="btn btn-default btn-block" href="../newindex.php"><span class="glyphicon glyphicon-home"></span></a>
		</div>
        <div class="col-sm-1">
            <a class="btn btn-default" href="../logout.php"><small>Logout<small></a>
        </div>
        
    </div>
</div>
</div>
<!-- Name of user ends-->
<!-- body starts here-->
<div class="row">
  <div class="col-md-2">
  	<div class="panel panel-default">
  <!--<div class="panel-heading">
    <h3 class="panel-title"><a href="sdp_view.php" data-toggle="tooltip" title="View all the Existing Schedules created till date">View Schedule</a></h3>
  </div>-->
  <div class="panel-heading">
    <h3 class="panel-title"><a href="sdp_edit.php" target='_blank'data-toggle="tooltip" title="Edit Existing Schedules">View/ Edit Schedule</a></h3>
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
  
</div>
  </div>
  
  <div class="col-md-8">
  		<div class="jumbotron">
  <h1>Self-Development Plan</h1>
  <p>Set your own Targets!</p>
  <p><a class="btn btn-primary btn-lg" href="sdp_add_goal.php" role="button">Add a Goal</a></p>
</div>

<!-- Generated markup by the plugin -->
<div class="tooltip top" role="tooltip">
  <div class="tooltip-arrow"></div>
  <div class="tooltip-inner">
    Some tooltip text!
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
