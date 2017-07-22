<?php
    session_start();
    if(!isset($_SESSION['user']))
	{
		header("location:login.php?error=1");
	}

	if(!($_SESSION['usertype']==6 || $_SESSION['usertype']==8 || $_SESSION['usertype']==11 || $_SESSION['usertype']==13 ||
	 $_SESSION['usertype']==14 || $_SESSION['usertype']==16 || $_SESSION['usertype']==18 || $_SESSION['usertype']==19)){
		header("location:login.php?error=1");
	}
	
	$email=$_SESSION['hod'][0];
	$name=$_SESSION['hod'][1];
	//$category=$_POST['category'];
	include '../connection1.php';
?>
<html>
<head>
<title>CareerScope</title>

  <script src="../jquery.js"></script>
  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css">
		<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
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

<table border="0" style="align:center;">
	<tbody><tr><td>
    <table id="navigation" style="align:center;width:1290px;">
    
        <tbody><tr>
          <td><div align="center"><a href="../mentoring.php">Main Menu</a></div></td>
          <td><div align="center"><a href="../mentorevents.php">Events</a></div></td>
        </tr>
    </tbody></table>
    </td></tr>
</tbody></table>

<br />

<br />
<div class='title' style="clear:both;">
<h3>&nbsp; Academic Brand menu</h3>
</div>
<br>
<br>
<br>
<div style="float:left;clear:both;margin-top:30px;">
<ul id="sidenavigation" class="MenuBarVertical">
	<!--li><a href="reports.php">Test reports</a></li-->
	<li><a href="../mentorevents.php">Event Calender</a></li>
	<li><a href="add_record.php">New Activity</a></li>

	<li><a href="../hodindex.php">Back to home</a></li>
	</ul>

</div>
<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">
<fieldset style="width:600">
        <legend class="student">ADD AN ACTIVITY</legend>
        
        <table border="0"  style="margin-top:20px;margin-bottom:20px;">
		<form name="create" method="POST" action="add.php" onsubmit="return validateAll()" enctype="multipart/form-data">			
                    <tr align='left'>
                            <input type="hidden" id="category" name="category" value="<?php echo $category; ?>">
							<input type="hidden" id="email" name="email" value="<?php echo $email; ?>">
							<input type="hidden" id="uname" name="uname" value="<?php echo $name; ?>">
  					</tr>
                    
					
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Activity Title:</strong></label></td>
					<td><input  type="text" class="text2" name="actname" id="input-topicname1" temp="Please enter the topic name." onblur="validate(this)" /><br>
					<label><span id="topicname1" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Date:</strong></label></td>
					<td><input  type="date" class="text2" name="date" id="input-year2" temp="Year should be in range 1960 to current year" onblur="numberValidator(this)" /><br>
					<label><span id="year2" style="color:#C00;"></span></label>
					</td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Choose Years:</strong></label></td>
					<td><select name="members" id="input-members2" temp="Choose Years" onblur="validator(this)">
					<option value="Select">Select</option>
					<option value="ALL">All</option>
					
					<option value="FYMMS">FYMMS</option>
					
					<option value="SYMMS">SYMMS</option>
					
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
					<tr>
		<td>
		<input type="hidden" name="creator" value="<?php echo $name ?> ">
		<input type="submit" name="save" value="ADD"><br><br>
		<a href="../mentorevents.php" style="text-decoration:none;color:blue;">&lt;&lt;&nbsp;Previous</a>
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
if(isset($_POST['update']))
{

	$email=$_SESSION['hod'][0];
	$name=$_SESSION['hod'][1];
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
					
					$number = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM $table WHERE hodname='$name' and category='$category'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
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
?>