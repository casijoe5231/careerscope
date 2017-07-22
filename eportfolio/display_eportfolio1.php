<?php
include("database.php");
			
if(isset($_SESSION['login']))
{
?>

<html>
<head>
<title>Display e-PORTFOLIO</title>

<link href="Image/icon1.ico" rel="shortcut icon"/>
<link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css" />
<script type="text/javascript" src="link.js"/>
</script>
</head>

<body>
<table border="1" align="center">  
<tr><td>
  <table border="0"> 
	<tr>  <td colspan="2"><?php include("header.php"); ?></td>  </tr>
    <tr>  <td colspan="2"><?php include("admenu.php"); ?></td></tr>
	<tr>
    	<td  width="200" valign="top"><?php include("amenu.php"); ?></td>

        <td>
        <fieldset style="width:600"> <legend><b>Display e-PORTFOLIO</b></legend>
        	<table border="0" cellspacing="4" cellpadding="4">
          			<tr><td>

<?php

if(isset($_POST['UserName']))
$username=$_POST['UserName'];
else
$username=$_GET['student'];

$sq1= mysqli_query($db, "SELECT id, category, topic, member, year, description,file FROM seminar_wp WHERE username='$username'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$q1= mysqli_query($db, "SELECT * FROM seminar_wp WHERE username='$username'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

// Establish the output variable
$dyn_table = '<table border="1" cellpadding="6" width="750" bordercolor="#00FF99" background="Image/background_table.jpg">';

if(mysqli_fetch_array($q1) > 0){
	$dyn_table .='<caption>Seminar/project/workshop</caption>';
	$dyn_table .= '<tr><td><h4>Category</h4></td><td><h4>Topic Name</h4></td><td><h4>Year</h4></td><td><h4>Description</h4></td><td><h4>Uploaded File</h4></td><td><h4>Delete</h4></td></tr>';
}else { }

while($row = mysqli_fetch_array($sq1)){ 
    $id = $row["id"];
    $category = $row["category"];
    $topicname= $row["topic"];
	$year= $row["year"];
	$description= $row["description"];
	$file= $row["file"];
    $dyn_table .= '<tr><i><td width="130">' . $category . '</td><td width="125">' . $topicname . '</td><td width="70"> ' . $year . '</td><td width="200"> ' . $description . '</td><td width="150">'.'<a style="cursor:pointer;" onclick=\'NewWindow("'.$file.'","","500","500","yes","center")\'>'. $file .'</a>'.'</td><td align=\'center\'><a href="ajax.php?table=seminar_wp&id='.$id.'&page=\'admin\'&student='.$username.'"><img src="delete.jpg" width=\'30\'/></a></td></i></tr>';

    
	}
$dyn_table .= '</table>';

// SQL query to interact with info from our database
$sq2 = mysqli_query($db, "SELECT id,category,sportsname,position, year,file FROM sports WHERE username='$username'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$q2 = mysqli_query($db, "SELECT * FROM sports WHERE username='$username'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));


// Establish the output variable
$dyn_table1 = '<table border="1" cellpadding="6" width="750" bordercolor="#00FF99" background="Image/background2_table.jpg">';

if(mysqli_fetch_array($q2) > 0){ 
	$dyn_table1 .='<caption>Sports</caption>';
	$dyn_table1 .= '<tr><td><h4>Category</h4></td><td><h4>Sports Name</h4></td><td><h4>Year</h4></td><td><h4>Position</h4></td><td><h4>Uploaded File</h4></td><td><h4>Delete</h4></td></tr>';
}else{}

 while($row = mysqli_fetch_array($sq2)){
    $id = $row["id"];
    $category = $row["category"];
    $sportsname= $row["sportsname"];
	$year= $row["year"];
	$position= $row["position"];
	$file= $row["file"];
    $dyn_table1 .= '<tr><td width="130">'. $category .'</td><td width="125">'. $sportsname .'</td><td width="70">'. $year .'</td><td width="100">'. $position .'</td><td width="150">'.'<a style="cursor:pointer;" onclick=\'NewWindow("'.$file.'","","500","500","yes","center")\'>'. $file .'</a>'.'</td><td align=\'center\'><a href="ajax.php?table=sports&id='.$id.'&page=\'admin\'&student='.$username.'"><img src="delete.jpg" width=\'30\'/></a></td></tr>';
    }
$dyn_table1 .= '</table>';

// SQL query to interact with info from our database
$sq3 = mysqli_query($db, "SELECT id,category,cname,module,description,score,year,file FROM certification WHERE username='$username'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$q3 = mysqli_query($db, "SELECT * FROM certification WHERE username='$username'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

// Establish the output variable
$dyn_table2 = '<table border="1" cellpadding="6" width="750" background="Image/background2_table.jpg" bordercolor="#990000">';

if(mysqli_fetch_array($q3) > 0){
	$dyn_table2 .='<caption>Certification</caption>';
	$dyn_table2 .= '<tr><td><h4>Category</h4></td><td><h4>Course Name</h4></td><td><h4>Year</h4></td><td><h4>Module</h4></td><td><h4>Score</h4></td><td><h4>Description</h4></td><td><h4>Uploaded File</h4></td><td><h4>Delete</h4></td></tr>';
}else{}

while($row = mysqli_fetch_array($sq3)){ 
    $id = $row["id"];
    $category = $row["category"];
    $cname= $row["cname"];
	$module= $row["module"];
	$year= $row["year"];
	$description= $row["description"];
	$score= $row["score"];
	$file= $row["file"];
	$dyn_table2 .= '<tr><td width="130"> ' . $category . '</td><td width="125">' . $cname . '</td><td width="70"> ' . $year . '</td><td width="90"> ' . $module . '</td><td width="95"> ' . $score . '</td><td width="70"> ' . $description . '</td><td width="150">'.'<a style="cursor:pointer;" onclick=\'NewWindow("'.$file.'","","500","500","yes","center")\'>'. $file .'</a>'.'</td><td align=\'center\'><a href="ajax.php?table=certification&id='.$id.'&page=\'admin\'&student='.$username.'"><img src="delete.jpg" width=\'30\'/></a></td></tr>';
		
	}
$dyn_table2 .= '</table>';

// SQL query to interact with info from our database
$sq4 = mysqli_query($db, "SELECT id,category,co_name,exp,designation,file FROM work_exp WHERE username='$username'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$q4 = mysqli_query($db, "SELECT * FROM work_exp WHERE username='$username'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

// Establish the output variable
$dyn_table3 = '<table border="1" cellpadding="6" width="750" background="Image/background_table.jpg" bordercolor="#990000">';

if(mysqli_fetch_array($q4) > 0){
	$dyn_table3 .='<caption>Work Experience</caption>';
	$dyn_table3 .= '<tr><td><h4>Category</h4></td><td><h4>Company Name</h4></td><td><h4>Experience</h4></td><td><h4>Designation</h4></td><td><h4>Uploaded File</h4></td><td><h4>Delete</h4></td></tr>';
}else{}

while($row = mysqli_fetch_array($sq4)){ 
    $id = $row["id"];
    $category = $row["category"];
    $co_name= $row["co_name"];
	$exp= $row["exp"];
	$ds= $row["designation"];
	$file= $row["file"];
	$dyn_table3 .= '<tr><td width="130">' . $category . '</td><td width="125">' . $co_name . '</td><td width="70"> ' . $exp . '</td><td width="200"> ' . $ds . '</td><td width="150">'.'<a style="cursor:pointer;" onclick=\'NewWindow("'.$file.'","","500","500","yes","center")\'>'. $file .'</a>'.'</td><td align=\'center\'><a href="ajax.php?table=work_exp&id='.$id.'&page=\'admin\'&student='.$username.'"><img src="delete.jpg" width=\'30\'/></a></td></tr>';

	}
$dyn_table3 .= '</table>';


// SQL query to interact with info from our database
$sq5 = mysqli_query($db, "SELECT id,category,ename,award,year,description,file FROM technical_ds WHERE username='$username'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$q5 = mysqli_query($db, "SELECT * FROM technical_ds WHERE username='$username'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

// Establish the output variable
$dyn_table4 = '<table border="1" cellpadding="6" width="750" bordercolor="#00FF99" background="Image/background_table.jpg">';

if(mysqli_fetch_array($q5) > 0){
$dyn_table4 .='<caption>Technical Fest</caption>';
$dyn_table4 .= '<tr><td><h4>Category</h4></td><td><h4>Event Name</h4></td><td><h4>Year</h4></td><td><h4>Position</h4></td><td><h4>Description</h4></td><td><h4>Uploaded File</h4></td><td><h4>Delete</h4></td></tr>';
}else{}

while($row = mysqli_fetch_array($sq5)){ 
    $id = $row["id"];
    $category = $row["category"];
    $ename= $row["ename"];
	$position= $row["award"];
	$year= $row["year"];
	$description= $row["description"];
	$file= $row["file"];
	$dyn_table4 .= '<tr><i><td width="130">' . $category . '</td><td width="125">' . $ename . '</td><td width="70"> ' . $year . '</td><td width="200"> ' . $position . '</td><td width="200"> ' . $description . '</td><td width="150">'.'<a style="cursor:pointer;" onclick=\'NewWindow("'.$file.'","","500","500","yes","center")\'>'. $file .'</a>'.'</td><td align=\'center\'><a href="ajax.php?table=technical_ds&id='.$id.'&page=\'admin\'&student='.$username.'"><img src="delete.jpg" width=\'30\'/></a></td></i></tr>';
	}
$dyn_table4 .= '</table>';


// SQL query to interact with info from our database
$sq6 = mysqli_query($db, "SELECT id,category,papername,year,description,file FROM technical_paper WHERE username='$username'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$q6 = mysqli_query($db, "SELECT * FROM technical_paper WHERE username='$username'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

// Establish the output variable
$dyn_table5 = '<table border="1" cellpadding="6" width="750" bordercolor="#00FF99" background="Image/background2_table.jpg">';

if(mysqli_fetch_array($q6) > 0){
$dyn_table5 .='<caption>Technical Papers</caption>';
$dyn_table5 .= '<tr><td><h4>Category</h4></td><td><h4>Paper Name</h4></td><td><h4>Year</h4></td><td><h4>Description</h4></td><td><h4>Uploaded File</h4></td><td><h4>Delete</h4></td></tr>';
}else{}

while($row = mysqli_fetch_array($sq6)){ 
    $id = $row["id"];
    $category = $row["category"];
    $papername= $row["papername"];
	$year= $row["year"];
	$description= $row["description"];
	$file= $row["file"];
	$dyn_table5 .= '<tr><i><td width="130">' . $category . '</td><td width="125">' . $papername . '</td><td width="70"> ' . $year . '</td><td width="70"> ' . $description . '</td><td width="150">'.'<a style="cursor:pointer;" onclick=\'NewWindow("'.$file.'","","500","500","yes","center")\'>'. $file .'</a>'.'</td><td align=\'center\'><a href="ajax.php?table=technical_paper&id='.$id.'&page=\'admin\'&student='.$username.'"><img src="delete.jpg" width=\'30\'/></a></td></i></tr>';
	}
$dyn_table5 .= '</table>';


echo $dyn_table.'<br>'; echo $dyn_table2.'<br>'; echo $dyn_table4.'<br>'; echo $dyn_table3.'<br>'; echo $dyn_table1.'<br>'; echo $dyn_table5;


?>

</td></tr>       
            </table>
         </fieldset>
       </td>
	</tr>
    <tr>  <td colspan="2"><?php include("footer.php"); ?></td></tr>
</table> 
</td></tr>
</table> 

</body>  
</html> 
<?php

}
else{
?><html>
		<head>
	<script type="text/javascript">
	
			window.location="index.php";
			</script></head>
		</html>
			<?php
}
?>