<?php
    
	include 'includes/headerfooter.php';
    session_start();
    if($_SESSION['usertype']>=9 && $_SESSION['usertype']<=14)
	
		echo "usertype:".$_SESSION['usertype'];
		include 'includes/connection2.php';
		
		$emaill=$_SESSION['user'][0];
		$usertype=$_SESSION['usertype'];
		 $sql5="select * from masteruser where email='$emaill'";
    $res5=mysqli_query($GLOBALS["___mysqli_ston"], $sql5);
   while($row5=mysqli_fetch_array($res5))
    {
      $_SESSION['institute']=$row5['institute'];
    }
    
		date_default_timezone_set('Asia/Calcutta');
		$datetime = date("F j, Y, g:i a");
		$timesql = date("Y-m-d H:i:s"); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
<!-- Favicon -->
    <link href="images/favicon.ico" rel="shortcut icon"/>
	
    <title>BYB | Administrator Menu </title>
      
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
        


        <!--Custom CSS-->
<link rel="stylesheet" type="text/css" href="css/ColumnFilterWidGETs.css">
<script type="text/javascript" charset="utf-8" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="js/ColVis.js"></script>
<link rel="stylesheet" type="text/css" href="css/ColVis.css">

  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script  type="text/javascript" src="validator2.js" ></script>

<script>
$(document).ready( function () {
    $('#details').dataTable( {
         bAutoWidth:false ,
        "sDom": 'W<"clear">lfrtip',
         oColumnFilterWidGETs: {
        aiExclude: [7,8]
       }
    } );
} );


/*$(document).ready( function () {
    $("#details").dataTable().columnFilter();
} );*/
</script>

    </head>
<body>
    <!--header-->
<div class="mast">
<div class="container">
        <div class="row">
            <div class="logo col-md-1">
                <div>
                    <a href="#">
                        <img src="images/byblogo.png" width="90" height="90">
                    </a>
                </div>
            </div>
            <div class="col-md-11">
                <div class="mast-nav" style="text-align: center;">
                    <ul id="menu" style="color: red;" >
                        <li><a href="lecturerdetails.php">Existing Staff Details</a>
                        </li>
                        <li class="active"><a href="assigntask.php">Assign Task</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div> 
</div>
   

    <div style="margin-top:120px;" class="container">

    <div style="padding:10px;" class="panel panel-default">
    <div class="row">
        <div class="col-sm-3">
            <h5>Welcome <?php echo $_SESSION['user'][1]; ?>,</h5>
        </div>
        <div class="col-sm-8">
            
        </div>
        <div class="col-sm-1">
            <a class="btn btn-default btn-block" href="logout.php">Logout</a>
        </div>
        
    </div>
</div>
<h4>Computer Science</h4>
    	<a href="#">First Year</a><br>
		<a href="#">Second Year</a><br>
		<a href="#">Third Year</a><br>
		<a href="assigntask.php">BE</a>
		
	   


        
<!--  Footer  -->
<div class="lineBlack">
    <div class="container">
        <div class="row downLine">
            <div class="col-md-12 text-right">
            </div>
            <div class="col-md-6 text-left copy">
                <p>Copyright &copy; 2014 Build Your Brand. All Rights Reserved.</p>
            </div>
            <div class="col-md-6 text-right dm">
                <ul id="downMenu">
                    <li class="active"><a href="#home">Home</a>
                    </li>
                    <li><a href="#" tarGET="blank">Link 1</a>
                    </li>
                    <li><a href="#" tarGET="blank">Link 2</a>
                    </li>
                    <li><a href="#" tarGET="blank">Link 3</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--  End of Footer  -->
</body>
</html>