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
    width: 5em;
  }
  </style>
<!-- JqueyUI ends here-->  

<!-- Modal -->
<!-- Modal Form CSS files -->
<link type='text/css' href='../plugins/modal/css/basic.css' rel='stylesheet' media='screen' />
<!-- Load jQuery, SimpleModal and Basic JS files -->
<script type='text/javascript' src='../plugins/modal/js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='../plugins/modal/js/basic.js'></script>
<script>
function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
}
</script> 
<!-- Modal ends here -->

  <style>
    .top
	{
	 width: 65%;
	 margin-left:auto;
	 margin-right:auto;
	 margin-bottom:5px;
	 border-radius:5px;
     -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
      border-width:1px;
	padding-left:10px;
	padding-top:6px;
	padding-bottom:4px;
	}
    .question
	{
	 width: 65%;
	 background: url('../images/img_title.jpg') repeat-x;
	 background-color:#CCFFFF;
	 margin-left:auto;
	 margin-right:auto;
	 margin-bottom:5px;
	 border-radius:5px;
     -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
      border-width:1px;
	padding-left:10px;
	padding-top:6px;
	padding-bottom:4px;
	}
    .option
	{
	width: 65%;	 
	 background-color:#CCFF99;
	 margin-left:auto;
	 margin-right:auto;
	 border-radius:5px;
     -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
      border-width:1px;
     margin-top:6px;

	}
    .option_green
	{
	background-color:#33CC33;
	float:left;
	 border-radius:5px;
     -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
      border-width:1px;
	  margin-right:10px;
	  padding-left:4px;
	}
	.option_red
	{
	background-color:#CFCFCF;
	float:left;
	 border-radius:5px;
     -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
      border-width:1px;
	  margin-right:10px;
	  padding-left:4px;
	}
	#radio
	{
  font-size:14px;
  font-family:Calibri;
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
<h3>Test Edit
<a href="logout.php" style="border:1px solid #09F; background:#09F; padding:8px; color:#FFF;  float:right; border-radius:5px; font-size:16px; margin-right:5%;">Logout</a>
</h3>
<div class="nav">
<a href="home.php">Home</a>
> 
<a href="test_management.php">Test Management</a>
 > 
<a href="test_edit.php">Test Edit</a>
</div>
<br><br>

<div class="panel">
<div class="top">

<!--          Add Question            -->

<?php
//Add Question
include '../connection.php';
if(isset($_POST['add_question']))
{

	if(isset($_GET['id']))
	{   
		$id=$_GET['id'];
	}
	else
	{
		die("Critical error");	
	} 
 // Get current value of question id
    $sql="SELECT MAX(q_id) FROM `questions` WHERE t_id='$id' ";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    while($row = mysqli_fetch_array($res))
	{
			$q_id=$row['MAX(q_id)'];      
	}
    $q_id++;
    
	$question=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['question']);
	$option1=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['opt1']);
	$option2=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['opt2']);
	$option3=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['opt3']);
	$option4=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['opt4']);
	$ans=$_POST['ans'];
    
   
	
	$sql="INSERT INTO `questions`(`t_id`, `q_id`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `ans`) VALUES ('$id', '$q_id', '$question', '$option1', '$option2','$option3','$option4', '$ans')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	if($res)
	{
	  echo "<br><p style=\" text-align:center; color:#009933;\"><b>Test question added successfully.</b></p>";
	}
}

