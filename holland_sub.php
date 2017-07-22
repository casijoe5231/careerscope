<?php
session_start();
/*if(!isset($_SESSION['user']))
{
    header('location:../login.php');
    exit();
}*/


include "connection1.php";
include "../styles/theme-master.php";
//include "../skill/holland_func.php";
// Check connection
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

$stmt2 = "SELECT * FROM skillresult WHERE email='$email' LIMIT 1";
$result2 = mysqli_query($con,$stmt2);

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


$riasecarray=array(
    array($r,$i,$a,$s,$e,$c),
    array('R','I','A','S','E','C')
    );

    for($i=0;$i<6;$i++)
        {
            for($j=$i+1;$j<6;$j++)
            {
                if($riasecarray[0][$i]<$riasecarray[0][$j])
                {
                    $k=$riasecarray[0][$i];
                    $k2=$riasecarray[1][$i];
                    $riasecarray[0][$i]=$riasecarray[0][$j];
                    $riasecarray[1][$i]=$riasecarray[1][$j];
                    $riasecarray[0][$j]=$k;
                    $riasecarray[1][$j]=$k2;
                }
            }
        }
        //$riasecarray[1][0]= 0;
        $trait= $riasecarray[1][0].$riasecarray[1][1].$riasecarray[1][2];


        //echo json_encode($riasecarray);

        


?>
<!DOCTYPE html>
<html>
	<head>
        <title>Skill Assessment</title>
        <link rel="stylesheet" type="text/css" href="../styles/theme-style.css" />
        <link rel="stylesheet" type="text/css" href="../styles/theme-master.css" />
        <link rel="stylesheet" type="text/css" href="css/raisec.css" />
        <link rel="stylesheet" href="css/charts.css" type="text/css" />
        <script src="js/amcharts.js" type="text/javascript"></script>
        <script src="js/pie.js" type="text/javascript"></script>
        
        <!-- Graph Plot -->
        <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="plugins/excanvas.js"></script><![endif]-->
        <script language="javascript" type="text/javascript" src="../skill/plugins/jquery.min.js"></script>
        <script language="javascript" type="text/javascript" src="../skill/plugins/jquery.jqplot.min.js"></script>
        <script language="javascript" type="text/javascript" src="../skill/plugins/jqplot.categoryAxisRenderer.min.js"></script>
        <script language="javascript" type="text/javascript" src="../skill/plugins/jqplot.barRenderer.min.js"></script>
        <script type="text/javascript" src="../skill/plugins/jqplot.pointLabels.min.js"></script>
        <!-- Graph plot ends here -->

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
        <div class="bg">
            <div class="container">
            <?php
            header_fn();
            ?>
                <div class="content">
                    <br />
                    <div class="title">
                        <h3>&nbsp; Welcome 
                        <?php 
                        echo $_SESSION['user'][1];
                        ?>
                        </h3>
                    </div>
                    <div id="test-title-container">
                        <span id="test-title">Personality Test Results</span>
                        <br />
                        Big Five (OCEAN) and Holland Code (RIASEC) test results
                    </div>
                    <div id="res-container">

                        <?php echo "<h3>".ucfirst(strtolower($_SESSION['user'][1])).", your score for the personality test is as follows: </h3>";?>
                        <h1>OCEAN Results</h1>
                        <div id="res-table-title">Score Table</div>
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

                        <div id="graph-title">Performance Graph</div>
                        <!-- Graph Plot -->
                        <?php
                                // Get average score of users
                                $sql3="SELECT * FROM skillresult";         
                                $result3=mysqli_query($con,$sql3);           // Get score of all users

                                $count=0;
                                $Eavg =0;
                                $Aavg =0;
                                $Cavg =0;
                                $Navg =0;
                                $Oavg =0;
                                
                                $num_users = mysqli_num_rows($result3);
                                echo "Your score compared to ".$num_users." participants";
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

                        <div id="chartdiv2" class="result-chart" style="height:300px;width:700px"></div>

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
                        <h1>RIASEC results</h1>
                        <div id="res-table">
                            <div id="res-table-title">Score Table</div>
                            <div id="res-table-tb" >
                            <table>
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
                            </div>
                            <div id="graph-title">
                                Performance Graph
                            </div>
                            <div id="chartdiv" style="width: 100%; height: 400px;">
                            </div>
                            <div id="graph-title">
                                Job suggestions
                            </div>
                            <div id="jobsuggest">
                                <div><br />Your dominant traits are <?php echo $trait; ?></div>
                                <p>Some jobs that suit you are <br /><br />
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
                        </div>
                    </div>
                    
                </div>
                <?php
                footer_fn();
                ?>
            </div>

        </div>
        
    </body>
