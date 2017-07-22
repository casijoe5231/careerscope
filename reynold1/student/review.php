<?php
session_start();
include '../logic/theme-master.php';
if(isset($_SESSION['user']))
{
include '../connection1.php';
$user=$_SESSION['user'][1];
$sql="select * from clist where username='$user' and appeared=1";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count1=mysqli_num_rows($res);
$sql="select * from review where username='$user'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct cname,title from clist where username='$user' order by cname;");
if($count==$count1)
{
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('You have no more companies to review!!', function (e) {
    window.location.href='./view.php';
});
	
    </SCRIPT>";
/*header('location:/reynold/view.php');*/
}
if($count<$count1)
{
echo "<html>
<head>
<title>Placements</title>
<link rel='stylesheet' type='text/css' href='../css/stephen.css'>
<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<script type='text/javascript' charset='utf-8' src='../js/jquery.js'></script>
<script src='../js/jquery.autosize.js'></script>
		<script>
			$(function(){
				
				$('.animated').autosize();
			});
		</script>
<style>

.animated {
-webkit-transition: height 0.2s;
-moz-transition: height 0.2s;
transition: height 0.2s;
}

</style>
</head>
<body>
<div class='bg'>
<div class='container'>";
header_fn1();
echo "<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; Student Menu</h3>
</div>
<div style='float:right;'>
<img src='../images/home.png' height='30px' width='30px'><a href='../tpoindex.php' style='text-decoration:none;margin-right:10px;color:black;'><strong>HOME</strong></a>
</div>
<br>
<br>
<br>
<br>
<div id='menu'>
<ul>

  <li><h2>Student Related Functions</h2>
    <ul>
      <li><a href='view.php'>View Company List</a></li>
	  <li><a href='appeared.php'>Submit job request</a></li>
	  <li><a href='interview.php'>Interview Preparation</a></li>
	  <li><a href='review.php'>Give Company Feedback</a></li>
	  <li><a href='dreview.php'>Company Reviews</a></li>
	  <li><a href='sinfo.php'>CREATE YOUR PROFILE</a></li>
	</ul>
  </li>
</ul>
</div>
<div class='register1' >
<form name='mdata' method='post'>
<table align='center'>
<tr class='nh'><th colspan='2'>REVIEW FORM</th></tr>

<tr>
<td colspan='2'>Company Name:
";



if(!isset($_GET["q"]))
{
echo "<select name='cname' id='cname' onchange=window.location='review.php?q='+this.value>";
echo "<option value=''>SELECT COMPANY NAME</option>";
while($row=mysqli_fetch_array($list))
{
echo "<option value='".addslashes($row['cname'])."'>".addslashes($row['cname'])."</option>";
}
echo "</select>&nbsp;&nbsp;";
}



if(isset($_GET["q"]))
{
echo "<select name='cname' id='cname' onchange=window.location='review.php?q='+this.value>";
echo "<option value='".$_GET["q"]."'>".$_GET["q"]."</option>";
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct cname from clist where cname<>'".$_GET["q"]."' and username='$user' order by cname;");
while($row=mysqli_fetch_array($list))
{
echo "<option value='".addslashes($row['cname'])."'>".addslashes($row['cname'])."</option>";
}
echo "</select>&nbsp;&nbsp;";
$q1=urlencode($_GET["q"]);
$sql1="select distinct title from clist where cname='".$_GET["q"]."' and username='$user'";
$list1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
echo "<select name='name' onchange=window.location='review.php?q=$q1&p='+this.value>";

if(!isset($_GET["p"]))
{
echo "<option value=''>SELECT JOB TITLE</option>";
while($row=mysqli_fetch_array($list1))
{
echo "<option value='".addslashes($row['title'])."'>".addslashes($row['title'])."</option>";
}
}
else
{
echo "<option value='".$_GET["p"]."'>".$_GET["p"]."</option>";
$list1=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct title from clist where title!='".$_GET["p"]."' and cname='".$_GET["q"]."' and username='$user'");
while($row=mysqli_fetch_array($list1))
{
echo "<option value='".addslashes($row['title'])."'>".addslashes($row['title'])."</option>";
}

}
echo "</select>";
}
echo "</td>
</tr>";
if((isset($_GET["q"]))&&(isset($_GET["p"])))
{
$q=$_GET["q"];
$p=$_GET["p"];
echo "

<tr class='even'>
<td colspan='2'>Interview Question:</br><textarea name='question' rows='2' cols='40' class='animated'></textarea></td>

</tr>

<tr>
<td colspan='2'>Group Discussion Topic:</br><textarea name='gd' rows='2' cols='40' class='animated'></textarea></td>

</tr>

<tr class='even'>
<td colspan='2'>Other Points:</br><textarea name='other' rows='2' cols='40' class='animated'></textarea></td>

</tr>

<td colspan='2'><input type='submit' name='submit' id='submit' value='Submit'/></td>
</tr>

<input type='hidden' name='cname' value='".$q."'>
<input type='hidden' name='title' value='".$p."'>
</form>";

}
echo "</table>
</div>
</div>";
footer_fn();
echo "</div>
</div>
</body></html>";
}
}
else
{
echo "You do not have permission to access this page.Redirecting to Home.<meta http-equiv='refresh' content='2;url=../index.php'>";
}

?>


<?php
if(isset($_POST['submit']))
{

include "../connection1.php";

$sql="select * from review where username='$user' and cname='$_POST[cname]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("not complete");
$count=mysqli_num_rows($res);
if($count==0)
{
mysqli_query($GLOBALS["___mysqli_ston"], "insert into review (username,cname,title,question,gd,other,status) values ('$user','$_POST[cname]','$_POST[title]','$_POST[question]','$_POST[gd]','$_POST[other]',0)") or die("query2 failed");
mysqli_query($GLOBALS["___mysqli_ston"], "update clist set given=1 where username='$user' and title='$_POST[title]' and cname='$_POST[cname]'");
header('location:view.php');
}
else
{
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('You have already given a review for that company!!', function (e) {
    window.location.href='view.php';
});
	
    </SCRIPT>";
}

}

?>


