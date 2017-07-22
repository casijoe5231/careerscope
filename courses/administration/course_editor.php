 <?php
    session_start();
	if(!isset($_SESSION['administration']))
	{
		header('location:index.php');
		exit();
	}
	include '../connection.php';
	include '../styles/theme-master.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Test Editor</title>
<link rel="icon" href="../images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="../styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="../styles/theme-master.css">

<script src="../plugins/ckeditor/ckeditor.js"></script>
<!-- JqueryUI  -->
  <link rel="stylesheet" href="../plugins/jqueryui/jquery-ui.css" />
  <script src="../plugins/jqueryui/jquery-1.9.1.js"></script>
  <script src="../plugins/jqueryui/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#radio" ).buttonset();
  });
  </script>
  <!-- Tooltip -->
  <script>
  $(function() {
    $( document ).tooltip();
  });
  </script>
  <style>
  label {
    display: inline-block;
    width: 7em;
  }
  #radio
	{
  font-size:14px;
  font-family:Calibri;
	}
  .ui-tooltip
{
  font-size:14px;
  font-family:Calibri;
}	
  </style>
<!-- JqueyUI ends here--> 
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
<h3>Course Editor
<a href="logout.php" style="border:1px solid #09F; background:#09F; padding:8px; color:#FFF;  border-radius:5px; font-size:16px; float:right; margin-right:5%;">Logout</a>
</h3>
<div class="nav">
<a href="home.php">Home</a>
 > 
<a href="course_editor.php">Course Editor</a>
</div>
<br><br>

<div class="panel">
<?php
	if(isset($_POST['course_name']))
	{
	$sql="INSERT INTO `course`(`name`, `domain`, `desc`) VALUES ('$_POST[course_name]','$_POST[ans]','$_POST[course_editor]')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	if($res)
	{
	 echo "<br><p style=\"text-align:center; color:green; \">Course saved successfully</p>";
	}
	else
	{
	 echo "<br><p style=\"text-align:center; color:red; \">Course could not be saved</p>";
	}
	}
?>

<h3>Create a new Course</h3>
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
  
	// Show Form to add Course
	echo "<form action='course_editor.php' method='POST'>";
	
	echo "<h4>1. Course Name: <input type='textbox' name='course_name' required></h4>";
	echo "<h4>2. Select Course domain:";

	
	echo "<div id='radio'>";
	echo "<input type='radio' name='ans' id='radio1' value='gen' required checked /><label for='radio1'>General</label>";
	echo "<input type='radio' name='ans' id='radio2' value='comp' required /><label for='radio2'>Computer</label>";
	echo "<input type='radio' name='ans' id='radio3' value='it' required /><label for='radio3'>I.T</label>";
	echo "<input type='radio' name='ans' id='radio4' value='extc' required /><label for='radio4'>E.X.T.C</label>";
	echo "<input type='radio' name='ans' id='radio5' value='mech' required /><label for='radio5'>Mechanical</label>";
	echo "</div>";
	
	echo "</h4>";
}
else
{
		die("<p style=\"text-align:center;\"><img src='../images/access.png' width='125px'><br>Access Restriction !!! <br> You are not allowed to add tests</p><br><br>");
}
?>


<!-- CK Editor -->
<div class="editor" style="width:90%;">
	<h4>3. Add course description</h4>
	<textarea name="course_editor">&lt;p&gt;Course Description.&lt;/p&gt;</textarea>
	<script>
	CKEDITOR.replace( 'course_editor', {
		filebrowserBrowseUrl: 'plugins/ckeditor/browser/browse.php?type=Images',
		filebrowserUploadUrl: 'plugins/ckeditor/uploader/upload.php?type=Files'
	});
	</script>
	<br><input type="submit" value="Add Course" class="button">
	
</div>
</form>


<!-- CK Editor Ends here -->
<br><br>
</div>
<br>



<br><br><br>
</div>

<?php
footer_admin_fn();
?>
</div>
</div>

</body>
</html>