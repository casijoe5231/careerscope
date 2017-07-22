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

        <!--custom-->
        


        
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


     
<div style="top:10px;right:10px;position:fixed;" class="col-sm-1 pull-right">
<div class="row">
    <div class="panel panel-default">
        <div class="panel-body">
            
        
<div class="text-center" id='fixed-div'>

<?php
include '../includes/connection1.php';


if(isset($_GET['id']))
{

    // Show Test time
    $id=$_GET['id'];
    $sql="SELECT t_time FROM test WHERE id='$id' LIMIT 1";
    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    $q_total=mysqli_num_rows($res); 
    
    //echo "<img src='images/test-time.png' style=\"float:left; margin-right:5px; \">";  
        while($row = mysqli_fetch_array($res))
        {
          //echo "<b>Test Time: </b>".$row['t_time']." minutes";
          $time=$row['t_time'];
          echo " <span class='glyphicon glyphicon-time'></span>&nbsp;";
          
          echo "<script type=\"text/javaScript\">";
          echo "setTimeout('document.forms[\"TestForm\"].submit();alert(\"You have reached the Test time limit!\");', ".$time." * 60 * 1000);";
          echo "</script>";
          
          echo "<script language=\"JavaScript\">";
          echo "var myDate=new Date();";
          echo "myDate.setDate(myDate.getDate()+1);";
          echo "var currentDate = new Date();";
          echo "var newDate = currentDate.getTime() + (".$time." * 60 * 1000);";          
       echo'

                TargetDate = newDate;
                    

                BackColor = "";
                ForeColor = "#333";
                CountActive = true;
                CountStepper = -1;
                LeadingZero = true;
                //DisplayFormat = "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
                DisplayFormat = "%%M%% : %%S%%";
                FinishMessage = "Test Time completed!";

                function Save()
                {
                 if(confirm(\'Do you want to Submit?\'))
                document.forms[0].submit();
                else alert(\'You can continue to make changes\')
                }';

 }   
 }       
?>



</script>
<script language="JavaScript" src="plugins/countdown.js"></script>
</div>
</div>
</div>
    </div>
</div>


        <!-- Main Content Here -->
        <div class="container">



<h3>Test</h3>
 
<div style="padding-top:20px;padding-bottom:20px;" class="row">
    
    <div class="col-sm-2">

        <a class="btn btn-default btn-block" href="index.php" class="button bright">Back</a>

    </div>
</div>

<?php
    
    if ($_GET['type'] == 0) {
        echo '<form role="form" name="TestForm" action="result.php" method="post" class="form-horizontal">';
    }
    else{
        echo '<form role="form" name="TestForm" action="result1.php" method="post" class="form-horizontal">';
    }
?>


        <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    
<h3 class="text-center">Test Questions</h3>
                </div>
                <div class="panel-body">
<?php

$i=1;
    $q_index=1;
if(isset($_GET['id']) && isset($_GET['type']) )
{   

    if ($_GET['type']==0) {
        $sql="SELECT * FROM questions WHERE t_id='$_GET[id]'order by rand() limit 30";
    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    $q_total=mysqli_num_rows($res);
    echo "<input type='hidden' name='t_id' value='".$_GET['id']."'>";
      
        while($row = mysqli_fetch_array($res))
        {
            
            echo '<div class="row">
                        <div class="col-sm-offset-2 col-sm-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                    Question '.$q_index;
           /* if(isset($row['q_id'])==$q_id)
            {
            echo "<span style=\" color:#666;\"> - Edited</span>";
            }
*/
            echo'
                                    </h4>
                                    <p>
                                       '.$row['question'].' 
                                    </p>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-11">
                                          <div class="radio">
                                            <label for="radio'.$i.'">
                                              <input value="1" type="radio" id="radio'.$i++.'" name="radio'.$row['q_id'].'">
                                              '.$row['opt1'].'
                                            </label>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-11">
                                          <div class="radio">
                                            <label for="radio'.$i.'">
                                              <input value="2" type="radio" id="radio'.$i++.'" name="radio'.$row['q_id'].'">
                                              '.$row['opt2'].'
                                            </label>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-11">
                                          <div class="radio">
                                            <label for="radio'.$i.'">
                                              <input value="3" type="radio" id="radio'.$i++.'" name="radio'.$row['q_id'].'">
                                              '.$row['opt3'].'
                                            </label>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-11">
                                          <div class="radio">
                                            <label for="radio'.$i.'">
                                              <input value="4" type="radio" id="radio'.$i++.'" name="radio'.$row['q_id'].'">
                                              '.$row['opt4'].'
                                            </label>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                ';
            
            $q_index++;
        }
        echo '</div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-offset-4 col-sm-4">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                        </div>
                    </div>';
    }
    else if ($_GET['type']==1) {


        echo "<input type='hidden' name='t_id' value='".$_GET['id']."'>";
        $sql1="SELECT * FROM relation_mainquestion WHERE t_id='$_GET[id]'";
        $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
        while($row1= mysqli_fetch_array($res1))
        {
            $_SESSION['quest_id']=$row1['id'];
            echo '  <div class="row">
                        <div class="col-sm-offset-1 col-sm-10">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h4>
                                    Main Question
                                    </h4>
                                    <h5>
                                    '.$row1['question'].'
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>';

            $sql="SELECT * FROM questions WHERE t_id='$row1[id]'";
            $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
            $q_total=mysqli_num_rows($res);
      
                while($row = mysqli_fetch_array($res))
                {
                    
                    echo '<div class="row">
                                <div class="col-sm-offset-2 col-sm-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>
                                            Question '.$q_index;
               /*     if($row['q_id']==$q_id)
                    {
                    echo "<span style=\" color:#666;\"> - Edited</span>";
                    }
*/
                    echo'
                                            </h4>
                                            <h6>
                                               '.$row['question'].' 
                                            </h6>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <div class="col-sm-offset-1 col-sm-11">
                                                  <div class="radio">
                                                    <label for="radio'.$i.'">
                                                      <input value="1" type="radio" id="radio'.$i++.'" name="radio'.$q_index.'">
                                                      '.$row['opt1'].'
                                                    </label>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-1 col-sm-11">
                                                  <div class="radio">
                                                    <label for="radio'.$i.'">
                                                      <input value="2" type="radio" id="radio'.$i++.'" name="radio'.$q_index.'">
                                                      '.$row['opt2'].'
                                                    </label>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-1 col-sm-11">
                                                  <div class="radio">
                                                    <label for="radio'.$i.'">
                                                      <input value="3" type="radio" id="radio'.$i++.'" name="radio'.$q_index.'">
                                                      '.$row['opt3'].'
                                                    </label>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-1 col-sm-11">
                                                  <div class="radio">
                                                    <label for="radio'.$i.'">
                                                      <input value="4" type="radio" id="radio'.$i++.'" name="radio'.$q_index.'">
                                                      '.$row['opt4'].'
                                                    </label>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                        ';
                    
                    $q_index++;
                }
        }
        echo '</div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-offset-4 col-sm-4">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                        </div>
                    </div>';
    }
    else if ($_GET['type']==2) {

        $sql1="SELECT * FROM relation_mainquestion WHERE t_id='$_GET[id]'";
        $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
        while($row1= mysqli_fetch_array($res1))
        {
            $_SESSION['quest_id']=$row1['id'];
            echo '  <div class="row">
                        <div class="col-sm-offset-1 col-sm-10">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h4>
                                    Main Question
                                    </h4>
                                    <div class="row">
                                        <div class="col-sm-offset-2 col-sm-8">
                                            <img class="img-responsive" src="'.$row1['question'].'" title="Main Question" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';

            $sql="SELECT * FROM questions WHERE t_id='$row1[id]'";
            $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
            $q_total=mysqli_num_rows($res);
            echo "<input type='hidden' name='t_id' value='".$_GET['id']."'>";
      
                while($row = mysqli_fetch_array($res))
                {
                    
                    echo '<div class="row">
                                <div class="col-sm-offset-2 col-sm-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>
                                            Question '.$q_index;
                    if($row['q_id']==$q_id)
                    {
                    echo "<span style=\" color:#666;\"> - Edited</span>";
                    }

                    echo'
                                            </h4>
                                            <h6>
                                               '.$row['question'].' 
                                            </h6>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <div class="col-sm-offset-1 col-sm-11">
                                                  <div class="radio">
                                                    <label for="radio'.$i.'">
                                                      <input value="1" type="radio" id="radio'.$i++.'" name="radio'.$q_index.'">
                                                      '.$row['opt1'].'
                                                    </label>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-1 col-sm-11">
                                                  <div class="radio">
                                                    <label for="radio'.$i.'">
                                                      <input value="2" type="radio" id="radio'.$i++.'" name="radio'.$q_index.'">
                                                      '.$row['opt2'].'
                                                    </label>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-1 col-sm-11">
                                                  <div class="radio">
                                                    <label for="radio'.$i.'">
                                                      <input value="3" type="radio" id="radio'.$i++.'" name="radio'.$q_index.'">
                                                      '.$row['opt3'].'
                                                    </label>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-1 col-sm-11">
                                                  <div class="radio">
                                                    <label for="radio'.$i.'">
                                                      <input value="4" type="radio" id="radio'.$i++.'" name="radio'.$q_index.'">
                                                      '.$row['opt4'].'
                                                    </label>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                        ';
                    
                    $q_index++;
                }
        }
        echo '</div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-offset-4 col-sm-4">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                        </div>
                    </div>';
    }
    else if ($_GET['type']==3) {

        $sql1="SELECT * FROM relation_mainquestion WHERE t_id='$_GET[id]'";
        $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
        while($row1= mysqli_fetch_array($res1))
        {
            $_SESSION['quest_id']=$row1['id'];
            echo '  <div class="row">
                        <div class="col-sm-offset-1 col-sm-10">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h4>
                                    Problem Statement
                                    </h4>
                                    <div class="row">
                                        <div class="col-sm-offset-2 col-sm-8">
                                            <img class="img-responsive" src="'.$row1['question'].'" title="Main Question" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';

            $sql="SELECT * FROM questions WHERE t_id='$row1[id]'";
            $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
            $q_total=mysqli_num_rows($res);
            echo "<input type='hidden' name='t_id' value='".$_GET['id']."'>";
      
                while($row = mysqli_fetch_array($res))
                {
                    
                    echo '<div class="row">
                                <div class="col-sm-offset-2 col-sm-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>
                                            Options';
                    if($row['q_id']==$q_id)
                    {
                    echo "<span style=\" color:#666;\"> - Edited</span>";
                    }

                    echo'
                                            </h4>
                                            <h6>Choose the serial number of the figure below which should come in the series to complete the pattern</h6>
                                            <div class="row">
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <img class="img-responsive" src="'.$row['question'].'" title="Main Question" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <div class="col-sm-offset-1 col-sm-11">
                                                  <div class="radio">
                                                    <label for="radio'.$i.'">
                                                      <input value="1" type="radio" id="radio'.$i++.'" name="radio'.$q_index.'">
                                                      '.$row['opt1'].'
                                                    </label>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-1 col-sm-11">
                                                  <div class="radio">
                                                    <label for="radio'.$i.'">
                                                      <input value="2" type="radio" id="radio'.$i++.'" name="radio'.$q_index.'">
                                                      '.$row['opt2'].'
                                                    </label>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-1 col-sm-11">
                                                  <div class="radio">
                                                    <label for="radio'.$i.'">
                                                      <input value="3" type="radio" id="radio'.$i++.'" name="radio'.$q_index.'">
                                                      '.$row['opt3'].'
                                                    </label>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-1 col-sm-11">
                                                  <div class="radio">
                                                    <label for="radio'.$i.'">
                                                      <input value="4" type="radio" id="radio'.$i++.'" name="radio'.$q_index.'">
                                                      '.$row['opt4'].'
                                                    </label>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                        ';
                    
                    $q_index++;
                }
        }
        echo '</div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-offset-4 col-sm-4">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                        </div>
                    </div>';
    }else{
          
        echo '<div class="alert alert-danger">
            <p>Hey, looks like the type you entered is not a valid one</p>  
        </div>';
    }
    

    
    // Start Test Form
    //echo "<form name='TestForm' action='result.php' method='POST'>";
    
    
}else{
          
        echo '<div class="alert alert-danger">
            <p>Hey, you  gotta enter a type for the test</p>  
        </div>';
    }



?>

                
                </div>
                </div>
            </div>
        </div>
    </form>

<br><br>


<div class="row">
    
    <div class="col-sm-2">

        <a class="btn btn-default btn-block" href="index.php" class="button bright">Back</a>

    </div>
    <div class="col-sm-2">

        <a class="btn btn-default btn-block" href="../logout.php" class="button bright">Logout</a>

    </div>
</div>


<br>

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


