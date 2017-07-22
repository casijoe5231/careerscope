<?php
    session_start();
	if(isset($_SESSION['user']))
	{

	include '../connection1.php';
	
	$emaill=$_SESSION['user'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Academic Brand Resume','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<html>
<head>
<title>CareerScope</title>

  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
		<link href="Image/icon1.ico" rel="shortcut icon"/>
<script language="Javascript">
function ts_categories(){
	if(document.getElementById("ts").checked==true)
	document.getElementById("ts_categories").style.display = 'block';
	else
	document.getElementById("ts_categories").style.display = 'none';
	return true;
}

function oth_skills_categories(){
	if(document.getElementById("oth_skills").checked==true)
	document.getElementById("oth_skills_categories").style.display = 'block';
	else
	document.getElementById("oth_skills_categories").style.display = 'none';
	return true;
}

function get_resume()
{
	var stud_id = document.getElementById("stud_id").value;
	url = "http://localhost/eportfolio/"+stud_id+".pdf";
	window.open(url);
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
<table border="0" style="font-family:Comic Sans,Georgia,Serif;">
	<tr>
	<td style="font-family:Comic Sans">
		<td style="font-family:Comic Sans">
		<fieldset style="width:640">
        <legend class="student"> <b>PRE RESUME</b></legend> 
		<h3>Choose the fields for your Resume</h3>
		<form method="post" action="sresume1.php">
		<!--<input type="button" value="View Previous Resume" onclick="get_resume()" ></input>-->
		<input type="hidden" id="stud_id" value="<?php echo $_SESSION['user'][0]; ?>"></input>
			<ul style="list-style-type:none;">
				<li><input type="checkbox" name="co" /> Career Objectives</li>
				<li><input type="checkbox" name="ts" id="ts" onclick="return ts_categories()"/> Technical Skills
					<ul style="list-style-type:none; display:none;" id="ts_categories">
						<li><input type="checkbox" name="ts_os" />  Operating Systems</li>
						<li><input type="checkbox" name="ts_pl" /> Programming Languages</li>
						<li><input type="checkbox" name="ts_sl" />  Scripting Languages</li>
						<li><input type="checkbox" name="ts_oth" />  Career skills</li>
					</ul>
				</li>
				<li><input type="checkbox" name="oth_skills" id="oth_skills" onclick="return oth_skills_categories()"/> Other Skills
					<ul style="list-style-type:none; display:none;" id="oth_skills_categories">
						<li><input type="checkbox" name="skill1" /> Skill 1</li>
						<li><input type="checkbox" name="skill2" /> Skill 2</li>
					</ul>
				</li>
				<li><input type="checkbox" name="ed" /> Education Details</li>
				<li><input type="checkbox" name="we" /> Internship</li>
				<li><input type="checkbox" name="pd" /> Personal Details</li>
				<li><input type="checkbox" name="ho" /> Hobbies</li>
				<li><input type="checkbox" name="lk" /> Languages Known</li>
				<li><input type="checkbox" name="ref" /> References</li>
			</ul>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Submit"/>
		</form>
       	</fieldset></td>
     </td>
	 </tr>
	</table>
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