if(isset($_GET['id']))
{ 

	echo "<h3><img src='../images/edit.png' width='25px'>&nbsp;Add questions for test: ";
	$sql="SELECT * FROM `test` WHERE id='$_GET[id]'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	while($row = mysqli_fetch_array($res))
	{
	 echo $row['t_name'];                    // Show Test name
	}
	echo "</h3>";
	
	
	echo "<form action='test_edit.php?id=".$_GET['id']."' method='POST'>";
	echo "<table>";
	echo "<tr>";
	echo "<th>";
	echo "</th></tr>";
	echo "<tr><th>Question:";
	echo "</th><th><textarea rows='10' cols='50' name='question' required>";
	echo "</textarea>";
	echo "<br><h5>Note: You can use html tags such as bold&lt;b&gt;, italic&lt;i&gt;, new line&lt;br&gt; etc. <a href='#' title='ThemeRoller: jQuery UI's theme builder application' >?</a> </h5>";
	echo "</th></tr>";

	echo "<tr><th>Option 1:</th>";
	echo "<th><input type='textbox' name='opt1' size='60' required></th></tr>";
	echo "<tr><th>Option 2:</th>";
	echo "<th><input type='textbox' name='opt2' size='60' required></th></tr>";
	echo "<tr><th>Option 3:</th>";
	echo "<th><input type='textbox' name='opt3' size='60' required></th></tr>";
	echo "<tr><th>Option 4:</th>";
	echo "<th><input type='textbox' name='opt4' size='60' required></th></tr>";
	echo "<tr><th>Correct choice:</th>";
	echo "<th>";
	
	echo "<div id='radio'>";
	echo "<input type='radio' name='ans' id='radio1' value='1' required /><label for='radio1'>Option 1</label>";
	echo "<input type='radio' name='ans' id='radio2' value='2' required /><label for='radio2'>Option 2</label>";
	echo "<input type='radio' name='ans' id='radio3' value='3' required /><label for='radio3'>Option 3</label>";
	echo "<input type='radio' name='ans' id='radio4' value='4' required /><label for='radio4'>Option 4</label>";
	echo "</div>";
	echo "</th></tr>";

	echo "<tr><th></th><th><br><input type='submit' value='Add' name='add_question' style=\"border:1px solid #09F; background:#09F; padding:8px; color:#FFF;  border-radius:5px; font-size:16px;\"></th></tr>";
	echo "</table>";
	echo "<br><br>";
	echo "</form>";
}

?>
<!--          Add Question ends here            -->

---------------------------------------------------------------------------------------------------------------------------------------------------------------------

<!--          Show Questions            -->
<?php
include '../connection.php';
$q_id=0;
$q_index=1;  
if(isset($_POST['edit_question']))
{
 
 $t_id=$_GET['id'];
 $q_id=$_COOKIE["question_id"];
 $question=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['question']);
 $option1=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['choice1']);
 $option2=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['choice2']);
 $option3=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['choice3']);
 $option4=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['choice4']);
 if(isset($_POST['ans'])) // If new option is selected 
 {
  $ans= $_POST['ans'];
  $sql="UPDATE questions SET question='$question', opt1='$option1', opt2='$option2', opt3='$option3', opt4='$option4', ans='$ans' WHERE t_id='$t_id' AND q_id='$q_id'";
 }
 else{                 // If new option is not selected
 $sql="UPDATE questions SET question='$question', opt1='$option1', opt2='$option2', opt3='$option3', opt4='$option4' WHERE t_id='$t_id' AND q_id='$q_id'";
 }
 $result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
 if($result)
 {
  echo "<br><p style=\" text-align:center; color:#009933;\"><b>Edit Successful</b></p>";
 }
 else
 echo "Changes could not be saved";
 
 //echo "<meta http-equiv='refresh' content='0;url=".$_SERVER['HTTP_REFERER']."'>";
}

