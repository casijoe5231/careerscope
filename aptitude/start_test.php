<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("location../login.php");
    }

    if($_SESSION['usertype']!=1){
        if($_SESSION['usertype']!=2){
        header("location:../login.php");
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Favicon -->
        <link href="../images/favicon.ico" rel="shortcut icon"/> 

        <title>BYB | Start Test </title>
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

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

        
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
                    <?php
            if(isset($_SERVER['HTTP_REFERER']))
                $referer=$_SERVER['HTTP_REFERER'];
            else
                $referer="index.php";
            echo '<a class="btn btn-default btn-block" href="'.$referer.'">&laquo; Back</a>';
        ?>
                    </div>
                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../logout.php">Logout</a></div>
                
                </div>
            </div>
        </div>

<?php 
// Show Logged in information
echo "<h3>Welcome "; 
echo $_SESSION['user'][1];
echo ",</h3>";
?>

<h5>
You are about to start a test
</h5>
<?php
$con=mysqli_connect("localhost","root","","careerscope");
include '../includes/connection1.php';
// Show test based on domain, If domain not selected, show all tests available.
if(isset($_GET['id']))
{
    $_SESSION['test_id']=$_GET['id'];
                    $sql="SELECT t_name, id, t_time, t_desc, negative FROM test WHERE id='$_GET[id]' LIMIT 1";  // Select Test
                    $res3=mysqli_query($con, $sql);
                    $sql2="SELECT t_id FROM questions WHERE t_id='$_GET[id]'";  // Select Test
                     $res2=mysqli_query($con, $sql2);
                     $questions2=mysqli_num_rows($res2);
                        while($row3 = mysqli_fetch_array($res3))
                        {   

                            $_SESSION['id1']=$row3['id'];
                            echo '
                                <div class="row">
                                    <div class="col-sm-offset-3 col-sm-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h5>'.$row3['t_name'].'</h5>
                                            </div>
                                            <div class="panel-body">
                                            <div class="col-sm-4">
                                                <center>
                                                <img class="img-responsive" src=\'images/test.png\'>
                                                </center>
                                            </div>
                                            <div class="col-sm-8">

                                                <h5>Total Questions:'.$questions2.'</h5>
                                                <h5>Test Time: '.$row3['t_time'].' minutes</h5>
                                                <p class="text-justify">'.$row3['t_desc'].'</p>';
                                                if($row3['negative']==1)
                                            echo "<br /><h6>This test has negative marking enabled.</h6>";

                                      
                        }
                        
                     
                     
                        
                        
                     if($questions2==0){
                        echo      '
                                            <h6>You cannot attempt this Test as questions are yet to be added to it</h6>
                                            </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            ';
                     }
                     else {
                         echo      '</div>

                                            
                                            </div>
                                            <div class="panel-footer">
                                                <a class="btn btn-success btn-block" href=\'test.php?id='.$_GET['id'].'&type='.$_GET['type'].'\'>Start Test</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ';
                     }

                    
                    
}
?>


        </div>
        <!-- End of the main content -->
        
        

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


