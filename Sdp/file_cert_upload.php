<html>
<head>
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

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js_modal/jquery.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js_modal/bootstrap.js"></script>
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


$Id = $_GET["id"]; //escape the string if you like
 $_SESSION['ID'] = $Id;
$email=$_SESSION['user'][0];
$sql1="select * from goals_completed where email='$email'and goal_id='$Id'";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
$count=mysqli_num_rows($res1);
// Run the Query
//echo $Id;echo $count;
 $data2 = mysqli_fetch_array($res1);

?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><center><?php $user_name = $_SESSION['user'][1]; echo $data2[title]; ?></center></h4>
</div>
<div class="modal-body">
   
   <!--
<form class="form-horizontal" action="updatedb.php" method="get">-->
  <!--Goal Title:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $data2[title]?>"/> </br>
  Action Plan:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $data2[action_plan]?>"/> </br>
  Deadline:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $data2[deadline]?>"/><br>
  Frequency of Reminders: <input type="text" value="<?php echo $data2[frequency]?>"/> </br>
  Goal Type:              <input type="text" value="<?php echo $data2[goal_type]?>"/> </br> -->
  <div class="container">
  
  <div class="row">
  <div class="panel-body">
	   <?php echo "<h4>Save your file as 'Goal_id_Email_Address' Format followed 
	   by <br>File Extension (PNG, JPEG or jpg, PDF) ONLY!</h4>";?>
	   <strong>Goal ID:</strong> <?php echo $data2[goal_id]?> <br>
	   <strong>Goal Type:</strong> <?php echo $data2[goal_type]?><br>
	  <strong>Achieved On:</strong> <?php echo $data2[date_completed]?> <br>
	  
	  
	  
	  
	  </div>
  </div>
  
<!--  <div class="row">  
  
  <div class="col-sm-6">
	  <center><button type="submit"class="btn btn-primary">Update</button></center>
  </div>
<div class="col-sm-6"></div>
   </div>-->
   
   <form enctype="multipart/form-data" action="process.php" method="post">
	<label for="uploadedfile">Choose a file to upload: </label>
	<input type="file" name="uploadedfile" /><br>
	<input type="submit" value="Upload File" />
</form>
   
   
   
   <!--</form>-->
</div>
<div class="modal-footer">
   
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
 

</div>
</body>
</html>