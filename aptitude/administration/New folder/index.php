 <?php
    session_start();
	if(isset($_SESSION['administration']))
	{
		header('location:home.php');
		exit();
	}
	?>
<!DOCTYPE html>
<html>
<head>
<title>Aptitude</title>
<link rel="icon" href="../images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
<style>
input[type="submit"]:hover{
    border: 1px solid #999;color:#000;
}
</style>
</head>

<body>
<div class="bg">
<div class="container">
<div class="header">
<img src="../images/logo.png" height="80px" align="left">
<img src="../images/careerscope_banner.png" height="80px" align="right">
<h1>Test my Aptitude</h1>
</div>
<div class="content">
<br>
<div class="box">

			<img src="../images/locked.png" height="80px" >
			<h3>Administrator Login</h3>
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
			<th><input type="submit" value="Login" style="border:1px solid #09F; background:#09F; padding:8px; color:#FFF;  border-radius:5px; font-size:16px;"></th>
			</tr>
			</table>
			</form>



			<?php
			if(isset($_POST["username"]))
			{
				include '../connection.php';
				$username = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['username']);
				$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
				$sql="SELECT fname, type FROM staff WHERE s_username='$username' and password='$password' and authorized='1'";
				$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
				while($row = mysqli_fetch_array($res))
				{
				$fname=$row['fname'];
				$type=$row['type'];
				}
				$num=mysqli_num_rows($res);
				if($num==1)
				{
			
					$data=array($username,$fname,$type);
					$_SESSION['administration']=$data;
				
					echo "<br><img src='../images/preload.gif' height='40px' >";
					echo '<br>Redirecting to Home<br>';
					echo "<meta http-equiv='refresh' content='0;url=home.php'>";
				exit();
				}				
				else
				{
					echo"Invalid Credentials.<br/>Please try again.";
				}

			}
			?>









<br><br><br>
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