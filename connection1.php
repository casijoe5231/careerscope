
<?php
    // Connection Settings
	$hostname="localhost";  // Hostname
	$username="root";       // Username for Database
	$password="";           // Database password
	$dbname="careerscope";        // Database name
	
	($GLOBALS["___mysqli_ston"] = mysqli_connect("$hostname", "$username", "$password"))or die("Cannot connect");  // Make Connection
	mysqli_select_db($GLOBALS["___mysqli_ston"], $dbname)or die("Cannot connect");                      // Select Database
	
	?>
