<?php
    
	include 'includes/headerfooter.php';
    session_start();
    if($_SESSION['usertype']>=9 && $_SESSION['usertype']<=14)
	
		echo "usertype:".$_SESSION['usertype'];
		include 'includes/connection2.php';
		
		$emaill=$_SESSION['user'][0];
		$usertype=$_SESSION['usertype'];
		 $sql5="select * from masteruser where email='$emaill'";
    $res5=mysqli_query($GLOBALS["___mysqli_ston"], $sql5);
   while($row5=mysqli_fetch_array($res5))
    {
      $_SESSION['institute']=$row5['institute'];
    }
    
		date_default_timezone_set('Asia/Calcutta');
		$datetime = date("F j, Y, g:i a");
		$timesql = date("Y-m-d H:i:s"); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
<!-- Favicon -->
    <link href="images/favicon.ico" rel="shortcut icon"/>
	
    <title>BYB | Administrator Menu </title>
      
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

        <!--Custom CSS-->
<link rel="stylesheet" type="text/css" href="css/ColumnFilterWidGETs.css">
<script type="text/javascript" charset="utf-8" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="js/ColVis.js"></script>
<link rel="stylesheet" type="text/css" href="css/ColVis.css">

  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script  type="text/javascript" src="validator2.js" ></script>

<script>
$(document).ready( function () {
    $('#details').dataTable( {
         bAutoWidth:false ,
        "sDom": 'W<"clear">lfrtip',
         oColumnFilterWidGETs: {
        aiExclude: [7,8]
       }
    } );
} );


/*$(document).ready( function () {
    $("#details").dataTable().columnFilter();
} );*/
</script>


    </head>
<body>
    <!--header-->
<div class="mast">
<div class="container">
        <div class="row">
            <div class="logo col-md-1">
                <div>
                    <a href="#">
                        <img src="images/byblogo.png" width="90" height="90">
                    </a>
                </div>
            </div>
            <div class="col-md-11">
                <div class="mast-nav" style="text-align: center;">
                    <ul id="menu" style="color: red;" >
                        <li><a href="lecturerdetails.php">Existing Staff Details</a>
                        </li>
                      <li class="active"><a href="addsubject.php">Add Subject</a>
                        </li>
                        
                        <li class="active"><a href="getdata.php">View Subject Details</a>
                        </li>
                           <li class="active"><a href="demo2.php">Assign Task</a>
                        </li>
                       

                    </ul>
                </div>
            </div>
        </div>
    </div> 
</div>
   

    <div style="margin-top:120px;" class="container">

    <div style="padding:10px;" class="panel panel-default">
    <div class="row">
        <div class="col-sm-3">
            <h5>Welcome <?php echo $_SESSION['user'][1]; ?>,</h5>
        </div>
        <div class="col-sm-8">
            
        </div>
        <div class="col-sm-1">
            <a class="btn btn-default btn-block" href="logout.php">Logout</a>
        </div>
        
    </div>
</div>
<!-- form -->
<div class="" >
            <h2>HOD Menu</h2>
            <p>Add new Subject</p>
            
            <form class="form-horizontal" role="form" action="addsubject.php" onsubmit="return validateAll()" method="post">
            <div class="well">
