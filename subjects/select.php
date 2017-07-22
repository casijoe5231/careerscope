 <?php
    session_start();
    include '../includes/connection1.php';

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }

    if ($_SESSION['usertype']!=1) {
        if ($_SESSION['usertype']!=2) {
            header("location:../login.php");
        }
    }

    $emaill=$_SESSION['user'][0];
    $con=mysqli_connect("localhost","root","","careerscope");
    date_default_timezone_set('Asia/Calcutta');
    $datetime = date("F j, Y, g:i a");
    $timesql = date("Y-m-d H:i:s"); 
    $sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Aptitude Test','$timesql')";
    $res=mysqli_query($con, $sql)or die("query not executed");
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Favicon -->
        <link href="../images/favicon.ico" rel="shortcut icon"/> 

        <title>BYB | Tests </title>
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
                    <a class="btn btn-default btn-block" href="index.php">&laquo; Back</a></div>
                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../logout.php">Logout</a></div>
                
                </div>
            </div>
        </div>

                
        <h3 style="padding-bottom:20px;" >Here are the tests available to you</h3>


<?php
include '../includes/connection1.php';
// Show test based on domain, If domain not selected, show all tests available.
if(isset($_GET['type']))
{
    $_SESSION['type']=$_GET['type'];
            if($_GET['type']=="tech")
            {   
?>
                <div class="row">
                    <div class="col-sm-12">
                        
                    
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-sm-4">
                                <center>
                                    
                                    <img class="img-responsive" src='images/tech.png'>
                                </center>
                                </div>
                                <div class="col-sm-8">
                                    <h4 style="padding-top:10px;" class="text-center">Computers/I.T </h4>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a class="btn btn-default btn-block" href='select.php?type=compit'>Go!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-sm-4">
                                <center>
                                    
                                    <img class="img-responsive" src='images/tech.png'>
                                </center>
                                </div>
                                <div class="col-sm-8">
                                    <h4 style="padding-top:10px;" class="text-center">ExTC</h4>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a class="btn btn-default btn-block" href='select.php?type=extc'>Go!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-sm-4">
                                <center>
                                    
                                    <img class="img-responsive" src='images/tech.png'>
                                </center>
                                </div>
                                <div class="col-sm-8">
                                    <h4 style="padding-top:10px;" class="text-center">Mechanical</h4>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a class="btn btn-default btn-block" href='select.php?type=mech'>Go!</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                
<?php      
            }
            $sql="SELECT DISTINCT(subject) FROM test WHERE domain='$_GET[type]'";   // Select Subject
            $res2=mysqli_query($con, $sql);
                while($row2 = mysqli_fetch_array($res2))
                {
                    echo "<div class='col-sm-12'>
                            <div class='panel panel-default'>
                                <div class='panel-body'><h4>
                                ".$row2['subject']."</h4>
                                </div>
                            </div>
                        </div>";
                    if($row2['subject']=='Directional Tests')
                    {
                    $sql1="SELECT t_name, id, t_time FROM test WHERE subject='$row2[subject]'";  // Select Test
                    $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
                        while($row1 = mysqli_fetch_array($res1))
                        {
                            echo '  
                                                                                 <div class="col-sm-3">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="text-center">'.$row1['t_name'].'</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="col-sm-4">
                                                        <img class="img-responsive" src="images/test.png" width="50px">
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <br />Time: '.$row1["t_time"].' mins
                                                    </div>
                                                </div>
                                                <div class="panel-footer">
                                                    <a class="btn btn-default btn-block" href="start_test.php?id='.$row1['id'].'&type=0">Take Test</a>
                                                </div>
                                            </div>
                                        </div>';
                        }
                    }
                    elseif($row2['subject']=='Relationship Tests')
                    {
                        $sql4="SELECT t_name, id, t_time FROM test WHERE subject='$row2[subject]'";  // Select Test
                    $res4=mysqli_query($GLOBALS["___mysqli_ston"], $sql4);
                        while($row4 = mysqli_fetch_array($res4))
                        {
                            echo ' 
                                                                                 <div class="col-sm-3">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="text-center">'.$row4['t_name'].'</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="col-sm-4">
                                                        <img class="img-responsive" src="images/test.png" width="50px">
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <br />Time: '.$row4["t_time"].' mins
                                                    </div>
                                                </div>
                                                <div class="panel-footer">
                                                    <a class="btn btn-default btn-block" href="start_test.php?id='.$row4['id'].'&type=1">Take Test</a>
                                              
                                            </div>
                                        </div>
                                    </div>';
                        }
                    }
                    elseif($row2['subject']=='Arrange Letters / Numbers')
                    {
                        $sql6="SELECT t_name, id, t_time FROM test WHERE subject='$row2[subject]'";  // Select Test
                    $res6=mysqli_query($GLOBALS["___mysqli_ston"], $sql6);
                        while($row6 = mysqli_fetch_array($res6))
                        {
                            echo ' 
                                                                                 <div class="col-sm-3">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="text-center">'.$row6['t_name'].'</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="col-sm-4">
                                                        <img class="img-responsive" src="images/test.png" width="50px">
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <br />Time: '.$row6["t_time"].' mins
                                                    </div>
                                                </div>
                                                <div class="panel-footer">
                                                    <a class="btn btn-default btn-block" href="start_test.php?id='.$row6['id'].'&type=1">Take Test</a>
                                            </div>
                                        </div>
                                    </div>';
                        }
                    }
                    elseif($row2['subject']=='Judgement Tests')
                    {
                        $sql7="SELECT t_name, id, t_time FROM test WHERE subject='$row2[subject]'";  // Select Test
                    $res7=mysqli_query($GLOBALS["___mysqli_ston"], $sql7);
                        while($row7 = mysqli_fetch_array($res7))
                        {
                            echo ' 
                                                                                 <div class="col-sm-3">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="text-center">'.$row7['t_name'].'</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="col-sm-4">
                                                        <img class="img-responsive" src="images/test.png" width="50px">
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <br />Time: '.$row7["t_time"].' mins
                                                    </div>
                                                </div>
                                                <div class="panel-footer">
                                                    <a class="btn btn-default btn-block" href="start_test.php?id='.$row7['id'].'&type=1">Take Test</a>
                                            </div>
                                        </div>
                                    </div>';
                        }
                    }
                    elseif($row2['subject']=='Data Interpretation')
                    {
                        $sql8="SELECT t_name, id, t_time FROM test WHERE subject='$row2[subject]'";  // Select Test
                    $res8=mysqli_query($GLOBALS["___mysqli_ston"], $sql8);
                        while($row8 = mysqli_fetch_array($res8))
                        {
                            echo ' 
                                                                                 <div class="col-sm-3">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="text-center">'.$row8['t_name'].'</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="col-sm-4">
                                                        <img class="img-responsive" src="images/test.png" width="50px">
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <br />Time: '.$row8["t_time"].' mins
                                                    </div>
                                                </div>
                                                <div class="panel-footer">
                                                    <a class="btn btn-default btn-block" href="start_test.php?id='.$row8['id'].'&type=2">Take Test</a>
                                            </div>
                                        </div>
                                    </div>';
                        }
                    }
                    elseif($row2['subject']=='Coding Decoding')
                    {
                        $sql9="SELECT t_name, id, t_time FROM test WHERE subject='$row2[subject]'";  // Select Test
                    $res9=mysqli_query($GLOBALS["___mysqli_ston"], $sql9);
                        while($row9 = mysqli_fetch_array($res9))
                        {
                            echo ' 
                                                                                 <div class="col-sm-3">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="text-center">'.$row9['t_name'].'</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="col-sm-4">
                                                        <img class="img-responsive" src="images/test.png" width="50px">
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <br />Time: '.$row9["t_time"].' mins
                                                    </div>
                                                </div>
                                                <div class="panel-footer">
                                                    <a class="btn btn-default btn-block" href="start_test.php?id='.$row9['id'].'&type=1">Take Test</a>
                                            </div>
                                        </div>
                                    </div>';
                        }
                    }
                    elseif($row2['subject']=='Intelligence Tests')
                    {
                        $sql9="SELECT t_name, id, t_time FROM test WHERE subject='$row2[subject]'";  // Select Test
                    $res9=mysqli_query($GLOBALS["___mysqli_ston"], $sql9);
                        while($row9 = mysqli_fetch_array($res9))
                        {
                            echo ' 
                                                                                 <div class="col-sm-3">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="text-center">'.$row9['t_name'].'</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="col-sm-4">
                                                        <img class="img-responsive" src="images/test.png" width="50px">
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <br />Time: '.$row9["t_time"].' mins
                                                    </div>
                                                </div>
                                                <div class="panel-footer">
                                                    <a class="btn btn-default btn-block" href="start_test.php?id='.$row9['id'].'&type=3">Take Test</a>
                                                </div>
                                        </div>
                                    </div>';
                        }
                    }
                    else
                    {
                        $sql5="SELECT t_name, id, t_time FROM test WHERE subject='$row2[subject]'";  // Select Test
                    $res5=mysqli_query($con, $sql5);
                        while($row5 = mysqli_fetch_array($res5))
                        {
                            echo ' 
                                                                                 <div class="col-sm-3">
                                            <div class="panel panel-default">
                                               
                                                    <div class="panel-heading">
                                                        <h5 class="text-center">'.$row5['t_name'].'</h5>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="col-sm-4">
                                                            <img class="img-responsive" src="images/test.png" width="50px">
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <br />Time: '.$row5["t_time"].' mins
                                                        </div>
                                                    </div>
                                                    <div class="panel-footer">
                                                        <a class="btn btn-default btn-block" href="start_test.php?id='.$row5['id'].'&type=0">Take Test</a>
                                                    </div>
                                        </div>
                                    </div>';
                        }
                    }
                }
            
}
else
{?>



<div class="row">
    <div class="col-sm-offset-1 col-sm-10">

<?php
    include '../includes/connection1.php';
 // Show all available tests
    $sql="SELECT * FROM domain";                                                    // Select Domain
    $res=mysqli_query($con, $sql);
    echo '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
    $i=0;   
        while($row = mysqli_fetch_array($res))
        {

            $i++;
            echo '<div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading'.$row['id'].'">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$row['id'].'" aria-expanded="true" aria-controls="collapse'.$row['id'].'">
                              '.$row['Name'].'
                            </a>
                          </h4>
                        </div>
                        <div id="collapse'.$row['id'].'" class="panel-collapse collapse';
            if ($i==1) {
                echo "in";
            }
                        echo '" role="tabpanel" aria-labelledby="heading'.$row['id'].'">
                          <div class="panel-body">
                          <div class="row">
                          ';

            $sql="SELECT DISTINCT(subject) FROM test WHERE domain='$row[value]'";   // Select Subject
            $res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
                while($row2 = mysqli_fetch_array($res2))
                {
                    echo "<div class='col-sm-12'>";
                    echo "<h4 style='padding-top:20px;'>".$row2['subject']."</h4>";
                    echo "</div>";
                    $sql="SELECT t_name, id, t_time FROM test WHERE subject='$row2[subject]'";  // Select Test
                    $res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
                        while($row3 = mysqli_fetch_array($res3))
                        {   
                            echo '<div class="col-sm-4">';
                            echo "<div class='panel panel-default'>
                                    <div class='panel-heading'>
                                    ".$row3['t_name']."
                                    </div>
                                    <div class='panel-body'>
                                    <div class='col-sm-4'>
                                    <img class='img-responsive' src='images/test.png' width='45px' style=\"float:left; margin-right:5px;\">
                                    </div>
                                    <div class='col-sm-8'>
                                    <br /><b>Time: </b>".$row3['t_time']." mins</br><br>
                                    </div>  
                                    </div>
                                    <div class='panel-footer'>
                                    <a class='btn btn-success btn-block' href='start_test.php?id=".$row3['id']."'>Take Test</a>
                                    </div></div></div>
                                ";
                        }
                        
                }
            echo '</div>
                        </div>
                      </div>
                      </div>';
        }
    echo "</div></div>
</div>
";
}
?>

<br />


</div>

<div class="container">
<div class="row">
    
    <div class="col-sm-2">

        <a class="btn btn-default btn-block" href="index.php" class="button bright">Back</a>

    </div>
    <div class="col-sm-2">

        <a class="btn btn-default btn-block" href="../logout.php" class="button bright">Logout</a>

    </div>
</div>



        </div>
        <!-- End of the main content -->


        
        

  <div style="margin-top:60px;" class="lineBlack">
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


