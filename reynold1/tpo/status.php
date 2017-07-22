<?php
include '../logic/theme-master.php';
?>
<html>
<head>
<title>Placements</title>

<script src="../js/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="../css/demo_table.css">
<script>
$(document).ready( function () {
	$('#details').dataTable()
	
	
} );

</script>

<!-- Autosize Scripts -->
<link rel="stylesheet" type="text/css" href="../css/stephen1.css">
<link rel="stylesheet" type="text/css" href="../css/style2.css">
<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<style>

			.animated {
				-webkit-transition: height 0.2s;
				-moz-transition: height 0.2s;
				transition: height 0.2s;
			}

		</style>

<link rel="stylesheet" type="text/css" href="../css/uploadify.css">
<script src='../js/jquery.autosize.js'></script>
		<script>
			$(function(){
				
				$('.animated').autosize({append: "\n"});
			});
		</script>
		
<!-- Auto size scripts end here -->	
<style>
#container_internal
{
margin-right:5px;
display:block;
margin-left:17%;
}
</style>
</head>
<body>

<?php
session_start();
if(isset($_POST['submit']))
{
include '../connection1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="update company set status=3 where cname='$_POST[cname]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$q=urlencode($_POST['q']);
$p=urlencode($_POST['p']);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Offer has been Rejected', function (e) {
    window.location.href='./status.php?q=$q&p=$p';
});
	
    </SCRIPT>";

}
if(isset($_POST['submit1']))
{
include '../connection1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="update company set status=1 where cname='$_POST[cname]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$q=urlencode($_POST['q']);
$p=urlencode($_POST['p']);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Offer Approved!!', function (e) {
    window.location.href='./status.php?q=$q&p=$p';
});
	
    </SCRIPT>";

}
if(isset($_POST['submit2']))
{
include '../connection1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="update company set status=2 where cname='$_POST[cname]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$sql="update users set status=2 where username='$_POST[username]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$q=urlencode($_POST['q']);
$p=urlencode($_POST['p']);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Recruiter has been debarred!!', function (e) {
    window.location.href='./status.php?q=$q&p=$p';
});
	
    </SCRIPT>";

}
if(isset($_SESSION['user4']))
{
include '../connection1.php';
$name=$_SESSION['user4'][1];
$email=$_SESSION['user4'][0];
$sql="select * from masteruser where name='$name' and role='Staff'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct cname from company order by cname;");
if($count==1)
{

echo "
<div class='bg'>
<div class='container'>";
header_fn1();
echo "<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; Placements Menu</h3>
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
<div id='container_internal' >
";
echo "<form method='POST' style='text-align:center'><input type='submit' name='submit3' id='submit' value='Select manually'>
<input type='submit' id='submit' name='submit4' value='Display All'></form>";
if(isset($_POST['submit3']))
{ 

$_SESSION['submit3']="set";
if(isset($_SESSION['submit4']))
{
unset($_SESSION['submit4']);
}

}
if(isset($_POST['submit4']))
{ 

$_SESSION['submit4']="set";
if(isset($_SESSION['submit3']))
{
unset($_SESSION['submit3']);
}

}

if(isset($_SESSION['submit3']))
{

echo "<p>Company Name:";
echo "<select name='name' onchange=window.location='status.php?q='+this.value>";

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
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct cname from company where cname<>'".$_GET["q"]."' order by cname;");
while($row=mysqli_fetch_array($list))
{
echo "<option value='".addslashes($row['cname'])."'>".addslashes($row['cname'])."</option>";
}

}
echo "</select>&nbsp;&nbsp;";

if(isset($_GET["q"]))
{
$q1=urlencode($_GET["q"]);
$sql1="select distinct title from company where cname='".$_GET["q"]."'";
$list1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
echo "<select name='name' onchange=window.location='status.php?q=$q1&p='+this.value>";

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
$list1=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct title from company where title!='".$_GET["p"]."' and cname='".$_GET["q"]."'");
while($row=mysqli_fetch_array($list1))
{
echo "<option value='".addslashes($row['title'])."'>".addslashes($row['title'])."</option>";
}

}
echo "</select></p>";
}



