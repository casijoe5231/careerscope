<?php
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('location:../login.php');
        exit();
    }
    include '../includes/connection1.php';
    include 'styles/theme-master.php';
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Favicon -->
        <link href="../images/favicon.ico" rel="shortcut icon"/> 

        <title>BYB | Observer Assessment Rate </title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="../images/favicon.ico">
        <link href="../css/bootstrap.min3.css" rel="stylesheet">
        <link href="../css/main-theme3.css" rel="stylesheet">
        <link href="../css/glyphicons3.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <script src="../js/js_psycho/jquery.min.js"></script>
        <link rel="stylesheet" href="../css/jquery-ui3.css" />
        <script src="../js/js_psycho/jquery-ui.min.js"></script>

            <!-- Favicon -->
        <link href="../images/favicon.ico" rel="shortcut icon"/> 
        
        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
        
        <!-- Other CSS -->
        <!--<link href="css/font-awesome.css" rel="stylesheet" type="text/css">-->
        <link href="../css/test/animate.css" rel="stylesheet" type="text/css">
        <link href="../css/test/simpletextrotator.css" rel="stylesheet" type="text/css" />
        <link href="../css/test/theme-loading-bar.css" rel="stylesheet" />
        
        

        
                <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
        <link rel='stylesheet' id='camera-css'  href='../css/camera.css' type='text/css' media='all'>
        <link rel="stylesheet" type="text/css" href="../css/slicknav.css">
        <link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../css/style2.css">
        <link href="../css/animate2.css" rel="stylesheet">
        <!--script type="text/javascript" src="../js/jquery.nav.js"></script-->


        
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
                                            <li><a href="Home.html">Home</a></li>
                                            <li><a href="Big5.html" target="_blank">Take Test</a></li>
                                            <li><a href="Big5_Reports.html" target="_blank">Reports</a></li>
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
        <h4>Observer Assessment</h4><br>
<?php
    /*if (strpos($_SERVER['HTTP_REFERER'],'test_mod2.php') == true) // Check for valid referrer
    {
    // echo "<br><p style='color:green;'>Referrer Valid</p>";
    }
    else
    {
     header("Location: test_mod2.php"); //If referrer is invalid redirect to test 2 main page.
     die();
    }
    if(!isset($_SESSION['user']))
    {
        header('location:../login.php');
        exit();
    }*/

    include '../includes/connection1.php';

          if(isset($_GET['users']))
          {
           $user=$_GET['users'];
           echo "<br> You are providing feedback for :<br>";
           $con=mysqli_connect("localhost","root","","careerscope");
           $email=$_SESSION['user'][0];
                 $sql="   SELECT name FROM masteruser WHERE email = '$user'";       
                 $res=mysqli_query($con, $sql);
                 while($row = mysqli_fetch_array($res))
                 {
                 echo "<h4>".$row['name']."</h4>";
                 $feed_requestor=$row['name'];
                 $fname=$row['name'];
                 }


          }
          
        echo "Please review the list of qualities below and check those that you think best describe ".$feed_requestor.".";




        echo "<br><br>";
        ?>
            <div class="main-wrapper">
        <?php
        echo "<form method=\"post\"  accept-charset=\"UTF-8\" id=\"test-form\" action=\"test_mod2_review.php?users=".$user."\">";
        ?>
            <?php
                include '../includes/connection1.php';
                $sql="SELECT * FROM skillquestions";
                $res=mysqli_query($con, $sql);
                /*
                if ($res) {
                    echo ":)";
                }
                else{
                    echo ":(";
                }*/
                while($row = mysqli_fetch_array($res))
                {
                    echo '
                        <div class="test_question_wrapper set'.$row["id"].'">
                            <div class="row">
                                <div class="col-xs-12 test-question-text text-center">'.$feed_requestor.' '.$row["obsquestions"].'</div>
                            </div>
                            <div class="row test_question_decision">
                                <div class="col-md-10 col-xs-10 test_question_slider_wrapper col-md-offset-1  col-xs-offset-1"><div id="slider'.$row["id"].'" class="test_question_slider"></div></div>
                            </div>
                            <div class="row test_question_decision">
                                <div class="col-md-2 col-xs-2 test-question-answer-left">Strongly Agree</div>
                                <div class="col-md-2 col-xs-2 test-question-answer-left">Agree</div>
                                <div class="col-md-1 col-xs-1 test-question-answer-left  col-md-offset-1  col-xs-offset-1">Neither agree</div>
                                <div class="col-md-1 col-xs-1 test-question-answer-left" style="text-align:left;">Nor disagree</div>
                                <div class="col-md-2 col-xs-2 test-question-answer-left">Disagree</div>
                                <div class="col-md-3 col-xs-3 test-question-answer-left" style="text-align:center;">Strongly Disagree</div>
                            </div>
                            <input type="hidden" name="option'.$row["id"].'" id="optionid'.$row["id"].'">
                        </div>';
                }

            ?>
                   
            
            
            <div class="row test-buttons-wrapper">
                <div class="col-md-12">
                    <div class="submit_wrapper setnext"><input style="color:#FFF;" value="Submit" type="button" id="submbut" class="btn btn-action btn-lg" name="submit_feed" ></div>
                </div>  
            </div>

            
        </form>

    </div>

    <div class="test-social-wrapper">
    
        <div class="row">


        </div>
            

    </div>




<!--script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-27031617-1', 'auto');

  ga('send', 'pageview');

</script-->

    </div>

    <script src="../js/js_psycho/test.js"></script>
    <script src="../js/js_psycho/bootstrap.min.js"></script>
    <script>
    $j('.btn').button();
    </script>

        </div>
        <!-- End of the main content -->
        
        

  <div style="margin-top:100px;" class="lineBlack">
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
                                <li><a href="EP.html" target="_blank">E Portfolio</a></li>
                                <li><a href="Aptitude_test.html" target="_blank">Aptitude Test</a></li>
                                <li><a href="Psychometric_test.html" target="_blank">Psychometric Test</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


