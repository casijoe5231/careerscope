<html>
<body>

<form  method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
<?php
if(isset($_POST['submit']))
{
session_start();
include '../connect1.php';
$allowedExts = array("pdf","doc","docx");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "<script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' />";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('INVALID FILE!!', function (e) {});
	</SCRIPT>";
    }
  else
    {
    

    if (file_exists("../uploads/$_SESSION[username]"))
      {
     echo "<script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' />";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('You already submitted your Resume!!', function (e) {});
	</SCRIPT>";
      }
    else
      {
	  mkdir("../uploads/$_SESSION[username]");
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../uploads/$_SESSION[username]/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/$_SESSION[username]/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }
}
?>