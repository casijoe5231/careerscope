<?php
    session_start();
  if(isset($_SESSION['user']))
  {
    if($_SESSION['usertype']!=1){
            if ($_SESSION['usertype']!=2 ) {
                
            header("location: home.php?error=0");
            }
        }
  include '../includes/connection2.php';

  $email=$_SESSION['user'][0];

$email = ucfirst($email);
  
  date_default_timezone_set('Asia/Calcutta');
  $datetime = date("F j, Y, g:i a");
  $timesql = date("Y-m-d H:i:s"); 

  $sql="insert into activity(email,menu_accessed,timesql) values('$email','Skill Assessment Home Page','$timesql')";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");


	$stmt2 = "SELECT * FROM skillresult WHERE email='$email' LIMIT 1";
	$result2 = mysqli_query($GLOBALS["___mysqli_ston"], $stmt2);

	while($row2 = mysqli_fetch_array($result2)){
	    $o2=$row2['O'];
	    $c2=$row2['C'];
	    $e2=$row2['E'];
	    $a2=$row2['A'];
	    $n2=$row2['N'];
	}

	$OP=($o2/40)*100;
	$CP=($c2/40)*100;
	$EP=($e2/40)*100;
	$AP=($a2/40)*100;
	$NP=($n2/40)*100;


  ?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Favicon -->
        <link href="images/favicon.ico" rel="shortcut icon"/> 

        <title>BYB | Personality Profiling </title>
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
        <!--script type="text/javascript" src="js/jquery.nav.js"></script-->

        <link rel="stylesheet" type="text/css" href="../styles/theme-style.css" />
        <link rel="stylesheet" type="text/css" href="../styles/theme-master.css" />

        <!-- Graph Plot -->
        <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="plugins/excanvas.js"></script><![endif]-->
        <script language="javascript" type="text/javascript" src="../skill/plugins/jquery.min.js"></script>
        <script language="javascript" type="text/javascript" src="../skill/plugins/jquery.jqplot.min.js"></script>
        <script language="javascript" type="text/javascript" src="../skill/plugins/jqplot.categoryAxisRenderer.min.js"></script>
        <script language="javascript" type="text/javascript" src="../skill/plugins/jqplot.barRenderer.min.js"></script>
        <script type="text/javascript" src="../skill/plugins/jqplot.pointLabels.min.js"></script>
        <!-- Graph plot ends here -->


        
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
            </div></div>

	<div class="container">
		<div class="content">
                        <h1>Personality Test Results</h1>
                        <br />
                        Big Five (OCEAN) and Holland Code (RIASEC) test results
                   
                    <div id="res-container">

                        <?php echo "<h3>".ucfirst(strtolower($_SESSION['user'][1])).", your score for the personality test is as follows: </h3>";?>
                        <h1>OCEAN Results</h1>
                        <h3>Score Table</h3>
                        <?php
                        echo "<table align='center' cellpadding='13'> <tr><th>Trait</th> <th>Percentile</th> <th>Score</th></tr>";
                        
                        echo "<tr><td><b>Extraversion :</b></td><td>";
                        echo "<div class='score'><div style=' width:".$EP."%; height:100%; background-color:#33CCCC; float:left;'>&nbsp; ".$EP."% </div></div>";
                        echo "<p style='text-align:left'>Extraversion reflects how much you are oriented towards things outside yourself and derive satisfaction from interacting with other people.</p>";
                        echo "</td><td style='text-align:center'>".$e2."/40</td></tr>";
                        
                        echo "<tr><td><b>Agreeableness :</b></td><td>";
                        echo "<div class='score'><div style=' width:".$AP."%; height:100%; background-color:#33CCCC; float:left;'>&nbsp; ".$AP."% </div></div>";
                        echo "<p style='text-align:left'>Agreeableness is a measure of ones' trusting and helpful nature, and whether a person is generally well tempered or not.</p>";
                        echo "</td><td style='text-align:center'>".$a2."/40</td></tr>";
                        
                        echo "<tr><td><b>Conscientiousness :</b></td><td>";
                        echo "<div class='score'><div style=' width:".$CP."%; height:100%; background-color:#33CCCC; float:left;'>&nbsp; ".$CP."% </div></div>";
                        echo "<p style='text-align:left'>Conscientiousness reflects how careful you are, both in respect to orginization and rules.</p>";
                        echo "</td><td style='text-align:center'>".$c2."/40</td></tr>";
                        
                        echo "<tr><td><b>Neuroticism  :</b></td><td>";
                        echo "<div class='score'><div style=' width:".$NP."%; height:100%; background-color:#33CCCC; float:left;'>&nbsp; ".$NP."% </div></div>";
                        echo "<p style='text-align:left'>Neuroticism refers to the degree of emotional stability and impulse control. It is the tendency to experience unpleasant emotions easily, such as anger, anxiety, depression, or vulnerability.</p>";
                        echo "</td><td style='text-align:center'>".$n2."/40</td></tr>";
                        
                        echo "<tr><td><b>Openness :</b></td><td>";
                        echo "<div class='score'><div style=' width:".$OP."%; height:100%; background-color:#33CCCC;  float:left;'>&nbsp; ".$OP."% </div></div>";
                        echo "<p style='text-align:left'>Openness reflects the degree of intellectual curiosity, creativity and a preference for novelty and variety a person has.</p>";
                        echo "</td><td style='text-align:center'>".$o2."/40</td></tr>";

                        echo "</table>";
                        ?>

                        <h3>Performance Graph</h3>
                        <!-- Graph Plot -->
                        <?php
                                // Get average score of users
                                $sql3="SELECT * FROM skillresult";         
                                $result3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);           // Get score of all users

                                $count=0;
                                $Eavg =0;
                                $Aavg =0;
                                $Cavg =0;
                                $Navg =0;
                                $Oavg =0;
                                
                                $num_users = mysqli_num_rows($result3);
                                echo "<h4>Your score compared to ".$num_users." participants</h4>";
                                while($row3 = mysqli_fetch_array($result3))  // Calculate average
                               {
                                $Eavg =$Eavg+ $row3['E'];
                                $Aavg =$Aavg+ $row3['A'];
                                $Cavg =$Cavg+ $row3['C'];
                                $Navg =$Navg+ $row3['N'];
                                $Oavg =$Oavg+ $row3['O'];
                                $count++;
                               }
                                $Eavg =$Eavg/$count;
                                $Aavg =$Aavg/$count;
                                $Cavg =$Cavg/$count;
                                $Navg =$Navg/$count;
                                $Oavg =$Oavg/$count;

                               
                        ?>

                        <div id="chartdiv2" class="result-chart" style="height:500px;width:100%"></div>

                        <script type="text/javascript">
                        $(document).ready(function(){
                                <?php
                                echo "var s1 = [".$e2.",".$a2.",".$c2.", ".$n2.",".$o2."];";
                                echo "var s2 = [".$Eavg.",".$Aavg.",".$Cavg.", ".$Navg.",".$Oavg."];";
                                ?>
                                var ticks = ['Extraversion', 'Agreeableness', 'Conscientiousness', 'Neuroticism','Openness'];
                                
                                plot2 = $.jqplot('chartdiv2', [s1, s2], {
                                    seriesDefaults: {
                                        renderer:$.jqplot.BarRenderer,
                                        pointLabels: { show: true }
                                    },
                                    axes: {
                                        xaxis: {
                                            renderer: $.jqplot.CategoryAxisRenderer,
                                            ticks: ticks
                                        }
                                    }
                                });
                             
                                $('#chartdiv2').bind('jqplotDataHighlight', 
                                    function (ev, seriesIndex, pointIndex, data) {
                                        $('#info2').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
                                    }
                                );
                                     
                                $('#chart2').bind('jqplotDataUnhighlight', 
                                    function (ev) {
                                        $('#info2').html('Nothing');
                                    }
                                );
                            });
                        </script>
                        <br>
                        <img src="../skill/images/graph_indicator.png" width=250px;>
                        <br><br>
                        <!-- Graph Plot ends here -->


                        <!--?php
                        echo "<br><br><br><b>Your result shows the following :</b><br><br>";
                        echo "<br><b>Extraversion:</b><br>";
                        showEmsg($e2);
                        echo "<br><br><b>Agreeableness:</b><br>";
                        showAmsg($a2);
                        echo "<br><br><b>Conscientiousness:</b><br>";
                        showCmsg($c2);
                        echo "<br><br><b>Neuroticism:</b><br>";
                        showNmsg($n2);
                        echo "<br><br><b>Openness:</b><br>";
                        showOmsg($o2);


                        ?-->
                        <!--<h1>What is Holland Codes?</h1>
                        <div id="holland-about">

                            According to John Holland's theory, most people are one of six personality types: Realistic, Investigative, Artistic, Social, Enterprising, and Conventional. Take the valid Career Key test to find out which ones you are most like and the careers that fit you best. The characteristics of each of these are described below:<br />

                            <h4>Realistic</h4>

                            Likes to work with animals, tools, or machines; generally avoids social activities like teaching, healing, and informing others;<br />
                            Has good skills in working with tools, mechanical or electrical drawings, machines, or plants and animals;<br />
                            Values practical things you can see, touch, and use like plants and animals, tools, equipment, or machines; and<br />
                            Sees self as practical, mechanical, and realistic.<br />

                            <h4>Investigative</h4>

                            Likes to study and solve math or science problems; generally avoids leading, selling, or persuading people;<br />
                            Values science; and<br />
                            Sees self as precise, scientific, and intellectual.<br />
                            
                            <h4>Artistic</h4>

                            Likes to do creative activities like art, drama, crafts, dance, music, or creative writing; generally avoids highly ordered or repetitive activities;<br />
                            Has good artistic abilities in creative writing, drama, crafts, music, or art;<br />
                            Values the creative arts like drama, music, art, or the works of creative writers; and<br />
                            Sees self as expressive, original, and independent.<br />
                            
                            <h4>Social</h4>

                            Likes to do things to help people  like, teaching, nursing, or giving first aid, providing information; generally avoids using machines, tools, or animals to achieve a goal;<br />
                            Is good at teaching, counseling, nursing, or giving information;<br />
                            Values helping people and solving social problems; and<br />
                            Sees self as helpful, friendly, and trustworthy.<br />
                            
                            <h4>Enterprising</h4>

                            Likes to lead and persuade people, and to sell things and ideas; generally avoids activities that require careful observation and scientific, analytical thinking;<br />
                            Is good at leading people and selling things or ideas;<br />
                            Values success in politics, leadership, or business; and<br />
                            Sees self as energetic, ambitious, and sociable.<br />
                            
                            <h4>Conventional</h4>

                            Likes to work with numbers, records, or machines in a set, orderly way; generally avoids ambiguous, unstructured activities<br />
                            Is good at working with written records and numbers in a systematic, orderly way;<br />
                            Values success in business; and<br />
                            Sees self as orderly, and good at following a set plan.<br />
                        </div>-->                         
	</div>
	</div>
	<div class="row">
		<div class="col-sm-12"><a class="btn btn-default btn-lg" href="home.php">Back</a></div>
	</div>

	</div>
	

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
                                <li class="active"><a href="Home.html">Home</a></li>
                                <li><a href="#" target="_blank">E Portfolio</a></li>
                                <li><a href="#" target="_blank">Aptitude Test</a></li>
                                <li><a href="#" target="_blank">Psychometric Test</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
}
else
{
    header('location:../login.php');
    exit();
}
?>