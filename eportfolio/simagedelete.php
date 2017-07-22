<?php 
include("database.php");
/*
	$q1 = $sq1= mysql_query("SELECT pInstitutionId FROM registration WHERE pUserName='{$_SESSION['username']}'",$db) or die(mysql_error());
	
while($row = mysql_fetch_array($q1)){  
    $pInstitutionId = $row["pInstitutionId"];
}
*/
if(isset($_SESSION['login']))
{
?>

<html>
<head>
<title>Files</title>
<link href="Image/icon1.ico" rel="shortcut icon"/>
<?php include("theme_set.php"); ?>

<script type="text/javascript">
function select1changed()
{
	var e = document.getElementById("img");
	var strUser = e.options[e.selectedIndex].value;
    document.getElementById("img1").value= strUser;
	document.imgSrc.src = strUser;
}

function delete1()
{
	var asd=document.getElementById("img1").value;
	window.location="delete.php?strUser="+asd;
}

function apply()
{
	var apply=document.getElementById("img1").value;
	window.location="student_profilepic.php?strUser="+apply;
}

function download()
{
	
	var asd=document.getElementById("img1").value;
	window.location="download.php?strUser="+asd;
}

</script>
</head>

<body>

<table border="0" align="center">
	<tr>  <td colspan="2"><?php include("header.php"); ?></td>  </tr>
    <tr>  <td colspan="2"><?php include("stopmenu.php"); ?></td></tr>
	<tr>
    	<td width="200"><?php include("smenu.php"); ?></td>

    
        <td><fieldset style="width:600">
				<legend><b>DELETE FILES</b></legend>
                <table align="center" cellpadding="4" cellspacing="4">
				<tr><th>Select Image:</th><td> <select name="img" id="img" onChange="select1changed()">
                <option>Select Image</option>
		  		<?php 
					//SPECIFY THE DIRECTORY
					$dir = "upload"."/".$_SESSION['username']; 

					// OPEN THE DIRECTORY
					$dirHandle = opendir($dir); 

					//LOOP OVER ALL OF THE  FILES

      				$files = glob($dir."/*.*");
	  				for($i=0; $i < count($files);$i++)
					{
						$num= $files[$i];
						echo '<option value='.$num.'>'.$num.'</option>';
						
					}
					
					// CLOSE THE DIRECTORY
					closedir($dirHandle); 
				?></select></td></tr>
				<tr><td colspan="2"><img width="500" height="300" id="imgSrc" name="imgSrc" /></td></tr>
                <?php if($pInstitutionId== "Guest"){?>
				<tr><td colspan="2" align="center"><input type="button" name="delete" value="Delete" onClick="delete1()"/>
				<input type="button" name="apply" value="Apply as Profile Pic" onClick="apply()"/>
				<input type="button" name="download" value="Download" onClick="download()" disabled/>
				<input type="hidden" name="text" id="img1"/></td></tr>
				<?php } else{?>
                <tr><td colspan="2" align="center"><input type="button" name="delete" value="Delete" onClick="delete1()"/>
				<input type="button" name="apply" value="Apply as Profile Pic" onClick="apply()"/>
				<input type="button" name="download" value="Download" onClick="download()"/>
				<input type="hidden" name="text" id="img1"/></td></tr>
                <?php }?>
                </table>
           </fieldset></td>
	</tr>
    <tr>  <td colspan="2"><?php include("footer.php"); ?></td></tr>
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