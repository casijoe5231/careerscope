<html>
<head>
<style>
#user_edit
	{
	font: 16px/24px Verdana, Arial, Helvetica, sans-serif;
	border-collapse: collapse;
	width: 100%;
	margin-left:auto;
	margin-right:auto;
	background-color:#0099FF;
	color:white;
	padding:5px;
	text-align: center;
	}

#tr_user_edit:hover { background: #4C4C4C; }	

</style>
</head>
<body>

<?php
					
        include '../../connection.php';
	 		
		$user_id=$_COOKIE["user_id"];	
        echo "<b>Edit User</b><br><br>";
		//Display Question
		$sql="SELECT * FROM staff WHERE s_username='$user_id' ";
	    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		echo "<form action='users.php?id=".$user_id."' method='POST'>";
		while($row = mysqli_fetch_array($res))
		{	
		    echo "<table id='user_edit'>";
			echo "<tr id='tr_user_edit'><td>First Name: &nbsp;</td>";
			echo "<td><input type='textbox' name='fname' value='".$row['fname']."'></td></tr>";

			echo "<tr id='tr_user_edit'><td>Last Name: </td>";
			echo "<td><input type='textbox' name='lname' value='".$row['lname']."'></td></tr>";

			echo "<tr id='tr_user_edit'><td>Username: </td>";
			echo "<td><input type='textbox' name='s_username' value='".$row['s_username']."'></td></tr>";

			echo "<tr id='tr_user_edit'><td>Authorized: </td>";
			$auth=$row['authorized'];
			//Dropdown
			echo "<td><select name='authorized' >";
			echo "<option value='1' ";
			if($auth=="1") echo "selected";
			echo ">Yes</option>";			
			echo "<option value='0' ";
			if($auth=="0") echo "selected";
			echo ">No</option>";    
			echo "</select></td></tr>";
			
			echo "<tr id='tr_user_edit'><td>Type: </td>";
            $type=$row['type'];			
			//Dropdown
			echo "<td><select name='type' >";
			echo "<option value='super' ";
			if($type=="super") echo "selected";
			echo ">Super</option>";			
			echo "<option value='manager' ";
			if($type=="manager") echo "selected";
			echo ">Manager</option>";           
			echo "</select></td></tr>";
			
			echo "</table>";
			echo "<br><br>";
		}
		echo "<div style=\"text-align:center;\"><input type='submit' value='Update & Save' name='edit_user'></div>";
		echo "</form>";
?>
</body>
</html>