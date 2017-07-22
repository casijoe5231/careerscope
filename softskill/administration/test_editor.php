 <?php
    session_start();
	if(!isset($_SESSION['administration']))
	{
		header('location:index.php');
		exit();
	}
	include '../styles/theme-master.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Test Editor</title>
<link rel="icon" href="../images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="../styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="../styles/theme-master.css">
<!-- Jquery UI -->
  <link rel="stylesheet" href="../plugins/jqueryui/jquery-ui.css" />
  <script src="../plugins/jqueryui/jquery-1.9.1.js"></script>
  <script src="../plugins/jqueryui/jquery-ui.js"></script>
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
<a href="home.php">Home</a>
 > 
<a href="test_editor.php">Test Editor</a>
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

//Check user acess level
if($_SESSION['administration'][2]=="super")
{
	// Show Form to add Test
	echo "<form action='test_editor.php' method='POST'>";
	echo "<br>1. Define test type:";
	echo "<select name='type' onchange='this.form.submit()'>";
	echo "<option value='select'>Select...</option> ";
	echo " <optgroup label='Aptitude'>";

		echo "<option value='verbal' ";
		if($type=="verbal") echo "selected";
		echo ">Verbal</option><option value='quant' ";
		if($type=="quant") echo "selected";
		echo ">Quantitative</option><option value='logic' ";
		if($type=="logic") echo "selected";
		echo ">Logical</option>";

	echo "</optgroup>";
	echo "<optgroup label='Technical'>";
 
		echo "<option value='compit' ";
		if($type=="compit") echo "selected";
		echo ">Computer/I.T</option><option value='extc' ";
		if($type=="extc") echo "selected";
		echo ">E.X.T.C</option><option value='mech' ";
		if($type=="mech") echo "selected";
		echo ">Mechanical</option>";

	echo "</optgroup>";
	echo "</select>";
}
else
{
		die("<p style=\"text-align:center;\"><img src='../images/access.png' width='125px'><br>Access Restriction !!! <br> You are not allowed to add tests</p><br><br>");
}
?>



<?php
include '../connection.php';
if(isset($_POST['type']))
{  

	$sql="SELECT DISTINCT(subject) FROM test WHERE domain='$type'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	//echo "<form action='post_test.php' method='POST'>";
	echo "<br><table>";	
	echo "<tr><th> 2. Create new subject <input type='text' name='new_subject'></th>";  
	
	if(mysqli_num_rows($res)>0)
	{
		echo "<th> or Select Subject:";
		echo "<select name='select_subject'>";
		while($row = mysqli_fetch_array($res))
		{
			echo "<option value='".$row['subject']."'>".$row['subject']."</option>";      
		}
		echo "</select></th>";
	}
	echo "</tr>";

echo "<tr><th>Enter name for test: <input type='text' name='new_test' required></th></tr>";
echo "<tr><th>Enter test Description: <br><textarea name='desc' rows='4' cols='50' required></textarea></th></tr>";	
echo "<tr><th>Enable Negative Marking<input type='checkbox' name='negative' value='1'></th></tr>";
echo "<tr><th><input type='submit' value='Create New' name='add_test'></th></tr></form>";	
echo "</table>";
}

if(isset($_POST['add_test']) && $type!="select")
{
    
	if(empty($_POST['new_subject']))
	{
	 $subject=$_POST['select_subject'];
	}
	else
	$subject=$_POST['new_subject'];
	
	$test=$_POST['new_test'];
	$time=30;
	$desc=$_POST['desc'];
	if(isset($_POST['negative']))   // Negative marking
		$neg=$_POST['negative'];
	else
		$neg=0;
		
	// Create new test
	// Get current value of id
    $sql="SELECT MAX(id) FROM `test` ";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    while($row = mysqli_fetch_array($res))
	{
			$id=$row['MAX(id)'];      
	}
    $id++;
	
	$sql="INSERT INTO `test`(`id`, `domain`, `subject`, `t_name`, `t_time`, `t_desc`, `negative`) VALUES ('$id', '$type', '$subject', '$test', '$time', '$desc', '$neg')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	if($res)
	{
	  echo "<br><b>Test added successfully. Your test id is ".$id." and test name is ".$test."</b>";
	  echo "<br>You can add questions to test <a href='test_edit.php?id=".$id."'>here</a>";
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

<?php
 // Show all available tests
	$sql="SELECT * FROM domain"; 													// Select Domain
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	echo "<div id='accordion'>";                                                   // JqueryUI Accordion
		while($row = mysqli_fetch_array($res))
		{
			echo "<h3><img src='../images/logo.png' width='20px'><b>&nbsp; ".$row['Name']."</b></h3>";
			$sql="SELECT DISTINCT(subject) FROM test WHERE domain='$row[value]'";   // Select Subject
			$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
			echo "  <div><p>";
				while($row2 = mysqli_fetch_array($res2))
				{
					
					echo "<u>".$row2['subject']."</u></br>";
					$sql="SELECT t_name, id, t_time FROM test WHERE subject='$row2[subject]'";  // Select Test
					$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
						while($row3 = mysqli_fetch_array($res3))
						{
							echo "<div class='test_box'>";
							echo "<img src='../images/test.png' width='35px' style=\"float:left; margin-right:5px;\">";
							echo $row3['t_name'];
							echo "<br>Time: ".$row3['t_time']." mins</br><br>";
							
							echo "</div>";
						}
						
				}
			echo "</p></div>";
		}
    echo "</div>";
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