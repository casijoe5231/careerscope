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

    include '../includes/connection1.php';
  $email=$_SESSION['user'][0];
  $name=$_SESSION['user'][1];
  /*$mentor=$_GET['mentor'];
  // Inserting the name of mentor
  for($i=0;$i<sizeof($mentor);$i++)
{
$sql="insert into approve_mentor(id,email,name,mname,status) values('','$email','$name','".$mentor[$i]."','1')";
$res=mysql_query($sql)or die("query not executed");
}*/
  
  date_default_timezone_set('Asia/Calcutta');
  $datetime = date("F j, Y, g:i a");
  $timesql = date("Y-m-d H:i:s"); 
  // Tracking the user
  $sql="insert into activity(email,menu_accessed,timesql) values('$email','Academic Brand Job Profiling New Test','$timesql')";
  $res=mysqli_query($con, $sql)or die("query not executed");
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Favicon -->
        <link href="../images/favicon.ico" rel="shortcut icon"/> 

        <title>BYB | Blank </title>
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

<script  type="text/javascript" src="validator1.js" ></script>

    </head>
    <body>

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
                    <a class="btn btn-default btn-block" href="goal.php"><span class="glyphicon glyphicon-chevron-left"></span> Back </a></div>

                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../login.php"><span class="glyphicon glyphicon-home"></span> </a></div>
                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../logout.php">Logout</a></div>
                
                </div>
            </div>
        </div>
        <h1>Job Aptitude</h1>
        
        <div class="row">
            <div class="col-sm-2">
                <div style="margin-top:20px;" class="list-group">
                    <a href="profile.php" class="list-group-item ">Job Profiling</a>
                    <a href="../riasec/index.php" class="list-group-item ">Holland Test</a>
                    <a href="#" class="list-group-item">Interview</a>
                    <a href="goal.php" class="list-group-item active">Job Aptitude</a>
                    <a href="presresume.php" class="list-group-item">Resume</a>
                    <a href="#" class="list-group-item">Biographical Sketch</a>
                  </div>
            </div>
            <div class="col-sm-10">
            
                <!--content goes here-->
                <div class="row">

                  <div class="col-sm-offset-2 col-sm-8">
                    <div style="margin-top:20px;" class="panel panel-default">
                      <div class="panel-heading">
                        <center>
                          <h4>Test Taken</h4>
                        </center>
                      </div>
                      <div class="panel-body">
                        <div class="row">
                          <center>
                            <form action="start_test.php" onsubmit="return validateAll1()" method="get">
<?php
          $_SESSION['skill']=$_GET['skill'];
          $sql="SELECT * FROM techtest_skill_master where sm_id='$_SESSION[skill]'";  // Select Test
          $res=mysqli_query($con, $sql);
            while($row = mysqli_fetch_array($res))
            {
            
          $sql1="SELECT * FROM techtest_master where tm_id='$row[tm_id]'";  // Select Test
          $res1=mysqli_query($con, $sql1);
          
            while($row1 = mysqli_fetch_array($res1))
            {
            $_SESSION['test_id']=$row1['tm_id'];
              echo "<h3><img src='../images/test.png' width='20px'><b>".$row1['testname']."</h3></b>";
              echo "<br><div class='desc'><b>Test Time: </b>".$row1['test_time']." mins";
              echo "<br><br><b>Test Description: </b>".$row1['test_desc'];
              echo "<br><br><b>Test Questions:</b>".$row1['questions'];
              
              ?>
              <br><br><b>Test Level:</b>
              <select name="level" id="input-level" temp="Please select the test level" onblur="validator(this)">
              <option value="Select">Select</option>
              <option value="1">Beginner</option>
              <option value="2">Intermediate</option>
              <option value="3">Expert</option>
              </select><br>
              <label><span id="level" style="color:#C00;"></span></label>
              <?php
              if($row1['questions']==0)
              echo "</div><br><br>You cannot attempt this Test as questions are yet to be added to it<br>";
              else  
              echo "</div><br><br><input class='btn btn-primary' type='submit' name='submit' style='cursor:pointer;' value='START TEST'><br>";  
            }
            }
           
            
            
                
?>
</form>
                          </center>
                        </div>
                      </div>
                    </div>
                  </div>




                </div>

            </div>
        </div>














        </div>
        <!-- End of the main content -->
        
        

  <div class="lineBlack">
            <div class="container">
                <div class="row downLine">
                    <div class="col-md-12 text-right">
                        <!--input  id="searchPattern" type="search" name="pattern" value="Search the Site" onblur="if(this.value=='') {this.value='Search the Site'; }" onfocus="if(this.value =='Search the Site' ) this.value='';this.style.fontStyle='normal';" style="font-style: normal;"/-->
                        <!--    <input  id="searchPattern" type="search" placeholder="Search the Site"/><i class="glyphicon glyphicon-search" style="font-size: 13px; color:#a5a5a5;" id="iS"></i>
</div>-->
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
    </body>
</html>


