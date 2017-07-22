<?php
    session_start();
	if(!isset($_SESSION['username']))
	{
		header('location:index.php');
		exit();
	}
	include 'styles/theme-master.php';
	?>
<html><head><title>Skill Assessment Result</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
<style>

td 
{
  text-align: center;
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


<br>
<br>
<?php
//Get Result for database for current user
		include 'connection.php';
		$username=$_SESSION['username'][0];
	    $sql="SELECT fname, lname, email, class, branch, E, A, C, N,O, mod1 FROM user WHERE username='$username'";		
		
	    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	    while($row = mysqli_fetch_array($res))
        {
		 $fname=$row['fname'];
		 $lname=$row['lname'];
		 $email=$row['email'];
		 $class=$row['class'];
		 $branch=$row['branch'];
		 $E= $row['E'];
		 $A= $row['A'];
		 $C= $row['C'];
		 $N= $row['N'];
		 $O= $row['O'];
		 $mod1=$row['mod1'];
        }
		
		echo "<h1>".$fname." ".$lname."</h1>";
		echo  "<h3>".$class." ".$branch."</h3>";
		echo "<h3>email:<i>".$email."</i></h3>";
		echo " ________________________________________________________";
		echo "<br><br></h3>";
		
		

 echo "<br>";
 echo "<div style=\"text-align:center;\">";
if($mod1==1)
{

        echo "Self Perception Personality Test </h3><br>";
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
		
		echo "</table>";

}
      
?>

</div>
</div>
</body>
</html>