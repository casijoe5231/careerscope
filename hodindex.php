<?php
	include 'includes/headerfooter.php';
    session_start();
    if($_SESSION['usertype']>=9 && $_SESSION['usertype']<=14)
	{
		//echo "usertype:".$_SESSION['usertype'];
		include 'includes/connection2.php';
		$emaill=$_SESSION['user'][0];
		$usertype=$_SESSION['usertype'];
		date_default_timezone_set('Asia/Calcutta');
		$datetime = date("F j, Y, g:i a");
		$timesql = date("Y-m-d H:i:s"); 
		//$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Testmgr Home Page','$timesql')";
		//$res=mysql_query($sql)or die("query not executed");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
<!-- Favicon -->
    <link href="images/favicon.ico" rel="shortcut icon"/>
	
    <title>EYB | HOD Menu </title>
      
<!--  CSS  -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel='stylesheet' id='camera-css'  href='css/camera.css' type='text/css' media='all'>
    <link rel="stylesheet" type="text/css" href="css/carousel.css">
    <link rel="stylesheet" type="text/css" href="css/slicknav.css">
    <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main
    stylesheet"charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet'             type='text/css'>
      
<!--  JS  -->
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script> 
    <script type="text/javascript" src="js/camera.min.js"></script>
    <script type="text/javascript" src="js/myscript.js"></script>
    <script src="js/sorting.js" type="text/javascript"></script>
    <script src="js/jquery.isotope.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
			jQuery(function(){
					jQuery('#camera_wrap_1').camera({
					transPeriod: 500,
					time: 3000,
					height: '490px',
					thumbnails: false,
					pagination: true,
					playPause: false,
					loader: false,
					navigation: false,
					hover: false
				});
			});
		</script>
    </head>
<body>
<!--header-->
<style>
.headerLine{
    position: relative;
    width: 102%;
    
    height:22%;
    background: url(images/bgTop.jpg) center center no-repeat;
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
                                        <img src="images/byblogo.png" width="120" height="120">
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
<!--  Welcome Bar  -->
        <nav class="navbar-container">
            <ul class="nav nav-pills navbar-left">
                <p class="navbar-brand">Welcome <?php echo $_SESSION['user'][1]; ?>,</p>
            </ul>
            <ul class="nav nav-pills navbar-right" style="margin-top:6px; margin-right:10px;">
               
                <li style="padding: 0 8px 0 8px;">
                    <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" id="current-role" data-toggle="dropdown" aria-expanded="true">
                        as HOD
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="current-role">

                      <?php
                        if($usertype>=9 && $usertype<=14){
                            echo '<li role="presentation">';
                            echo '<a role="menuitem" tabindex="-1" href="hodindex.php">';
                            echo 'HOD';
                            echo '</a></li>';
                        }

                        if(($usertype>=10 && $usertype<=13) || ($usertype>=15 && $usertype<=18)){

                            echo '<li role="presentation">';
                            echo '<a role="menuitem" tabindex="-1" href="lecturerindex.php">';
                            echo 'Lecturer';
                            echo '</a></li>';
                        }

                        if($usertype==11 || $usertype==13 || $usertype==14 || $usertype==16 || $usertype==18 || $usertype==19){

                            echo '<li role="presentation">';
                            echo '<a role="menuitem" tabindex="-1" href="mentorindex.php">';
                            echo 'Mentor';
                            echo '</a></li>';
                        }

                        if($usertype==12 || $usertype==13 || $usertype==17 || $usertype==18){

                            echo '<li role="presentation">';
                            echo '<a role="menuitem" tabindex="-1" href="testindex.php">';
                            echo 'Test';
                            echo '</a></li>';
                        }
                    ?>
                      </ul>
                    </div>
                </li>
                
                <li style="padding: 0 8px 0 8px;"><a href="logout.php" style="padding: 6px 12px;" class="btn btn-md btn-default">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"> </span> Log Out
                    </a>
                </li>
            </ul>  
        </nav>

<!--  /Welcome Bar  -->


<center>
    <div class="panel panel-primary" style="width:1000px; margin-left: auto; margin-right: auto; margin-top: 35px;">
        <div class="panel-heading">
            <h2 class="panel-title">HOD Menu</h2>
        </div>
        <div class="panel-body">
            <!-- Three columns of Tests -->
            <div class="row">
                <div class="col-sm-4">
                    <img class="img-circle" src="images/flaticons/personality-profiling.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                    <h3>Personality Profiling</h3>
                     
                    <p><a class="btn btn-default" href="skill/index.php" role="button">Explore &raquo;</a>
                    </p>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-sm-4">
                    <img class="img-circle" src="images/flaticons/soft-skills-brand.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                    <h3>Set Expertise</h3>
                     
                    <p><a class="btn btn-default" href="expertise22.php" role="button">Explore &raquo;</a>
                    </p>
                </div>
                <!-- /.col-lg-4 -->
				
				  <div class="col-sm-4">
                    <img class="img-circle" src="images/flaticons/task1.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                    <h3>Assign Task</h3>
                     
                    <p><a class="btn btn-default" href="demo2.php" role="button">Explore &raquo;</a>
                    </p>
                </div>
              
				
				
				
            </div>
            <!-- /.row -->
           
        </div>
    </div>
</center>






        
<!--  Footer  -->
<div  class="lineBlack">
    <div class="container">
        <div class="row downLine">
            <div class="col-md-12 text-right">
            </div>
            <div class="col-md-6 text-left copy">
                <p>Copyright &copy; 2014 Endorse Your Brand. All Rights Reserved.</p>
            </div>
            <div class="col-md-6 text-right dm">
                <ul id="downMenu">
                  <!--  <li class="active"><a href="#home">Home</a>
                    </li>
                    <li><a href="#" target="blank">Link 1</a>
                    </li>
                    <li><a href="#" target="blank">Link 2</a>
                    </li>
                    <li><a href="#" target="blank">Link 3</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
</div>
<!--  End of Footer  -->
</body>
</html>
<?php
}
else
{
    header("location:login.php?login=0");
}
?>