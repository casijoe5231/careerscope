<?php
    session_start();
    if(isset($_SESSION['user']))
    {
        header('location:index.php');
        exit();
    }

    include '../includes/connection1.php';
    $discipline = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_GET['discipline']);
    $institute = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_GET['institute']);
    $_SESSION['discipline']=$discipline;
    $_SESSION['institute']=$institute;
    echo $discipline;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
<!-- Favicon -->
    <link href="images/favicon.ico" rel="shortcut icon"/>
	
    <title>BYB | Administrator Menu </title>
      
<!--  CSS  -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link rel='stylesheet' id='camera-css'  href='../css/camera.css' type='text/css' media='all'>
    <link rel="stylesheet" type="text/css" href="../css/carousel.css">
    <link rel="stylesheet" type="text/css" href="../css/slicknav.css">
    <link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main
    stylesheet"charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet' type='text/css'>
      
<!--  JS  -->
    <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="../js/jquery.mobile.customized.min.js"></script>
    <script type="text/javascript" src="../js/jquery.easing.1.3.js"></script> 
    <script type="text/javascript" src="../js/camera.min.js"></script>
    <script type="text/javascript" src="../js/myscript.js"></script>
    <script src="../js/sorting.js" type="text/javascript"></script>
    <script src="../js/jquery.isotope.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js"></script>
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

       <script src="../js/jquery.min.js"></script>
  <script src="../js/date.js"></script>
  <script src="../js/jquery.datePicker.js"></script>
  <script type="text/javascript" src="countries.js"></script>
  <script>
  $(function()
{
    $('#datepicker').datePicker({startDate: '01/01/1970',
            endDate: (new Date()).asString()})
    
});
</script>
<script type="text/javascript" src="validator8.js" ></script>      
    </head>
<body>
    <!--header-->
<div class="mast">
<div class="container">
        <div class="row">
            <div class="logo col-md-1">
                <div>
                    <a href="#">
                        <img src="../images/byblogo.png" width="90" height="90">
                    </a>
                </div>
            </div>
            <div class="col-md-11">
                <div class="mast-nav" style="text-align: center;">
                    <ul id="menu" style="color: red;" >
                        <li><a href="#home">Home</a>
                        </li>
                        <li><a href="EP.html" target="blank">Link1</a>
                        </li>
                        <li><a href="Emotional_Quotient.html" target="blank">Link2</a>
                        </li>
                        <li><a href="" target="blank">Link3</a>
                        </li>
                        <li><a href="Self_Mgmt_Skills.html" target="blank">Link4</a>
                        </li>
                        <li><a href="" target="blank">Link5</a>
                        </li>
                        <li><a href="" target="blank">Link6</a>
                        </li>
                        <li><a href="#" target="blank">Dropdown</a>
                        </li>
                        <li><a class="btn btn-default btn-sm" data-toggle="modal" href="#myModal">Login</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div> 
