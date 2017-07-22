 <?php
    session_start();
	if(!isset($_SESSION['administration']))
	{
		header('location:index.php');
		exit();
	}
	include '../styles/theme-master.php';
	?>
<!DOCTYPE html>
<html>
<head>
<title>Aptitude</title>
<link rel="icon" href="../images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="../styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="../styles/theme-master.css">
<!-- Modal -->
<!-- Modal Form CSS files -->
<link type='text/css' href='../plugins/modal/css/basic.css' rel='stylesheet' media='screen' />
<!-- Load jQuery, SimpleModal and Basic JS files -->
<script type='text/javascript' src='../plugins/modal/js/jquery.js'></script>
<script type='text/javascript' src='../plugins/modal/js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='../plugins/modal/js/user_edit.js'></script>
<script>
function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
}
</script> 
<!-- Modal ends here -->
<style>
table {
	font: 16px/24px Verdana, Arial, Helvetica, sans-serif;
	border-collapse: collapse;
	width: auto;
	margin-left:auto;
	margin-right:auto;
	background-color:#CCFFFF;
	}
td {
   border-bottom: 1px solid #CCC;
	border-top: 1px solid #CCC;
   }

td.left {
	border-bottom: 1px solid #CCC;
	border-top: 1px solid #CCC;
	border-left: 1px solid #CCC;
	padding: 0 1em;
	padding-bottom:8px;
	}
td.right {
	border-bottom: 1px solid #CCC;
	border-top: 1px solid #CCC;
	border-right: 1px solid #CCC;
	padding: 0 1em;
	padding-bottom:8px;
	}
	
th {
	border-bottom: 1px solid #CCC;
	border-top: 1px solid #CCC;
	border-left: 1px solid #CCC;
	border-right: 1px solid #CCC;
	padding: 0 1em;
	padding-bottom:8px;
	background-color:#CCFF66;
	}

td+td {
	text-align: center;
	}
tr:hover { background: #E9E9E3; }	

</style>
</head>

<body>
<div class="bg">
<div class="container">
<?php
header_admin_fn();
?>
<div class="content clearfix">
<h3>Users
<a href="logout.php" style="border:1px solid #09F; background:#09F; padding:8px; color:#FFF;  border-radius:5px; font-size:16px; float:right; margin-right:5%;">Logout</a>
</h3>
<div class="nav">
<a href="home.php">Home</a>
 >
<a href="users.php">Users</a>
</div>
<br><br>

<div class="panel">
<br>
<p style="text-align:center;">
<img src="../images/users.png" height="90px">
</p><br>
<?php
include '../connection.php';
    
	// Edit User
	if(isset($_POST['edit_user']))
	{
	$user=$_GET['id'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$s_username=$_POST['s_username'];
	$authorized=$_POST['authorized'];
	$type=$_POST['type'];

	$sql="UPDATE staff SET `fname`='$fname',`lname`='$lname',`s_username`='$s_username',`authorized`='$authorized',`type`='$type' WHERE s_username='$user'";
	$user_result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	if($user_result)
	{
		echo "<p style=\"text-align:center;\"><b>Edit Successful</b></p>";
	}
	else
		echo "Changes could not be saved";
	}
    
	// Delete User
	if(isset($_POST['del_user']))
	{
	$u_id=$_POST['del_user'];
	$sql="DELETE FROM `staff` WHERE s_username='$u_id'";
	$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	if($result)
		echo "<p id='center'><b>User removed</b></p>";
	else
		echo "<p id='center'>User could not be removed</p>";
	}
    
	// Show Users
	$username=$_SESSION['administration'][0];
	//Customize query to user acess level
	if($_SESSION['administration'][2]=="super")
	{
		$sql="SELECT * FROM staff";
	}
	else
	{
		die("<p style=\"text-align:center;\"><img src='../images/access.png' width='125px'><br>Access Restriction !!! <br> You are not allowed to manage users</p><br><br>");
	}
	
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);

	echo "<table>";  
    echo "<tr><th>First Name</th> <th>Last Name</th> <th>Username</th> <th>Authorized</th> <th>Access Type</th> <th>Edit</th> <th>Delete</th></tr>";
		while($row = mysqli_fetch_array($res))
		{
			echo "<tr>";
			echo "<td class='left'>".$row['fname']."</td>";
			echo "<td>".$row['lname']."</td>";
			echo "<td>".$row['s_username']."</td>";
			echo "<td>";
				if($row['authorized']=='1') echo "Yes";
				else echo "No"; 
			echo "</td>";
			echo "<td>".$row['type']."</td>";
			echo "<td><div id='basic-modal'><a href='users.php' class='basic' onClick=\"setCookie('user_id','".$row['s_username']."',1)\"><input type='image' src='../images/edit2.png'  width='25px;'name='edit_question'></a></div></td>";
			echo "<td><form action='users.php' method='POST'><input type='hidden' name='del_user' value='".$row['s_username']."'><input type='image' src='../images/delete.png' width='25px;'></form></td>";
			echo "</tr>";
		}
		echo "</table>";



?>

<br><br><br><br>
<br><br>
</div>
<br>

<br><br><br>
</div>

<?php
footer_admin_fn();
?>
</div>
</div>
</body>
</html>