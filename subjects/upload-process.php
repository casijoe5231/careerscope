<?php
$target_dir = "../temp/";
$target_file = $target_dir.date(YmdHis).".csv";
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

echo "target-folder: ".$target_dir;
echo "<br/>target-file: ".$target_file;
echo "<br/>target-file-type: ".$FileType;
echo "<br/>".$_FILES["KASHfile"]["tmp_name"];
// Check if file already exists
if (file_exists($target_file)) {
    echo "<br/>Sorry, file already exists.";
    $uploadOk = 0;
}
echo "1";
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<br/>Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($FileType != "csv") {
    echo "<br/>Sorry, only CSV file types are accepted";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<br/>Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["KASHfile"]["tmp_name"], $target_file)) {
    	if(chown($target_file,"root")){
        	echo "<br />File owner changed";
        }
        else{
        	echo "<br />Can't change file owner";
        }

        if(chmod($target_file,0755)){
        	echo "<br />Permission changed";
        }
        else{
        	echo "<br />Can't change permission";
        }
        echo "<br/>The file ". basename( $_FILES["KASHfile"]["name"]). " has been uploaded.";
    }
    else {
        echo "<br/>Sorry, there was an error uploading your file.";
        exit("<br />Exiting");
    }
}

//Opening the file and entering the data into the database
$csvfile=$target_file;
$databasetable="subject_kash (discipline,branch,year,semester,subject, knowledge, attitude, skill, habit)";
$fieldseparator = ",";
$lineseparator = "\n";

$save = 0;
$outputfile = "output.sql";
/********************************/

if (!file_exists($csvfile)) {
        echo "<br/>File not found. Make sure you specified the correct path.\n";
        exit;
}

$file = fopen($csvfile,"r");

if (!$file) {
        echo "<br/>Error opening data file.\n";
        exit;
}

$size = filesize($csvfile);

if (!$size) {
        echo "<br/>File is empty.\n";
        exit;
}

$csvcontent = fread($file,$size);

fclose($file);

include "../includes/connection2.php";

if (mysqli_connect_errno())
  {
  echo "<br />Failed to connect to mysql: " . mysqli_connect_error();
  }


$lines = 0;
$queries = "";
$linearray = array();

foreach(split($lineseparator,$csvcontent) as $line) {

        $lines++;

        $line = trim($line," \t");

        $line = str_replace("\r","",$line);

        /************************************
        This line escapes the special character. remove it if entries are already escaped in the csv file
        ************************************/
        $line = str_replace("'","\'",$line);
        /*************************************/

        if(strlen($line)==""){
        	$lines--;
        	continue;
        }

        $linearray = explode($fieldseparator,$line);

        $linemysql = implode("','",$linearray);

        $query = "INSERT INTO $databasetable VALUES('$linemysql');";

        $queries .= "<br />". $query ;

        if (mysqli_query($con, $query)) {
		    echo "<br />New record created successfully";
		} else {
		    echo "Error: <br />" . mysqli_error($con);
		}
}

echo $queries;

mysqli_close($con);

if ($save) {

        if (!is_writable($outputfile)) {
                echo "<br />File is not writable, check permissions.\n";
        }

        else {
                $file2 = fopen($outputfile,"w");

                if(!$file2) {
                        echo "<br />Error writing to the output file.\n";
                }
                else {
                        fwrite($file2,$queries);
                        fclose($file2);
                }
        }

}

echo "<br />Found a total of $lines records in this csv file.\n";

if(unlink($csvfile))
{
	echo "<br /> File deleted";
}
else {
	echo "File can't be deleted";
}

header("location:upload.php?done=1");
?>