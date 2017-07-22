<html>
<head>
<title>TRAINING & PLACEMENT PORTAl</title>
<script type="text/javascript" charset="utf-8" src="../js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/ColumnFilterWidgets.js"></script>
<!--<script type="text/javascript" charset="utf-8" src="../js/jquery.dataTables.columnFilter.js"></script>

<link rel="stylesheet" type="text/css" href="../css/demo_page.css">-->

<link rel="stylesheet" type="text/css" href="../css/demo_table.css">
<link rel="stylesheet" type="text/css" href="../css/ColumnFilterWidgets.css">

<link rel="stylesheet" type="text/css" href="../css/stephen1.css">
<link rel="stylesheet" type="text/css" href="../css/style2.css">
<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<script>
$(document).ready( function () {
	$('#details').dataTable( {
		 bAutoWidth:false ,
		"sDom": 'W<"clear">lfrtip',
		 oColumnFilterWidgets: {
        aiExclude: [7,8]
       }
	} );
} );


/*$(document).ready( function () {
	$("#details").dataTable().columnFilter();
} );*/
</script>
<style>
.container
{
width:95%;
}
#container_internal
{
width:80%;
margin-left:auto;
margin-right:auto;
display:block;

}
</style>
</head>
<body>
<?php
session_start();
include "../connection1.php";
include '../logic/theme-master.php';
$sql=mysqli_query($GLOBALS["___mysqli_ston"], "select * from company where status=1");
echo "<div class='container'>";
header_fn1();
echo "<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; Student Menu</h3>
</div>
<div style='float:right;'>
<img src='../images/home.png' height='30px' width='30px'><a href='../back.php' style='text-decoration:none;margin-right:10px;color:black;'><strong>HOME</strong></a>
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
";
if(!isset($_GET['q']))
{
$email=$_SESSION['user'][0];
$user=$_SESSION['user'][1];
$sql2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from masteruser where status=1 and email='$email'");
$count=mysqli_num_rows($sql2);
if($count!=0)
{
$sql3=mysqli_query($GLOBALS["___mysqli_ston"], "select * from sinfo where email='$email'");
while($rows=mysqli_fetch_array($sql3))
{
if($rows['sem']=='7'|| $rows['sem']=='8')
{
echo "<div id='container_internal' >";
echo "<table id='details' class='display' style='width:700px;'>";
echo "
<thead>
<tr>
<th>Company Name</th>
<th>Job Title</th>

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

$sql=mysqli_query($GLOBALS["___mysqli_ston"], "select * from criteria where sname='$user' and status<>2");
$count=mysqli_num_rows($sql);
if($count!=0)
{
while($row=mysqli_fetch_array($sql))
{
$cname=$row['cname'];
$sql5=mysqli_query($GLOBALS["___mysqli_ston"], "select * from company where cname='$cname'");

while($row=mysqli_fetch_array($sql5))
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

<td>".$row['process']."</td>";

$sql1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from clist where cname='$row[cname]' and title='$row[title]' and username='$user' ");
$no=mysqli_num_rows($sql1);

if($no==0)
{
echo "<td><form name='trial' method='POST'>
<input type='hidden' name='username' value='".$row['username']."'>
<input type='hidden' name='title' value='".$row['title']."'>
<input type='hidden' name='date' value='".$row['date']."'>
<input type='hidden' name='cname' value='".$row['cname']."'>";
echo "<input type='submit' name='submit' id='submit' value='Submit Job Request'>";
echo "</form></td>";
}
while($rows1=mysqli_fetch_array($sql1))
{
if($rows1['status']==1)
{
echo "<td><h3 style='color:red'><b>Approved for job</b></h3></td>";
}
if($rows1['status']==2)
{
echo "<td><h3 style='color:red'><b>Applied</b></h3></td>";
}
if($rows1['status']==3)
{
echo "<td><h3 style='color:red'><b>Rejected</b></h3></td>";
}
}
echo "
</tr>";
}

}
}
else
{
echo "<h3 style='color:red'><b><center>No company available</center></b></h3>";
}
echo "</tbody><tfoot><tr></tr><tr></tr></tfoot></table>";
echo "</div>";
}
else
{
echo "<div id='container_internal' style='width:60%;'><h3 style='color:red'><b><center>You cannot apply for job</center></b></h3></div>";
}
}
}
else
{
echo "<div id='container_internal' style='width:60%;'><h3 style='color:red'><b>You are not approved by the placement officer.</b></h3></div>";
}

}

