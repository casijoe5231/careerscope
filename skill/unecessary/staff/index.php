    <?php
    session_start();
	if(isset($_SESSION['username']))
	{
		header('location:home.php');
		exit();
	}
	?>
<!DOCTYPE html>
<html>
<head>
<title>Skill Assessment</title>
<link rel="icon" href="../images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="../styles/style_staff.css">

<style>

.register
{
 width:60%;
 margin-left:auto;
 margin-right:auto;
 border-style:solid;
 border-radius:15px;
 text-align:center;
}
</style></head><body>
<div class="bg">
<div class="container">
<div class="header">
<img src="../images/logo.png" height="80px" align="left">
<h1>Skill Assessment Program</h1>
</div>
<div class="content">
<br>
<div class="title">
<h3>&nbsp; Skill Assessment Staff Login</h3>
</div>
<br>
<br>
<br>
<div class="register">
<img src="../images/lock.png">
<h3>Staff Login</h3>
<form action="index.php" method="POST">
<table align="center">
<tr>
<th>Username: </th>
<th><input name="username" type="textbox" autofocus></th>
</tr>
<tr>
<th>Password: </th>
<th><input name="password" type="password"></th>
</tr>
<tr>
<th></th>
<th><input type="submit" value="Login"></th>
</tr>
</table>
</form>

<?php
	if(isset($_POST["username"]))
    {
        include '../connection.php';
        $username = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['username']);
		$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
		$sql="SELECT fname FROM staff WHERE s_username='$username' and password='$password'";
		$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row = mysqli_fetch_array($res))
        {
           $fname=$row['fname'];      
        }
		$num=mysqli_num_rows($res);
		if($num==1)
		{
			
			$data=array($username,$fname);
			$_SESSION['s_username']=$data;
			
			echo "<br><img src='../images/preload.gif' height='40px' >";
			echo '<br>Redirecting to Home<br>';
			echo "<meta http-equiv='refresh' content='2;url=./home.php'>";
			exit();
		}
		else
		{
			echo"Invalid Credentials.<br/>Please try again.";
		}

    }
?>
<br>
Not Registered ? <a href="register.php">Click here<a> 
<br>
<br>
</div>
<br><br><br>
</div>

<div class="footer">
Privacy Policy | Terms of use | FAQ's
</div>
</div>
</div>

</body>
</html>