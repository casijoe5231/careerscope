<?php
session_start();

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }
	
//Connection Code
$db="careerscope";
$servername = "localhost";
$username = "root";
$password = "oracle";

// Create connection
$conn=($GLOBALS["___mysqli_ston"] = mysqli_connect($servername, $username, $password));  // Make Connection
	mysqli_select_db($GLOBALS["___mysqli_ston"], $db);                      // Select Database

// Check connection
if (!$conn) {
    die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}
//echo "Connected successfully";

//Connection Code ends
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="images/favicon.ico" rel="shortcut icon"/>
	
    <title>EYB | SDP Analysis</title>
      
<!--  CSS  -->
<link rel="stylesheet" type="text/css" href="../css/logo.css">
    <link rel="stylesheet" type="text/css" href="../css/sdp_edit_border.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link rel='stylesheet' id='camera-css'  href='../css/camera.css' type='text/css' media='all'>
    <link rel="stylesheet" type="text/css" href="../css/carousel.css">
    <link rel="stylesheet" type="text/css" href="../css/slicknav.css">
    <link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main
    stylesheet"charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet'             type='text/css'>
<!-- Bootstrap -->
<link rel="stylesheet" href="css_modal/bootstrap.css">
<link rel="stylesheet" href="css_modal/style1.css">

<!-- Links for Dropdown-->
 <link rel="stylesheet" href="for_dropdown/css/bootstrap.min.css">
  <script src="for_dropdown/js/jquery.min.js"></script>
  <script src="for_dropdown/js/bootstrap.min.js"></script>
<!-- Links for dropdwon ends here -->
<!-- Style for Piechart-->
<style>
.wideBox {
  clear: both;
  text-align: center;
  margin-bottom: 50px;
  padding: 10px;
  background: #ebedf2;
  border: 1px solid #333;
  line-height: 80%;
}

#container {
  width: 900px;
  margin: 0 auto;
}

#chart, #chartData {
  border: 1px solid #333;
  background: #ebedf2 url("images/gradient.png") repeat-x 0 0;
}

#chart {
  display: block;
  margin: 0 0 50px 0;
  float: left;
  cursor: pointer;
}

#chartData {
  width: 200px;
  margin: 0 40px 0 0;
  float: right;
  border-collapse: collapse;
  box-shadow: 0 0 1em rgba(0, 0, 0, 0.5);
  -moz-box-shadow: 0 0 1em rgba(0, 0, 0, 0.5);
  -webkit-box-shadow: 0 0 1em rgba(0, 0, 0, 0.5);
  background-position: 0 -100px;
}

#chartData th, #chartData td {
  padding: 0.5em;
  border: 1px dotted #666;
  text-align: left;
}

#chartData th {
  border-bottom: 2px solid #333;
  text-transform: uppercase;
}

#chartData td {
  cursor: pointer;
}

#chartData td.highlight {
  background: #e8e8e8;
}

#chartData tr:hover td {
  background: #f0f0f0;
}

</style>
<!--Style for Pie chart ends here -->
<!--Javascript for Piechart -->
<script src="js_pie/jquery.min.js"></script>
<script>

// Run the code when the DOM is ready
$( pieChart );

