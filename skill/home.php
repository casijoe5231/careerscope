<?php
  session_start();
  if(isset($_SESSION['user']))
  {
  include '../includes/connection1.php';
  echo $_SESSION['usertype'];
  $email=$_SESSION['user'][0];
  $con=mysqli_connect("localhost","root","","careerscope");
  date_default_timezone_set('Asia/Calcutta');
  $datetime = date("F j, Y, g:i a");
  $timesql = date("Y-m-d H:i:s"); 
  $sql="insert into activity(email,menu_accessed,timesql) values('$email','Skill Assessment Home Page','$timesql')";
  $res=mysqli_query($con, $sql) or die("query not executed");
  ?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Favicon -->
        <link href="images/favicon.ico" rel="shortcut icon"/> 

        <title>BYB | Personality Profiling </title>
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
        <!--script type="text/javascript" src="js/jquery.nav.js"></script-->


        
    </head>
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
                                        <li><a href="../newindex.php">Home</a></li>
                                        <li><a href="Big5.html" target="_blank">Take Test</a></li>
                                        <li><a href="Big5_Reports.html" target="_blank">Reports</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
            </div></div>

 

    
                          <div class="container">
                          
                              <h2 class="text-center"><span class="page-heading">BIG 5 TEST</span></h2>
                                    
                              <div class="row">


                                  <div class="col-sm-12 animateFadeInUp">
                                  <?php
                                  if(isset($_GET['error'])){
                                      if($_GET['error']==0){
                                        echo "<div class='alert alert-warning'>Sorry! This section is only open to students as of now.</div>";
                                      }
                                  }
                                ?>
                                      
                                      <div class="panel panel-default">
                                          
                                            <div class="panel-body">
                                                
                                       <div class="row">  
                                              
                                         <div class="col-sm-2 animateFadeInUp col-md-offset-1">    
                                    <h5>Openness</h5></div>
                                              
                                              <div class="col-sm-2 animateFadeInUp">    
                                     <h5>Conscientiousness</h5></div>
                                              
                                                         <div class="col-sm-2 animateFadeInUp">    
                                     <h5>Extraversion</h5></div>
                                              
                                                         <div class="col-sm-2 animateFadeInUp">    
                                     <h5>Agreeableness</h5></div>
                                              
                                                         <div class="col-sm-2 animateFadeInUp">    
                                     <h5>Neuroticism</h5></div>
                                              
                                          </div>
                                          
                                          <div class="row">
                                              
                                              
                                       
                                              
                                              <div style="font-size:12px;" class="col-sm-2 animateFadeInUp col-md-offset-1 text-justify">
                                              It is described as the extent to which a person is imaginative or independent, and depicts a personal preference for a variety of activities over a strict routine.
                                          </div>
                                              
                                            <div style="font-size:12px;" class="col-sm-2 animateFadeInUp text-justify"> 
                                                A tendency to show self-discipline, act dutifully, and aim for achievement; planned rather than spontaneous behavior; organized, and dependable.
                                    </div>
                                              
                                            <div style="font-size:12px;" class="col-sm-2 animateFadeInUp text-justify"> 
                                                Energy, positive emotions, surgency, assertiveness, sociability and the tendency to seek stimulation in the company of others, and talkativeness.
                                    </div>
                                              <div style="font-size:12px;" class="col-sm-2 animateFadeInUp text-justify"> 
                                                A tendency to be compassionate and cooperative rather than suspicious and antagonistic towards others. It is also a measure of ones' trusting nature.
                                    </div>
                                              <div style="font-size:12px;" class="col-sm-2 animateFadeInUp text-justify"> 
                                                The tendency to experience unpleasant emotions easily, such as anger, anxiety, depression, or vulnerability. Neuroticism also refers to emotional stability.
                                    </div>
                                          </div>   
                                              
                                          </div></div></div></div>
                                  
            
                              <div class="row">
                                  <div class="col-sm-6 animateFadeInUp">
                                      <div class="panel panel-default">
                                          <div class="panel-heading"><center><h4>Self Assessment</h4><h6>A personality test shows your traits based on the above factors</h6></center></div>
                                          <div class="panel-body">                                 
                                          <center><a class="btn btn-primary  btn-lg" href="test_mod1.php">Start Assessment</a></center>
                                          </div>
                                          <?php 
                                            $stmt2="SELECT * FROM skillresult WHERE email='$email'";
                                            $query2=mysqli_query($con, $stmt2);
                                            //echo mysql_num_rows($query2);
                                            //echo $email;
                                            if (mysqli_num_rows($query2)) {
                                              echo '<div class="panel-footer">
                                                      <div class="row">
                                                        <h4 class="text-center">Assessment Reports</h4>
                                                        <h6 class="text-center">Looks like you have given the test. You can view your reports here.</h6>
                                                        <div class="col-sm-6"><center><a class="btn btn-default  btn-lg" href="result1.php">Score Report</a></center></div>
                                                        <div class="col-sm-6"><center><a class="btn btn-default  btn-lg" href="result2.php">Detailed Report</a></center></div>
                                                      </div>
                                                    </div>';
                                            }
                                          ?>
                                          
                                      </div>
                                  </div>
                                  <div class="col-sm-6 animateFadeInUp">
                                      <div class="panel panel-default">
                                          <div class="panel-heading"><center><h4>Observer Assessment</h4><h6>As you are rating yourself, you are encouraged to rate another person</h6></center></div>
                                          <div class="panel-body">
                                          <center><a href="test_mod2.php" class="btn btn-success  btn-lg">Start Assessment</a></center>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            
                                 
<div class="row">
    
    <div class="col-sm-2">

        <a class="btn btn-default btn-block" href="../login.php" class="button bright">Back</a>

    </div>
    <div class="col-sm-2">

        <a class="btn btn-default btn-block" href="logout.php" class="button bright">Logout</a>

    </div>
</div>
</div>           

        <div style="margin-top:20px;" class="lineBlack">
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
                            <ul id="downMenu">
                                <li class="active"><a href="Home.html">Home</a></li>
                                <li><a href="#" target="_blank">E Portfolio</a></li>
                                <li><a href="#" target="_blank">Aptitude Test</a></li>
                                <li><a href="#" target="_blank">Psychometric Test</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
}
else
{
    header('location:../login.php');
    exit();
}
?>