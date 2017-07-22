 <?php
    session_start();
	if(isset($_SESSION['username']))
	{
		header('location:home.php');
		exit();
	}
	include 'styles/theme-master.php';
	?>
<!DOCTYPE html>
<html>
<head>
<title>Aptitude</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<!-- JqueryUI  -->
  <link rel="stylesheet" href="plugins/jqueryui/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">

<!-- JqueyUI ends here-->  
</head>

<body>
<div class="bg">
<div class="container">
<?php
header_fn();
?>
<div class="content">
<br>
<br>
<br>
<br>



			
			<div class="register" style="text-align:center;">
			<img src="images/lock.png" width="100px">
			<h3>User Login</h3>
			
			<form action="login.php" method="POST">
			<table align="center">
			<tr>
			<th>Username: </th>
			<th><input name="username" type="textbox" autofocus></th>
			</tr>
			<tr>
			<th>Password: </th>
			<th><input name="password" type="password"></th>
			</tr>
			</table>
			<br>
			<?php
			if(isset($_SERVER['HTTP_REFERER']))
			 $referer=$_SERVER['HTTP_REFERER'];
			else
			 $referer="home.php";
			echo "<input type='hidden' name='referer' value='".$referer."'>";
			?>
			<input type="submit" value="Login" style="text-align:center;">
			</form>

			<?php
			//echo $_SERVER['HTTP_REFERER'];
			if(isset($_POST["username"]))
			{
				include 'connection.php';
				$username = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['username']);
				$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
				$sql="SELECT fname FROM user WHERE username='$username' and password='$password'";
				$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
				while($row = mysqli_fetch_array($res))
				{
					$fname=$row['fname']; 					
				}
				$num=mysqli_num_rows($res);
				if($num!=0)
				{
			
					$data=array($username,$fname);
					$_SESSION['username']=$data;
			
					echo "<br><img src='images/preload.gif' height='40px' >";
					echo '<br>Redirecting';
					echo "<meta http-equiv='refresh' content='2;url=".$_POST['referer']."'>";
					exit();
				}
				else
				{
					echo"Invalid Credentials.<br/>Please try again.";
				}

			}
			?>
			<br>
			Not Registered ?
            <a href='register.php'>Register</a>
            | <a href='home.php'>Home</a>			
			<br>
			</div>
			



<br><br><br>
</div>

<?php
footer_fn();
?>
</div>
</div>

</body>
</html>