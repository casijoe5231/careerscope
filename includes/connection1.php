
<?php
    // Connection Settings
	$hostname="localhost";  // Hostname
	$username="root";       // Username for Database
	$password="";           // Database password
	$dbname="careerscope";        // Database name
	
	$conn = new mysqli($hostname, $username, $password, $dbname);
  if (!$conn){
	die("Connection Failed: ".mysqli_connect_error());
     }
?>
