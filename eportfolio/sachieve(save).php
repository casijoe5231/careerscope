<?php include("database.php");

$category = $_SESSION['category'];
$category1 = $_POST['category'];
$topic = $_POST['topic'];
//$member = $_POST['member'];
$year = $_POST['year'];
$ename = $_POST['ename'];
$cname = $_POST['cname'];
$desription = $_POST['description'];

if(isset($_FILES['file']['name']) && $_FILES['file']['name']!='')
{
$file = "upload/".$_SESSION['username']."/".$_FILES['file']['name'];
$file_query = ", file='$file'";
}
else
$file_query = "";

$username=$_SESSION['username'];
$score = $_POST['score'];
$co_name = $_POST['co_name'];
$designation = $_POST['designation'];
$exp = $_POST['exp'];
$module = $_POST['module'];
$sportname = $_POST['sportname'];
//$playedas = $_POST['playedas'];
$position = $_POST['position'];
$papername = $_POST['papername'];
$degree = $_POST['degree'];
$collegename = $_POST['collegename'];
$boardname = $_POST['boardname'];
$percentage = $_POST['percentage'];
$yearofpassing = $_POST['yearofpassing'];
$id=$_POST['id'];
$count=0;
if( "UPDATE" == $_POST['update']){

	$sq1 = mysqli_query($db, "SELECT year,username,count FROM graph_year WHERE username = '$username' and year='$year'")or die(mysqli_error($GLOBALS["___mysqli_ston"])); 
	
	while($row = mysqli_fetch_array($sq1)){ 
		if($row['year'] == $year && $row['username'] == $username){
			$count = $row['count'];
			$i = $count + 1;
			$sq2=mysqli_query($db, "UPDATE graph_year SET count='$i' WHERE username = '$username' and year='$year'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));	
		}
		else if($row['year']!= $year){
			$sq2=mysqli_query($db, "insert into graph_year(username,year,count)values('$username','$year','1')")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}
	}
		
	if("Sports" == $category){
		$q1=mysqli_query($db, "UPDATE sports SET sportsname='$sportname', year='$year',position='$position'  $file_query WHERE id='$id'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	}
	
	else if("Seminar" == $category || "Work Shop" == $category || "Project" == $category){
		$q1=mysqli_query($db, "UPDATE seminar_wp SET topic='$topic', year='$year',description='$desription' $file_query WHERE id='$id'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	}
	else if("Certification Course" == $category){
		$q1=mysqli_query($db, "UPDATE certification SET cname='$cname', module='$module', year='$year',description='$desription',score='$score' $file_query WHERE id='$id'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	}
	else if("Techinal Fest" == $category || "Drawing" == $category || "Dancing/Singing" == $category){
		$q1=mysqli_query($db, "UPDATE technical_ds SET ename='$ename', award='$position', year='$year', description='$desription'$file_query WHERE id='$id'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	}
	else if("Work Experience" == $category){
		$q1=mysqli_query($db, "UPDATE work_exp SET co_name='$co_name', exp='$exp', designation='$designation' $file_query WHERE id='$id'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	}
	else if("Technical Paper/Publication" == $category){
		$q1=mysqli_query($db, "UPDATE  technical_paper SET  papername='$papername', year='$year', description='$desription' $file_query WHERE id='$id'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	}
	/*
	else if("Education Qualification" == $category){
		$q1=mysql_query("UPDATE  marksheet SET  degree='$degree', collegename='$collegename', boardname='$boardname', percentage='$percentage', yearofpassing ='$yearofpassing' WHERE id='$id'",$db) or die(mysql_error());
	}*/

	else { echo "Please Select Category";}
	
	$sq3=mysqli_query($db, "UPDATE event_rows SET current_row='0'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));	

?>
<script type="text/javascript">
			alert("Successfully Updated.......");
			window.location="studenthome.php";
			</script>
<?php    
}

else if("SAVE" == $_POST['save']){


define ("MAX_SIZE","100000");
$target="Upload/".$_SESSION['username'];

if (!is_dir($target)) {
   mkdir($target);
}

if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
  
  move_uploaded_file($_FILES["file"]["tmp_name"],
      $img="upload/".$_SESSION['username']."/".$_FILES["file"]["name"]);
	  //echo "<a href='".$img."'>sports</a>";
	  /*$q1=mysql_query("UPDATE registration SET pic='$img' WHERE pUserName='{$_SESSION['username']}'",$db) or die(mysql_error());*/
	  }

?>
<html>
<head>
	<script type="text/javascript">
		/*alert("Data Uploaded");
		window.location="studenthome.php";*/
	</script>

<?php




	 $sq1 = mysqli_query($db, "SELECT count FROM graph_year WHERE username = '$un' and year='$year'")or die(mysqli_error($GLOBALS["___mysqli_ston"])); 
	 $row = mysqli_fetch_array($sq1);
	 $count = $row["count"];
	 
	 if($sq1){
		$q1=mysqli_query($db, "UPDATE graph_year SET count='$count + 1' WHERE username = '$un' and year='$year'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));	
	 }
	 else{
		$q1=mysqli_query($GLOBALS["___mysqli_ston"], "insert into graph_year(username,year,count)values('$username','$year','1')")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	 }

	if("Seminar" == $category1 || "Work Shop" == $category1 || "Project" == $category1){
		$q1=mysqli_query($GLOBALS["___mysqli_ston"], "insert into seminar_wp(username,category,topic,year,description,file)values('$username','$category','$topic','$year','$desription','$img')")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	}
	else if("Techinal Fest" == $category1 || "Drawing" == $category1 || "Dancing/Singing" == $category1){
		$q1=mysqli_query($GLOBALS["___mysqli_ston"], "insert into technical_ds(username,category,ename,award,year,description,file)values('$username','$category','$ename','$position','$year','$desription','$img')")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	}
	else if("Certification Course" == $category1){
		$q1=mysqli_query($GLOBALS["___mysqli_ston"], "insert into certification(username,category,cname,module,year,description,score,file)values('$username','$category','$cname','$module','$year','$desription','$score','$img')")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}
		else if("Work Experience" == $category1){
		$q1=mysqli_query($GLOBALS["___mysqli_ston"], "insert into work_exp(username,category,co_name,exp,designation,file)values('$username','$category','$co_name','$exp','$designation','$img')")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}
	else if("Sports" == $category1){
		$q1=mysqli_query($GLOBALS["___mysqli_ston"], "insert into sports(username,category,sportsname,position,year,file)values('$username','$category','$sportname','$position','$year','$img')")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		}
	else if("Technical Paper/Publication" == $category){
		$q1=mysqli_query($GLOBALS["___mysqli_ston"], "insert into technical_paper(username,category, papername,year,description,file)values('$username','$category','$papername','$year','$desription','$img')")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	}

		else{ echo "Choose Catgory";}
	
?>

<script type="text/javascript">
			alert("Record Saved.......");
			window.location="studenthome.php";
</script>
            
<?php
}

else if("DELETE" == $_POST['delete']){

if("Sports" == $category){
		$q1=mysqli_query($db, "delete from sports WHERE id='$id'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		echo $sportname;
	}
	
	else if("Seminar" == $category || "Work Shop" == $category || "Project" == $category){
		$q1=mysqli_query($db, "delete from seminar_wp  WHERE id='$id'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	}
 	else if("Certification Course" == $category){
		$q1=mysqli_query($db, "delete from certification  WHERE id='$id'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	}
	else if("Techinal Fest" == $category || "Drawing" == $category || "Dancing/Singing" == $category){
		$q1=mysqli_query($db, "delete from technical_ds  WHERE id='$id'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	}
	else if("Work Experience" == $category){
		$q1=mysqli_query($db, "delete from work_exp  WHERE id='$id'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	}
	else if("Technical Paper/Publication" == $category){
		$q1=mysqli_query($db, "delete from technical_paper  WHERE id='$id'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	}
	else { echo "Please Select Category";}
	
	$sq3=mysqli_query($db, "UPDATE event_rows SET current_row='0'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));	

?>

<script type="text/javascript">
			alert("Record Deleted");
			window.location="studenthome.php";
			</script>
            
<?php
}

function handleError() {
trigger_error('MY ERROR');
}

?>
