<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include '../connection1.php';
	$emaill=$_SESSION['user'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	
	// Tracking the user
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Academic Brand Registration','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<html>
<head>
<title>CareerScope</title>

  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
		<link href="Image/icon1.ico" rel="shortcut icon"/>
		<script src="../js/jquery.js"></script>
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
function validateForm(){
if(document.getElementById('category').value=='')
{
alert("Please select an Item.");
return false;
}
return true;
}
</script>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>



<link rel="stylesheet" type="text/css" href="../css/stephen1.css">  

</head>
<body>

<div class='container'>
<div class="header"><img src="../images/byb.jpg" width="160" height="80" alt="CareerScope logo" align="left"/>
  <img src="../images/dbit.png"  width="6%" alt="DBIT"  align="right"/>
  </div>
<div class="header-shadow"></div>
<div class='content'>
<br>
<div style="float:left;"><?php include("menu.php"); ?></div>
<br>
<br>
<br>
<div class='title' style="clear:both;">
<h3>&nbsp; Academic Brand menu</h3>
</div>
<br>
<br>
<br>
<div style="float:left;clear:both;margin-top:30px;">
<ul id="sidenavigation" class="MenuBarVertical">
	<li><a href="register.php">Register</a></li>
	<li><a href="choose.php">Choose your mentor</a></li>
	<!--li><a href="profile.php">Job profile</a></li>
	<li><a href="goal.php">Job profiling test</a></li>
	<li><a href="know.php">Know your subjects</a></li-->
	<?php include("smenu.php"); ?>
  <li><a href="newindex.php">
	<?php
	if($first==1)
	echo "Create";
	else
	echo "Add";
	?></a></li>
  <li><a href="sdisplay1.php">Display</a></li>
    <li><a href="presresume.php">Resume</a></li>
	<li><a href="../newindex.php">Back to home</a></li>
	</ul>
</div>
<!-- Content here -->

<div id='container_internal' style="float:left;margin-top:30px;">
<?php
  $email=$_SESSION['user'][0];
  $sql1="select * from istudent where email='$email'";
  $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
  while($row1=mysqli_fetch_array($res1))
{
$status=$row1['status'];
if($status==0)
{
?>
<form action="acadportfolio.php" method="post" enctype="multipart/form-data">
<?php
  $sql="select * from masteruser where email='$email'";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  while($row=mysqli_fetch_array($res))
{
  ?>
<fieldset id="fieldset"style="border-radius:5px;">
				<legend><img src="../images/im-user_profile.png" width="25" alt="profile" />Personal Details</legend><br>
                <table cellpadding="12" border="0" width="auto">
				<tr>
				<td><label><strong>Name:</strong></label></td>
				<td><?php echo $row['name']; ?></td>
				</tr>
				
				
				<tr><td><label><strong>Email:</strong></label></td>
				<td><?php echo $row['email']; ?></td>
				
				
				<td><label><strong>Date of enrolment:</strong></label></td>
				<td><?php echo date("d/m/Y") ?>
				</td>
				</tr>
				
				<tr><td><label><strong>Discipline:</strong></label></td>
				<td><?php echo $row['discipline']; ?>
				</td>
				
				<td><label><strong>Institute:</strong></label></td>
				<td><?php echo $row['institute']; ?>
				</td>
                </tr>
                
                </table>
			</fieldset>

<br>

<fieldset  id="fieldset" style="border-radius:5px;" >
				<table border="0" width="auto">
				<legend><span style='color:red;'>*</span>Educational Qualification:</legend>
				<tr>
				<td><strong>Qualification</strong></td>
				<td><strong>School/Institute<br>with location</strong></td>
				<td><strong>Board/university</strong></td>
				<td><strong>Stream</strong></td>
				<td><strong>Total</strong></td>
				<td><strong>Out of</strong></td>
				<td><strong>Percentage/CGPA</strong></td>
				<td><strong>Year of passing</strong></td>
				</tr>
				
				<tr>
				<td><span style='color:red;'>*</span><strong>SSC</strong></td>
				<td><textarea name='school1' id='input-school1'  class='text2' temp="Please enter school/institute." onblur="validate34(this)"></textarea><br><label><span id="school1" style="color:#C00;"></span></label></td>
				<td><textarea name='board1' id='input-board1'  class='text2' temp="Please enter board/university." onblur="validate35(this)"></textarea><br><label><span id="board1" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="stream1" id="input-stream1" temp="Please enter the stream." onblur="validate36(this)" /><br><label><span id="specialisation1" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="total1" id="input-total1" temp="Please enter the total marks." onblur="numberValidator13(this)" /><br><label><span id="total1" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="outof1" id="input-outof1" temp="Please enter the out of marks." onblur="numberValidator13(this)" /><br><label><span id="outof1" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="percent1" id="input-percent1" temp="Please enter the percentage." onblur="numberValidator13(this)" /><br><label><span id="percent1" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass1" id="input-pass1" temp="Please enter the year of passing." onblur="numberValidator14(this)" /><br><label><span id="pass1" style="color:#C00;"></span></label></td>
				</tr>
				
				<tr>
				<td><span style='color:red;'>*</span><strong>Diploma:</strong> </td>
				<td>
				<input type="radio" name="diploma" id="Yes" value="Yes" onclick="go()">Yes
				<input type="radio" name="diploma" id="No" value="No" onclick="go1()">No<br>
				<label><span id="diploma" style="color:#C00;"></span></label><br>
				</td>
				</tr>
				</table> 
				<div id="div1" name="div1" style="display:none;">
				<table  border="0" width="auto">
				<tr>
				<td><span style='color:red;'>*</span><strong>HSC/equivalent</strong></td>
				<td><textarea name='school2' id='input-school2'  class='text2' temp="Please enter school/institute." onblur="validate31(this)"></textarea><br><label><span id="school2" style="color:#C00;"></span></label></td>
				<td><textarea name='board2' id='input-board2'  class='text2' temp="Please enter board/university." onblur="validate32(this)"></textarea><br><label><span id="board2" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="stream2" id="input-stream2" temp="Please enter the stream." onblur="validate33(this)" /><br><label><span id="stream2" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="total2" id="input-total2" temp="Please enter the total marks." onblur="numberValidator13(this)" /><br><label><span id="total2" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="outof2" id="outof2" temp="Please enter the out of marks." onblur="numberValidator13(this)" /><br><label><span id="outof2" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="percent2" id="input-percent2" temp="Please enter the percentage." onblur="numberValidator11(this)" /><br><label><span id="percent2" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass2" id="input-pass2" temp="Please enter the year of passing." onblur="numberValidator12(this)" /><br><label><span id="pass2" style="color:#C00;"></span></label></td>
				</tr>
				<tr>
				<td><span style='color:red;'>*</span><strong>CET score</strong></td>
				<td><input  type="text" class="text2" name="cet" id="input-cet" temp="Please enter the cet score." onblur="numberValidator12(this)" /><br><label><span id="cet" style="color:#C00;"></span></label></td>
				</tr>
				</table>
				</div>
				<div id="div2" name="div2" style="display:none;">
				<table border="0" width="auto">
				<tr>
				<td><span style='color:red;'>*</span><strong>Diploma</strong></td>
				<td><textarea name='school3' id='input-school3'  class='text2' temp="Please enter school/institute." onblur="validate37(this)"></textarea><br><label><span id="school3" style="color:#C00;"></span></label></td>
				<td><textarea name='board3' id='input-board3'  class='text2' temp="Please enter board/university." onblur="validate38(this)"></textarea><br><label><span id="board3" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="stream3" id="input-stream3" temp="Please enter the stream." onblur="validate39(this)" /><br><label><span id="stream3" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="total3" id="input-total3" temp="Please enter the total marks." onblur="numberValidator13(this)" /><br><label><span id="total3" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="outof3" id="input-outof3" temp="Please enter the out of marks." onblur="numberValidator13(this)" /><br><label><span id="outof3" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="percent3" id="input-percent3" temp="Please enter the percentage." onblur="numberValidator15(this)" /><br><label><span id="percent3" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass3" id="input-pass3" temp="Please enter the year of passing." onblur="numberValidator16(this)" /><br><label><span id="pass3" style="color:#C00;"></span></label></td>
				</table>
				</tr>
				</div>
				
			
				<table border="0" width="auto">
				<tr>
				<td><label><span style='color:red;'>*</span><strong>Current year of graduation:</strong></label></td>
				<td><!--select name="graduation" id="input-graduation" temp="Please select current year of graduation"-->
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
                </select><br>
				<label><span id="graduation" style="color:#C00;"></span></label>
                </td>
				</tr>
				</table>
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
				</fieldset>
				
				<br>
				
				<fieldset  id="fieldset"style="border-radius:5px;" >
				<table cellpadding="12" border="0" width="auto">
				<legend>Other Details:</legend>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Career Skills:</strong></label></td>
				<td><select name="cskills" id="input-cskills" temp="Please select career skills." onblur="validator1(this)">
				<option value="Select">Select</option>
				<option value="Analytics">Analytics</option>
                <option value="Business and Systems Integration">Business and Systems Integration</option>
                <option value="Engineering Services">Engineering Services</option>
                <option value="Finance">Finance</option>
				<option value="Human Resources">Human Resources</option>
				<option value="IT Operations">IT Operations</option>
				<option value="Marketing and Communications">Marketing and Communications</option>
                <option value="Performance,risk and quality">Performance,risk and quality</option>
				<option value="Program,project and service mgt">Program,project and service mgt</option>
				<option value="Sales">Sales</option>
				<option value="Software Engineering">Software Engineering</option>
				<option value="Strategy">Strategy</option>
				<option value="Workplace mgt and solutions">Workplace mgt and solutions</option>
				</select><br>
				<label ><span id="cskills" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Industry:</strong></label></td>
				<td><select name="industry[]" id="input-industry" multiple="multiple" temp="Please select industry." onblur="validator2(this)">
				<option value="Select">Select</option>
				<option value="Aerospace and Defense">Aerospace and Defense</option>
                <option value="Automotive">Automotive</option>
                <option value="Banking">Banking</option>
                <option value="Building Materials">Building Materials</option>
				<option value="Capital Markets">Capital Markets</option>
				<option value="Chemicals">Chemiclas</option>
				<option value="Communication">Communication</option>
				<option value="Consulting">Consulting</option>
				<option value="Consumer goods and services">Consumer goods and services</option>
				<option value="Electronics and high tech.">Electronics and high tech.</option>
				<option value="Energy">Energy</option>
				<option value="IT-Hardware">IT-Hardware</option>
				<option value="IT-Software">IT-Software</option>
				<option value="Travel">Travel</option>
				<option value="Utilities">Utilities</option>
                </select><br><b><i>Please press ctrl button to<br> select more than 1 choices.</i></b><br>
				<label ><span id="industry[]" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Additional certifications:</strong></label></td>
				<td><input  type="text" class="text2" name="certifications" id="input-certifications" placeholder="eg:android,SAP" temp="Please enter additional certifications." onblur="validate3(this)" /><br>
				<label><span id="certifications" style="color:#C00;"></span></label>
				</td>
				  
				<td><label><span style='color:red;'>*</span><strong>Achievements:</strong></label></td>
				<td><textarea name='achievements' id='input-achievements'  class='text2' temp="Please enter achievements." onblur="validate4(this)"></textarea><br>
				<label><span id="achievements" style="color:#C00;"></span></label>
				</td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Languages known:</strong></label></td>
				<td><input  type="text" class="text2" name="language" id="input-language" placeholder="eg:english,hindi" temp="Please enter languages known." onblur="validate5(this)" /><br>
				<label><span id="language" style="color:#C00;"></span></label>
				
				<td><label><span style='color:red;'>*</span><strong>Hobbies:</strong></label></td>
				<td><input  type="text" class="text2" name="hobbies" id="input-hobbies" temp="Please enter your hobbies." onblur="validate6(this)" /><br>
				<label><span id="hobbies" style="color:#C00;"></span></label>
				</td></tr>
				</table>
				</fieldset>
				
				<br>
			
			<fieldset  id="fieldset"style="border-radius:5px;" >
				<table cellpadding="12" border="0" width="auto">
				<legend>Internship(Optional):</legend>
				
				<tr><td><label><strong>Period:</strong></label></td>
				<td><input  type="text" class="text2" name="period" id="input-period"/><br>
				<label><span id="period" style="color:#C00;"></span></label>
				</td>
				
				<td><label><strong>Company name:</strong></label></td>
				<td><input  type="text" class="text2" name="company" id="input-company"/><br>
				<label><span id="company" style="color:#C00;"></span></label>
				</td></tr>
				
				<tr><td><label><strong>Title:</strong></label></td>
				<td><input  type="text" class="text2" name="title" id="input-title"/><br>
				<label><span id="title" style="color:#C00;"></span></label>
				</td>
				
				<td><label><strong>Area:</strong></label></td>
				<td><input  type="text" class="text2" name="area" id="input-area" placeholder="eg:software"/><br>
				<label><span id="area" style="color:#C00;"></span></label>
				</td></tr>
				</table>   
				</fieldset>
				
				<br>
				
				<fieldset  id="fieldset"style="border-radius:5px;" >
				<table cellpadding="12" border="0" width="auto">
				<legend>Curriculum Vitae/Resume:</legend>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Objective:</strong></label></td>
				<td><textarea name='objective' id='input-objective'  class='text2' temp="Please enter your objective." onblur="validate11(this)"></textarea><br>
				<label><span id="objective" style="color:#C00;"></span></label>
				</td>
				
				<td><label><span style='color:red;'>*</span><strong>Programming Skills:</strong></label></td>
				<td><input  type="text" class="text2" name="skills" id="input-skills" placeholder="eg:c,c++,java" temp="Please enter your skills." onblur="validate12(this)" /><br>
				<label><span id="skills" style="color:#C00;"></span></label>
				</td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Area of specialisation:</strong></label></td>
				<td><input  type="text" class="text2" name="special" id="input-special" placeholder="eg:Computer" temp="Please enter your area of specialisation." onblur="validate13(this)" /><br>
				<label><span id="special" style="color:#C00;"></span></label>
				</td>
				
				<td><label><span style='color:red;'>*</span><strong>Preferred Location:</strong></label></td>
				<td><input  type="text" class="text2" name="location" id="input-location" temp="Please enter your preferred location." onblur="validate14(this)" /><br>
				<label><span id="location" style="color:#C00;"></span></label>
				</td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Expected Remuneration:</strong></label></td>
				<td><input  type="text" class="text2" name="remuneration" id="input-remuneration" placeholder="eg:1-2 lakhs" temp="Please enter your expected remuneration." onblur="validate15(this)" /><br>
				<label><span id="remuneration" style="color:#C00;"></span></label>
				</td>
				<td><label><strong>Upload photo :</strong></label><br></td>
				<td><input type="file" name="file" id="input-file" style='padding:2px;border:0px;width:auto;' temp="Please select a file."  /><br>(only .pdf,.jpg,.png format supported)
				<label><span id="file" style="color:#C00;"></span></label></td>
				</tr>
				
				</table>
				</fieldset>
				<?php
				}
				?><br>
				<input type='submit' name='submit' id='submit' value='Register' style='width:10%'>
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
<!-- Content ends here -->
</div><br>
<div class="footer">
  <div class="footer-link">
  <br>Home | Privacy Policy | Terms of use | About
  <br /> www.dbit.in
  </div>
</div>
</div>

</body>
</html>
<?php
}
?>