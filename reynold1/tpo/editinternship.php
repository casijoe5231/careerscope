
<html>
<head>
<title>Placements</title>
<link rel="stylesheet" type="text/css" href="../css/stephen1.css">
<!-- Autosize Scripts -->
<link rel="stylesheet" type="text/css" href="../css/style2.css">
<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<style>

			.animated {
				-webkit-transition: height 0.2s;
				-moz-transition: height 0.2s;
				transition: height 0.2s;
			}

		</style>
<script src="../js/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="../css/uploadify.css">
<script src='../js/jquery.autosize.js'></script>
		<script>
			$(function(){
				
				$('.animated').autosize({});
			});
		</script>
		
<!-- Auto size scripts end here -->
<style>

#container_internal
{
margin-right:25%;
margin-left:auto;
}
#container_internal textarea
{
width:auto;
height:10px;
}

</style>	
</head>
<body>
<?php
session_start();
include '../logic/theme-master.php';
if(isset($_SESSION['username']))
{
include '../connect1.php';
$sql="select * from users where username='".$_SESSION['username']."' and role='tpo'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct cname from internship order by cname;");
if($count==1)
{

echo "
<div class='bg'>
<div class='container'>";
header_fn1();
echo "<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; TPO Menu</h3>
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
	  <li><a href='internship.php'>Post an Internship</a></li>
	  <li><a href='post.php'>Edit a Job POST</a></li>
	  <li><a href='editinternship.php'>Edit an Internship Post</a></li>
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
  <li><h2><a href='logout.php' style='background-color: #0066FF; border:0px; color: #fff;'>Logout</a></h2></li>
</ul>
</div>
<div id='container_internal'>


<center>";
echo "<p>Company Name:";
echo "<select name='name' onchange=window.location='editinternship.php?q='+this.value>";


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
echo "<option value='".$_GET["q"]."'>".$_GET["q"]."</option>";
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct cname from internship where cname<>'".trim($_GET["q"],"%20")."' order by cname;");

while($row=mysqli_fetch_array($list))
{
echo "<option value='".addslashes($row['cname'])."'>".addslashes($row['cname'])."</option>";
}

}

echo "</select>&nbsp;&nbsp;";

function strip($a)
{

$b=explode(" ",$a);

$c=implode(" ",$b);
trim($c," ");

return $c;
}



if(isset($_GET["q"]))
{


$q1=strip($_GET["q"]);
$sql1="select distinct title from internship where cname='".$q1."'";

$list1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);



//$q1=trim($q1);
//$q1 = str_replace(' ', '', $q1);
if(!isset($_GET["p"]))
{
$q1=urlencode($q1);
echo "<select name='name' onchange=window.location='editinternship.php?q=$q1&p='+this.value>";


//echo "<select name='name' onchange=window.location='editinternship.php?q=$q1&p='+this.value>";

//if(!isset($_GET["p"]))
//{
$count=true;
while($row=mysqli_fetch_array($list1))
{
if($count)
{echo "<option value=\"SELECT JOB TITLE\">SELECT JOB TITLE</option>";
$count=false;
}
echo "<option value='".addslashes($row['title'])."'>".addslashes($row['title'])."</option>";
}
/*//}
//else
//{
//echo "<option value=''>SELECT JOB TITLE</option>";
//echo "<option value='".$_GET["p"]."'>".$_GET["p"]."</option>";
//$list1=mysql_query("select distinct title from internship where title!='".$_GET["p"]."' and cname='".$q1."'");
//while($row=mysql_fetch_array($list1))
//{

//echo "<option value='".addslashes($row['title'])."'>".addslashes($row['title'])."</option>";
//}

//}*/

echo "</select></p>";
}

