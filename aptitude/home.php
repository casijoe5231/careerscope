<?php
    session_start();
$con=mysqli_connect("localhost","root","","careerscope");
    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }

    if ($_SESSION['usertype']!=1) {
        if ($_SESSION['usertype']!=2) {
            header("location:../login.php");
        }
    }

        include '../includes/connection1.php';

    $emaill=$_SESSION['user'][0];
    
    date_default_timezone_set('Asia/Calcutta');
    $datetime = date("F j, Y, g:i a");
    $timesql = date("Y-m-d H:i:s"); 
    $sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Aptitude Test Score','$timesql')";
    $res=mysqli_query($con, $sql)or die("query not executed");
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Favicon -->
        <link href="../images/favicon.ico" rel="shortcut icon"/> 

        <title>BYB | My Tests </title>
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
        <link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
<!-- Graph plot  -->
    <link class="include" rel="stylesheet" type="text/css" href="plugins/jqplot/jquery.jqplot.min.css" />
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="../excanvas.js"></script><![endif]-->
    <script class="include" type="text/javascript" src="plugins/jqplot/jquery.min.js"></script>
    
<!-- Graph plot ends here -->
<style>
table {
    font: 16px/24px Verdana, Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: auto;
    margin-left:auto;
    margin-right:auto;
    background-color:#FFFFFF;
    }
td {
   border-bottom: 1px solid #CCC;
    border-top: 1px solid #CCC;
   }

    
th {
    border-bottom: 1px solid #CCC;
    border-top: 1px solid #CCC;
    border-left: 1px solid #CCC;
    border-right: 1px solid #CCC;
    padding: 0 1em;
    padding-bottom:8px;
    background-color:#99CCFF;
    }

td+td {
    text-align: center;
    }
