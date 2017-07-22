<?php
include_once "../includes/connection2.php";

if(!$con)
{
    die('Could not connect: ' . mysqli_error());
}
	

	if(isset($_POST['disc']) && !isset($_POST['branch']) && !isset($_POST['year']) && !isset($_POST['sem']) && !isset($_POST['subject'])){
		//$branch="Computer Engg.";
		$disc=$_POST['disc'];
		$stmt="SELECT branch FROM subject_kash WHERE discipline='$disc' GROUP BY branch";
		$result=mysqli_query($con,$stmt);
		$branch=array();
		$i=0;
		while($row=mysqli_fetch_array($result)){
			$branch[$i]=$row['branch'];
			$i++;
		}
		echo json_encode(array("branch" => $branch));

	}

	else if(!isset($_POST['disc']) && isset($_POST['branch']) && !isset($_POST['year']) && !isset($_POST['sem']) && !isset($_POST['subject'])){
		//$branch="Computer Engg.";
		$branch=$_POST['branch'];
		$stmt="SELECT year FROM subject_kash WHERE branch='$branch' GROUP BY year";
		$result=mysqli_query($con,$stmt);
		$year=array();
		$i=0;
		while($row=mysqli_fetch_array($result)){
			$year[$i]=$row['year'];
			$i++;
		}
		echo json_encode(array("year" => $year));

	}

	else if(!isset($_POST['disc']) && isset($_POST['branch']) && isset($_POST['year']) && !isset($_POST['sem']) && !isset($_POST['subject'])){
		//$branch="Computer Engg.";
		//$year="2014";
		$branch=$_POST['branch'];
		$year=$_POST['year'];
		$stmt="SELECT semester FROM subject_kash WHERE branch='$branch' AND year='$year' GROUP BY semester";
		$result=mysqli_query($con,$stmt);
		$sem=array();
		$i=0;
		while($row=mysqli_fetch_array($result)){
			$sem[$i]=$row['semester'];
			$i++;
		}
		echo json_encode(array("sem" => $sem));
		
	}

	else if(!isset($_POST['disc']) && isset($_POST['branch']) && isset($_POST['year']) && isset($_POST['sem']) && !isset($_POST['subject'])){
		//$branch="Computer Engg.";
		//$year="2014";
		//$sem="7";
		$branch=$_POST['branch'];
		$year=$_POST['year'];
		$sem=$_POST['sem'];
		$stmt="SELECT subject FROM subject_kash WHERE branch='$branch' AND year='$year' AND semester='$sem' GROUP BY subject";
		$result=mysqli_query($con,$stmt);
		$subject=array();
		$i=0;
		while($row=mysqli_fetch_array($result)){
			$subject[$i]=$row['subject'];
			$i++;
		}
		echo json_encode(array("subject" => $subject));
		
	}

	else if(!isset($_POST['disc']) && isset($_POST['branch']) && isset($_POST['year']) && isset($_POST['sem']) && isset($_POST['subject'])){
		//$branch="Computer Engg.";
		//$year="2014";
		//$sem="7";
		$branch=$_POST['branch'];
		$year=$_POST['year'];
		$sem=$_POST['sem'];
		$subject=$_POST['subject'];
		$stmt="SELECT knowledge, attitude, skill, habit FROM subject_kash WHERE branch='$branch' AND year='$year' AND semester='$sem' AND subject='$subject' LIMIT 1";
		$result=mysqli_query($con,$stmt);
		//$subject=array();
		//$i=0;
		while($row=mysqli_fetch_array($result)){
			$knowledge=$row['knowledge'];
			$attitude=$row['attitude'];
			$skill=$row['skill'];
			$habit=$row['habit'];
		}
		echo json_encode(array("knowledge" => $knowledge , "attitude" => $attitude, "skill" => $skill, "habit" => $habit));
		
	}
mysqli_close($con);

?>