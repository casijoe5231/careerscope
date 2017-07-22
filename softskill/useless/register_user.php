<?php
	include 'connection.php';
	
	$fname = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['fname']);
	$lname = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['lname']);
	$email = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['email']);
	$class = $_POST['class'];
	$branch = $_POST['branch'];
	
	$username = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['username']);
	$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
	$sql="insert into user(fname, lname, email, class, branch, username, password, mod1, E, A, C, N, O ) values('$fname','$lname','$email','$class','$branch','$username','$password',0,0,0,0,0,0)";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	if($res)
	{
		echo'<h2>You have registered successfully.</h2><br>Being redirected to login page';
		echo "<meta http-equiv='refresh' content='2;url=./login.php'>";
	}
	else
	{
		echo"<h2>Error occured.</h2><br>Being redirected to form";
		echo "<meta http-equiv='refresh' content='2;url=./register.php'>";
	}
?>