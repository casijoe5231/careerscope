
<html>
<head>
<title>Placements</title>
<link rel="stylesheet" type="text/css" href="../css/stephen.css">
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
				
				$('.animated').autosize({append: "\n"});
			});
		</script>
		
<!-- Auto size scripts end here -->	
</head>
<body>
<?php
session_start();

if(isset($_SESSION['username']))
{
include '../connect.php';
$sql="select * from users where username='".$_SESSION['username']."' and role='tpo'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct cname from company order by cname;");
if($count==1)
{

echo "
<div class='bg'>
<div class='container'>
<div class='header'>
<img src='../images/logo.png' height='80px' align='left'>
<h1>TRAINING & PLACEMENT PORTAL</h1>
</div>
<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; TPO Menu</h3>
</div>
<br>
<br>
<br>
<div class='container_internal' >

<h1>Training And Placement Portal</h1>
<center><p>Company Name:";
echo "<select name='name' onchange=window.location='post1.php?q='+this.value>";


echo "<option value=''>SELECT COMPANY NAME</option>";
while($row=mysqli_fetch_array($list))
{
echo "<option value='".addslashes($row['cname'])."'>".addslashes($row['cname'])."</option>";
}

echo "</select></p>";



if(isset($_GET["q"]))
{
$q=$_GET["q"];

$sql="select * from company where cname='$q'";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
while($row=mysqli_fetch_array($res))
{
echo "
<form name='contactForm' id='contact_form' method='post' action='update.php'>
  <p> Company Name:
    <div>
     <input type='text' name='cname' size='78' value='".$q."'/>
    </div>
    </p>
    <p>Company Details:
    <div>
    </br><textarea name='details' rows='2' cols='60' class='animated'>".$row['details']."</textarea>
    </div>
    </p>
	<p>Profile Offered:
    
    <div>
    <input type='text' name='profile' size='78' value='".$row['profile']."'/> 
    </div>
    </p>
	<p>Job Title:
    
    <div>
    <textarea name='title' rows='2' cols='60' class='animated'>".$row['title']."</textarea>
    </div>
    </p>
    
	<p>Skills Required:
    
    <div>
      <textarea name='skills' rows='2' class='animated' cols='60'>".$row['skills']."</textarea>
    </div>
    </p>
    
	<p>Others Skills:
    
    <div>
      <input type='text' name='other' size='78'  value='".$row['other']."'/>
    </div>
    </p>
	
	
	<p>Package:
    
    <div>
      <textarea name='package' rows='2' cols='60' class='animated'>".$row['package']."</textarea>
    </div>
    </p>
	<p>Eligibility:
    
    <div>
      <textarea name='eligibility' rows='2' cols='60' class='animated'>".$row['eligibility']."</textarea>
    </div>
    </p>
	<p>Recruitment Process :
    
    <div>
      <textarea name='process' rows='2' cols='60' class='animated' >".$row['process']."</textarea>
    </div>
    </p>
	<p>Company Website:
    
    <div>
      <textarea name='website' rows='2' cols='60' class='animated'>".$row['website']."</textarea>
    </div>
    </p>
	<p>Responsibility scope:
    
    <div>
      <textarea name='scope' rows='2' cols='60' class='animated'>".$row['scope']."</textarea>
    </div>
    </p>
	<p>Next Position:
    
    <div>
      <textarea name='nposition' rows='2' cols='60' class='animated'>".$row['nposition']."</textarea>
    </div>
    </p>
	
    
    <p id='submit'>
      <input type='submit' id='send_message1' value='Submit Form' height='100px'>
    </p>
  </form>
";

}

}
echo "<p><a href='tpo.php'>RETURN TO PREVIOUS PAGE</a></p></div>
</center>

</div>
<div class='footer'>
Privacy Policy | Terms of use | FAQ's
</div>
</div>
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

<!--
Company Name:<input type='text' name='cname' size='80' value='".$q."'/>
Company Details:</br><textarea name='details' rows='2' cols='60'>".$row['details']."</textarea>

Profile Offered:</br><input type='text' name='profile' size='80' value='".$row['profile']."'/> 
Job Title:</br><textarea name='title' rows='2' cols='60'>".$row['title']."</textarea>
Skills Required:</br><textarea name='skills' rows='2' cols='60'>".$row['skills']."</textarea>
Other:</br><input type='text' name='other' size='80' value='".$row['other']."'/>
Package:</br><textarea name='package' rows='2' cols='60'>".$row['package']."</textarea>
Eligibility:</br><textarea name='eligibility' rows='2' cols='60'>".$row['eligibility']."</textarea>
Recruitment process:</br><input type='text' name='process' size='80' value='".$row['process']."'/>
Company website:</br><textarea name='website' rows='2' cols='60'>".$row['website']."</textarea>
Responsibility Scope:</br><textarea name='scope' rows='2' cols='60'>".$row['scope']."</textarea>
Possible Next Position:</br><textarea name='nposition' rows='2' cols='60'>".$row['nposition']."</textarea>
<input type='submit' name='submit' value='Upload'/>

 -->