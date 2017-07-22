<?php include("../connection1.php");
$email=$_SESSION['user'][0];
 /*
 $picture = mysql_query("SELECT pic FROM student_details WHERE ldap_username='{$_SESSION['username']}'",$db) or die(mysql_error());
		
			
			 while($picture_row= mysql_fetch_array($picture))
			 {
				$pic=$picture_row['pic'];
			 }	
		*/	
//Deciding whether the student has started to create e-portfolio or not
			$certification = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM certification WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
			
			$sports = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM sports WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
			
			$seminar_wp = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM seminar_wp WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
			
			$work_exp = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM work_exp WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
			
			$technical_ds = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM technical_ds WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
			$technical_paper = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM technical_paper WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
			
			$first=0;
			if(mysqli_num_rows($certification)==0 && mysqli_num_rows($sports)==0 && mysqli_num_rows($seminar_wp)==0 && mysqli_num_rows($work_exp)==0 && mysqli_num_rows($technical_ds)==0 && mysqli_num_rows($technical_paper)==0) 
			$first=1;
			
?>