if(isset($_GET['id']))
{

    echo "<h3 style=\"text-align:center;\">Test Questions</h3>";
	// Show Test time
	$id=$_GET['id'];
	$sql="SELECT t_time, negative, correct, incorrect FROM test WHERE id=$id";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    $q_total=mysqli_num_rows($res);      
		while($row = mysqli_fetch_array($res))
		{
			echo "<b>Test Time: </b>".$row['t_time']." minutes";
		    // Edit test time
			echo "<div style=\" float:right;\"><form action='test_edit.php' method='POST'>Change test time to:<input type='textbox' name='change_time' size='3'> minutes";
			echo "<div style=\" padding-top:1px; float:right;\"><input type='hidden' name='edit_time' value='".$id."'><input type='image' src='../images/check.png' width='25px;'></div></form></div>";
         
			// Edit Negative marking
			echo "<br><br><div style=\" float:right;\"><form action='test_edit.php' method='POST'>Negative marking:";
			echo "<input type='hidden' name='edit_neg' value='".$id."'>";
			echo "<select name='negative' onchange='this.form.submit()'>";
			echo "<option value='1' ";
			if($row['negative']==1) echo "selected";
			echo ">Enabled</option>";
			
			echo "<option value='0' ";
			if($row['negative']==0) echo "selected";
			echo ">Disabled</option>";		
			
			echo "</select></form></div>";
			
			// Edit marks for questions.
			echo "<br><br><div style=\" float:right;\"><form action='test_edit.php' method='POST'>";
			echo "Marks for correct answer:<input type='text' size='3' name='edit_correct' value='".$row['correct']."'>";
			
			if($row['negative']==1)
			echo ",incorrect answer:<input type='text' size='3' name='edit_incorrect' value='".$row['incorrect']."'>";
						
			echo "<div style=\" padding-top:1px; float:right;\"><input type='hidden' name='edit_marks' value='".$id."'><input type='image' src='../images/check.png' width='25px;'></div></form></div>";
	
	    }
	
	
	$sql="SELECT * FROM questions WHERE t_id='$_GET[id]'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    $q_total=mysqli_num_rows($res);
	echo "<b>Total questions in Test: </b>".$q_total."<br><br>";
      
		while($row = mysqli_fetch_array($res))
		{

            $ans=$row['ans'];
			
			echo "<div class='question'><b style=\" color:white;\">Question ".$q_index."</b>";
			if($row['q_id']==$q_id)
			{
			echo "<b style=\" color:white;\"> - Edited</b>";
			}
			echo "<div style=\" float:right; margin-right:10px;\"><form action='test_edit.php' method='POST'><input type='hidden' name='del_question' value='".$row['q_id']."'><input type='image' src='../images/delete2.png' width='25px;'></form></div>";
			echo "<div id='basic-modal' style=\" float:right; margin-right:10px;\"><a href='#' class='basic' onClick=\"setCookie('question_id','".$row['q_id']."',1)\"><input type='image' src='../images/edit2.png'  width='25px;'name='edit_question'></a></div>";
			echo "<br><br>".$row['question']."</div>";
			
			echo "<div class='option'>";
			if($ans==1) 
			echo"<div class='option_green'>";
			else
			echo"<div class='option_red'>";
			echo "Option 1: &nbsp;";
			echo "</div>".$row['opt1']."</div>";
			
			echo "<div class='option'>";
			if($ans==2) 
			echo"<div class='option_green'>";
			else
			echo"<div class='option_red'>";
			echo "Option 2: &nbsp;";
			echo "</div>".$row['opt2']."</div>";
			
			echo "<div class='option'>";
			if($ans==3) 
			echo"<div class='option_green'>";
			else
			echo"<div class='option_red'>";
			echo "Option 3: &nbsp;";
			echo "</div>".$row['opt3']."</div>";

			echo "<div class='option'>";
			if($ans==4) 
			echo"<div class='option_green'>";
			else
			echo"<div class='option_red'>";
			echo "Option 4: &nbsp;";
			echo "</div>".$row['opt4']."</div>";


			echo "<br><br>";
			$q_index++;
		}

    echo "</div>";
}
else
{
	echo "<h3 style=\"text-align:center;\"><br>Processing<br>";
	echo "<img src='../images/preload.gif' width='50px'></h3>";
}

if(isset($_POST['del_question']))
{
$q_id=$_POST['del_question'];
// Delete Test question
$sql="DELETE FROM `questions` WHERE q_id=$q_id";
$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<meta http-equiv='refresh' content='0;url=".$_SERVER['HTTP_REFERER']."'>";
}

if(isset($_POST['change_time']))
{
$time=$_POST['change_time'];
$id=$_POST['edit_time'];
// Change Test Time
$sql="UPDATE `test` SET `t_time`=$time WHERE `id`=$id";
$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<meta http-equiv='refresh' content='0;url=".$_SERVER['HTTP_REFERER']."'>";
}
if(isset($_POST['negative']))
{
$neg=$_POST['negative'];
$id=$_POST['edit_neg'];
// Change Negative marking
$sql="UPDATE `test` SET `negative`=$neg WHERE `id`=$id";
$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<meta http-equiv='refresh' content='0;url=".$_SERVER['HTTP_REFERER']."'>";
}
if(isset($_POST['edit_marks']))
{
$id=$_POST['edit_marks'];
// Change Marks for question
$correct=$_POST['edit_correct'];
if(isset($_POST['edit_incorrect']))
{
	$incorrect=$_POST['edit_incorrect'];
	$sql="UPDATE `test` SET `correct`=$correct, `incorrect`=$incorrect WHERE `id`=$id";
	$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
}
else
{	
	$sql="UPDATE `test` SET `correct`=$correct WHERE `id`=$id";
	$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
}

echo "<meta http-equiv='refresh' content='0;url=".$_SERVER['HTTP_REFERER']."'>";
}


?>

<br><br>
</div>
<br>
</div>



<br>
</div>

<?php
footer_admin_fn();
?>
</div>


</body>
</html>