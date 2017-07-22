<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="images/favicon.ico" rel="shortcut icon"/>
	
    <title>EYB | SDP -History Goals</title>
      
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
</head>
<body>
<?php
echo getcwd();

session_start();

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }
	
//Connection Code
$db="careerscope";
$servername = "localhost";
$username = "root";
$password = "oracle";

$user_name = $_SESSION['user'][1];
// Create connection
$conn=($GLOBALS["___mysqli_ston"] = mysqli_connect($servername, $username, $password));  // Make Connection
	mysqli_select_db($GLOBALS["___mysqli_ston"], $db);                      // Select Database

// Check connection
if (!$conn) {
    die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}
//echo "Connected successfully";

//Connection Code ends


$Id = $_GET["id"]; //escape the string if you like

$email=$_SESSION['user'][0];

$sql1="select * from goals_completed where email='$email'and goal_id='$Id'";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
$count=mysqli_num_rows($res1);
// Run the Query
//echo $Id;echo $count;
 $data2 = mysqli_fetch_array($res1);
?>

<?php
	  $sql2="select * from goal_evidence where email='$email' and goal_id IN('$Id')";
	  $res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
	  $count_evid=mysqli_num_rows($res2);
	  $data3 = mysqli_fetch_array($res2);
	  if($count_evid>0)
	  {
		  /////////////////////
		 echo '
	<table class="table">
	<thead>
    <tr>
    <th>File Name</th>
    <th>File Type</th>
    <th>File Size(KB)</th>
    <th>View</th>
    </tr>
	</thead><tbody>'; 
	
	$sql4="SELECT * FROM goal_evidence where email='$email' and goal_id IN('$Id')";
	$result_set=mysqli_query($GLOBALS["___mysqli_ston"], $sql4);
	while($row4=mysqli_fetch_array($result_set))
	{
		
	  
       echo '<tr>
        <td>'.$row4['file_name'].'</td>
        <td>.'$row4['file_type'].'</td>
        <td>'.$row4['file_size'].'</td>
        <td><a href="/var/www/html/careerscope/Sdp/uploads/'.$user_name.'/'.$row4['file_name']'." target="_blank">View File</a></td>
        </tr>';
       
	}
	
    echo '</tbody></table>';
		  
		  ////////////////////////
	  }
	  else
	  {
		 echo "<p>No Evidence has beeen Submitted</p>";
	  }
	 ?>
</body>
</html>