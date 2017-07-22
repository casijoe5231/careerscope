<?php
    session_start();
	if(isset($_SESSION['user']))
	{
		include '../includes/connection1.php';
		include 'styles/theme-master.php';

	$emaill=$_SESSION['user'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Aptitude Test Score','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
	?>
<!DOCTYPE html>
<html><head><title>Skill Assessment Home</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
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

<div class="bg">
<div class="container">
<?php
header_fn();
?>
<div class="content">
<br>
<div class="title">
<h3>&nbsp; Welcome 
<?php 
echo $_SESSION['user'][1];
?>
</h3>
</div>
<a href="../logout.php" class="button right">Logout</a>
<a href="index.php" class="button right">Home</a>
<br>
<br>
<br>
<br>
<p id="center">
<b>My Tests</b><br>
</p>


<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Score</a></li>
    <li><a href="#tabs-2">Test Performance</a></li>
    <li><a href="#tabs-3">Overview</a></li>
  </ul>
  <div id="tabs-1">
    <?php

	$username=$_SESSION['user'][1];
	$sql="SELECT * FROM score WHERE username='$username' ORDER BY timesql DESC";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	$res_count=mysqli_num_rows($res);
	if($res_count>0)
	{
		echo "<table cellpadding='4'>";
		echo "<tr><th>Test Name</th><th>Subject</th><th>Your Score</th><th>Attempts</th><th>Time</th> <th></th> </tr>";
		while($row=mysqli_fetch_array($res))
		{
			$sql="SELECT t_name, subject FROM test WHERE id='$row[t_id]'";
			$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
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
<a href="index.php" style="text-decoration:none;color:blue;">&lt;&lt;&nbsp;Previous</a>
</div>

<?php
footer_fn();
?>
</div>
</div>
<script  type="text/javascript">
    $(document).ready(function() {
        $.jqplot.config.enablePlugins = false;
		
	<?php
	// Get data for Graphs
	$username=$_SESSION['user'][1];
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

        $("#tabs").tabs();
		
		var plot1 = $.jqplot('chart1', [line1],  {
		  height: 300,
          width: 600,
          title: "Your performance in the last 5 tests",
          lengend:{show:true},
          series:[{renderer:$.jqplot.BarRenderer, rendererOptions: {varyBarColor: true}}],
          axes:{xaxis:{renderer: $.jqplot.CategoryAxisRenderer}, yaxis: { min:0, max:100}},
        });
		
        var plot2 = $.jqplot('chart2', [line2], {
          height: 300,
          width: 400,
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

  
</body>
</html>
<?php
}
elseif(isset($_SESSION['user2']))
{
		include '../includes/connection1.php';
		include 'styles/theme-master.php';
?>
<!DOCTYPE html>
<html><head><title>Skill Assessment Home</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
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

<div class="bg">
<div class="container">
<?php
header_fn();
?>
<div class="content">
<br>
<div class="title">
<h3>&nbsp; Welcome 
<?php 
echo $_SESSION['user2'][1];
?>
</h3>
</div>
<a href="../logout.php" class="button right">Logout</a>
<a href="index.php" class="button right">Home</a>
<br>
<br>
<br>
<br>
<p id="center">
<b>My Tests</b><br>
</p>


<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Score</a></li>
    <li><a href="#tabs-2">Test Performance</a></li>
    <li><a href="#tabs-3">Overview</a></li>
  </ul>
  <div id="tabs-1">
    <?php

	$username=$_SESSION['user2'][1];
	$sql="SELECT * FROM score WHERE username='$username' ORDER BY timesql DESC";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	$res_count=mysqli_num_rows($res);
	if($res_count>0)
	{
		echo "<table cellpadding='4'>";
		echo "<tr><th>Test Name</th><th>Subject</th><th>Your Score</th><th>Attempts</th><th>Time</th> <th></th> </tr>";
		while($row=mysqli_fetch_array($res))
		{
			$sql="SELECT t_name, subject FROM test WHERE id='$row[t_id]'";
			$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
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
<a href="index.php" style="text-decoration:none;color:blue;">&lt;&lt;&nbsp;Previous</a>
</div>

<?php
footer_fn();
?>
</div>
</div>
<script  type="text/javascript">
    $(document).ready(function() {
        $.jqplot.config.enablePlugins = false;
		
	<?php
	// Get data for Graphs
	$username=$_SESSION['user2'][1];
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
	$username=$_SESSION['user2'][1];
	//Initialize score variables
	$qs=0;  // Quantitative score
	$qt=0;  // Quantitative max score
	$vs=0;  // Verbal score
	$vt=0;  // Verbal max score
	$ls=0;  // Logical score
	$lt=0;  // Logical max_score
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

        $("#tabs").tabs();
		
		var plot1 = $.jqplot('chart1', [line1],  {
		  height: 300,
          width: 600,
          title: "Your performance in the last 5 tests",
          lengend:{show:true},
          series:[{renderer:$.jqplot.BarRenderer, rendererOptions: {varyBarColor: true}}],
          axes:{xaxis:{renderer: $.jqplot.CategoryAxisRenderer}, yaxis: { min:0, max:100}},
        });
		
        var plot2 = $.jqplot('chart2', [line2], {
          height: 300,
          width: 400,
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

  
</body>
</html>
<?php
}
elseif(isset($_SESSION['user1']))
{
	echo "<html><head><script src='../js/alertify.min.js'></script>
	<link rel='stylesheet' href='../css/alertify.core.css' />
	<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
	echo "<SCRIPT LANGUAGE='JavaScript'>
	alertify.alert('Access Restriction!!!', function (e) {
	window.location.href='./index.php';
	});
	</SCRIPT>";
}
else
{
		header('location:../login.php');
		exit();
}
?>