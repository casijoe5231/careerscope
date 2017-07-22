<?php
include("database.php");
$email=$_SESSION['user'][0];
$sq1= mysqli_query($db, "SELECT category, topic, member, year, description FROM seminar_wp WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$q1= mysqli_query($db, "SELECT * FROM seminar_wp WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

// Establish the output variable
$dyn_table = '<table border="1" cellpadding="6">';

if(mysqli_fetch_array($q1) > 0){
	$dyn_table .='<b>Seminar/Project/Workshop</b>';
	$dyn_table .= '<tr><td bgcolor="#CCCCCC"><h4>Category</h4></td><td bgcolor="#CCCCCC"><h4>Topic Name</h4></td><td bgcolor="#CCCCCC"><h4>Year</h4></td><td bgcolor="#CCCCCC"><h4>Description</h4></td></tr>';
}else { }

while($row = mysqli_fetch_array($sq1)){ 
    
    $category = $row["category"];
    $topicname= $row["topic"];
	$year= $row["year"];
	$description= $row["description"];

    $dyn_table .= '<tr><td width="130">' . $category . '</td><td width="125">' . $topicname . '</td><td width="70"> ' . $year . '</td><td width="200"> ' . $description . '</td></tr>';

    
	}
$dyn_table .= '</table>';

// SQL query to interact with info from our database
$sq2 = mysqli_query($db, "SELECT category,sportsname,position, year FROM sports WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$q2 = mysqli_query($db, "SELECT * FROM sports WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));


// Establish the output variable
$dyn_table1 = '<table border="1" cellpadding="6" >';

if(mysqli_fetch_array($q2) > 0){ 
	$dyn_table1 .='<b>Sports</b>';
	$dyn_table1 .= '<tr><td bgcolor="#CCCCCC"><h4>Category</h4></td><td bgcolor="#CCCCCC"><h4>Sports Name</h4></td><td bgcolor="#CCCCCC"><h4>Year</h4></td><td bgcolor="#CCCCCC"><h4>Position</h4></td></tr>';
}else{}

 while($row = mysqli_fetch_array($sq2)){
    
    $category = $row["category"];
    $sportsname= $row["sportsname"];
	$year= $row["year"];
	$position= $row["position"];
	
    $dyn_table1 .= '<tr><td width="130">'. $category .'</td><td width="125">'. $sportsname .'</td><td width="70">'. $year .'</td><td width="200">'. $position .'</td></tr>';
    }
$dyn_table1 .= '</table>';

