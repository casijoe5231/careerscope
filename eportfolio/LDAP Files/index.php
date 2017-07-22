<?php
ob_start();
// if (eregi('', $string))
//
// $_SERVER["REMOTE_ADDR"]


$page='feedback';
//include("config.php");
include("functions.php");

if(isset($_POST['signin'])) {
include("../database.php");
	//$object = new db_class();
	//selecting admin username password
	$admin_query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT ldap_username,password FROM login_local WHERE ldap_username='".$_POST['username']."'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	$admin_array = mysqli_fetch_array($admin_query);
	$admin_pwd = $admin_array[1];
	
	if(md5($_POST["password"])==$admin_array[1])
	$usertype = $_POST["username"];
	else
	$usertype = authenticate($_POST["username"], $_POST["password"]);
	
	switch($usertype) {
		case 'admin':
			$_SESSION['login'] = $usertype;
			header("location: ../display_eportfolio.php");
			break;
		case 'tpo':
			$_SESSION['login'] = $usertype;
			header("location: ../display_eportfolio.php");
			break;
		case 'faculty':
			$_SESSION['login'] = $usertype;
			header("location: ../studenthome.php");
			break;
		case 'student':
			$_SESSION['login'] = $usertype;
			header("location: ../studenthome.php");
			break;
		case 'student_first_time':
			$_SESSION['login'] = $usertype;
			header("location: ../studenthome.php");
			break;
		case 'student_again':
			$_SESSION['login'] = $usertype;
			header('location: ../studenthome.php');
			break;
		case 'bad':
			header('location: ../index.php');
			//$err["login"] = 'Bad username or password';
		default:
			header('location: ../index.php');
			//$err["login"] = 'Login failed due to unknown reason';
	}
} else {
	//session_start();
	switch($_SESSION['login']) {
		case 'admin':
			header("location: ../admin.php");
			break;
		case 'faculty':
			header("location: ../studenthome.php");
			break;
		case 'student':
			header("location: ../studenthome.php");
			break;
		case 'student_first_time':
			header("location: ../studenthome.php");
			break;
		case 'student_again':
			header('location: ../studenthome.php');
			break;
	}
}
/*
require_once("header.php");
require_once("footer.php");
*/
ob_flush();
?>