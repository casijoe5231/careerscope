<?php 
include("database.php");
			
if(isset($_SESSION['login']))
{
?>

<html>
<head>
<title>Display e-PORTFOLIO</title>

<link href="Image/icon1.ico" rel="shortcut icon"/>
<link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css" />
<script type="text/javascript">
	function display_name()
	{
		var stream = document.pre_eportfolio.stream.value;
		var join_yr = document.pre_eportfolio.join_yr.value;
					if (stream=="0")
					  {
					  document.getElementById('name_space').innerHTML="";
					  return;
					  } 
					if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					  }
					else
					  {// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					xmlhttp.onreadystatechange=function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						document.getElementById('name_space').innerHTML=xmlhttp.responseText;
						}
					  }
					xmlhttp.open("GET","display_name.php?stream="+stream+"&join_yr="+join_yr,true);
					xmlhttp.send();
	}
					
</script>
</head>

<body>
<table border="1" align="center">  
<tr><td>
  <table border="0" height="100%"> 
	<tr>  <td colspan="2"><?php include("header.php"); ?></td>  </tr>
    <tr>  <td colspan="2" valign="top"><?php include("admenu.php"); ?></td></tr>
	<tr>
    	<td  width="200" valign="top"><?php include("amenu.php"); ?></td>

        <td><form action="display_eportfolio1.php" name='pre_eportfolio' method="post">
        <fieldset style="width:600"> <legend><b>Display e-PORTFOLIO</b></legend>
        	<table border="0" cellspacing="4" cellpadding="4" align="center">
<tr>
<th colspan="3">
Student Details
</th>
</tr>
<tr>
<th>Join. Year
</th>
<td colspan="2">
<select name="join_yr" size="0">
<script>
var d=new Date();
var yr=2000;
var c=1;
for(i=1;i<=50;i++)
{
ac=parseInt(yr,10)+parseInt(i,10);
if(d.getFullYear()==ac)
{
document.write("<option value='"+ac+"' selected>"+ac+"</option>");
}
else
{
document.write("<option value='"+ac+"'>"+ac+"</option>");

}
}

function get_resume()
{
	
	var stud_id = document.getElementById("username").value;
	alert(stud_id);
	url = "http://localhost/eportfolio/"+stud_id+".pdf";
	alert(url);
	window.open(url);

}
</script>
</select>
</td>
</tr>
<tr>
<th>Stream </th>
<td colspan="2">
<select name='stream' onclick="display_name();">
<option value="0"> [select stream]</option>
	<?php
	$branch=mysqli_query($GLOBALS["___mysqli_ston"], "select stream_name from stream "); 
	while($line=mysqli_fetch_array($branch))
	{
		echo "<option value='".str_replace(' ','_',$line[0])."'>".$line[0]."</option>";
	}
	?>
</select>
</td>
</tr>
<tr>
<th>Name</th>
<td colspan="2"><div id="name_space"> Name will appear here	</div></td>
</tr>

               
<tr><td colspan="2" align="center"><input name="submit" type="submit" value="Submit"></td>
<td colspan="2" align="center"><input type="button" value="View Resume" onclick="get_resume()"></input></td></tr>

</table>
</fieldset>
</form></td>
</tr>
<tr>  <td colspan="2"><?php include("footer.php"); ?></td></tr>
</table> 
</td></tr>
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