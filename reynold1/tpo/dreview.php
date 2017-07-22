<?PHP
session_start();
include '../logic/theme-master.php';
if(isset($_SESSION['user4']))
{
include "../connection1.php";
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct cname from review order by cname;");

?>


<html>
<head>
<title>Placements</title>
<link rel="stylesheet" type="text/css" href="../css/stephen.css">
<link type="text/css" rel="stylesheet" href="../css/stylepj.css" />
<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.pajinate.js"></script>
<style>
.content
{
 min-height:700px;
 height:auto !important;
 height:700px;
}
</style>
</head>
<body>
<div class='bg'>
<div class='container'>
<?php
header_fn1();
?>
<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; Placements menu</h3>
</div>
<div style="float:right;">
<img src="../images/home.png" height="30px" width="30px"><a href="../tpoindex.php" style="text-decoration:none;margin-right:10px;color:black;"><strong>HOME</strong></a>
</div>
<br>
<br>
<br>
<br>

<div id='menu'>
<ul>
  <li><h2>Job Related Functions</h2>
    <ul>
      <li><a href='tpo.php'>Post a Job</a></li>
	  <li><a href='post.php'>Edit a Job POST</a></li>
    </ul>
  </li>
  <li><h2>Student Related Functions</h2>
    <ul>
      <li><a href='dreview.php'>Delete/approve reviews</a></li>
	  <li><a href='details.php'>View Student Details</a></li>
	  <li><a href='set.php'>Confirm Students</a></li>
	  <li><a href='appeared.php'>Set Student Status</a></li>
	  <li><a href='joboffer.php'>Confirm Student proposals</a></li>
    </ul>
  </li>
  <li><h2>Recruiter Related Functions</h2>
    <ul>
      <li><a href='status.php'>View Company Posts</a></li>
	  <li><a href='verify.php'>Verify Company Details</a></li>
	  <li><a href='stats.php'>View companies statistics</a></li>
    </ul>
  </li>

</ul>
</div>
<div class='register1' >
<center>
<p>COMPANY LIST:
<select name="symptom" onchange="window.location='dreview.php?q='+this.value">
<?php
if(!isset($_GET["q"]))
{
echo "<option value=''>SELECT COMPANY NAME</option>";
while($row=mysqli_fetch_array($list))
{
echo "<option value='".addslashes($row['cname'])."'>".addslashes($row['cname'])."</option>";
}

}
else
{
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct cname from review where cname<>'".$_GET["q"]."'order by cname;");
echo "<option value='".$_GET["q"]."'>".$_GET["q"]."</option>";
while($row=mysqli_fetch_array($list))
{
echo "<option value='".addslashes($row['cname'])."'>".addslashes($row['cname'])."</option>";
}
}
?>
</select>
</p>
</center>

<?php
include '../connection1.php';
if(isset($_GET["q"]))
{
$q=$_GET["q"];

$sql="select * from review where cname='$q' and status=0";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
if($count!=0)
{
echo "<div id='paging_container1' class='container1'><div class='page_navigation'></div><ul class='content1'>";
while(($row=mysqli_fetch_array($res))&&($count!=0))
{
echo "
<li><hr><fieldset style='border:1px solid black;'><legend style='text-transform:uppercase;background-color:#3399FF;margin-left:5px;border:1px solid black;'>USERNAME:&#09;".$row['username']."</legend>

<b>Company Name:</b>&#09;".$row['cname']."<br/>

<b>Question Asked:</b>&#09;".$row['question']."<br/>

<b>Group Discussion Topic:</b>&#09;".$row['gd']."<br/>

<b>Any other Details:</b>&#09;".$row['other']."<br/>
<p style='text-align:center;'>
<form name='trial' method='POST'>
<input type='hidden' name='uname' value='".$row['username']."'>
<input type='hidden' name='cname' value='".$row['cname']."'>
<input type='submit' name='submit' value='Delete Review'>
<input type='submit' name='submit1' value='Approve Review'>
</form>
</p>
<br/>
</fieldset>
</li>";
$count--;
}
echo "</ul></div>";
}
else
{
echo "<h3 style='color:red'><b><center>No more pending reviews</center></b></h3>";
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
/*$(document).ready(function(){
$('li:odd, .content1 > *:odd').css('background-color','#00D9BF');
});	*/
$(document).ready(function(){
$('.content1 li:first-child').css('margin-top','25px');
});		
			
</script>
<?php
if(isset($_POST['submit']))
{
include '../connection1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="DELETE from review where username='$_POST[uname]' and cname='$_POST[cname]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Review deleted!!', function (e) {
    window.location.href='./dreview.php?q=$_POST[cname]';
});
	
    </SCRIPT>";

}
if(isset($_POST['submit1']))
{
include '../connection1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="update review set status=1 where username='$_POST[uname]' and cname='$_POST[cname]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Review Approved!!', function (e) {
    window.location.href='./dreview.php?q=$_POST[cname]';
});
	
    </SCRIPT>";

}
?>

</div>


</div>
<?php
footer_fn();
?>
</div>
</div>
</body>
</html>
<?php
}
?>