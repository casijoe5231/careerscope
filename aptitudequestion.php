<?php
    include 'includes/headerfooter.php';
    session_start();
    if(($_SESSION['usertype']>=10 && $_SESSION['usertype']<=13) || ($_SESSION['usertype']>=15 && $_SESSION['usertype']<=18))
    {
        echo "usertype:".$_SESSION['usertype'];
        include 'includes/connection2.php';
        $emaill=$_SESSION['user'][0];
        $usertype=$_SESSION['usertype'];
        date_default_timezone_set('Asia/Calcutta');
        $datetime = date("F j, Y, g:i a");
        $timesql = date("Y-m-d H:i:s"); 
        //$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Testmgr Home Page','$timesql')";
        //$res=mysql_query($sql)or die("query not executed");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
<!-- Favicon -->
    <link href="images/favicon.ico" rel="shortcut icon"/>
	
    <title>BYB |lecturer Menu </title>
      
<!--  CSS  -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/build.css">
   
    <link rel='stylesheet' id='camera-css'  href='css/camera.css' type='text/css' media='all'>
    <link rel="stylesheet" type="text/css" href="css/carousel.css">
    <link rel="stylesheet" type="text/css" href="css/slicknav.css">
    <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main
    stylesheet"charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet'             type='text/css'>
      
<!--  JS  -->
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script> 
    <script type="text/javascript" src="js/camera.min.js"></script>
    <script type="text/javascript" src="js/myscript.js"></script>
    <script src="js/sorting.js" type="text/javascript"></script>
    <script src="js/jquery.isotope.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
			jQuery(function(){
					jQuery('#camera_wrap_1').camera({
					transPeriod: 500,
					time: 3000,
					height: '490px',
					thumbnails: false,
					pagination: true,
					playPause: false,
					loader: false,
					navigation: false,
					hover: false
				});
			});
		</script>
        <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
        <script  type="text/javascript" src="validator3.js" ></script>
        <script type="text/javascript">
        <!--
        var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
        //-->
        </script>
		<script>
$(document).ready(function() {
 // your code

     var Privileges = jQuery('#Device');
var select = this.value;
Privileges.change(function () {
if ($(this).val() == 'fy') {
    $('.resources').show();
}
else $('.resources').hide();

if ($(this).val() == 'sy') {
    $('.resources2').show();
}
else $('.resources2').hide();

if ($(this).val() == 'ty') {
    $('.resources3').show();
}
else $('.resources3').hide();

if ($(this).val() == 'be') {
    $('.resources4').show();
}
else $('.resources4').hide();


});
});
</script>

		
		<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
    </head>
<body>
    <!--header-->
<div class="mast">
<div class="container">
        <div class="row">
            <div class="logo col-md-2">
                <div>
                    <a href="#">
                        <img src="images/byblogo.png" width="90" height="90">
                    </a>
                </div>
            </div>
            <div class="col-md-10">
                <div class="mast-nav" style="text-align: center;">
                    <ul id="menu" style="color: red;" >
                        <li class="active"><a href="aptitudequestion.php" data-toggle="tooltip" data-placement="bottom" title="Add Aptitude Questions">Aptitude Question</a>
                        </li>
                        <li><a href="softskillquestions.php" data-toggle="tooltip"data-placement="bottom"  title=" Add Soft-Skill Questions">Soft-Skill Question</a>
                        </li>
                        <li><a href="subjectquestions.php" data-toggle="tooltip" data-placement="bottom"title=" Add Subject Questions">subject Question</a>
                        </li>
                        
                        

                   </ul>
                </div>
            </div>
        </div>
    </div> 
</div>
   
<!--  Welcome Bar  -->
        <nav class="navbar-container">
            <ul class="nav nav-pills navbar-left">
                <p class="navbar-brand">Welcome <?php echo $_SESSION['user'][1]; ?>,  <?php

				
				 $sql1="select sub_name from asubhod where email='$emaill'";
        $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
        while($row1=mysqli_fetch_array($res1))
        {
        ?>
        <u><br><?php //echo $row1['sub_name'] ?></u></strong>
		<?php
        }
        
        ?>
		</p>
            </ul>
            <ul class="nav nav-pills navbar-right" style="margin-top:6px; margin-right:10px;">
                
                <li style="padding: 0 8px 0 8px;">
                    <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" id="current-role" data-toggle="dropdown" aria-expanded="true">
                        as Lecturer
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="current-role">

                      <?php
                        if($usertype>=9 && $usertype<=14){
                            echo '<li role="presentation">';
                            echo '<a role="menuitem" tabindex="-1" href="hodindex.php">';
                            echo 'HOD';
                            echo '</a></li>';
                        }

                        if(($usertype>=10 && $usertype<=13) || ($usertype>=15 && $usertype<=18)){

                            echo '<li role="presentation">';
                            echo '<a role="menuitem" tabindex="-1" href="lecturerindex.php">';
                            echo 'Lecturer';
                            echo '</a></li>';
                        }

                        if($usertype==11 || $usertype==13 || $usertype==14 || $usertype==16 || $usertype==18 || $usertype==19){

                            echo '<li role="presentation">';
                            echo '<a role="menuitem" tabindex="-1" href="mentorindex.php">';
                            echo 'Mentor';
                            echo '</a></li>';
                        }

                        if($usertype==12 || $usertype==13 || $usertype==17 || $usertype==18){

                            echo '<li role="presentation">';
                            echo '<a role="menuitem" tabindex="-1" href="testindex.php">';
                            echo 'Test';
                            echo '</a></li>';
                        }
                    ?>
                      </ul>
                    </div>
                </li>
                
                <li style="padding: 0 8px 0 8px;"><a href="logout.php"  data-toggle="tooltip"data-placement="bottom"  title=" Logout " style="padding: 6px 12px;" class="btn btn-md btn-default">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"> </span> Log Out
                    </a>
                </li>
            </ul>  
        </nav>

<!--  /Welcome Bar  -->
<!--/form-->


 
        <div class="col-sm-12 ">
<form class="form-horizontal" role="form" action="aptitudequestion.php" onsubmit="return validateAll()" method="post">
            <div class="well">
<!--Section One--><h2>Aptitude Questions</h2>

 
</div>


                 <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Select Type</label>
           <div class="col-sm-8">
                <select class="form-control"  name="t_id" id="input-discipline" temp="Please select the discipline" onblur="validator(this)">
                      <option value="Select">Select</option>
                    <option value="6">Quantitative Aptitude</option>
					<option value="61">High Level Quantitative Aptitude</option>
                                      
				   <option value="9">Verbal Reasoning/grammar</option>
                    <option value="21">Verbal Reasoning/vocabulary</option>
                    <option value="13">Analytical Reasoning/directional</option>
                    <option value="26">Analytical Reasoning/relationship</option>
                    <option value="27">Analytical Reasoning/Arrange(letters/numbers)</option>
                    
					<option value="28">Judgement Tests</option>
					<option value="29">Data Interpretation</option>
					<option value="30">Coding Decoding</option>
					<option value="23">Logical Reasoning</option>
					<option value="1">Technical Tests/Data structure</option>
					<option value="2">Technical Tests/programming</option>
					<option value="5">Technical Tests/networking</option>
					<option value="7">Technical Tests/database</option>
					<option value="31">Intelligence Test</option>
					
                

                </select>
                <span id="discipline" style="color:#C00;"></span>
            </div>
        </div>
       
                
        <div class="form-group">
                <label for="input-name" class="col-sm-2 control-label">Question</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="input-name" placeholder="Question" name="question"  temp="Please enter the name." onblur="validate(this);" >
            <span id="name" style="color:#C00;"></span></div>
        </div>
            
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Option1</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="opt1" id="input-op1" placeholder="option1"  temp="Enter valid email ID" onblur="emailValidator(this)">
            <span id="email" style="color:#C00;"></span></div>
        </div>

        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Option2</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="opt2" id="input-op2" placeholder="Option2"  temp="Enter a valid password" onblur="validate(this);">
            <span id="pass" style="color:#C00;"></span></div>
        </div>
            
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Option3</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="opt3" id="input-op3" placeholder="Option3"  temp="Enter a valid password" onblur="validate(this);">
            <span id="pass" style="color:#C00;"></span></div>
        </div>
            
			<div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Option4</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="opt4" id="input-op4" placeholder="Option4"  temp="Enter a valid password" onblur="validate(this);">
            <span id="pass" style="color:#C00;"></span></div>
        </div>
        
			<div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Answer</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="ans" id="input-ans" placeholder="Answer"  temp="Enter a valid password" onblur="validate(this);">
            <span id="pass" style="color:#C00;"></span></div>
        </div>
			
			
                
       
            
        <center><button class="btn btn-info btn-md" type="submit" name="submit"style="margin-bottom:10px;" >Add Question</button></center>
                
    </div>  
 </div>
 </form>
</div>

 <?php
 if(isset($_POST['submit']))
 {
  include 'connection1.php';
  //session_start();
//$mail=$_SESSION['user'][0];
//$level = mysql_real_escape_string($_POST['lev']);

$type = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['t_id']);
$question = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['question']);
$opt1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['opt1']);
$opt2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['opt2']);
$opt3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['opt3']);
$opt4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['opt4']);
$ans = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['ans']);
$qid="select q_id from questions where t_id='$type'";
$result=mysqli_query($GLOBALS["___mysqli_ston"], $qid);
		
