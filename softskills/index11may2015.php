n<?php

    session_start();

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }

    if ($_SESSION['usertype']!=1) {
        if ($_SESSION['usertype']!=2) {
            header("location:../login.php");
        }
    }
include_once "../includes/connection2.php";

if (mysqli_connect_errno()){
  echo "<br />Failed to connect to mysql: " . mysqli_connect_error();
}


$stmt1="SELECT discipline FROM subject_kash GROUP BY discipline";
$query1=mysqli_query($con,$stmt1);
if(!$query1){
  echo "query1 execution unsuccessful". mysqli_error($con);
}
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" >
    <head>
        <!--  <base href="http://www.dbimr.org/" />-->
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="generator" content="Bluefish 2.2.5" />
 <title>Home - SoftSkills</title>
  <link href="/?format=feed&amp;type=rss" rel="alternate" type="application/rss+xml" title="RSS 2.0" />
  <link href="/?format=feed&amp;type=atom" rel="alternate" type="application/atom+xml" title="Atom 1.0" />
  <link rel="stylesheet" href="/libraries/gantry/css/grid-12.css" type="text/css" />
  <link rel="stylesheet" href="/libraries/gantry/css/gantry.css" type="text/css" />
  <link rel="stylesheet" href="/libraries/gantry/css/joomla.css" type="text/css" />
  <link rel="stylesheet" href="/templates/rt_gantry/css/style3.css" type="text/css" />
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Short+Stack" type="text/css" />
  <link rel="stylesheet" href="/templates/rt_gantry/css/template.css" type="text/css" />
  <link rel="stylesheet" href="/templates/rt_gantry/css/fusionmenu.css" type="text/css" />
  <link rel="stylesheet" href="/modules/mod_sp_quickcontact/assets/css/style.css" type="text/css" />
  <link rel="stylesheet" href="/plugins/content/jw_allvideos/jw_allvideos/tmpl/Classic/css/template.css" type="text/css" />
  <link rel="stylesheet" type="text/css" href="css/carousel.css">  
  <style type="text/css">
