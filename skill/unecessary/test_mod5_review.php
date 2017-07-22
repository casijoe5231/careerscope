<?php
    session_start();
	if(!isset($_SESSION['user2']))
	{
		header('location:../login.php');
		exit();
	}
	include 'styles/theme-master.php';
	include 'connection1.php';
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
echo $_SESSION['user2'][1];
?>
</h3>
</div>

<br>
<br>
<br>
<br><br><br>
<?php 
if(isset($_POST["submit_feed"]))
    {
        //Calculate using formula		
		
		
		//Save Result for user
		include 'connection1.php';
		$username=$_SESSION['user2'][1];
		$requestor=$_GET['uusers'];
		$data_array=array();
        foreach ($_POST as $key => $value) 
		{
		   array_push($data_array,$value);
        }
        array_pop($data_array); // Remove last value from array, since last value is SAVE
		$ser_array = serialize($data_array);  // Serialize array to be stored as single value in database
		
		$query="SELECT reviewer,val FROM mod2_requests WHERE reviewer='$username' AND requestor='$requestor'";
		$result=mysqli_query($GLOBALS["___mysqli_ston"], $query);
		while($row = mysqli_fetch_array($result))
		{
			if($row['val']<>null)
			{
				echo "<h3>You seem to have already provided a review for this user</h3>"; 
			}
			else
			{
				$sql="UPDATE `mod2_requests` SET `val`='$ser_array' WHERE reviewer='$username' AND requestor='$requestor'";				
				$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
				if($res)
				{
					echo "<h3>Your Observer assessment was saved successfully. Thank you for your feedback.</h3><br>";		
				}
				else
				{
					echo"<h3>An error occured.</h3><br>Your review might not have been saved.<br>The review request may have been deleted by the user.";
		 
				}
			}
		}
    }
    

	
    
?>


<div class="box">
<br>
<?php
// For Qualitative Feedback
if(isset($_POST['Qualitative']))
{
include 'connection1.php';
 if($_POST['review']<>"")
 {   
 	 $requestor=$_GET['uusers'];
	 $username=$_SESSION['user2'][1];
     $sql="SELECT * FROM mod2_qualitative WHERE reviewer='$username' AND requestor='$requestor'";
	 $result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	 $reviews= mysqli_num_rows($result);
	 if($reviews<=4)
	 {

		 $review= mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['review']);
		 $sql="INSERT INTO `mod2_qualitative`(`reviewer`, `requestor`, `question`, `review`) VALUES ('$username','$requestor','$_POST[question]','$review')";
		 $result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		 if($result)
		 {
			echo "<b style=\"color:#339933; text-align:center; \">Review saved successfully </b>&nbsp; Reviews submitted:".($reviews+1);
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
$user=$_GET['uusers'];
include 'connection1.php';
   echo "<br> You are providing feedback for :<br>";
   $username=$_SESSION['user2'][1];
	     $sql="   SELECT name FROM masteruser WHERE name = '$user'";		
	     $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	     while($row = mysqli_fetch_array($res))
		 {
		 echo "<img src='images/im-user_profile.png' width='15px'>";
		 echo "<b>".$row['name']."</b>";
		 }
?>	 
<br><i>Note: You can provide a maximum of upto 5 reviews.</i>
<?php
$user=$_GET['uusers'];
echo "<form action='test_mod5_review.php?uusers=".$user."' method='POST'>";
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
		<option value="planning&organising">Planning and Organising</option>
		<option value="problem_solving">Investigating, Analysing and Problem Solving</option>
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
<br><br>
<p style="text-align:center;">
You can continue providing feedback for other users.
<br><br><a href='test_mod5.php' style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px;">Continue</a>
</p>
<br>



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