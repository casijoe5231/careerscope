<?php
    session_start();

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }

    if ($_SESSION['usertype']!=1) {
        if ($_SESSION['usertype']!=2) {
            header("location:../login.php");
        }
    }

    include '../includes/connection1.php';

    	$email=$_SESSION['user'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$con=mysqli_connect("localhost","root","","careerscope");
	// Tracking the user
	$sql="insert into activity(email,menu_accessed,timesql) values('$email','Academic Brand Job Profiling','$timesql')";
	$res=mysqli_query($con, $sql)or die("query not executed");
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Favicon -->
        <link href="../images/favicon.ico" rel="shortcut icon"/> 

        <title>BYB | Blank </title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
        <link rel='stylesheet' id='camera-css'  href='../css/camera.css' type='text/css' media='all'>

        <link rel="stylesheet" type="text/css" href="../css/slicknav.css">
        <link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../css/style2.css">


        <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="../js/jquery.mobile.customized.min.js"></script>
        <script type="text/javascript" src="../js/jquery.easing.1.3.js"></script> 
        <script type="text/javascript" src="../js/camera.min.js"></script>
        <script type="text/javascript" src="../js/myscript.js"></script>
        <script src="../js/sorting.js" type="text/javascript"></script>
        <script src="../js/jquery.isotope.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.slicknav.js"></script>
        <!--script type="text/javascript" src="../js/jquery.nav.js"></script-->

        
<script type="text/javascript">
function get_job()
	{
		var goal_id = document.getElementById('goal').value;
					if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					  }
					else
					  {// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					xmlhttp.onreadystatechange=function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						document.getElementById('job').innerHTML=xmlhttp.responseText;
						}
					  }
					xmlhttp.open("GET","display_job.php?goal_id="+goal_id,true);
					xmlhttp.send();
	}
	function get_disc(){
        var disc_id = document.getElementById('disc').value;
                    if (window.XMLHttpRequest)
                      {// code for IE7+, Firefox, Chrome, Opera, Safari
                      xmlhttp=new XMLHttpRequest();
                      }
                    else
                      {// code for IE6, IE5
                      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                      }
                    xmlhttp.onreadystatechange=function()
                      {
                      if (xmlhttp.readyState==4 && xmlhttp.status==200)
                        {
                        document.getElementById('goal').innerHTML=xmlhttp.responseText;
                        }
                      }
                    xmlhttp.open("GET","display_disc.php?disc_id="+disc_id,true);
                    xmlhttp.send();
    }
</script>
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


        
    </head>
    <body>

        <div style="margin-bottom:20px;" id="home">
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
                                         <li><a>"Everybody is a genius. But if you judge a fish by its ability to climb a tree, it will live its whole life believing that it is stupid."</a></li>   
                                        </ul>
                                   </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Main Content Here -->
        <div class="container">

        <div style="padding:10px;" class="panel panel-default">
            <div class="row">
                <div class="col-sm-2">
                    <h5>Welcome <?php echo $_SESSION['user'][1]; ?>,</h5>
                </div>
                <div class="col-sm-10">
                    <div class="col-sm-8"></div>

                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../newindex.php"><span class="glyphicon glyphicon-home"></span> </a></div>
                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../logout.php">Logout</a></div>
                
                </div>
            </div>
        </div>
        <h1>Education Profiling</h1>
        
        
                     
        <form class="form-horizontal" role="form" action="subjindex1.php" onsubmit="return validateAll()" method="post">
            <div class="well">
<!--Section One-->
                
                
        
  
                
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Select Major</label>
           <div class="col-sm-8">
                <select class="form-control" name="select major" id="input-department" temp="Please select the Select major" onblur="validator1(this)">
                <option value="Select">Select</option>
                <option value="ENGG">Engineering</option>
                <option value="BMS">BMS</option>
                <option value="HM">Hotel Management</option>
                <option value="BMM">BMM</option>
                <option value="Marine">Marine</option>
                <option value="None">None</option>
                </select><span id="department" style="color:#C00;"></span>
            </div>
        </div>
		<div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Department</label>
           <div class="col-sm-8">
                <select class="form-control" name="department" id="input-department" temp="Please select the department" onblur="validator1(this)">
                <option value="Select">Select</option>
                <option value="Computer">Computer</option>
                <option value="IT">Information technology</option>
                <option value="Mechanical">Mechanical</option>
                <option value="Extc">EXTC</option>
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
			<input type="radio" ng-switch="myVar" name="sem" id="sem7" value="sem7" ><label for="sem7">Semester 7</label></div>
			
			


				<div class="radio radio-info radio-inline">
			<input type="radio" ng-switch="myVar" name="sem" id="sem8" value="sem8" ><label for="sem8">Semester 8</label></div>

</div>
</div>          <span id="discipline" style="color:#C00;"></span>
            </div>
			
			
	 <center><a href="selsubject.php" class="btn btn-info" role="button">Submit</a></center>
	 

		  
            
      
    </div>  
 </div>
</div>


        <!-- End of the main content -->
        
        
<div class="wrapper row10"> 
      <div style="margin-top:40px;" class="lineBlack">
            <div class="container">
                <div class="row downLine">
                    <div class="col-md-12 text-right">
                                          <div class="col-md-6 text-left copy">
                            <p>Copyright &copy; 2014 Build Your Brand. All Rights Reserved.</p>
                        </div>
                        <div class="col-md-6 text-right dm">
                           <div class="col-md-10">
                                <div class="navmenu"style="text-align: center;">
                                    <ul id="menu">
                                        <li><p a href="../newindex.php">Home</p></li>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>


