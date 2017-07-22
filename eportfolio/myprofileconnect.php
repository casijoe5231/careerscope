<?php
$username = mysqli_query($db, "SELECT  pFirstName, pMiddleName, pLastName, ppermAddress1, pMobilenumber, ppermCity, ppermState, ppermZipCode, pEmail, dob, gender FROM registration WHERE pUserName='{$_SESSION['username']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		
			
			$username= mysqli_fetch_assoc($username);
			$FirstName=$username['pFirstName'];
			$MiddleName=$username['pMiddleName'];
			$LastName=$username['pLastName'];
			$permAddress1=$username['ppermAddress1'];
			$mobilenumber=$username['pMobilenumber'];
			$permCity=$username['ppermCity'];
			$permstate=$username['ppermState'];
			$permZipCode=$username['ppermZipCode'];
			$pEmail=$username['pEmail'];
			$date1=$username['dob'];
			$gender=$username['gender'];
?>

