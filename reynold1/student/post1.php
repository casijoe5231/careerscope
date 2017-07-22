<html>
<head>
<title>Placements</title>
<link rel='stylesheet' type='text/css' href='../css/stephen.css'>
<link rel="stylesheet" type="text/css" href="../css/style2.css">
<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<style>

			.animated {
				-webkit-transition: height 0.2s;
				-moz-transition: height 0.2s;
				transition: height 0.2s;
			}

		</style>
<script src='../js/jquery.autosize.js'></script>
		<script>
			$(function(){
				
				$('.animated').autosize({append: "\n"});
			});
		</script>		
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

<p><h1>Training And Placement Portal</h1>
Company Name:</p>";
echo "<select name='name' onchange=window.location='post.php?q='+this.value>";


echo "<option value=''>SELECT COMPANY NAME</option>";
while($row=mysqli_fetch_array($list))
{
echo "<option value='".addslashes($row['cname'])."'>".addslashes($row['cname'])."</option>";
}





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

</form>
";

}

}
echo "<p><a href='tpanel.php'>RETURN TO PREVIOUS PAGE</a></p></div>


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