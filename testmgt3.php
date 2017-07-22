 <?php
    session_start();
	if(isset($_SESSION['testmgr']))
	{
	

	include 'styles/theme-master.php';
	$email=$_SESSION['testmgr'][0];
	include 'connection1.php';
		$sql1="SELECT * FROM masteruser WHERE email='$email'";
		$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
		while($row1 = mysqli_fetch_array($res1))
		{
			$discipline=$row1['discipline'];
			$branch=$row1['branch'];
		}
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$email','Add New Test','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>

<!DOCTYPE html>
<html>
<head>
<title>Test Manager</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="aptitude/styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="aptitude/styles/theme-master.css">
<!-- Jquery UI -->
  <link rel="stylesheet" href="plugins/jqueryui/jquery-ui.css" />
  <script src="plugins/jqueryui/jquery-1.9.1.js"></script>
  <script src="plugins/jqueryui/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#accordion" ).accordion();
  });
 </script>
<!-- Jquery UI ends here --> 
<style>
table {
	width: auto;
	text-align:left;
	}
</style>	
</head>

<body>
<div class="bg">
<div class="container">
<?php
header_admin_fn();
?>
<div class="content clearfix">
<h3>Test Editor
<a href="logout.php" style="border:1px solid #09F; background:#09F; padding:8px; color:#FFF;  border-radius:5px; font-size:16px; float:right; margin-right:5%;">Logout</a>
</h3>
<div class="nav">
<a href="testmgthome.php">Home</a>
 > 
<a href="testmgt.php">Test Editor</a>
</div>
<br><br>

<div class="panel">
<h3>Create a new Test</h3>
<?php
if(isset($_POST['type']))
{ 
 //Set dropdown to previously selected value
 $type=$_POST['type'];
}
else if(!isset($type))
{
 $type="default";
}
?>


<?php

	// Show Form to add Test
	echo "<form action='testmgt.php' method='POST'>";
	echo "<table>";
	echo "<tr>";
	echo "<td>";
	echo "<br>1. Choose area of expertise:";
	echo "</td>";
?>	
<td>
	<select name="expertise" id="expertise" temp="Please select the expertise" onblur="validator(this)">
	<option value="Select">Select</option>
              
<?php
  $sql="select expertise from approve_expertise where email='$email'";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  while($row=mysqli_fetch_array($res))
{
?>
<option value="<?php echo $row['expertise']; ?>"><?php echo $row['expertise']; ?></option>
<?php
}
?>
</select>
<br>
<label><span id="expertise" style="color:#C00;"></span></label>
</td></tr>
<tr>
<td>2. Select Test Level:</td>
				<td><select name="level" id="input-level" temp="Please select the level" onblur="validator(this)">
				<option value="Select">Select</option>
				<option value="1">Beginner</option>
				<option value="2">Intermediate</option>
				<option value="3">Expert</option>
				</select><br>
				<span id="level" style="color:#C00;"></span></label>
				</td>
				</tr>
				<tr>
				<td>3. Enter test Description:</td> <td><textarea name='desc' rows='4' cols='50' required></textarea></td>
				</tr>
				<tr>
				<td>Enable Negative Marking</td><td><input type='checkbox' name='negative' value='1'></td>
				</tr>
				</table>

				<br>
				<input type='submit' value='Create New' name='add_test'>
				</form>
<?php
if(isset($_POST['add_test']))
{
	$time=15;
	$level=$_POST['level'];
	if(isset($_POST['expertise']))
	$expertise=$_POST['expertise'];
	else
		$expertise="Normal";
	$desc=$_POST['desc'];
	if(isset($_POST['negative']))   // Negative marking
		$neg=$_POST['negative'];
	else
		$neg=0;
		
	// Create new test
	// Get current value of id
    $sql="SELECT MAX(tm_id) FROM `techtest_master` ";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    while($row = mysqli_fetch_array($res))
	{
			$id=$row['MAX(tm_id)'];      
	}
    $id++;

	$sql="INSERT INTO `techtest_master`(`tm_id`,`testname`,`level`,`test_time`,`test_desc`,`negative`,`branch`,`discipline`) VALUES ('$id','$expertise','$level','$time','$desc','$neg','$branch','$discipline')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	if($res)
	{
	  echo "<br><b>Test added successfully. Your test id is ".$id."</b>";
	  echo "<br>You can add questions to test <a href='enter_questions.php?id=".$id."&level=".$level."'>here</a>";
	}
	else
	{
	 echo "Test could not be added.";
	}

}
?>
</form>
<br><br>
</div>
<br>


<div class="panel">
<br><b>Available Tests:</b>
<br>
<br>
<?php
 // Show all available tests
	$sql="select * from techtest_master"; 													// Select Domain
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	while($row = mysqli_fetch_array($res))
						{
							echo "<div class='test_box'>";
							echo "<img src='images/test.png' width='35px' style=\"float:left; margin-right:5px;\">";
							echo $row['testname'];
							if($row['level']==1)
							{
								echo "(Beginner)";
							}
							if($row['level']==2)
							{
								echo "(Intermediate)";
							}
							if($row['level']==3)
							{
								echo "(Expert)";
							}
							echo "<br>Time: ".$row['test_time']." mins</br><br>";
							echo "</div>";
						}
?>
<br><br>
</div>

<br><br><br>
</div>

<?php
footer_admin_fn();
?>
</div>
</div>

