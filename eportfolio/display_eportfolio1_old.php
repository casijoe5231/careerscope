
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
include("database.php");

$sq1= mysqli_query($db, "SELECT category, topic, member, year, description FROM seminar_wp WHERE username='{$_POST['UserName']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

// Establish the output variable
$dyn_table = '<table border="1" cellpadding="6"  bordercolor="#00FF99" background="Image/background_table.jpg">';
 
$dyn_table .= '<tr><td><h4>Category</h4></td><td><h4>Topic Name</h4></td><td><h4>Year</h4></td><td><h4>Description</h4></td></tr>';

while($row = mysqli_fetch_array($sq1)){ 
    
    $category = $row["category"];
    $topicname= $row["topic"];
	$year= $row["year"];
	$description= $row["description"];

    $dyn_table .= '<tr><i><td width="130">' . $category . '</td><td width="125">' . $topicname . '</td><td width="70"> ' . $year . '</td><td width="200"> ' . $description . '</td></i></tr>';

    
	}
$dyn_table .= '</table>';

// SQL query to interact with info from our database
$sq2 = mysqli_query($db, "SELECT category,sportsname,position, year FROM sports WHERE username='{$_POST['UserName']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));


// Establish the output variable
$dyn_table1 = '<table border="1" cellpadding="6" bordercolor="#00FF99" background="Image/background_table.jpg">';
 
 $dyn_table1 .= '<tr><td><h4>Category</h4></td><td><h4>Sports Name</h4></td><td><h4>Year</h4></td><td><h4>Position</h4></td></tr>';

 while($row = mysqli_fetch_array($sq2)){
    
    $category = $row["category"];
    $sportsname= $row["sportsname"];
	$year= $row["year"];
	$position= $row["position"];
	
    $dyn_table1 .= '<tr><td width="130">'. $category .'</td><td width="125">'. $sportsname .'</td><td width="70">'. $year .'</td><td width="190">'. $position .'</td></tr>';
    }
$dyn_table1 .= '</table>';

// SQL query to interact with info from our database
$sq3 = mysqli_query($db, "SELECT category,cname,module,score,year FROM certification WHERE username='{$_POST['UserName']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));


// Establish the output variable
$dyn_table2 = '<table border="1" cellpadding="6" background="Image/background2_table.jpg" bordercolor="#990000">';

 $dyn_table2 .= '<tr><td><h4>Category</h4></td><td><h4>Course Name</h4></td><td><h4>Year</h4></td><td><h4>Module</h4></td><td><h4>Score</h4></td></tr>';

while($row = mysqli_fetch_array($sq3)){ 
    
    $category = $row["category"];
    $cname= $row["cname"];
	$module= $row["module"];
	$year= $row["year"];
	$score= $row["score"];
	
	$dyn_table2 .= '<tr><td width="130"> ' . $category . '</td><td width="125">' . $cname . '</td><td width="70"> ' . $year . '</td><td width="90"> ' . $module . '</td><td width="95"> ' . $score . '</td></tr>';
		
	}
$dyn_table2 .= '</table>';

// SQL query to interact with info from our database
$sq4 = mysqli_query($db, "SELECT category,co_name,exp,designation FROM work_exp WHERE username='{$_POST['UserName']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));


// Establish the output variable
$dyn_table3 = '<table border="1" cellpadding="6"  background="Image/background2_table.jpg" bordercolor="#990000">';

$dyn_table3 .= '<tr><td><h4>Category</h4></td><td><h4>Company Name</h4></td><td><h4>Experience</h4></td><td><h4>Designation</h4></td></tr>';

while($row = mysqli_fetch_array($sq4)){ 
    
    $category = $row["category"];
    $co_name= $row["co_name"];
	$exp= $row["exp"];
	$ds= $row["designation"];
	$dyn_table3 .= '<tr><td width="130">' . $category . '</td><td width="125">' . $co_name . '</td><td width="70"> ' . $exp . '</td><td width="190"> ' . $ds . '</td></tr>';

	}
$dyn_table3 .= '</table>';


// SQL query to interact with info from our database
$sq5 = mysqli_query($db, "SELECT category,ename,award,year FROM technical_ds WHERE username='{$_POST['UserName']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));


// Establish the output variable
$dyn_table4 = '<table border="1" cellpadding="6" bordercolor="#00FF99" background="Image/background_table.jpg">';

$dyn_table4 .= '<tr><td><h4>Category</h4></td><td><h4>Event Name</h4></td><td><h4>Year</h4></td><td><h4>Position</h4></td></tr>';

while($row = mysqli_fetch_array($sq5)){ 
    
    $category = $row["category"];
    $ename= $row["ename"];
	$position= $row["award"];
	$year= $row["year"];
	
	$dyn_table4 .= '<tr><i><td width="130">' . $category . '</td><td width="125">' . $ename . '</td><td width="70"> ' . $year . '</td><td width="190"> ' . $position . '</td></i></tr>';
	}
$dyn_table4 .= '</table>';
echo $dyn_table.'<br>'; echo $dyn_table2.'<br>'; echo $dyn_table4.'<br>'; echo $dyn_table3.'<br>'; echo $dyn_table1;

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