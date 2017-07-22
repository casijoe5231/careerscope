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
</div>

<?php
// Function to find Question
	function strip($startTag,$endTag,$text,$pos=0)
	{
		if(!is_integer($pos)){
		$pos = false;
		return false;
	}
	$pos1 = strpos($text,$startTag,$pos);
	if(!is_integer($pos1)){
		$pos = false;
		return false;
	}
	$pos1 += strlen($startTag);
	$pos2 = strpos($text,$endTag,$pos1);
	if(!is_integer($pos2)){
		$pos = false;return false;
	}
	$res = substr($text,$pos1,$pos2-$pos1);
	$pos = $pos2 + strlen($endTag);
	return $res;
	}

	
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
      
	  $c=0;
	  $file=fopen($path, "r") or exit("Unable to open file!"); // Open File
	  //Get a line of the file until the end is reached
  	  while(!feof($file))
	  {
  
		$text = fgets($file). "<br>";
		$string=$text;
		$found=strip("<b>","{",$string); 					   // Check Question. Question will be inside the <b> tag and { sign
     
		if($c>0 && $c<=4) 									   // Check Options
		{
   
			if($string[1]=="~")                                // For Moodle ~ indicates incorrect choice
			{
				$string = preg_replace ("/~/","",$string, 1); 
				echo "Option ".$c.". ".$string;

			}
			else if($string[1]=="=")                           // For Moodle = indicates correct choice
			{
				$string = preg_replace ("/=/","",$string, 1);
				echo "<i style =\"color:green; \">Option ".$c.". ".$string."</i>";
				$ans=$c;
			}
			
			if($c==1){ $option1=$string; }
			if($c==2){ $option2=$string; }
			if($c==3){ $option3=$string; }
			if($c==4){ $option4=$string; }
			$c++;
		}
		if($c>4)
		{
		    $t_id=$_POST['t_id'];
			// Get current value of question id
			$sql="SELECT MAX(q_id) FROM `questions` WHERE t_id='$t_id' ";
			$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
			while($row = mysqli_fetch_array($res))
			{
				$q_id=$row['MAX(q_id)'];      
			}
			$q_id++;

			// Add question
			$sql="INSERT INTO `questions`(`t_id`, `q_id`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `ans`) VALUES ('$t_id', '$q_id', '$question', '$option1', '$option2','$option3','$option4', '$ans')";
			$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
			if($res)
			{
				echo "<br><p style=\"color:#009933;\"><b>Test question added successfully.</b></p>";
			}
			$c=0;
		}
  
		if($found!="") 										  // Check Question
		{
		$c=1;
		$found=nl2br($found);
		$found=preg_replace('/\n/', '', $found, -1);
		$found = str_replace("\n","<br>",$found);        	 // Remove \n and replace with <br>
		$question=strip_tags($found);
		echo "<br><b>Question: </b>".$question."<br>";
		}
  
  
	  }  
	  fclose($file); // Close File Read
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