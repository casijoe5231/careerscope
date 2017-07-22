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
                    <div class="col-sm-8"></div>

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


<div class="panel">



<?php
include '../connection1.php';

$q_id=0;
$q_index=1;  
$i=1;

if(isset($_GET['level']))
{
    echo "<h3 style=\"text-align:center;\">Test Questions</h3>";
  // Show Test time
  $sql1="SELECT * FROM techtest_skill_master where sm_id='$_SESSION[skill]'";  // Select Test
          $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
            while($row1 = mysqli_fetch_array($res1))
          { 
  $sql="SELECT test_time FROM techtest_master WHERE tm_id='$row1[tm_id]'";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    
  echo "<div id='fixed-div'>";
     echo "<img src='../images/test-time.png' style=\"float:left; margin-right:5px; \">"; 
    while($row = mysqli_fetch_array($res))
    {
          echo "<b>Test Time: </b>".$row['test_time']." minutes";
      $time=$row['test_time'];
      echo " <br><br><b>Time Left: </b>";
      
      echo "<script type=\"text/javaScript\">";
      echo "setTimeout('document.forms[\"TestForm\"].submit();alert(\"You have reached the Test time limit!\");', ".$time." * 60 * 1000);";
          echo "</script>";
      
      echo "<script language=\"JavaScript\">";
      echo "var myDate=new Date();";
          echo "myDate.setDate(myDate.getDate()+1);";
      echo "var currentDate = new Date();";
        echo "var newDate = currentDate.getTime() + (".$time." * 60 * 1000);";      
        } 
}   
?>

TargetDate = newDate;
  

BackColor = "";
ForeColor = "navy";
CountActive = true;
CountStepper = -1;
LeadingZero = true;
//DisplayFormat = "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
DisplayFormat = "%%M%% Minutes, %%S%% Seconds.";
FinishMessage = "Test Time completed!";



function Save()
{
 if(confirm('Do you want to Submit?'))
document.forms[0].submit();
else alert('You can continue to make changes')
}

</script>
<script language="JavaScript" src="../plugins/countdown.js"></script>
</div>

<?php

    // Start Test Form
  echo "<form name='TestForm' action='test_result.php' method='POST'>";
  date_default_timezone_set('Asia/Calcutta');
  $datetime = date("F j, Y, g:i a");
  $timesql = date("Y-m-d H:i:s");
  
  $sql="SELECT * FROM techtest_questions WHERE id='$_SESSION[skill]' and level='$_GET[level]'";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    $q_total=mysqli_num_rows($res);
    echo "<input type='hidden' name='t_id' value='$_SESSION[skill]'>";
  echo "<input type='hidden' name='s_time' value='$timesql'>";
      
    while($row = mysqli_fetch_array($res))
    {
      
      echo "<div class='question'><b style=\" color:black;\">Question ".$q_index."</b>";
      if($row['q_id']==$q_id)
      {
      echo "<b style=\" color:white;\"> - Edited</b>";
      }
      
      echo "<br><br>".$row['question']."</div>";
      
      echo "<div class='cover' style=\" width:65%; margin-left:auto; margin-right:auto;\">";
      echo "<div class='option'>";
      echo"<div class='choice'>";
      echo "Option 1: &nbsp;";
      echo "</div>".$row['opt1']."</div>";
      
      echo "<div class='option'>";
      echo"<div class='choice'>";
      echo "Option 2: &nbsp;";
      echo "</div>".$row['opt2']."</div>";
      
      echo "<div class='option'>";
      echo"<div class='choice'>";
      echo "Option 3: &nbsp;";
      echo "</div>".$row['opt3']."</div>";

      echo "<div class='option'>";
      echo"<div class='choice'>";
      echo "Option 4: &nbsp;";
      echo "</div>".$row['opt4']."</div>";
      

      //Show Options
            echo "<br><b style=\" font-size:16px;\">Answer: &nbsp;</b>";
      echo "<input style='margin-left:10px;' type='radio' id='radio".$i."' name='radio".$row['q_id']."' value='1' /><label for='radio".$i++."'><b>Option 1</b></label>";
      echo "<input style='margin-left:10px;' type='radio' id='radio".$i."' name='radio".$row['q_id']."' value='2' /><label for='radio".$i++."'><b>Option 2</b></label>";
      echo "<input style='margin-left:10px;' type='radio' id='radio".$i."' name='radio".$row['q_id']."' value='3' /><label for='radio".$i++."'><b>Option 3</b></label>";
      echo "<input style='margin-left:10px;' type='radio' id='radio".$i."' name='radio".$row['q_id']."' value='4' /><label for='radio".$i++."'><b>Option 4</b></label>";

      echo "</div>";
      
      echo "<br><br>";
      $q_index++;
    }
    
  echo "<br><input type='submit' class='button center' value='Submit Test' name='test_submit' ><br><br>";
    echo "</form>";
}
else
{
  echo "<h3 style=\"text-align:center;\"><br>Processing<br>";
  echo "<img src='../images/preload.gif' width='50px'></h3>";
}




?>


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


