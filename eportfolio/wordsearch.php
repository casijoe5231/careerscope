<?php
require_once('tcpdf\config\lang\eng.php');
require_once('tcpdf\tcpdf.php');
include("database.php");

// Load contents of a file into a string
$filename = $ldap_username.".txt";

$handle = fopen($ldap_username.".txt", "r");

$contents = fread($handle, filesize($filename));

fclose($handle);

// Create an array to hold all the locations of the word.

$locations = array();

// Find the first location.

$pos = stripos($contents, $keyword, $offset);

// Keep searching as long as you find the word.

//while ($pos !== false) {
//	echo "here";

//$locations[] = $pos;

//$offset = $pos + 1;

//$pos = strpos($contents, $keyword, $offset);

//}

// Print out all the locations of the word.

//if (count($locations) != 0)
if ($pos !== false)
echo "<a href='".$ldap_username.".pdf' target='_blank'>Click here ".$ldap_username.".pdf</a><br>";

?>