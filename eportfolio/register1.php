<?php
    session_start();
	if(isset($_SESSION['user']))
	{
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



<link rel="stylesheet" type="text/css" href="../css/stephen1.css">  

</head>
<body>

<div class='container'>
<div class="header"><img src="../images/careerscope_banner.png" width="18%" alt="CareerScope logo" align="left"/>
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
<h3>&nbsp; Academic portfolio menu</h3>
</div>
<br>
<br>
<br>
<div style="float:left;clear:both;margin-top:30px;">
<ul id="sidenavigation" class="MenuBarVertical">
	<li><a href="register1.php">Register</a></li>
	<?php include("smenu.php"); ?>
  <li><a href="newindex.php">
	<?php
	if($first==1)
	echo "Create";
	else
	echo "Add";
	?></a></li>
  <li><a href="sdisplay.php">Display</a></li>
    <li><a href="presresume.php">Resume</a></li>
	<li><a href="../newindex.php">Back to home</a></li>
	</ul>
</div>
<!-- Content here -->

<div id='container_internal' style="float:left;margin-top:30px;">
<fieldset  id="fieldset" style="border-radius:5px;" >
<form action="register.php" method="get">
               <table cellpadding="12" border="0" width="auto">
			<tr>
			<td><span style='color:red;'>*</span><strong>Select current year of graduation:</strong> </td>
			<td>
				<input type="radio" name="sex" id="First year" value="First year">First year
				<input type="radio" name="sex" id="Second year" value="Second year">Second year
				<input type="radio" name="sex" id="Third year" value="Third year">Third year
				<input type="radio" name="sex" id="Fourth year" value="Fourth year">Fourth year
				<input type="radio" name="sex" id="Fifth year" value="Fifth year">Fifth year
				<span id="graduation" style="color:#C00;"></span></label>
			</td>
			</tr>
			<tr>
			<td><span style='color:red;'>*</span><strong>Diploma:</strong> </td>
			<td>
				<select name="diploma" id="input-diploma" temp="Please select the appropriate" onblur="validator(this)">
				<option value="Select">Select</option>
				<option value="Don Bosco Institute of Technology">Don Bosco Institute of Technology</option>
				<option value="St. Johns institute of tech">St. Johns institute of tech</option>
				<option value="Father Agnel institute of Tech">Father Agnel institute of Tech</option>
				<option value="Not Applicable">Not Applicable</option>
				</select><br>
				<span id="diploma" style="color:#C00;"></span></label>
			</td>
			</tr>
			<tr>
			<td>
			   <input type="submit" value="Next" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px;">
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
?>