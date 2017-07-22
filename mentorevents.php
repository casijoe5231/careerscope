<?php
    session_start();
    if(!isset($_SESSION['user']))
	{
		header("location:login.php?error=1");
	}

	if(!($_SESSION['usertype']==6 || $_SESSION['usertype']==8 || $_SESSION['usertype']==11 || $_SESSION['usertype']==13 ||
	 $_SESSION['usertype']==14 || $_SESSION['usertype']==16 || $_SESSION['usertype']==18 || $_SESSION['usertype']==19)){
		header("location:login.php?error=1");
	}
	
	$email=$_SESSION['user'][0];
	$name=$_SESSION['user'][1];
	//$category=$_POST['category'];
	include 'connection1.php';
?>
<html>
<head>
<title>CareerScope</title>

  <script src="jquery.js"></script>
  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css">
		<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">




<link rel="stylesheet" type="text/css" href="css/stephen1.css">  

</head>
<body>

<div class='container'>
<div class="header"><img src="images/byb.jpg" width="160" height="80" alt="CareerScope logo" align="left"/>
  <img src="images/dbit.png"  width="6%" alt="DBIT"  align="right"/>
  </div>
<div class="header-shadow"></div>
<div class='content'>
<br>

<table border="0" style="align:center;">
	<tbody><tr><td>
    <table id="navigation" style="align:center;width:1290px;">
    
        <tbody><tr>
          <td><div align="center"><a href="mentoring.php">Main Menu</a></div></td>
          <td><div align="center"><a href="mentorevents.php">Events</a></div></td>
        </tr>
    </tbody></table>
    </td></tr>
</tbody></table>

<br />

<br />
<div class='title' style="clear:both;">
<h3>&nbsp; Academic Brand menu</h3>
</div>
<br>
<br>
<br>
<div style="float:left;clear:both;margin-top:30px;">
<ul id="sidenavigation" class="MenuBarVertical">
	<!--li><a href="reports.php">Test reports</a></li-->
	<li><a href="mentorevents.php">Event Calender</a></li>
	<li><a href="mentor/add_record.php">New Activity</a></li>

	<li><a href="hodindex.php">Back to home</a></li>
	</ul>

</div>
<!-- Content here -->
<br />
<br />
<div style="margin-left:auto;margin-right:auto;">
<table style="margin-left:200px;width:1000px;" border=1>
<tbody>
<tr>
	<th>Activity Name</th>
	<th>Description</th>
	<th>Participants</th>
	<th>Date</th>
	<th>Files</th>
</tr>
<?php

$stmt="SELECT * FROM mentoractivity WHERE state=1";
$result=mysqli_query($GLOBALS["___mysqli_ston"], $stmt) or die("query not executed");
while($row=mysqli_fetch_array($result , MYSQLI_BOTH))
{
	echo '<tr><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[6].'</td><td><a href="mentor/'.$row[5].'" target="_blank">File</a></td></tr>';
}

?>
</tbody>
</table>

<br />
</div>
<!-- Content ends here -->
</div><br>
<div class="footer">
  <div class="footer-link">
  <br>Home | Privacy Policy | Terms of use | About
  <br /> www.dbit.in
  </div>
</div>
</div>

</body>
</html>
<?php
if(isset($_POST['update']))
{

	$email=$_SESSION['user'][0];
	$name=$_SESSION['user'][1];
	$category=$_POST['category'];
	include 'connection1.php';
	?>
	<html>
<head>
<title>CareerScope</title>

  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
		<link href="Image/icon1.ico" rel="shortcut icon"/>
<script language="Javascript">
function validateForm(){
if(document.getElementById('category').value=='')
{
alert("Please select an Item.");
return false;
}
return true;
}
</script>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
<!--<script type="text/javascript">
var category="<?php/* echo $category; */?>";


if(category == "Seminar")
{

function validator(tag)
{
	if(tag.value=="Select")
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validateAll()
{
	try
	{
	var p1=validator(document.getElementById('aname'));
	return p1;
	}
	catch(e){alert(e);}
}

}
</script>-->

</div>
<!-- Content ends here -->
</div><br>
<div class="footer">
  <div class="footer-link">
  <br>Home | Privacy Policy | Terms of use | About
  <br /> www.dbit.in
  </div>
</div>
</div>

</body>
</html><?php
}
?>