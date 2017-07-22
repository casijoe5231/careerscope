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
    

<!--new kal-->
<!-- favicon -->
		<link rel="shortcut icon" href="/assets/favicon.ico" type="image/x-icon" /> 

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="verify-v1" content="+J21X+3KbH1F9F9+Sel4Pab3hJlNw7mdm85lPLFeHVU=" />

		<!-- Web Fonts  -->
				<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Libs CSS -->
		<link rel="stylesheet" href="/assets/css/bootstrap.css">
		<link rel="stylesheet" href="/assets/css/fonts/font-awesome/css/font-awesome.css">
		<link rel="stylesheet" href="/assets/vendor/owl-carousel/owl.carousel.css" media="screen">
		<link rel="stylesheet" href="/assets/vendor/owl-carousel/owl.theme.css" media="screen">
		<link rel="stylesheet" href="/assets/vendor/magnific-popup/magnific-popup.css" media="screen">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="/assets/css/theme.css">
		<link rel="stylesheet" href="/assets/css/theme-elements.css">
		<link rel="stylesheet" href="/assets/css/theme-animate.css">

		<!-- Current Page Styles -->
		<link rel="stylesheet" href="/assets/vendor/rs-plugin/css/settings.css" media="screen">
		<link rel="stylesheet" href="/assets/vendor/circle-flip-slideshow/css/component.css" media="screen">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="/assets/css/skins/blue.css">

		<!-- Custom CSS -->
		<link rel="stylesheet" href="/assets/css/custom.css">

		<!-- Responsive CSS -->
		<link rel="stylesheet" href="/assets/css/theme-responsive.css" />
<!--kal-->
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
                              <h1>Soft Skills Brand</h1> <img src="../images/sk2.jpeg" width="230" height="200">
<h2>Can you Effectively Deal with the Following traits of your personality ? ?</h2>
<h3>Check it Out</h3>

<!--Soft skills menu-->
<div class="container">

    <div style="padding:20px;" class="panel panel-default">
            <div class="row">
            <!------new addede--->  

<li class="dropdown">
          <a href="site_map.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Coomunication Skills<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
<li><a href="stressman.php">JavaScript Home</a></li>
            <li><a href=document-object.php>document</a> </li><li> <a href=window-object.php>window</a> </li><li> <a href='string.php'>String</a> </li><li> <a href='array.php'>Array</a> </li><li> <a href='date.php'>Date & Time</a> </li><li> <a href=javascript_validation.php>Form Validation</a> </li><li> <a href=event.php>Event handling</a> </li><li> <a href=math.php>Math</a> </li><li> <a href=basic-loop.php>basic loop</a></li>
          </ul>
        </li>

<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
						<i class="icon icon-bars"></i>
					</button>
<div class="navbar-collapse nav-main-collapse collapse">
					<div class="container">
<nav class="nav-main mega-menu">
	<ul class="nav nav-pills nav-main" id="mainMenu">
<li class="dropdown">
			<a class="dropdown-toggle" href="#">Contact Us<i class="icon icon-angle-down"></i></a>
			<ul class="dropdown-menu">
				<li><a href="/contact">Contact Us</a></li>
			</ul>
		</li>
</ul>
</nav>
	
 </div>
</div>


               <nav class="nav-bar rfloat">
