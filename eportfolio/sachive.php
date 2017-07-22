<?php

$sql1 = mysqli_query($db, "SELECT  Name FROM student_details WHERE ldap_username='{$_SESSION['username']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		
			
			$username= mysqli_fetch_assoc($sql1);
			$fname=$username['Name'];
			
			
$sql2 = mysqli_query($db, "SELECT collegename FROM instituteinfo WHERE username='{$_SESSION['username']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

			$college= mysqli_fetch_assoc($sql2);
			$colname=$college['collegename'];
						
?>