body {background:transparent;}
body a {color:#a62c24;}#rt-header .rt-container {background:transparent;}#rt-bottom .rt-container {background:transparent;}
#rt-footer .rt-container, #rt-copyright .rt-container, #rt-menu .rt-container {background:transparent;}h1, h2 { font-family: 'Short Stack', 'Helvetica', arial, serif; }
body #rt-logo {width:806px;height:75px;}
  </style>

  <script src="/media/system/js/mootools-core.js" type="text/javascript"></script>
  <script src="/media/system/js/core.js" type="text/javascript"></script>
  <script src="/media/system/js/caption.js" type="text/javascript"></script>
  <script src="/media/system/js/mootools-more.js" type="text/javascript"></script>
  <script src="/libraries/gantry/js/gantry-buildspans.js" type="text/javascript"></script>
  <script src="/libraries/gantry/js/browser-engines.js" type="text/javascript"></script>
  <script src="/modules/mod_roknavmenu/themes/fusion/js/fusion.js" type="text/javascript"></script>
  <script src="/modules/mod_sp_quickcontact/assets/js/script.js" type="text/javascript"></script>
  <script src="/plugins/content/jw_allvideos/jw_allvideos/includes/js/behaviour.js" type="text/javascript"></script>
  <script src="/plugins/content/jw_allvideos/jw_allvideos/includes/js/mediaplayer/jwplayer.js" type="text/javascript"></script>
  <script src="/plugins/content/jw_allvideos/jw_allvideos/includes/js/wmvplayer/silverlight.js" type="text/javascript"></script>
  <script src="/plugins/content/jw_allvideos/jw_allvideos/includes/js/wmvplayer/wmvplayer.js" type="text/javascript"></script>
  <script src="/plugins/content/jw_allvideos/jw_allvideos/includes/js/quicktimeplayer/AC_QuickTime.js" type="text/javascript"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript">
window.addEvent('load', function() {
				new JCaption('img.caption');
			});
			window.addEvent('domready', function() {
			var modules = ['rt-block'];
			var header = ['h3','h2','h1'];
			GantryBuildSpans(modules, header);
			});
		

window.addEvent('domready', function() {
                new Fusion('ul.menutop', {
                    pill: 0,
                    effect: 'slide and fade',
                    opacity:  1,
                    hideDelay:  500,
                    centered:  0,
                    tweakInitial: {'x': -10, 'y': -13},
                    tweakSubsequent: {'x':  0, 'y':  0},
                    tweakSizes: {'width': 20, 'height': 20},
                    menuFx: {duration:  300, transition: Fx.Transitions.Circ.easeOut},
                    pillFx: {duration:  400, transition: Fx.Transitions.Back.easeOut}
                });
            
});
  </script>
  
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


    
    <!--Timber Header-->
      <div id="home">
    	<div style="margin-bottom:20px;" class="headerLine">
	<div id="menuF" class="default" style="margin-bottom:25px;">
		<div class="container">
			<div class="row">
				<div class="logo col-md-2">
					<div>
						<a href="#">
								<img src="byblogo.png" width="120" height="120">
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
    <!--TimberHeader-->
<div class="bb-item" id="page-3">
                      <div class="bb-custom-side" id="experience">
                          <div class="bb-custom-container">
                            <!-- <h1>Soft Skills Brand</h1> <img src="../images/sk2.jpeg" width="230" height="200">-->
<h2>Can you Effectively Deal with the Following traits of your personality ? ?</h2>
<h3>Check it Out</h3>

     
				<div class="clear"></div>
			</div>
		</div>
						<div id="rt-menu">
			<div class="rt-container">
				<div class="rt-fusionmenu">
				
				
			
<!--  Welcome Bar  -->
        <nav class="navbar-container">
            <ul class="nav nav-pills navbar-left">
                <p class="navbar-brand">Welcome BYB,</p>
            </ul>
            <ul class="nav nav-pills navbar-right" style="margin-top:6px; margin-right:10px;">
            <li style="padding: 0 8px 0 8px;"><a id="loginbutton" href="eportfolio/choose.php" style="padding: 6px 12px;" class="btn btn-md btn-default">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"> </span> Choose Your Mentor
                    </a>
                </li>
                <li style="padding: 0 8px 0 8px;"><button id="loginbutton" value="Chat with mentors"   style="padding: 6px 12px;" class="btn btn-md btn-default">
                    <span class="glyphicon glyphicon-comment" aria-hidden="true"> </span> Chat with Mentors
                    </button>
                </li>
                <li style="padding: 0 8px 0 8px;"><a href="logout.php" style="padding: 6px 12px;" class="btn btn-md btn-default">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"> </span> Log Out
                    </a>
                </li>
            </ul>  
        </nav>

<!--  /Welcome Bar  -->
<div class="nopill">
<div class="rt-menubar">
    <ul class="menutop level1 " >
                        <li class="item103 parent root" >
                            <a class="btn btn-default btn-block" href="leadership"  >
                    <span>
                                        Leadership Skills                                                            </span>
                </a>
            
                                                <div class="fusion-submenu-wrapper level2" style="width:180px;">
                        
                        <ul class="level2" style="width:180px;">
                                                                                                        <li class="item114" >
                            <a class="orphan item bullet" href="cognizance"  >
                    <span>
                                        Cognizance                                                           </span>
                </a>
            
                    </li>
                                                                                                                                                <li class="item115" >
                            <a class="orphan item bullet" href="taketest"  >
                    <span>
                                        Take Test                                                             </span>
                </a>
            
                    </li>
                               
                                                                                            </ul>

                                                <div class="drop-bot"></div>
                    </div>
                                    </li>
                                <li class="item106 parent root" >
                            <a class="daddy item bullet" href="communicate"  >
                    <span>
                                        Communicate                                                             </span>
                </a>
            
                                                <div class="fusion-submenu-wrapper level2" style="width:180px;">
                        
                        <ul class="level2" style="width:180px;">
                                 <li class="item126" >
                            <a class="daddy item bullet" href="speaking"  >
                    <span>
                                        Art of Speaking                                                            </span>
                </a>
                <div class="fusion-submenu-wrapper level3" style="width:180px;">
                        
                        <ul class="level3" style="width:180px;">
                                                                                                        <li class="item124" >
                            <a class="orphan item bullet" href="kowhow"  >
                    <span>
                                        Get it Well Said                                                            </span>
                </a>
            
                    </li>
                                                                                                                                                <li class="item144" >
                            <a class="orphan item bullet" href="tt"  >
                    <span>
                                        Take test                                                           </span>
                </a>
            
                    </li>
                                                                                            </ul>

                                                <div class="drop-bot"></div>
                    </div>
            
                    </li>
                                                        <li class="item127" >
                            <a class="daddy item bullet" href="writing"  >
                    <span>
                                        Art of writing                                                            </span>
                </a>
            <div class="fusion-submenu-wrapper level3" style="width:180px;">
                        
                        <ul class="level3" style="width:180px;">
                                                             <li class="item124" >
                            <a class="orphan item bullet" href="write"  >
                    <span>
                                        Get it Well Written                                                            </span>
                </a>
            
                    </li>
                                                                               <li class="item144" >
                            <a class="orphan item bullet" href="ttw">
                    <span>
                                        Take Test                                                            </span>
                </a>
            
                    </li>
                                                                                            </ul>

                                                <div class="drop-bot"></div>
                    </div>
                    </li>
                                                                                                                                                <li class="item128" >
                            <a class="daddy item bullet" href="gd"  >
                    <span>
                                        Group Discussion                                                            </span>
                </a>
            <div class="fusion-submenu-wrapper level3" style="width:180px;">
                        
                        <ul class="level3" style="width:180px;">
                                                                                                        <li class="item124" >
                            <a class="orphan item bullet" href="together"  >
                    <span>
                                        Get together                                                            </span>
                </a>
            
                    </li>
                                                                                                                                                <li class="item144" >
                            <a class="orphan item bullet" href="ttgd"  >
                    <span>
                                        Take Test                                                           </span>
                </a>
            
                    </li>
                                                                                            </ul>

                                                <div class="drop-bot"></div>
                    </div>
                    </li>
                                  
                                                                                            </ul>

                                                <div class="drop-bot"></div>
                    </div>
                                    </li>
                                <li class="item138 parent root" >
                            <a class="daddy item bullet" href="tm"  >
                    <span>
                                        Time Management                                                           </span>
                </a>
            
                                                <div class="fusion-submenu-wrapper level2" style="width:180px;">
                        
                        <ul class="level2" style="width:180px;">
                                    <li class="item139" >
                            <a class="orphan item bullet" href="tmcog"  >
                    <span>
                                        Cognizance                                                            </span>
                </a>
            
                    </li>
                                 <li class="item140" >
                            <a class="orphan item bullet" href="Timeconstraint"  >
                    <span>
                                        Know your Time Constraint                                                            </span>
                </a>
            
                    </li>
                                                                                            </ul>

                                                <div class="drop-bot"></div>
                    </div>
                                    </li>
                                <li class="item178 parent root" >
                            <a class="daddy item bullet" href="stress"  >
                    <span>
                                        Stress Management                                                            </span>
                </a>
             <div class="fusion-submenu-wrapper level2" style="width:180px;">
                        
                        <ul class="level2" style="width:180px;">
                        <li class="item141 root" >
                            <a class="orphan item bullet" href="stresscog"  >
                    <span>
                                        Cognizance                                                            </span>
                </a>
            
                    </li>
                    
                     <li class="item142 root" >
                            <a class="orphan item bullet" href="stresscog"  >
                    <span>
                                        Know your Stress                                                           </span>
                </a>
            
                    </li>
                    
                       <div class="drop-bot"></div>
                    </div>
                    </li>
                                
                                <li class="item133 parent root" >
                            <a class="daddy item bullet" href="IMage"  >
                    <span>
                                        Image Management                                                            </span>
                </a>
            
                                                <div class="fusion-submenu-wrapper level2" style="width:180px;">
                        
                        <ul class="level2" style="width:180px;">
                                        <li class="item191" >
                            <a class="daddy item bullet" href="BL"  >
                    <span>
                                        Body Language                                                            </span>
                </a>
            
            <div class="fusion-submenu-wrapper level3" style="width:180px;">
                        
                        <ul class="level3" style="width:180px;">
                                                             <li class="item124" >
                            <a class="orphan item bullet" href="testb"  >
                    <span>
                                        Know How                                                           </span>
                </a>
            
                    </li>
                                                                               <li class="item144" >
                            <a class="orphan item bullet" href="ttw">
                    <span>
                                        Take Test                                                            </span>
                </a>
            
                    </li>
                                                                                            </ul>

                                                <div class="drop-bot"></div>
                    </div>
                    </li>
                                                                                           <li class="item134" >
                            <a class="daddy item bullet" href="em"  >
                    <span>
                              Etiquette and Manners   </span> 
                    </a>
                    <div class="fusion-submenu-wrapper level3" style="width:180px;">
                        
                        <ul class="level3" style="width:180px;">
                                                             <li class="item135" >
                            <a class="orphan item bullet" href="teset"  >
                    <span>
                                        Know How                                                           </span>
                </a>
            
                    </li>
                                                                               <li class="item37" >
                            <a class="orphan item bullet" href="tye">
                    <span>
                                        Test Your Etiquettes                                                            </span>
                </a>
            
                    </li>
                                                                                            </ul>

                                                <div class="drop-bot"></div>
                    </div>          
                        </li>                                                                                                                        <li class="item135 parent" >
                            <a class="daddy item bullet" href="IS"  >
                    <span>
                                        Interview Skills                                                           </span>
                </a>
            
                                                <div class="fusion-submenu-wrapper level3" style="width:180px;">
                        
                        <ul class="level3" style="width:180px;">
                                                                                                        <li class="item182" >
                            <a class="orphan item bullet" href="int"  >
                    <span>
                                        Know to Crack it                                                           </span>
                </a>
                                </li>
                                                                   <li class="item183" >
                            <a class="orphan item bullet" href="testint" target="_blank" >
                    <span>
                                        Test your skills                                                           </span>
                </a>
                                </li>
                                                      </ul>

                                                <div class="drop-bot"></div>
                    </div>
                                    </li>
                                                      </ul>
                                                <div class="drop-bot"></div>
                                  

                    </div>
                                    </li>
                                <li class="item111 parent root" >
                            <a class="daddy item bullet" href="chng"  >
                    <span>
                                        Change Management                                                            </span>
                </a>
            
                                                <div class="fusion-submenu-wrapper level2" style="width:180px;">
                        
                        <ul class="level2" style="width:180px;">
                                                                                                        <li class="item190" >
                            <a class="orphan item bullet" href="chngknow"  >
                    <span>
                                        Know what                                                            </span>
                </a>
            
                    </li>
                                                                                  <li class="item189" >
                            <a class="orphan item bullet" href="testchg"  >
                    <span>
                                        Take the Test                                                           </span>
                </a>
            
                    </li>
                                                                                         </ul>

                                                <div class="drop-bot"></div>
                    </div>
                                    </li>
                                <li class="item160 root" >
                            <a class="daddy item bullet" href="div"  >
                    <span>
                                        Diversity Management                                                            </span>
                </a>
             <div class="fusion-submenu-wrapper level2" style="width:180px;">
                        
                        <ul class="level2" style="width:180px;">
                                                                                                        <li class="item191" >
                            <a class="orphan item bullet" href="chngknow"  >
                    <span>
                                        Know what                                                            </span>
                </a>
            
                    </li>
                                                                                  <li class="item192" >
                            <a class="orphan item bullet" href="testchg"  >
                    <span>
                                        Take the Test                                                           </span>
                </a>
            
                    </li>
                                                                                         </ul>

                                                <div class="drop-bot"></div>
                    </div>
                    </li>
                                <li class="item113 root" >
                            <a class="daddy item bullet" href="divkw"  >
                    <span>
                                        Emotional Intelligence                                                           </span>
                </a>
             <div class="fusion-submenu-wrapper level2" style="width:180px;">
                        
                        <ul class="level2" style="width:180px;">
                                                                                                        <li class="item193" >
                            <a class="orphan item bullet" href="chngknow"  >
                    <span>
                                        Know what                                                            </span>
                </a>
            
                    </li>
                                                                                  <li class="item194" >
                            <a class="orphan item bullet" href="testchg"  >
                    <span>
                                        Take the Test                                                           </span>
                </a>
            
                    </li>
                                                                                         </ul>

                                                <div class="drop-bot"></div>
                    </div>
                    </li>
                    </ul>
</div>
</div>
</div>
				<div class="clear"></div>
			</div>
		</div>
						<div id="rt-showcase">
			<div class="rt-container">
				<div class="rt-grid-12 rt-alpha rt-omega">
                    <div class="gallery">
                    <div class="rt-block">
                                <!--  Begin "Unite Nivo Slider" -->
		<!--
				
		<div class="nivo-slider-wrapper theme-default" style="max-width:920px;max-height:205px;margin:0px auto;margin-top:0px;margin-bottom:0px;">
			<div id="nivo_slider_87" class="nivoSlider">
												
													<img src="localhost/careerscope/softskills/sk1.jpg" alt="" />
														
														
															<img src="http://www.dbimr.org/images/gallery/2.jpg" alt="" />
														
														
															<img src="http://www.dbimr.org/images/gallery/3.jpg" alt="" />
														
														
															<img src="http://www.dbimr.org/images/gallery/4.jpg" alt="" />
														
														
															<img src="http://www.dbimr.org/images/gallery/5.jpg" alt="" />
														
														
															<img src="http://www.dbimr.org/images/gallery/6.jpg" alt="" />
														
														
															<img src="http://www.dbimr.org/images/gallery/7.jpg" alt="" />
														
										</div>		
								
		</div>
				
	
<script type="text/javascript">


jQuery(document).ready(function() {
		
	jQuery('#nivo_slider_87').show().nivoSlider({
			effect: 'boxRandom',
			slices: 15,
			boxCols: 8,
			boxRows: 4,
			animSpeed: 500,
			pauseTime: 3000,
			startSlide: 0,
			directionNav: false,
			controlNav: false,
			controlNavThumbs: false,
			pauseOnHover: true,
			manualAdvance: false,
			prevText: 'Prev',
			nextText: 'Next',
			randomStart: false,
			beforeChange: function(){},
			afterChange: function(){},
			slideshowEnd: function(){},
		    lastSlide: function(){},
		    afterLoad: function(){}		});
	});	//ready

</script>
-->
<!--  End "Unite Nivo Slider" -->
            </div>
                </div>
		
</div>
				<div class="clear"></div>
			</div>
		</div>
						<div id="rt-feature">
			<div class="rt-container">
				<div class="rt-grid-4 rt-alpha">
                        <div class="rt-block">
                                
</p>
<p>

</p>
<p>


</p>
<p>&nbsp;</p></div>
            </div>
        	                    <div class="rt-block">
                                
 </a>
</p></div>
            </div>
        	
</div>
				<div class="clear"></div>
			</div>
		</div>
		
		
		
<!--Timber Footer-->
    
    <footer>
      <div class="lineBlack">
			<div class="container">
				<div class="row downLine">
					<div class="col-md-20 text-right">						
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

