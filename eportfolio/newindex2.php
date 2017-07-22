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
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Academic Brand Add Achievements','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
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
	<!--li><a href="profile.php">Job profile</a></li>
	<li><a href="goal.php">Job profiling test</a></li>
	<li><a href="know.php">Know your subjects</a></li-->
  <li><a href="choose.php">Choose your mentor</a></li>
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
<fieldset>
        <legend class="student">ENTER ABOUT YOUR ACHIEVEMENTS</legend>
        
        <table border="0"  style="margin-top:20px;margin-bottom:20px;">
        <form name="doc" method="POST" action="add_record.php" onsubmit="return validateForm()" >			
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
        											<option value="Technical Fest">Technical Fest</option>
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