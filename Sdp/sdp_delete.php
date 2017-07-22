<?php
 session_start();

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }
?>
<?php
//Php connection to database code starts here
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

//Php connection to database code ends here
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="images/favicon.ico" rel="shortcut icon"/>
	
    <title>EYB | SDP -Delete Goals</title>
      
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

<!--Script for confirm box-->

<!--Script for confirm box ends here-->
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
        <div class="col-sm-4">
            <h5>Welcome <?php echo $_SESSION['user'][1]; ?>,</h5>
        </div>
        <div class="col-sm-6">
            
        </div>
		<div class="col-sm-1">
                    <!--<a class="btn btn-default btn-block" href="../newindex.php"><span class="glyphicon glyphicon-home"></a>-->
		</div>
        <div class="col-sm-1">
            <a class="btn btn-default btn-block" href="../logout.php">Logout</a>
        </div>
        
    </div>
</div>
</div>
<!-- Name of user ends-->
<!-- Name of user ends-->

<!--Body Begins here-->
<div class="container">
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading"><h4><?php $user_name = $_SESSION['user'][1]; echo "$user_name";echo "'s Goals" ?></h4></div>

  <!-- Table -->
  <table class="table">
    <thead>
    <tr>
      <th>Goal ID</th>
      <th>Goal Title</th>
      <th>Goal Type</th>
	  <th>Date Created</th>
      <th>DeadLine</th>
	  <th></th>
    </tr>
  </thead>
  
  <tbody>
  <?php
  //php code to display the goals
   
$email=$_SESSION['user'][0];
$sql1="select * from goal_list where email='$email'";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
$count=mysqli_num_rows($res1);
	if($count)
	{
		while($row1=mysqli_fetch_array($res1))
		{
			echo '<tr><th scope="row">'.$row1['goal_id'].'</th><td>'.$row1['title'].'</td><td>'.$row1['goal_type'].'</td><td>'.$row1['time_added'].'</td><td>'.$row1['deadline'].'</td><td><a href="file_view_self.php?id='.$row1['goal_id'].'"" class="btn btn-default" role="button" data-toggle="modal" title="View Goal '.$row1['title'].'" data-target="#myModal_View"><small>View</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="sdp_del_goal.php?id='.$row1['goal_id'].'" class="btn btn-danger" role="button" data-toggle="modal" data-target="#myModal_Edit" title="Delete Goal '.$row1['title'].'" role="button"><small>Delete</small></a></td></tr>';
		}
	}
	else
	{
		echo '<h2>No Goals Added yet</h2>';
		break;
	}
	?>
  </tbody>
  </table>
</div>
</div>
<!--Body ends here-->

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

<!-- Modal for Edit-->
<div class="modal fade" id="myModal_Edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
               <!-- <ul id="downMenu">
                    <li class="active"><a href="#home">Home</a>
                    </li>
                    <li><a href="#" target="blank">Link 1</a>
                    </li>
                    <li><a href="#" target="blank">Link 2</a>
                    </li>
                    <li><a href="#" target="blank">Link 3</a>
                    </li>
                </ul>-->
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