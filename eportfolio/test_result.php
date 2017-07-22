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
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
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

  <link rel="stylesheet" href="../plugins/jqueryui/jquery-ui.css" />
  <script src="../plugins/jqueryui/jquery-1.9.1.js"></script>
  <script src="../plugins/jqueryui/jquery-ui.js"></script>
  <script>
  $(function() {
    $( ".radio" ).buttonset();
  });
  </script>
<!-- Jquery UI ends here --> 
  <style> 
    .top
  {
   width: 65%;
   margin-left:auto;
   margin-right:auto;
   margin-bottom:5px;
   border-radius:5px;
     -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
      border-width:1px;
  padding-left:10px;
  padding-top:6px;
  padding-bottom:4px;
  }
    .question
  {
   width: 65%;
   background: url('images/img_title.jpg') repeat-x;
   background-color:#CCFFFF;
   margin-left:auto;
   margin-right:auto;
   margin-bottom:5px;
   border-radius:5px;
     -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
      border-width:1px;
  padding-left:10px;
  padding-top:6px;
  padding-bottom:4px;
  }
    .option
  {
  width: 80%; 
  background-color:#CCFF99;
  border-radius:5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-width:1px;
    margin-top:6px;
  }
  
  .choice
  {
  background-color:#CFCFCF;
  float:left;
  border-radius:5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-width:1px;
  margin-right:10px;
  padding-left:4px;
  }
  
  .radio
  {
  font-size:14px;
  font-family:Tahoma;
  }
  
  #fixed-div 
  {
    position: fixed;
    top: 1em;
    right: 1em;
  width:350px;
  background-color:#CFCFCF;
  border-radius:5px;
  border-style:solid;
  border-width:4px;
  border-color:#3399FF #99CCFF; /*  tb rl */
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
  margin-right:10px;
  padding: 10px 0px 10px 4px;  /*  trbl */
    }
</style>

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

