<?php
//Php code to produce a modal popup on login for the staff members
session_start();

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }
	

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
//
//


?>
<html>
<head>
<!--Links-->
<!--  CSS  -->
    
    <!--<link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">-->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet'type='text/css'>
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  
<!--  JS  -->
<script type="text/javascript" src="bootstrap/js/jquery-1.8.3.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js">
</script>
    <script type="text/javascript" src="bootstrap/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="bootstrap/js/npm.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery-ui-1.9.2.custom.min.js"></script>
    <!--<script type="text/javascript" src="bootstrap/js/jquery.easing.1.3.js"></script> -->
    <!--<script type="text/javascript" src="bootstrap/js/camera.min.js"></script>-->
    <!--<script type="text/javascript" src="bootstrap/js/myscript.js"></script>-->
    <!--<script src="bootstrap/js/sorting.js" type="text/javascript"></script>-->
    <!--<script src="bootstrap/js/jquery.isotope.js" type="text/javascript"></script>-->
    <script src="bootstrap/js/bootstrap.min.js"></script>

<!--Links end-->
<!--JavaScript code for modal-->
<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal('show');
		
				$("#myModal1").modal('show');
      $("#myModal2").modal('show');

	});
	</script>
</head>
<body>
<!--Code for producing modal starts here-->
<?php

				$email=$_SESSION['user'][0];
				
				 $sql1="select Goal_Type,notify from Goal_Assigned where email='$email'";
        $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
		$count=mysqli_num_rows($res1);
//$rand = 0;
		if($count)
		{
			while($row1=mysqli_fetch_array($res1))
			{
				
				if(!($row1['notify']))
				{
					echo '<div class="container"><!-- Trigger the modal with a button --><!-- Modal --><div class="modal fade" id="myModal" role="dialog"><div class="modal-dialog"><!-- Modal content--><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-confirmation">Goal Assigned</h4></div><div class="modal-body"><p class="danger">'.$row1['Goal_Type'].'</p></div><div class="modal-footer"><button type="button" class="btn btn-danger" id="close" data-dismiss="modal">Close</button><a href="goal_describe.php" class="btn btn-info" role="button">Describe Goal</a></div></div></div></div></div>';
					$_SESSION['goal_type'] = $row1['Goal_Type'];
				}
				else
				{
					continue;
				}
				//$res1++;
			}
			//include 'pop_up_trial.php';
		}
		else
		{
			//include 'pop_up_trial.php';
			break;
		}
        
        ?>



</body>
</html>
