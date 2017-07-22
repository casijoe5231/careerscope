
<?php
    // Connection Settings
	$hostname="localhost";  // Hostname
	$username="root";       // Username for Database
	$password="oracle";           // Database password
	$dbname="careerscope";        // Database name
	
	($GLOBALS["___mysqli_ston"] = mysqli_connect($hostname, $username, $password));  // Make Connection
	mysqli_select_db($GLOBALS["___mysqli_ston"], $dbname);                      // Select Database
	
	?>
