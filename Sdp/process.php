<?php
 session_start();

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }
	
//Connection Code
$db="careerscope";
$servername = "localhost";
$username = "root";
$password = "oracle";

// Create connection
$conn=($GLOBALS["___mysqli_ston"] = mysqli_connect($servername, $username, $password));  // Make Connection
	mysqli_select_db($GLOBALS["___mysqli_ston"], $db);                      // Select Database

// Check connection
if (!$conn) {
    die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}
//echo "Connected successfully";

//Connection Code ends

$time_added = date('Y-m-d H:i:s');
$goal_id=$_SESSION['ID'];
$email=$_SESSION['user'][0];
$user=$_SESSION['user'][1];
$structure = "/var/www/html/careerscope/Sdp/uploads/$user/";

// To create the nested structure, the $recursive parameter 
// to mkdir() must be specified.

mkdir($structure, 0777, true);


	//print_r($_FILES);
	
	//Folder to save to
	$target_path = "/var/www/html/careerscope/Sdp/uploads/$user/";
	
	//Build the stored file path
	$target_path = $target_path . basename( $_FILES['uploadedfile']['name'] );
	$file_name = $_FILES['uploadedfile']['name'];
	
//////////////////////////
$file = uniqid(rand())."-".$_FILES['uploadedfile']['name'];
$file_loc = $_FILES['uploadedfile']['tmp_name'];
$file_size = $_FILES['uploadedfile']['size'];
$file_type = $_FILES['uploadedfile']['type'];
$folder="/var/www/html/careerscope/Sdp/uploads/$user/";
	
// new file size in KB
$new_size = $file_size/1024;  
// new file size in KB
	
// make file name in lower case
$new_file_name = strtolower($file);
// make file name in lower case
	
$final_file=str_replace(' ','-',$new_file_name);
	
////////////////////////////////
	
	
	if ( $_FILES['uploadedfile']['size'] < 50000000) {
		if ( (substr( $_FILES['uploadedfile']['name'], -4 ) =='.jpg')or(substr( $_FILES['uploadedfile']['name'], -4 ) =='.pdf')or(substr( $_FILES['uploadedfile']['name'], -4 ) =='.png')or(substr( $_FILES['uploadedfile']['name'], -4 ) =='.PNG')or(substr( $_FILES['uploadedfile']['name'], -4 ) =='JPEG'))
		{
			/*
			if ( move_uploaded_file( $_FILES['uploadedfile']['tmp_name'], $target_path ) ) 
			{
							//echo '<p>The file $file_name was uploaded</p>';
							  echo "<SCRIPT LANGUAGE='JavaScript'>
										alert('$file_name has been Uploaded');
										window.location.href='sdp_evidence.php';</SCRIPT>";
							
			} 
			else
			{
				//echo '<p>There was an error uploading your file. Please try again!.</p>';
				echo "<SCRIPT LANGUAGE='JavaScript'>
						    alert('There was an error uploading your file. Please try again!');
						    window.location.href='sdp_evidence.php';</SCRIPT>";
			} */
			
			/////////////////////////////////////////////////////////////////////
			if(move_uploaded_file($file_loc,$folder.$final_file))
			{
				$sql3="INSERT INTO goal_evidence (evidence_id,goal_id,email,file_name,file_type,file_size,date_sub)values('','$goal_id','$email','$final_file','$file_type','$new_size','$time_added')";
				mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
				
				 echo "<SCRIPT LANGUAGE='JavaScript'>
							alert('$file_name has been Uploaded');
							window.location.href='sdp_evidence.php';</SCRIPT>";
		
			}
			else
			{
		
				echo "<SCRIPT LANGUAGE='JavaScript'>
						alert('There was an error uploading your file. Please try again!');
						 window.location.href='sdp_evidence.php';</SCRIPT>";
		
			}
			
			///////////////////////////////////////////////////////////////////////////
			
		} else {
			//echo '<p>Please try again using specified file format!</p>';
				echo "<SCRIPT LANGUAGE='JavaScript'>
						    alert('Please try again using specified file format!');
						    window.location.href='sdp_evidence.php';</SCRIPT>";
		}
	} else {
		//echo '<p>The file is too big.</p>';
		echo "<SCRIPT LANGUAGE='JavaScript'>
						    alert('The file is too big, Max size is 5MB !');
						    window.location.href='sdp_evidence.php';</SCRIPT>";
	}

	//echo $_FILES['uploadedfile']['name'];
	


$sql1="update goals_completed SET evidence_stat='Submitted' where goal_id IN('$goal_id')";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);

$sql2="update goal_hist SET evidence_stat='Submitted', evidence_date='$time_added' where goal_id IN('$goal_id')";
$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);


?>