<?php
    include 'includes/headerfooter.php';
    session_start();
    if(!(($_SESSION['usertype']>=10 && $_SESSION['usertype']<=13) || ($_SESSION['usertype']>=15 && $_SESSION['usertype']<=18)))
    {
        header("location:login.php");
    }
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
<!--All things related to GALLERY-->
    <meta charset="utf-8">
    <title>BYB | Upload KASH</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
<!--******************************************************************************************************-->  
<!--CSS & JS related to Timber-->
    <link href=" ../css/bootstrap.min3.css" rel="stylesheet">
    <link href=" ../css/glyphicons3.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href=" ../css/jquery-ui3.css" />
    
    <!-- Favicon -->
    <link href=" ../images/favicon.ico" rel="shortcut icon"/> 

    <!-- Bootstrap Core CSS -->
    <link href=" ../css/bootstrap.css" rel="stylesheet" type="text/css" />

    <!-- Other CSS -->
    <link href='http://fonts.googleapis.com/css?family=Revalia%7COswald%7COpen+Sans+Condensed:300%7CRoboto' rel='stylesheet' type='text/css' />

    
    <!--Additional CSS-->
		<link rel="stylesheet" type="text/css" href=" ../css/font-awesome.css">
		<link rel='stylesheet' id='camera-css'  href=' ../css/camera.css' type='text/css' media='all'>
		<link rel="stylesheet" type="text/css" href=" ../css/slicknav.css">
		<link rel="stylesheet" href=" ../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<link rel="stylesheet" type="text/css" href=" ../css/style2.css">
        <link href=" ../css/animate2.css" rel="stylesheet">
    <!--/Additional CSS-->
    
    <!--javascript-->
    <script type="text/javascript" src=" ../js/bootstrap.min.js"></script>
    
<!--End of CSS & JS related to Timber-->

</head>
<body>
    <!--Timber Header-->
      <div style="margin-bottom:20px;" id="home">
    	<div class="headerLine">
	<div id="menuF" class="default" style="margin-bottom:25px;">
		<div class="container">
			<div class="row">
				<div class="logo col-md-2">
					<div>
						<a href="#">
								<img src=" ../images/byblogo.png" width="120" height="120">
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
    <center>
  <div class="container">



<div style="padding:10px;" class="panel panel-default">
            <div class="row">
                <div class="col-sm-2">
                    <h5>Welcome <?php echo $_SESSION['user'][1]; ?>,</h5>
                </div>
                <div class="col-sm-10">
                    <div class="col-sm-8"></div>

                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../login.php">Home</a></div>
                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../logout.php">Logout</a></div>
                
                </div>
            </div>
        </div>


    <div class=" col-md-5 col-md-offset-3">
              <h2 class="text-center"><span class="page-heading">KASH Model</span></h2>
      <div class="panel panel-default"  style="margin-top:40px;">
          <div class="panel-heading">
            Upload your KASH file
          </div>
          <div class="panel-body">
            <?php
                if(isset($_GET['done'])){
                    $done=$_GET['done'];
                    if($done==0){
                        echo '<div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                </button>
                                <strong>Oops!</strong> Some error has occured. Your file wasn\'t uploaded.
                              </div>';
                    }
                    else if($done==1){
                        echo '<div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                </button>
                                <strong>Yaaay!</strong> Your file has been uploaded.
                              </div>';
                    }
                }
            ?>

                <form enctype="multipart/form-data" action="upload-process.php" method="post">
                    <input class="btn btn-default" type="file" name="KASHfile" accept="file/*"><br>
                    <button class="btn btn-default" type="submit" name="submit">Upload</button>
                </form>

            </div>
      </div>
      </div>
    </div></center>
<!--Timber Footer-->
    
    <footer style="margin-top:110px;">
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
<!--/TimberFooter-->    
</body>
</html>