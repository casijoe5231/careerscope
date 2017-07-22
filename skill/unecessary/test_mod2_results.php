<?php
    session_start();
	if(!isset($_SESSION['user']))
	{
		header('location:index.php');
		exit();
	}
	include 'styles/theme-master.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Observer Assessment Result</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
<!-- Modal Scripts -->

<!-- Contact Form CSS files -->
<link type='text/css' href='plugins/modal/css/basic.css' rel='stylesheet' media='screen' />

<!-- IE6 "fix" for the close png image -->
<!--[if lt IE 7]>
<link type='text/css' href='plugins/modal/css/basic_ie.css' rel='stylesheet' media='screen' />
<![endif]-->
<script type='text/javascript' src='plugins/modal/js/jquery.js'></script>
<script type='text/javascript' src='plugins/modal/js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='plugins/modal/js/basic.js'></script>

<script type="text/javascript" src="plugins/jquery.min.js"></script>
<style>
table {
	font: 16px/24px Verdana, Arial, Helvetica, sans-serif;
	border-collapse: collapse;
	width: 600px;
	}


td.left {
	border-bottom: 1px solid #CCC;
	border-top: 1px solid #CCC;
	border-left: 1px solid #CCC;
	padding: 0 1em;
	padding-bottom:8px;
	padding-top:8px;
	}
td.right {
	border-bottom: 1px solid #CCC;
	border-top: 1px solid #CCC;
	border-right: 1px solid #CCC;
	padding: 0 1em;
	padding-bottom:8px;
	padding-top:8px;
	}


td+td {
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
<div class="title">
<h3>&nbsp; Welcome 
<?php 
echo $_SESSION['username'][1];
?>
</h3>
</div>
<br>
<br><br>





  
  <!-- Show multiple Grid's -->
  <?php
	
	 echo "<h3> Observer Assessment Results are as follows:</h3>";
		include 'connection.php';
		include 'settings.php';
		$requestor=$_SESSION['username'][0];	                                            // Define requestor , which is the current user                                                              
		$values_array=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);       // Define array to store skill values 
			// Get scores for each skill trait
	$query="SELECT reviewer, val FROM mod2 WHERE requestor='$requestor'";
	$result=mysqli_query($GLOBALS["___mysqli_ston"], $query);
	
	$num_rows = mysqli_num_rows($result);
	if( $num_rows==0)                                                                        // If Reviews do not exist
	{
	   echo "You do not seem to have received a review";
	}
	
	else                                                                                    // If Reviews are not available 
	{
	
	echo "Result based on a review by ".$num_rows." users. <br><br>"; 
	 // Get skill set
	 $query="SELECT id, skill FROM mod2_skills";  
     $res=mysqli_query($GLOBALS["___mysqli_ston"], $query);
	 $skill_array=array();
	 $skill_choices=mysqli_num_rows($res);                                                  // Define total number of skill choice values
	 while($row_skill = mysqli_fetch_array($res))
        {
		   array_push($skill_array,$row_skill['skill']);                                   // Create array and store skill names in array
		} 
		
		
    while($row = mysqli_fetch_array($result))
    {
		  $req=$row['reviewer'];
		  $data_array=$row['val'];
		  $unser_array= unserialize($data_array);                                          // Unserialize Array
		  for($i=0; $i<$skill_choices; $i++)
     	 {
          $values_array[$i]=$values_array[$i] + $unser_array[$i];                          // Add values from each reviewer to main array
	     }		  
    }  
    for($i=0; $i<$skill_choices; $i++)
    {
        $values_array[$i]=$values_array[$i] / $num_rows;                                   // Perform average
	}
	
	
		
	echo "<div class='grid_master clearfix' style=\"width:100%;\">";
	// Print score for Grid 1
	echo "<div class='grid1'>";
	echo "<u>Your reviewers highly admire you for the following skills. (Your Strengths)</u><br>The review says that you are<br><br>";
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
	echo "<u>Your reviewers also suggest that you might also have the following skills.</u><br>The review says that you are<br><br>";
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
	
	
	// Call Modal for Detailed report
	echo "<div id='basic-modal'><a href='#' class='basic' style=\"border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px;\">Detailed report</a> </div>";
	
	
	}
  ?>
  
  
  


<br><br>
<!-- Modal Section -->


		
		<!-- modal content -->
		<div id="basic-modal-content">
			<h3>360 Observer Assessment Test</h3>		
				<!-- Old ( Show detailed Report ) -->
				<?php
	
				include 'connection.php';
				$username="admin";
				$requestor=$_SESSION['username'][0];	
		
				// Get scores for each skill trait
				$query="SELECT reviewer, val FROM mod2 WHERE requestor='$requestor'";
				$result=mysqli_query($GLOBALS["___mysqli_ston"], $query);
				$values_array=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
				$num_rows = mysqli_num_rows($result);
				echo "<br>Detailed Report for each skill:<br>";
				echo "Result based on a review by ".$num_rows." users. <br><br>"; 
	
				while($row = mysqli_fetch_array($result))
				{
					$req=$row['reviewer'];
					$data_array=$row['val'];
					$unser_array= unserialize($data_array);                  // Unserialize Array
					for($i=0; $i<28; $i++)
					{
						$values_array[$i]=$values_array[$i] + $unser_array[$i];  // Add values from each reviewer to main array
					}		  
				}  
				for($i=0; $i<28; $i++)
				{
					$values_array[$i]=$values_array[$i] / $num_rows;          // Perform average
				}
	
	
				// Get skill set
				$query="SELECT id, skill FROM mod2_skills";  
				$res=mysqli_query($GLOBALS["___mysqli_ston"], $query);
				$skill_array=array();
				while($row = mysqli_fetch_array($res))
				{
					array_push($skill_array,$row['skill']);
				} 
		
				echo "<table>";
				for($i=0; $i<28; $i++)
				{

					$index=$i+1;
					echo "<tr><td class='left'>";
					echo $index.".) ".$skill_array[$i]."</td>";
					echo "<td class='right'>";
					$score = $values_array[$i] * 10;
					echo "<div class='score_res3'><div style=' width:".$score."%; height:100%; background-color:#33CCCC;;'>&nbsp; <b id='score_percentage'>".$score."% </b></div></div>";
					echo "</td></tr>";

				}
				echo "</table>";

				?>
			
		</div>

		<!-- preload the images -->
		<div style='display:none'>
			<img src='modal/img/basic/x.png' alt='' />
		</div>

<!-- Modal Section ends here -->   


<a href="logout.php" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; float:right; margin-right:25px;">LOGOUT</a>
<br><br>

</div>
<br><br>
<?php
footer_fn();
?>
</div>
</div>

</body>
</html>