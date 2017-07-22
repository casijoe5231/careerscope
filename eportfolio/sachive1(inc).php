<?php 
include("../connection1.php");

$update = $_GET['update'];
$delete = $_GET['delete'];

?>

<?php
//update and delete record
if("UPDATE/DELETE"==$update)
{
$page = $_GET['page'];
$category = $_GET['category'];
$username = $_GET['username'];


		if("Sports" == $category){
		
		$result = mysqli_query($db, "SELECT id, sportsname, playedas, member, position, year FROM sports WHERE username='$username' order by id") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		$num = mysqli_num_rows($result);
		
		$result1 = mysqli_query($db, "SELECT current_row FROM event_rows WHERE event='Sports'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		$row = mysqli_fetch_array($result1);
		$current_row = $row['current_row'];
		
		if($page == "next_page" && $current_row < $num - 1)
		{
			$i = $current_row + 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Sports'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}
		else if($page == "previous_page" && $current_row >= $num - 1)
		{
			$i = $current_row - 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Sports'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}	
			$sportsname = mysqli_result($result, $i,  'sportsname');
			$playedas = mysqli_result($result,  $i,  'playedas');
			$member = mysqli_result($result,  $i,  'member');
			$position = mysqli_result($result,  $i,  'position');
			$year = mysqli_result($result,  $i,  'year');
			$id = mysqli_result($result,  $i,  'id');

$x= "<form name='create' method='post' action='sachieve(save).php' enctype='multipart/form-data'>";			
$x.= "<table border='0' width='500'><tr align='left'><th>Sport Name:</th><td ><input type='text' name='sportname' value='$sportsname' id='sportname'/></td></tr>";
//$x.= "<tr><th>Played As:</th><td ><input type='text' name='playedas' value=' $playedas' id='splayedas'/></td></tr>";
//$x.= "<tr><th>No. Of Member:</th><td ><input type='text' name='member' value=' $member' id='smember'/></td></tr>";
$x.= "<tr align='left'><th>Year:</th><td><input type='text'name='year' value='$year' id='syear'/></td></tr>";
$x.= "<tr align='left'><th/><td><input type='hidden' name='id' value='$id' /></td></tr>";
$x.= "<tr align='left'><th>Position: </th><td ><select name='position' id='sposition'>";
$x.= "<option value='$position'>$position</option>";
$x.= "<option value='Winner'>Winner</option>";
$x.= "<option value='Runner Up'>Runner Up</option>";
$x.= "<option value='Participant'>Participant</option>";
$x.= "<tr align='left'><th>Upload</th><td ><input type='file' name='file' id='file'/></td></tr>";
$x.= "</select></td></tr><tr><td/><td/></tr>";
$x.="<tr><td></td><td align='left'><input type='submit' name='update' value='UPDATE' onClick='return validateForm1();'/>&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='delete' value='DELETE'/></td></tr>";
$x.= "</table>";
$x.= "</form>";
print $x;	
}

else if("Seminar" == $category){
		
	$result = mysqli_query($db, "SELECT id, topic,member,year,description FROM seminar_wp WHERE username='$username' And category='$category'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	$num = mysqli_num_rows($result);
		
		$result1 = mysqli_query($db, "SELECT current_row FROM event_rows WHERE event='Seminar'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		$row = mysqli_fetch_array($result1);
		$current_row = $row['current_row'];
		
		if($page == "next_page" && $current_row < $num - 1)
		{
			$i = $current_row + 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Seminar'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}
		else if($page == "previous_page" && $current_row > $num - 1)
		{
			$i = $current_row - 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Seminar'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}		
			
			$topic = mysqli_result($result, $i,  'topic');
			$member = mysqli_result($result, $i,  'member');
			$year = mysqli_result($result, $i,  'year');
			$description = mysqli_result($result, $i,  'description');
			$id = mysqli_result($result, $i,  'id');
			
$x= "<form name='create' method='post' action='sachieve(save).php' enctype='multipart/form-data'>";						
$x.= "<table border='0' width='500'><tr align='left'><th>Topic Name:</th><td ><input type='text' name='topic' value='$topic' id='topic'/></td></tr>";
//$x.= "<tr><th>No. of Member:</th><td ><input type='text' name='member' value='$member' id='semember'/></td></tr>";
$x.= "<tr align='left'><th>Year:</th><td ><input type='text' name='year' value=' $year' id='seyear'/></td></tr>";
$x.= "<tr align='left'><th>Description:</th><td ><textarea name='description' cols='16' id='sedesc'>$description</textarea></td></tr>";
$x.= "<tr align='left'><th>Upload</th><td ><input type='file' name='file' id='file'/></td></tr>";
$x.= "<tr align='left'><th/><td><input type='hidden' name='id' value='$id'/></td></tr>";
$x.="<tr><td></td><td align='left'><input type='submit' name='update' value='UPDATE' onClick='return validateForm2();'/>&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='delete' value='DELETE'/></td></tr>";
$x.= "</table>";
$x.= "</form>";
print $x;	
}

else if("Work Shop" == $category){
		
	$result = mysqli_query($db, "SELECT id, topic,member,year,description FROM seminar_wp WHERE username='$username' And category='$category'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	$num = mysqli_num_rows($result);
		
		$result1 = mysqli_query($db, "SELECT current_row FROM event_rows WHERE event='Work Shop'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		$row = mysqli_fetch_array($result1);
		$current_row = $row['current_row'];
		
		if($page == "next_page" && $current_row < $num - 1)
		{
			$i = $current_row + 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Work Shop'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}
		else if($page == "previous_page" && $current_row > $num - 1)
		{
			$i = $current_row - 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Work Shop'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}	
			$topic = mysqli_result($result, $i,  'topic');
			$member = mysqli_result($result, $i,  'member');
			$year = mysqli_result($result, $i,  'year');
			$description = mysqli_result($result, $i,  'description');
			$id = mysqli_result($result, $i,  'id');
			
$x= "<form name='create' method='post' action='sachieve(save).php' enctype='multipart/form-data'>";						
$x.= "<table border='0' width='500'><tr align='left'><th>Topic Name:</th><td ><input type='text' name='topic' value='$topic'    id='wtopic'/></td></tr>";
//$x.= "<tr><th>No. of Member:</th><td ><input type='text' name='member' value=' $member' id='wmember'/></td></tr>";
$x.= "<tr align='left'><th>Year:</th><td ><input type='text' name='year' value=' $year' id='wyear'/></td></tr>";
$x.= "<tr align='left'><th>Description:</th><td ><textarea name='description' cols='16' id='wdesc'>$description</textarea></td></tr>";
$x.= "<tr align='left'><th>Upload</th><td ><input type='file' name='file' id='file'/></td></tr>";
$x.= "<tr align='left'><th/><td><input type='hidden' name='id' value='$id'/></td></tr>";
$x.="<tr><td></td><td align='left'><input type='submit' name='update' value='UPDATE' onClick='return validateForm3();'/>&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='delete' value='DELETE'/></td></tr>";
$x.= "</table>";
$x.= "</form>";
print $x;	
}
else if("Project" == $category){
		
	$result = mysqli_query($db, "SELECT id, topic,member,year,description FROM seminar_wp WHERE username='$username' And category='$category'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	$num = mysqli_num_rows($result);
		
		$result1 = mysqli_query($db, "SELECT current_row FROM event_rows WHERE event='Project'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		$row = mysqli_fetch_array($result1);
		$current_row = $row['current_row'];
		
		if($page == "next_page" && $current_row < $num - 1)
		{
			$i = $current_row + 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Project'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}
		else if($page == "previous_page" && $current_row > $num - 1)
		{
			$i = $current_row - 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Project'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}	
	
		
			$topic = mysqli_result($result, $i,  'topic');
			$member = mysqli_result($result, $i,  'member');
			$year = mysqli_result($result, $i,  'year');
			$description = mysqli_result($result, $i,  'description');
			$id = mysqli_result($result, $i,  'id');		
				
$x= "<form name='create' method='post' action='sachieve(save).php' enctype='multipart/form-data'>";			
$x.= "<table border='0' width='500'><tr align='left'><th>Topic Name:</th><td ><input type='text' name='topic' value='$topic'  id='ptopic'/></td></tr>";
//$x.= "<tr><th>No. of Member:</th><td ><input type='text' name='member' value=' $member' id='pmember'/></td></tr>";
$x.= "<tr align='left'><th>Year:</th><td ><input type='text' name='year' value=' $year' id='pyear'/></td></tr>";
$x.= "<tr align='left'><th>Description:</th><td ><textarea name='description' cols='16' id='pdesc'>$description</textarea></td></tr>";
$x.= "<tr align='left'><th>Upload</th><td ><input type='file' name='file' id='file'/></td></tr>";
$x.= "<tr align='left'><th/><td><input type='hidden' name='id' value='$id'/></td></tr>";
$x.="<tr><td></td><td align='left'><input type='submit' name='update' value='UPDATE' onClick='return validateForm4();'/>&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='delete' value='DELETE'/></td></tr>";
$x.= "</table>";
$x.= "</form>";
print $x;	
}

else if("Techinal Fest" == $category){
		
	$result = mysqli_query($db, "SELECT id,ename,award,year,member,description FROM technical_ds WHERE username='$username' And category='$category'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	$num = mysqli_num_rows($result);
		
		$result1 = mysqli_query($db, "SELECT current_row FROM event_rows WHERE event='Techinal Fest'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		$row = mysqli_fetch_array($result1);
		$current_row = $row['current_row'];
		
		if($page == "next_page" && $current_row < $num - 1)
		{
			$i = $current_row + 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Techinal Fest'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}
		else if($page == "previous_page" && $current_row > $num - 1)
		{
			$i = $current_row - 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Techinal Fest'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}	

		
			$ename = mysqli_result($result, $i,  'ename');
			$award = mysqli_result($result, $i,  'award');
			$year = mysqli_result($result, $i,  'year');
			$member = mysqli_result($result, $i,  'member');
			$description = mysqli_result($result, $i,  'description');
			$id = mysqli_result($result, $i,  'id');
			
$x= "<form name='create' method='post' action='sachieve(save).php' enctype='multipart/form-data'>";						
$x.= "<table border='0' width='500'><tr align='left'><th>Event Name:</th><td ><input type='text' name='ename' value='$ename' id='ename'/></td></tr>";
//$x.= "<tr><th>No. Of Member:</th><td><input type='text'name='member' value='$member' id='tfname'/></td></tr>";
$x.= "<tr align='left'><th>Year:</th><td ><input type='text' name='year' value=' $year' id='tfyear'/></td></tr>";
$x.= "<tr align='left'><th>Description:</th><td ><textarea name='description' cols='16' id='tfdesc'>$description</textarea></td></tr>";
$x.= "<tr align='left'><th/><td><input type='hidden' name='id' value='$id'/></td></tr>";
$x.= "<tr align='left'><th>Position: </th><td ><select name='position' id='tfposition'>";
$x.= "<option value='$award'> $award</option>";
$x.= "<option value='Winner'>Winner</option>";
$x.= "<option value='Runner Up'>Runner Up</option>";
$x.= "<option value='Participant'>Participant</option>";
$x.= "</select></td></tr>";
$x.= "<tr align='left'><th>Upload</th><td ><input type='file' name='file' id='file'/></td></tr>";
$x.="<tr><td></td><td align='left'><input type='submit' name='update' value='UPDATE' onClick='return validateForm5();'/>&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='delete' value='DELETE'/></td></tr>";
$x.= "</table>";
$x.= "</form>";
print $x;	
}

else if("Drawing" == $category){
		
		$result = mysqli_query($db, "SELECT id,ename,award,year,member,description FROM technical_ds WHERE username='$username' And category='$category'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	$num = mysqli_num_rows($result);
		
		$result1 = mysqli_query($db, "SELECT current_row FROM event_rows WHERE event='Drawing'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		$row = mysqli_fetch_array($result1);
		$current_row = $row['current_row'];
		
		if($page == "next_page" && $current_row < $num - 1)
		{
			$i = $current_row + 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Drawing'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}
		else if($page == "previous_page" && $current_row > $num - 1)
		{
			$i = $current_row - 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Drawing'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}	

		
			$ename = mysqli_result($result, $i,  'ename');
			$position = mysqli_result($result, $i,  'award');
			$year = mysqli_result($result, $i,  'year');
			$member = mysqli_result($result, $i,  'member');
			$description = mysqli_result($result, $i,  'description');
			$id = mysqli_result($result, $i,  'id');
	
$x= "<form name='create' method='post' action='sachieve(save).php' enctype='multipart/form-data'>";						
$x.= "<table border='0' width='500'><tr align='left'><th>Event Name:</th><td ><input type='text' name='ename' value='$ename' id='dename'/></td></tr>";
//$x.= "<tr><th>No. Of Member:</th><td><input type='text'name='member' value='$member' id='dmember'/></td></tr>";
$x.= "<tr align='left'><th>Year:</th><td ><input type='text' name='year' value=' $year' id='dyear'/></td></tr>";
$x.= "<tr align='left'><th>Description:</th><td ><textarea name='description' cols='16' id='ddesc'>$description</textarea></td></tr>";
$x.= "<tr align='left'><th/><td><input type='hidden' name='id' value='$id'/></td></tr>";
$x.= "<tr align='left'><th>Position: </th><td ><select name='position' id='daward'>";
$x.= "<option value='$position'> $position</option>";
$x.= "<option value='Winner'>Winner</option>";
$x.= "<option value='Runner Up'>Runner Up</option>";
$x.= "<option value='Participant'>Participant</option>";
$x.= "</select></td></tr>";
$x.= "<tr align='left'><th>Upload</th><td ><input type='file' name='file' id='file'/></td></tr>";
$x.="<tr><td></td><td align='left'><input type='submit' name='update' value='UPDATE' onClick='return validateForm6();'/>&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='delete' value='DELETE'/></td></tr>";;
$x.= "</table>";
$x.= "</form>";
print $x;	
}

else if("Dancing/Singing" == $category){
		
		$result = mysqli_query($db, "SELECT id,ename,award,year,member,description FROM technical_ds WHERE username='$username' And category='$category'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	$num = mysqli_num_rows($result);
		
		$result1 = mysqli_query($db, "SELECT current_row FROM event_rows WHERE event='Dancing/Singing'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		$row = mysqli_fetch_array($result1);
		$current_row = $row['current_row'];
		
		if($page == "next_page" && $current_row < $num - 1)
		{
			$i = $current_row + 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Dancing/Singing'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}
		else if($page == "previous_page" && $current_row > $num - 1)
		{
			$i = $current_row - 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Dancing/Singing'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}	

		
			$ename = mysqli_result($result, $i,  'ename');
			$award = mysqli_result($result, $i,  'award');
			$year = mysqli_result($result, $i,  'year');
			$member = mysqli_result($result, $i,  'member');
			$description = mysqli_result($result, $i,  'description');
			$id = mysqli_result($result, $i,  'id');
	
$x= "<form name='create' method='post' action='sachieve(save).php' enctype='multipart/form-data'>";						
$x.= "<table border='0' width='500'><tr align='left'><th>Event Name:</th><td ><input type='text' name='ename' value='$ename' id='dsename'/></td></tr>";
//$x.= "<tr><th>No. Of Member:</th><td><input type='text'name='member' value='$member' id='dsmember'/></td></tr>";
$x.= "<tr align='left'><th>Year:</th><td ><input type='text' name='year' value=' $year' id='dsyear'/></td></tr>";
$x.= "<tr align='left'><th>Description:</th><td ><textarea name='description' cols='16' id='dsdesc'>$description</textarea></td></tr>";
$x.= "<tr align='left'><th>Upload</th><td ><input type='file' name='file' id='file'/></td></tr>";
$x.= "<tr align='left'><th/><td><input type='hidden' name='id' value='$id'/></td></tr>";
$x.= "<tr align='left'><th>Position: </th><td ><select name='position' id='dsaward'>";
$x.= "<option value='$award'> $award</option>";
$x.= "<option value='Winner'>Winner</option>";
$x.= "<option value='Runner Up'>Runner Up</option>";
$x.= "<option value='Participant'>Participant</option>";
$x.= "</select></td></tr>";
$x.="<tr><td></td><td align='left'><input type='submit' name='update' value='UPDATE' onClick='return validateForm7();'/>&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='delete' value='DELETE'/></td></tr>";
$x.= "</table>";
$x.= "</form>";
print $x;	
}

else if("Certification Course" == $category){		
		$result = mysqli_query($db, "SELECT id,cname,module,year,description,score FROM certification WHERE username='$username'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		$num = mysqli_num_rows($result);
		
		$result1 = mysqli_query($db, "SELECT current_row FROM event_rows WHERE event='Certification Course'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		$row = mysqli_fetch_array($result1);
		$current_row = $row['current_row'];
		
		if($page == "next_page" && $current_row < $num - 1)
		{
			$i = $current_row + 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Certification Course'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}
		else if($page == "previous_page" && $current_row > $num - 1)
		{
			$i = $current_row - 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Certification Course'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}	

		
			$cname = mysqli_result($result, $i,  'cname');
			$module = mysqli_result($result, $i,  'module');
			$year = mysqli_result($result, $i,  'year');
			$score = mysqli_result($result, $i,  'score');
			$description = mysqli_result($result, $i,  'description');
			$id = mysqli_result($result, $i,  'id');
	
			
$x= "<form name='create' method='post' action='sachieve(save).php' enctype='multipart/form-data'>";				
$x.= "<table border='0' width='500'><tr align='left'><th>Course Name:</th><td ><input type='text' name='cname' value='$cname' id='ccname'/></td></tr>";
$x.= "<tr align='left'><th>Module:</th><td><input type='text'name='module' value='$module' id='ccmodule'/></td></tr>";
$x.= "<tr align='left'><th>Year:</th><td ><input type='text' name='year' value=' $year' id='ccyear'/></td></tr>";
$x.= "<tr align='left'><th>Description:</th><td ><textarea name='description' cols='16' id='ccdesc'>$description</textarea></td></tr>";
$x.= "<tr align='left'><th>Score:</th><td ><input type='text' name='score' value=' $score' id='ccscore'/></td></tr>";
$x.= "<tr align='left'><th>Upload</th><td ><input type='file' name='file' id='file'/></td></tr>";
$x.= "<tr align='left'><th/><td><input type='hidden' name='id' value='$id'/></td></tr>";
$x.="<tr><td></td><td align='left'><input type='submit' name='update' value='UPDATE' onClick='return validateForm8();'/>&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='delete' value='DELETE'/></td></tr>";
$x.= "</table>";
$x.= "</form>";
print $x;	
}

else if("Work Experience" == $category){		
		$result = mysqli_query($db, "SELECT id,co_name,exp,designation FROM work_exp WHERE username='$username'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		$num = mysqli_num_rows($result);
		
		$result1 = mysqli_query($db, "SELECT current_row FROM event_rows WHERE event='Work Experience'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		$row = mysqli_fetch_array($result1);
		$current_row = $row['current_row'];
		
		if($page == "next_page" && $current_row < $num - 1)
		{
			$i = $current_row + 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Work Experience'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}
		else if($page == "previous_page" && $current_row > $num - 1)
		{
			$i = $current_row - 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Work Experience'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}	

		
			$co_name = mysqli_result($result, $i,  'co_name');
			$exp = mysqli_result($result, $i,  'exp');
			$designation = mysqli_result($result, $i,  'designation');
			$id = mysqli_result($result, $i,  'id');

$x= "<form name='create' method='post' action='sachieve(save).php' enctype='multipart/form-data'>";						
$x.= "<table border='0' width='500'><tr align='left'><th>Organisation Name:</th><td ><input type='text' name='co_name' value='$co_name' id='weco_name'/></td></tr>";
$x.= "<tr align='left'><th>Experience (in Months):</th><td><input type='text' name='exp' value='$exp' id='wee'/></td></tr>";
$x.= "<tr align='left'><th>Designation:</th><td ><input type='text' name='designation' value=' $designation' id='wedesc'/></td></tr>";
$x.= "<tr align='left'><th>Upload</th><td ><input type='file' name='file' id='file'/></td></tr>";
$x.= "<tr align='left'><th/><td><input type='hidden' name='id' value='$id'/></td></tr>";
$x.="<tr><td></td><td align='left'><input type='submit' name='update' value='UPDATE' onClick='return validateForm9();'/>&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='delete' value='DELETE'/></td></tr>";
$x.= "</table>";
$x.= "</form>";
print $x;	
}

else if("Technical Paper/Publication" == $category){		
		$result = mysqli_query($db, "SELECT id,papername,year,description,file FROM technical_paper WHERE username='$username'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		$num = mysqli_num_rows($result);
		
		$result1 = mysqli_query($db, "SELECT current_row FROM event_rows WHERE event='Technical Paper/Publication'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		$row = mysqli_fetch_array($result1);
		$current_row = $row['current_row'];
		
		if($page == "next_page" && $current_row < $num - 1)
		{
			$i = $current_row + 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Technical Paper/Publication'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}
		else if($page == "previous_page" && $current_row > $num - 1)
		{
			$i = $current_row - 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Technical Paper/Publication'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}	

		
			$papername = mysqli_result($result, $i,  'papername');
			$year = mysqli_result($result, $i,  'year');
			$file = mysqli_result($result, $i,  'file');
			$description = mysqli_result($result, $i,  'description');
			$id = mysqli_result($result, $i,  'id');

$x= "<form name='create' method='post' action='sachieve(save).php' enctype='multipart/form-data'>";						
$x.= "<table border='0' width='500'><tr align='left'><th>Paper Name:</th><td ><input type='text' name='papername' value='$papername' id='tpname'/></td></tr>";
$x.= "<tr align='left'><th>Year</th><td ><input type='text' name='year' value='$year' id='tpyear'/></td></tr>";
$x.= "<tr align='left'><th>Description: </th><td ><textarea name='description' rows='2' cols='19' id='tpdesc'>$description</textarea></td></tr>";
$x.= "<tr align='left'><th>Upload Paper</th><td ><input type='file' name='file' id='file'/></td></tr>";
$x.= "<tr align='left'><th/><td><input type='hidden' name='id' value='$id'/></td></tr>";
$x.="<tr><td></td><td align='left'><input type='submit' name='update' value='UPDATE' onClick='return validateForm10();'/>&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='delete' value='DELETE'/></td></tr>";
$x.= "</table>";
$x.= "</form>";
print $x;	
}

else if("Education Qualification" == $category){		
		$result = mysqli_query($db, "SELECT id,degree,collegename,boardname,percentage,yearofpassing FROM marksheet WHERE username='$username'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		$num = mysqli_num_rows($result);
		$result1 = mysqli_query($db, "SELECT current_row FROM event_rows WHERE event='Technical Paper/Publication'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		$row = mysqli_fetch_array($result1);
		$current_row = $row['current_row'];
		
		if($page == "next_page" && $current_row < $num - 1)
		{
			$i = $current_row + 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Education Qualification'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}
		else if($page == "previous_page" && $current_row > $num - 1)
		{
			$i = $current_row - 1;
			mysqli_query($db, "UPDATE event_rows SET current_row = '$i' WHERE event='Education Qualification'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}	

		
			$degree = mysqli_result($result, $i,  'degree');
			$collegename = mysqli_result($result, $i,  'collegename');
			$boardname = mysqli_result($result, $i,  'boardname');
			$percentage = mysqli_result($result, $i,  'percentage');
			$yearofpassing = mysqli_result($result, $i,  'yearofpassing');
			$id = mysqli_result($result, $i,  'id');

$x= "<form name='create' method='post' action='sachieve(save).php' enctype='multipart/form-data'>";						
$x.= "<table border='0' width='500'><tr align='left'><th>Specialization:</th><td ><input type='text' name='degree' value='$degree' id='eqdegree'/></td></tr>";
$x.= "<tr align='left'><th>College Name</th><td ><input type='text' name='collegename' value='$collegename' id='eqcolname'/></td></tr>";
$x.= "<tr align='left'><th>Board Name: </th><td ><input type='text' name='boardname' value='$boardname' id='eqboardname'/></td></tr>";
$x.= "<tr align='left'><th>Percentage </th><td ><input type='text' name='percentage' value='$percentage' id='eqper'/></td></tr>";
$x.= "<tr align='left'><th>Year of Passing </th><td ><input type='text' name='yearofpassing' value='$yearofpassing' id='eqyop'/></td></tr>";
$x.= "<tr align='left'><th>Upload</th><td ><input type='file' name='file' id='file'/></td></tr>";
$x.= "<tr align='left'><th/><td><input type='hidden' name='id' value='$id'/></td></tr>";
$x.="<tr><td align='center' colspan='4'><input type='submit' name='update' value='UPDATE' onClick='return validateForm11();'/></td></tr>";
$x.= "</table>";
$x.= "</form>";
print $x;	
}

else { echo"Choose Category ";}

}
//Add record
else if("ADD RECORD" == $next){

if("Sports" == $category){
$x= "<table border='0' width='500'><tr align='left'><th>Sport Name:</th><td ><input type='text' name='sportname' id='spname'    /></td></tr>";
//$x.= "<tr><th>Played As:</th><td ><input type='text' name='playedas' id='spa'/></td></tr>";
//$x.= "<tr><th>No. Of Member:</th><td ><input type='text' name='member' id='sno'/></td></tr>";
$x.= "<tr align='left'><th>Year:</th><td><input type='text'name='year' id='syear'/></td></tr>";
$x.= "<tr align='left'><th>Position: </th><td ><select name='position' id='spo'>"; 
$x.= "<option></option>";  
$x.= "<option value='Winner'>Winner</option>"; 
$x.= "<option value='Runner Up'>Runner Up</option>"; 
$x.= "<option value='Participant'>Participant</option>"; 
$x.= "</select></td></tr>";
$x.= "<tr align='left'><th>Upload:</th><td><input type='file'name='file' id='file1'/></td></tr>";
$x.= "</table>";
print $x;	
}

else if("Seminar" == $category || "Work Shop" == $category || "Project" == $category){
$x= "<table border='0' width='400'><tr align='left'><th>Topic Name:</th><td><input type='text' name='topic' id='pname'/></td></tr>";
//$x.= "<tr><th>No. Of Member:</th><td><input type='text' name='member' id='pno'/></td></tr>";
$x.= "<tr align='left'><th>Year:</th><td><input type='text'name='year' id='pyear'/></td></tr>";
$x.= "<tr align='left'><th>Description: </th><td><textarea name='description' rows='2' cols='16' id='pdesc'></textarea></td></tr>";
$x.= "<tr align='left'><th>Upload:</th><td><input type='file'name='file' id='file2'/></td></tr>";
$x.= "</table>";
print $x;	
}

else if("Certification Course" == $category){
$x= "<table border='0' width='500'><tr align='left'><th>Course Name:</th><td ><input type='text' name='cname' id='cname'/></td></tr>";
$x.= "<tr align='left'><th>Module</th><td ><input type='text' name='module' id='cmod'/></td></tr>";
$x.= "<tr align='left'><th>Score:</th><td ><input type='text' name='score' id='csco'/></td></tr>";
$x.="<tr align='left'><th>Year:</td><td><input type='text'name='year' id='cyear'/></th></tr>";
$x.= "<tr align='left'><th>Description: </th><td ><textarea name='description' rows='2' cols='16' id='cdesc'></textarea></td></tr>";
$x.= "<tr align='left'><th>Upload:</th><td><input type='file'name='file' id='file3'/></td></tr>";
$x.= "</table>";
print $x;	
}

else if("Techinal Fest" == $category || "Drawing" == $category || "Dancing/Singing" == $category){
$x= "<table border='0' width='500'><tr align='left'><th>Event Name:</th><td ><input type='text' name='ename' id='ename'/></td></tr>";
//$x.= "<tr><th>No. Of Member:</th><td ><input type='text' name='member' id='tno'/></td></tr>";
$x.= "<tr align='left'><th>Year:</th><td><input type='text'name='year' id='tyear'/></td></tr>";
$x.= "<tr align='left'><th>Description: </th><td ><textarea name='description' rows='2' cols='16' id='tdesc'></textarea></td></tr>";
$x.= "<tr align='left'><th>Position: </th><td ><select name='position' id='tpost'>";
$x.= "<option></option>";
$x.= "<option value='Winner'>Winner</option>";
$x.= "<option value='Runner Up'>Runner Up</option>";
$x.= "<option value='Participant'>Participant</option>";
$x.= "</select></td></tr>";
$x.= "<tr align='left'><th>Upload:</th><td><input type='file'name='file' id='file4'/></td></tr>";
$x.= "</table>";
print $x;
}

else if("Work Experience" == $category){
$x= "<table border='0' width='500'><tr align='left'><th>Organisation Name:</th><td ><input type='text' name='co_name' id='wename'/></td></tr>";
$x.= "<tr align='left'><th>Experience (in Months)</th><td ><input type='text' name='exp' id='wexp'/></td></tr>";
$x.= "<tr align='left'><th>Designation</th><td><input type='text' name='designation' id='wdes'/></td>";
$x.= "<tr align='left'><th>Upload:</th><td><input type='file'name='file' id='file5'/></td></tr>";
$x.= "</table>";
print $x;
}

else if("Technical Paper/Publication" == $category){
$x= "<table border='0' width='500'><tr align='left'><th>Paper Name:</th><td ><input type='text' name='papername' id='tpname'/></td></tr>";
$x.= "<tr align='left'><th>Year</th><td ><input type='text' name='year' id='tpyear'/></td></tr>";
$x.= "<tr align='left'><th>Description: </th><td ><textarea name='description' rows='2' cols='16' id='tdesc'></textarea></td></tr>";
//$x.= "<tr><th>Upload Paper</th><td ><input type='file' name='uploadpaper' /></td></tr>";
$x.= "<tr align='left'><th>Upload:</th><td><input type='file'name='file' id='file6'/></td></tr>";
$x.= "</table>";
print $x;
}

else if("Education Qualification" == $category){
$x= "<a href='InstitutionalInforation.php'>Education Qualification</a>";
print $x;
}

else { echo"Choose Correct Option";}

}
else{
	echo "Option not selected";
}
?>