</div>
   

    <div class="container">
        <div class="well" style="margin-top:120px;">
            <h2>Please fill in the following information</h2>
            <p></p>
            
            <form class="form-horizontal"  action="sreg.php" method="post" onsubmit="return validateAll()" enctype="multipart/form-data">
            <div class="well">
            
            <!--Section One-->
                <h3>Section I <small> Personal Information </small></h3>
                
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="name" id="input-name" autofocus temp="Please enter the name." onblur="validate(this);" ><span id="name" style="color:#C00;"></span>
            </div>
        </div>
            
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">E-mail</label>
            <div class="col-sm-5">
                <input type="text" class="text2 form-control" name="email" id="input-email" placeholder="user@example.com" temp="Enter valid email ID" onblur="emailValidator(this)"/><br>
               <span id="email" style="color:#C00;"></span>
            </div>
        </div>
            
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Mobile</label>
            <div class="col-sm-5"><input type="text" class="text2 form-control" name="phone" id="input-number" placeholder="Should be 10 digits" temp="Enter valid phone number"  onblur="numberValidator(this)"/><br>
                <span id="phone" style="color:#C00;"></span></span>
            </div>
        </div>
            
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Date of Birth</label>
            <div class="col-sm-5"><input type="text" name="date" id="datepicker" class="date" style='width:50%;' temp="Please enter date." onblur="validate1(this)">
                
                <span id="date" style="color:#C00;"></span>
            </div>
        </div>
                
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Gender</label>
           <div class="col-sm-5">
               <select name="gender" id="input-gender" temp="Please select the gender" onblur="validator(this)">
                <option value="Select">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>

               <span id="gender" style="color:#C00;"></span>
                </select>
            </div>
        </div>            
            
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-5">
                <textarea name='address' id='input-address'  class='text2 form-control' temp="Please enter address." onblur="validate2(this)"></textarea>
            </div>
        </div>
        

         <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Country</label>
            <div class="col-sm-5">
               <select onchange="print_state('stateDrop',this.selectedIndex);" id="country"></select>
            </div>
        </div>

        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">State</label>
           <div class="col-sm-5">
                <select name ="state" id ="stateDrop"  temp="Please select the state" onblur="validator1(this)"></select>
                <script language="javascript">print_country("country");</script>    
                <span id="state" style="color:#C00;"></span>
            </div>
        </div>      

        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">City</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="city" placeholder="City"><span id="city" style="color:#C00;"></span>
            </div>
        </div>
                
          
                
        <!-- <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Category</label>
           <div class="col-sm-5">
                <select name="category" id="input-category" temp="Please select the category" onblur="validator4(this)">
                <option value="Select">Select</option>
                <option value="Open">Open</option>
                <option value="SC/ST">SC/ST</option>
                <option value="OBC">OBC</option>
                </select><span id="category" style="color:#C00;"></span>
            </div>
        </div> -->
                
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Discipline</label>
           <div class="col-sm-5">
                <?php echo'<input type="text" class="form-control" value='.$discipline.' readonly>';?>
            </div>
        </div> 
                
     <!--  <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Minority</label>
           <div class="col-sm-5">
                <select name="minority" id="input-minority" temp="Please select the minority" onblur="validator5(this)">
                <option value="Select">Select</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                </select>
<span id="minority" style="color:#C00;"></span>
            </div>
        </div> -->        
                
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Branch</label>
           <div class="col-sm-5">
                <select name="branch" id="input-branch" temp="Please select current year of branch" onblur="validator3(this)">
                <option value="Select">Select</option>
                <?php
                    if ($_GET['discipline']=="Engineering") {
                        echo'<option value="Computer">Computer</option>
                <option value="EXTC">EXTC</option>
                <option value="Mechanical">Mechanical</option>
                <option value="IT">IT</option>
                <option value="None">None</option>';
                    }
                    elseif ($_GET['discipline']=="Management") {
                        echo '<option value="mms">MMS</option>
                        <option value="hr">HR</option>
                        <option value="finance">Finance</option>
                        <option value="marketing">Marketing</option>
                        <option value="it">IT</option>';
                    }
                ?>
                
                </select><span id="branch" style="color:#C00;"></span>
            </div>
        </div> 
                
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Date of enrollment</label>
            <div class="col-sm-5">
               <?php echo'<input type="text" class="form-control" value='.date("d/m/y").' readonly>';?>
            </div>
        </div>        
                
    </div>     
                
<!--Section 2-->
            
            <div class="well">
                <h3>Section II <small>Account Details</small></h3>
                
        <div class="form-group">
                <label for="sec2" class="col-sm-2 control-label">Enter Password</label>
            <div class="col-sm-5">
                <input type="password" class="text2 form-control" name="password" id="pass-one" temp="Enter password" onblur="lengthValidate(this,'Password',8,16)"/>
                <span id="password" style="color:#C00;">
            </div>
        </div>
                
        <div class="form-group">
                <label for="sec2" class="col-sm-2 control-label">Confirm Password</label>
            <div class="col-sm-5">
                <input type="password" class="text2 form-control" name="repassword" id="input-repassword" onblur="passValidate(this)"/>
                <span id="repassword" style="color:#C00;"></span>
            </div>
        </div>        
            
       <!-- <div class="form-group">
           <label for="sec2" class="col-sm-2 control-label">Attach ID proof <br> (only .doc, .pdf, .docx format supported)</label> 
            <input type="file" name="file" id="input-file" style='padding:2px;border:0px;width:auto;'>
        </div>    -->
                
      <!--<div class="form-group">
                <img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br>
                <label for='message'>Enter the code above here :</label><br>
                <input type="text" id="6_letters_code" name="6_letters_code"><br>
                <small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
        </div>-->
        <div class="form-group">
                <label for="sec2" class="col-sm-2 control-label">Already Registered?</label><a>Click here </a>
                
        </div>        
          
                <center><button class="btn btn-info btn-md" type="submit" style="margin-bottom:10px;">Save details</button></center>
                
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