<?php


    if(isset($_POST['t_id']))
  {
    // Show Test Result 
    $t_id= $_POST['t_id'];
    $neg=0;
    $score=0;
    $correct_ans=0;
    //Check negative marking
    $sql="SELECT correct, incorrect, negative FROM techtest_master WHERE tm_id='$t_id'";
    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    while($row = mysqli_fetch_array($res))
    {
      $neg=$row['negative'];
      $correct=$row['correct'];      // Marks for correct choice
      $incorrect=$row['incorrect'];  // Marks for incorrect choice
    }
    
    $sql="SELECT q_id,ans FROM techtest_questions WHERE id='$t_id'";
    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    $q_total=mysqli_num_rows($res);
    $max_score= $q_total * $correct;
    while($row = mysqli_fetch_array($res))
    {
      //echo "For Question id#".$row['q_id']." ---- Answer: Option ".$row['ans']."<br>"; 
      if(isset($_POST['radio'.$row['q_id']]))
      {
        if($_POST['radio'.$row['q_id']] == $row['ans'])   // Check if Radio button value equals the answer
        {
          $score = $score + $correct;
          $correct_ans++;
        }
        else // Enable negative marking
        {
          if($neg==1)
          {
              $score = $score - $incorrect;
          } 
        }
      }
    }

    echo "<h2>Your test score is :</h2>";
    echo "<div class='score'>";
    //echo "<img src='images/logo/logo_bg.png' width='300px;' style=\"position:absolute; z-index:1;\">";
    echo "<center><h1>".$score." / ".$max_score."</h1></center>";
    echo "</div><br><br>";
    
    // Save Result
    $start_time=$_POST['s_time'];
    $username=$_SESSION['user'][1];
    $email=$_SESSION['user'][0];
    date_default_timezone_set('Asia/Calcutta');
    $datetime = date("F j, Y, g:i a");
    $timesql = date("Y-m-d H:i:s");  //2013-10-06 00:00:00
    
      $sql="INSERT INTO `test_score`(`email`, `test_score_id`, `user`, `t_id`, `score`,`start_time`, `timesql`) VALUES ('$email','','$username','$t_id','$score','$start_time','$timesql')";
      $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
      if($res)
      echo "<p id='center'>Test result saved successfully</p>";
      else
        echo "<p id='center'>Result could not be updated</p>";
      
      
      $sql="SELECT MAX(test_score_id) as test_score_id FROM test_score WHERE email='$email'";
      $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
      while($row = mysqli_fetch_array($res))
      {
        $test_id=$row['test_score_id'];
      }
      
      $sql="SELECT * FROM techtest_questions WHERE id='$t_id'";
      $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
      
      while($row = mysqli_fetch_array($res))
    {
        
      if(isset($_POST['radio'.$row['q_id']]))
      {
        $given_ans=$_POST['radio'.$row['q_id']];
        
        if($_POST['radio'.$row['q_id']] == $row['ans'])   // Check if Radio button value equals the answer
        {
          $correct=1;
        }
        else 
        {
            $correct=0;
        }
        $q_ans=$row['q_id'];
      }
      $sql1="INSERT INTO `test_score_detail`(`test_score_id`, `q_id`, `given_ans`, `correct_yn`) VALUES ('$test_id','$q_ans','$given_ans','$correct')";
      $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
      
    }
    

  
  
  // Show Questions with answers
  $q_id=0;
  $q_index=1;  
  $i=1;


  $sql="SELECT * FROM techtest_questions WHERE id='$t_id'";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    $q_total=mysqli_num_rows($res);
      
    while($row = mysqli_fetch_array($res))
    {
        
      if(isset($_POST['radio'.$row['q_id']]))
      {
        $q_ans=$_POST['radio'.$row['q_id']];
        if($q_ans != $row['ans'])   // Check if Radio button value equals the answer
        {
          echo "<div class='question'><b style=\" color:black;\">Question ".$q_index."</b>   ";
          echo "<img src='../images/delete2.png' width='20px;'>";
      
          echo "<br><br>".$row['question']."</div>";
      
          echo "<div class='cover' style=\" width:65%; margin-left:auto; margin-right:auto;\">";
          echo "<div class='option'>";
          echo"<div class='option_red'>";
          echo "Option 1: &nbsp;";
          echo "</div>".$row['opt1']."</div>";
          
          echo "<div class='option'>";
          echo"<div class='option_red'>";
          echo "Option 2: &nbsp;";
          echo "</div>".$row['opt2']."</div>";
          
          echo "<div class='option'>";
          echo"<div class='option_red'>";
          echo "Option 3: &nbsp;";
          echo "</div>".$row['opt3']."</div>";
          
          echo "<div class='option'>";
          echo"<div class='option_red'>";
          echo "Option 4: &nbsp;";
          echo "</div>".$row['opt4']."</div>";
          
          echo "</div>";
      
          echo "<br><br>";
          $q_index++;
          
        }

      
      
      /*echo "<div class='question'><b style=\" color:black;\">Question ".$q_index."</b>   ";
      if($correct==1)
      {
      //echo "<b style=\" color:white;\"> - Correct</b>";
      echo "<img src='../images/correct.png' width='20px;'>";
      }
      else
      echo "<img src='../images/delete2.png' width='20px;'>";
      
      echo "<br><br>".$row['question']."</div>";
      
      echo "<div class='cover' style=\" width:65%; margin-left:auto; margin-right:auto;\">";
      
      echo "<div class='option'>";
      if($q_ans==1) 
      echo"<div class='option_green'>";
      else
      echo"<div class='option_red'>";
      echo "Option 1: &nbsp;";
      echo "</div>".$row['opt1']."</div>";
      
      echo "<div class='option'>";
      if($q_ans==2) 
      echo"<div class='option_green'>";
      else
      echo"<div class='option_red'>";
      echo "Option 2: &nbsp;";
      echo "</div>".$row['opt2']."</div>";
      
      echo "<div class='option'>";
      if($q_ans==3) 
      echo"<div class='option_green'>";
      else
      echo"<div class='option_red'>";
      echo "Option 3: &nbsp;";
      echo "</div>".$row['opt3']."</div>";

      echo "<div class='option'>";
      if($q_ans==4) 
      echo"<div class='option_green'>";
      else
      echo"<div class='option_red'>";
      echo "Option 4: &nbsp;";
      echo "</div>".$row['opt4']."</div>";
            
      echo "</div>";
      
      echo "<br><br>";
      $q_index++;*/
    }


    
  }
  }

?>
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


