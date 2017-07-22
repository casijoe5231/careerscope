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
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Favicon -->
        <link href="../images/favicon.ico" rel="shortcut icon"/> 

        <title>BYB | Result </title>
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

        <!--custon css-->
        <link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
<!-- Jquery UI -->
  <link rel="stylesheet" href="plugins/jqueryui/jquery-ui.css" />
  <script src="plugins/jqueryui/jquery-1.9.1.js"></script>
  <script src="plugins/jqueryui/jquery-ui.js"></script>
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
    
    .score
    {
     width:300px;
     height:300px;
    margin-left:auto;
    margin-right:auto;
    font-size:36px;
    text-align:center;
    background: url('images/logo/logo_bg2.png');
    padding-top:10px;
    }
    
    .option_green
    {
    background-color:#33CC33;
    float:left;
     border-radius:5px;
     -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
      border-width:1px;
      margin-right:10px;
      padding-left:4px;
    }
    .option_red
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

    
</style>


        
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
                                            <li><a href="#" target="_blank">E Portfolio</a></li>
                                            <li><a href="index.php" target="_blank">Aptitude Test</a></li>
                                            <li><a href="../skill/" target="_blank">Psychometric Test</a></li>
                                            <!--<li class="last"><a href="#contact">Contact</a></li>
                                            li><a href="#features">Features</a></li-->
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
            <h3>Test</h3>

<br>
<div class="row">
    
    <div class="col-sm-2">

        <a class="btn btn-default btn-block" href="index.php" class="button bright"><span class="glyphicon glyphicon-home"></span> Home</a>

    </div>
</div>
<br>
           
            
<div class="panel">




<?php
$con=mysqli_connect("localhost","root","","careerscope");

    if(isset($_POST['t_id']))
    {
        // Show Test Result 
        $t_id= $_POST['t_id'];
        $neg=0;
        $score=0;
        $correct_ans=0;
        //Check negative marking
        $sql2="SELECT correct, incorrect, negative FROM test WHERE id='$t_id'";
        $res2=mysqli_query($con, $sql2);
        while($row2 = mysqli_fetch_array($res2))
        {
            $neg=$row2['negative'];
            $correct=$row2['correct'];      // Marks for correct choice
            $incorrect=$row2['incorrect'];  // Marks for incorrect choice
        }
        
        $sql="SELECT q_id,ans FROM subjectquestion WHERE t_id='$t_id'";
        $res=mysqli_query($con, $sql);
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
        echo "<br><h1>".$score."/".$max_score."</h1>";
        echo "</div><br><br>";
        
        // Save Result
        $username=$_SESSION['user'][1];
        date_default_timezone_set('Asia/Calcutta');
        $datetime = date("F j, Y, g:i a");
        $timesql = date("Y-m-d H:i:s");  //2013-10-06 00:00:00
        // Check if Test result has been saved previously
        $attempt=0;
        $sql="SELECT * FROM `score` WHERE username='$username' and t_id='$t_id'";
        $res=mysqli_query($con, $sql);
        while($row = mysqli_fetch_array($res))
		{
            $attempt=$row['attempt'];
			if($attempt==1)
			{
		$score=$row['score'];
			}
			else if($attempt==2)
			{
				$score1=$row['score'];
			}
			else if($attempt==3)
			{
				$score2=$row['score'];
			}
		}
        $attempt++;
        $user_scores=mysqli_num_rows($res);
		
        if($user_scores!=0)          // Previous result exists
        {
            $sql="UPDATE `score` SET `score`='$score', `correct`='$correct_ans',`total`='$q_total', `max_score`='$max_score', `attempt`='$attempt' ,`timesql`='$timesql' WHERE username='$username' and t_id='$t_id'";
            $res=mysqli_query($con, $sql);
            if($res)
            echo "<p id='center'>Test result updated successfully</p>";
            else
                echo "<p id='center'>Result could not be updated</p>";
            
        }
		
        else                        // Previous result does not exist
        {
            $sql="INSERT INTO `score`(`username`, `t_id`, `score`, `correct`, `total`, `max_score`, `attempt`, `timesql`) VALUES ('$username','$t_id','$score', '$correct', '$q_total', '$max_score', '1', '$timesql')";
            $res=mysqli_query($con, $sql);
            if($res)
                echo "<p id='center'>Test result saved successfully</p>";
            else
                echo "<p id='center'>Result could not be saved</p>";
        }
    
    
    
    // Show Questions with answers
    $q_id=0;
    $q_index=1;  
    $i=1;
    $sql="SELECT * FROM subjectquestion WHERE t_id='$t_id'";
    $res=mysqli_query($con, $sql);
    $q_total=mysqli_num_rows($res);
      
        while($row = mysqli_fetch_array($res))
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
            
            
            echo "<div class='question'><b style=\" color:white;\">Question ".$q_index."</b>   ";
            if($correct==1)
            {
            //echo "<b style=\" color:white;\"> - Correct</b>";
            echo "<img src='images/correct.png' width='20px;'>";
            }
            else
            echo "<img src='images/delete2.png' width='20px;'>";
            
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
        }


    }

?>

</div>
<br><br>


<br><br>
<div class="row">
    
    <div class="col-sm-2">

        <a class="btn btn-default btn-block" href="index.php" class="button bright">Back</a>

    </div>
    <div class="col-sm-2">

        <a class="btn btn-default btn-block" href="../logout.php" class="button bright">Logout</a>

    </div>
</div>


<br><br>


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
                            <ul id="downMenu">
                                            <li><a href="../newindex.php">Home</a></li>
                                            <li><a href="#" target="_blank">E Portfolio</a></li>
                                            <li><a href="index.php" target="_blank">Aptitude Test</a></li>
                                            <li><a href="../skill/" target="_blank">Psychometric Test</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


