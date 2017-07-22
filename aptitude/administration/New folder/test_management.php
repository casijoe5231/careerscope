 <?php
    include '../connection.php';
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
<title>Test Management</title>
<link rel="icon" href="../images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="../styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="../styles/theme-master.css">
<!-- Jquery UI -->
  <link rel="stylesheet" href="../plugins/jqueryui/jquery-ui.css" />
  <script src="../plugins/jqueryui/jquery-1.9.1.js"></script>
  <script src="../plugins/jqueryui/jquery-ui.js"></script>

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
<h3>Test Management</h3>
<div class="nav">
<a href="home.php">
<img src="../images/go-home.png" width="22px">
Home</a>
 > 
<a href="test_management.php">Test Management</a>
</div>
<br><br>

<div class="panel">
<h3>Tests</h3>
 <form action="test_management.php" method="POST">
 <p style="text-align:center; ">Arrange by:
 <?php
 $order="t_name"; // Default
 if(isset($_POST['select_order']))
{ 
 //Set dropdown to previously selected value
 $order=$_POST['select_order'];
}

echo "<select name='select_order' onchange='this.form.submit()'>";
    echo "<option value='t_name' ";
	if($order=="t_name") echo "selected";
	echo ">Test Name</option>";
	
	echo "<option value='id' ";
	if($order=="id") echo "selected";
	echo ">Test id</option>";
	
	echo "<option value='subject' ";
	if($order=="subject") echo "selected";
	echo ">Subject</option>";
	
	echo "<option value='domain' ";
	if($order=="domain") echo "selected";
	echo ">Domain</option>";
	
	echo "<option value='t_time' ";
	if($order=="t_time") echo "selected";
	echo ">Time</option>";
	
echo " </select>";	
 ?>
 </p>
 </form>

<?php

if(isset($_POST['delete']))
{
$id=$_POST['delete'];
// Delete Test
$sql="DELETE FROM `test` WHERE id=$id";
$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
// Delete corressponding questions
$sql="DELETE FROM `questions` WHERE t_id=$id";
$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
if($result)
echo "<br><p style=\" text-align:center; color:#009933;\"><b>Test deleted successfully</b></p>";
else
echo "<br><p style=\" text-align:center;\">Test could not be deleted</p>";
//echo "<meta http-equiv='refresh' content='1;url=./test_management.php'>";
}
?>
 
<?php

 if(isset($_POST['assign']))
 {
  $sql="UPDATE `test` SET `assign`='$_POST[assign]' WHERE id='$_POST[test_id]'";  // Change test managed by option
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  if($res)
  echo "<p style=\"text-align:center; color:#009933;\">User assignment changed</p>";
  else
  echo "Assignment Error";
 } 
	$username=$_SESSION['administration'][0];
	//Customize query to user acess level
	if($_SESSION['administration'][2]=="super")
	{
		$sql="SELECT * FROM test ORDER BY $order";
	}
	else if($_SESSION['administration'][2]=="manager")
	{
		$sql="SELECT * FROM test WHERE assign='$username' ORDER BY $order";
	}
	else
	{
		echo "<b>Access Level error !!!</b>";
	}
	
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);

	echo "<table>";  
    echo "<tr><th>Test Name</th> <th>Test id</th> <th>Subject</th> <th>Domain</th> <th>Time</th> <th>Managed by</th><th>Edit</th> <th>Delete</th></tr>";
		while($row = mysqli_fetch_array($res))
		{
			echo "<tr>";
			echo "<td class='left'>".$row['t_name']."</td>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['subject']."</td>";
			echo "<td>".$row['domain']."</td>";
			echo "<td>".$row['t_time']."</td>";
			
			echo "<td>";		
			$assign=$row['assign'];
			if($_SESSION['administration'][2]=="super")
			{
				echo "<form action='test_management.php' method='POST'>";
				echo "<input type='hidden' name='test_id' value='".$row['id']."'>"; // Hidden element
				echo "<select name='assign' onchange='this.form.submit()'>";
				echo "<option value='' ";
				if($assign=="") echo "selected";
					echo ">None</option>";
			
				$sql="SELECT s_username, fname FROM staff ";  // Get users
				$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
				while($row2 = mysqli_fetch_array($res2))
				{						
					echo "<option value='".$row2['s_username']."' ";
					if($assign==$row2['s_username']) echo "selected";
						echo ">".$row2['fname']."</option>";
				}	
				echo " </select></form>";
			}
			else
				echo $assign;
			echo "</td>";
			
			
			echo "<td><a href='test_edit.php?id=".$row['id']."'><img src='../images/edit.png' width='25px;'></a></td>";
			echo "<td><form action='test_management.php' method='POST'><input type='image' src='../images/delete.png' width='25px;'name='delete' value='".$row['id']."'></form></td>";
			echo "</tr>";
		}
		echo "</table>";


?>



<br><br>
</div>
<br>



<a href="logout.php" style="border:1px solid #09F; background:#09F; padding:8px; color:#FFF;  border-radius:5px; font-size:16px; margin-right:50%;">Logout</a>
<br><br><br>
</div>

<?php
footer_admin_fn();
?>
</div>
</div>

</body>
</html>