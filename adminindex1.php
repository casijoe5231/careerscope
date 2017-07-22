<?php
    session_start();
	if(isset($_SESSION['admin']))
	{
	include 'includes/connection1.php';
	$emails=$_SESSION['admin'][0];
	$sql5="select * from masteruser where email='$emails'";
	$res5=mysqli_query($GLOBALS["___mysqli_ston"], $sql5);
	while($row5=mysqli_fetch_array($res5))
	{
	  $_SESSION['institute']=$row5['institute'];
	}
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emails','Admin Home Page','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<html>
<head>
<title>Administrator</title>

  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css">
		<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<script  type="text/javascript" src="validator3.js" ></script>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>



<link rel="stylesheet" type="text/css" href="css/stephen1.css">  

</head>
<body>

<div class='container'>
<div class="header"><img src="images/byb.jpg" width="160" height="80" alt="CareerScope logo" align="left"/>
  <img src="images/dbit.png"  width="6%" alt="DBIT"  align="right"/>
  </div>
<div class="header-shadow"></div>
<div class='content'>
<br>
<div class='title' style="clear:both;">
<h3>&nbsp; Administrator menu</h3>
</div>
<br>
<br>
<div style="float:left;clear:both;margin-top:30px;">
<ul id="sidenavigation" class="MenuBarVertical">
	<li><a href="adminindex.php">Add New staff</a></li>
	<li><a href="sdetails.php">Existing Staff Details</a></li>
	<li><a href="modify.php">Modify Existing staff</a></li>
	<li><a href="logout.php">Logout</a></li>
	</ul>
</div>
<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">
<!--<fieldset>
        <legend><b>ADD STAFF<b></legend>
		<center>
        <table border="1"  style="margin-top:20px;margin-bottom:20px;">
		
		<tr>
		<th><b>Staff Name</b></th>
		<th><b>Assign role</b></th>
		<th><b>Email</b></th>
		</tr>
		<?php
		/*$sql="select * from masteruser where role='Director' or role='Principal' or role='Lecturer' or role='HOD' or role='Test manager'";
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res))
		{*/
		?>
		<tr><td><?php/* echo $row['name'] */?></td>
		<td>
		<select name="role" id="input-role">
		<option value="Director">Director</option>
		<option value="Principal">Principal</option>
		<option value="HOD">HOD</option>
		<option value="Lecturer">Lecturer</option>
		<option value="Test manager">Test manager</option>
		</select>
		</td>
		<td>
		<form name="trial" method="POST">
		<input type="hidden" name="email" value="<?php/* echo $row['email']; */?>">
		<?php/*
		if($row['status']==0 || $row['status']==2)
		{
		echo "<input type='submit' name='submit' id='submit' value='Send an email' style='cursor:pointer;'>";
		}
		
		if($row['status']==1)
		{
		echo "<font style='color:red'><b>Email sent</b></font>";
		}*/
		?>
		</form>
		</td>
		</tr>
		<?php/*
		}*/
		?>
		
        </table>
		</center>
    	</fieldset>-->
		<?php
		/*if(isset($_POST['submit']))
{
include 'includes/connection1.php';
echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
$email=$_POST['email'];

$sql="update masteruser set status=1 where email='$email'";
$res=mysql_query($sql);

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Email Sent!!', function (e) {
    window.location.href='adminindex.php';
});</SCRIPT>";

}*/
		?>
		<form action="staffreg.php" onsubmit="return validateAll()" method="post">

			
			<fieldset id="fieldset"style="border-radius:5px;">
				<legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>ADD NEW STAFF</b></legend><br>
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
				
				<td><span style='color:red;'>*</span><strong>Select Discipline:</strong> </td>
				<td>
				<select name="discipline" id="input-discipline" temp="Please select the discipline" onblur="validator(this)">
				<option value="Select">Select</option>
				<option value="Engineering">Engineering</option>
				<option value="Management">Management</option>
				<option value="Pharmacy">Pharmacy</option>
				<option value="None">None</option>
				</select><br>
				<span id="discipline" style="color:#C00;"></span></label>
				</td></tr>
				
				<tr>
				<td><label><span style='color:red;'>*</span><strong>Department:</strong></label></td>
				<td><select name="department" id="input-department" temp="Please select the department" onblur="validator1(this)">
				<option value="Select">Select</option>
                <option value="Computer">Computer</option>
                <option value="IT">IT</option>
				<option value="Mechanical">Mechanical</option>
				<option value="EXTC">EXTC</option>
				<option value="Management">Management</option>
				<option value="Pharmacy">Pharmacy</option>
				<option value="None">None</option>
                </select><br>
				<label><span id="department" style="color:#C00;"></span></label>
                </td>
				
				<td><label><span style='color:red;'>*</span><strong>Set role:</strong></label></td>
				<td><input type="checkbox" class="role" name="Director" id="Director" value="Director">Director
				<input type="hidden" name="director1" value="Director">
				<input type="checkbox" class="role" name="Principal" id="Principal" value="Principal">Principal
				<input type="hidden" name="principal1" value="Principal">
				<input type="checkbox" class="role" name="HOD" id="HOD" value="HOD">HOD
				<input type="hidden" name="hod1" value="HOD">
				<input type="checkbox" class="role" name="TPO" id="TPO" value="TPO">TPO
				<input type="hidden" name="tpo1" value="TPO">
				<input type="checkbox" class="role" name="Mentor" id="Mentor" value="Mentor">Mentor
				<input type="hidden" name="mentor1" value="Mentor">
				<input type="checkbox" class="role" name="TestManager" id="TestManager" value="TestManager">Test Manager
				<input type="hidden" name="testmgr1" value="TestManager">
				<input type="checkbox" class="role" name="Lecturer" id="Lecturer" value="Lecturer">Lecturer
				<input type="hidden" name="lecturer1" value="Lecturer">
				<input type="checkbox" class="role" name="SubjectTeacher" id="SubjectTeacher" value="SubjectTeacher">Subject Teacher
				<input type="hidden" name="subjteacher1" value="SubjectTeacher"><br>
				<label><span id="role" style="color:#C00;"></span></label>
                </td>
				</tr>
                
                </table>
			</fieldset>
			
			<br>


<input type='submit' name='submit' id='submit' value='Approve and send email' style='cursor:pointer;'>


</form>
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