if(isset($_GET['q']))
{
$email=$_SESSION['user'][0];
$user=$_SESSION['user'][1];
$q=$_GET['q'];
$p=$_GET['p'];

$sql2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from masteruser where status=1 and email='$email'");
$count=mysqli_num_rows($sql2);
if($count!=0)
{
$sql3=mysqli_query($GLOBALS["___mysqli_ston"], "select * from sinfo where email='$email'");
while($rows=mysqli_fetch_array($sql3))
{
if($rows['sem']=='7' || $rows['sem']=='8')
{
$sql1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from company as c inner join criteria as k on c.cname=k.cname where c.cname='$q' and c.title='$p' and k.sname='$user' and k.status<>2");
$count1=mysqli_num_rows($sql1);
if($count1!=0)
{
while($row=mysqli_fetch_array($sql1))
{
echo "<div id='container_internal' style='width:60%;'>
<fieldset>
<legend>Company Info</legend>
<div>Company Name:".$row['cname']."</div><br/>
<div>Company Address:".$row['caddr']."</div><br/>
<div>Company Details:".$row['details']."</div><br/>
</fieldset>
<br/>	

<fieldset>
<legend>Offer Details</legend>
<div>Profile Offered:".$row['profile']."</div><br/>
<div>Job Title:".$row['title']."</div><br/>
<div>Location:".$row['location']."</div><br/>
<div>Package:".$row['package']."</div><br/>
<div>Recruitment Process :".$row['process']."</div><br/>
<div>Company Website:".$row['website']."</div><br/>
<div>Responsibility scope:".$row['scope']."</div><br/>
</fieldset>
<br/>
<fieldset>
<legend>Skills & Eligibility</legend>
<div>Languages Required:".$row['language']."</div><br/>
<div>Others Skills:".$row['other']."</div><br/>
<div>Aggregate:".$row['aggregate']."</div><br/>
<div>Live Kt's Allowed:".$row['kt']."</div><br/>
<div>Dead Kt's Allowed:".$row['deadkt']."</div><br/>
</fieldset>
<br/>

<fieldset>
<legend>Interview Date and venue</legend>
<div>Date:".$row['date']."</div><br/><br/>
<div>Venue:".$row['venue']."</div><br/>
</fieldset><br>
<a href='../uploads/$row[username]/'>View details</a><br><br>";

$sql=mysqli_query($GLOBALS["___mysqli_ston"], "select * from clist where cname='$q' and username='$user'");
$no=mysqli_num_rows($sql);

if($no==0)
{
echo "<form name='trial' method='POST'>
<input type='hidden' name='username' value='".$row['username']."'>
<input type='hidden' name='title' value='".$row['title']."'>
<input type='hidden' name='date' value='".$row['date']."'>
<input type='hidden' name='cname' value='".$row['cname']."'>
<input type='submit' name='submit' id='submit' value='Submit Job Request'></form></div>";
}
while($rows1=mysqli_fetch_array($sql))
{
if($rows1['status']==1)
{
echo "<p><center><h3 style='color:red'><b>Approved for job</b></h3></center></p></div>";
}
if($rows1['status']==2)
{
echo "<p><center><h3 style='color:red'><b>Already Applied</b></h3></center></p></div>";
}
if($rows1['status']==3)
{
echo "<p><center><h3 style='color:red'><b>Rejected</b></h3></center></p></div>";
}
}
}
}
else
{
echo "<div id='container_internal' style='width:60%;'><center><h3 style='color:red'><b>This post by the company is not yet approved by the placement officer.</b></h3></center></div>";
}
}
else
{
echo "<div id='container_internal' style='width:60%;'><h3 style='color:red'><b><center>You cannot apply for job</center></b></h3></div>";
}
}
}
else
{
echo "<div id='container_internal' style='width:60%;'><center><h3 style='color:red'><b>You are not approved by the placement officer.</b></h3></center></div>";
}

}
echo "
<br/>
<br/>
<br/>
</div>";
footer_fn();
echo "</div>
</div>

";
if(isset($_POST['submit']))
{

include '../connection1.php';
$user=$_SESSION['user'][1];
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="insert into clist(username,cname,title,date,appeared,given,placed,status) values('$user','$_POST[cname]','$_POST[title]','$_POST[date]','0','0','unplaced','2')";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die("query not executed");
$cnames=$_POST['cname'];
$sql="update criteria set status=1 where sname='$user' and cname='$cnames'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Job Proposal has been sent!!', function (e) {
    window.location.href='./appeared.php';
});
	
    </SCRIPT>";

}
?>

</body>
</html>
