 <?php
    session_start();
	include 'styles/theme-master.php';
	include '../connection.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Courses</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">

</head>
<body>
<div class="bg">
<div class="container">
<?php
header_fn();
?>
<div class="content clearfix">

<br>
<form action="upload_test.php" method="post" enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<label for="file">Test id:</label>
<?php
    include '../connection.php';
	
	$username=$_SESSION['administration'][0];
	//Customize query to user acess level
	if($_SESSION['administration'][2]=="super")
	{
		$sql="SELECT id FROM test";
	}
	else if($_SESSION['administration'][2]=="manager")
	{
		$sql="SELECT id FROM test WHERE assign='$username'";
	}
	
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	 
	
	if(mysqli_num_rows($res)>0)
	{
		echo "<select name='t_id'>"; 
		while($row = mysqli_fetch_array($res))
		{
			echo "<option value='".$row['id']."'>".$row['id']."</option>";      
		}
		echo "</select>";
	}
?><br>
<input type="submit" name="submit" value="Submit">
</form>
<br>
<?php

	
// Main Input 
if(isset($_POST['submit']))
{
$allowedExts = array("txt", "xml");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
echo var_dump(@$_FILES['file']['type']);
if ((($_FILES["file"]["type"] == "text/plain")
|| ($_FILES["file"]["type"] == "text/xml"))
&& ($_FILES["file"]["size"] < 2097152)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br><br>";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];	    
	  $path="upload/" . $_FILES["file"]["name"]; 
      
	    // Loading the XML file
        $xml = simplexml_load_file($path);
		$t_id=$_POST['t_id'];
        echo "<h2>".$xml->getName()."</h2><br />";
        foreach($xml->children() as $question)
        {
        echo "ID : ".$question->attributes()->type."<br />";
        echo "Name : ".$question->questiontext->text." <br />";
		$question_current=$question->questiontext->text;
		$count=0;
		foreach ($question->answer as $answer) 
		{
			$count++;
			echo "Answer : ".$answer->text." ";
			${'option' . $count}=$answer->text;
			$correct=$answer->attributes()->fraction;
			if($correct==100)
			{
				echo "Correct :<b style=\"color:green;\">Yes  </b>".$correct."<br />";
				$ans=$count;
			}
			else
			{
				echo "Correct :<b style=\"color:red;\">No </b>".$correct."<br />";
			}
		}
		if($count==4)
		{
			echo "<b style=\"color:green;\">Compatible  </b>".$count." options<br />";
			
			// Get current value of question id
			$sql="SELECT MAX(q_id) FROM `questions` WHERE t_id='$t_id' ";
			$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
			while($row = mysqli_fetch_array($res))
			{
				$q_id=$row['MAX(q_id)'];      
			}
			$q_id++;

			// Add question
			$sql="INSERT INTO `questions`(`t_id`, `q_id`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `ans`) VALUES ('$t_id', '$q_id', '$question_current', '$option1', '$option2','$option3','$option4', '$ans')";
			$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
			if($res)
			{
				echo "<br><p style=\"color:#009933;\"><b>Test question added successfully.</b></p>";
			}
		}
		else
		{
			echo "<b style=\"color:red;\">Incompatible </b>".$count." option<br />";
        }
        echo "<hr/>";
        }
  	   
	  unlink($path); // Delete File
	  }
	
	    
    }
  }
else
  {
  echo "Invalid file";
  }
}	
?>
<br><br><br>
</div>

<?php
footer_fn();
?>
</div>
</div>

</body>
</html>