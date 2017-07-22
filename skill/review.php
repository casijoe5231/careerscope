<?php
    session_start();
	if(!isset($_SESSION['username']))
	{
		header('location:index.php');
		exit();
	}
	include 'styles/theme-master.php';
	?>
<!DOCTYPE html>
<html><head><title>Skill Assessment Home</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
<script type="text/javascript">
function validateForm()
{

  
var x=document.forms["reviewForm"]["data3"].value;
if (x==null || x=="")
  {
  alert("Please fill section 3");
  return false;
  }
var y=document.forms["reviewForm"]["data4"].value;
if (y==null || y=="")
  {
  alert("Please fill section 4");
  return false;
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
echo $_SESSION['username'][1];
?>
</h3>
</div>

<br>
<br>
<?php
    if(isset($_POST['option1']))
	{
    // Save Review
    include 'connection.php';
    $username=$_SESSION['username'][0];
    //$sql="SELECT fname, lname, email, E, A, C, N,O FROM user WHERE username='$username'";
	$sql="INSERT INTO review (username, rating, useful, pros, cons) VALUES ('$username', '$_POST[option1]', '$_POST[option2]', '$_POST[data3]', '$_POST[data4]') ";
    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	    if($res)
	    {
		 echo'<br><br><b>Thank you for your feedback</b><br>';		
	    }
	    else
	   {
		 echo"<h3>Error occured.</h3><br>You may have already submitted your feedback";
		 
	   }
     }
?>
<br>
<br>
<p>
<b>Please provide us a review to improve</b><br>
_______________________________________<br>
<br>
<form method="POST" name="reviewForm" action="review.php" onsubmit="return validateForm()" >
<ol>
<li>How do you rate the Assessment ?
&nbsp; Poor &nbsp;
<input type='radio'  name='option1' value='1' id='option_0' ><label for='option_0'><span></span>1 </label>
<input type='radio'  name='option1' value='2' id='option_1' ><label for='option_1'><span></span>2 </label>
<input type='radio'  name='option1' value='3' id='option_2' ><label for='option_2'><span></span>3 </label>
<input type='radio'  name='option1' value='4' id='option_3' ><label for='option_3'><span></span>4 </label>
<input type='radio'  name='option1' value='5' id='option_4' ><label for='option_4'><span></span>5 </label>
&nbsp; Very Good
		   
<br><br>
</li><li>Does the assessment describe you well enough ?
<input type='radio'  name='option2' value='yes' id='y' ><label for='y'><span></span>Yes </label>
<input type='radio'  name='option2' value='no' id='n' ><label for='n'><span></span>No </label>

	
<br><br> 
</li><li>What do you like about the assessment ?<br>
<textarea rows='6' cols='40' name='data3' maxlength='180' >
</textarea>


<br><br> 
</li><li>	What do you think should be improved in the assessment ?<br>
<textarea rows='6' cols='40' name='data4' maxlength='180'>
</textarea>

</ol>
<input type="submit" value="Submit">
</form>

<br><br>
<a href="logout.php">LOGOUT</a>



<br><br>
</div>

<?php
footer_fn();
?>
</div>
</div>

</body>
</html>