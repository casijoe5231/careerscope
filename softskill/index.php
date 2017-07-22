<?php
    session_start();

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }

    if ($_SESSION['usertype']!=1) {
        if ($_SESSION['usertype']!=2) {
            header("location:../login.php");
        }
    }


    include '../connection1.php';

    $emaill=$_SESSION['user'][0];
    
    date_default_timezone_set('Asia/Calcutta');
    $datetime = date("F j, Y, g:i a");
    $timesql = date("Y-m-d H:i:s"); 
    $sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Aptitude Home Page','$timesql')";
    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Favicon -->
        <link href="images/favicon.ico" rel="shortcut icon"/> 

        <title>BYB | soft skills </title>
        <meta charset="utf-8" />
        <!--collapsible list-->
        
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
        <link rel='stylesheet' id='camera-css'  href='../css/camera.css' type='text/css' media='all'>

        <link rel="stylesheet" type="text/css" href="../css/slicknav.css">
        <link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../css/style2.css">


        <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="../js/jquery.mobile.customized.min.js"></script>
        <script type="text/javascript" src="../js/jquery.easing.1.3.js"></script> 
        <script type="text/javascript" src="../js/camera.min.js"></script>
        <script type="text/javascript" src="../js/myscript.js"></script>
        <script src="../js/sorting.js" type="text/javascript"></script>
        <script src="../js/jquery.isotope.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.slicknav.js"></script>
        
        <!------------------------>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <link rel="stylesheet" href="/modules/mod_ariimageslider/mod_ariimageslider/js/themes/nivo-slider.css" type="text/css" />
  <link rel="stylesheet" href="/modules/mod_ariimageslider/mod_ariimageslider/js/themes/default/style.css" type="text/css" />
  <style type="text/css">
#marqueecontainer {position: relative;width:100%;height:200px;overflow: hidden;padding: 2px;padding-left: 4px;background-color:transparent;}
#vmarquee {position: absolute; width: 95%; font-size:14px;}
#vmarquee h3 {text-align: center; color:#000000; font-size:110%; font-style:normal; font-weight:700;padding-top:6px;}
#vmarquee p {color:#FF0099; font-weight:normal;font-style:normal;text-align:center;}
#vmarquee p a {color:#6F2222;}
#vmarqueesmall {text-align: center;color:#666666;font-size:85%;}
#ais_81_wrapper,#ais_81{width:290px;height:220px;}
  </style>
  <script src="/media/system/js/core.js" type="text/javascript"></script>
  <script src="/media/system/js/mootools-core.js" type="text/javascript"></script>
  <script src="/media/system/js/caption.js" type="text/javascript"></script>
  <script src="/modules/mod_ariimageslider/mod_ariimageslider/js/jquery.min.js" type="text/javascript"></script>
  <script src="/modules/mod_ariimageslider/mod_ariimageslider/js/jquery.noconflict.js" type="text/javascript"></script>
  <script src="/modules/mod_ariimageslider/mod_ariimageslider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  <script type="text/javascript">
function keepAlive() {	var myAjax = new Request({method: "get", url: "index.php"}).send();} window.addEvent("domready", function(){ keepAlive.periodical(840000); });
jQuery(window).load(function() { var $ = window.jQueryNivoSlider || jQuery; $("#ais_81").nivoSlider(); });
  </script>
  <!--[if lt IE 7]><link rel="stylesheet" href="/modules/mod_ariimageslider/mod_ariimageslider/js/themes/default/style.ie6.css" type="text/css" /><![endif]-->
  <!--[if IE]><link rel="stylesheet" href="/modules/mod_ariimageslider/mod_ariimageslider/js/themes/default/style.ie.css" type="text/css" /><![endif]-->

  <!--<link rel="stylesheet" href="/templates/system/css/system.css" type="text/css" />
  <link rel="stylesheet" href="/templates/system/css/general.css" type="text/css" />
  <link rel="stylesheet" href="/templates/lightbreeze-red/css/template.css" type="text/css" />-->
<!---------------------------------yeyeye-->    </head>
    <body>

        <div id="home">
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
                                        <li><a>Explore Your Soft Skills</a></li>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
            </div>


            <ul>
<!--  Welcome Bar  -->
        <nav style="padding: 0 8px 0 8px;" class="navbar-container">
        
            <div class="navbar navbar-static-top" class="container-fluid">
            <ul  class="nav nav-pills navbar-right" style="margin-top:6px; margin-right:10px;">
            <li style="padding: 0 8px 0 8px;"><a id="loginbutton" href="../newindex.php" style="padding: 6px 12px;" class="btn btn-md btn-default">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"> </span> Home
                    
                    </a>
                </li>
				
				    
				
                
                <li style="padding: 0 8px 0 8px;"><a href="../logout.php" style="padding: 6px 12px;" class="btn btn-md btn-default">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"> </span> Log Out
                    </a>
                </li>
            </ul>
           
            </div>
        </nav>

<!--  /Welcome Bar  -->
   <!--Collapsible Menu-->
   <div
  > <p></p></a></div>