<!--Section One-->
                
                
        
  
                
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Department</label>
           <div class="col-sm-8">
                <select class="form-control" name="department" id="input-department" temp="Please select the department" onblur="validator1(this)">
                <option value="Select">Select</option>
                <option value="Computer">Computer</option>
                <option value="IT">IT - Engineering</option>
                <option value="Mechanical">Mechanical</option>
                <option value="IT - mms">IT - MMS</option>
                <option value="HR">HR</option>
                <option value="Finance">Finance</option>
                <option value="Market">Market</option>
                <option value="None">None</option>
                </select><span id="department" style="color:#C00;"></span>
            </div>
        </div>        
           
		    <div class="row-sm-12">
		             
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Select Year</label>
           <div class="col-sm-8">
                <select class="form-control"  name="year" id="Device" temp="Please select the year" onblur="validator(this)"onclick="craateUserJsObject.ShowPrivileges();">

                      <option value="Select">Select Year</option>
							<option id="fy" value="fy">First Year</option>
							<option id="sy" value="sy">Second Year</option>
							<option id="ty" value="ty">Third Year</option>
							<option id="be" value="be">BE</option>
				</select>
                <span id="discipline" style="color:#C00;"></span>
            </div>
        </div>
		   <div class="form-group">
		   <div class="resources" style="display:none;" >
		   <label for="sec1" class="col-sm-2 control-label">Select Semester</label>
           <div class="col-sm-8">
		   <div class="radio radio-info radio-inline">
			<input type="radio"  id="sem1" name="sem" value="sem1" ><label for="sem1">Semester 1</label></div>
			<div class="radio radio-info radio-inline">
			<input type="radio" id="sem2" name="sem" value="sem2" ><label for="sem2">Semester 2</label></div>
			 </div>
			 
</div>
 <span id="discipline" style="color:#C00;"></span>
		    <div class="resources2" style=" display: none;">
		   <label for="sec1" class="col-sm-2 control-label">Select Semester</label>
           <div class="col-sm-8">
			<div class="radio radio-info radio-inline">
				<input type="radio" id="sem3" name="sem" value="sem3" ><label for="sem3">Semester 3</label></div>
			<div class="radio radio-info radio-inline">
					<input type="radio" id="sem4" name="sem" value="sem4" ><label for="sem4">Semester 4</label></div>


			</div>
</div>
                <span id="discipline" style="color:#C00;"></span>
                
<div class="resources3" style=" display: none;">
		   <label for="sec1" class="col-sm-2 control-label">Select Semester</label>
           <div class="col-sm-8">
						
                    	<div class="radio radio-info radio-inline">
			<input type="radio" name="sem" id="sem5" value="sem5" ><label for="sem5">Semester 5</label></div>

				<div class="radio radio-info radio-inline">
			<input type="radio" name="sem" id="sem6" value="sem6" ><label for="sem6">Semester 6</label></div>

 </div>
</div> <span id="discipline" style="color:#C00;"></span>

<div class="resources4" style=" display: none;">
		   <label for="sec1" class="col-sm-2 control-label">Select Semester</label>
           <div class="col-sm-8">
					
                  	<div class="radio radio-info radio-inline">
			<input type="radio" name="sem" id="sem7" value="sem7" ><label for="sem7">Semester 7</label></div>

				<div class="radio radio-info radio-inline">
			<input type="radio" name="sem" id="sem8" value="sem8" ><label for="sem8">Semester 8</label></div>

</div>
</div>          <span id="discipline" style="color:#C00;"></span>
            </div>
        </div>
		   <div class="form-group">
                <label for="input-name" class="col-sm-2 control-label">Subject</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="input-name" placeholder="subject" name="subject"  temp="Please enter the name." onblur="validate(this);" >
            <span id="name" style="color:#C00;"></span></div>
        </div>
		   
            
        <center><button class="btn btn-info btn-md" type="submit" name="submit" style="margin-bottom:10px;">Add Subject</button></center>
                
    </div>  
 </div>
</div>


<?php
if(isset($_POST['submit']))
{
  include 'includes/connection1.php';
 $department = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['department']);
 $year = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['year']);
 $sem = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['sem']);
 $subject = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['subject']);
echo $sem;
$sql="INSERT INTO addsubject(department,year,sem,subject)
VALUES ('".$department."', '".$year."', '".$sem."','".$subject."')";

          $result = mysqli_query($GLOBALS["___mysqli_ston"],  $sql )or die('Error: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
    }  
?>







 </div>
<!--  Footer  -->
<div class="lineBlack">
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
                    <li><a href="#" tarGET="blank">Link 1</a>
                    </li>
                    <li><a href="#" tarGET="blank">Link 2</a>
                    </li>
                    <li><a href="#" tarGET="blank">Link 3</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--  End of Footer  -->
</body>
</html>