</html>
<?php 
// Functions to show detailed report

// Extraversion Analysis
function showEmsg($E)
{

  if($E>=0 && $E <=5)
  {
   showRes("E" , 8);  
  }
    else if($E>5 && $E<=10)
  {

   showRes("E" , 7);
    
  }
  else if($E>10 && $E<=15)
  {

   showRes("E" , 6);
    
  }
    else if($E>15 && $E<=20)
  {

   showRes("E" , 5);
    
  }
  else if($E>20 && $E<=25)
  {

   showRes("E" , 4);
    
  }
    else if($E>25 && $E<=30)
  {

   showRes("E" , 3);
    
  }
    else if($E>30 && $E<=35)
  {

   showRes("E" , 2);
    
  }
  else if($E>35 && $E<=40)
  {

   showRes("E" , 1);
    
  }   
}

// Agreeableness Analysis
function showAmsg($A)
{

  if($A>=0 && $A <=5)
  {
   showRes("A" , 8);  
  }
    else if($A>5 && $A<=10)
  {

   showRes("A" , 7);
    
  }
  else if($A>10 && $A<=15)
  {

   showRes("A" , 6);
    
  }
    else if($A>15 && $A<=20)
  {

   showRes("A" , 5);
    
  }
  else if($A>20 && $A<=25)
  {

   showRes("A" , 4);
    
  }
    else if($A>25 && $A<=30)
  {

   showRes("A" , 3);
    
  }
    else if($A>30 && $A<=35)
  {

   showRes("A" , 2);
    
  }
  else if($A>35 && $A<=40)
  {

   showRes("A" , 1);
    
  }   
}

// Conscientiousness Analysis
function showCmsg($C)
{

  if($C>=0 && $C <=5)
  {
   showRes("C" , 8);  
  }
    else if($C>5 && $C<=10)
  {

   showRes("C" , 7);
    
  }
  else if($C>10 && $C<=15)
  {

   showRes("C" , 6);
    
  }
    else if($C>15 && $C<=20)
  {

   showRes("C" , 5);
    
  }
  else if($C>20 && $C<=25)
  {

   showRes("C" , 4);
    
  }
    else if($C>25 && $C<=30)
  {

   showRes("C" , 3);
    
  }
    else if($C>30 && $C<=35)
  {

   showRes("C" , 2);
    
  }
  else if($C>35 && $C<=40)
  {

   showRes("C" , 1);
    
  }   
}

// Neuroticism Analysis
function showNmsg($N)
{

  if($N>=0 && $N <=5)
  {
   showRes("N" , 8);  
  }
    else if($N>5 && $N<=10)
  {

   showRes("N" , 7);
    
  }
  else if($N>10 && $N<=15)
  {

   showRes("N" , 6);
    
  }
    else if($N>15 && $N<=20)
  {

   showRes("N" , 5);
    
  }
  else if($N>20 && $N<=25)
  {

   showRes("N" , 4);
    
  }
    else if($N>25 && $N<=30)
  {

   showRes("N" , 3);
    
  }
    else if($N>30 && $N<=35)
  {

   showRes("N" , 2);
    
  }
  else if($N>35 && $N<=40)
  {

   showRes("N" , 1);
    
  }   
}

// Openness Analysis
function showOmsg($O)
{

  if($O>=0 && $O <=5)
  {
   showRes("O" , 8);  
  }
    else if($O>5 && $O<=10)
  {

   showRes("O" , 7);
    
  }
  else if($O>10 && $O<=15)
  {

   showRes("O" , 6);
    
  }
    else if($O>15 && $O<=20)
  {

   showRes("O" , 5);
    
  }
  else if($O>20 && $O<=25)
  {

   showRes("O" , 4);
    
  }
    else if($O>25 && $O<=30)
  {

   showRes("O" , 3);
    
  }
    else if($O>30 && $O<=35)
  {

   showRes("O" , 2);
    
  }
  else if($O>35 && $O<=40)
  {

   showRes("O" , 1);
    
  }   
}


function showRes($type,$id)
{
    $sql4="SELECT result FROM analysis WHERE type='$type' && id='$id'";      
    $result4=mysqli_query($con,$sql4); // Get score of all users

        while($row4 = mysqli_fetch_array($result4))  // Calculate average
       {
      echo "<div class='res'><p style='text-align:left'>";
      echo $row4['result'];
      echo "</p></div>";

       }
}

mysqli_close($con);
?>