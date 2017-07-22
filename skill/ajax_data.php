<?php
    session_start();
	if(!isset($_SESSION['username']))
	{
		header('location:index.php');
		exit();
	}


		include 'connection.php';
		$username=$_SESSION['username'][0];

		 $sql="SELECT requestor, val FROM mod2_requests WHERE reviewer='$username'";	
	     $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	     while($row = mysqli_fetch_array($res))
		 {		 
             if($row['val']<>null) //Feedback submitted
			 {		

				echo "<div class='profile_display_submitted'>";
				echo "<img src='images/im-user_profile.png' width='60px'>";
				//Get first name, second name of user
				$sub_query="SELECT fname, lname  FROM user WHERE username = '$row[requestor]'";
				$result=mysqli_query($GLOBALS["___mysqli_ston"], $sub_query);
				while($row = mysqli_fetch_array($result))
				{
					echo $row['fname']."<br>".$row['lname'];
				}
		  
				echo "</div>";
				//echo "</a>"; 
			 }
		 
			 else
			 {

				echo "<a href='test_mod2_rate.php?user=".$row['requestor']."'>";
				echo "<div class='profile_display'>";
				echo "<img src='images/im-user_profile.png' width='60px'>";
				//Get first name, second name of user
				$sub_query="SELECT fname, lname  FROM user WHERE username = '$row[requestor]'";
				$result=mysqli_query($GLOBALS["___mysqli_ston"], $sub_query);
				while($row = mysqli_fetch_array($result))
				{
					echo "<br>".$row['fname']."<br>".$row['lname'];
				}
		  
				echo "</div> </a>";
			 }	
         }
?>
