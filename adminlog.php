<?php
    session_start();
		include 'connection1.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator Login</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
<link rel="stylesheet" type="text/css" href="styles/tab_style.css">
<script type='text/javascript' src='plugins/jquery.min.js'></script>


<script  type="text/javascript" src="validator1.js" ></script>
</head>
<body>
<div class="container">
<div class="header"><img src="images/careerscope_banner.png" width="18%" alt="CareerScope logo" align="leftt"/>
  <img src="images/dbit.png"  width="6%" alt="DBIT"  align="right"/> </div>
<div class="header-shadow"></div>
  
<div class="content">
 <div class="title">
<h3>&nbsp; Login</h3>
</div>
<br>
<br>
<br>
<div id="tab-one">
<div class="register" style="text-align:center;"><br>
			<img src="images/locked.png" width="100px">
			<h3>Administrator Login</h3>
			<form action="adminlog.php" method="POST">
			<table align="center">
			<tr>
			<th>Email: </th>
			<th><input name="email" type="textbox" autofocus></th>
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
			if(isset($_POST["email"]))
			{
				include 'connection1.php';
				$email = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['email']);
				$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
				$sql="SELECT name,role FROM masteruser WHERE email='$email' and password='$password' and role='Admin'";
				$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
				while($row = mysqli_fetch_array($res))
				{
					$fname=$row['name'];
					$role=$row['role']; 
				}
				$num=mysqli_num_rows($res);
				if($num==1)
				{
			
					$data=array($email,$fname,$role);
					$_SESSION['admin']=$data;
					echo "<meta http-equiv='refresh' content='2;url=adminindex.php'>";
				}
				else
				{
					echo "<html><head><script src='js/alertify.min.js'></script>
					<link rel='stylesheet' href='css/alertify.core.css' />
					<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
					echo "<SCRIPT LANGUAGE='JavaScript'>
					alertify.alert('Invalid Credentials. Please try again!!', function (e) {
					window.location.href='login.php';
					});
					</SCRIPT>";
				}

			}
			?>
			

</div>
</div>  
<br><br>
<a href="login.php" style="text-decoration:none;color:blue;">&lt;&lt;&nbsp;Previous</a>
<br><br>
 </div> <!-- END Organic Tabs -->

<div class="footer">
  <div class="footer-link">
  <br><a href="index.php" style="text-decoration:none;color:white;">Home</a> | Privacy Policy | Terms of use | About
  <br /> www.dbit.in<br /><br />
  </div>
</div>

</div>
</body>
</html>
