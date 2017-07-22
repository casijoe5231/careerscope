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
				
				$('.animated').autosize();
			});
		</script>
		
<!-- Auto size scripts end here -->	
<style>

#container_internal
{
margin-right:25%;
margin-left:20%;
}

</style>
</head>
<body>
<?php
session_start();
include '../logic/theme-master.php';
if(isset($_SESSION['user3']))
{
include '../connection1.php';
$email=$_SESSION['user3'][0];
$user=$_SESSION['user3'][1];
$sql="select * from masteruser where email='$email' and role='Recruiter'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct cname from company order by cname;");
if($count==1)
{

echo "

<div class='container'>";
header_fn1();
echo "<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; Recruiter Menu</h3>
</div>
<div style='float:right;'>
<img src='../images/home.png' height='30px' width='30px'><a href='../recindex.php' style='text-decoration:none;margin-right:10px;color:black;'><strong>HOME</strong></a>
</div>
<br>
<br>
<br>
<br>
<div id='menu'>
<ul>

  <li><h2>Available Functions</h2>
    <ul>
      <li><a href='details.php'>Post a Job</a></li>
	  <li><a href='edit.php'>Edit a Job POST</a></li>
	  <li><a href='status.php'>Check Post Status</a></li>
	</ul>
  </li>
</ul>
</div>
<div id='container_internal' >";
 $sql1="select * from masteruser where email='$email' and status=1";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
  $count=mysqli_num_rows($res);
  if($count==1)
 {

echo "<center>";

echo "<p>Company Name:";
echo "<select name='name' onchange=window.location='edit.php?q='+this.value>";


if(!isset($_GET["q"]))
{
echo "<option value=''>SELECT COMPANY NAME</option>";
$sql="select distinct cname from company where username='$user'";
$list=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
while($row=mysqli_fetch_array($list))
{
echo "<option value='".addslashes($row['cname'])."'>".addslashes($row['cname'])."</option>";
}
}
else 
{
echo "<option value='".$_GET["q"]."'>".$_GET["q"]."</option>";
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct cname from company where cname<>'".trim($_GET["q"],"%20")."' order by cname;");

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
$sql1="select distinct title from company where cname='".$q1."'";

$list1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);



//$q1=trim($q1);
//$q1 = str_replace(' ', '', $q1);
if(!isset($_GET["p"]))
{
$q1=urlencode($q1);
echo "<select name='name' onchange=window.location='edit.php?q=$q1&p='+this.value>";


//echo "<select name='name' onchange=window.location='edit.php?q=$q1&p='+this.value>";

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
//$list1=mysql_query("select distinct title from company where title!='".$_GET["p"]."' and cname='".$q1."'");
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
echo "<select name='name' onchange=window.location='edit.php?q=$q1&p='+this.value>";


//echo "<select name='name' onchange=window.location='edit.php?q=$q1&p='+this.value>";

//if(!isset($_GET["p"]))
//{
echo "<option value='".$_GET["p"]."'>".$_GET["p"]."</option>";
$list1=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct title from company where title<>'".$_GET["p"]."' and cname='".$q1."'");
while($row=mysqli_fetch_array($list1))
{

echo "<option value='".addslashes($row['title'])."'>".addslashes($row['title'])."</option>";
}
/*//}
//else
//{
//echo "<option value=''>SELECT JOB TITLE</option>";
//echo "<option value='".$_GET["p"]."'>".$_GET["p"]."</option>";
//$list1=mysql_query("select distinct title from company where title!='".$_GET["p"]."' and cname='".$q1."'");
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
$sql="select * from company where cname='$q' and title='$p'";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
while($row=mysqli_fetch_array($res))
{
echo "
<form name='contactForm' id='contact_form' method='post' action='update.php'>
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
    <textarea name='caddr'  class='animated'>".$row['caddr']."</textarea>
    </td>
    </tr>
	
	
	<tr>
	<td>Company Details:</td>
    <td>
    <textarea name='details'  class='animated'>".$row['details']."</textarea>
    </td>
    </tr>
	
	<tr>
	<td>Profile Offered:</td>
    <td>
    <textarea  name='profile'  class='animated'>".$row['profile']."</textarea>
    </td>
    </tr>
	
	
	
	
	<tr>
	<td>Job Title:</td>
    <td>
    <textarea name='title'  class='animated'>".$row['title']."</textarea>
    </td>
    </tr>
    
	<tr>
	<td>Date (dd/mm/yyyy):</td>
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
    
    
	<tr>
	<td>Skills Required:</td>
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
	<td>Package:</td>
    <td>
     <textarea name='package'  class='animated'>".$row['other']."</textarea>
    </td>
    </tr>
	
	<tr>
	<td>Aggregate:</td>
    <td>
      <textarea name='aggregate'  class='animated'>".$row['aggregate']."</textarea>
    </td>
    </tr>
	
	<tr>
	<td>No. of Live Kt's Allowed:</td>
    <td>
    <input type='text' name='kt' id='kt' class='animated' value='".$row['kt']."'>
    </td>
    </tr>
	
	<tr>
	<td>No. of Dead Kt's Allowed:</td>
    <td>
    <input type='text' name='kt1' id='kt1' class='animated' value='".$row['deadkt']."'>
    </td>
    </tr>
	
	<tr><td>Recruitment Process :</td>
    <td>
    <textarea name='process'  class='animated'>".$row['process']."</textarea>
    </td>
    </tr>
	
	<tr>
	<td>Location:</td>
    <td>
    <textarea  name='location'  class='animated'>".$row['location']."</textarea>
    </td>
    </tr>
	
	<tr>
	<td>Company Website:</td>
    <td>
      <textarea name='website'  class='animated'>".$row['website']."</textarea>
    </td>
    </tr>
	
	
	
	<tr>
	<td>Responsibility scope:</td>
    <td>
      <textarea name='scope'  class='animated'>".$row['scope']."</textarea>
    </td>
    </tr>
	
	
	<tr>
	<td>Next Position:</td>
    <td>
      <textarea name='nposition'  class='animated'>".$row['nposition']."</textarea>
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
echo "</center>";
}
else
{
echo "<h3 style='color:red'><b><center>You are not approved by the placement officer. Please contact TPO.</center></b></h3>";
}
echo "</div>


</div>";
footer_fn();
echo "</div>


";
}
else 
{
echo "You do not have permission to access this page.Redirecting to Home.<meta http-equiv='refresh' content='2;url=../index.php'>";
}
}
else
{
echo "YOU HAVE NOT LOGGED IN.PLZ LOGIN.<meta http-equiv='refresh' content='2;url=./rlogin.php'>";
}
?>

</body>
</html>

<!--
Company Name:<input type='text' name='cname' size='80' value='".$q."'/>
Company Details:</br><textarea name='details' >".$row['details']."</textarea>

Profile Offered:</br><input type='text' name='profile' size='80' value='".$row['profile']."'/> 
Job Title:</br><textarea name='title' >".$row['title']."</textarea>
language Required:</br><textarea name='language' >".$row['language']."</textarea>
Other:</br><input type='text' name='other' size='80' value='".$row['other']."'/>
Package:</br><textarea name='package' >".$row['package']."</textarea>
aggregate:</br><textarea name='aggregate' >".$row['aggregate']."</textarea>
Recruitment process:</br><input type='text' name='process' size='80' value='".$row['process']."'/>
Company website:</br><textarea name='website' >".$row['website']."</textarea>
Responsibility Scope:</br><textarea name='scope' >".$row['scope']."</textarea>
Possible Next Position:</br><textarea name='nposition' >".$row['nposition']."</textarea>
<input type='submit' name='submit' value='Upload'/>

 -->