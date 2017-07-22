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
	$emaill=$_SESSION['user'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	
	// Tracking the user
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Academic Brand Registration','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
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

        <script language="Javascript">
function go()
{
document.getElementById("div2").style.display = 'block';
document.getElementById("div1").style.display = 'none';
}

function go1()
{
document.getElementById("div1").style.display = 'block';
document.getElementById("div2").style.display = 'none';
}

function first()
{
document.getElementById("div3").style.display = 'block';
document.getElementById("div4").style.display = 'none';
document.getElementById("div5").style.display = 'none';
document.getElementById("div6").style.display = 'none';
document.getElementById("div7").style.display = 'none';
}

function second()
{
document.getElementById("div3").style.display = 'none';
document.getElementById("div4").style.display = 'block';
document.getElementById("div5").style.display = 'none';
document.getElementById("div6").style.display = 'none';
document.getElementById("div7").style.display = 'none';
}

function third()
{
document.getElementById("div3").style.display = 'none';
document.getElementById("div4").style.display = 'none';
document.getElementById("div5").style.display = 'block';
document.getElementById("div6").style.display = 'none';
document.getElementById("div7").style.display = 'none';
}

function fourth()
{
document.getElementById("div3").style.display = 'none';
document.getElementById("div4").style.display = 'none';
document.getElementById("div5").style.display = 'none';
document.getElementById("div6").style.display = 'block';
document.getElementById("div7").style.display = 'none';
}

function fifth()
{
document.getElementById("div3").style.display = 'none';
document.getElementById("div4").style.display = 'none';
document.getElementById("div5").style.display = 'none';
document.getElementById("div6").style.display = 'none';
document.getElementById("div7").style.display = 'block';
}

function gradvlad(e){
	alert(e.value);
if (e.value=='First Year') {
	first();
    alert(e.value);
	}
else if (e.value=='Second Year') {
	second();
	}
else	if (e.value=='Third Year') {
	third();
	}
else if (e.value=='Fourth Year') {
	fourth();
	}
else if (e.value=='Fifth Year') {
	fifth();
	}
}

function validateForm(){
if(document.getElementById('category').value=='')
{
alert("Please select an Item.");
return false;
}
return true;
}
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
                                            <li><a href="../newindex.php">Home</a></li>
                                            <li><a href="register.php">Academic Brand</a></li>
                                            <li><a href="test_reports.php">Technical Brand</a></li>
                                            <li><a href="events.php">Technical Brand</a></li>
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
        <h1>E-branding Registration</h1>
        
        <div class="row">
            <div class="col-sm-12">
            
                <!--content goes here-->
                <div class="row">
    

                <div class="well" style="margin-top:20px;">
            <p></p>
            <?php
  $email=$_SESSION['user'][0];
  $sql1="select * from istudent where email='$email'";
  $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
  while($row1=mysqli_fetch_array($res1))
{
$status=$row1['status'];
if($status==0)
{
?><form class="form-horizontal" role="form"  action="acadportfolio.php" method="post" enctype="multipart/form-data">
<?php
  $sql="select * from masteruser where email='$email'";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  while($row=mysqli_fetch_array($res))
{
          
?> <div class="well">
            <!--Section One-->
                <h3>Personal Details</h3>
          
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-5">
                <input class="form-control" type="text" value="<?php echo $row['name']; ?>" readonly>
            </div>
        </div>
          
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">E-mail</label>
            <div class="col-sm-5">
                <input class="form-control" type="text" value="<?php echo $row['email']; ?>" readonly>
            </div>
        </div>
                
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Date of enrollment</label>
            <div class="col-sm-5">
                <input class="form-control" type="text" value="<?php echo date("d/m/Y") ?>" readonly>
            </div>
        </div>     
                
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Discipline</label>
            <div class="col-sm-5">
                <input class="form-control" type="text" value="<?php echo $row['discipline']; ?>" readonly>
            </div>
        </div>        
        
        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Institute</label>
            <div class="col-sm-5">
                <input class="form-control" type="text" value="<?php echo $row['institute']; ?>" readonly>
            </div>
        </div>        
               
        </div>       
      
<!--Section 2-->
<!--
<td><textarea ></textarea><br><label><span id="school1" style="color:#C00;"></span></label></td>
<td><textarea ></textarea><br><label><span id="board1" style="color:#C00;"></span></label></td>
<td><input /><br><label><span id="specialisation1" style="color:#C00;"></span></label></td>
<td><input /><br><label><span id="total1" style="color:#C00;"></span></label></td>
<td><input /><br><label><span id="outof1" style="color:#C00;"></span></label></td>
<td><input /><br><label><span id="percent1" style="color:#C00;"></span></label></td>
<td><input  /><br><label><span id="pass1" style="color:#C00;"></span></label></td>
				
-->
            
            <div class="well">
                <h3> Educational Qualifications </h3>
                <span id="school1" style="color:#C00;"></span>
                <span id="board1" style="color:#C00;"></span>
                <span id="specialisation1" style="color:#C00;"></span>
                <span id="total1" style="color:#C00;"></span>
                <span id="outof1" style="color:#C00;"></span>
                <span id="percent1" style="color:#C00;"></span>
                <span id="pass1" style="color:#C00;"></span>

        <div class="form-group">
                <label for="input-school1" class="col-sm-2 control-label">School/Institute with location</label>
            <div class="col-sm-5">
                <input name='school1' id='input-school1'  class='text2 form-control' temp="Please enter school/institute." onblur="validate34(this)">
            </div>
        </div>    
                
        <div class="form-group">
                <label for="input-board1" class="col-sm-2 control-label">Board/University </label>
            <div class="col-sm-2">
                <input name='board1' id='input-board1'  class='text2 form-control' temp="Please enter board/university." onblur="validate35(this)">
            </div>
        </div>
                
        <div class="form-group">
                <label for="input-stream1" class="col-sm-2 control-label">Stream</label>
            <div class="col-sm-2">
                <input  type="text" class="text2 form-control" name="stream1" id="input-stream1" temp="Please enter the stream." onblur="validate36(this)" >
            </div>
        </div>     
                
        <div class="form-group">
                <label for="input-total1" class="col-sm-2 control-label">Total</label>
            <div class="col-sm-1">
                <input type="text" class="text2 form-control" name="total1" id="input-total1" temp="Please enter the total marks." onblur="numberValidator13(this)" >
            </div>
        </div>
                
        <div class="form-group">
                <label for="input-outof1" class="col-sm-2 control-label">Out of</label>
            <div class="col-sm-1">
                <input type="text" class="text2 form-control" name="outof1" id="input-outof1" temp="Please enter the out of marks." onblur="numberValidator13(this)" >
            </div>
        </div>    
                
        <div class="form-group">
                <label for="input-percent1" class="col-sm-2 control-label">Percentage/CGPA</label>
            <div class="col-sm-1">
                <input type="text" class="text2 form-control" name="percent1" id="input-percent1" temp="Please enter the percentage." onblur="numberValidator13(this)" >
            </div>
        </div>
                
        <div class="form-group">
                <label for="input-pass1" class="col-sm-2 control-label">Year of Passing2</label>
            <div class="col-sm-1">
                <input type="text" class="text2 form-control" name="pass1" id="input-pass1" temp="Please enter the year of passing." onblur="numberValidator14(this)" >
            </div>
        </div>  
        
<!--diploma
<td>
				<input type="radio" name="diploma" id="Yes" value="Yes" onclick="go()">Yes
				<input type="radio" name="diploma" id="No" value="No" onclick="go1()">No<br>
				<label><span id="diploma" style="color:#C00;"></span></label><br>
				</td>
				</tr>
				</table> 
				<div >
				<table  border="0" width="auto">
				<tr>
				<td><span style='color:red;'>*</span><strong>HSC/equivalent</strong></td>
				<td><textarea></textarea><br><label></span></label></td>
				<td><textarea></textarea><br><label></span></label></td>
				<td><input/><br><label></label></td>
				<td><input/><br><label></label></td>
				<td><input  /><br><label></label></td>
				<td><input  /><br><label></label></td>
				<td><input   /><br><label></span></label></td>
				</tr>
				<tr>
				<td><span style='color:red;'>*</span><strong>CET score</strong></td>
				<td><input  type="text" class="text2 form-control" name="cet" id="input-cet" temp="Please enter the cet score." onblur="numberValidator12(this)" /><br><label><span id="cet" style="color:#C00;"></span></label></td>
				</tr>
				</table>
				</div>
				<div id="div2" name="div2" style="display:none;">
				<table border="0" width="auto">
				<tr>
				<td><span style='color:red;'>*</span><strong>Diploma</strong></td>
				<td><textarea></textarea><br><label></label></td>
				<td><textarea ></textarea><br><label></label></td>
				<td><input  type="text" class="text2 form-control" name="stream3" id="input-stream3" temp="Please enter the stream." onblur="validate39(this)" /><br><label><span id="stream3" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2 form-control" name="total3" id="input-total3" temp="Please enter the total marks." onblur="numberValidator13(this)" /><br><label><span id="total3" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2 form-control" name="outof3" id="input-outof3" temp="Please enter the out of marks." onblur="numberValidator13(this)" /><br><label><span id="outof3" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2 form-control" name="percent3" id="input-percent3" temp="Please enter the percentage." onblur="numberValidator15(this)" /><br><label><span id="percent3" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2 form-control" name="pass3" id="input-pass3" temp="Please enter the year of passing." onblur="numberValidator16(this)" /><br><label><span id="pass3" style="color:#C00;"></span></label></td>
				

-->


        <div class="form-group">
                <label for="sec1" class="col-sm-2 control-label">Diploma</label>
            <div class="col-sm-1">
                <input type="radio"   name="diploma" id="Yes" value="Yes" onclick="go()">Yes 
                </div>
            <div class="col-sm-1">
                <input type="radio"   type="radio" name="diploma" id="No" value="No" onclick="go1()">No
            </div>
        </div>        
        
        <div id="div1" name="div1" style="display:none;">
        <span id="school2" style="color:#C00;"></span>
        <span id="board2" style="color:#C00;"></span>
        <span id="stream2" style="color:#C00;"></span>
        <span id="total2" style="color:#C00;"></span>
        <span id="outof2" style="color:#C00;"></span>
        <span id="percent2" style="color:#C00;"></span>
        <span id="pass2" style="color:#C00;"></span>
        	<div class="form-group">
	                <label for="input-school1" class="col-sm-2 control-label">School/Institute with location 1</label>
	            <div class="col-sm-5">
	                <input name='school2' id='input-school2'  class='text2 form-control' temp="Please enter school/institute." onblur="validate31(this)">
	            </div>
	        </div>    
	                
	        <div class="form-group">
	                <label for="input-board1" class="col-sm-2 control-label">Board/University </label>
	            <div class="col-sm-2">
	                <input name='board2' id='input-board2'  class='text2 form-control' temp="Please enter board/university." onblur="validate32(this)">
	            </div>
	        </div>
	                
	        <div class="form-group">
	                <label for="input-stream1" class="col-sm-2 control-label">Stream</label>
	            <div class="col-sm-2">
	                <input    type="text" class="text2 form-control" name="stream2" id="input-stream2" temp="Please enter the stream." onblur="validate33(this)" >
	            </div>
	        </div>     
	                
	        <div class="form-group">
	                <label for="input-total1" class="col-sm-2 control-label">Total</label>
	            <div class="col-sm-1">
	                <input type="text"   type="text" class="text2 form-control" name="total2" id="input-total2" temp="Please enter the total marks." onblur="numberValidator13(this)" >
	            </div>
	        </div>
	                
	        <div class="form-group">
	                <label for="input-outof1" class="col-sm-2 control-label">Out of</label>
	            <div class="col-sm-1">
	                <input type="text" type="text" class="text2 form-control" name="outof2" id="outof2" temp="Please enter the out of marks." onblur="numberValidator13(this)" >
	            </div>
	        </div>    
	                
	        <div class="form-group">
	                <label for="input-percent1" class="col-sm-2 control-label">Percentage/CGPA</label>
	            <div class="col-sm-1">
	                <input type="text" type="text" class="text2 form-control" name="percent2" id="input-percent2" temp="Please enter the percentage." onblur="numberValidator11(this)"  >
	            </div>
	        </div>
	                
	        <div class="form-group">
	                <label for="input-pass1" class="col-sm-2 control-label">Year of Passing2</label>
	            <div class="col-sm-1">
	                <input type="text" type="text" class="text2 form-control" name="pass2" id="input-pass2" temp="Please enter the year of passing." onblur="numberValidator12(this)" >
	            </div>
	        </div>  
        </div>

        <div id="div2" name="div2" style="display:none;">
        <span id="school3" style="color:#C00;"></span>
        <span id="board3" style="color:#C00;"></span>
        <span id="stream3" style="color:#C00;"></span>
		<span id="total3" style="color:#C00;"></span>
		<span id="outof3" style="color:#C00;"></span>
		<span id="percent3" style="color:#C00;"></span>
		<span id="pass3" style="color:#C00;"></span>
        	<div class="form-group">
	                <label for="input-school1" class="col-sm-2 control-label">School/Institute with location 2</label>
	            <div class="col-sm-5">
	                <input  name='school3' id='input-school3'  class='text2 form-control' temp="Please enter school/institute." onblur="validate37(this)">
	            </div>
	        </div>    
	                
	        <div class="form-group">
	                <label for="input-board1" class="col-sm-2 control-label">Board/University </label>
	            <div class="col-sm-2">
	                <input name='board2' name='board3' id='input-board3'  class='text2 form-control' temp="Please enter board/university." onblur="validate38(this)">
	            </div>
	        </div>
	                
	        <div class="form-group">
	                <label for="input-stream1" class="col-sm-2 control-label">Stream</label>
	            <div class="col-sm-2">
	                <input    type="text" class="text2 form-control" name="stream3" id="input-stream3" temp="Please enter the stream." onblur="validate39(this)" >
	            </div>
	        </div>     
	                
	        <div class="form-group">
	                <label for="input-total1" class="col-sm-2 control-label">Total</label>
	            <div class="col-sm-1">
	                <input type="text"   type="text" class="text2 form-control" name="total3" id="input-total3" temp="Please enter the total marks." onblur="numberValidator13(this)" >
	            </div>
	        </div>
	                
	        <div class="form-group">
	                <label for="input-outof1" class="col-sm-2 control-label">Out of</label>
	            <div class="col-sm-1">
	                <input type="text" type="text" class="text2 form-control" name="outof3" id="outof3" temp="Please enter the out of marks." onblur="numberValidator13(this)" >
	            </div>
	        </div>    
	                
	        <div class="form-group">
	                <label for="input-percent1" class="col-sm-2 control-label">Percentage/CGPA</label>
	            <div class="col-sm-1">
	                <input type="text" type="text" class="text2 form-control" name="percent3" id="input-percent3" temp="Please enter the percentage." onblur="numberValidator15(this)"  >
	            </div>
	        </div>
	                
	        <div class="form-group">
	                <label for="input-pass1" class="col-sm-2 control-label">Year of Passing2</label>
	            <div class="col-sm-1">
	                <input type="text" type="text" class="text2 form-control" name="pass3" id="input-pass3" temp="Please enter the year of passing." onblur="numberValidator16(this)" >
	            </div>
	        </div>  
        </div>





        <div class="form-group">
                <label for="sec2" class="col-sm-2 control-label">Current Year Of Gradutaion</label>
           <div class="col-sm-3"><select class="form-control" name="graduation" id="input-graduation" temp="Please select current year of graduation" onblur="gradvlad(this)">
				<option value="Select">Select</option>
				<?php
				if($row['discipline']=='Engineering')
				{
				?>
                <option value="First year" id="First year" onclick="first()">First year</option>
                <option value="Second year" id="Second year" onclick="second()">Second year</option>
				<option value="Third year" id="Third year" onclick="third()">Third year</option>
				<option value="Fourth year" id="Fourth year" onclick="fourth()">Fourth year</option>
				<?php
				}
				else
				{
				?>
				<option value="First year" id="First year" onclick="first()">First year</option>
                <option value="Second year" id="Second year" onclick="second()">Second year</option>
				<option value="Third year" id="Third year" onclick="third()">Third year</option>
				<option value="Fourth year" id="Fourth year" onclick="fourth()">Fourth year</option>
				<option value="Fifth year" id="Fifth year" onclick="fifth()">Fifth year</option>
				<?php
				}
				?>
                </select>
            </div>
        </div>


        <div class="row">
        	

        	<div id="div3" style="display:none;">
				<table border="0" width="auto">
				<tr>
				<td><strong>Academic year</strong></td>
				<td><strong>School/Institute<br>with location</strong></td>
				<td><strong>Board/university</strong></td>
				<td><strong>Specialisation</strong></td>
				<td><strong>Odd sem marks</strong></td>
				<td><strong>Odd sem outof</strong></td>
				<td><strong>Even sem marks</strong></td>
				<td><strong>Even sem outof</strong></td>
				<td><strong>Total marks</strong></td>
				<td><strong>Total outof</strong></td>
				<td><strong>Percentage/CGPA</strong></td>
				<td><strong>Year of passing</strong></td>
				</tr>
				<tr>
				<td><span style='color:red;'>*</span><strong>First year</strong></td>
				<td><textarea name='school4' id='input-school4'  class='text2' temp="Please enter school/institute." onblur="validate28(this)"></textarea><br><label><span id="school4" style="color:#C00;"></span></label></td>
				<td><textarea name='board4' id='input-board4'  class='text2' temp="Please enter board/university." onblur="validate29(this)"></textarea><br><label><span id="board4" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation4" id="input-specialisation4" temp="Please enter the specialisation." onblur="validate30(this)" /><br><label><span id="specialisation4" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddmarks4" id="input-oddmarks4" temp="Please enter the odd sem marks." onblur="numberValidator13(this)" /><br><label><span id="oddmarks4" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddoutof4" id="input-oddoutof4" temp="Please enter the odd sem outof." onblur="numberValidator13(this)" /><br><label><span id="oddoutof4" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenmarks4" id="input-evenmarks4" temp="Please enter the even sem marks." onblur="numberValidator13(this)" /><br><label><span id="evenmarks4" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenoutof4" id="input-evenoutof4" temp="Please enter the even sem outof." onblur="numberValidator13(this)" /><br><label><span id="evenoutof4" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="total4" id="input-total4" temp="Please enter the total marks." onblur="numberValidator13(this)" /><br><label><span id="total4" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="outof4" id="input-outof4" temp="Please enter the out of marks." onblur="numberValidator13(this)" /><br><label><span id="outof4" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="percent4" id="input-percent4" temp="Please enter the percentage." onblur="numberValidator9(this)" /><br><label><span id="percent4" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass4" id="input-pass4" temp="Please enter the year of passing." onblur="numberValidator10(this)" /><br><label><span id="pass4" style="color:#C00;"></span></label></td>
				</tr>
				</table>
				</div>
				<div id="div4" style="display:none;">
				<table border="0" width="auto">
				<tr>
				<td><strong>Academic year</strong></td>
				<td><strong>School/Institute<br>with location</strong></td>
				<td><strong>Board/university</strong></td>
				<td><strong>Specialisation</strong></td>
				<td><strong>Odd sem marks</strong></td>
				<td><strong>Odd sem outof</strong></td>
				<td><strong>Even sem marks</strong></td>
				<td><strong>Even sem outof</strong></td>
				<td><strong>Total marks</strong></td>
				<td><strong>Total outof</strong></td>
				<td><strong>Percentage/CGPA</strong></td>
				<td><strong>Year of passing</strong></td>
				</tr>
				<tr>
				<td><span style='color:red;'>*</span><strong>Second year</strong></td>
				<td><textarea name='school5' id='input-school5'  class='text2' temp="Please enter school/institute." onblur="validate28(this)"></textarea><br><label><span id="school5" style="color:#C00;"></span></label></td>
				<td><textarea name='board5' id='input-board5'  class='text2' temp="Please enter board/university." onblur="validate29(this)"></textarea><br><label><span id="board5" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation5" id="input-specialisation5" temp="Please enter the specialisation." onblur="validate30(this)" /><br><label><span id="specialisation5" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddmarks5" id="input-oddmarks5" temp="Please enter the odd sem marks." onblur="numberValidator13(this)" /><br><label><span id="oddmarks5" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddoutof5" id="input-oddoutof5" temp="Please enter the odd sem outof." onblur="numberValidator13(this)" /><br><label><span id="oddoutof5" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenmarks5" id="input-evenmarks5" temp="Please enter the even sem marks." onblur="numberValidator13(this)" /><br><label><span id="evenmarks5" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenoutof5" id="input-evenoutof5" temp="Please enter the even sem outof." onblur="numberValidator13(this)" /><br><label><span id="evenoutof5" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="total5" id="input-total5" temp="Please enter the total marks." onblur="numberValidator13(this)" /><br><label><span id="total5" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="outof5" id="input-outof5" temp="Please enter the out of marks." onblur="numberValidator13(this)" /><br><label><span id="outof5" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="percent5" id="input-percent5" temp="Please enter the percentage." onblur="numberValidator9(this)" /><br><label><span id="percent5" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass5" id="input-pass5" temp="Please enter the year of passing." onblur="numberValidator10(this)" /><br><label><span id="pass5" style="color:#C00;"></span></label></td>
				</tr>
				<tr>
				<td><span style='color:red;'>*</span><strong>First year</strong></td>
				<td><textarea name='school6' id='input-school6'  class='text2' temp="Please enter school/institute." onblur="validate28(this)"></textarea><br><label><span id="school6" style="color:#C00;"></span></label></td>
				<td><textarea name='board6' id='input-board6'  class='text2' temp="Please enter board/university." onblur="validate29(this)"></textarea><br><label><span id="board6" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation6" id="input-specialisation6" temp="Please enter the specialisation." onblur="validate30(this)" /><br><label><span id="specialisation6" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddmarks6" id="input-oddmarks6" temp="Please enter the odd sem marks." onblur="numberValidator13(this)" /><br><label><span id="oddmarks6" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddoutof6" id="input-oddoutof6" temp="Please enter the odd sem outof." onblur="numberValidator13(this)" /><br><label><span id="oddoutof6" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenmarks6" id="input-evenmarks6" temp="Please enter the even sem marks." onblur="numberValidator13(this)" /><br><label><span id="evenmarks6" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenoutof6" id="input-evenoutof6" temp="Please enter the even sem outof." onblur="numberValidator13(this)" /><br><label><span id="evenoutof6" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="total6" id="input-total6" temp="Please enter the total marks." onblur="numberValidator13(this)" /><br><label><span id="total6" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="outof6" id="input-outof6" temp="Please enter the out of marks." onblur="numberValidator13(this)" /><br><label><span id="outof6" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="percent6" id="input-percent6" temp="Please enter the percentage." onblur="numberValidator9(this)" /><br><label><span id="percent6" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass6" id="input-pass6" temp="Please enter the year of passing." onblur="numberValidator10(this)" /><br><label><span id="pass6" style="color:#C00;"></span></label></td>
				</tr>
				
				</table>
				</div>
				<div id="div5" style="display:none;">
				<table border="0" width="auto">
				<tr>
				<td><strong>Academic year</strong></td>
				<td><strong>School/Institute<br>with location</strong></td>
				<td><strong>Board/university</strong></td>
				<td><strong>Specialisation</strong></td>
				<td><strong>Odd sem marks</strong></td>
				<td><strong>Odd sem outof</strong></td>
				<td><strong>Even sem marks</strong></td>
				<td><strong>Even sem outof</strong></td>
				<td><strong>Total marks</strong></td>
				<td><strong>Total outof</strong></td>
				<td><strong>Percentage/CGPA</strong></td>
				<td><strong>Year of passing</strong></td>
				</tr>
				<tr>
				<td><span style='color:red;'>*</span><strong>Third year</strong></td>
				<td><textarea name='school7' id='input-school7'  class='text2' temp="Please enter school/institute." onblur="validate28(this)"></textarea><br><label><span id="school7" style="color:#C00;"></span></label></td>
				<td><textarea name='board7' id='input-board7'  class='text2' temp="Please enter board/university." onblur="validate29(this)"></textarea><br><label><span id="board7" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation7" id="input-specialisation7" temp="Please enter the specialisation." onblur="validate30(this)" /><br><label><span id="specialisation7" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddmarks7" id="input-oddmarks7" temp="Please enter the odd sem marks." onblur="numberValidator13(this)" /><br><label><span id="oddmarks7" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddoutof7" id="input-oddoutof7" temp="Please enter the odd sem outof." onblur="numberValidator13(this)" /><br><label><span id="oddoutof7" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenmarks7" id="input-evenmarks7" temp="Please enter the even sem marks." onblur="numberValidator13(this)" /><br><label><span id="evenmarks7" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenoutof7" id="input-evenoutof7" temp="Please enter the even sem outof." onblur="numberValidator13(this)" /><br><label><span id="evenoutof7" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="total7" id="input-total7" temp="Please enter the total marks." onblur="numberValidator13(this)" /><br><label><span id="total7" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="outof7" id="input-outof7" temp="Please enter the out of marks." onblur="numberValidator13(this)" /><br><label><span id="outof7" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="percent7" id="input-percent7" temp="Please enter the percentage." onblur="numberValidator9(this)" /><br><label><span id="percent7" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass7" id="input-pass7" temp="Please enter the year of passing." onblur="numberValidator10(this)" /><br><label><span id="pass7" style="color:#C00;"></span></label></td>
				</tr>
				<tr>
				<td><span style='color:red;'>*</span><strong>Second year</strong></td>
				<td><textarea name='school8' id='input-school8'  class='text2' temp="Please enter school/institute." onblur="validate28(this)"></textarea><br><label><span id="school8" style="color:#C00;"></span></label></td>
				<td><textarea name='board8' id='input-board8'  class='text2' temp="Please enter board/university." onblur="validate29(this)"></textarea><br><label><span id="board8" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation8" id="input-specialisation8" temp="Please enter the specialisation." onblur="validate30(this)" /><br><label><span id="specialisation8" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddmarks8" id="input-oddmarks8" temp="Please enter the odd sem marks." onblur="numberValidator13(this)" /><br><label><span id="oddmarks8" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddoutof8" id="input-oddoutof8" temp="Please enter the odd sem outof." onblur="numberValidator13(this)" /><br><label><span id="oddoutof8" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenmarks8" id="input-evenmarks8" temp="Please enter the even sem marks." onblur="numberValidator13(this)" /><br><label><span id="evenmarks8" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenoutof8" id="input-evenoutof8" temp="Please enter the even sem outof." onblur="numberValidator13(this)" /><br><label><span id="evenoutof8" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="total8" id="input-total8" temp="Please enter the total marks." onblur="numberValidator13(this)" /><br><label><span id="total8" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="outof8" id="input-outof8" temp="Please enter the out of marks." onblur="numberValidator13(this)" /><br><label><span id="outof8" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="percent8" id="input-percent8" temp="Please enter the percentage." onblur="numberValidator9(this)" /><br><label><span id="percent8" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass8" id="input-pass8" temp="Please enter the year of passing." onblur="numberValidator10(this)" /><br><label><span id="pass8" style="color:#C00;"></span></label></td>
				</tr>
				<tr>
				<td><span style='color:red;'>*</span><strong>First year</strong></td>
				<td><textarea name='school9' id='input-school9'  class='text2' temp="Please enter school/institute." onblur="validate28(this)"></textarea><br><label><span id="school9" style="color:#C00;"></span></label></td>
				<td><textarea name='board9' id='input-board9'  class='text2' temp="Please enter board/university." onblur="validate29(this)"></textarea><br><label><span id="board9" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation9" id="input-specialisation9" temp="Please enter the specialisation." onblur="validate30(this)" /><br><label><span id="specialisation9" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddmarks9" id="input-oddmarks9" temp="Please enter the odd sem marks." onblur="numberValidator13(this)" /><br><label><span id="oddmarks9" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddoutof9" id="input-oddoutof9" temp="Please enter the odd sem outof." onblur="numberValidator13(this)" /><br><label><span id="oddoutof9" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenmarks9" id="input-evenmarks9" temp="Please enter the even sem marks." onblur="numberValidator13(this)" /><br><label><span id="evenmarks9" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenoutof9" id="input-evenoutof9" temp="Please enter the even sem outof." onblur="numberValidator13(this)" /><br><label><span id="evenoutof9" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="total9" id="input-total9" temp="Please enter the total marks." onblur="numberValidator13(this)" /><br><label><span id="total9" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="outof9" id="input-outof9" temp="Please enter the out of marks." onblur="numberValidator13(this)" /><br><label><span id="outof9" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="percent9" id="input-percent9" temp="Please enter the percentage." onblur="numberValidator9(this)" /><br><label><span id="percent9" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass9" id="input-pass9" temp="Please enter the year of passing." onblur="numberValidator10(this)" /><br><label><span id="pass9" style="color:#C00;"></span></label></td>
				</tr>
				
				</table>
				</div>
				<div id="div6" style="display:none;">
				<table border="0" width="auto">
				<tr>
				<td><strong>Academic year</strong></td>
				<td><strong>School/Institute<br>with location</strong></td>
				<td><strong>Board/university</strong></td>
				<td><strong>Specialisation</strong></td>
				<td><strong>Odd sem marks</strong></td>
				<td><strong>Odd sem outof</strong></td>
				<td><strong>Even sem marks</strong></td>
				<td><strong>Even sem outof</strong></td>
				<td><strong>Total marks</strong></td>
				<td><strong>Total outof</strong></td>
				<td><strong>Percentage/CGPA</strong></td>
				<td><strong>Year of passing</strong></td>
				</tr>
				<tr>
				<td><span style='color:red;'>*</span><strong>Fourth year<strong></td>
				<td><textarea name='school0' id='input-school0'  class='text2' temp="Please enter school/institute." onblur="validate28(this)"></textarea><br><label><span id="school0" style="color:#C00;"></span></label></td>
				<td><textarea name='board0' id='input-board0'  class='text2' temp="Please enter board/university." onblur="validate29(this)"></textarea><br><label><span id="board0" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation0" id="input-specialisation0" temp="Please enter the specialisation." onblur="validate30(this)" /><br><label><span id="specialisation4" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddmarks0" id="input-oddmarks0" temp="Please enter the odd sem marks." onblur="numberValidator13(this)" /><br><label><span id="oddmarks0" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddoutof0" id="input-oddoutof0" temp="Please enter the odd sem outof." onblur="numberValidator13(this)" /><br><label><span id="oddoutof0" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenmarks0" id="input-evenmarks0" temp="Please enter the even sem marks." onblur="numberValidator13(this)" /><br><label><span id="evenmarks0" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenoutof0" id="input-evenoutof0" temp="Please enter the even sem outof." onblur="numberValidator13(this)" /><br><label><span id="evenoutof0" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="total0" id="input-total0" temp="Please enter the total marks." onblur="numberValidator13(this)" /><br><label><span id="total0" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="outof0" id="input-outof0" temp="Please enter the out of marks." onblur="numberValidator13(this)" /><br><label><span id="outof0" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="percent0" id="input-percent0" temp="Please enter the percentage." onblur="numberValidator9(this)" /><br><label><span id="percent0" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass0" id="input-pass0" temp="Please enter the year of passing." onblur="numberValidator10(this)" /><br><label><span id="pass0" style="color:#C00;"></span></label></td>
				</tr>
				<tr>
				<td><span style='color:red;'>*</span><strong>Third year</strong></td>
				<td><textarea name='school11' id='input-school11'  class='text2' temp="Please enter school/institute." onblur="validate28(this)"></textarea><br><label><span id="school11" style="color:#C00;"></span></label></td>
				<td><textarea name='board11' id='input-board11'  class='text2' temp="Please enter board/university." onblur="validate29(this)"></textarea><br><label><span id="board11" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation11" id="input-specialisation11" temp="Please enter the specialisation." onblur="validate30(this)" /><br><label><span id="specialisation11" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddmarks11" id="input-oddmarks11" temp="Please enter the odd sem marks." onblur="numberValidator13(this)" /><br><label><span id="oddmarks11" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddoutof11" id="input-oddoutof11" temp="Please enter the odd sem outof." onblur="numberValidator13(this)" /><br><label><span id="oddoutof11" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenmarks11" id="input-evenmarks11" temp="Please enter the even sem marks." onblur="numberValidator13(this)" /><br><label><span id="evenmarks11" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenoutof11" id="input-evenoutof11" temp="Please enter the even sem outof." onblur="numberValidator13(this)" /><br><label><span id="evenoutof11" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="total11" id="input-total11" temp="Please enter the total marks." onblur="numberValidator13(this)" /><br><label><span id="total11" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="outof11" id="input-outof11" temp="Please enter the out of marks." onblur="numberValidator13(this)" /><br><label><span id="outof11" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="percent11" id="input-percent11" temp="Please enter the percentage." onblur="numberValidator9(this)" /><br><label><span id="percent11" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass11" id="input-pass11" temp="Please enter the year of passing." onblur="numberValidator10(this)" /><br><label><span id="pass11" style="color:#C00;"></span></label></td>
				</tr>
				<tr>
				<td><span style='color:red;'>*</span><strong>Second year</strong></td>
				<td><textarea name='school12' id='input-school12'  class='text2' temp="Please enter school/institute." onblur="validate28(this)"></textarea><br><label><span id="school12" style="color:#C00;"></span></label></td>
				<td><textarea name='board12' id='input-board12'  class='text2' temp="Please enter board/university." onblur="validate29(this)"></textarea><br><label><span id="board12" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation12" id="input-specialisation12" temp="Please enter the specialisation." onblur="validate30(this)" /><br><label><span id="specialisation12" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddmarks12" id="input-oddmarks12" temp="Please enter the odd sem marks." onblur="numberValidator13(this)" /><br><label><span id="oddmarks12" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddoutof12" id="input-oddoutof12" temp="Please enter the odd sem outof." onblur="numberValidator13(this)" /><br><label><span id="oddoutof12" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenmarks12" id="input-evenmarks12" temp="Please enter the even sem marks." onblur="numberValidator13(this)" /><br><label><span id="evenmarks12" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenoutof12" id="input-evenoutof12" temp="Please enter the even sem outof." onblur="numberValidator13(this)" /><br><label><span id="evenoutof12" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="total12" id="input-total12" temp="Please enter the total marks." onblur="numberValidator13(this)" /><br><label><span id="total12" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="outof12" id="input-outof12" temp="Please enter the out of marks." onblur="numberValidator13(this)" /><br><label><span id="outof12" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="percent12" id="input-percent12" temp="Please enter the percentage." onblur="numberValidator9(this)" /><br><label><span id="percent12" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass12" id="input-pass12" temp="Please enter the year of passing." onblur="numberValidator10(this)" /><br><label><span id="pass12" style="color:#C00;"></span></label></td>
				</tr>
				<tr>
				<td><span style='color:red;'>*</span><strong>First year</strong></td>
				<td><textarea name='school22' id='input-school22'  class='text2' temp="Please enter school/institute." onblur="validate28(this)"></textarea><br><label><span id="school22" style="color:#C00;"></span></label></td>
				<td><textarea name='board22' id='input-board22'  class='text2' temp="Please enter board/university." onblur="validate29(this)"></textarea><br><label><span id="board22" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation22" id="input-specialisation22" temp="Please enter the specialisation." onblur="validate30(this)" /><br><label><span id="specialisation22" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddmarks22" id="input-oddmarks22" temp="Please enter the odd sem marks." onblur="numberValidator13(this)" /><br><label><span id="oddmarks22" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddoutof22" id="input-oddoutof22" temp="Please enter the odd sem outof." onblur="numberValidator13(this)" /><br><label><span id="oddoutof22" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenmarks22" id="input-evenmarks22" temp="Please enter the even sem marks." onblur="numberValidator13(this)" /><br><label><span id="evenmarks22" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenoutof22" id="input-evenoutof22" temp="Please enter the even sem outof." onblur="numberValidator13(this)" /><br><label><span id="evenoutof22" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="total22" id="input-total22" temp="Please enter the total marks." onblur="numberValidator13(this)" /><br><label><span id="total22" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="outof22" id="input-outof22" temp="Please enter the out of marks." onblur="numberValidator13(this)" /><br><label><span id="outof22" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="percent22" id="input-percent22" temp="Please enter the percentage." onblur="numberValidator9(this)" /><br><label><span id="percent22" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass22" id="input-pass22" temp="Please enter the year of passing." onblur="numberValidator10(this)" /><br><label><span id="pass22" style="color:#C00;"></span></label></td>
				</tr>
				
				</table>
				</div>
				<div id="div7" style="display:none;">
				<table border="0" width="auto">
				<tr>
				<td><strong>Academic year</strong></td>
				<td><strong>School/Institute<br>with location</strong></td>
				<td><strong>Board/university</strong></td>
				<td><strong>Specialisation</strong></td>
				<td><strong>Odd sem marks</strong></td>
				<td><strong>Odd sem outof</strong></td>
				<td><strong>Even sem marks</strong></td>
				<td><strong>Even sem outof</strong></td>
				<td><strong>Total marks</strong></td>
				<td><strong>Total outof</strong></td>
				<td><strong>Percentage/CGPA</strong></td>
				<td><strong>Year of passing</strong></td>
				</tr>
				<td><span style='color:red;'>*</span><strong>Fifth year</strong></td>
				<td><textarea name='school33' id='input-school33'  class='text2' temp="Please enter school/institute." onblur="validate28(this)"></textarea><br><label><span id="school33" style="color:#C00;"></span></label></td>
				<td><textarea name='board33' id='input-board33'  class='text2' temp="Please enter board/university." onblur="validate29(this)"></textarea><br><label><span id="board33" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation33" id="input-specialisation33" temp="Please enter the specialisation." onblur="validate30(this)" /><br><label><span id="specialisation33" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddmarks33" id="input-oddmarks33" temp="Please enter the odd sem marks." onblur="numberValidator13(this)" /><br><label><span id="oddmarks33" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddoutof33" id="input-oddoutof33" temp="Please enter the odd sem outof." onblur="numberValidator13(this)" /><br><label><span id="oddoutof33" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenmarks33" id="input-evenmarks33" temp="Please enter the even sem marks." onblur="numberValidator13(this)" /><br><label><span id="evenmarks33" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenoutof33" id="input-evenoutof33" temp="Please enter the even sem outof." onblur="numberValidator13(this)" /><br><label><span id="evenoutof33" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="total33" id="input-total33" temp="Please enter the total marks." onblur="numberValidator13(this)" /><br><label><span id="total33" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="outof33" id="input-outof33" temp="Please enter the out of marks." onblur="numberValidator13(this)" /><br><label><span id="outof33" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="percent33" id="input-percent33" temp="Please enter the percentage." onblur="numberValidator9(this)" /><br><label><span id="percent33" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass33" id="input-pass33" temp="Please enter the year of passing." onblur="numberValidator10(this)" /><br><label><span id="pass33" style="color:#C00;"></span></label></td>
				</tr>
				<tr>
				<td><span style='color:red;'>*</span><strong>Fourth year</strong></td>
				<td><textarea name='school43' id='input-school43'  class='text2' temp="Please enter school/institute." onblur="validate28(this)"></textarea><br><label><span id="school43" style="color:#C00;"></span></label></td>
				<td><textarea name='board43' id='input-board43'  class='text2' temp="Please enter board/university." onblur="validate29(this)"></textarea><br><label><span id="board4" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation43" id="input-specialisation43" temp="Please enter the specialisation." onblur="validate30(this)" /><br><label><span id="specialisation43" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddmarks43" id="input-oddmarks43" temp="Please enter the odd sem marks." onblur="numberValidator13(this)" /><br><label><span id="oddmarks43" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddoutof43" id="input-oddoutof43" temp="Please enter the odd sem outof." onblur="numberValidator13(this)" /><br><label><span id="oddoutof43" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenmarks43" id="input-evenmarks43" temp="Please enter the even sem marks." onblur="numberValidator13(this)" /><br><label><span id="evenmarks43" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenoutof43" id="input-evenoutof43" temp="Please enter the even sem outof." onblur="numberValidator13(this)" /><br><label><span id="evenoutof43" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="total43" id="input-total43" temp="Please enter the total marks." onblur="numberValidator13(this)" /><br><label><span id="total43" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="outof43" id="input-outof43" temp="Please enter the out of marks." onblur="numberValidator13(this)" /><br><label><span id="outof43" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="percent43" id="input-percent43" temp="Please enter the percentage." onblur="numberValidator9(this)" /><br><label><span id="percent43" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass43" id="input-pass43" temp="Please enter the year of passing." onblur="numberValidator10(this)" /><br><label><span id="pass43" style="color:#C00;"></span></label></td>
				</tr>
				<tr>
				<td><span style='color:red;'>*</span><strong>Third year</strong></td>
				<td><textarea name='school44' id='input-school44'  class='text2' temp="Please enter school/institute." onblur="validate28(this)"></textarea><br><label><span id="school44" style="color:#C00;"></span></label></td>
				<td><textarea name='board44' id='input-board44'  class='text2' temp="Please enter board/university." onblur="validate29(this)"></textarea><br><label><span id="board44" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation44" id="input-specialisation44" temp="Please enter the specialisation." onblur="validate30(this)" /><br><label><span id="specialisation44" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddmarks44" id="input-oddmarks44" temp="Please enter the odd sem marks." onblur="numberValidator13(this)" /><br><label><span id="oddmarks44" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddoutof44" id="input-oddoutof44" temp="Please enter the odd sem outof." onblur="numberValidator13(this)" /><br><label><span id="oddoutof44" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenmarks44" id="input-evenmarks44" temp="Please enter the even sem marks." onblur="numberValidator13(this)" /><br><label><span id="evenmarks44" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenoutof44" id="input-evenoutof44" temp="Please enter the even sem outof." onblur="numberValidator13(this)" /><br><label><span id="evenoutof44" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="total44" id="input-total44" temp="Please enter the total marks." onblur="numberValidator13(this)" /><br><label><span id="total44" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="outof44" id="input-outof44" temp="Please enter the out of marks." onblur="numberValidator13(this)" /><br><label><span id="outof44" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="percent44" id="input-percent44" temp="Please enter the percentage." onblur="numberValidator9(this)" /><br><label><span id="percent44" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass44" id="input-pass44" temp="Please enter the year of passing." onblur="numberValidator10(this)" /><br><label><span id="pass44" style="color:#C00;"></span></label></td>
				</tr>
				<tr>
				<td><span style='color:red;'>*</span><strong>Second year</strong></td>
				<td><textarea name='school45' id='input-school45'  class='text2' temp="Please enter school/institute." onblur="validate28(this)"></textarea><br><label><span id="school45" style="color:#C00;"></span></label></td>
				<td><textarea name='board45' id='input-board45'  class='text2' temp="Please enter board/university." onblur="validate29(this)"></textarea><br><label><span id="board45" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation45" id="input-specialisation45" temp="Please enter the specialisation." onblur="validate30(this)" /><br><label><span id="specialisation45" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddmarks45" id="input-oddmarks45" temp="Please enter the odd sem marks." onblur="numberValidator13(this)" /><br><label><span id="oddmarks45" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddoutof45" id="input-oddoutof45" temp="Please enter the odd sem outof." onblur="numberValidator13(this)" /><br><label><span id="oddoutof45" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenmarks45" id="input-evenmarks45" temp="Please enter the even sem marks." onblur="numberValidator13(this)" /><br><label><span id="evenmarks45" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenoutof45" id="input-evenoutof45" temp="Please enter the even sem outof." onblur="numberValidator13(this)" /><br><label><span id="evenoutof45" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="total45" id="input-total45" temp="Please enter the total marks." onblur="numberValidator13(this)" /><br><label><span id="total45" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="outof45" id="input-outof45" temp="Please enter the out of marks." onblur="numberValidator13(this)" /><br><label><span id="outof45" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="percent45" id="input-percent45" temp="Please enter the percentage." onblur="numberValidator9(this)" /><br><label><span id="percent45" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass45" id="input-pass45" temp="Please enter the year of passing." onblur="numberValidator10(this)" /><br><label><span id="pass45" style="color:#C00;"></span></label></td>
				</tr>
				<tr>
				<td><span style='color:red;'>*</span><strong>First year</strong></td>
				<td><textarea name='school55' id='input-school55'  class='text2' temp="Please enter school/institute." onblur="validate28(this)"></textarea><br><label><span id="school55" style="color:#C00;"></span></label></td>
				<td><textarea name='board55' id='input-board55'  class='text2' temp="Please enter board/university." onblur="validate29(this)"></textarea><br><label><span id="board55" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation55" id="input-specialisation55" temp="Please enter the specialisation." onblur="validate30(this)" /><br><label><span id="specialisation55" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddmarks55" id="input-oddmarks55" temp="Please enter the odd sem marks." onblur="numberValidator13(this)" /><br><label><span id="oddmarks55" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="oddoutof55" id="input-oddoutof55" temp="Please enter the odd sem outof." onblur="numberValidator13(this)" /><br><label><span id="oddoutof55" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenmarks55" id="input-evenmarks55" temp="Please enter the even sem marks." onblur="numberValidator13(this)" /><br><label><span id="evenmarks55" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="evenoutof55" id="input-evenoutof55" temp="Please enter the even sem outof." onblur="numberValidator13(this)" /><br><label><span id="evenoutof55" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="total55" id="input-total55" temp="Please enter the total marks." onblur="numberValidator13(this)" /><br><label><span id="total55" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="outof55" id="input-outof55" temp="Please enter the out of marks." onblur="numberValidator13(this)" /><br><label><span id="outof55" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="percent55" id="input-percent55" temp="Please enter the percentage." onblur="numberValidator9(this)" /><br><label><span id="percent55" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass55" id="input-pass55" temp="Please enter the year of passing." onblur="numberValidator10(this)" /><br><label><span id="pass55" style="color:#C00;"></span></label></td>
				</tr>
				
				</table>
				</div>
        	
        </div>             
    </div>  
                
  <!--Section 3-->
            
            <div class="well">
                <h3> Other Details </h3>
                
        <div class="form-group">
                <label for="sec3" class="col-sm-2 control-label">Career Skills</label>
           <div class="col-sm-3">
                <select class="form-control">
                      <option value="">Lorem</option>
                      <option value="">Ipsum</option>
                </select>
            </div>
        </div> 
                
        <div class="form-group">
                <label for="sec3" class="col-sm-2 control-label">Industry</label>
           <div class="col-sm-3">
                <select class="form-control">
                      <option value="">Lorem</option>
                      <option value="">Ipsum</option>
                </select>
            </div>
            <div class="col-sm-5"> Press the Ctrl button to select more than one choice </div>
        </div>        
                
        <div class="form-group">
                <label for="sec3" class="col-sm-2 control-label">Additional Certifications</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="op1" placeholder="">
            </div>
        </div>    
                
        <div class="form-group">
                <label for="sec3" class="col-sm-2 control-label">Achievements </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="op1" placeholder="">
            </div>
        </div>
                
        <div class="form-group">
                <label for="sec3" class="col-sm-2 control-label">Languages known</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="op1" placeholder="">
            </div>
        </div>     
                
        <div class="form-group">
                <label for="sec3" class="col-sm-2 control-label">Hobbies</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="op1" placeholder="">
            </div>
        </div>             
    </div>                
               
<!--Section 4-->
            
            <div class="well">
                <h3> Internship (Optional) </h3>     
                
        <div class="form-group">
                <label for="sec4" class="col-sm-2 control-label">Company Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="op1" placeholder="">
            </div>
        </div>    
                
        <div class="form-group">
                <label for="sec4" class="col-sm-2 control-label">Period </label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="op1" placeholder="">
            </div>
        </div>
                
        <div class="form-group">
                <label for="sec4" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="op1" placeholder="">
            </div>
        </div>     
                
        <div class="form-group">
                <label for="sec4" class="col-sm-2 control-label">Area</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="op1" placeholder="">
            </div>
        </div>             
    </div>                  
             
                
<!--Section 5-->
            
            <div class="well">
                <h3> Curriculum Vitae/Resume </h3>     
                
        <div class="form-group">
                <label for="sec5" class="col-sm-2 control-label">Objective</label>
            <div class="col-sm-5">
                <textarea class="form-control" id="op1" placeholder=""></textarea>
            </div>
        </div>    
                
        <div class="form-group">
                <label for="sec5" class="col-sm-2 control-label">Programming Skills </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="op1" placeholder="">
            </div>
        </div>
                
        <div class="form-group">
                <label for="sec5" class="col-sm-2 control-label">Area of Specialization</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="op1" placeholder="">
            </div>
        </div>     
                
        <div class="form-group">
                <label for="sec5" class="col-sm-2 control-label">Preferred Location</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="op1" placeholder="">
            </div>
        </div>    
                
        <div class="form-group">
                <label for="sec5" class="col-sm-2 control-label">Expected Renumeration</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="op1" placeholder="">
            </div>
        </div> 
                
        <div class="form-group">
           <label for="sec5" class="col-sm-2 control-label">Upload photo <br> (only .doc, .pdf, .docx format supported)</label> 
             <input class="col-sm-10" type="file" id="exampleInputFile">
        </div>                
    </div>                                  
        		<?php
				}
				?>
                       <center> <button class="btn btn-info btn-md" type="submit">Register</button>  </center> 
                       </form>
                       <?php
}
else
{
echo "<center><h3 style='color:red;'><strong>You have already registered.</strong></h3></center>";
}
}
?>

 </div>


                </div>
            </div>
        </div>














        </div>
        <!-- End of the main content -->
        
        

  <div class="lineBlack">
            <div class="container">
                <div class="row downLine">
                    <div class="col-md-12 text-right">
                        <!--input  id="searchPattern" type="search" name="pattern" value="Search the Site" onblur="if(this.value=='') {this.value='Search the Site'; }" onfocus="if(this.value =='Search the Site' ) this.value='';this.style.fontStyle='normal';" style="font-style: normal;"/-->
                        <!--    <input  id="searchPattern" type="search" placeholder="Search the Site"/><i class="glyphicon glyphicon-search" style="font-size: 13px; color:#a5a5a5;" id="iS"></i>
</div>-->
                        <div class="col-md-6 text-left copy">
                            <p>Copyright &copy; 2014 Build Your Brand. All Rights Reserved.</p>
                        </div>
                        <div class="col-md-6 text-right dm">
                            <ul id="downMenu">
                                            <li><a href="../newindex.php">Home</a></li>
                                            <li><a href="register.php" >Academic Brand</a></li>
                                            <li><a href="test_reports.php" >Technical Brand</a></li>
                                            <li><a href="events.php" >Technical Brand</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


