<?php
    session_start();
	if(!isset($_SESSION['user']))
	{
		header('location:../login.php');
		exit();
	}
	include 'styles/theme-master.php';
	
	include '../connection1.php';

	$emaill=$_SESSION['user'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Skill Assessment Detailed Report','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
	?>
<!DOCTYPE html>
<html><head><title>Skill Assessment Result</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
<!-- Graph Plot -->
<!--[if lt IE 9]><script language="javascript" type="text/javascript" src="plugins/excanvas.js"></script><![endif]-->
<script language="javascript" type="text/javascript" src="plugins/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="plugins/jquery.jqplot.min.js"></script>
    <script language="javascript" type="text/javascript" src="plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="plugins/jqplot.barRenderer.min.js"></script>
	<script type="text/javascript" src="plugins/jqplot.pointLabels.min.js"></script>
<!-- Graph plot ends here -->
<style>
table
{
 margin-left:auto;
 margin-right:auto;
 width:90%;
}
td 
{
  text-align: center;
  vertical-align:top;
}
.score
{
margin-left:auto; 
margin-right:auto;
}
h4,h3{
    padding: 0px;
    margin: 0px;
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
<form method="post" action="print.php" target="_blank">
<br>


<br>
<br>
<?php
//Get Result for database for current user
		include 'connection1.php';
		$email=$_SESSION['user'][0];
	    $sql="SELECT name,email FROM masteruser WHERE email='$email'";		
		
	    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	    while($row = mysqli_fetch_array($res))
        {
		 $name=$row['name'];
		 $email=$row['email'];
        }
		
		echo "<h1><img src='images/im-user_profile.png' width='35px;'>";
		echo $name."</h1>";
		echo "<h3>email:<i>".$email."</i></h3>";
		echo " ________________________________________________________";
		echo "<br><br></h3>";
		
		$sql1="SELECT E,A,C,N,O,mod1 FROM skillresult WHERE email='$email'";		
		
	    $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
	   $assessmen1_complete = mysqli_num_rows($res1);
	    while($row1 = mysqli_fetch_array($res1))
        {
		 $E=$row1['E'];
		 $A=$row1['A'];
		 $C=$row1['C'];
		 $N=$row1['N'];
		 $O=$row1['O'];
		 $mod1=$row1['mod1'];
        }
		

 echo "<br>";
 echo "<div style=\"text-align:center;\">";		

echo "<br><h3>Assessment Results are as follows:</h3>";

		include 'settings.php';
		$requestor=$_SESSION['user'][0];
		echo $requestor."<br>";
		// Define requestor , which is the current user                                                              
		$values_array=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);     // Define array to store skill values 
			// Get scores for each skill trait
	$query="SELECT reviewer, val FROM mod2_requests WHERE requestor='$requestor' AND val<>''";
	$result=mysqli_query($GLOBALS["___mysqli_ston"], $query);
	
	$num_rows = mysqli_num_rows($result);
	if( $num_rows==0 )
	{
	   echo "<p style=\"text-align:center\">You do not seem to have received a review
	         <br>When you receive a review a report will be generated.</p><br>";
	}
	else if($assessmen1_complete==0)
	{
		echo "<p style=\"text-align:center\">You do not seem to have completed your self assement
	         <br>When you complete your assessment a report will be generated.</p><br>";
	}
	else 
	{
	
	echo "Result based on a review by ".$num_rows." users. <br><br></div>"; 
	 // Get skill set
	 $query = "SELECT id, question FROM mod2_questions";  
     $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
	 $skill_array=array();
	 $skill_choices=mysqli_num_rows($res);                                 // Define total number of skill choice values

	 while($row_skill = mysqli_fetch_array($res))
        {
		   array_push($skill_array,$row_skill['question']);                 // Create array and store skill names in array
		} 
		
		
    while($row = mysqli_fetch_array($result))
    {
		  $req=$row['reviewer'];
		  $data_array=$row['val'];
		  $unser_array= unserialize($data_array);                  // Unserialize Array
		  for($i=0; $i<$skill_choices; $i++)
     	 {
          $values_array[$i]=$values_array[$i] + $unser_array[$i];  // Add values from each reviewer to main array
	     }		  
    }  
    for($i=0; $i<$skill_choices; $i++)
    {
        $values_array[$i]=$values_array[$i] / $num_rows;          // Perform average
	}
	
		//Calculate using formula		
		$OBS_E= 20 + $values_array['0']-$values_array['5']+$values_array['10']-$values_array['15']+$values_array['20']-$values_array['25']+$values_array['30']-$values_array['35']+$values_array['40']-$values_array['45'];
		$OBS_A= 14 - $values_array['1']+$values_array['6']-$values_array['11']+$values_array['16']-$values_array['21']+$values_array['26']-$values_array['31']+$values_array['36']+$values_array['41']+$values_array['46'];
		$OBS_C= 14 + $values_array['2']-$values_array['7']+$values_array['12']-$values_array['17']+$values_array['22']-$values_array['27']+$values_array['32']-$values_array['37']+$values_array['42']+$values_array['47'];
	    $OBS_N= 38 - $values_array['3']+$values_array['8']-$values_array['13']+$values_array['18']-$values_array['23']-$values_array['28']-$values_array['33']-$values_array['38']-$values_array['43']-$values_array['48'];
		$OBS_O=  8 + $values_array['4']-$values_array['9']+$values_array['14']-$values_array['19']+$values_array['24']-$values_array['29']+$values_array['34']+$values_array['39']+$values_array['44']+$values_array['49'];

	
	
	// Skill Description
	$E_desc= "This trait shows your level of sociability and enthusiasm<br>A high score is desirable in this trait.";
	$A_desc= "This trait shows your level of friendliness and kindness<br>A high score is desirable in this trait.";
	$C_desc= "This trait shows your level of organization and work ethic<br>A high score is desirable in this trait.";
	$N_desc= "This trait shows your level of calmness and tranquility<br>A low score is desirable in this trait.";
	$O_desc= "This trait shows your level of creativity and curiosity<br>A high score is desirable in this trait.";
	// Grids	
	
	echo "<div class='datagrid'><table border='1'>";
	echo "<thead><tr><th>Trait</th><th>Description</th></tr><tbody></thead>";
	result_grid("Extraversion",$E_desc, "images/trait_icons/Extrversion-icon_friends.png", $E, $OBS_E, "showEmsg", "showOBS_Emsg" );
	result_grid("Agreeableness",$A_desc, "images/trait_icons/Agreeableness-icon_help.png", $A, $OBS_A, "showAmsg", "showOBS_Amsg" );
	result_grid("Conscientiousness",$C_desc, "images/trait_icons/Conscientiousness-icon_working.png", $C, $OBS_C, "showCmsg", "showOBS_Cmsg" );
	result_grid("Neuroticism",$N_desc, "images/trait_icons/Neuroticism-icon_stress.png", $N, $OBS_N, "showNmsg", "showOBS_Nmsg" );
	result_grid("Openness",$O_desc, "images/trait_icons/Openess-icon_artist.png", $O, $OBS_O, "showOmsg", "showOBS_Omsg" );
	echo "</tbody></table></div>";
	
	}
 

?>



<!-- Horizontal Graph Plot -->
<div style="text-align:center;">

<br><br>
<b>Observer score graph</b>
<p>Shows your assessment by different observers</p>


<div id="chartdivhoz" class="result-chart" style="height:500px;width:700px"></div>

<script type="text/javascript">
$(document).ready(function(){

		var ticks = ['Extraversion', 'Agreeableness', 'Conscientiousness', 'Neuroticism','Openness'];
        
        plot2 = $.jqplot('chartdivhoz', [
		
		//Code generated [1,2,3,4,5,],[5,6,7,8,9,]
		<?php
		//---------------------------------------------------------------------------------------------------------------------------
		$requestor=$_SESSION['user'][0];
		// Define requestor , which is the current user                                                              
		$query = "SELECT id, question FROM mod2_questions";  
		$res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		$skill_array=array();
		$skill_choices=mysqli_num_rows($res);                                 // Define total number of skill choice values
	 
		$query="SELECT reviewer, val FROM mod2_requests WHERE requestor='$requestor' AND val<>''";
		$result=mysqli_query($GLOBALS["___mysqli_ston"], $query);
		$obs_count=mysqli_num_rows($result);
		$scorelist = array();
		while($row = mysqli_fetch_array($result) )
		{
		$data_array = $row['val'];
		$values_array=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
		$unser_array= unserialize($data_array);                  // Unserialize Array
		
		//Get user type 
		 $req=$row['reviewer'];
		 $query = "SELECT name, role FROM masteruser WHERE email= '$req'";  
		 $res_type = mysqli_query($GLOBALS["___mysqli_ston"], $query);

		 while($row_user = mysqli_fetch_array($res_type))
         {
		  //Calculate using formula		
			 for($i=0; $i<$skill_choices; $i++)
			 {
			  $values_array[$i]=$values_array[$i] + $unser_array[$i];  // Add values from each reviewer to main array
			 }	
			$OBS_E= 20 + $values_array['0']-$values_array['5']+$values_array['10']-$values_array['15']+$values_array['20']-$values_array['25']+$values_array['30']-$values_array['35']+$values_array['40']-$values_array['45'];
			$OBS_A= 14 - $values_array['1']+$values_array['6']-$values_array['11']+$values_array['16']-$values_array['21']+$values_array['26']-$values_array['31']+$values_array['36']+$values_array['41']+$values_array['46'];
			$OBS_C= 14 + $values_array['2']-$values_array['7']+$values_array['12']-$values_array['17']+$values_array['22']-$values_array['27']+$values_array['32']-$values_array['37']+$values_array['42']+$values_array['47'];
			$OBS_N= 38 - $values_array['3']+$values_array['8']-$values_array['13']+$values_array['18']-$values_array['23']-$values_array['28']-$values_array['33']-$values_array['38']-$values_array['43']-$values_array['48'];
			$OBS_O=  8 + $values_array['4']-$values_array['9']+$values_array['14']-$values_array['19']+$values_array['24']-$values_array['29']+$values_array['34']+$values_array['39']+$values_array['44']+$values_array['49'];

			$scorelist[] = array($OBS_E, $OBS_A, $OBS_C, $OBS_N, $OBS_O);
			//echo $personlist[0][0];
		 } 
		//end user type
		}
		
		//Create Multidimensional array
		for ($row = 0; $row < $obs_count; $row++) {
			   echo "[";
			   for ($col = 0; $col <  5; $col++) {
				 echo "".$scorelist[$row][$col].",";
			   }
			   echo "],";
			}
		//-----------------------------------------------------------------------------------------------------------------------------	

?>
		], {
            seriesDefaults: {
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true },
				rendererOptions: {
                barDirection: 'horizontal'
            }

            },
            axes: {
                yaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            }
        });
     
        $('#chartdivhoz').bind('jqplotDataHighlight', 
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
<br><br>
</div>
<!-- Horizontal Graph Plot ends here -->

<!-- Graph Plot -->
<div style="text-align:center;">

<br><br>
<b>Average score graph</b><br>
<?php
        // Get average score of users
	    $sql="SELECT E,A,C,N,O FROM skillresult WHERE mod1!=0";			
	    $result=mysqli_query($GLOBALS["___mysqli_ston"], $sql); // Get score of all users
        $count=0;
		$Eavg =0;
		$Aavg =0;
		$Cavg =0;
		$Navg =0;
		$Oavg =0;
		
		$num_users = mysqli_num_rows($result);
		echo "Your Assessment score compared to ".$num_users." participants";
        while($row = mysqli_fetch_array($result))  // Calculate average
       {
		$Eavg =$Eavg+ $row['E'];
		$Aavg =$Aavg+ $row['A'];
		$Cavg =$Cavg+ $row['C'];
		$Navg =$Navg+ $row['N'];
		$Oavg =$Oavg+ $row['O'];
		$count++;
       }
	    $Eavg =$Eavg/$count;
		$Aavg =$Aavg/$count;
		$Cavg =$Cavg/$count;
		$Navg =$Navg/$count;
		$Oavg =$Oavg/$count;

	   
?>

<div id="chartdiv" class="result-chart" style="height:300px;width:700px"></div>

<script type="text/javascript">
$(document).ready(function(){
        <?php
		echo "var s1 = [".$E.",".$A.",".$C.", ".$N.",".$O."];";
        echo "var s2 = [".$Eavg.",".$Aavg.",".$Cavg.", ".$Navg.",".$Oavg."];";
        ?>
		var ticks = ['Extraversion', 'Agreeableness', 'Conscientiousness', 'Neuroticism','Openness'];
        
        plot2 = $.jqplot('chartdiv', [s1, s2], {
            seriesDefaults: {
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true },

            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            }
        });
     
        $('#chartdiv').bind('jqplotDataHighlight', 
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
<img src="images/graph_indicator.png" width=250px;>
<br><br>
</div>
<!-- Graph Plot ends here -->

<br>
<div class='grid'>
	<div class='grid_title' style="background-color:#CCE6FF; padding-left:-5px; border-radius:8px 8px 0px 0px;">
		<h3 style="text-align:center;">Qualitative Feedback</h3>
	</div>
	<br><br><br>
	<?php
	
		quality_feed("general_review","General Review");
		quality_feed("written_communication","Written Communication");
		quality_feed("verbal_communication","Verbal Communication");
		quality_feed("flexibility","Fexibility");
		quality_feed("persuading","Persuading");
		quality_feed("leadership","Leadership");
		quality_feed("planning&organising","Planning and Organising");
		quality_feed("problem_solving","Investigating, Analysing and Problem Solving");
		quality_feed("professionalism","Developing Professionalism");
		
	function quality_feed($type,$type_desc)
	{
    // Show Qualitative feedback
	$requestor=$_SESSION['user'][0];
	$sql= "SELECT * FROM `mod2_qualitative` WHERE requestor='$requestor' AND question='$type'";
	$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	if(mysqli_num_rows($result)>0)
		echo "<br><u><h3 style=\"color:#0099FF; padding-left:5px;\">".$type_desc."</h3></u>";
	while($row=mysqli_fetch_array($result))
	{
		echo "&nbsp;<h4>&nbsp;\"".$row['review']."\"</h4>";
	}
	}
	?>
	<br><br>
<br>
<p style="text-align:center;">
<i>*Note the above feedback is provided by the users whom you have authorized for an observer assessment.</i>	
</p>
</div>
<br><br>
<p style="text-align:center"><input type="submit" name="print" value="Print Preview"></p><br>
<p style="text-align:center"><a href="disclaimer.php" target="_blank">Disclaimer</a></p><br>
</form>
</div>










<?php
// --------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------- F U N C T I O N S ---------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------
	// Grid function
	//eg: result("Extraversion","explaination", "images/trait_icons/Extrversion-icon_friends.gif", $E, $OBS_E, "showAmsg" )
    function result_grid($trait, $description, $img_path, $S , $OBS_S, $showMsg, $showOBS_Msg )
    {

		if($trait=="Agreeableness" || $trait=="Neuroticism" )
		{
			echo "<tr class='alt'>";
		}
		else
		{
			echo "<tr>";
		}
		echo "<td>";
		echo "<div style=\" text-align:center; margin-right:5px; \"><img src='".$img_path."'></div>";
		echo "<h2>".$trait."</h2>";
		echo "</td>";
		echo "<td>";
		$showMsg(($S+$OBS_S)/2);
		echo "</td>";
		echo "</tr>";
	}
	
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

// Get result based on score from database
function showRes($type , $id)
{
    $sql="SELECT result FROM analysis WHERE type='$type' && id='$id'";			
    $result=mysqli_query($GLOBALS["___mysqli_ston"], $sql); // Get score of all users

        while($row = mysqli_fetch_array($result))  // Calculate average
       {
	    echo "<div class='res'><p style='text-align:left'>";
		echo $row['result'];
		echo "</p></div>";
       }
}


//-----------------------------------------------------------------------------------
// Functions to show Observer Analysis-----------------------------------------------
//-----------------------------------------------------------------------------------

// Observer Extraversion Analysis
function showOBS_Emsg($E)
{

  if($E>90 && $E<=100)
  {

   showOBS_Res("E_OBS" , 7);  //High
    
  }
  else if($E>75 && $E<=90)
  {

   showOBS_Res("E_OBS" , 6);
    
  }
    else if($E>60 && $E<=75)
  {

   showOBS_Res("E_OBS" , 5);
    
  }
  else if($E>40 && $E<=60)
  {

   showOBS_Res("E_OBS" , 4);
    
  }
    else if($E>25 && $E<=40)
  {

   showOBS_Res("E_OBS" , 3);
    
  }
    else if($E>10 && $E<=25)
  {

   showOBS_Res("E_OBS" , 2);
    
  }
  else if($E>=0 && $E<=10)
  {

   showOBS_Res("E_OBS" , 1);  // Low
    
  }   
}

// Observer Agreeableness Analysis
function showOBS_Amsg($A)
{

  if($A>90 && $A<=100)
  {

   showOBS_Res("A_OBS" , 7);  //High
    
  }
  else if($A>75 && $A<=90)
  {

   showOBS_Res("A_OBS" , 6);
    
  }
    else if($A>60 && $A<=75)
  {

   showOBS_Res("A_OBS" , 5);
    
  }
  else if($A>40 && $A<=60)
  {

   showOBS_Res("A_OBS" , 4);
    
  }
    else if($A>25 && $A<=40)
  {

   showOBS_Res("A_OBS" , 3);
    
  }
    else if($A>10 && $A<=25)
  {

   showOBS_Res("A_OBS" , 2);
    
  }
  else if($A>=0 && $A<=10)
  {

   showOBS_Res("A_OBS" , 1);  // Low
    
  }   
}

// Observer Conscientiousness Analysis
function showOBS_Cmsg($C)
{

  if($C>90 && $C<=100)
  {

   showOBS_Res("C_OBS" , 7);  //High
    
  }
  else if($C>75 && $C<=90)
  {

   showOBS_Res("C_OBS" , 6);
    
  }
    else if($C>60 && $C<=75)
  {

   showOBS_Res("C_OBS" , 5);
    
  }
  else if($C>40 && $C<=60)
  {

   showOBS_Res("C_OBS" , 4);
    
  }
    else if($C>25 && $C<=40)
  {

   showOBS_Res("C_OBS" , 3);
    
  }
    else if($C>10 && $C<=25)
  {

   showOBS_Res("C_OBS" , 2);
    
  }
  else if($C>=0 && $C<=10)
  {

   showOBS_Res("C_OBS" , 1);  // Low
    
  }    
}

// Observer Neuroticism Analysis
function showOBS_Nmsg($N)
{
 if($N>90 && $N<=100)
  {

   showOBS_Res("N_OBS" , 7);  //High
    
  }
  else if($N>75 && $N<=90)
  {

   showOBS_Res("N_OBS" , 6);
    
  }
    else if($N>60 && $N<=75)
  {

   showOBS_Res("N_OBS" , 5);
    
  }
  else if($N>40 && $N<=60)
  {

   showOBS_Res("N_OBS" , 4);
    
  }
    else if($N>25 && $N<=40)
  {

   showOBS_Res("N_OBS" , 3);
    
  }
    else if($N>10 && $N<=25)
  {

   showOBS_Res("N_OBS" , 2);
    
  }
  else if($N>=0 && $N<=10)
  {

   showOBS_Res("N_OBS" , 1);  // Low
    
  }   
}

// Observer Openness Analysis
function showOBS_Omsg($O)
{

   if($O>90 && $O<=100)
  {

   showOBS_Res("O_OBS" , 7);  //High
    
  }
  else if($O>75 && $O<=90)
  {

   showOBS_Res("O_OBS" , 6);
    
  }
    else if($O>60 && $O<=75)
  {

   showOBS_Res("O_OBS" , 5);
    
  }
  else if($O>40 && $O<=60)
  {

   showOBS_Res("O_OBS" , 4);
    
  }
    else if($O>25 && $O<=40)
  {

   showOBS_Res("O_OBS" , 3);
    
  }
    else if($O>10 && $O<=25)
  {

   showOBS_Res("O_OBS" , 2);
    
  }
  else if($O>=0 && $O<=10)
  {

   showOBS_Res("O_OBS" , 1);  // Low
    
  } 
}

// Get result based on score from database for Observer Analysis
function showOBS_Res($type , $id)
{
    $sql="SELECT result FROM analysis WHERE type='$type' && id='$id'";			
    $result=mysqli_query($GLOBALS["___mysqli_ston"], $sql); // Get score of all users

        while($row = mysqli_fetch_array($result))  // Calculate average
       {
	    echo "<div class='res'><p style='text-align:left'>";
		echo $row['result'];
		echo "</p></div>";
       }
}


?>


<?php
footer_fn();
?>
</div>
</div>
</body>
</html>