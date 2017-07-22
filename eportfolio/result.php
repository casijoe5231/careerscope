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

    include '../includes/connection1.php';?>
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

<script  type="text/javascript" src="validator3.js" ></script>

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

        echo "<p style=\"text-align:center; font-size:40px;\">Your test score is :</p>";
        echo "<div class='score'>";
        //echo "<img src='images/logo/logo_bg.png' width='300px;' style=\"position:absolute; z-index:1;\">";
        echo "<br><h1>".$score." / ".$max_score."</h1>";
        echo "</div><br><br>";
        
        // Save Result
        $username=$_SESSION['user'][1];
        $email=$_SESSION['user'][0];
        date_default_timezone_set('Asia/Calcutta');
        $datetime = date("F j, Y, g:i a");
        $timesql = date("Y-m-d H:i:s");  //2013-10-06 00:00:00
        
            $sql="INSERT INTO `test_score`(`email`, `test_score_id`, `user`, `t_id`, `score`, `timesql`) VALUES ('$email','','$username','$t_id','$score','$timesql')";
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
            $given_ans=$_POST['radio'.$row['q_id']];
            
            if(isset($_POST['radio'.$row['q_id']]))
            {
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
            }
        }
        

    
    
    // Show Questions with answers
    /*$q_id=0;
    $q_index=1;  
    $i=1;


    $sql="SELECT * FROM techtest_questions WHERE id='$t_id'";
    $res=mysql_query($sql);
    $q_total=mysql_num_rows($res);
      
        while($row = mysql_fetch_array($res))
        {
            
            if(isset($_POST['radio'.$row['q_id']]))
            {
                $q_ans=$_POST['radio'.$row['q_id']];
                if($q_ans == $row['ans'])   // Check if Radio button value equals the answer
                {
                    $correct=1;
                }
                else 
                {
                    $correct=0;
                }
            }
            else
            {
             //Unanswered question
             $q_ans=0;
             $correct=0;
            }
            
            
            echo "<div class='question'><b style=\" color:black;\">Question ".$q_index."</b>   ";
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
            $q_index++;
        }*/


    
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