</body>
</html>
<?php
}
else if( isset($_SESSION['hod']) )
	{
	

	include 'styles/theme-master.php';
	$email=$_SESSION['hod'][0];
	include 'connection1.php';
		$sql1="SELECT * FROM masteruser WHERE email='$email'";
		$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
		while($row1 = mysqli_fetch_array($res1))
		{
			$discipline=$row1['discipline'];
			$branch=$row1['branch'];
		}
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$email','Add New Test','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>

<!DOCTYPE html>
<html>
<head>
<title>Test Manager</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="aptitude/styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="aptitude/styles/theme-master.css">
<!-- Jquery UI -->
  <link rel="stylesheet" href="plugins/jqueryui/jquery-ui.css" />
  <script src="plugins/jqueryui/jquery-1.9.1.js"></script>
  <script src="plugins/jqueryui/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#accordion" ).accordion();
  });
 </script>
<!-- Jquery UI ends here --> 
<style>
table {
	width: auto;
	text-align:left;
	}
</style>	
</head>

<body>
<div class="bg">
<div class="container">
<?php
header_admin_fn();
?>
<div class="content clearfix">
<h3>Test Editor
<a href="logout.php" style="border:1px solid #09F; background:#09F; padding:8px; color:#FFF;  border-radius:5px; font-size:16px; float:right; margin-right:5%;">Logout</a>
</h3>
<div class="nav">
<a href="testmgthome.php">Home</a>
 > 
<a href="testmgt.php">Test Editor</a>
</div>
<br><br>

<div class="panel">
<h3>Create a new Test</h3>
<?php
if(isset($_POST['type']))
{ 
 //Set dropdown to previously selected value
 $type=$_POST['type'];
}
else if(!isset($type))
{
 $type="default";
}
?>


<?php

	// Show Form to add Test
	echo "<form action='testmgt.php' method='POST'>";
	echo "<table>";
	echo "<tr>";
	echo "<td>";
	//echo "<br>1. Choose area of expertise:";
	//echo "</td>";
?>	
<td>
	<!--select name="expertise" id="expertise" temp="Please select the expertise" onblur="validator(this)">
	<option value="Select">Select</option>
              
<?php
  $sql="select expertise from approve_expertise where email='$email'";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  while($row=mysqli_fetch_array($res))
{
?>
<option value="<?php echo $row['expertise']; ?>"><?php echo $row['expertise']; ?></option>
<?php
}
?>
</select-->
<br>
<label><span id="expertise" style="color:#C00;"></span></label>
</td></tr>
<tr>
<td>Select Test Level:</td>
				<td><select name="level" id="input-level" temp="Please select the level" onblur="validator(this)">
				<option value="Select">Select</option>
				<option value="1">Beginner</option>
				<option value="2">Intermediate</option>
				<option value="3">Expert</option>
				</select><br>
				<span id="level" style="color:#C00;"></span></label>
				</td>
				</tr>
				<tr>
				<td>Enter test Description:</td> <td><textarea name='desc' rows='4' cols='50' required></textarea></td>
				</tr>
				<tr>
				<td>Enable Negative Marking</td><td><input type='checkbox' name='negative' value='1'></td>
				</tr>
				</table>

				<br>
				<input type='submit' value='Create New' name='add_test'>
				</form>
<?php
if(isset($_POST['add_test']))
{
	$time=15;
	$level=$_POST['level'];
	if(isset($_POST['expertise']))
	$expertise=$_POST['expertise'];
	else
		$expertise="Normal";
	$desc=$_POST['desc'];
	if(isset($_POST['negative']))   // Negative marking
		$neg=$_POST['negative'];
	else
		$neg=0;
		
	// Create new test
	// Get current value of id
    $sql="SELECT MAX(tm_id) FROM `techtest_master` ";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    while($row = mysqli_fetch_array($res))
	{
			$id=$row['MAX(tm_id)'];      
	}
    $id++;

	$sql="INSERT INTO `techtest_master`(`tm_id`,`testname`,`level`,`test_time`,`test_desc`,`negative`,`branch`,`discipline`) VALUES ('$id','$expertise','$level','$time','$desc','$neg','$branch','$discipline')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	if($res)
	{
	  echo "<br><b>Test added successfully. Your test id is ".$id."</b>";
	  echo "<br>You can add questions to test <a href='enter_questions.php?id=".$id."&level=".$level."'>here</a>";
	}
	else
	{
	 echo "Test could not be added.";
	}

}
?>
</form>
<br><br>
</div>
<br>


<div class="panel">
<br><b>Available Tests:</b>
<br>
<br>
<?php
 // Show all available tests
	$sql="select * from techtest_master"; 													// Select Domain
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	while($row = mysqli_fetch_array($res))
						{
							echo "<div class='test_box'>";
							echo "<img src='images/test.png' width='35px' style=\"float:left; margin-right:5px;\">";
							echo $row['testname'];
							if($row['level']==1)
							{
								echo "(Beginner)";
							}
							if($row['level']==2)
							{
								echo "(Intermediate)";
							}
							if($row['level']==3)
							{
								echo "(Expert)";
							}
							echo "<br>Time: ".$row['test_time']." mins</br><br>";
							echo "</div>";
						}
?>
<br><br>
</div>

<br><br><br>
</div>

<?php
footer_admin_fn();
?>
</div>
</div>

</body>
</html>


<?php 
}
else
{	header('location:login.php');
		exit();
}
?>