//$qid = mysql_real_escape_string($_POST['sql1']);
//echo $qid;
//$qid++;
//echo $qid;
echo $count=mysqli_num_rows($result);
  if($count==0)
  {
	  $count=1;
  }
else
{
	echo $count++;
}
$sql="INSERT INTO questions(t_id,q_id,question,opt1,opt2,opt3,opt4,ans)
VALUES (".$type.", ".$count.", '".$question."', '".$opt1."','".$opt2."', '".$opt3."','".$opt4."', '".$ans."')";
echo $result = mysqli_query($GLOBALS["___mysqli_ston"],  $sql );


 }
		
	   
 ?>

 
 
 
 

<!--  Footer  -->
<div  class="lineBlack">
    <div class="container">
        <div class="row downLine">
            <div class="col-md-12 text-right">
            </div>
            <div class="col-md-6 text-left copy">
                <p>Copyright &copy; 2014 Build Your Brand. All Rights Reserved.</p>
            </div>
            <div class="col-md-6 text-right dm">
                <ul id="downMenu">
                    <li class="active"><a href="#home">Home</a>
                    </li>
                    <li><a href="#" target="blank">Link 1</a>
                    </li>
                    <li><a href="#" target="blank">Link 2</a>
                    </li>
                    <li><a href="#" target="blank">Link 3</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--  End of Footer  -->
</body>
</html>
<?php
}
else
{
    header("location:login.php?login=0");
}
?>