function pieChart() {

  // Config settings
  var chartSizePercent = 55;                        // The chart radius relative to the canvas width/height (in percent)
  var sliceBorderWidth = 1;                         // Width (in pixels) of the border around each slice
  var sliceBorderStyle = "#fff";                    // Colour of the border around each slice
  var sliceGradientColour = "#ddd";                 // Colour to use for one end of the chart gradient
  var maxPullOutDistance = 25;                      // How far, in pixels, to pull slices out when clicked
  var pullOutFrameStep = 4;                         // How many pixels to move a slice with each animation frame
  var pullOutFrameInterval = 40;                    // How long (in ms) between each animation frame
  var pullOutLabelPadding = 65;                     // Padding between pulled-out slice and its label  
  var pullOutLabelFont = "bold 16px 'Trebuchet MS', Verdana, sans-serif";  // Pull-out slice label font
  var pullOutValueFont = "bold 12px 'Trebuchet MS', Verdana, sans-serif";  // Pull-out slice value font
  var pullOutValuePrefix = "";                     // Pull-out slice value prefix
  var pullOutShadowColour = "rgba( 0, 0, 0, .5 )";  // Colour to use for the pull-out slice shadow
  var pullOutShadowOffsetX = 5;                     // X-offset (in pixels) of the pull-out slice shadow
  var pullOutShadowOffsetY = 5;                     // Y-offset (in pixels) of the pull-out slice shadow
  var pullOutShadowBlur = 5;                        // How much to blur the pull-out slice shadow
  var pullOutBorderWidth = 2;                       // Width (in pixels) of the pull-out slice border
  var pullOutBorderStyle = "#333";                  // Colour of the pull-out slice border
  var chartStartAngle = -.5 * Math.PI;              // Start the chart at 12 o'clock instead of 3 o'clock

  // Declare some variables for the chart
  var canvas;                       // The canvas element in the page
  var currentPullOutSlice = -1;     // The slice currently pulled out (-1 = no slice)
  var currentPullOutDistance = 0;   // How many pixels the pulled-out slice is currently pulled out in the animation
  var animationId = 0;              // Tracks the interval ID for the animation created by setInterval()
  var chartData = [];               // Chart data (labels, values, and angles)
  var chartColours = [];            // Chart colours (pulled from the HTML table)
  var totalValue = 0;               // Total of all the values in the chart
  var canvasWidth;                  // Width of the canvas, in pixels
  var canvasHeight;                 // Height of the canvas, in pixels
  var centreX;                      // X-coordinate of centre of the canvas/chart
  var centreY;                      // Y-coordinate of centre of the canvas/chart
  var chartRadius;                  // Radius of the pie chart, in pixels

  // Set things up and draw the chart
  init();


  /**
   * Set up the chart data and colours, as well as the chart and table click handlers,
   * and draw the initial pie chart
   */

  function init() {

    // Get the canvas element in the page
    canvas = document.getElementById('chart');

    // Exit if the browser isn't canvas-capable
    if ( typeof canvas.getContext === 'undefined' ) return;

    // Initialise some properties of the canvas and chart
    canvasWidth = canvas.width;
    canvasHeight = canvas.height;
    centreX = canvasWidth / 2;
    centreY = canvasHeight / 2;
    chartRadius = Math.min( canvasWidth, canvasHeight ) / 2 * ( chartSizePercent / 100 );

    // Grab the data from the table,
    // and assign click handlers to the table data cells
    
    var currentRow = -1;
    var currentCell = 0;

    $('#chartData td').each( function() {
      currentCell++;
      if ( currentCell % 2 != 0 ) {
        currentRow++;
        chartData[currentRow] = [];
        chartData[currentRow]['label'] = $(this).text();
      } else {
       var value = parseFloat($(this).text());
       totalValue += value;
       value = value.toFixed(2);
       chartData[currentRow]['value'] = value;
      }

      // Store the slice index in this cell, and attach a click handler to it
      $(this).data( 'slice', currentRow );
      $(this).click( handleTableClick );

      // Extract and store the cell colour
      if ( rgb = $(this).css('color').match( /rgb\((\d+), (\d+), (\d+)/) ) {
        chartColours[currentRow] = [ rgb[1], rgb[2], rgb[3] ];
      } else if ( hex = $(this).css('color').match(/#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/) ) {
        chartColours[currentRow] = [ parseInt(hex[1],16) ,parseInt(hex[2],16), parseInt(hex[3], 16) ];
      } else {
        alert( "Error: Colour could not be determined! Please specify table colours using the format '#xxxxxx'" );
        return;
      }

    } );

    // Now compute and store the start and end angles of each slice in the chart data

    var currentPos = 0; // The current position of the slice in the pie (from 0 to 1)

    for ( var slice in chartData ) {
      chartData[slice]['startAngle'] = 2 * Math.PI * currentPos;
      chartData[slice]['endAngle'] = 2 * Math.PI * ( currentPos + ( chartData[slice]['value'] / totalValue ) );
      currentPos += chartData[slice]['value'] / totalValue;
    }

    // All ready! Now draw the pie chart, and add the click handler to it
    drawChart();
    $('#chart').click ( handleChartClick );
  }


  /**
   * Process mouse clicks in the chart area.
   *
   * If a slice was clicked, toggle it in or out.
   * If the user clicked outside the pie, push any slices back in.
   *
   * @param Event The click event
   */

  function handleChartClick ( clickEvent ) {

    // Get the mouse cursor position at the time of the click, relative to the canvas
    var mouseX = clickEvent.pageX - this.offsetLeft;
    var mouseY = clickEvent.pageY - this.offsetTop;

    // Was the click inside the pie chart?
    var xFromCentre = mouseX - centreX;
    var yFromCentre = mouseY - centreY;
    var distanceFromCentre = Math.sqrt( Math.pow( Math.abs( xFromCentre ), 2 ) + Math.pow( Math.abs( yFromCentre ), 2 ) );

    if ( distanceFromCentre <= chartRadius ) {

      // Yes, the click was inside the chart.
      // Find the slice that was clicked by comparing angles relative to the chart centre.

      var clickAngle = Math.atan2( yFromCentre, xFromCentre ) - chartStartAngle;
      if ( clickAngle < 0 ) clickAngle = 2 * Math.PI + clickAngle;
                  
      for ( var slice in chartData ) {
        if ( clickAngle >= chartData[slice]['startAngle'] && clickAngle <= chartData[slice]['endAngle'] ) {

          // Slice found. Pull it out or push it in, as required.
          toggleSlice ( slice );
          return;
        }
      }
    }

    // User must have clicked outside the pie. Push any pulled-out slice back in.
    pushIn();
  }


  /**
   * Process mouse clicks in the table area.
   *
   * Retrieve the slice number from the jQuery data stored in the
   * clicked table cell, then toggle the slice
   *
   * @param Event The click event
   */

  function handleTableClick ( clickEvent ) {
    var slice = $(this).data('slice');
    toggleSlice ( slice );
  }


  /**
   * Push a slice in or out.
   *
   * If it's already pulled out, push it in. Otherwise, pull it out.
   *
   * @param Number The slice index (between 0 and the number of slices - 1)
   */

  function toggleSlice ( slice ) {
    if ( slice == currentPullOutSlice ) {
      pushIn();
    } else {
      startPullOut ( slice );
    }
  }

 
  /**
   * Start pulling a slice out from the pie.
   *
   * @param Number The slice index (between 0 and the number of slices - 1)
   */

  function startPullOut ( slice ) {

    // Exit if we're already pulling out this slice
    if ( currentPullOutSlice == slice ) return;

    // Record the slice that we're pulling out, clear any previous animation, then start the animation
    currentPullOutSlice = slice;
    currentPullOutDistance = 0;
    clearInterval( animationId );
    animationId = setInterval( function() { animatePullOut( slice ); }, pullOutFrameInterval );

    // Highlight the corresponding row in the key table
    $('#chartData td').removeClass('highlight');
    var labelCell = $('#chartData td:eq(' + (slice*2) + ')');
    var valueCell = $('#chartData td:eq(' + (slice*2+1) + ')');
    labelCell.addClass('highlight');
    valueCell.addClass('highlight');
  }

 
  /**
   * Draw a frame of the pull-out animation.
   *
   * @param Number The index of the slice being pulled out
   */

  function animatePullOut ( slice ) {

    // Pull the slice out some more
    currentPullOutDistance += pullOutFrameStep;

    // If we've pulled it right out, stop animating
    if ( currentPullOutDistance >= maxPullOutDistance ) {
      clearInterval( animationId );
      return;
    }

    // Draw the frame
    drawChart();
  }

 
  /**
   * Push any pulled-out slice back in.
   *
   * Resets the animation variables and redraws the chart.
   * Also un-highlights all rows in the table.
   */

  function pushIn() {
    currentPullOutSlice = -1;
    currentPullOutDistance = 0;
    clearInterval( animationId );
    drawChart();
    $('#chartData td').removeClass('highlight');
  }
 
 
  /**
   * Draw the chart.
   *
   * Loop through each slice of the pie, and draw it.
   */

  function drawChart() {

    // Get a drawing context
    var context = canvas.getContext('2d');
        
    // Clear the canvas, ready for the new frame
    context.clearRect ( 0, 0, canvasWidth, canvasHeight );

    // Draw each slice of the chart, skipping the pull-out slice (if any)
    for ( var slice in chartData ) {
      if ( slice != currentPullOutSlice ) drawSlice( context, slice );
    }

    // If there's a pull-out slice in effect, draw it.
    // (We draw the pull-out slice last so its drop shadow doesn't get painted over.)
    if ( currentPullOutSlice != -1 ) drawSlice( context, currentPullOutSlice );
  }


  /**
   * Draw an individual slice in the chart.
   *
   * @param Context A canvas context to draw on  
   * @param Number The index of the slice to draw
   */

  function drawSlice ( context, slice ) {

    // Compute the adjusted start and end angles for the slice
    var startAngle = chartData[slice]['startAngle']  + chartStartAngle;
    var endAngle = chartData[slice]['endAngle']  + chartStartAngle;
      
    if ( slice == currentPullOutSlice ) {

      // We're pulling (or have pulled) this slice out.
      // Offset it from the pie centre, draw the text label,
      // and add a drop shadow.

      var midAngle = (startAngle + endAngle) / 2;
      var actualPullOutDistance = currentPullOutDistance * easeOut( currentPullOutDistance/maxPullOutDistance, .8 );
      startX = centreX + Math.cos(midAngle) * actualPullOutDistance;
      startY = centreY + Math.sin(midAngle) * actualPullOutDistance;
      context.fillStyle = 'rgb(' + chartColours[slice].join(',') + ')';
      context.textAlign = "center";
      context.font = pullOutLabelFont;
      context.fillText( chartData[slice]['label'], centreX + Math.cos(midAngle) * ( chartRadius + maxPullOutDistance + pullOutLabelPadding ), centreY + Math.sin(midAngle) * ( chartRadius + maxPullOutDistance + pullOutLabelPadding ) );
      context.font = pullOutValueFont;
      context.fillText( pullOutValuePrefix + chartData[slice]['value'] + " (" + ( parseInt( chartData[slice]['value'] / totalValue * 100 + .5 ) ) +  "%)", centreX + Math.cos(midAngle) * ( chartRadius + maxPullOutDistance + pullOutLabelPadding ), centreY + Math.sin(midAngle) * ( chartRadius + maxPullOutDistance + pullOutLabelPadding ) + 20 );
      context.shadowOffsetX = pullOutShadowOffsetX;
      context.shadowOffsetY = pullOutShadowOffsetY;
      context.shadowBlur = pullOutShadowBlur;

    } else {

      // This slice isn't pulled out, so draw it from the pie centre
      startX = centreX;
      startY = centreY;
    }

    // Set up the gradient fill for the slice
    var sliceGradient = context.createLinearGradient( 0, 0, canvasWidth*.75, canvasHeight*.75 );
    sliceGradient.addColorStop( 0, sliceGradientColour );
    sliceGradient.addColorStop( 1, 'rgb(' + chartColours[slice].join(',') + ')' );

    // Draw the slice
    context.beginPath();
    context.moveTo( startX, startY );
    context.arc( startX, startY, chartRadius, startAngle, endAngle, false );
    context.lineTo( startX, startY );
    context.closePath();
    context.fillStyle = sliceGradient;
    context.shadowColor = ( slice == currentPullOutSlice ) ? pullOutShadowColour : "rgba( 0, 0, 0, 0 )";
    context.fill();
    context.shadowColor = "rgba( 0, 0, 0, 0 )";

    // Style the slice border appropriately
    if ( slice == currentPullOutSlice ) {
      context.lineWidth = pullOutBorderWidth;
      context.strokeStyle = pullOutBorderStyle;
    } else {
      context.lineWidth = sliceBorderWidth;
      context.strokeStyle = sliceBorderStyle;
    }

    // Draw the slice border
    context.stroke();
  }


  /**
   * Easing function.
   *
   * A bit hacky but it seems to work! (Note to self: Re-read my school maths books sometime)
   *
   * @param Number The ratio of the current distance travelled to the maximum distance
   * @param Number The power (higher numbers = more gradual easing)
   * @return Number The new ratio
   */

  function easeOut( ratio, power ) {
    return ( Math.pow ( 1 - ratio, power ) + 1 );
  }

};

</script>
<!--JavaScript for Pie chart ends here -->
<style>
.headerLine{
    position: relative;
    width: 101%;
    
    height:24%;
    background: url(../images/bgTop.jpg) center center no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
</style>
</head>
<body>
<!--header starts-->
<div style="margin-bottom:10px;" id="home">
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
                                            <li><a href="sdp.php" target="">Self Development Plan</a></li>
                                            <li><a href="eval.php" target="">Goal Evaluation</a></li>
                                            <li class="active"><a href="analysis.php" target="">Analysis</a></li>
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
<!--   /Header     -->

<!-- NAme of user-->
<div class="container">

    <div style="padding:10px;" class="panel panel-default">
    <div class="row">
        <div class="col-sm-3">
            <h5>Welcome <?php echo $_SESSION['user'][1]; ?>,</h5>
        </div>
        <div class="col-sm-6">
            
        </div>
       
 <div class="container col-md-2">
  
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">In Depth Analysis
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="analysis_specific.php">Specific</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="analysis_measure.php">Measurable</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="analysis_ambitious.php">Ambitious</a></li>
      <!-- <li role="presentation" class="divider"></li>-->
      <li role="presentation"><a role="menuitem" tabindex="-1" href="analysis_realistic.php">Realistic</a></li>   
      <li role="presentation"><a role="menuitem" tabindex="-1" href="analysis_timebased.php">Timebased</a></li>   
      <li role="presentation"><a role="menuitem" tabindex="-1" href="analysis_other.php">Other Goals</a></li>    
    </ul>
  </div>
  <script>
$(document).ready(function(){
    $(".dropdown-toggle").dropdown();
});
</script>
  </div>
        <div class="col-sm-1">
            <span><a class="btn btn-default" href="../logout.php">Logout</a></span>
        </div>
        
    </div>
</div>
</div>
<!-- Name of user ends-->
<!--Body Starts here-->
<div id="container">
<?php
$email=$_SESSION['user'][0];
$user=$_SESSION['user'][1];

$sql1="select count(goal_type) from goals_completed where email='$email' and goal_type='Specific'";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
$row1=mysqli_fetch_array($res1);
//echo $row1[0];
$sql2="select count(goal_type) from goals_completed where email='$email' and goal_type='Measurable'";
$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
$row2=mysqli_fetch_array($res2);

$sql3="select count(goal_type) from goals_completed where email='$email' and goal_type='Ambitious'";
$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
$row3=mysqli_fetch_array($res3);

$sql4="select count(goal_type) from goals_completed where email='$email' and goal_type='Realistic'";
$res4=mysqli_query($GLOBALS["___mysqli_ston"], $sql4);
$row4=mysqli_fetch_array($res4);

$sql5="select count(goal_type) from goals_completed where email='$email' and goal_type='Timebased'";
$res5=mysqli_query($GLOBALS["___mysqli_ston"], $sql5);
$row5=mysqli_fetch_array($res5);

$sql6="select count(goal_type) from goals_completed where email='$email' and goal_type NOT IN ('Specific','Measurable','Ambitious','Realistic','Timebased')";
$res6=mysqli_query($GLOBALS["___mysqli_ston"], $sql6);
$row6=mysqli_fetch_array($res6);

if(($row1[0]==0) and ($row2[0]==0) and ($row3[0]==0) and ($row4[0]==0) and ($row5[0]==0) and ($row6[0]==0))
{
	echo '<center><h3>No Goals have been Achieved</h3></center><br><br><br><br>';
}
else
{
	echo '
<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Different Goal types Achieved</h3>
  <canvas id="chart" width="600" height="500"></canvas>

  <table id="chartData">

    <tr>
      <th>Goal Type</th><th>Number of Goals</th>
     </tr>

    <tr style="color: #E41655">
      <td>Specific</td><td>'; echo $row1[0].'</td>
    </tr>

    <tr style="color: #194E9C">
      <td>Measurable</td><td>'; echo $row2[0].'</td>
    </tr>

    <tr style="color: #ED9C13">
      <td>Ambitious</td><td>'; echo $row3[0].'</td>
    </tr>

    <tr style="color: #ED5713">
      <td>Realistic</td><td>'; echo $row4[0].'</td>
    </tr>

    <tr style="color: #057249">
      <td>Timebased</td><td>'; echo $row5[0].'</td>
    </tr>

    <tr style="color: #5F91DC">
      <td>Others</td><td>'; echo $row6[0].'</td>
    </tr>
  </table>';
}

?>
</div>
<!--Body ends here-->
<!--  Footer  -->
<br><br>
<div class="row">
<div  class="lineBlack">
    <div class="container">
        <div class="row downLine" style="widht:100%">
            <div class="col-md-12 text-right">
            </div>
            <div class="col-md-6 text-left copy">
                <p>Copyright &copy; 2014 Build Your Brand. All Rights Reserved.</p>
            </div>
            <div class="col-md-6 text-right dm">
               <!-- <ul id="downMenu">
                    <li class="active"><a href="#home">Home</a>
                    </li>
                    <li><a href="#" target="blank">Link 1</a>
                    </li>
                    <li><a href="#" target="blank">Link 2</a>
                    </li>
                    <li><a href="#" target="blank">Link 3</a>
                    </li>
                </ul>-->
            </div>
        </div>
    </div>
</div>
</div>
<!--  End of Footer  -->

  

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js_modal/jquery.js"></script> 
<script src="../js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js_modal/bootstrap.js"></script>
</body>
</html>