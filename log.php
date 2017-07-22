<?php
    session_start();
	if(isset($_SESSION['username']))
	{
		header('location:index.php');
		exit();
	}
		include 'connection.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles/style-main.css">
<title>CareerScope Login</title>
</head>
<body>
<div class="container">
<div class="header"><img src="images/careerscope_banner.png" width="18%" alt="CareerScope logo" align="leftt"/>
  <img src="images/dbit.png"  width="6%" alt="DBIT"  align="right"/> </div>
<div class="header-shadow"></div>
  
<div class="content">
 
 <div class="register" style="text-align:center;">
 <br /><br />
			<img src="images/locked.png" width="100px">
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
			 $referer="index.php";
			echo "<input type='hidden' name='referer' value='".$referer."'>";
			?>
			<input type="submit" value="Login" class="button">
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
            <a href='./register'>Register</a>
            | <a href='index.php'>Home</a>			
			<br>
			</div>

  



<br /><br />
</div>
<div class="footer">
  <div class="footer-link">
  <br>Home | Privacy Policy | Terms of use | About
  <br /> www.dbit.in<br /><br />
  </div>
</div>

</div>
</body>
</html>