if(isset($_GET["p"]))
{
$q1=urlencode($q1);
echo "<select name='name' onchange=window.location='editinternship.php?q=$q1&p='+this.value>";


//echo "<select name='name' onchange=window.location='editinternship.php?q=$q1&p='+this.value>";

//if(!isset($_GET["p"]))
//{
echo "<option value='".$_GET["p"]."'>".$_GET["p"]."</option>";
$list1=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct title from internship where title<>'".$_GET["p"]."' and cname='".$q1."'");
while($row=mysqli_fetch_array($list1))
{

echo "<option value='".addslashes($row['title'])."'>".addslashes($row['title'])."</option>";
}
/*//}
//else
//{
//echo "<option value=''>SELECT JOB TITLE</option>";
//echo "<option value='".$_GET["p"]."'>".$_GET["p"]."</option>";
//$list1=mysql_query("select distinct title from internship where title!='".$_GET["p"]."' and cname='".$q1."'");
//while($row=mysql_fetch_array($list1))
//{

//echo "<option value='".addslashes($row['title'])."'>".addslashes($row['title'])."</option>";
//}

//}*/

echo "</select></p>";
}


}



if((isset($_GET["q"]))&&(isset($_GET["p"])))
{
$q=urldecode($_GET["q"]);
$p=$_GET["p"];
$sql="select * from internship where cname='$q' and title='$p'";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
while($row=mysqli_fetch_array($res))
{
echo "
<form name='contactForm' id='contact_form' method='post' action='update1.php'>
<table>
<tr>
<td>Company Name:</td>
    <td>
     <textarea name='cname'  class='animated'>".$row['cname']."</textarea>
    </td>
    </tr>
	
    <tr>
	<td>Company Address:</td>
    <td>
    <textarea name='caddress'  class='animated'>".$row['caddr']."</textarea>
    </td>
    </tr>
	
	
	<tr>
	<td>Company Details:</td>
    <td>
    <textarea name='details'  class='animated'>".$row['details']."</textarea>
    </td>
    </tr>

	<tr>
	<td>Job Title:</td>
    <td>
    <textarea name='title'  class='animated'>".$row['title']."</textarea>
    </td>
    </tr>
	
	<tr>
	<td>Internship Period:</td>
    <td>
    <input type='text' name='period' value='".$row['period']."'/>
    </td>
    </tr>
	
	<tr>
	<td>Location:</td>
    <td>
    <textarea  name='location'  class='animated'>".$row['location']."</textarea>
    </td>
    </tr>
	
	<tr>
	<td>Payment:</td>
    <td>
    <input type='text' name='payment' value='".$row['payment']."'/>
    </td>
    </tr>
    
	<tr>
	<td>Company Website:</td>
    <td>
      <textarea name='website'  class='animated'>".$row['website']."</textarea>
    </td>
    </tr>
	
	<tr>
	<td>Languages Required:</td>
    <td>
      <textarea name='language'  class='animated'>".$row['language']."</textarea>
    </td>
    </tr>
	
	<tr>
	<td>Others Skills:</td>
    <td>
    <textarea name='other'  class='animated'>".$row['other']."</textarea>
    </td>
    </tr>
	
	<tr>
	<td>Eligibility:</td>
    <td>
     <textarea name='eligibility'  class='animated'>".$row['eligibility']."</textarea>
    </td>
    </tr>
	
	<tr>
	<td>Kt's Allowed:</td>
    <td>
    <input type='text' name='kt' value='".$row['kt']."'/>
    </td>
    </tr>
	
	<tr>
	<td>Date:</td>
    <td>
    <input type='text' name='date' id='datepicker' class='date' value='".$row['date']."' />
	</td>
    </tr>
	
	<tr>
	<td>Venue:</td>
    <td>
    <textarea name='venue'  class='animated'>".$row['venue']."</textarea>
    </td>
    </tr>
    
	</table>
	<p>
      <input type='submit' id='submit' value='Submit Form'>
    </p>
  </form>
";

}

}
echo "</div>
</center>

</div>";
footer_fn();
echo "</div>
</div>

";
}
else 
{
echo "You do not have permission to access this page.Redirecting to Home.<meta http-equiv='refresh' content='2;url=../index.php'>";
}
}
else
{
echo "YOU HAVE NOT LOGGED IN.PLZ LOGIN.<meta http-equiv='refresh' content='2;url=./tlogin.php'>";
}
?>

</body>
</html>

