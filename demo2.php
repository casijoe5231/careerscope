<?php
    
	include 'includes/headerfooter.php';
    session_start();

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }

    if(!isset($_SESSION['user'])){
        header("location:login.php");
    }
	
    if($_SESSION['usertype']>=9 && $_SESSION['usertype']<=14)
	
		//echo "usertype:".$_SESSION['usertype'];
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
	
    <title>EYB | Administrator Menu </title>
      
<!--  CSS  -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
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
<style>
.headerLine{
    position: relative;
    width: 102%;
    
    height:22%;
    background: url(images/bgTop.jpg) center center no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
</style>
<!--header starts-->
<div style="margin-bottom:20px;" id="home">
            <div class="headerLine">
                <div id="menuF" class="default" style="margin-bottom:25px;">
                    <div class="container">
                        <div class="row">
                            <div class="logo col-md-2">
                                <div>
                                    <a href="#">
                                        <img src="images/byblogo.png" width="120" height="120">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-10">
                                    <div class="navmenu"style="text-align: center;">
                                        <ul id="menu">
                                        </ul>
                                   </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--   /Header     -->
   

    <div class="container">

    <div style="padding:10px;" class="panel panel-default">
    <div class="row">
        <div class="col-sm-3">
            <h5>Welcome <?php echo $_SESSION['user'][1]; ?>,</h5>
        </div>
        <div class="col-sm-7">
            
        </div>
		<div class="col-sm-1">
                    <a class="btn btn-default btn-block" href="newindex.php"><span class="glyphicon glyphicon-home"></span></a>
		</div>
        <div class="col-sm-1">
            <a class="btn btn-default btn-block" href="logout.php">Logout</a>
        </div>
        
    </div>
</div>


<div class="col-sm-12" class="container">
  
  <div class="panel-group" id="accordion">
    <div class="panel panel-default"><!-- first skill-->
      <div class="panel-heading">
        <h4 class="panel-title">
          <a style="font:icon" data-toggle="collapse" data-parent="#accordion" href="#collapse1">Assign Subject</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
		
		
		
            <h2>HOD Menu</h2>
            <p>Add new Subject</p>
            
            <form class="form-horizontal" role="form" action="demo1.php" onsubmit="return validateAll()" method="post">
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
		   <label for="sec1" class="col-sm-2 control-label">Select semester</label>
           <div class="col-sm-8">
		   
			<input type="radio" name="sem" value="sem1" >semester1
			<input type="radio" name="sem" value="sem2" >semester2
			 </div>
</div>
 <span id="discipline" style="color:#C00;"></span>
		    <div class="resources2" style=" display: none;">
		   <label for="sec1" class="col-sm-2 control-label">Select semester</label>
           <div class="col-sm-8">
			
			<input type="radio" name="sem" value="sem3" >semester3
			<input type="radio" name="sem" value="sem4" >semester4


			</div>
</div>
                <span id="discipline" style="color:#C00;"></span>
                
<div class="resources3" style=" display: none;">
		   <label for="sec1" class="col-sm-2 control-label">Select semester</label>
           <div class="col-sm-8">
						
                    
			<input type="radio" name="sem" value="sem5" >semester5
			<input type="radio" name="sem" value="sem6" >semester6
 </div>
</div> <span id="discipline" style="color:#C00;"></span>

<div class="resources4" style=" display: none;">
		   <label for="sec1" class="col-sm-2 control-label">Select semester</label>
           <div class="col-sm-8">
					
                  
			<input type="radio" name="sem" value="sem7" >semester7
			<input type="radio" name="sem" value="sem8" >semester8
</div>
</div>          <span id="discipline" style="color:#C00;"></span>
            </div>
        </div>
            
        <center><button class="btn btn-info btn-md" type="submit" name="submit" id="submit" style="margin-bottom:10px;">Assign subject</button></center>
                
    </div>  
 </div>
</div>
</form>

		</div>
      </div>
	  
   <!-- first skill-->
    <div class="panel panel-default"><!-- 2 skill-->
      <div class="panel-heading">
        <h4 class="panel-title">
          <a style="font:icon" data-toggle="collapse" data-parent="#accordion" href="#collapse2">Assign Soft-skills</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
		
		        <table class="table table-hover" id="details"  style="margin-top:20px;margin-bottom:20px;">
        <thead>
        <tr>
        <th><b>lecturer Name</b></th>
        <th><b>Change task</b></th>
        <th><b>Assign</b></th>
        </tr>
        </thead>
        <tbody>
        <?php
		include 'includes/connection1.php';
		$sql="select * from masteruser where role='Staff' and institute='$_SESSION[institute]'";
        $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
        while($row=mysqli_fetch_array($res))
        {
        $sql1="select * from istaff where email='$row[email]' and  is_lecturer=1";
         $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
        while($row1=mysqli_fetch_array($res1))
        {
        ?>
        <tr><td><?php echo $row['name'] ?></td>
        
        <form name="trial" method="GET" action="demo2.php" >
        
		<td>
		<div class="col-sm-8">
			<select class="form-control"  name="softskill" id="softskill" temp="Please select the year" onblur="validator(this)">

					<option value="Select">Select</option>
                    <option value="Leadership Skills">Leadership Skills</option>
                    <option value="Time Management">Time Management</option>
					<option value="Stress Management">Stress Management</option>
			
					<option value="Communication Skills">Communication Skills</option>
					<option value="Change Management">Change Management</option>
					<option value="Image Management">Image Management</option>
			
			</select> </div>
</div>
		</td>
		
        <td>
        <input type="hidden" name="email1" value="<?php echo $row['email']; ?>">
        <input type='submit' name='submit1' id='submit1' value='Assign' style='cursor:pointer;'>
        </td>
        </form>
        </tr>
        <?php
        }
        }
        ?>
        </tbody>
        </table>
             
    </div>
       
		
		
		
		</div>
      </div>
	 
    <!-- 2 skill-->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a style="font:icon" data-toggle="collapse" data-parent="#accordion" href="#collapse3">Assign Aptitude</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">

	        <table class="table table-hover" id="details"  style="margin-top:20px;margin-bottom:20px;">
        <thead>
        <tr>
        <th><b>lecturer Name</b></th>
        <th><b>Change task</b></th>
        <th><b>Assign</b></th>
        </tr>
        </thead>
        <tbody>
        <?php
		include 'includes/connection1.php';
		$sql="select * from masteruser where role='Staff' and institute='$_SESSION[institute]'";
        $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
        while($row=mysqli_fetch_array($res))
        {
        $sql1="select * from istaff where email='$row[email]' and  is_lecturer=1";
         $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
        while($row1=mysqli_fetch_array($res1))
        {
        ?>
        <tr><td><?php echo $row['name'] ?></td>
        
        <form name="trial" method="GET" action="demo2.php">
        
		<td>
		<div class="col-sm-8">
			<select class="form-control"  name="aptitude" id="input-year" temp="Please select the year" onblur="validator(this)">

					<option value="Select">Select</option>
                    <option value="Quantitative Aptitude">Quantitative Aptitude</option>
                    <option value="Verbal Reasoning/grammar">Verbal Reasoning/grammar</option>
                    <option value="Verbal Reasoning/vocabulary">Verbal Reasoning/vocabulary</option>
                    <option value="Analytical Reasoning/directional">Analytical Reasoning/directional</option>
                    <option value="Analytical Reasoning/relationship">Analytical Reasoning/relationship</option>
                    <option value="Analytical Reasoning/Arrange(letters/numbers)">Analytical Reasoning/Arrange(letters/numbers)</option>
                    
					<option value="Judgement Tests">Judgement Tests</option>
					<option value="Data Interpretation">Data Interpretation</option>
					<option value="Coding Decoding">Coding Decoding</option>
					<option value="Logical Reasoning">Logical Reasoning</option>
					<option value="Technical Tests/Data structure">Technical Tests/Data structure</option>
					<option value="Technical Tests/programming">Technical Tests/programming</option>
					<option value="Technical Tests/networking">Technical Tests/networking</option>
					<option value="Technical Tests/database">Technical Tests/database</option>
					<option value="Intelligence Test">Intelligence Test</option>
					
                
			</select> </div>
</div>
		</td>
		
        <td>
        <input type="hidden" name="email1" value="<?php echo $row['email']; ?>">
        <input type='submit' name='submit2' id='submit2' value='Assign' style='cursor:pointer;'>
        </td>
        </form>
        </tr>
        <?php
        }
        }
        ?>
        </tbody>
        </table>
             
    </div>
	
	<?php
 
        if(isset($_GET['submit1']))
        {
		 //session_start();
		 include 'includes/connection1.php';
		
				$email=$_GET['email1'];
				$softskill = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_GET['softskill']);
				$datetime = date("F j, Y, g:i a");
				$timesql = date("Y-m-d H:i:s");
			
				$sql1="select distinct(softskill) from asubhod where email='$email'";
				$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1)or die("query not executed"); 
					while($row = mysqli_fetch_array($res1))
						{			  
						echo $sub=$row['softskill'];
						}
                           
				$sql="update asubhod set softskill='$softskill',time='$timesql' where email='$email'";
                 $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die('error'.mysqli_error($GLOBALS["___mysqli_ston"]));
                            
							
                      echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('Modification done successfully!');
    window.location.href='demo2.php';</SCRIPT>";
         
                          
      
  }     

		 
 ?>
	
        <?php
		
		
	 if(isset($_GET['submit2']))
        {
		include 'includes/connection1.php';
		
		   $email=$_GET['email1'];
			$aptitude = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_GET['aptitude']);
				$datetime = date("F j, Y, g:i a");
				$timesql = date("Y-m-d H:i:s");
			
		 $sql3="select aptitude from asubhod where email='$email'";
              $res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3)or die("query not executed"); 
