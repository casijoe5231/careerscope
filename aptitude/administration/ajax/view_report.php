<?php
    session_start();
	if(!isset($_SESSION['administration']))
	{
		header('location:index.php');
		exit();
	}
		include '../../connection.php';
	?>
<html>
<head>
<style>
table#rep {
	font: 16px/24px Verdana, Arial, Helvetica, sans-serif;
	border-collapse: collapse;
	width: 700px;
	margin-left:auto;
	margin-right:auto;
	background-color:#FFFFFF;
	color:black;
	}
td {
   border-bottom: 1px solid #CCC;
	border-top: 1px solid #CCC;
   }

td.left {
	border-bottom: 1px solid #CCC;
	border-top: 1px solid #CCC;
	border-left: 1px solid #CCC;
	padding: 0 1em;
	padding-bottom:8px;
	}
td.right {
	border-bottom: 1px solid #CCC;
	border-top: 1px solid #CCC;
	border-right: 1px solid #CCC;
	padding: 0 1em;
	padding-bottom:8px;
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


#user_edit
	{
	font: 16px/24px Verdana, Arial, Helvetica, sans-serif;
	border-collapse: collapse;
	width: 100%;
	margin-left:auto;
	margin-right:auto;
	background-color:#0099FF;
	color:white;
	padding:5px;
	text-align: center;
	}	
	
	#chart1
	{
	margin-left:auto;
	margin-right:auto;
	margin-top:20px;
	height:300px;
	color:white;
	}
	#chart2
	{
	margin-left:auto;
	margin-right:auto;	
	margin-top:20px;
	}

</style>
<!-- Graph plot  -->
    <link class="include" rel="stylesheet" type="text/css" href="../plugins/jqplot/jquery.jqplot.min.css" />
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="../excanvas.js"></script><![endif]-->
    <script class="include" type="text/javascript" src="../plugins/jqplot/jquery.min.js"></script>
	<script class="include" type="text/javascript" src="../plugins/jqplot/jquery.jqplot.min.js"></script>
	<script class="include" type="text/javascript" src="../plugins/jqplot/jqplot.cursor.min.js"></script>
	<script class="include" type="text/javascript" src="../plugins/jqplot/jqplot.pieRenderer.min.js"></script>
	<script class="include" type="text/javascript" src="../plugins/jqplot/jqplot.barRenderer.min.js"></script>
	<script class="include" type="text/javascript" src="../plugins/jqplot/jqplot.ohlcRenderer.min.js"></script>
	<script class="include" type="text/javascript" src="../plugins/jqplot/jqplot.categoryAxisRenderer.min.js"></script>
	
<!-- Graph plot ends here -->
</head>
<body>
<?php
					 		
$user_id=$_COOKIE["apt_username"];	
echo "<b>User Report</b><br><br>";

//Display User Report
$sql="SELECT * FROM score WHERE username='$user_id' ";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$test_count=mysqli_num_rows($res);
if($res)
{
	if($test_count>0)
	{
		echo "<table id='rep'>";
		echo "<tr><th>Test Name</th><th>Subject</th><th>Test Score</th><th>Time</th></tr>";
		while($row=mysqli_fetch_array($res))
		{
			$sql="SELECT t_name, subject FROM test WHERE id='$row[t_id]'";
			$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql);

			while($row2=mysqli_fetch_array($res2))
			{
				echo "<tr><td><img src='../images/test.png' width='25px' >".$row2['t_name']."</td>";
				echo "<td>".$row2['subject']."</td>";
				echo "<td><div class='score'>".$row['score']."/".$row['max_score']."</div></td>";
				$time = strtotime($row['timesql']);
				$new_time = date('F j, Y, g:i a', $time);
				echo "<td>".$new_time."</td></tr>";
			}
		}
		echo "</table>";
		
		echo "<div id='chart1' ></div>  ";
		echo "<div id='chart2' ></div>  ";
	}
	else
	{
		echo "<b>This student does not seem to have completed any test</b>";
	}

	
	
}
else
{
 echo "<b>This student does not seem to have completed any test</b>";
}
?>


<script  type="text/javascript">
$(document).ready(function(){
	<?php
	// Get data for Graphs
	$username=$_COOKIE["apt_username"];	
	$sql="SELECT * FROM score INNER JOIN test ON score.t_id=test.id AND username='$username' ORDER BY timesql DESC LIMIT 5";
	//$sql="SELECT score, total FROM score WHERE username='$username' ";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
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
	//Initialize score variables
	$qs=0;  // Quantitative score
	$qt=0;  // Quantitative max score
	$vs=0;  // Verbal score
	$vt=0;  // Verbal max_score
	$ls=0;  // Logical score
	$lt=0;  // Logical max score
	$ts=0;  // Technical score
	$tt=0;  // Technical max score
	// Get all results for current user.
	$sql="SELECT * FROM score INNER JOIN test ON score.t_id=test.id AND username='$username'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
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
		
    echo "var line2 = [['Quantitative',".(int)$qp."], ['Verbal', ".(int)$vp."], ['Logical', ".(int)$lp."], ['Technical', ".(int)$tp."]];";
	}	



	?>
	
    $('#chart1').jqplot([line1], {
        title:'Users last 5 tests',
        seriesDefaults:{
            renderer:$.jqplot.BarRenderer,
            rendererOptions: {
                // Set the varyBarColor option to true to use different colors for each bar.
                // The default series colors are used.
                varyBarColor: true
            }
        },
        axes:{
            xaxis:{
                renderer: $.jqplot.CategoryAxisRenderer
            }, 
			yaxis: { 
				min:0, max:100
			}
        }
    });
	
	
	var plot2 = jQuery.jqplot ('chart2', [line2], 
    { 
      seriesDefaults: {
        // Make this a pie chart.
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: {
          // Put data labels on the pie slices.
          // By default, labels show the percentage of the slice.
          showDataLabels: true
        }
      }, 
      legend: { show:true, location: 'e' }
    });
  
  
});
</script>
</body>
</html>