// SQL query to interact with info from our database
$sq3 = mysqli_query($db, "SELECT category,cname,module,score,description,year FROM certification WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$q3 = mysqli_query($db, "SELECT * FROM certification WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

// Establish the output variable
$dyn_table2 = '<table border="1" cellpadding="6" >';

if(mysqli_fetch_array($q3) > 0){
	$dyn_table2 .='<b>Certification</b>';
	$dyn_table2 .= '<tr><td bgcolor="#CCCCCC"><h4>Category</h4></td><td bgcolor="#CCCCCC"><h4>Course Name</h4></td><td bgcolor="#CCCCCC"><h4>Year</h4></td><td bgcolor="#CCCCCC"> <h4>Module</h4></td><td bgcolor="#CCCCCC"><h4>Score</h4></td><td bgcolor="#CCCCCC"><h4>Description</h4></td></tr>';
}else{}

while($row = mysqli_fetch_array($sq3)){ 
    
    $category = $row["category"];
    $cname= $row["cname"];
	$module= $row["module"];
	$year= $row["year"];
	$score= $row["score"];
	$description= $row["description"];
	
	$dyn_table2 .= '<tr><td width="130"> ' . $category . '</td><td width="125">' . $cname . '</td><td width="70"> ' . $year . '</td><td width="90"> ' . $module . '</td><td width="95"> ' . $score . '</td><td width="95"> ' . $description . '</td></tr>';
		
	}
$dyn_table2 .= '</table>';

// SQL query to interact with info from our database
$sq4 = mysqli_query($db, "SELECT category,co_name,exp,designation FROM work_exp WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$q4 = mysqli_query($db, "SELECT * FROM work_exp WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

// Establish the output variable
$dyn_table3 = '<table border="1" cellpadding="6" >';

if(mysqli_fetch_array($q4) > 0){
	$dyn_table3 .='<b>Work Experience</b>';
	$dyn_table3 .= '<tr><td bgcolor="#CCCCCC"><h4>Category</h4></td><td bgcolor="#CCCCCC"><h4>Company Name</h4></td><td bgcolor="#CCCCCC"><h4>Experience</h4></td><td bgcolor="#CCCCCC"><h4>Designation</h4></td></tr>';
}else{}

while($row = mysqli_fetch_array($sq4)){ 
    
    $category = $row["category"];
    $co_name= $row["co_name"];
	$exp= $row["exp"];
	$ds= $row["designation"];
	$dyn_table3 .= '<tr><td width="130">' . $category . '</td><td width="125">' . $co_name . '</td><td width="70"> ' . $exp . '</td><td width="200"> ' . $ds . '</td></tr>';

	}
$dyn_table3 .= '</table>';


// SQL query to interact with info from our database
$sq5 = mysqli_query($db, "SELECT category,ename,award,year,description FROM technical_ds WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$q5 = mysqli_query($db, "SELECT * FROM technical_ds WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

// Establish the output variable
$dyn_table4 = '<table border="1" cellpadding="6" >';

if(mysqli_fetch_array($q5) > 0){
$dyn_table4 .='<b>Technical Fest</b>';
$dyn_table4 .= '<tr><td bgcolor="#CCCCCC"><h4>Category</h4></td><td bgcolor="#CCCCCC"><h4>Event Name</h4></td><td bgcolor="#CCCCCC"><h4>Year</h4></td><td bgcolor="#CCCCCC"><h4>Position</h4></td><td bgcolor="#CCCCCC"><h4>Description</h4></td></tr>';
}else{}

while($row = mysqli_fetch_array($sq5)){ 
    
    $category = $row["category"];
    $ename= $row["ename"];
	$position= $row["award"];
	$year= $row["year"];
	$description= $row["description"];
	
	$dyn_table4 .= '<tr><td width="130">' . $category . '</td><td width="125">' . $ename . '</td><td width="70"> ' . $year . '</td><td width="200"> ' . $position . '</td><td width="200"> ' . $description . '</td></tr>';
	
  
	}
$dyn_table4 .= '</table>';


// SQL query to interact with info from our database
$sq6 = mysqli_query($db, "SELECT id,category,papername,year,description,file FROM technical_paper WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$q6 = mysqli_query($db, "SELECT * FROM technical_paper WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

// Establish the output variable
$dyn_table5 = '<table border="1" cellpadding="6" >';

if(mysqli_fetch_array($q6) > 0){
$dyn_table5 .='<b>Technical Papers</b>';
$dyn_table5 .= '<tr><td bgcolor="#CCCCCC"><h4>Category</h4></td><td bgcolor="#CCCCCC"><h4>Paper Name</h4></td><td bgcolor="#CCCCCC"><h4>Year</h4></td><td bgcolor="#CCCCCC"><h4>Description</h4></td></tr>';
}else{}

while($row = mysqli_fetch_array($sq6)){ 
    
    $id = $row["id"];
    $category = $row["category"];
    $papername= $row["papername"];
	$year= $row["year"];
	$description= $row["description"];
	
	$dyn_table5 .= '<tr><td width="130">' . $category . '</td><td width="125">' . $papername . '</td><td width="70"> ' . $year . '</td><td width="200"> ' . $description . '</td></tr>';
	
  
	}
$dyn_table5 .= '</table>';
?>

