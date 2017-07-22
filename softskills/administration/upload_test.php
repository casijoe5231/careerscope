 <?php
    session_start();
	if(!isset($_SESSION['administration']))
	{
		header('location:index.php');
		exit();
	}
	include '../styles/theme-master.php';
	?>
<!DOCTYPE html>
<html>
<head>
<title>Aptitude</title>
<link rel="icon" href="../images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="../styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="../styles/theme-master.css">
<style>
.upload_box
{
 width:60%;
 margin-left:auto;
 margin-right:auto;
  background-color:#CCFF99;
 border-style:solid;
 border-radius:15px;
 -webkit-border-radius: 15px;
 -moz-border-radius: 15px;
 border-color:black;
 padding: 5px 5px 5px 8px;
 }
</style>
</head>

<body>
<div class="bg">
<div class="container">
<?php
header_admin_fn();
?>
<div class="content clearfix">
<h3>Test Management</h3>
<div class="nav">
<a href="home.php">Home</a>
 > 
<a href="upload_test.php">Upload test</a>
</div>
<br><br>

<div class="panel">
<br>
<div class="upload_box">

<form action="upload_test.php" method="post" enctype="multipart/form-data">
<img src="../images/upload.png" width="80px" align="right">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<label for="file">Test id:</label>
<?php
    include '../connection.php';
	
	$username=$_SESSION['administration'][0];
	//Customize query to user acess level
	if($_SESSION['administration'][2]=="super")
	{
		$sql="SELECT id, t_name FROM test";
	}
	else if($_SESSION['administration'][2]=="manager")
	{
		$sql="SELECT id , t_name FROM test WHERE assign='$username'";
	}
	
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	 
	
	if(mysqli_num_rows($res)>0)
	{
		echo "<select name='t_id'>"; 
		while($row = mysqli_fetch_array($res))
		{
			echo "<option value='".$row['id']."'>".$row['t_name']."  id:".$row['id']."</option>";      
		}
		echo "</select>";
	}
?><br>
<input type="submit" name="submit" value="Submit">
</form>
</div>

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
    echo "Upload File: " . $_FILES["file"]["name"] . "<br>";
    echo "File Type: " . $_FILES["file"]["type"] . "<br>";
    echo "File Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";

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
        echo "Question : ".$question->questiontext->text." <br />";
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
				echo "<b style=\"color:green;\">Correct</b>".$correct."<br />";
				$ans=$count;
			}
			else
			{
				echo "<b style=\"color:red;\">Incorrect </b>".$correct."<br />";
			}
		}
		if($count==4)
		{
			echo "<b style=\"color:green;\">Compatible - </b>".$count." options<br />";
			
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
			echo "<b style=\"color:red;\">Incompatible question - </b>".$count." options<br />";
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






<br><br><br><br>
<br><br>
</div>
<br>
<a href="logout.php" style="border:1px solid #09F; background:#09F; padding:8px; color:#FFF;  border-radius:5px; font-size:16px; margin-right:50%;">Logout</a>
<br><br><br>
</div>

<?php
footer_admin_fn();
?>
</div>
</div>
</body>
</html>