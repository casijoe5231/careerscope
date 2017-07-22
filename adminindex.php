<?php
    session_start();
    if(isset($_SESSION['admin']))
    {
    include 'includes/connection1.php';
    $emails=$_SESSION['admin'][0];
    $sql5="select * from masteruser where email='$emails'";
    $res5=mysqli_query($GLOBALS["___mysqli_ston"], $sql5);
    while($row5=mysqli_fetch_array($res5))
    {
      $_SESSION['institute']=$row5['institute'];
    }
    
    date_default_timezone_set('Asia/Calcutta');
    $datetime = date("F j, Y, g:i a");
    $timesql = date("Y-m-d H:i:s"); 
    $sql="insert into activity(email,menu_accessed,timesql) values('$emails','Admin Home Page','$timesql')";
    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
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
                        <li class="active"><a href="adminindex.php">Add New Staff</a>
                        </li>
                        <li><a href="sdetails.php">Existing Staff Details</a>
                        </li>
                        <li><a href="modify.php">Modify Staff</a>
                        </li>
                        <li><a href="manageroles.php">Manage Roles</a>
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
            <h5>Welcome <?php echo $_SESSION['admin'][1]; ?>,</h5>
        </div>
        <div class="col-sm-8">
            
        </div>
        <div class="col-sm-1">
            <a class="btn btn-default btn-block" href="logout.php">Logout</a>
        </div>
        
    </div>
</div>
    


        <div class="" >
            <h2>Administrator Menu</h2>
            <p>Add new Staff</p>
            
            <form class="form-horizontal" role="form" action="staffreg.php" onsubmit="return validateAll()" method="post">
            <div class="well">
<!--Section One-->
                
                
        <div class="form-group">
                <label for="input-name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="input-name" placeholder="Name" name="name"  temp="Please enter the name." onblur="validate(this);" >
            <span id="name" style="color:#C00;"></span></div>
        </div>
            
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">E-mail</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="email" id="input-email" placeholder="user@example.com"  temp="Enter valid email ID" onblur="emailValidator(this)">
            <span id="email" style="color:#C00;"></span></div>
        </div>

        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" name="pass" id="input-pass" placeholder="Password"  temp="Enter a valid password" onblur="validate(this);">
            <span id="pass" style="color:#C00;"></span></div>
        </div>
            
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Mobile Number</label>
            <div class="col-sm-5">
                <input type="text" class="form-control"  name="phone" id="input-number"  placeholder="Should be 10 digits"  temp="Enter valid phone number"  onblur="numberValidator(this)">
            <span id="phone" style="color:#C00;"></span></div>
        </div>
            
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Select Discipline</label>
           <div class="col-sm-5">
                <select class="form-control"  name="discipline" id="input-discipline" temp="Please select the discipline" onblur="validator(this)">
                      <option value="Select">Select</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Management">Management</option>
                    <option value="Pharmacy">Pharmacy</option>
                    <option value="None">None</option>
                </select>
                <span id="discipline" style="color:#C00;"></span>
            </div>
        </div>
                
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Department</label>
           <div class="col-sm-5">
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
                
    <div class="form-group">
        <label for="sec1" class="col-sm-2 control-label">Set Role</label>
    <div class="col-sm-2 col-sm-10">
    <!-- <div class="checkbox"> 
        <label><input type="checkbox" class="role" name="Director" id="Director" value="Director">
                <input type="hidden" name="director1" value="Director"> Director</label>
     </div> -->
       <!-- <div class="checkbox"> 
        <label><input type="checkbox" class="role" name="Principal" id="Principal" value="Principal">
                <input type="hidden" name="principal1" value="Principal"> Principal</label>
     </div> -->
        <div class="checkbox"> 
        <label><input type="checkbox" class="role" name="HOD" id="HOD" value="HOD">
                <input type="hidden" name="hod1" value="HOD"> HOD</label>
     </div>
      <!--  <div class="checkbox"> 
        <label>
                <input type="checkbox" class="role" name="TPO" id="TPO" value="TPO">
                <input type="hidden" name="tpo1" value="TPO">TPO</label>
     </div> -->
    <!--  <div class="checkbox"> 
        <label>
                <input type="checkbox" class="role" name="Professor" id="Professor" value="Professor">
                <input type="hidden" name="professor1" value="Professor">Professor</label>
     </div>
        <div class="checkbox"> 
        <label>
                <input type="checkbox" class="role" name="Mentor" id="Mentor" value="Mentor">
                <input type="hidden" name="mentor1" value="Lecturer">Mentor</label>
     </div>-->
    <!--    <div class="checkbox"> 
        <label>
                <input type="checkbox" class="role" name="TestManager" id="TestManager" value="TestManager"> 
                <input type="hidden" name="testmgr1" value="TestManager"> Test Manager</label>
     </div> -->
       <div class="checkbox"> 
        <label>
                <input type="checkbox" class="role" name="Lecturer" id="Lecturer" value="Lecturer">
                <input type="hidden" name="lecturer1" value="Lecturer">Mentor</label>
     </div><!--
        <div class="checkbox"> 
        <label>
                <input type="checkbox" class="role" name="SubjectTeacher" id="SubjectTeacher" value="SubjectTeacher"> 
                <input type="hidden" name="subjteacher1" value="SubjectTeacher">Student</label>
     </div>-->
    <span id="role" style="color:#C00;"></span>
    </div>
  </div>
            
        <center><button class="btn btn-info btn-md" type="submit" style="margin-bottom:10px;">Approve and send email</button></center>
                
    </div>  
 </div>
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
?>