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
.mainpoor  {
	margin: 1em 0 0.5em 0;
	font-weight: normal;
	position: relative;
	text-shadow: 0 -1px rgba(0,0,0,0.6);
	
	font-size: 28px;
	line-height: 30px;
	background: #dc381f;
	background: rgba(220,56,33, 0.8);
	border: 1px solid #fff;
	padding: 5px 15px;
	color: white;
	border-radius: 0 10px 0 10px;
	box-shadow: inset 0 0 5px rgba(53,86,129, 0.5);
	font-family: 'Muli', sans-serif;
}

.mainavg {
	margin: 1em 0 0.5em 0;
	font-weight: normal;
	position: relative;
	text-shadow: 0 -1px rgba(0,0,0,0.6);
	
	font-size: 28px;
	line-height: 30px;
	background: #c58917;
	background: rgba(197,137,23, 0.8);
	border: 1px solid #fff;
	padding: 5px 15px;
	color: white;
	border-radius: 0 10px 0 10px;
	box-shadow: inset 0 0 5px rgba(53,86,129, 0.5);
	font-family: 'Muli', sans-serif;
}

.maingood  {
	margin: 1em 0 0.5em 0;
	font-weight: normal;
	position: relative;
	text-shadow: 0 -1px rgba(0,0,0,0.6);
	
	font-size: 28px;
	line-height: 30px;
	background: #4aa02c;
	background: rgba(74,160,44, 0.8);
	border: 1px solid #fff;
	padding: 5px 15px;
	color: white;
	border-radius: 0 10px 0 10px;
	box-shadow: inset 0 0 5px rgba(53,86,129, 0.5);
	font-family: 'Muli', sans-serif;
}

    .main  {
	margin: 1em 0 0.5em 0;
	font-weight: normal;
	position: relative;
	text-shadow: 0 -1px rgba(0,0,0,0.6);
	width:400px;
	font-size: 28px;
	line-height: 40px;
	background: #355681;
	background: rgba(53,86,129, 0.8);
	border: 1px solid #fff;
	padding: 5px 15px;
	color: white;
	border-radius: 0 10px 0 10px;
	box-shadow: inset 0 0 5px rgba(53,86,129, 0.8);
	font-family: 'Muli', sans-serif;
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
	<div class="col-sm-2">

        <a class="btn btn-default btn-block" href="home.php" class="button bright"><span class="glyphicon "></span> Test Reviews</a>

    </div>

</div>
<br>
           
            
<div class="panel">




<?php


    if(isset($_POST['t_id']))
    {
        // Show Test Result 
        $t_id= $_POST['t_id'];
        $neg=0;
        $score=0;
        $correct_ans=0;
      
        
        $sql="SELECT q_id FROM softskillquestions WHERE t_id='$t_id'";
        $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
        $q_total=mysqli_num_rows($res);
        $max_score= $q_total * 5;
        while($row = mysqli_fetch_array($res))
        {
            //echo "For Question id#".$row['q_id']." ---- Answer: Option ".$row['ans']."<br>"; 
            if(isset($_POST['radio'.$row['q_id']]))
            {
                if($_POST['radio'.$row['q_id']] ==1)   // Check if Radio button value equals the answer
                {
                    $an1=1; //store your selected value
                }
                elseif($_POST['radio'.$row['q_id']] ==2) // Enable negative marking
                {
					$an1=2;
				}
				elseif($_POST['radio'.$row['q_id']] ==3) // Enable negative marking
                {
					$an1=3;
				}
				elseif($_POST['radio'.$row['q_id']] ==4) // Enable negative marking
                {
					$an1=4;
				}
                elseif($_POST['radio'.$row['q_id']] ==5) // Enable negative marking
                {
					$an1=5;
				}
                else
				{
					$an1=0;
				}
                    $score = $score + $an1;
                    
            }
        }
        		//display message for improvement
		//end of diplay message
		

        echo '<br><center><div class="main"><center>Your test score is :</center></div></center>';
        echo "<div class='score'>";
        //echo "<img src='images/logo/logo_bg.png' width='300px;' style=\"position:absolute; z-index:1;\">";
        echo "<br><h1>".$score."/".$max_score."</h1>";
        echo "</div><br><br>";
        
//calculate avrage score
$avgscore=$max_score/2;
		
		
        // Save Result
        $username=$_SESSION['user'][1];
        date_default_timezone_set('Asia/Calcutta');
        $datetime = date("F j, Y, g:i a");
        $timesql = date("Y-m-d H:i:s");  //2013-10-06 00:00:00
        // Check if Test result has been saved previously
        $attempt=0;
        $sql="SELECT * FROM `score` WHERE username='$username' and t_id='$t_id'";
        $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
        while($row = mysqli_fetch_array($res))
            $attempt=$row['attempt'];
        $attempt++;
        $user_scores=mysqli_num_rows($res);
        if($user_scores!=0)          // Previous result exists
        {
            $sql="UPDATE `score` SET `score`='$score', `correct`='$correct_ans',`total`='$q_total', `max_score`='$max_score', `attempt`='$attempt' ,`timesql`='$timesql' WHERE username='$username' and t_id='$t_id'";
            $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
            if($res)
            echo "<p id='center'>Test result updated successfully</p>";
            else
                echo "<p id='center'>Result could not be updated</p>";
            
        }
        else                        // Previous result does not exist
        {
            $sql="INSERT INTO `score`(`username`, `t_id`, `score`, `correct`, `total`, `max_score`, `attempt`, `timesql`) VALUES ('$username','$t_id','$score', '$correct', '$q_total', '$max_score', '1', '$timesql')";
            $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
            if($res)
                echo "<p id='center'>Test result saved successfully</p>";
            else
                echo "<p id='center'>Result could not be saved</p>";
        }
    
    
   
    // Show Questions with answers
    }
 if($score<$avgscore)
		
		{
			echo' <div class="mainpoor"><center>Your Score is Very Poor .You Can Improve on Your Skill </center></div></h2>';
			
		}
		elseif($score==$avgscore )
		{
			echo'<div class="mainavg"><center>Your Score is Average . You can Do Better </div>';
				
		}
		else{
			echo'<div class="maingood"><center>Your Score is Excellent...! </div>>';
			
			
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


