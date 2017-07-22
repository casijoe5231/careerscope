<?php

    session_start();
$con=mysqli_connect("localhost","root","","careerscope");
    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }

    if ($_SESSION['usertype']!=1) {
        if ($_SESSION['usertype']!=2) {
            header("location:../login.php");
        }
    }
include "../includes/connection2.php";

if (mysqli_connect_errno()){
  echo "<br />Failed to connect to mysql: " . mysqli_connect_error();
}


$stmt1="SELECT discipline FROM subject_kash GROUP BY discipline";
$query1=mysqli_query($con, $stmt1);
if(!$query1){
  echo "query1 execution unsuccessful". mysqli_error($con);
}
?>



<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<!-- templatemo 416 xenon -->
<!--
Xenon Template 
http://www.templatemo.com/preview/templatemo_416_xenon
-->
<head>
<!--All things related to GALLERY
    <meta charset="utf-8">
    <title>BYB | Gallery</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    
     Bootstrap Stylesheet 
    <link rel="stylesheet" href="css/Gal/bootstrap.min.css">
    
     FontAwesome Icons 
    <link rel="stylesheet" href="css/Gal/font-awesome.min.css">
    
     Google Font 
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

     Main Styles 
    <link rel="stylesheet" href="css/Gal/templatemo_style.css">
    <script src="js/Gal/vendor/modernizr-2.6.2.min.js"></script>
End of GALLERY CSS JS-->
<!--******************************************************************************************************-->  
<!--CSS & JS related to Timber-->
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/jquery-ui3.css" />
    <link href="../images/favicon.ico" rel="shortcut icon"/> 
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Revalia%7COswald%7COpen+Sans+Condensed:300%7CRoboto' rel='stylesheet' type='text/css' />

   
    <!--Additional CSS-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
		<link rel='stylesheet' id='camera-css'  href='../css/camera.css' type='text/css' media='all'>
		<link rel="stylesheet" type="text/css" href="../css/slicknav.css">
		<link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/style2.css">
    <link href="../css/animate2.css" rel="stylesheet">
    <!--/Additional CSS-->
    
    <!--Custom js-->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/info-ajax.js"></script>
    <!--/Custom js-->
    
<!--End of CSS & JS related to Timber-->

</head>
<body>
    <!--Timber Header-->
      <div id="home">
    	<div style="margin-bottom:20px;" class="headerLine">
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
            </div></div>
    <!--/TimberHeader-->
<!--Body Subj Modules-->
<!--
   <div class="container">
        <div class="well">
            <div class="row">
        <div class="col-md-4"
        
            </div>
        </div>    
    </div> 
-->
    <div class="container">

    <div style="padding:10px;" class="panel panel-default">
            <div class="row">
                <div class="col-sm-2">
                    <h5>Welcome <?php echo $_SESSION['user'][1]; ?>,</h5>
                </div>
                <div class="col-sm-10">
                    <div class="col-sm-8"></div>

                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../newindex.php"><span class="glyphicon glyphicon-home"></span> </a></div>
                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../logout.php">Logout</a></div>
                
                </div>
            </div>
        </div>




    <div class="bb-item" id="page-3">
                      <div class="bb-custom-side" id="experience">
                          <div class="bb-custom-container">
                              <h1>Know Your Subjects</h1>
<!-- 
drop down for choosing subj -->

    <div class="row">
            <div class="col-sm-2">
                <div style="margin-top:20px;" class="list-group">
                    <a href="index.php" class="list-group-item active">Know Your Subject</a>
                    <a href="#" class="list-group-item">Subject Test</a>
                    <a href="#" class="list-group-item">Fun With Subjects</a>
                    <a href="#" class="list-group-item">Subject Dashboard</a>
                  </div>
            </div>
            <div class="col-sm-10">
            
                <!--content goes here-->
                <div class="row">
                   <div class="row" style="padding-top:10px;padding-bottom:20px;">
        <center>  
              <form class="form-inline" role="form">
                <div class="form-group">
                    <select id="select-disc" class="form-control">
                      <option>Select Discipline</option>
                       <?php 
					   include "../includes/connection2.php";
								$stmt1="SELECT discipline FROM subject_kash GROUP BY discipline";
								$query1=mysqli_query($GLOBALS["___mysqli_ston"], $stmt1);

                        while($row1=mysqli_fetch_array($query1)){
                          echo "<option value='".$row1['0']."'>".$row1['0']."</option>";
                        }
                      ?>
                    </select>
                </div>


                <div class="form-group">
                    <select id="select-branch" class="form-control">
                      <option>Select Branch</option>
                     
                    </select>
                </div>
                <div class="form-group">
                    <select id="select-year" class="form-control">
                      <option>Select Year</option>
                    </select>
                </div>
                <div class="form-group">
                    <select id="select-sem" class="form-control">
                      <option>Select Semester</option>
                    </select>
                </div>
                <div class="form-group">
                    <select id="select-subject" class="form-control">
                      <option>Select Subject</option>
                    </select>
                </div>
              </form>
            </center>
          </div>

                                  

                              
                              <div class="row">
                                  <div class="col-sm-6 animateFadeInUp">
                                      <div class="panel panel-default">
                                          <div class="panel-heading"><h2> Knowledge</h2></div>
                                          <div id="knowledge-data" class="panel-body">
                                              No Subject Selected
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-6 animateFadeInUp">
                                      <div class="panel panel-default">
                                          <div class="panel-heading"> <h2>Attitude</h2></div>
                                          <div id="attitude-data" class="panel-body">
                                              No Subject Selected
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-sm-6 animateFadeInDown">
                                      <div class="panel panel-default">
                                          <div class="panel-heading"><h2> Skill</h2></div>
                                          <div id="skill-data" class="panel-body">
                                              No Subject Selected
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-6 animateFadeInDown">
                                      <div class="panel panel-default">
                                          <div class="panel-heading"><h2>Habit</h2></div>
                                          <div id="habit-data" class="panel-body">
                                            No Subject Selected    
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                </div>
            </div>
        </div>


      

    </div>
<!--  Module 1  -->

    
    
    <!-- /Mod 1-->
    </div>
<!--/Body-->
<!--Timber Footer-->
    
    <footer>
      <div class="lineBlack">
			<div class="container">
				<div class="row downLine">
					<div class="col-md-12 text-right">						
					<div class="col-md-6 text-left copy">
						<p>Copyright &copy; 2014 Build Your Brand. All Rights Reserved.</p>
					</div>
					<div class="col-md-6 text-right dm">
						<ul id="downMenu">
						</ul>
					</div>
				</div>
			</div>
		</div>
        </div>
        </footer>
        <div id="dummy"></div>
<!--/TimberFooter-->   
    <script src="../js/bootstrap.min.js"></script>
    
</body>
</html>