<?php
    session_start();
	if(!isset($_SESSION['user2']))
	{
		header('location:../login.php');
		exit();
	}
	include 'styles/theme-master.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Skill Assessment Result</title>
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
<br>

<br>
<div style="text-align:center;">
<?php
if(isset($_POST["option1"]))
    {
        //Calculate using formula		
		$E= 20 + $_POST['option1']-$_POST['option6']+$_POST['option11']-$_POST['option16']+$_POST['option21']-$_POST['option26']+$_POST['option31']-$_POST['option36']+$_POST['option41']-$_POST['option46'];
		$A= 14 - $_POST['option2']+$_POST['option7']-$_POST['option12']+$_POST['option17']-$_POST['option22']+$_POST['option27']-$_POST['option32']+$_POST['option37']+$_POST['option42']+$_POST['option47'];
		$C= 14 + $_POST['option3']-$_POST['option8']+$_POST['option13']-$_POST['option18']+$_POST['option23']-$_POST['option28']+$_POST['option33']-$_POST['option38']+$_POST['option43']+$_POST['option48'];
	    $N= 38 - $_POST['option4']+$_POST['option9']-$_POST['option14']+$_POST['option19']-$_POST['option24']-$_POST['option29']-$_POST['option34']-$_POST['option39']-$_POST['option44']-$_POST['option49'];
		$O=  8 + $_POST['option5']-$_POST['option10']+$_POST['option15']-$_POST['option20']+$_POST['option25']-$_POST['option30']+$_POST['option35']+$_POST['option40']+$_POST['option45']+$_POST['option50'];
		
		//Save Result for user
		include 'connection1.php';
		$email=$_SESSION['user2'][0];
		$sql="insert into skillresult(email,mod1,E,A,C,N,O)values('$email',1,'$E','$A','$C','$N','$O')";
	    /*$sql="UPDATE user SET mod1=1, E=$E, A=$A, C=$C, N=$N, O=$O WHERE username='$username'";*/		
		
	    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	    if($res)
	    {
		 echo'Your result was saved successfully<br>';		
	    }
	    else
	   {
		 echo"<h3>Error occured.</h3><br>Your result could not be saved";
		 
	   }
		
		echo "<br><br><h3>";
		echo $_SESSION['user2'][1]." your score for the personality test is as follows: </h3><br><br>";
		echo "<table align='center' cellpadding='13'> <tr><h3><th>Trait</th> <th>Percentile</th> <th>Score</th></h3></tr>";
		
		echo "<tr><td><b>Extraversion :</b></td><td>";
		$EP=($E/40)*100;
		echo "<div class='score'><div style=' width:".$EP."%; height:100%; background-color:#33CCCC; float:left;'>&nbsp; ".$EP."% </div></div>";
		echo "<p style='text-align:left'>Extraversion reflects how much you are oriented towards things outside yourself and derive satisfaction from interacting with other people.</p>";
		echo "</td><td>".$E."/40</td></tr>";
		
		echo "<tr><td><b>Agreeableness :</b></td><td>";
		$AP=($A/40)*100;
		echo "<div class='score'><div style=' width:".$AP."%; height:100%; background-color:#33CCCC; float:left;'>&nbsp; ".$AP."% </div></div>";
		echo "<p style='text-align:left'>Agreeableness is a measure of ones' trusting and helpful nature, and whether a person is generally well tempered or not.</p>";
		echo "</td><td>".$A."/40</td></tr>";
		
		echo "<tr><td><b>Conscientiousness :</b></td><td>";
		$CP=($C/40)*100;
		echo "<div class='score'><div style=' width:".$CP."%; height:100%; background-color:#33CCCC; float:left;'>&nbsp; ".$CP."% </div></div>";
		echo "<p style='text-align:left'>Conscientiousness reflects how careful you are, both in respect to orginization and rules.</p>";
		echo "</td><td>".$C."/40</td></tr>";
		
		echo "<tr><td><b>Neuroticism  :</b></td><td>";
		$NP=($N/40)*100;
		echo "<div class='score'><div style=' width:".$NP."%; height:100%; background-color:#33CCCC; float:left;'>&nbsp; ".$NP."% </div></div>";
		echo "<p style='text-align:left'>Neuroticism refers to the degree of emotional stability and impulse control. It is the tendency to experience unpleasant emotions easily, such as anger, anxiety, depression, or vulnerability.</p>";
		echo "</td><td>".$N."/40</td></tr>";
		
		echo "<tr><td><b>Openness :</b></td><td>";
		$OP=($O/40)*100;
		echo "<div class='score'><div style=' width:".$OP."%; height:100%; background-color:#33CCCC;  float:left;'>&nbsp; ".$OP."% </div></div>";
		echo "<p style='text-align:left'>Openness reflects the degree of intellectual curiosity, creativity and a preference for novelty and variety a person has.</p>";
		echo "</td><td>".$O."/40</td></tr>";

    }
      echo "</table>";






?>
<br><br><br>



<!-- Graph Plot -->
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
		echo "Your score compared to ".$num_users." participants";
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
<img src="images/graph_indicator.png" width=250px;>
<br><br>
<!-- Graph Plot ends here -->


<?php
echo "<br><br><br><b>Your result shows the following :</b></br></br>";
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
<br>
<h3>You have completed your Self Assessment
<br>Please complete your Observer Assessment to obtain a full review.</h3>
<br>
<br><br>
<a href="home.php" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px;" >Home</a>
<br>
<a href="logout.php" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; float:right; margin-right:25px;">LOGOUT</a>
<br>

</div>
<br><br>
</div>

<?php
footer_fn();
?>
</div>
</div>



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
</body>
</html>