tr:hover { background: #E9E9E3; }   

    .ui-tabs{
      width: 840px;
      margin: 2em auto;
    }
    .ui-tabs-nav{
      font-size: 12px;
    }
    
    .ui-tabs-panel{
      font-size: 14px;
    }
    
    .jqplot-target {
      font-size: 16px;
    }
    
    ol.description {
      list-style-position: inside;
      font-size:15px;
      margin:1.5em auto;
      padding:0 15px;
      width:600px;
    }
	 #test
    {
    color:#ab3454;
	font-size: 280%;
	text-align:center;	
font-style: bold;
font-family: "Georgia", Times, serif;	
	text-shadow: 1px 1px #ff0000;
 
    }
    
    #chart1
    {
    margin-left:auto;
    margin-right:auto;
    margin-top:20px;
    }
    #chart2
    {
    margin-left:auto;
    margin-right:auto;  
    margin-top:20px;
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

            <br>

<h3>&nbsp; Welcome 
<?php 
echo $_SESSION['user'][1];
?>
,</h3>
<br>
<div id="test">My Tests Result</div><br>


<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Score Overview</a></li>
    <li><a href="#tabs-2">Test Performance</a></li>
    <li><a href="#tabs-3">Aptitude Score</a></li>
  </ul>
  <div id="tabs-1">
    <?php

    $username=$_SESSION['user'][1];
    $sql="SELECT * FROM score WHERE username='$username' ORDER BY timesql DESC";
    $res=mysqli_query($con, $sql);
    $res_count=mysqli_num_rows($res);
    if($res_count>0)
    {
        echo "<table cellpadding='4'>";
        echo "<tr><th>Test Name</th><th>Subject</th><th>Your Score</th><th>Attempts</th><th>Time</th> <th></th> </tr>";
        while($row=mysqli_fetch_array($res))
        {
            $sql="SELECT t_name, subject FROM test WHERE id='$row[t_id]'";
            $res2=mysqli_query($con, $sql);
            while($row2=mysqli_fetch_array($res2))
            {
                echo "<tr><td><img src='images/test.png' width='25px' >".$row2['t_name']."</td>";
                echo "<td>".$row2['subject']."</td>";
                echo "<td><div class='score'>".$row['score']."/".$row['max_score']."</div></td>";
                echo "<td>".$row['attempt']."</td>";
                $time = strtotime($row['timesql']);
                $new_time = date('F j, Y, g:i a', $time);
                echo "<td>".$new_time."</td>";
                echo "<td><form action='save_result.php' method='POST' target='blank'>";
                echo "<input type='hidden' name='test_id' value='".$row['t_id']."' >";
                echo "<input type='submit' class='button' value= 'Save Result' target='_blank' >";
                echo "</form></td></tr>";
            }
        
    
        }
        echo "</table>";
    }
    else
    {
        echo "<p id='center'>You do not seem to have submitted a test</p>";
    }

    ?>
  </div>
  <div id="tabs-2">
    <div id="chart1" ></div>   
  </div>
  <div id="tabs-3">
  <div id="chart2" ></div>
     
    </div>
</div>





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
<script  type="text/javascript">
    $(document).ready(function() {
        $.jqplot.config.enablePlugins = false;
        
    <?php
    // Get data for Graphs
    $username=$_SESSION['user'][1];
    $sql="SELECT * FROM score INNER JOIN test ON score.t_id=test.id AND username='$username' ORDER BY timesql DESC LIMIT 5";
    //$sql="SELECT score, total FROM score WHERE username='$username' ";
    $res=mysqli_query($con, $sql);
    $res_count=mysqli_num_rows($res);
    if($res_count>0)
    {
        echo "var line1 = [";
        while($row=mysqli_fetch_array($res))
        {
            $score=($row['score']/$row['max_score'])*100;        // Percentage score
            echo "['".$row['t_name']."', ".(int)$score." ]";
            echo ",";       
        }
        echo "];";
    }   
        
        
        
    // Generate Pie chart values 
    $username=$_SESSION['user'][1];
    //Initialize score variables
    $qs=0;  // Quantitative score
    $qt=0;  // Quantitative max score
    $vs=0;  // Verbal score
    $vt=0;  // Verbal max score
    $ls=0;  // Logical score
    $lt=0;  // Logical max_score
    $ts=0;  // Technical score
    $tt=0;  // Technical max score
	$as=0;  // analytics score
    $at=0;  // analytics max score
    $js=0;  // judgement score
    $jt=0;  // judgement max score
    $cs=0;  // code score
    $ct=0;  // code max_score
    $ds=0;  // data integration score
    $dt=0;  // data integration max score
    $is=0;  // intellifence score
    $it=0;  // intellifence max_score
    
    
	
	
    // Get all results for current user.
    $sql="SELECT * FROM score INNER JOIN test ON score.t_id=test.id AND username='$username'";
    $res=mysqli_query($con, $sql);
    $res_count=mysqli_num_rows($res);
    if($res_count>0)
    {
    while($row=mysqli_fetch_array($res))
    {
        if($row['domain']=="quant")  // Quantitative
        {
         $qs = $qs + $row['score'];
         $qt = $qt + $row['max_score'];
        }
        else if($row['domain']=="verbal")  // Verbal
        {
         $vs = $vs + $row['score'];
         $vt = $vt + $row['max_score'];     
        }
        else if($row['domain']=="logic")  // Logical
        {
         $ls = $ls + $row['score'];
         $lt = $lt + $row['max_score'];     
        }
		else if($row['domain']=="analytics")  // Logical
        {
         $as = $as + $row['score'];
         $at = $at + $row['max_score'];     
        }
        
		else if($row['domain']=="judgement")  // Logical
        {
         $js = $js + $row['score'];
         $jt = $jt + $row['max_score'];     
        }
        
		else if($row['domain']=="datai")  // Logical
        {
         $ds = $ds + $row['score'];
         $dt = $dt + $row['max_score'];     
        }
        
		else if($row['domain']=="code")  // Logical
        {
         $cs = $cs + $row['score'];
         $ct = $ct + $row['max_score'];     
        }
        else if($row['domain']=="int")  // Logical
        {
         $is = $is + $row['score'];
         $it = $it + $row['max_score'];     
        }
        
        else  // Other Technical tests
        {
         $ts = $ts + $row['score'];
         $tt = $tt + $row['max_score'];     
        }
        
        
    }
        
    if($qs!=0)
    $qp = ($qs/$qt)*100;
    else
    $qp=0;
    
    if($vs!=0)
    $vp = ($vs/$vt)*100;
    else
    $vp=0;
    
    if($ls!=0)
    $lp = ($ls/$lt)*100;
    else
    $lp=0;
    
    if($ts!=0)
    $tp = ($ts/$tt)*100;
    else
    $tp=0;
        
		 if($as!=0)
    $ap = ($as/$at)*100;
    else
    $ap=0;
    
    if($js!=0)
    $jp = ($js/$jt)*100;
    else
    $jp=0;
    
    if($ds!=0)
    $dp = ($ds/$dt)*100;
    else
    $dp=0;
    
    if($cs!=0)
    $cp = ($cs/$ct)*100;
    else
    $cp=0;
   
	if($is!=0)
    $ip = ($is/$it)*100;
    else
    $ip=0;
		
    echo "var line2 = [['Quantitative',".(int)$qp."], ['Verbal', ".(int)$vp."], ['Logical', ".(int)$lp."], ['Technical', ".(int)$tp."],['Analytical Reasoning',".(int)$ap."], ['Judgement', ".(int)$jp."], ['Data integration', ".(int)$dp."], ['coding', ".(int)$tp."],['Intelligence ', ".(int)$tp."]];";
    }   



    ?>

        $("#tabs").tabs();
        
        var plot1 = $.jqplot('chart1', [line1],  {
          height: 400,
          width: 750,
          title: "Your performance in the last 5 tests",
          lengend:{show:true},
		  seriesColors: ['#ff5645', 'orange', '#ac58fa',  '#33fc34','#dd336d'],
        
          series:[{renderer:$.jqplot.BarRenderer, rendererOptions: {varyBarColor: true}}],
          axes:{xaxis:{renderer: $.jqplot.CategoryAxisRenderer}, yaxis: { min:0, max:100}},
        });
        
        var plot2 = $.jqplot('chart2', [line2], {
          height: 400,
          width: 600,
		  title: "Test Score in each Section of Aptitude",
          
		    seriesColors: ['#ff5645', 'orange', '#ac58fa',  '#33fc34','#dd336d','#BEF781','#aadada','#F4FA58','#F781D8'],
        
          series:[{renderer:$.jqplot.PieRenderer,rendererOptions: {startAngle: 180,  sliceMargin: 4, showDataLabels: true }  }],
          legend:{show:true},
        });
    
    

        $('#tabs').bind('tabsactivate', function(event, ui) {
          if (ui.newTab.index() === 1 && plot1._drawCount === 0) {
            plot1.replot();
          }
          else if (ui.newTab.index() === 2 && plot2._drawCount === 0) {
            plot2.replot();
          }
        });

        
    
    });
</script> 

<!-- End example scripts -->


<!-- Additional plugins go here -->
  <script class="include" type="text/javascript" src="plugins/jqplot/jquery.jqplot.min.js"></script>
  <script class="include" type="text/javascript" src="plugins/jqplot/jqplot.cursor.min.js"></script>
  <script class="include" type="text/javascript" src="plugins/jqplot/jqplot.pieRenderer.min.js"></script>
  <script class="include" type="text/javascript" src="plugins/jqplot/jqplot.barRenderer.min.js"></script>
  <script class="include" type="text/javascript" src="plugins/jqplot/jqplot.ohlcRenderer.min.js"></script>
  <script class="include" type="text/javascript" src="plugins/jqplot/jqplot.categoryAxisRenderer.min.js"></script>
  <link class="include" type="text/css" href="plugins/jqueryui/jquery-ui.css" rel="Stylesheet" /> 
  <script class="include" type="text/javascript" src="plugins/jqueryui/jquery-ui.min.js"></script>

<!-- End additional plugins -->
        
        

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


