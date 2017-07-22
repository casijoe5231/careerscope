<!DOCTYPE html>
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
$goal_id=$_GET["id"];
$email=$_SESSION['user'][0];
$user=$_SESSION['user'][1];
//echo $goal_id;
//Connection Code ends
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="images/favicon.ico" rel="shortcut icon"/>
<title>EYB | Self Evaluation</title>
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
<style>
div.polaroid {
  width: 820px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>
<body>
<!-- Form Style-->
<style type='text/css'>
.fieldset{
padding:10px;

line-height:1.8;
border: 1px solid #781351;
}
</style>
<!-- Form Style ends -->
<!--header Style -->
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
<!-- header style ends here-->
<!--header starts-->
		 <div style="margin-bottom:10px;" id="home" >
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
<!-- Body Starts here-->
<?php
$sql1="select * from goals_completed where goal_id IN('$goal_id')";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
$row1=mysqli_fetch_array($res1);

$goal_type=$row1[goal_type];

if($goal_type === 'Specific')
{
	echo $row1[goal_type];
	echo '<div class="container"><div class="row"><div class="col-md-2">.</div><div class="col-md-8 polaroid" style="padding-bottom:20px;"><center><h2>Self Rate the Goal "'.$row1[title].'"</h2></center>
	<form class="fieldset" method="post" action="eval_specific.php?id='.$goal_id.'">
	<div class="form-group">
	<label for="exampleSelect1">Has the goal been achieved successfully? Rate yourself accordingly on a scale of 1 to 10:</label>
	<div>
		 <select name="goal_rate" class="form-control" id="input-goal_type" temp="Enter Percentage of Goal Completed" required=""> 
               <option value=0> -------SELECT--------</option> 
              <option value=1>1</option>
			  <option value=2>2</option>
			  <option value=3>3</option>
			  <option value=4>4</option>
			  <option value=5>5</option>
			  <option value=6>6</option>
			  <option value=7>7</option>
			  <option value=8>8</option>
			  <option value=9>9</option>
			  <option value=10>10</option>
              </select>
		</div>
	</div>
	<div class="form-group">
	<label for="exampleTextarea">Justify why you have rated yourself the above value?</label>
    <textarea name ="justify"class="form-control" id="exampleTextarea" rows="3" required=""></textarea>
	</div>
	<div class="form-group radio row">
	<strong><p>Was the Goal Achieved on Time?</p></strong>
	<label>
    <input type="radio" name="yesno" id="optionsRadios1" value="Yes" required="">Yes</label>
	<label>
    <input type="radio" name="yesno" id="optionsRadios1" value="No">No</label>
	</div>
	<div class="form-group">
	<label for="exampleTextarea">Comment on "Even though the goal has been achieved do you still feel that future progress is possible?"</label>
    <textarea name ="comment"class="form-control" id="exampleTextarea" rows="3" required=""></textarea>
	</div>
	<center><button type="submit" class="btn btn-primary">Submit</button></center>
	</form>
	</div><div class="col-md-2">.</div></div></div>';
}
elseif($goal_type === 'Measurable')
{
	echo $row1[goal_type];
	echo '<div class="container"><div class="row"><div class="col-md-2">.</div><div class="col-md-8 polaroid" style="padding-bottom:20px;"><center><h2>Self Rate the Goal "'.$row1[title].'"</h2></center>
	<form class="fieldset" method="post" action="eval_measure.php?id='.$goal_id.'">
	<div class="form-group">
	<label for="exampleSelect1">What Percentage of Goal has been achieved?</label>
	<div>
		 <select name="goal_percent" class="form-control" id="input-goal_type" temp="Enter Percentage of Goal Completed" required=""> 
               <option value=0> -------SELECT--------</option> 
              <option value=10>10%</option>
			  <option value=20>20%</option>
			  <option value=30>30%</option>
			  <option value=40>40%</option>
			  <option value=50>50%</option>
			  <option value=60>60%</option>
			  <option value=70>70%</option>
			  <option value=80>80%</option>
			  <option value=90>90%</option>
			  <option value=100>100%</option>
              </select>
		</div>
	</div>
	<div class="form-group">
	<label for="exampleTextarea">Enter your Improvements from Ealier Statistics</label>
    <textarea name ="improvements"class="form-control" id="exampleTextarea" rows="3" required=""></textarea>
	</div>
	<div class="form-group">
    <label for="comment">Marks Obtained on Goal Completion Out of 100</label>
    <input type="text" class="form-control" rows="5" id="comment" name="m_goalcom" pattern="(?:\b|-)([1-9]{1,2}[0]?|100)\b" id="percentage_pattern" placeholder="Enter value from 0 to 100">
  </div>
	<div class="form-group">
	<label for="exampleSelect1">On the Basis of Personal Goal Achievement, Rate yourself on a scale of 1 to 10</label>
	<div>
		 <select name="goal_rate" class="form-control" id="input-goal_type" temp="Rate yourself on a scale of 1 to 10" required=""> 
               <option value=0> -------SELECT--------</option> 
              <option value=1>1</option>
			  <option value=2>2</option>
			  <option value=3>3</option>
			  <option value=4>4</option>
			  <option value=5>5</option>
			  <option value=6>6</option>
			  <option value=7>7</option>
			  <option value=8>8</option>
			  <option value=9>9</option>
			  <option value=10>10</option>
              </select>
		</div>
	</div>
	<div class="form-group">
	<label for="exampleTextarea">Justify Why you have reated yourself the above value</label>
    <textarea name ="justify"class="form-control" id="exampleTextarea" rows="3" required=""></textarea>
	</div>
	<div class="form-group radio row">
	<strong><p>Was the Goal Achieved on Time?</p></strong>
	<label>
    <input type="radio" name="yesno" id="optionsRadios1" value="Yes" required="">Yes</label>
	<label>
    <input type="radio" name="yesno" id="optionsRadios1" value="No">No</label>
	</div>
	<div class="form-group">
	<label for="exampleTextarea">Is Future Progress still possible, Explain in a few sentences...</label>
    <textarea name ="future"class="form-control" id="exampleTextarea" rows="3" required=""></textarea>
	</div>
	<center><button type="submit" class="btn btn-primary">Submit</button></center>
	</form>
	</div><div class="col-md-2">.</div></div></div>';
}
elseif($goal_type === 'Ambitious')
{
	echo $row1[goal_type];
	echo '<div class="container"><div class="row"><div class="col-md-2">.</div><div class="col-md-8 polaroid" style="padding-bottom:20px;"><center><h2>Self Rate the Goal "'.$row1[title].'"</h2></center>
	<form class="fieldset" method="post" action="eval_ambitious.php?id='.$goal_id.'">
	<div class="form-group">
	<label for="exampleTextarea">Explain the most Interesting part while traversing through this goal</label>
    <textarea name ="interest"class="form-control" id="exampleTextarea" rows="3" required=""></textarea>
	</div>
	<div class="form-group">
	<label for="exampleSelect1">How much additional Knowledge have you gained?, Rate yourself wisely on a scale of 1 to 10</label>
	<div>
		 <select name="add_know" class="form-control" id="input-goal_type" temp="Rate yourself on a scale of 1 to 10" required=""> 
               <option value=0> -------SELECT--------</option> 
              <option value=1>1</option>
			  <option value=2>2</option>
			  <option value=3>3</option>
			  <option value=4>4</option>
			  <option value=5>5</option>
			  <option value=6>6</option>
			  <option value=7>7</option>
			  <option value=8>8</option>
			  <option value=9>9</option>
			  <option value=10>10</option>
              </select>
		</div>
	</div>
	<div class="form-group">
	<label for="exampleSelect1">Rate yourself out of 10 on the Basis of Goal Completed</label>
	<div>
		 <select name="goal_rate" class="form-control" id="input-goal_type" temp="Rate yourself on a scale of 1 to 10" required=""> 
               <option value=0> -------SELECT--------</option> 
              <option value=1>1</option>
			  <option value=2>2</option>
			  <option value=3>3</option>
			  <option value=4>4</option>
			  <option value=5>5</option>
			  <option value=6>6</option>
			  <option value=7>7</option>
			  <option value=8>8</option>
			  <option value=9>9</option>
			  <option value=10>10</option>
              </select>
		</div>
	</div>
	<div class="form-group">
	<label for="exampleTextarea">Justify Why you have reated yourself the above value?</label>
    <textarea name ="justify"class="form-control" id="exampleTextarea" rows="3" required=""></textarea>
	</div>
	<div class="form-group radio row">
	<strong><p>Was the Goal Achieved on Time?</p></strong>
	<label>
    <input type="radio" name="yesno" id="optionsRadios1" value="Yes" required="">Yes</label>
	<label>
    <input type="radio" name="yesno" id="optionsRadios1" value="No">No</label>
	</div>
	<div class="form-group">
	<label for="exampleTextarea">Is Future Progress still possible, Explain in a few sentences...</label>
    <textarea name ="future"class="form-control" id="exampleTextarea" rows="3" required=""></textarea>
	</div>
	<center><button type="submit" class="btn btn-primary">Submit</button></center>
	</form>
	</div><div class="col-md-2">.</div></div></div>';
}
elseif($goal_type === 'Realistic')
{
	echo $row1[goal_type];
	echo '<div class="container"><div class="row"><div class="col-md-2">.</div><div class="col-md-8 polaroid" style="padding-bottom:20px;"><center><h2>Self Rate the Goal "'.$row1[title].'"</h2></center>
	<form class="fieldset" method="post" action="eval_realistic.php?id='.$goal_id.'">
	<div class="form-group">
	<label for="exampleSelect1">Rate yourself wisely on a scale of 1 to 10, depending how motivated you were while pursuing this goal?</label>
	<div>
		 <select name="motivate" class="form-control" id="input-goal_type" temp="Rate yourself on a scale of 1 to 10" required=""> 
               <option value=0> -------SELECT--------</option> 
              <option value=1>1</option>
			  <option value=2>2</option>
			  <option value=3>3</option>
			  <option value=4>4</option>
			  <option value=5>5</option>
			  <option value=6>6</option>
			  <option value=7>7</option>
			  <option value=8>8</option>
			  <option value=9>9</option>
			  <option value=10>10</option>
              </select>
		</div>
	</div>
	<div class="form-group">
	<label for="exampleTextarea">Comment, What made you take up this goal?</label>
    <textarea name ="takeup"class="form-control" id="exampleTextarea" rows="3" required=""></textarea>
	</div>
	<div class="form-group">
	<label for="exampleSelect1">By how much have you benefitted from this goal?</label>
	<div>
		 <select name="benefit" class="form-control" id="input-goal_type" temp="Rate yourself on a scale of 1 to 10" required=""> 
               <option value=0> -------SELECT--------</option> 
              <option value=1>1</option>
			  <option value=2>2</option>
			  <option value=3>3</option>
			  <option value=4>4</option>
			  <option value=5>5</option>
			  <option value=6>6</option>
			  <option value=7>7</option>
			  <option value=8>8</option>
			  <option value=9>9</option>
			  <option value=10>10</option>
              </select>
		</div>
	</div>
	<div class="form-group radio row">
	<strong><p>Did the goal Scale your Performance?</p></strong>
	<label>
    <input type="radio" name="yesno_scale" id="optionsRadios1" value="Yes" required="">Yes</label>
	<label>
    <input type="radio" name="yesno_scale" id="optionsRadios1" value="No">No</label>
	</div>
	<div class="form-group radio row">
	<strong><p>Was the Goal Achieved on Time?</p></strong>
	<label>
    <input type="radio" name="yesno" id="optionsRadios1" value="Yes" required="">Yes</label>
	<label>
    <input type="radio" name="yesno" id="optionsRadios1" value="No">No</label>
	</div>
	<div class="form-group">
	<label for="exampleSelect1">With Respect to Goal Completion, how much will you rate yourself on a scale of 1 to 10?</label>
	<div>
		 <select name="goal_com" class="form-control" id="input-goal_type" temp="Rate yourself on a scale of 1 to 10" required=""> 
               <option value=0> -------SELECT--------</option> 
              <option value=1>1</option>
			  <option value=2>2</option>
			  <option value=3>3</option>
			  <option value=4>4</option>
			  <option value=5>5</option>
			  <option value=6>6</option>
			  <option value=7>7</option>
			  <option value=8>8</option>
			  <option value=9>9</option>
			  <option value=10>10</option>
              </select>
		</div>
	</div>
	<div class="form-group">
	<label for="exampleTextarea">Justify Why you have rated yourself the above value?</label>
    <textarea name ="justify"class="form-control" id="exampleTextarea" rows="3" required=""></textarea>
	</div>
	<center><button type="submit" class="btn btn-primary">Submit</button></center>
	</form>
	</div><div class="col-md-2">.</div></div></div>';
}
elseif($goal_type === 'Timebased')
{
	echo $row1[goal_type];
	echo '<div class="container"><div class="row"><div class="col-md-2">.</div><div class="col-md-8 polaroid" style="padding-bottom:20px;"><center><h2>Self Rate the Goal "'.$row1[title].'"</h2></center>
	<form class="fieldset" method="post" action="eval_time.php?id='.$goal_id.'">
	<div class="form-group radio row">
	<strong><p>When was the goal Achieved?</p></strong>
	<label><input type="radio" name="when" id="optionsRadios1" value="Advance" required="">Well in Advance</label><br>
	<label><input type="radio" name="when" id="optionsRadios1" value="Ontime">Just on Time</label><br>
	<label><input type="radio" name="when" id="optionsRadios1" value="Delay">Delayed</label>
	</div>
	<div class="form-group radio row">
	<strong><p>How often would work towards this goal?</p></strong>
	<label>
    <input type="radio" name="frequency" id="optionsRadios1" value="Month" required="">Once a Month</label>&nbsp;&nbsp;
	<label>
    <input type="radio" name="frequency" id="optionsRadios1" value="Week">Once a Week</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="frequency" id="optionsRadios1" value="Daily">Everyday</label>
	</div>
	<div class="form-group">
	<label for="exampleSelect1">On the basis of Goal Completion how successful were you in achieving this goal? Rate yourself accordingly on a scale of 1 to 10:</label>
	<div>
		 <select name="goal_rate" class="form-control" id="input-goal_type" temp="Enter Percentage of Goal Completed" required=""> 
               <option value=0> -------SELECT--------</option> 
              <option value=1>1</option>
			  <option value=2>2</option>
			  <option value=3>3</option>
			  <option value=4>4</option>
			  <option value=5>5</option>
			  <option value=6>6</option>
			  <option value=7>7</option>
			  <option value=8>8</option>
			  <option value=9>9</option>
			  <option value=10>10</option>
              </select>
		</div>
	</div>
	<div class="form-group">
	<label for="exampleTextarea">Justify why you have rated yourself the above value?</label>
    <textarea name ="justify"class="form-control" id="exampleTextarea" rows="3" required=""></textarea>
	</div>
	<div class="form-group radio row">
	<strong><p>Are you Satisfied with your Current Progress? or do you wish to improve even futher?</p></strong>
	<label>
    <input type="radio" name="satisfied" id="optionsRadios1" value="Not Satisfied" required="">Not Satisfied</label><br>
	<label>
    <input type="radio" name="satisfied" id="optionsRadios1" value="Satisfied">Satisfied</label>
	</div>
	<center><button type="submit" class="btn btn-primary">Submit</button></center>
	</form>
	</div><div class="col-md-2">.</div></div></div>';
}
else
{
	echo $row1[goal_type];
	echo '<div class="container"><div class="row"><div class="col-md-2">.</div><div class="col-md-8 polaroid" style="padding-bottom:20px;"><center><h2>Self Rate the Goal "'.$row1[title].'"</h2></center>
	<form class="fieldset" method="post" action="eval_other.php?id='.$goal_id.'">
	<div class="form-group radio row">
	<strong><p>Was the goal Achieved on time?</p></strong>
	<label><input type="radio" name="yesno" id="optionsRadios1" value="1" required="">Yes</label>&nbsp;&nbsp;&nbsp;
	<label><input type="radio" name="yesno" id="optionsRadios1" value="0">No, it was Revived</label>
	</div>
	<div class="form-group">
	<label for="exampleSelect1">Rate yourself, on a scale of 1 to 10, depending on how much you benefited by achieving this goal?</label>
	<div>
		 <select name="goal_rate" class="form-control" id="input-goal_type" temp="Enter Percentage of Goal Completed" required=""> 
               <option value=0> -------SELECT--------</option> 
              <option value=1>1</option>
			  <option value=1>2</option>
			  <option value=1>3</option>
			  <option value=2>4</option>
			  <option value=2>5</option>
			  <option value=2>6</option>
			  <option value=2>7</option>
			  <option value=3>8</option>
			  <option value=3>9</option>
			  <option value=3>10</option>
              </select>
		</div>
	</div>
	<div class="form-group">
	<label for="exampleTextarea">Justify why you have rated yourself the above value?</label>
    <textarea name ="justify"class="form-control" id="exampleTextarea" rows="3" required=""></textarea>
	</div>
	<div class="form-group radio row">
	<strong><p>Did the goal help improving time management skills?</p></strong>
	<label><input type="radio" name="time" id="optionsRadios1" value="2" required="">Yes, very helpful</label><br>
	<label><input type="radio" name="time" id="optionsRadios1" value="1">Up to some extent</label><br>
	<label><input type="radio" name="time" id="optionsRadios1" value="0">Not very useful</label>
	</div>
	<div class="form-group radio row">
	<strong><p>Was the goal challenging and interesting to accomplish?</p></strong>
	<label><input type="radio" name="interest" id="optionsRadios1" value="2" required="">Yes very much</label>&nbsp;&nbsp;&nbsp;
	<label><input type="radio" name="interest" id="optionsRadios1" value="1">Some parts were good</label>&nbsp;&nbsp;&nbsp;
	<label><input type="radio" name="interest" id="optionsRadios1" value="0">It was boring</label>
	</div>
	<div class="form-group radio row">
	<strong><p>How often would you work towards your goal?</p></strong>
	<label><input type="radio" name="work" id="optionsRadios1" value="2" required="">Daily</label><br>
	<label><input type="radio" name="work" id="optionsRadios1" value="1">Once a Week</label><br>
	<label><input type="radio" name="work" id="optionsRadios1" value="0">Rarely once a Month</label>
	</div>
	<div class="form-group">
	<label for="exampleTextarea">Comment on: Even though the goal has been achieved do you still feel that future progress is still possible?</label>
    <textarea name ="u_comment"class="form-control" id="exampleTextarea" rows="3" required=""></textarea>
	</div>
	<center><button type="submit" class="btn btn-primary">Submit</button></center>
	</form>
	</div><div class="col-md-2">.</div></div></div>';
}

?>
<!--Body ends here -->
<!--  Footer  -->
<br><br>
<div class="row" style="width:103%">
<div  class="lineBlack">
    <div class="container">
        <div class="row downLine">
            <div class="col-lg-12 text-right">
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