if((isset($_GET["q"]))&&(isset($_GET["p"])))
{
$q=$_GET["q"];
$p=$_GET["p"];
$sql="select * from company where cname='$q' and title='$p'";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
while($row=mysqli_fetch_array($res))
{
echo "<table>

  <tr>
<td>Company Name:</td>
    <td>
     ".$q."
    </td>
    </tr>
	
    <tr>
	<td>Company Details:</td>
    <td>
    ".$row['details']."
    </td>
    </tr>
	
	<tr>
	<td>Profile Offered:</td>
    <td>
   ".$row['profile']."
    </td>
    </tr>
	
	<tr>
	<td>Job Title:</td>
    <td>
   ".$row['title']."
    </td>
    </tr>
    
	<tr>
	<td>Skills Required:</td>
    <td>
      ".$row['language']."
    </td>
    </tr>
    
	<tr>
	<td>Others Skills:</td>
    <td>
    ".$row['other']."
    </td>
    </tr>
	
	
	<tr>
	<td>Package:</td>
    <td>
     ".$row['package']."
    </td>
    </tr>
	
	<tr>
	<td>Eligibility:</td>
    <td>
      ".$row['aggregate']."
    </td>
    </tr>
	
	<tr><td>Recruitment Process :</td>
    <td>
    ".$row['process']."
    </td>
    </tr>
	
	
	<tr>
	<td>Company Website:</td>
    <td>
     ".$row['website']." 
    </td>
    </tr>
	
	
	
	<tr>
	<td>Responsibility scope:</td>
    <td>
      ".$row['scope']."
    </td>
    </tr>
	
	
	<tr>
	<td>Next Position:</td>
    <td>
     ".$row['nposition']."
    </td>
    </tr>
	
	<tr>
	<td><a href='../uploads/$email/'>View details</a></td>
    </tr>
	
	<tr>
	<td>
	<form name='trial' method='POST'>
	<input type='hidden' name='username' value='".$row['username']."'>
	<input type='hidden' name='cname' value='".$row['cname']."'>
	<input type='hidden' name='q' value='".$_GET["q"]."'>
	<input type='hidden' name='p' value='".$_GET["p"]."'>";
	if($row['status']==0)
{
echo	"<input type='submit' name='submit1' id='submit' value='Approve Post'>";
echo	"<input type='submit' name='submit' id='submit' value='Reject Post'>";
echo	"<input type='submit' name='submit2' id='submit' value='Debar Recruiter'>";
}
if($row['status']==1 || $row['status']==3)
{
echo	"<input type='submit' name='submit2' id='submit' value='Debar Recruiter'>";
}
if($row['status']==2)
{
echo "<h3 style='color:red'><center><b>Recruiter debarred</b></center></h3>";
}
echo 	"</form>
	</td>
	
</tr>
	
    </table>
   

";

}

}
}

if(isset($_SESSION['submit4']))
{
$sql2="select * from company";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
$count1=mysqli_num_rows($res);
echo "<table id='details' class='display'>";
echo "
<thead>
<tr>
<th>Company Name</th>
<th>Job title</th>
<th>Skills required</th>
<th>Package</th>
<th>Aggregate</th>
<th>Allowed Live KT's</th>
<th>Allowed Dead KT's</th>
<th>Date</th>
<th>Selection Process</th>
<th>Options</th>
</tr>
</thead><tbody>";
while($row=mysqli_fetch_array($res))
{
echo "<tr>
<td>".$row['cname']."</td>
<td>".$row['title']."</td>
<td>".$row['language']."</td>
<td>".$row['package']."</td>
<td>".$row['aggregate']."</td>
<td>".$row['kt']."</td>
<td>".$row['deadkt']."</td>
<td>".$row['date']."</td>
<td>".$row['process']."</td>
<td><form name='trial' method='POST'>
<input type='hidden' name='username' value='".$row['username']."'>
<input type='hidden' name='cname' value='".$row['cname']."'>";
if($row['status']==0)
{
echo	"<input type='submit' name='submit5' id='submit' value='Approve Post'>";
echo	"<input type='submit' name='submit6' id='submit' value='Reject Post'>";
echo	"<input type='submit' name='submit7' id='submit' value='Debar Recruiter'>";
}
if($row['status']==1 || $row['status']==3)
{
echo	"<input type='submit' name='submit7' id='submit' value='Debar Recruiter'>";
}
if($row['status']==2)
{
echo "<h3 style='color:red'><center><b>Recruiter debarred</b></center></h3>";
}
 echo "</form>
</td>

</tr>";
}
echo "</tbody></table>";


}

echo "</div>
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

<?php
if(isset($_POST['submit5']))
{
include '../connection1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="update company set status=1 where cname='$_POST[cname]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die("query not executed");
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Offer Approved!!', function (e) {
    window.location.href='./status.php';
});
	
    </SCRIPT>";

}

if(isset($_POST['submit6']))
{
include '../connection1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="update company set status=3 where cname='$_POST[cname]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die("query not executed");
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Offer has been rejected!!', function (e) {
    window.location.href='./status.php';
});
	
    </SCRIPT>";

}

if(isset($_POST['submit7']))
{
include '../connection1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="update company set status=2 where cname='$_POST[cname]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$sql="update masteruser set status=2 where name='$_POST[username]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Recruiter has been Debarred!!', function (e) {
    window.location.href='./status.php';
});</SCRIPT>";

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