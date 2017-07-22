<?php
    session_start();
	if(isset($_SESSION['hod']))
	{
	include '../connection1.php';
	
	$emaill=$_SESSION['hod'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	// Tracking the hod
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Academic Brand Add Achievements','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<html>
<head>
<title>CareerScope</title>

  <script src="jquery.js"></script>
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
	<li><a href="#">Event Calender</a></li>
	<li><a href="newindex.php">New Activity</a></li>

	<li><a href="hodindex.php">Back to home</a></li>
</ul>



</div>
<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">
<fieldset>
        <legend class="student">CREATE NEW ACTIVITY</legend>
        
        <table border="0"  style="margin-top:20px;margin-bottom:20px;">
        <form name="doc" method="POST" action="add_record.php" onsubmit="return validateForm()" >			
                    <tr>
    						<th> Mentor Name:</th>
    						<td colspan="2"><?php echo $_SESSION['hod'][1].""; ?></td>
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
						   	<td><input type="submit" name="next" value="ADD ACTIVITY" /></td>
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