while($row3 = mysqli_fetch_array($res3))
{			  
			echo  $sub3=$row3['aptitude'];
			  }
                         
							echo $sql4="update asubhod set aptitude='$aptitude',time='$timesql' where email='$email'";
                             $res4=mysqli_query($GLOBALS["___mysqli_ston"], $sql4)or die("query not executed");
                            
                      echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('Modification done successfully!');
    window.location.href='demo2.php';</SCRIPT>";
         
                          
      
  }     
?>



		
		
		</div>
   
	
 </div>
 <!--Skill3-->
  <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Assign Goal</a>
      </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse">
      <div class="panel-body">
	  <h2>Assign New Goal</h2>
            
			<!-- -->
			 <form class="form-horizontal" role="form" action="http://localhost/careerscope/Sdp/goal_assign.php" onsubmit="return validateAll()" method="post">
            <div class="well">
<!--Section One-->
                
                
        
  
                
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Teachers</label>
			<?php
            
            $mysqlserver="localhost";
            $mysqlusername="root";
            $mysqlpassword="oracle";
            $link=($GLOBALS["___mysqli_ston"] = mysqli_connect(localhost,  $mysqlusername,  $mysqlpassword)) or die ("Error connecting to mysql server: ".mysqli_error($GLOBALS["___mysqli_ston"]));
            
            $dbname = 'careerscope';
            mysqli_select_db( $link, $dbname) or die ("Error selecting specified database on mysql server: ".mysqli_error($GLOBALS["___mysqli_ston"]));
			?>
           <div class="col-sm-9">
                <select class="form-control" name="teacher" id="input-teacher" temp="Please select the teacher" onblur="validator1(this)">
				<option value="staff_name"> -----------ALL----------- </option> 
				<?php
  
                 $dd_res=mysqli_query($GLOBALS["___mysqli_ston"], "Select staff_name from istaff");
                 while($r=mysqli_fetch_row($dd_res))
                 { 
                       echo "<option value='$r[0]'> $r[0] </option>";
                 }
				?>
              </select>
               <!-- <option value="Select">Select</option>
                <option value="Computer">Computer</option>
                <option value="IT">IT - Engineering</option>
                <option value="Mechanical">Mechanical</option>
                <option value="IT - mms">IT - MMS</option>
                <option value="HR">HR</option>
                <option value="Finance">Finance</option>
                <option value="Market">Market</option>
                <option value="None">None</option> -->
            </div>
        </div>        
           
		    <div class="row-sm-9">
		             
        <label class="control-label col-sm-2" for="pwd">Goal Type Name:</label>
      <div class="col-sm-9">          
        <input type="text" class="form-control" name="goal_name" id="Goal_Title" placeholder="Enter Goal_Title" required="">
      </div>
		  
		 
        </div>
             <br>
			 <div>
        <center><button class="btn btn-info btn-md" type="submit" name="submit" id="submit" style="margin-top:20px;">Assign Goal</button></center>
                
    </div>  
 </div>
</div>
</form>
			<!-- -->
	  </div>
    </div>
  </div>
  
  
</div> 
 <!--skill 3 ends-->
  </div> 
</div>

<!-- form -->
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
</body>
</html>