<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	if(isset($_POST['submit']))
	{
	$email=$_SESSION['user'][0];
	$name=$_SESSION['user'][1];
	$category=$_POST['category'];
	$aname=$_POST['aname'];
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
		<form name="create" method="POST" action="edit.php">			
                    <tr align='left'>
    						<th>Category:</th><td><?php echo $category; ?></td>
                            <input type="hidden" id="category" name="category" value="<?php echo $category; ?>">
							<input type="hidden" id="email" name="email" value="<?php echo $email; ?>">
							<input type="hidden" id="uname" name="uname" value="<?php echo $name; ?>">
							<input type="hidden" id="aname" name="aname" value="<?php echo $aname; ?>">
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
					
					if($category=='Seminar')
					{
						$sql="select * from seminar_wp where email='$email' and category='$category' and topic='$aname'";
						$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
						while($row=mysqli_fetch_array($res))
						{
					?>
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Topic Name:</strong></label></td>
					<td><?php echo $row['topic'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Year:</strong></label></td>
					<td><?php echo $row['year'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>No. of members:</strong></label></td>
					<td><?php echo $row['member'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Description:</strong></label></td>
					<td><?php echo $row['description'] ?></td>
					</tr>
					<?php
					}
					}
					if($category=='Work Shop')
					{
						$sql="select * from seminar_wp where email='$email' and category='$category' and topic='$aname'";
						$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
						while($row=mysqli_fetch_array($res))
						{
					?>
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Topic Name:</strong></label></td>
					<td><?php echo $row['topic'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Year:</strong></label></td>
					<td><?php echo $row['year'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>No. of members:</strong></label></td>
					<td><?php echo $row['member'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Description:</strong></label></td>
					<td><?php echo $row['description'] ?></td>
					</tr>
					<?php
					}
					}
					if($category=='Project')
					{
						$sql="select * from seminar_wp where email='$email' and category='$category' and topic='$aname'";
						$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
						while($row=mysqli_fetch_array($res))
						{
					?>
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Topic Name:</strong></label></td>
					<td><?php echo $row['topic'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Year:</strong></label></td>
					<td><?php echo $row['year'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>No. of members:</strong></label></td>
					<td><?php echo $row['member'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Description:</strong></label></td>
					<td><?php echo $row['description'] ?></td>
					</tr>
					<?php
					}
					}
					if($category=='Technical Paper/Publication')
					{
						$sql="select * from technical_paper where email='$email' and category='$category' and papername='$aname'";
						$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
						while($row=mysqli_fetch_array($res))
						{
					?>
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Paper Name:</strong></label></td>
					<td><?php echo $row['papername'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Year:</strong></label></td>
					<td><?php echo $row['year'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Description:</strong></label></td>
					<td><?php echo $row['description'] ?></td>
					</tr>
					<?php
					}
					}
					if($category=='Technical Fest')
					{
						$sql="select * from technical_ds where email='$email' and category='$category' and ename='$aname'";
						$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
						while($row=mysqli_fetch_array($res))
						{
					?>
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Event Name:</strong></label></td>
					<td><?php echo $row['ename'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Year:</strong></label></td>
					<td><?php echo $row['year'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>No. of members:</strong></label></td>
					<td><?php echo $row['member'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Description:</strong></label></td>
					<td><?php echo $row['member'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Position:</strong></label></td>
					<td><?php echo $row['award'] ?></td>
					</tr>
					<?php
					}
					}
					if($category=='Work Experience')
					{
						$sql="select * from work_exp where email='$email' and category='$category' and co_name='$aname'";
						$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
						while($row=mysqli_fetch_array($res))
						{
					?>
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Organisation Name:</strong></label></td>
					<td><?php echo $row['co_name'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Experience (In Months):</strong></label></td>
					<td><?php echo $row['exp'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Designation:</strong></label></td>
					<td><?php echo $row['designation'] ?></td>
					</tr>
					<?php
					}
					}
					if($category=='Certification Course')
					{
						$sql="select * from certification where email='$email' and category='$category' and cname='$aname'";
						$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
						while($row=mysqli_fetch_array($res))
						{
					?>
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Course Name:</strong></label></td>
					<td><?php echo $row['cname'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Module:</strong></label></td>
					<td><?php echo $row['module'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Score:</strong></label></td>
					<td><?php echo $row['score'] ?></td>
					</tr>
										
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Year:</strong></label></td>
					<td><?php echo $row['year'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Description:</strong></label></td>
					<td><?php echo $row['description'] ?></td>
					</tr>
					<?php
					}
					}
					if($category=='Sports')
					{
						$sql="select * from sports where email='$email' and category='$category' and sportsname='$aname'";
						$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
						while($row=mysqli_fetch_array($res))
						{
					?>
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Sport Name:</strong></label></td>
					<td><?php echo $row['sportsname'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Year:</strong></label></td>
					<td><?php echo $row['year'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>No. of members:</strong></label></td>
					<td><?php echo $row['member'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Played as:</strong></label></td>
					<td><?php echo $row['playedas'] ?></td>
					</tr>
					
					<tr>
					<td><label><span style='color:red;'>*</span><strong>Position:</strong></label></td>
					<td><?php echo $row['position'] ?></td>
					</tr>
					<?php
					}
					}
					?>
					
					<tr>					
						    <td><input type="submit" name="edit" value="EDIT RECORD" /></td>
						   	<td><input type="submit" name="delete" value="DELETE RECORD" /></td>
							
				    </tr>
					
					
</form>
		</table>
		<a href="newindex.php" style="text-decoration:none;color:blue;">&lt;&lt;&nbsp;Previous</a>
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