<ul>
<li class="cart-no"><a href="/checkout.php"><span class="ic-cart"></span><span class="shp-cart-no" id="dashboard-cartItemCount"></span></a></li>
<li><a href="http://cp.in.bluehost.com/customer">Login</a></li>
<li class="nav-dd"><a href="/sitelock.php">Security</a>
<ul class="sub-nav">
<li><a href="/sitelock.php">SiteLock</a></li>
<li><a href="/codeguard.php">CodeGuard</a></li>
</ul>
</li>
<li><a href="/dedicated-servers.php">Dedicated Servers</a></li>
<li><a href="/vps-hosting.php">VPS</a></li>
<li class="nav-dd"><a href="/reseller-hosting.php">Reseller Hosting</a>
<ul class="sub-nav">
<li><a href="/reseller-hosting.php">Linux Hosting</a></li>
<li><a href="/windows-reseller-hosting.php">Windows Hosting</a></li>
</ul>
</li>
<li class="nav-dd"><a href="/web-hosting/index.php">Shared Hosting</a>
<ul class="sub-nav">
<li><a href="/web-hosting/index.php">Linux Hosting</a></li>
<li><a href="/web-hosting/windows-hosting.php">Windows Hosting</a></li>
<li><a href="/web-hosting/wordpress.php">Wordpress Hosting</a></li>
</ul>
</li>
</ul>
</nav>
<div class="btm-bg"></div>
</div>
</li>
<li class=" box-2" id="hosting-list">
<a href="/web-hosting/index.php" id="menu-hostingsection">
<span class="menu-left"></span>
<span class="menu-mid">Web Hosting</span>
<span class="menu-right"></span>
</a>
<div class="sub" id="subn-2">
<ul>
<li class="nav-ic-1"><a href="/web-hosting/linux-php-hosting.php"><span class="menu-ic lnx"></span>Linux Hosting <span class="nav-note">cPanel, PHP, Apache and more</span></a></li>
<li class="nav-ic-2"><a href="/web-hosting/windows-hosting.php"><span class="menu-ic win"></span>Windows Hosting <span class="nav-note">Plesk, ASP, IIS and more</span></a></li>
<li class="nav-ic-5"><a href="/reseller-hosting.php"><span class="menu-ic rh"></span>Linux Reseller Hosting<span class="nav-note">Start your Hosting Business here</span></a></li>
<li class="nav-ic-2"><a href="/windows-reseller-hosting.php"><span class="menu-ic rhw"></span>Windows Reseller Hosting<span class="nav-note">Start your Windows Hosting Business here</span></a></li>
</ul>
<div class="btm-bg"></div>
</div>
</li>
<li class="">
<a href="/vps-hosting.php" id="menu-vpssection">
<span class="menu-left"></span>
<span class="menu-mid">VPS</span>
<span class="menu-right"></span>
</a>
</li>
<li class="">
<a href="/dedicated-servers.php" id="menu-dedicatedserverssection">
<span class="menu-left"></span>
<span class="menu-mid">Dedicated Servers</span>
<span class="menu-right"></span>
</a>
</li>
<li class="">
<a href="/support/contact-us.php">
<span class="menu-left"></span>
<span class="menu-mid">Support</span>
<span class="menu-right"></span>
</a>
</li>
</ul>
</div>
<span class="l-corner"></span>
<span class="r-corner"></span>
</div>
<script type="text/javascript" pagespeed_no_defer="">pagespeed.lazyLoadImages.overrideAttributeFunctions();</script><script type="text/javascript">

$(".navigation li").hover(
  function () {
    $(this).addClass("nav-hover");	
  },
  function () {
    $(this).removeClass("nav-hover");
  }
);

</script>

<!----new added--->




                    
                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="stressman.php">Stress Management</a></div>
<div class="col-sm-2"> 
                    <a class="btn btn-default btn-block" href="stressman.php">Change Management</a></div>
                <div class="col-sm-2"> 
                    <a class="btn btn-default btn-block" href="stressman.php">Mood Management</a></div>
<div class="col-sm-2"> 
                    <a class="btn btn-default btn-block" href="stressman.php">Leadership Skills</a></div>
<div class="col-sm-2"> 
                    <a class="btn btn-default btn-block" href="stressman.php">Aspiration Management</a></div>
<div class="col-sm-2"> 
                    <a class="btn btn-default btn-block" href="stressman.php">Time Management</a></div>
<div class="col-sm-2"> 
                    <a class="btn btn-default btn-block" href="stressman.php">Diversity Management</a></div>
<div class="col-sm-2"> 
                    <a class="btn btn-default btn-block" href="stressman.php">Image Management</a></div>
              </div>  
        </div>

<!--Soft skills menu-->
    
                <!--content goes here-->
                <div class="row">
                   <div class="row" style="padding-top:10px;padding-bottom:20px;">
           </div>

                                  

                              
                             <div class="row">
                                  <div class="col-sm-12 animateFadeInUp">
                                      <div class="panel panel-default">
                                          <div class="panel-heading"><h4> Soft skill are very important to handle interpersonal relations, to take appropriate decisions, to communicate effectively, to have good impression and impact to gain professional development</h4></div>
                                         
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
