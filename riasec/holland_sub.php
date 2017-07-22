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
    include "../includes/connection2.php";
if (mysqli_connect_errno()) {
  echo "Failed to connect to mysql: " . mysqli_connect_error();
}

$email=$_SESSION['user'][0];
$email = ucfirst($email);

// escape variables for security
$chkstmt="SELECT * FROM riasec_res WHERE email='$email'";
$chkresult=mysqli_query($con,$chkstmt);
if(mysqli_num_rows($chkresult)){
    $sql="UPDATE riasec_res 
          SET r='$_POST[r]', i='$_POST[i]', a='$_POST[a]', s='$_POST[s]', e='$_POST[e]', c='$_POST[c]'
          WHERE email='$email' LIMIT 1";
}
else{
    $sql="INSERT INTO riasec_res (email, r, i, a, s, e, c)
    VALUES ('$email', '$_POST[r]', '$_POST[i]', '$_POST[a]', '$_POST[s]', '$_POST[e]', '$_POST[c]')";
}


if (!mysqli_query($con,$sql)) {
      die('Error: ' . mysqli_error($con));
    }
//if (!mysqli_query($con,$sql)) {
//  die('Error: ' . mysqli_error($con));
//}
//echo "1 record added";

$stmt1 = "SELECT * FROM riasec_res WHERE email='$email' LIMIT 1";
$result1 = mysqli_query($con,$stmt1);
while($row1 = mysqli_fetch_array($result1)) {
        $r = $row1['r'];
        $i = $row1['i'];
        $a = $row1['a'];
        $s = $row1['s'];
        $e = $row1['e'];
        $c = $row1['c'];
}


$riasecarray=array(
    array($r,$i,$a,$s,$e,$c),
    array('R','I','A','S','E','C')
    );

    for($m=0;$m<6;$m++)
        {
            for($j=$m+1;$j<6;$j++)
            {
                if($riasecarray[0][$m]<$riasecarray[0][$j])
                {
                    $k=$riasecarray[0][$m];
                    $k2=$riasecarray[1][$m];
                    $riasecarray[0][$m]=$riasecarray[0][$j];
                    $riasecarray[1][$m]=$riasecarray[1][$j];
                    $riasecarray[0][$j]=$k;
                    $riasecarray[1][$j]=$k2;
                }
            }
        }
        //$riasecarray[1][0]= 0;
        $trait= $riasecarray[1][0].$riasecarray[1][1].$riasecarray[1][2];


        echo json_encode($riasecarray);

        


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
        <!--required scripts and css-->

        <!--/required script and css-->
        <!--link rel="stylesheet" href="css/charts.css" type="text/css" /-->
        <script src="js/amcharts.js" type="text/javascript"></script>
        <script src="js/pie.js" type="text/javascript"></script>
        
 <script type="text/javascript">
            var chart;
            var legend;

            var chartData =[
                {
                    "Traits": "Reality",
                    "value": <?php echo $r; ?>
                },
                {
                    "Traits": "Investigative",
                    "value": <?php echo $i; ?>
                },
                {
                    "Traits": "Artistic",
                    "value": <?php echo $a; ?>
                },
                {
                    "Traits": "Social",
                    "value": <?php echo $s; ?>
                },
                {
                    "Traits": "Enterprising",
                    "value": <?php echo $e; ?>
                },
                {
                    "Traits": "Conventional",
                    "value": <?php echo $c; ?>
                }
            ];

            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();
                chart.dataProvider = chartData;
                chart.titleField = "Traits";
                chart.valueField = "value";
                chart.outlineColor = "none";
                chart.outlineAlpha = 0.8;
                chart.outlineThickness = 2;
                chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                // this makes the chart 3D
                chart.depth3D = 15;
                chart.angle = 30;

                // WRITEriasecarray[2][0]
                chart.write("chartdiv");
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
                    <a style="height:34px" class="btn btn-default btn-block" href="../login.php"><span class="glyphicon glyphicon-home"></span> </a></div>
                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../logout.php">Logout</a></div>
                
                </div>
            </div>
        </div>
        <h1>Holland Test Results</h1>
        
        <div class="row">
            <div class="col-sm-2">
                <div style="margin-top:20px;" class="list-group">
                    <a href="../eportfolio/profile.php" class="list-group-item ">Job Profiling</a>
                    <a href="../riasec/index.php" class="list-group-item active">Holland Test</a>
                    <a href="#" class="list-group-item">Interview</a>
                    <a href="../eportfolio/goal.php" class="list-group-item">Job Aptitude</a>
                    <a href="../eportfolio/presresume.php" class="list-group-item">Resume</a>
                    <a href="#" class="list-group-item">Biographical Sketch</a>
                  </div>
            </div>
            <div class="col-sm-10">
            
                <!--content goes here-->
                <div class="row">
                	
                        <div id="res-table">
                            
                            <div >
                                <table class="table">
                                <tbody>
                                    <tr>
                                        <td> 
                                            <div  id="res-table-title"><b>Score Table</b></div>
                                            <br />
                                            <table  class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td>Realist</td>
                                                        <td><?php echo $r; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td>Investiigative</td>
                                                        <td><?php echo $i; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td>Artistic</td>
                                                        <td><?php echo $a; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td>Social</td>
                                                        <td><?php echo $s; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td>Enterprising</td>
                                                        <td><?php echo $e; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td>Conventional</td>
                                                        <td><?php echo $c; ?></td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <div id="graph-title">
                                                <b>Dominant traits</b>
                                            </div>
                                            <div id="jobsuggest">
                                                <div><br />Your dominant traits are <span style="font-size:32px;"> <?php echo $trait; ?></span></div>
                                                <div id="graph-title">
                                                    <b>Job suggestions</b>
                                                </div>
                                                <?php 
                                                $stmt5= "SELECT * FROM riasec_jobs WHERE traits='$trait'";
                                                $result5= mysqli_query($con,$stmt5);
                                                if(mysqli_num_rows($result5)){
                                                    while ($row5=mysqli_fetch_array($result5)) {
                                                        echo $row5['jobs']."<br />";
                                                    }
                                                }
                                                else
                                                    echo "No job suggesetion for this trait exist in the database";
                                                ?>
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                    

                                </table>    
                                    
                            </div>
                            <div id="graph-title">
                               <b> Performance Graph </b>
                            </div>
                            <div id="chartdiv" style="width: 100%; height: 400px;">
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


