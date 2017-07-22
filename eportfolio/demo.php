<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include '../connection1.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="../styles/style.css">
		<link rel="stylesheet" type="text/css" href="../styles/default.css" />
		<link rel="stylesheet" type="text/css" href="../styles/component.css" />
		<script src="../js/modernizr.custom.js"></script>
		
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
<title>CareerScope</title>
</head>
<body>
<div class="container">
<div class="header"><img src="../images/careerscope_banner.png" width="18%" alt="CareerScope logo" align="left"/>
  <img src="../images/dbit.png"  width="6%" alt="DBIT"  align="right"/>

</div>
<div class="header-shadow"></div>
  
<div class="content">
 
 
  <div class="main-content">
  <!-- Main content to display -->
 <div id="container1">
<div style="float:left;"><?php include("menu.php"); ?></div>

<div style="float:left;margin-top:20px;">
<ul id="sidenavigation" class="MenuBarVertical">
	<li><a href="register.php">Register</a></li>
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
</div>
<div style="float:left;margin-left:30px;margin-top:20px;width:800px;">
		
		<fieldset>
        <legend class="student">ENTER ABOUT YOUR ACHIVEMENTS</legend>
        
        <table border="0"  style="margin-top:20px;margin-bottom:20px;">
        <form name="doc" method="post" action="sachivenext.php" >			
                    <tr>
    						<th> Student Name:</th>
    						<td colspan="2"><?php echo $_SESSION['user'][1].""; ?></td>
  					</tr>
                    
  				
                    
  					<tr>
    						<th>Category:</th>
    						<td colspan="2"><label><select name="category" id="category">
                                                    <option value="">Select One</option>
                                        			<option value="Seminar">Seminar</option>
        											<option value="Work Shop">Work Shop</option>
        											<option value="Project">Project</option>
        											<option value="Techinal Fest">Techinal Fest</option>
                                                    <option value="Technical Paper/Publication">Technical Paper/Publication</option>
       												<option value="Work Experience">Work Experience</option>
                                                    <option value="Sports">Sports</option>
                                                    <!--<option value="Drawing">Drawing</option>
                                                    <option value="Dancing/Singing">Dancing/Singing</option>-->
                                                    <option value="Certification Course"> Certification Course</option>
      												</select>
    						</label></td>
                    </tr>
        
  					<tr>					
						    <td><input type="submit" name="update" value="UPDATE/DELETE" /></td>
						   	<td><input type="submit" name="next" value="ADD RECORD" /></td>
				    </tr>
  
		</form>
		</table>
    	</fieldset>
</div>
</div>
 
  </div>
  
</div>
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