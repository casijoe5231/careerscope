<html>
<head>
<title>Placements</title>
<link rel="stylesheet" type="text/css" href="../css/stephen.css">
<link type="text/css" rel="stylesheet" href="../css/stylepj.css" />
<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery.pajinate.js"></script>

</head>
<body>
<div class='bg'>
<div class='container'>
<div class='header'>
<img src='../images/logo.png' height='80px' align='left'>
<h1>TRAINING & PLACEMENT PORTAL</h1>
</div>
<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; TPO menu</h3>
</div>
<br>
<br>
<br>
<div class='register1' >

<h1>STUDENT DETAILS</h1>
<?php
session_start();
include '../connect1.php';
if($_SESSION['role']=="tpo")
{


$sql="SELECT *
FROM users
INNER JOIN sinfo
ON users.username=sinfo.username;";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
if($count!=0)
{
echo "<div id='paging_container1' class='container1'><div class='page_navigation'></div><ul class='content1'>";
/*echo "<li>

<b>Aggregate:</b>&#09;".$row['aggregate']."<br/>

<b>Gender:</b>&#09;".$row['gender']."<br/>

<b>Banch:</b>&#09;".$row['branch']."<br/>

<b>Semester:</b>&#09;".$row['sem']."<br/>

<b>Backlogs:</b>&#09;".$row['kt']."<br/>

<b>Status:</b>&#09;".$row['placed']."<br/>

<b>Recruiter name:</b>&#09;".$row['name']."<br/>

<b>Email:</b>&#09;".$row['email']."<br/>

<b>Phone:</b>&#09;".$row['phone']."<br/>

</li>";*/

while(($row=mysqli_fetch_array($res))&&($count!=0))
{
echo "<li>

<b>Student name:</b>&#09;".$row['name']."<br/>

<b>Email:</b>&#09;".$row['email']."<br/>

<b>Phone:</b>&#09;".$row['phone']."<br/>

<b>Gender:</b>&#09;".$row['gender']."<br/>

<b>Banch:</b>&#09;".$row['branch']."<br/>

<b>Semester:</b>&#09;".$row['sem']."<br/>

<b>Aggregate:</b>&#09;".$row['aggregate']."<br/>

<b>Backlogs:</b>&#09;".$row['kt']."<br/>

<b>Status:</b>&#09;".$row['placed']."<br/>


<br/>

</li>";
$count--;
}
echo "</ul></div>";
}
else
{
echo "<p style='font-size:1.5em'>ALL RECRUITERS HAVE BEEN VERIFIED!!</p>";
}
}
?>
<script type="text/javascript">
			$(document).ready(function(){
				$('#paging_container1').pajinate(
				{
				num_page_links_to_display : 3,
				items_per_page : 6,
                //abort_on_small_lists: true,
				wrap_around: true,
                show_first_last: false
				}
				);
			});
$(document).ready(function(){
$('li:odd, .content1 > *:odd').css('background-color','#00D9BF');
});		
			
</script>
<?php
if(isset($_POST['submit']))
{
include '../connect1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="update users set status=1 where username='$_POST[username]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die("query not executed");
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Recruiter Approved!!', function (e) {
    window.location.href='./verify.php';
});
	
    </SCRIPT>";

}
if(isset($_POST['submit1']))
{
include '../connect1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo $_POST['username'];
$sql="update users set status=2 where username='$_POST[username]'";
echo $sql;
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Recruiter Debarred!!', function (e) {
    window.location.href='./verify.php';
});</SCRIPT>";

}
?>
<center><p><a href='tpo.php'>RETURN TO PREVIOUS PAGE</a></p></center>
</div>


</div>
<div class='footer'>
Privacy Policy | Terms of use | FAQ's
</div>
</div>
</div>
</body>
</html>