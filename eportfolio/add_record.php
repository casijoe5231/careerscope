<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	if(isset($_POST['next']))
	{
	$email=$_SESSION['user'][0];
	$name=$_SESSION['user'][1];
	$category=$_POST['category'];
	include '../connection1.php';
?>
<html>
<head>
<title>CareerScope</title>

  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script language="Javascript">
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

<script type="text/javascript">

var category="<?php echo $category; ?>";


if(category == "Seminar")
{
function validate(tag)
{
	if(tag.value=="" || tag.value==null)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validate1(tag)
{
	if(tag.value=="" || tag.value==null)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validator(tag)
{
	if(tag.value=="Select")
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function numberValidator(tag)
{
	var current_year=new Date().getFullYear();
	if(tag.value<1960 || tag.value>current_year)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function isValidNumber(e)
{
	return parseInt(e+"")==e;
}

function validFile(tag)
{
	files=tag.value;
	var m=files.split(".");
	if((files=="") || (files==null) || (!((m[1]== "doc") || (m[1]== "docx") || (m[1]== "pdf"))))
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
	
}

function validateAll()
{
	try
	{
	var p1=validate(document.getElementById('input-topicname'));
	var p2=validate1(document.getElementById('input-description'));
	var p3=validator(document.getElementById('input-members1'));
	var p4=numberValidator(document.getElementById('input-year1'));
	var p5=validFile(document.getElementById('input-file'));
	return p1&&p2&&p3&&p4&&p5;
	}
	catch(e){alert(e);}
}

}

if(category == "Work Shop")
{
function validate(tag)
{
	if(tag.value=="" || tag.value==null)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validate1(tag)
{
	if(tag.value=="" || tag.value==null)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validator(tag)
{
	if(tag.value=="Select")
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function numberValidator(tag)
{
	var current_year=new Date().getFullYear();
	if(tag.value<1960 || tag.value>current_year)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function isValidNumber(e)
{
	return parseInt(e+"")==e;
}

function validFile(tag)
{
	files=tag.value;
	var m=files.split(".");
	if((files=="") || (files==null) || (!((m[1]== "doc") || (m[1]== "docx") || (m[1]== "pdf"))))
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
	
}

function validateAll()
{
	try
	{
	var p1=validate(document.getElementById('input-topicname1'));
	var p2=validate1(document.getElementById('input-description1'));
	var p3=validator(document.getElementById('input-members2'));
	var p4=numberValidator(document.getElementById('input-year2'));
	var p5=validFile(document.getElementById('input-file'));
	return p1&&p2&&p3&&p4&&p5;
	}
	catch(e){alert(e);}
}

}

if(category == "Project")
{
function validate(tag)
{
	if(tag.value=="" || tag.value==null)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validate1(tag)
{
	if(tag.value=="" || tag.value==null)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validator(tag)
{
	if(tag.value=="Select")
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function numberValidator(tag)
{
	var current_year=new Date().getFullYear();
	if(tag.value<1960 || tag.value>current_year)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function isValidNumber(e)
{
	return parseInt(e+"")==e;
}

function validFile(tag)
{
	files=tag.value;
	var m=files.split(".");
	if((files=="") || (files==null) || (!((m[1]== "doc") || (m[1]== "docx") || (m[1]== "pdf"))))
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
	
}

function validateAll()
{
	try
	{
	var p1=validate(document.getElementById('input-topicname2'));
	var p2=validate1(document.getElementById('input-description2'));
	var p3=validator(document.getElementById('input-members3'));
	var p4=numberValidator(document.getElementById('input-year3'));
	var p5=validFile(document.getElementById('input-file'));
	return p1&&p2&&p3&&p4&&p5;
	}
	catch(e){alert(e);}
}

}

if(category == "Technical Paper/Publication")
{
function validate(tag)
{
	if(tag.value=="" || tag.value==null)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validate1(tag)
{
	if(tag.value=="" || tag.value==null)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function numberValidator(tag)
{
	var current_year=new Date().getFullYear();
	if(tag.value<1960 || tag.value>current_year)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function isValidNumber(e)
{
	return parseInt(e+"")==e;
}

function validFile(tag)
{
	files=tag.value;
	var m=files.split(".");
	if((files=="") || (files==null) || (!((m[1]== "doc") || (m[1]== "docx") || (m[1]== "pdf"))))
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
	
}

function validateAll()
{
	try
	{
	var p1=validate(document.getElementById('input-papername'));
	var p2=validate1(document.getElementById('input-description3'));
	var p3=numberValidator(document.getElementById('input-year4'));
	var p4=validFile(document.getElementById('input-file'));
	return p1&&p2&&p3&&p4;
	}
	catch(e){alert(e);}
}

}

if(category == "Technical Fest")
{
function validate(tag)
{
	if(tag.value=="" || tag.value==null)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validate1(tag)
{
	if(tag.value=="" || tag.value==null)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validator(tag)
{
	if(tag.value=="Select")
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validator1(tag)
{
	if(tag.value=="Select")
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function numberValidator(tag)
{
	var current_year=new Date().getFullYear();
	if(tag.value<1960 || tag.value>current_year)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function isValidNumber(e)
{
	return parseInt(e+"")==e;
}

function validFile(tag)
{
	files=tag.value;
	var m=files.split(".");
	if((files=="") || (files==null) || (!((m[1]== "doc") || (m[1]== "docx") || (m[1]== "pdf"))))
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
	
}

function validateAll()
{
	try
	{
	var p1=validate(document.getElementById('input-eventname'));
	var p2=validate1(document.getElementById('input-description4'));
	var p3=validator(document.getElementById('input-members4'));
	var p4=validator1(document.getElementById('input-position1'));
	var p5=numberValidator(document.getElementById('input-year5'));
	var p6=validFile(document.getElementById('input-file'));
	return p1&&p2&&p3&&p4&&p5&&p6;
	}
	catch(e){alert(e);}
}

}

if(category == "Certification Course")
{
function validate(tag)
{
	if(tag.value=="" || tag.value==null)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validate1(tag)
{
	if(tag.value=="" || tag.value==null)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validate2(tag)
{
	if(tag.value=="" || tag.value==null)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function numberValidator(tag)
{
	if(tag.value=="" || !isValidNumber(tag.value))
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function numberValidator1(tag)
{
	var current_year=new Date().getFullYear();
	if(tag.value<1960 || tag.value>current_year)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function isValidNumber(e)
{
	return parseInt(e+"")==e;
}

function validFile(tag)
{
	files=tag.value;
	var m=files.split(".");
	if((files=="") || (files==null) || (!((m[1]== "doc") || (m[1]== "docx") || (m[1]== "pdf"))))
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
	
}

function validateAll()
{
	try
	{
	var p1=validate(document.getElementById('input-coursename'));
	var p2=validate1(document.getElementById('input-module'));
	var p3=validate2(document.getElementById('input-description5'));
	var p4=numberValidator(document.getElementById('input-score'));
	var p5=numberValidator1(document.getElementById('input-year6'));
	var p6=validFile(document.getElementById('input-file'));
	return p1&&p2&&p3&&p4&&p5&&p6;
	}
	catch(e){alert(e);}
}

}

if(category == "Sports")
{
function validate(tag)
{
	if(tag.value=="" || tag.value==null)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validator(tag)
{
	if(tag.value=="Select")
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validator1(tag)
{
	if(tag.value=="Select")
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validator2(tag)
{
	if(tag.value=="Select")
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function numberValidator(tag)
{
	var current_year=new Date().getFullYear();
	if(tag.value<1960 || tag.value>current_year)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function isValidNumber(e)
{
	return parseInt(e+"")==e;
}

function validFile(tag)
{
	files=tag.value;
	var m=files.split(".");
	if((files=="") || (files==null) || (!((m[1]== "doc") || (m[1]== "docx") || (m[1]== "pdf"))))
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
	
}

function validateAll()
{
	try
	{
	var p1=validate(document.getElementById('input-sportname'));
	var p2=numberValidator(document.getElementById('input-year'));
	var p3=validator(document.getElementById('input-members'));
	var p4=validator1(document.getElementById('input-playedas'));
	var p5=validator2(document.getElementById('input-position'));
	var p6=validFile(document.getElementById('input-file'));
	return p1&&p2&&p3&&p4&&p5&&p6;
	}
	catch(e){alert(e);}
}

}

if(category == "Work Experience")
{
function validate(tag)
{
	if(tag.value=="" || tag.value==null)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validate1(tag)
{
	if(tag.value=="" || tag.value==null)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function numberValidator(tag)
{
	if(tag.value=="" || !isValidNumber(tag.value) || tag.value<0 || tag.value>100)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function isValidNumber(e)
{
	return parseInt(e+"")==e;
}

function validFile(tag)
{
	files=tag.value;
	var m=files.split(".");
	if((files=="") || (files==null) || (!((m[1]== "doc") || (m[1]== "docx") || (m[1]== "pdf"))))
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
	
}

function validateAll()
{
	try
	{
	var p1=validate(document.getElementById('input-orgname'));
	var p2=validate1(document.getElementById('input-designation'));
	var p3=numberValidator(document.getElementById('input-experience'));
	var p4=validFile(document.getElementById('input-file'));
	return p1&&p2&&p3&&p4;
	}
	catch(e){alert(e);}
}

}
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
	<li><a href="profile.php">Job profile</a></li>
	<li><a href="goal.php">Job profiling test</a></li>
	<li><a href="know.php">Know your subjects</a></li>
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
<fieldset style="width:600">
        <legend class="student">ENTER ABOUT YOUR ACHIEVEMENTS</legend>
        
        <table border="0"  style="margin-top:20px;margin-bottom:20px;">
		<form name="create" method="POST" action="add.php" onsubmit="return validateAll()" enctype="multipart/form-data">			
                    <tr align='left'>
    						<th>Category:</th><td><?php echo $category; ?></td>
                            <input type="hidden" id="category" name="category" value="<?php echo $category; ?>">
							<input type="hidden" id="email" name="email" value="<?php echo $email; ?>">
							<input type="hidden" id="uname" name="uname" value="<?php echo $name; ?>">
  					</tr>
                    
                    <?php 
					$flag=1;
					
					if($category=='Sports')
					$table = "sports";
					if($category=='Seminar' || $category=='Work Shop' || $category=='Project')
					$table = "seminar_wp";
					if($category=='Certification Course')
					$table = "certification";
					if($category=='Technical Fest')
					$table = "technical_ds";
					if($category=='Technical Paper/Publication')
					$table = "technical_paper";
					if($category=='Work Experience')
					$table = "work_exp";
					
					$number = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM $table WHERE username='$name' and category='$category'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
					if(mysqli_num_rows($number)==0)
					{
						echo "<center><b>No records present</b></center>";
						$flag=0;
					}
					?>
					
					<?php
					if($category=='Sports')
					{
					?>
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Sport Name:</strong></label></td>
					<td><input  type="text" class="text2" name="sportname" id="input-sportname" temp="Please enter the sport name." onblur="validate(this)" /><br>
					<label><span id="sportname" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Year:</strong></label></td>
					<td><input  type="text" class="text2" name="year" id="input-year" temp="Year should be in range 1960 to current year" onblur="numberValidator(this)" /><br>
					<label><span id="year" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>No. of members:</strong></label></td>
					<td><select name="members" id="input-members" temp="Please select the number of members" onblur="validator(this)">
					<option value="Select">Select</option>
					<option value="2">2</option>
					<option value="6">6</option>
					<option value="8">8</option>
					<option value="11">11</option>
					</select><br>
					<label><span id="members" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Played as:</strong></label></td>
					<td><select name="playedas" id="input-playedas" temp="Please enter the playing position" onblur="validator1(this)">
					<option value="Select">Select</option>
					<option value="Captain">Captain</option>
					<option value="Member">Member</option>
					<option value="Substitute">Substitute</option>
					</select><br>
					<label><span id="playedas" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Position:</strong></label></td>
					<td><select name="position" id="input-position" temp="Please select the position" onblur="validator2(this)">
					<option value="Select">Select</option>
					<option value="Winner">Winner</option>
					<option value="Runner Up">Runner Up</option>
					<option value="Participant">Participant</option>
					</select><br>
					<label><span id="position" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Upload:</strong></label><br></td>
					<td><input type="file" name="file" id="input-file" style='padding:2px;border:0px;width:auto;' temp="Please select a file." onblur="validFile(this)" /><br>(only .pdf,.jpg,.png format supported)
					<label><span id="file" style="color:#C00;"></span></label></td>
					</tr>

					<?php
					}
					elseif($category=='Seminar')
					{
					?>
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Topic Name:</strong></label></td>
					<td><input  type="text" class="text2" name="topicname" id="input-topicname" temp="Please enter the topic name." onblur="validate(this)" /><br>
					<label><span id="topicname" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Year:</strong></label></td>
					<td><input  type="text" class="text2" name="year1" id="input-year1" temp="Year should be in range 1960 to current year" onblur="numberValidator(this)" /><br>
					<label><span id="year1" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>No. of members:</strong></label></td>
					<td><select name="members1" id="input-members1" temp="Please select the number of members" onblur="validator(this)">
					<option value="Select">Select</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					</select><br>
					<label><span id="members1" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Description:</strong></label></td>
					<td><textarea name='description' id='input-description'  class='text2' temp="Please enter description." onblur="validate1(this)"></textarea><br>
					<label><span id="description" style="color:#C00;"></span></label></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Upload:</strong></label><br></td>
					<td><input type="file" name="file" id="input-file" style='padding:2px;border:0px;width:auto;' temp="Please select a file." onblur="validFile(this)" /><br>(only .pdf,.jpg,.png format supported)
					<label><span id="file" style="color:#C00;"></span></label></td>
					</tr>
					<?php
					}
					elseif($category=='Work Shop')
					{
					?>
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Topic Name:</strong></label></td>
					<td><input  type="text" class="text2" name="topicname1" id="input-topicname1" temp="Please enter the topic name." onblur="validate(this)" /><br>
					<label><span id="topicname1" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Year:</strong></label></td>
					<td><input  type="text" class="text2" name="year2" id="input-year2" temp="Year should be in range 1960 to current year" onblur="numberValidator(this)" /><br>
					<label><span id="year2" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>No. of members:</strong></label></td>
					<td><select name="members2" id="input-members2" temp="Please select the number of members" onblur="validator(this)">
					<option value="Select">Select</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					</select><br>
					<label><span id="members2" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Description:</strong></label></td>
					<td><textarea name='description1' id='input-description1'  class='text2' temp="Please enter description." onblur="validate1(this)"></textarea><br>
					<label><span id="description1" style="color:#C00;"></span></label></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Upload:</strong></label><br></td>
					<td><input type="file" name="file" id="input-file" style='padding:2px;border:0px;width:auto;' temp="Please select a file." onblur="validFile(this)" /><br>(only .pdf,.jpg,.png format supported)
					<label><span id="file" style="color:#C00;"></span></label></td>
					</tr>
					<?php
					}
					elseif($category=='Project')
					{
					?>
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Topic Name:</strong></label></td>
					<td><input  type="text" class="text2" name="topicname2" id="input-topicname2" temp="Please enter the topic name." onblur="validate(this)" /><br>
					<label><span id="topicname2" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Year:</strong></label></td>
					<td><input  type="text" class="text2" name="year3" id="input-year3" temp="Year should be in range 1960 to current year" onblur="numberValidator(this)" /><br>
					<label><span id="year3" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>No. of members:</strong></label></td>
					<td><select name="members3" id="input-members3" temp="Please select the number of members" onblur="validator(this)">
					<option value="Select">Select</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					</select><br>
					<label><span id="members3" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Description:</strong></label></td>
					<td><textarea name='description2' id='input-description2'  class='text2' temp="Please enter description." onblur="validate1(this)"></textarea><br>
					<label><span id="description2" style="color:#C00;"></span></label></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Upload:</strong></label><br></td>
					<td><input type="file" name="file" id="input-file" style='padding:2px;border:0px;width:auto;' temp="Please select a file." onblur="validFile(this)" /><br>(only .pdf,.jpg,.png format supported)
					<label><span id="file" style="color:#C00;"></span></label></td>
					</tr>
					<?php
					}
					elseif($category=='Technical Paper/Publication')
					{
					?>
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Paper Name:</strong></label></td>
					<td><input  type="text" class="text2" name="papername" id="input-papername" temp="Please enter the paper name." onblur="validate(this)" /><br>
					<label><span id="papername" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Year:</strong></label></td>
					<td><input  type="text" class="text2" name="year4" id="input-year4" temp="Year should be in range 1960 to current year" onblur="numberValidator(this)" /><br>
					<label><span id="year4" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Description:</strong></label></td>
					<td><textarea name='description3' id='input-description3'  class='text2' temp="Please enter description." onblur="validate1(this)"></textarea><br>
					<label><span id="description3" style="color:#C00;"></span></label></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Upload:</strong></label><br></td>
					<td><input type="file" name="file" id="input-file" style='padding:2px;border:0px;width:auto;' temp="Please select a file." onblur="validFile(this)" /><br>(only .pdf,.jpg,.png format supported)
					<label><span id="file" style="color:#C00;"></span></label></td>
					</tr>
					<?php
					}
					elseif($category=='Technical Fest')
					{
					?>
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Event Name:</strong></label></td>
					<td><input  type="text" class="text2" name="eventname" id="input-eventname" temp="Please enter the event name." onblur="validate(this)" /><br>
					<label><span id="eventname" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Year:</strong></label></td>
					<td><input  type="text" class="text2" name="year5" id="input-year5" temp="Year should be in range 1960 to current year" onblur="numberValidator(this)" /><br>
					<label><span id="year5" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>No. of members:</strong></label></td>
					<td><select name="members4" id="input-members4" temp="Please select the number of members" onblur="validator(this)">
					<option value="Select">Select</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					</select><br>
					<label><span id="members4" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Description:</strong></label></td>
					<td><textarea name='description4' id='input-description4'  class='text2' temp="Please enter description." onblur="validate1(this)"></textarea><br>
					<label><span id="description4" style="color:#C00;"></span></label></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Position:</strong></label></td>
					<td><select name="position1" id="input-position1" temp="Please select the position" onblur="validator1(this)">
					<option value="Select">Select</option>
					<option value="Winner">Winner</option>
					<option value="Runner Up">Runner Up</option>
					<option value="Participant">Participant</option>
					</select><br>
					<label><span id="position1" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Upload:</strong></label><br></td>
					<td><input type="file" name="file" id="input-file" style='padding:2px;border:0px;width:auto;' temp="Please select a file." onblur="validFile(this)" /><br>(only .pdf,.jpg,.png format supported)
					<label><span id="file" style="color:#C00;"></span></label></td>
					</tr>
					<?php
					}
					elseif($category=='Work Experience')
					{
					?>
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Organisation Name:</strong></label></td>
					<td><input  type="text" class="text2" name="orgname" id="input-orgname" temp="Please enter the organisation name." onblur="validate(this)" /><br>
					<label><span id="orgname" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Experience (In Months):</strong></label></td>
					<td><input  type="text" class="text2" name="experience" id="input-experience" temp="Please enter the experience in months between 0 to 100." onblur="numberValidator(this)" /><br>
					<label><span id="experience" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Designation:</strong></label></td>
					<td><textarea name='designation' id='input-designation'  class='text2' temp="Please enter designation." onblur="validate1(this)"></textarea><br>
					<label><span id="designation" style="color:#C00;"></span></label></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Upload:</strong></label><br></td>
					<td><input type="file" name="file" id="input-file" style='padding:2px;border:0px;width:auto;' temp="Please select a file." onblur="validFile(this)" /><br>(only .pdf,.jpg,.png format supported)
					<label><span id="file" style="color:#C00;"></span></label></td>
					</tr>
					<?php
					}
					elseif($category=='Certification Course')
					{
					?>
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Course Name:</strong></label></td>
					<td><input  type="text" class="text2" name="coursename" id="input-coursename" temp="Please enter the course name." onblur="validate(this)" /><br>
					<label><span id="coursename" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Module:</strong></label></td>
					<td><input  type="text" class="text2" name="module" id="input-module" temp="Please enter the module." onblur="validate1(this)" /><br>
					<label><span id="module" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Score:</strong></label></td>
					<td><input  type="text" class="text2" name="score" id="input-score" temp="Please enter the score." onblur="numberValidator(this)" /><br>
					<label><span id="score" style="color:#C00;"></span></label>
					</td>
					</tr>
										
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Year:</strong></label></td>
					<td><input  type="text" class="text2" name="year6" id="input-year6" temp="Year should be in range 1960 to current year" onblur="numberValidator1(this)" /><br>
					<label><span id="year6" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Description:</strong></label></td>
					<td><textarea name='description5' id='input-description5'  class='text2' temp="Please enter description." onblur="validate2(this)"></textarea><br>
					<label><span id="description5" style="color:#C00;"></span></label></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Upload:</strong></label><br></td>
					<td><input type="file" name="file" id="input-file" style='padding:2px;border:0px;width:auto;' temp="Please select a file." onblur="validFile(this)" /><br>(only .pdf,.jpg,.png format supported)
					<label><span id="file" style="color:#C00;"></span></label></td>
					</tr>
					<?php
					}
					?>
		<tr>
		<td>
		<input type="submit" name="save" value="SAVE"><br><br>
		<a href="newindex.php" style="text-decoration:none;color:blue;">&lt;&lt;&nbsp;Previous</a>
		</td>
		</tr>
		
		</form>
		</table>
    	</fieldset>
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
if(isset($_POST['update']))
{

	$email=$_SESSION['user'][0];
	$name=$_SESSION['user'][1];
	$category=$_POST['category'];
	include '../connection1.php';
	?>
	<html>
<head>
<title>CareerScope</title>

  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
		<link href="Image/icon1.ico" rel="shortcut icon"/>
<script language="Javascript">
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
<!--<script type="text/javascript">
var category="<?php/* echo $category; */?>";


if(category == "Seminar")
{

function validator(tag)
{
	if(tag.value=="Select")
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validateAll()
{
	try
	{
	var p1=validator(document.getElementById('aname'));
	return p1;
	}
	catch(e){alert(e);}
}

}
</script>-->


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
	<li><a href="profile.php">Job profile</a></li>
	<li><a href="goal.php">Job profiling test</a></li>
	<li><a href="know.php">Know your subjects</a></li>
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
<fieldset style="width:600">
        <legend class="student">ENTER ABOUT YOUR ACHIEVEMENTS</legend>
        <form name="create1" method="POST" action="add_record1.php" onsubmit="return validateAll()">
        <table border="0"  style="margin-top:20px;margin-bottom:20px;">
		 <tr align='left'>
    						<th>Category:</th><td><?php echo $category; ?></td>
                            <input type="hidden" id="category" name="category" value="<?php echo $category; ?>">
							<input type="hidden" id="email" name="email" value="<?php echo $email; ?>">
							<input type="hidden" id="uname" name="uname" value="<?php echo $name; ?>">
  					</tr>
					<tr></tr>
                    <?php 
					$flag=1;
					
					if($category=='Sports')
					$table = "sports";
					if($category=='Seminar' || $category=='Work Shop' || $category=='Project')
					$table = "seminar_wp";
					if($category=='Certification Course')
					$table = "certification";
					if($category=='Technical Fest')
					$table = "technical_ds";
					if($category=='Technical Paper/Publication')
					$table = "technical_paper";
					if($category=='Work Experience')
					$table = "work_exp";
					
					$number = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM $table WHERE username='$name' and category='$category'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
					if(mysqli_num_rows($number)==0)
					{
						echo "<center><b>No records present</b></center>";
						$flag=0;
					}
					
					if($category=='Seminar' || $category=='Project' || $category=='Work Shop')
					{
					?>
					<tr><td><label><span style='color:red;'>*</span><strong>Choose name:</strong></label></td>
				<td><select name="aname" id="aname" temp="Please select the name" onblur="validator(this)">
				<option value="Select">Select</option>
                
<?php
  $sql="select * from seminar_wp where email='$email' and category='$category'";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  while($row=mysqli_fetch_array($res))
{
?>
<option value="<?php echo $row['topic'] ?>"><?php echo $row['topic'] ?></option>
<?php
}
?>
</select>
<br>

				<label><span id="aname" style="color:#C00;"></span></label>
                </td></tr>
				
					<?php
					}
					?>
	
<?php
if($category=='Technical Fest')
					{
					?>
					<tr><td><label><span style='color:red;'>*</span><strong>Choose name:</strong></label></td>
				<td><select name="aname" id="aname" temp="Please select the name" onblur="validator(this)">
				<option value="Select">Select</option>
                
<?php
  $sql="select * from technical_ds where email='$email' and category='$category'";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  while($row=mysqli_fetch_array($res))
{
?>
<option value="<?php echo $row['ename'] ?>"><?php echo $row['ename'] ?></option>
<?php
}
?>
</select>
<br>

				<label><span id="aname" style="color:#C00;"></span></label>
                </td></tr>
				
					<?php
					}
					?>	
					
	<?php
if($category=='Technical Paper/Publication')
					{
					?>
					<tr><td><label><span style='color:red;'>*</span><strong>Choose name:</strong></label></td>
				<td><select name="aname" id="aname" temp="Please select the name" onblur="validator(this)">
				<option value="Select">Select</option>
                
<?php
  $sql="select * from technical_paper where email='$email' and category='$category'";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  while($row=mysqli_fetch_array($res))
{
?>
<option value="<?php echo $row['papername'] ?>"><?php echo $row['papername'] ?></option>
<?php
}
?>
</select>
<br>

				<label><span id="aname" style="color:#C00;"></span></label>
                </td></tr>
				
					<?php
					}
					?>

<?php
if($category=='Work Experience')
					{
					?>
					<tr><td><label><span style='color:red;'>*</span><strong>Choose name:</strong></label></td>
				<td><select name="aname" id="aname" temp="Please select the name" onblur="validator(this)">
				<option value="Select">Select</option>
                
<?php
  $sql="select * from work_exp where email='$email' and category='$category'";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  while($row=mysqli_fetch_array($res))
{
?>
<option value="<?php echo $row['co_name'] ?>"><?php echo $row['co_name'] ?></option>
<?php
}
?>
</select>
<br>

				<label><span id="aname" style="color:#C00;"></span></label>
                </td></tr>
				
					<?php
					}
					?>	
<?php
if($category=='Sports')
					{
					?>
					<tr><td><label><span style='color:red;'>*</span><strong>Choose name:</strong></label></td>
				<td><select name="aname" id="aname" temp="Please select the name" onblur="validator(this)">
				<option value="Select">Select</option>
                
<?php
  $sql="select * from sports where email='$email' and category='$category'";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  while($row=mysqli_fetch_array($res))
{
?>
<option value="<?php echo $row['sportsname'] ?>"><?php echo $row['sportsname'] ?></option>
<?php
}
?>
</select>
<br>

				<label><span id="aname" style="color:#C00;"></span></label>
                </td></tr>
				
					<?php
					}
					?>
					
<?php
if($category=='Certification Course')
					{
					?>
					<tr><td><label><span style='color:red;'>*</span><strong>Choose name:</strong></label></td>
				<td><select name="aname" id="aname" temp="Please select the name" onblur="validator(this)">
				<option value="Select">Select</option>
                
<?php
  $sql="select * from certification where email='$email' and category='$category'";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  while($row=mysqli_fetch_array($res))
{
?>
<option value="<?php echo $row['cname'] ?>"><?php echo $row['cname'] ?></option>
<?php
}
?>
</select>
<br>

				<label><span id="aname" style="color:#C00;"></span></label>
                </td></tr>
				
					<?php
					}
					?>					
				<tr>
				<td>
				<input type="submit" name="submit" value="SUBMIT"><br><br>
				<a href="newindex.php" style="text-decoration:none;color:blue;">&lt;&lt;&nbsp;Previous</a>
				</td>
				</tr>		
		</table>
		</form>
    	</fieldset>
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
	
}
?>