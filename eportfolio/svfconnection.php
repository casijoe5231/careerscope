<html>
<body>
<div class="imageview"> 
<?php 
include("database.php");
/*
$result = mysql_query("SELECT Stud_ID FROM student_details WHERE Stud_ID='{$_SESSION['username']}'",$db) or die(mysql_error());
		
			
			$result1= mysql_fetch_assoc($result);
			$pRoleId =	$result1['pRoleId'];
*/
			$username =	$_SESSION['username'];
			
//if($pRoleId =="Student"){


//SPECIFY THE DIRECTORY
echo $dir;
$dir = "upload"."/".$username; 

// OPEN THE DIRECTORY
$dirHandle = opendir($dir); 

//LOOP OVER ALL OF THE  FILES

      $files = glob($dir."/*.*");
	  	for($i=0; $i < count($files);$i++)
		{
			$num= $files[$i];
			echo '<a href="'.$num.'" target="_blank"> <img src="'.$num.'" alt="image" width="200" height="200" border="1" bordercolor="green" ></a>'."&nbsp;&nbsp;";
		}

// CLOSE THE DIRECTORY
closedir($dirHandle);
/* 
}
else{

//SPECIFY THE DIRECTORY
$dir = "upload"."/".$_SESSION['username']; 

// OPEN THE DIRECTORY
$dirHandle = opendir($dir); 

//LOOP OVER ALL OF THE  FILES

      $files = glob($dir."/*.*");
	  	for($i=0; $i < count($files);$i++)
		{
			$num= $files[$i];
			echo '<a href="'.$num.'" target="_blank"> <img src="'.$num.'" alt="image" width="200" height="200" border="1" bordercolor="green" ></a>'."&nbsp;&nbsp;";
		}

// CLOSE THE DIRECTORY
closedir($dirHandle); 
}*/
?>


</div>
</body>
</html>