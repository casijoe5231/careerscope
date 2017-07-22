<?php

include("database.php");

$result = mysqli_query($db, "SELECT pRoleId, pUserName FROM registration WHERE pUserName='{$_SESSION['login']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		
			
			$result1= mysqli_fetch_assoc($result);
			$pRoleId =	$result1['pRoleId'];
			$username =	$result1['pUserName'];
			if($pRoleId =="Student"){
			
			// SQL query to interact with info from our database
$sql = mysqli_query($db, "SELECT category, topicname, member, year, description, yearexperience, rankholder FROM achivements WHERE username='{$_SESSION['username']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));


// Establish the output variable
$dyn_table = '<table border="1" cellpadding="6" width="700">';
$dyn_table .= '<tr><th>Category</th><th>Topic Name</th><th>Member</th><th>Year</th><th>Description</th><th>Year of Experience</th><th>Rank Holder</th></tr>';
while($row = mysqli_fetch_array($sql)){ 
    
    $category = $row["category"];
    $topicname= $row["topicname"];
	$member= $row["member"];
	$year= $row["year"];
	$description= $row["description"];
	$yearexperience= $row["yearexperience"];
	$rankholder= $row["rankholder"];
	
    
    $dyn_table .= '<tr><td>' . $category . '</td>';
    $dyn_table .= '<td>' . $topicname . '</td>';
	$dyn_table .= '<td>' . $member . '</td>';
	$dyn_table .= '<td>' . $year . '</td>';
	$dyn_table .= '<td>' . $description . '</td>';
	$dyn_table .= '<td>' . $yearexperience . '</td>';
	$dyn_table .= '<td>' . $rankholder . '</td>';
}
$dyn_table .= '</tr></table>';
			
}else{

		// SQL query to interact with info from our database
$sql = mysqli_query($db, "SELECT category, topicname, member, year, description, yearexperience, rankholder FROM achivements WHERE username='{$_SESSION['username']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));


// Establish the output variable
$dyn_table = '<table border="1" cellpadding="6" width="700">';
$dyn_table .= '';
while($row = mysqli_fetch_array($sql)){ 
    
    $category = $row["category"];
    $topicname= $row["topicname"];
	$member= $row["member"];
	$year= $row["year"];
	$description= $row["description"];
	$yearexperience= $row["yearexperience"];
	$rankholder= $row["rankholder"];
	
    
    $dyn_table .= '<tr><td>' . $category . '</td>';
    $dyn_table .= '<td>' . $topicname . '</td>';
	$dyn_table .= '<td>' . $member . '</td>';
	$dyn_table .= '<td>' . $year . '</td>';
	$dyn_table .= '<td>' . $description . '</td>';
	$dyn_table .= '<td>' . $yearexperience . '</td>';
	$dyn_table .= '<td>' . $rankholder . '</td>';
}
$dyn_table .= '</tr></table>';

}?>


