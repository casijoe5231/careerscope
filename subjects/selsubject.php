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
        <link href="../images/favicon.ico" rel="shortcut icon"/> 

        <title>BYB | Psychometric Test </title>
        <meta charset="utf-8" />
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
        <!--script type="text/javascript" src="../js/jquery.nav.js"></script-->


        
    </head>
    <body>

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
						                
					               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Main Content Here -->
        
        <div class="container">

        <div style="padding:10px;" class="panel panel-default">
            <div class="row">
                <div class="col-sm-2">
                    <h5>Welcome <?php echo $_SESSION['user'][1]; ?>,</h5>
                </div>
                <div class="col-sm-10">
                    <div class="col-sm-6"></div>

                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="home.php">My Test </a></div>
                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../newindex.php"><span class="glyphicon glyphicon-home" > Home</span></a></div>
                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../logout.php">Logout</a></div>
                
                </div>
            </div>
        </div>

        <h1 style="padding-bottom:40px;">Subject Tests</h1>

    <center><b>
	
	<center>
    <div class="panel panel-primary" style="width:1100px; margin-left: auto; margin-right: auto; margin-top: 35px;">
        <div class="panel-heading">
            <h2 class="panel-title">Semester 7</h2>
        </div>
        <div class="panel-body">
	
	
            <div style="padding-bottom:40px;" class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="../images/subject/dsp1.jpg" alt="Generic placeholder image" style="width: 180px; height: 180px;">
          <h4>Digital Signal Processing</h4>
          <p><a class="btn btn-info" href="select.php?type=dsp" role="button">Take Test &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="../images/subject/AI.jpg" alt="Generic placeholder image" style="width: 180px; height: 180px;">
          <h4>Artificial Intelligence</h4>
          <p><a class="btn btn-info" href="select.php?type=ai " role="button">Take Test &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="../images/subject/CSS.jpg" alt="Generic placeholder image" style="width: 180px; height: 180px;">
          <h4>Cryptography System And Security</h4>
          <p><a class="btn btn-info" href="select.php?type=css" role="button">Take Test &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
       
		<h3 style="padding-bottom:40px;color:#5858FA;">Elective</h3>

        <!-- Three columns of Tests -->
      <div style="padding-bottom:40px;" class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="../images/subject/im.jpg" alt="Generic placeholder image" style="background-color:rgb(0,0,0);width: 180px; height: 180px;">
          <h4>Image Processing</h4>
          <p><a class="btn btn-info" href="select.php?type=im " role="button">Take Test &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
		 <div class="col-lg-4">
          <img class="img-circle" src="../images/subject/erp.jpg" alt="Generic placeholder image" style="width: 180px; height: 180px;">
          <h4>Erp & Scm</h4>
          <p><a class="btn btn-info" href="select.php?type=erp&scm" role="button">Take Test &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
       
        <div class="col-lg-4">
          <img class="img-circle" src="../images/subject/sc.jpg" alt="Generic placeholder image" style="width: 180px; height: 180px;">
          <h4>Soft Computing</h4>
          <p><a class="btn btn-info" href="select.php?type=sc " role="button">Take Test &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
        
            
</center>
        </div>
        
        <!-- End of the main content -->
        
        

  <div class="lineBlack">
            <div class="container">
                <div class="row downLine">
                    <div class="col-md-12 text-right">
                        <!--input  id="searchPattern" type="search" name="pattern" value="Search the Site" onblur="if(this.value=='') {this.value='Search the Site'; }" onfocus="if(this.value =='Search the Site' ) this.value='';this.style.fontStyle='normal';" style="font-style: normal;"/-->
                        <!--	<input  id="searchPattern" type="search" placeholder="Search the Site"/><i class="glyphicon glyphicon-search" style="font-size: 13px; color:#a5a5a5;" id="iS"></i>
</div>-->
                        <div class="col-md-6 text-left copy">
                            <p>Copyright &copy; 2014 Build Your Brand. All Rights Reserved.</p>
                        </div>
                        <div class="col-md-6 text-right dm">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