<div class="col-sm-3" class="container">
  
  <div class="panel-group" id="accordion">
    <div class="panel panel-danger"><!-- first skill-->
      <div class="panel-heading">
        <h4 class="panel-title">
          <a style="font:icon" data-toggle="collapse" data-parent="#accordion" href="#collapse1">Leadership Skills</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body"><ul style="list-style-type:none">
		<li><h5><a style="font:icon" href="leaderknow.php" >Cognizance</a></h5></li>
		<li><a style="font:icon" href="select.php?type=leader">Take the Test</a></li></ul>
		</div>
      </div>
    </div><!-- first skill-->
    <div class="panel panel-danger"><!-- 2 skill-->
      <div class="panel-heading">
        <h4 class="panel-title">
          <a style="font:icon" data-toggle="collapse" data-parent="#accordion" href="#collapse2">Time Management</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body"><ul style="list-style-type:none"><li><a style="font:icon" href="timeknow.php">Know your Time</a></li>
        <li><a style="font:icon" href="select.php?type=time">Take the Test</a></li></ul></div>
      </div>
    </div><!-- 2 skill-->
    <div class="panel panel-danger"><!-- 3 skill-->
      <div class="panel-heading">
        <h4 class="panel-title">
          <a style="font:icon" data-toggle="collapse" data-parent="#accordion" href="#collapse3">Stress Management</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body"><ul style="list-style-type:none"><li><a style="font:icon" href="Stress.php" >Know your Stress</a></li>
		<li><a style="font:icon" href="select.php?type=stress">Test Yout Stress</a></li></ul></div>
      </div>
    </div><!-- 3 skill-->
    
    <div class="panel panel-danger"><!-- 4 skill-->
      <div class="panel-heading">
        <h4 class="panel-title">
          <a style="font:icon" data-toggle="collapse" data-parent="#accordion" href="#collapse4">Communication Skills</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body"><ul style="list-style-type:none">
		<li><a style="font:icon" href="#" >Art of Speaking</a>
     <ul><li><a style="font:icon" href="communication.php""> Speak to motivate</li>
	 <li><a style="font:icon" href="select.php?type=comm">Take the Test</a></li></ul></div>
      </div>
    </div><!-- 4 skill-->
    <div class="panel panel-danger"><!-- 5 skill-->
      <div class="panel-heading">
        <h4 class="panel-title">
          <a style="font:icon" data-toggle="collapse" data-parent="#accordion" href="#collapse5">Change Management</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body"><ul style="list-style-type:none"><li><a style="font:icon" href="change.php" >Change is here to Happen</a></li>
        <li><a style="font:icon" href="select.php?type=change">Test You Stress</a></li></ul></div>
      </div>
    </div><!-- 5 skill-->
        <div class="panel panel-danger"><!-- 6 skill-->
      <div class="panel-heading">
        <h4 class="panel-title">
          <a style="font:icon" data-toggle="collapse" data-parent="#accordion" href="#collapse6">Image Management</a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body"><ul style="list-style-type:none"><li><a style="font:icon" href="#" >Body Language</a>
     <ul><li><a style="font:icon" href="imagemanagement.php">Stand to impress</li><li><a style="font:icon" href="select.php?type=image">Take the Test</li>
     </ul>        
        </li>
        <li><a style="font:icon" href="#">Etiquette and Manners</a><ul><li><a style="font:icon" href="imagemanagement1.php">Know What</li>
        <li><a style="font:icon" href="select.php?type=Etiquette">Take the Test</li>
     </ul> </li>
         <li><a style="font:icon" href="#">Brand Your Resume</a>  </li>
        </div>
      </div>
    </div><!-- 6 skill-->
    
  </div> 
</div>
    <!--Collapsible Menu-->



<style>
    body {font-family:Arial, Helvetica, sans-serif; font-size:10px;}
     
    .fadein {
    position:relative; height:332px; width:300px; margin:0 auto;
    background: url("slideshow-bg.png") repeat-x scroll left top transparent;
    padding: 10px;
    }
    .fadein img { position:absolute; left:10px; top:10px; }
    </style>
     
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script>
    $(function(){
    $('.fadein img:gt(0)').hide();
    setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
    });
    </script>
     
    </head>
    <body>
    <div class="fadein">
    <img src="sk5.jpg" alt="1">
    <img src="sk6.jpg"alt="2">
    <img src="sk4.jpg"alt="3">
    <img src="sk7.jpg"alt="4">
    <img src="sk1.jpg"alt="5">
    </div>
    </body>
    
 </div>
             
                      

<div class="wrapper row10"> 
      <div style="margin-top:100px;" class="lineBlack">
            <div class="container">
                <div class="row downLine">
                    <div class="col-md-12 text-right">
                                          <div class="col-md-6 text-left copy">
                            <p>Copyright &copy; 2014 Build Your Brand. All Rights Reserved.</p>
                        </div>
                        <div class="col-md-6 text-right dm">
                           <div class="col-md-10">
                                <div class="navmenu"style="text-align: center;">
                                    <ul id="menu">
                                        <li><p href="../newindex.php">Home</p></li>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
