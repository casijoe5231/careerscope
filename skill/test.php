<?php
    session_start();
	if(!isset($_SESSION['username']))
	{
		header('location:index.php');
		exit();
	}
	include 'styles/theme-master.php';
	include 'connection.php';
	?>
<!DOCTYPE html>
<html><head><title>Skill Assessment Home</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
<script type="text/javascript">
function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}
</script>
<style>
 table
 {
  margin-left:auto;
  margin-right:auto;

 }
</style>
</head>
<body>
<div class="bg">
<div class="container">
<?php
header_fn();
?>
<div class="content">
<br>
<div class="title">
<h3>&nbsp; Welcome 
<?php 
echo $_SESSION['username'][1];
?>
</h3>
</div>

<br>
<br>
<br>
<br><br><br>
<?php 

    
	echo "You can continue providing feedback or you can ";
	echo "<a href=\"javascript:close_window();\">Close this window</a>";
	echo "<br><br><a href='test_mod2.php' style=\"border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px;\">Continue</a>";
	
    
	//echo "<br><br><br>//Testing information";
	//echo "<table>";
    //foreach ($_POST as $key => $value) {
    //    echo "<tr>";
    //    echo "<td>";
    //    echo $key;
    //    echo "</td>";
    //    echo "<td>";
    //    echo $value;
    //    echo "</td>";
    //    echo "</tr>";
    //}
    //echo "</table>";

?>

<br><br>
<div class="box">
<br>
<?php
// For Qualitative Feedback
if(isset($_POST['Qualitative']))
{
 if($_POST['review']<>"")
 {   
 	 $requestor=$_GET['user'];
	 $username=$_SESSION['username'][0];
     $sql="SELECT * FROM mod2_qualitative WHERE reviewer='$username' AND requestor='$requestor'";
	 $result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	 $reviews= mysqli_num_rows($result);
	 if($reviews<=4)
	 {

		 $review= ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['review']) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
		 $sql="INSERT INTO `mod2_qualitative`(`reviewer`, `requestor`, `question`, `review`) VALUES ('$username','$requestor','$_POST[question]','$review')";
		 $result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		 if($result)
		 {
			echo "<b style=\"color:#339933; \">Review saved successfully </b>&nbsp; Reviews submitted:".($reviews+1);
		 }
		 else
		 {
		   echo "<b>Review could not be saved !</b>";
		 } 
	}
	else
		echo "You cannot submit more than 5 reviews";
 }
 else
	echo "Please provide a review<br>";
}
?>
<br>
<h3> Qualitative Feedback </h3>
Please provide a short feedback for this 
<?php
$user=$_GET['user'];
   echo "<br> You are providing feedback for :<br>";
   $username=$_SESSION['username'][0];
	     $sql="   SELECT fname, lname  FROM user WHERE username = '$user'";		
	     $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	     while($row = mysqli_fetch_array($res))
		 {
		 echo "<img src='images/im-user_profile.png' width='15px'>";
		 echo "<b>".$row['fname']." ".$row['lname']."</b>";
		 }
?>		 
<br><i>Note: You can provide a maximum of upto 5 reviews.</i>
<?php
$user=$_GET['user'];
echo "<form action='test.php?user=".$user."' method='POST'>";
?>
    <table cellpadding="5">
	<tr><td>Select:
	<select name="question">
		<option value="general_review">General Review</option>
		<option value="written_communication">Written Communication</option>
		<option value="verbal_communication">Verbal Communication</option>
		<option value="flexibility">Fexibility</option>
		<option value="persuading">Persuading</option>
		<option value="leadership">Leadership</option>
		<option value="planning&organising">Planning AND Organising</option>
		<option value="problem_solving">Investigating, Analysing AND Problem Solving</option>
		<option value="professionalism">Developing Professionalism</option>
	</select>
	</td></tr>
	<tr>
		<td>
		<textarea rows="10" cols="60" name="review" placeholder="Please provide a review here ...."></textarea>
		</td>
	</tr>
	<tr>
		<td>
		<input type="submit" value="Submit" name="Qualitative">
		</td>
	</tr>
	</table>
</form>
</div>

<a href="logout.php" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; float:right; margin-right:25px;">LOGOUT</a>



<br><br>
</div>

<?php
footer_fn();
?>
</div>
</div>

</body>
</html>