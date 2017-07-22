<html>
<head>
<style>
body
{
font-family:Arial, Helvetica, sans-serif;

}
#modal-text
{
font-size:25px;
}
</style>
</head>
<body>

<?php
						
     include '../connection.php';
	 include '../settings.php';			
		$username=$_COOKIE["skill_username"];
	    $sql="SELECT fname, lname,E, A, C, N,O FROM user WHERE username='$username'";		
		
	    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	    while($row = mysqli_fetch_array($res))
        {
		 $fname=$row['fname'];
		 $lname=$row['lname'];
		 $E= $row['E'];
		 $A= $row['A'];
		 $C= $row['C'];
		 $N= $row['N'];
		 $O= $row['O'];
        }
		echo "<h3>Detailed report for:</h3>";
		echo "<h3>".$fname." ".$lname."</h3>";
		echo " ________________________________________________________";
		echo "<br><br><h3>";	
									
?>
<?php

        echo "Personality test result: </h3><br>";
		echo "<table align='center' cellpadding='13'> <tr><h3><th>Trait</th> <th>Percentile</th> <th>Score</th></h3></tr>";
		
		echo "<tr><td><b>Extraversion</b></td><td>";
		$EP=($E/40)*100;
		echo "<div class='score'><div style=' width:".$EP."%; height:100%; background-color:#33CCCC;;'>&nbsp; <b id='score_percentage'>".$EP."% </b></div></div>";
		echo "<p style='text-align:left'>Extraversion reflects how much you are oriented towards things outside yourself and derive satisfaction from interacting with other people.</p>";
		echo "</td><td>".$E."/40</td></tr>";
		
		echo "<tr><td><b>Agreeableness</b></td><td>";
		$AP=($A/40)*100;
		echo "<div class='score'><div style=' width:".$AP."%; height:100%; background-color:#33CCCC;;'>&nbsp; <b id='score_percentage'>".$AP."% </b></div></div>";
		echo "<p style='text-align:left'>Agreeableness is a measure of ones' trusting and helpful nature, and whether a person is generally well tempered or not.</p>";
		echo "</td><td>".$A."/40</td></tr>";
		
		echo "<tr><td><b>Conscientiousness</b></td><td>";
		$CP=($C/40)*100;
		echo "<div class='score'><div style=' width:".$CP."%; height:100%; background-color:#33CCCC;;'>&nbsp; <b id='score_percentage'>".$CP."% </b></div></div>";
		echo "<p style='text-align:left'>Conscientiousness reflects how careful you are, both in respect to orginization and rules.</p>";
		echo "</td><td>".$C."/40</td></tr>";
		
		echo "<tr><td><b>Neuroticism</b></td><td>";
		$NP=($N/40)*100;
		echo "<div class='score'><div style=' width:".$NP."%; height:100%; background-color:#33CCCC;;'>&nbsp; <b id='score_percentage'>".$NP."% </b></div></div>";
		echo "<p style='text-align:left'>Neuroticism refers to the degree of emotional stability and impulse control. It is the tendency to experience unpleasant emotions easily, such as anger, anxiety, depression, or vulnerability.</p>";
		echo "</td><td>".$N."/40</td></tr>";
		
		echo "<tr><td><b>Openness</b></td><td>";
		$OP=($O/40)*100;
		echo "<div class='score'><div style=' width:".$OP."%; height:100%; background-color:#33CCCC;'>&nbsp; <b id='score_percentage'>".$OP."% </b></div></div>";
		echo "<p style='text-align:left'>Openness reflects the degree of intellectual curiosity, creativity and a preference for novelty and variety a person has.</p>";
		echo "</td><td>".$O."/40</td></tr>";
		
		echo "</table>";

?>

<!-- Graph Plot -->
<br><br><br>



<?php
        // Get average score of users
	    $sql="SELECT E,A,C,N,O FROM user";			
	    $result=mysqli_query($GLOBALS["___mysqli_ston"], $sql); // Get score of all users
        $count=0;
		$Eavg =0;
		$Aavg =0;
		$Cavg =0;
		$Navg =0;
		$Oavg =0;
		
		$num_users = mysqli_num_rows($result);
		echo "Current user's score compared to ".$num_users." other participants";
		
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
<div id="chartdiv" class="result-chart" style="height:300px; width:600px; margin-left:auto; margin-right:auto;"></div>
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
                pointLabels: { show: true }
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
<img src="../images/graph_indicator_alt.png" width=250px;>
<br><br>
<!-- Graph Plot ends here -->


<?php
echo "<br><br><br><b>User's result shows the following :</b></br></br>";
echo "<br><b>Extraversion:</b><br>";
showEmsg($E);
echo "<br><br><b>Agreeableness:</b><br>";
showAmsg($A);
echo "<br><br><b>Conscientiousness:</b><br>";
showCmsg($C);
echo "<br><br><b>Neuroticism:</b><br>";
showNmsg($N);
echo "<br><br><b>Openness:</b><br>";
showOmsg($O);


?>

<br><br><br><br>

<?php

		$requestor=$_COOKIE["skill_username"];	                                          // Define requestor , which is the current user                                                              
		$values_array=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);     // Define array to store skill values 
			// Get scores for each skill trait
	$query="SELECT reviewer, val FROM mod2 WHERE requestor='$requestor'";
	$result=mysqli_query($GLOBALS["___mysqli_ston"], $query);
	echo "<h3> Observer Assessment Results are as follows:</h3>";
	
	$num_rows = mysqli_num_rows($result);
	if( $num_rows==0)
	{
	   echo "User does not seem to have received a review";
	}
	
	else 
	{
	
	echo "Result based on a review by ".$num_rows." users. <br><br></div>"; 
	 // Get skill set
	 $query="SELECT id, skill FROM mod2_skills";  
     $res=mysqli_query($GLOBALS["___mysqli_ston"], $query);
	 $skill_array=array();
	 $skill_choices=mysqli_num_rows($res);                                 // Define total number of skill choice values
	 while($row_skill = mysqli_fetch_array($res))
        {
		   array_push($skill_array,$row_skill['skill']);                 // Create array and store skill names in array
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
	
	
	
		
	echo "<div class='grid_master clearfix' style=\"width:100%;\">";
	// Print score for Grid 1
	echo "<div class='grid1'>";
	echo "<u>The reviewers highly admire the user for the following skills. (User's Strengths)</u><br>The review says that the user is<br><br>";
	echo "<ul>";
	for($i=0; $i<$skill_choices; $i++)     
	{
	if($values_array[$i]>=$high_order)  
	{
	  echo "<li>";
	  echo " ".$skill_array[$i]."</li>";
	}
	else
	{
	 // Do nothing
	}
	}
    echo "</ul>";
	echo "</div>";

	// Print score for Grid 2
	echo "<div class='grid2' >";
	echo "<u>The reviewers also suggest that the user might also have the following skills.</u><br>The review says that the user might be<br><br>";
	echo "<ul>";
	for($i=0; $i<$skill_choices; $i++)
	{
	if($values_array[$i]<$high_order && $values_array[$i]>$low_order)  
	{
	  echo "<li>";
	  echo " ".$skill_array[$i]."</li>";
	}
	else
	{
	 // Do nothing
	}
	}
    echo "</table>";
	echo "</div>";
	
	echo "</div>";
	}
  ?>
  
<br><br>
<a href="../disclaimer.html" target="_blank">*Disclaimer</a>

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

?>