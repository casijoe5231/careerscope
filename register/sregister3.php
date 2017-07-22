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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../styles/style-main.css">

<link rel="stylesheet" href="../styles/datePicker.css" />
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
  <script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}

function getCity(state) { 
    var strURL="findcity.php?statename="+state;
	echo strURL;
  var req = getXMLHTTP();
  if (req) {
   req.onreadystatechange = function() {
    if (req.readyState == 4) {
     // only if "OK"
     if (req.status == 200) {      
      document.getElementById('input-city').innerHTML=req.responseText;    
     } else {
      alert("Problem while using XMLHTTP:\n" + req.statusText);
     }
    }    

   }   

   req.open("GET", strURL, true);
    req.send(null);
   }  
 }
 </script>
<script  type="text/javascript" src="validator8.js" ></script>
<style>
#controlBoard
{
	margin-left:5%;
	width:90%;
}
</style>
<title>CareerScope Login</title>
</head>
<body>
<div class="container">
<div class="header"><img src="../images/byb.jpg" width="160" height="80" alt="CareerScope logo" align="leftt"/>
  <img src="../images/dbit.png"  width="6%" alt="DBIT"  align="right"/> </div>
<div class="header-shadow"></div>
  
<div class="content">
 
 <div class="register">

<div id="controlBoard">
<br />
<form action="sreg.php" method="post" onsubmit="return validateAll()" enctype="multipart/form-data">

			
			<fieldset id="fieldset"style="border-radius:5px;">
				<legend><img src="../images/im-user_profile.png" width="25" alt="profile" />Personal Details</legend><br>
                <table cellpadding="12" border="0" width="auto">
				<tr>
				<td><label><span style='color:red;'>*</span><strong>Name:</strong></label></td>
				<td><input  type="text" class="text2" name="name" id="input-name" autofocus temp="Please enter the name." onblur="validate(this);" /><br>
				<label><span id="name" style="color:#C00;"></span></label>
				</td>
				
				<td><label><span style="color:red;">*</span><strong>Mobile number:</strong></label></td>
				<td><input type="text" class="text2" name="phone" id="input-number" placeholder="Should be 10 digits" temp="Enter valid phone number"  onblur="numberValidator(this)"/><br>
				<label><span id="phone" style="color:#C00;"></span></label>
				</td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Email:</strong></label></td>
				<td><input type="text" class="text2" name="email" id="input-email" placeholder="user@example.com" temp="Enter valid email ID" onblur="emailValidator(this)"/><br>
				<label><span id="email" style="color:#C00;"></span></label>
                </td>
				
				<td><label><span style='color:red;'>*</span><strong>Gender:</strong></label></td>
				<td><select name="gender" id="input-gender" temp="Please select the gender" onblur="validator(this)">
				<option value="Select">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                </select><br>
				<label><span id="gender" style="color:#C00;"></span></label>
                </td></tr>
				
				
				<tr><td><label><span style="color:red;">*</span><strong>Date of birth:</strong></label></td>
				<td><input type="text" name="date" id="datepicker" class="date" style='width:50%;' temp="Please enter date." onblur="validate1(this)">
				<label><span id="date" style="color:#C00;"></span></label>
				</td>
				
				<td><label><span style='color:red;'>*</span><strong>Address:</strong></label></td>
				<td><textarea name='address' id='input-address'  class='text2' temp="Please enter address." onblur="validate2(this)"></textarea><br>
				<label><span id="address" style="color:#C00;"></span></label>
				</td></tr>
				
				<tr><td><label><span style="color:red;">*</span><strong>State:</strong></label></td>
				<td>
				<select onchange="print_state('stateDrop',this.selectedIndex);" id="country"></select>
				<select name ="state" id ="stateDrop"  temp="Please select the state" onblur="validator1(this)"></select>
				<script language="javascript">print_country("country");</script>	
				<!--
				<select id="stateDrop" name="state" temp="Please select the state" onblur="validator1(this)">
				<option value="Select">Select</option>
				<?php
				$sql="select * from state_master";
				$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
				while($row=mysqli_fetch_array($res))
				{
				?>
				<option value="<?php echo $row['statename']; ?>"><?php echo $row['statename']; ?></option>
				<?php
				}
				?>
				</select>
				-->
				<br>
				<label><span id="state" style="color:#C00;"></span></label>
				</td>
				
				<td><label><span style="color:red;">*</span><strong>City:</strong></label></td>
				<td><input type="text" id="cityDrop" name="city" temp="Please select the city" onblur="validate(this)"><br>
				<label><span id="city" style="color:#C00;"></span></label>
				</td></tr>
				<!--script>
				var cities = {'Maharashtra':['Mumbai', 'Pune', 'Nashik'], 'Karnataka':['Bengaluru'],'Gujarat':['Ahmedabad','Surat']};
				$('#stateDrop').on('change', function(){
					var cityList = cities[$(this).val()];
					console.log(cityList);
					var output = '';
				$(cityList).each(function(k, v){
					output += '<option value="'+v+'">'+v+'</option>';
					alert(output);
				});
					$('#cityDrop').html(output);
				});
				</script-->
				
				<tr><td><label><span style='color:red;'>*</span><strong>Category:</strong></label></td>
				<td><select name="category" id="input-category" temp="Please select the category" onblur="validator4(this)">
				<option value="Select">Select</option>
                <option value="Open">Open</option>
                <option value="SC/ST">SC/ST</option>
				<option value="OBC">OBC</option>
                </select><br>
				<label><span id="category" style="color:#C00;"></span></label>
                </td>
				<td><label><span style='color:red;'>*</span><strong>Minority:</strong></label></td>
				<td><select name="minority" id="input-minority" temp="Please select the minority" onblur="validator5(this)">
				<option value="Select">Select</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                </select><br>
				<label><span id="minority" style="color:#C00;"></span></label>
                </td>
				</tr>
				
				<tr>
				<td><label><span style="color:red;">*</span><strong>Discipline:</strong></label></td>
				<td><?php echo $_SESSION['discipline']; ?>
				</td>
				
				<td><label><span style='color:red;'>*</span><strong>Branch:</strong></label></td>
				<td><select name="branch" id="input-branch" temp="Please select current year of branch" onblur="validator3(this)">
				<option value="Select">Select</option>
                <option value="Computer">Computer</option>
                <option value="EXTC">EXTC</option>
				<option value="Mechanical">Mechanical</option>
				<option value="IT">IT</option>
				<option value="None">None</option>
                </select><br>
				<label><span id="branch" style="color:#C00;"></span></label>
                </td>
                </tr>
				
				<tr><td><label><span style="color:red;">*</span><strong>Date of enrolment:</strong></label></td>
				<td><?php echo date("d/m/Y") ?>
				</td></tr>
                
                </table>
			</fieldset>
			
			<br>
			
			<!--onsubmit="return validateAll()"
			<fieldset  id="fieldset"style="border-radius:5px;" >
				<table cellpadding="12" border="0" width="auto">
				<legend><span style='color:red;'>*</span>Educational Qualification:</legend>
				<strong><i>All fields are compulsary.<br>Please enter NA(Not applicable) if no data available.<br>Note: Enter 0 for aggregate and year of passing if no data available.</i></strong><br>
				<tr>
				<th>Qualification</th>
				<th>School/Institute<br>with location</th>
				<th>Board/university</th>
				<th>Specialisation</th>
				<th>Aggregate</th>
				<th>Year of passing</th>
				</tr>
				<tr>
				<td>Fifth year</td>
				<td><textarea name='school' id='input-school'  class='text2' temp="Please enter school/institute." onblur="validate16(this)"></textarea><br><label><span id="school" style="color:#C00;"></span></label></td>
				<td><textarea name='board' id='input-board'  class='text2' temp="Please enter board/university." onblur="validate17(this)"></textarea><br><label><span id="board" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation" id="input-specialisation" temp="Please enter the specialisation." onblur="validate18(this)" /><br><label><span id="specialisation" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="aggregate" id="input-aggregate" temp="Please enter the aggregate." onblur="numberValidator1(this)" /><br><label><span id="aggregate" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass" id="input-pass" temp="Please enter the year of passing." onblur="numberValidator2(this)" /><br><label><span id="pass" style="color:#C00;"></span></label></td>
				</tr>
				
				<tr>
				<td>Fourth year</td>
				<td><textarea name='school1' id='input-school1'  class='text2' temp="Please enter school/institute." onblur="validate19(this)"></textarea><br><label><span id="school1" style="color:#C00;"></span></label></td>
				<td><textarea name='board1' id='input-board1'  class='text2' temp="Please enter board/university." onblur="validate20(this)"></textarea><br><label><span id="board1" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation1" id="input-specialisation1" temp="Please enter the specialisation." onblur="validate21(this)" /><br><label><span id="specialisation1" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="aggregate1" id="input-aggregate1" temp="Please enter the aggregate." onblur="numberValidator3(this)" /><br><label><span id="aggregate1" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass1" id="input-pass1" temp="Please enter the year of passing." onblur="numberValidator4(this)" /><br><label><span id="pass1" style="color:#C00;"></span></label></td>
				</tr>
				
				<tr>
				<td>Third year</td>
				<td><textarea name='school2' id='input-school2'  class='text2' temp="Please enter school/institute." onblur="validate22(this)"></textarea><br><label><span id="school2" style="color:#C00;"></span></label></td>
				<td><textarea name='board2' id='input-board2'  class='text2' temp="Please enter board/university." onblur="validate23(this)"></textarea><br><label><span id="board2" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation2" id="input-specialisation2" temp="Please enter the specialisation." onblur="validate24(this)" /><br><label><span id="specialisation2" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="aggregate2" id="input-aggregate2" temp="Please enter the aggregate." onblur="numberValidator5(this)" /><br><label><span id="aggregate2" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass2" id="input-pass2" temp="Please enter the year of passing." onblur="numberValidator6(this)" /><br><label><span id="pass2" style="color:#C00;"></span></label></td>
				</tr>
				
				<tr>
				<td>Second year</td>
				<td><textarea name='school3' id='input-school3'  class='text2' temp="Please enter school/institute." onblur="validate25(this)"></textarea><br><label><span id="school3" style="color:#C00;"></span></label></td>
				<td><textarea name='board3' id='input-board3'  class='text2' temp="Please enter board/university." onblur="validate26(this)"></textarea><br><label><span id="board3" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation3" id="input-specialisation3" temp="Please enter the specialisation." onblur="validate27(this)" /><br><label><span id="specialisation3" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="aggregate3" id="input-aggregate3" temp="Please enter the aggregate." onblur="numberValidator7(this)" /><br><label><span id="aggregate3" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass3" id="input-pass3" temp="Please enter the year of passing." onblur="numberValidator8(this)" /><br><label><span id="pass3" style="color:#C00;"></span></label></td>
				</tr>
				
				<tr>
				<td>First year</td>
				<td><textarea name='school4' id='input-school4'  class='text2' temp="Please enter school/institute." onblur="validate28(this)"></textarea><br><label><span id="school4" style="color:#C00;"></span></label></td>
				<td><textarea name='board4' id='input-board4'  class='text2' temp="Please enter board/university." onblur="validate29(this)"></textarea><br><label><span id="board4" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation4" id="input-specialisation4" temp="Please enter the specialisation." onblur="validate30(this)" /><br><label><span id="specialisation4" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="aggregate4" id="input-aggregate4" temp="Please enter the aggregate." onblur="numberValidator9(this)" /><br><label><span id="aggregate4" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass4" id="input-pass4" temp="Please enter the year of passing." onblur="numberValidator10(this)" /><br><label><span id="pass4" style="color:#C00;"></span></label></td>
				</tr>
				
				<tr>
				<td>Diploma</td>
				<td><textarea name='school7' id='input-school7'  class='text2' temp="Please enter school/institute." onblur="validate37(this)"></textarea><br><label><span id="school7" style="color:#C00;"></span></label></td>
				<td><textarea name='board7' id='input-board7'  class='text2' temp="Please enter board/university." onblur="validate38(this)"></textarea><br><label><span id="board7" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation7" id="input-specialisation7" temp="Please enter the specialisation." onblur="validate39(this)" /><br><label><span id="specialisation7" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="aggregate7" id="input-aggregate7" temp="Please enter the aggregate." onblur="numberValidator15(this)" /><br><label><span id="aggregate7" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass7" id="input-pass7" temp="Please enter the year of passing." onblur="numberValidator16(this)" /><br><label><span id="pass7" style="color:#C00;"></span></label></td>
				</tr>
				
				<tr>
				<td>HSC</td>
				<td><textarea name='school5' id='input-school5'  class='text2' temp="Please enter school/institute." onblur="validate31(this)"></textarea><br><label><span id="school5" style="color:#C00;"></span></label></td>
				<td><textarea name='board5' id='input-board5'  class='text2' temp="Please enter board/university." onblur="validate32(this)"></textarea><br><label><span id="board5" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation5" id="input-specialisation5" temp="Please enter the specialisation." onblur="validate33(this)" /><br><label><span id="specialisation5" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="aggregate5" id="input-aggregate5" temp="Please enter the aggregate." onblur="numberValidator11(this)" /><br><label><span id="aggregate5" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass5" id="input-pass5" temp="Please enter the year of passing." onblur="numberValidator12(this)" /><br><label><span id="pass5" style="color:#C00;"></span></label></td>
				</tr>
				
				<tr>
				<td>SSC</td>
				<td><textarea name='school6' id='input-school6'  class='text2' temp="Please enter school/institute." onblur="validate34(this)"></textarea><br><label><span id="school6" style="color:#C00;"></span></label></td>
				<td><textarea name='board6' id='input-board6'  class='text2' temp="Please enter board/university." onblur="validate35(this)"></textarea><br><label><span id="board6" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="specialisation6" id="input-specialisation6" temp="Please enter the specialisation." onblur="validate36(this)" /><br><label><span id="specialisation6" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="aggregate6" id="input-aggregate6" temp="Please enter the aggregate." onblur="numberValidator13(this)" /><br><label><span id="aggregate6" style="color:#C00;"></span></label></td>
				<td><input  type="text" class="text2" name="pass6" id="input-pass6" temp="Please enter the year of passing." onblur="numberValidator14(this)" /><br><label><span id="pass6" style="color:#C00;"></span></label></td>
				</tr>
				
				</table>   
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
				
				<td><label><span style='color:red;'>*</span><strong>Personal Skills:</strong></label></td>
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
				</td></tr>
				
				</table>
				</fieldset>-->
				
				<br>
				
			<fieldset  id="fieldset"style="border-radius:5px;" >
				<legend>Account Details:</legend>
                <table cellpadding="12" border="0" width="auto">

				<tr><td><label><span style='color:red;'>*</span><strong>Enter Password:</strong></label></td>
				<td><input type="password" class="text2" name="password" id="pass-one" temp="Enter password" onblur="lengthValidate(this,'Password',8,16)"/>
				<label><span id="password" style="color:#C00;"></span></label></td></tr>

				<tr><td><label><span style='color:red;'>*</span><strong>Confirm Password:</strong></label></td>
				<td><input type="password" class="text2" name="repassword" id="input-repassword" onblur="passValidate(this)"/>
				<label><span id="repassword" style="color:#C00;"></span></label></td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Attach ID proof :</strong></label><br>(submit institute ID for verification)</td>
				<td><input type="file" name="file" id="input-file" style='padding:2px;border:0px;width:auto;' temp="Please select a file." onblur="validFile(this)" /><br>(only .pdf,.doc,.docx format supported)
				<label><span id="file" style="color:#C00;"></span></label></td></tr>
				
			  </table>
		</fieldset>
		
		<br>
		
		<fieldset  id="fieldset"style="border-radius:5px;" >
				<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br>
				<label for='message'>Enter the code above here :</label><br>
				<input type="text" id="6_letters_code" name="6_letters_code"><br>
				<small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
		</fieldset>
<br>

<p>Fields Marked with <span style='color:red'>*</span> are compulsory</p>
<br>

<input type="submit" alt="SUBMIT" value="Save Details" class="button" align="center"/>

<br />Already Registered ? <a href="../login.php">Click here</a>

</form>
<br />

</div>

</div>

  




</div>
<div class="footer">
  <div class="footer-link">
  <br>Home | Privacy Policy | Terms of use | About
  <br /> www.dbit.in<br /><br />
  </div>
</div>

</div>
</body>
</html>
