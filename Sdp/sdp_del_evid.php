<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="images/favicon.ico" rel="shortcut icon"/>
	
    <title>EYB | SDP Delete Evidence Process</title>
      
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
//Include database connection here
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


$goal_id = $_GET["id"];//escape the string if you like
$Id=$goal_id;
$_SESSION["goal_id"] = $Id;
$evidence_id=$_GET["evid"];
$_SESSION["evid"] = $evidence_id;
$email=$_SESSION['user'][0];
$sql="select * from goal_evidence where evidence_id='$evidence_id'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
// Run the Query
//echo $Id;echo $count;
 $data2 = mysqli_fetch_array($res);
 //echo $data2['file_name'];
 //echo "hi";
 //echo $evidence_id;
 //echo $goal_id;
 //echo $Id;
$location="http://localhost/careerscope/Sdp/sdp_view_submit.php";
?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><center>Actually Delete the Evidence?</center></h4>
</div>
<div class="modal-body">
<div class="panel panel-primary">
      <div class="panel-heading"><?php echo $data2[file_name];?></div>
      <div class="panel-body">
	  <strong>File Type:</strong> <?php echo $data2[file_type];?> <br>
	  <strong>File Size(KB):</strong> <?php echo $data2[file_size];?><br>
	  <strong>Date Uploaded:</strong> <?php echo $data2['date_sub'];?> <br>
	  <strong>Your file will be Permanetly Deleted</strong>
	  
	  </div>
    </div>
   
</div>

<div class="modal-footer">
   <!--<button type="button" class="btn btn-default">Submit</button>-->
  <button type="button" onclick="location.href='evid_delete.php'" class="btn btn-danger" data-dismiss="modal">Yes</button>
    <button type="button" onclick="location.href='sdp_view_submit.php'" class="btn btn-primary" data-dismiss="modal">Close</button>  
	<?php //echo '<a href="sdp_view_submit.php?" class="btn btn-primary" role="button" data-dismiss="modal" role="button">Close</a>';?>
	
</div> 
</body>

</html>