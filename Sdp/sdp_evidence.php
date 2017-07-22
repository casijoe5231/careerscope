<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="images/favicon.ico" rel="shortcut icon"/>
	
    <title>EYB | SDP - Add Evidence</title>
      
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

<!--header-->
<style>
.headerLine{
    position: relative;
    width: 102%;
    
    height:22%;
    background: url(../images/bgTop.jpg) center center no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
</style>
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
                                            <li><a href="analysis.php" target="">Analysis</a></li>
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
        <div class="col-sm-7">
            
        </div>
		<div class="col-sm-1">
                    <!--<a class="btn btn-default btn-block" href="../newindex.php"><span class="glyphicon glyphicon-home"></a>-->
		</div>
        <div class="col-sm-1">
            <span><a class="btn btn-default" href="../logout.php">Logout</a></span>
        </div>
        
    </div>
</div>
</div>
<!-- Name of user ends-->
<!-- Name of user ends-->

<!--Body starts here-->
<center><h2>Evidence says it All</h2></center>

<center>
<div class="container col-xs-12">
<div class="panel panel-primary panel-transparent">
  <div class="panel-heading">
    <center><h3 class="panel-title"><center>Select a Goal to add your Documents</center></h3></center>
  </div>
<div class="panel-body panel_padding"><!--one Thumbnail--><div class="row">
  <?php
//Php code to Display appropriate number of thumbnail
$email=$_SESSION['user'][0];
$sql1="select * from goals_completed where email='$email'";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
$count=mysqli_num_rows($res1);
	
	if($count)
	{
		while($row1=mysqli_fetch_array($res1))
		{ ?>
				<div class="col-md-4"><div class="thumbnail"><img src="..." alt=""><div class="caption"><h3><?php echo $row1['title']; ?></h3><p>Achieved On:<?php echo $row1['date_completed']; ?></p><p>Goal_id:<?php echo $row1['goal_id']; ?></p><p><a href="file_cert_upload.php?id=<?php echo $row1['goal_id']; $_SESSION["goal_id"]=$row1['goal_id'];?>" class="btn btn-success" role="button" data-toggle="modal" data-target="#myModal_Add">Upload Image</a> <a href="fileview_completion.php?id=<?php echo $row1['goal_id'];?>" class="btn btn-default" role="button" data-toggle="modal" data-target="#myModal_View">View Goal</a> <a target="" href="sdp_view_submit.php?id=<?php echo $row1['goal_id'];?>" class="btn btn-default" role="button">View Submitted Image</a></p></div></div></div>
     
       <?php		}
	}
	else
	{
		echo '<h2>No Goals Achieved Yet</h2>';
		
	}
  ?>
</div></div>
    <!--One Thumbnail Ends-->
  </div>
</div>

</center>
<!--Body Ends here-->

<!--Experiment -->

  <!-- Button trigger modal -->
<!-- Original Modal buttion not nedded now<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>-->

<!-- Modal for Edit-->
<div class="modal fade" id="myModal_Add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title_Edit</h4>
        <?php
      $Id=$row['goal_id'];
      //echo $Id;
      //echo 'hihihi';
      ?>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!--Modal for Edit ends here-->

<!--Modal for View -->
<div class="modal fade" id="myModal_View" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title View</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>

<!--Modal for view ends here-->

  <!--Experiment ends here-->
<br><br>
<!--  Footer  -->
<div class="row">
<div  class="lineBlack">
    <div class="container">
        <div class="row downLine">
            <div class="col-md-12 text-right">
            </div>
            <div class="col-md-6 text-left copy">
                <p>Copyright &copy; 2014 Build Your Brand. All Rights Reserved.</p>
            </div>
            <div class="col-md-6 text-right dm">
               
            </div>
        </div>
    </div>
</div>
</div>



<!--  End of Footer  -->

  

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js_modal/jquery.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js_modal/bootstrap.js"></script>
</body>
</html>
